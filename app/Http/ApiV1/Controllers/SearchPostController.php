<?php

namespace App\Http\ApiV1\Controllers;

use Illuminate\Http\Request;
use App\Domain\Search\Action\SearchPostAction;
use  App\Http\ApiV1\Resources\PostResource;

class SearchPostController
{
    public function search(SearchPostAction $action, Request $request)
    {
        $result = $action->execute($request->input('query'));
        // return $result;
        if($result->hits->total->value != 0){
            // return $result->hits->hits;
            return PostResource::collection($result->hits->hits);    
        }
        // return new PostResource($result);
    }
}
