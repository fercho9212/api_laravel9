<?php

namespace App\Http\Resources;

use App\Http\Resources\ArticlesResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleColection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $collects = ArticlesResource::class;
    public function toArray($request)
    {
        return [
            'data'  => $this->collection,
            'links' => [
                'self' => route('api.v1.articles.index')
            ]
        ];
    }
}
