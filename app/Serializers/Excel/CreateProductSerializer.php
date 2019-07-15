<?php


namespace App\Serializers\Excel;


use App\Interfaces\Serializer;

class CreateProductSerializer implements Serializer
{

    /**
     * @param array $data
     * @return array
     */
    public function serialize(array $data): array
    {
        $array = [
            'category_id' => $data[0],
            'name' => $data[1],
            'price' => $data[2],
            'description' => $data[3],
            'stock_count' => $data[4],
            'image_url' => $data[5],
        ];
        return $array;
    }
}
