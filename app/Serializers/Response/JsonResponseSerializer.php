<?php


namespace App\Serializers\Response;


use App\Interfaces\Serializer;

class JsonResponseSerializer implements Serializer
{

    /**
     * @param array $data
     * @return array
     */
    public function serialize(array $data): array
    {
        return [
            'error' => $data['error'],
            'message' => $data['message'],
            'data' => $data['data']
        ];
    }
}
