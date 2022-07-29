<?php

namespace App\Http\ApiV1\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;
use App\Http\ApiV1\Resources\TagResource;
class PostResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->_id,
            'title' => $this->_source->title,
            'preview' => $this->_source->preview,
            'tags' => TagResource::collection($this->_source->tags),
            'text' => $this->_source->text,
            'user_id' => $this->_source->user_id,
            'created_at' => $this->_source->created_at,
            'rating'  => $this->_source->rating,

        ];
    }
}
