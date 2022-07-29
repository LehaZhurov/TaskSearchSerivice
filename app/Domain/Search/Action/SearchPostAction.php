<?php

namespace App\Domain\Search\Action;

use Elastic\Elasticsearch\ClientBuilder;


class SearchPostAction
{
    private const HOST = 'http://elasticsearch:9200';

    public function execute(string $searchString): Object
    {
        $client = ClientBuilder::create()->setHosts([self::HOST])->build(); //Создание подключение к Elasticsearch
        $query = [
            'index' => 'posts',
            "body" => [
                'query' => [
                    'match' => [
                        'title' => $searchString,
                        'boost' => 2
                    ],
                    'match' => [
                        'text' => $searchString,
                    ],
                ]
            ]
        ];
        $response = $client->search($query);
        $result = $response->asObject();
        return $result;
    }
}
