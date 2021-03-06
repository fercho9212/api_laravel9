<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */    
    /**
     * toArray
     *
     * @param  mixed $request
     * @return void
     */
    public function toArray($request)
    {
        return [
                'type'  => 'articles',
                'id'    => (string) $this->resource->getRouteKey(),
                'attributes'    =>  [
                    'title' => $this->resource->title,
                    'slug'  => $this->resource->slug,
                    'content'   => $this->resource->content
                ],
                'links' => [
                    'self'  => route('api.v1.articles.show',$this->resource)
                ] 
        ];
    }
}
