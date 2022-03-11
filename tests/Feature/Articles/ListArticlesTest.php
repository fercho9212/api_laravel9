<?php

namespace Tests\Feature\Articles;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListArticlesTest extends TestCase
{
    
    use RefreshDatabase;

    /** @test */
    public function can_fetch_a_single_article(){
        $this->withoutExceptionHandling();
        $article = Article::factory()->create();
        $response = $this->getJson(route('api.v1.articles.show',$article));
        $response->assertJson([
            'data' => [
                'type'  => 'articles',
                'id'    => (string) $article->getRouteKey(),
                'attributes'    => [
                    'title' => $article->title,
                    'slug'  => $article->slug,
                    'content'   => $article->content
                ],
                'links' => [
                    'self' => route('api.v1.articles.show',$article)
                ]
            ]
        ]);
    }

    public function can_fetch_all_articles(){
        $articles = Article::factory()->count(3)->create();
        $response = $this->getJson(route('api.v1.articles.index'));
        $response->assertExactJson([
            'data'  => [
                [
                    'type' => 'articles',
                    'id'   => (string) $articles[0]->getRouteKey(),
                    'attribute'    => [
                        'title' =>  $articles[0]->title,
                        'slug'  =>  $articles[0]->slug,
                        'content'=> $articles[0]->content  
                    ],
                    'links' => [
                        'self'  => route('api.v1.articles.show',$articles[0])
                    ]
                ]
            ]
        ]);
    }


}
