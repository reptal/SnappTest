<?php


namespace App\Interfaces;


interface Serializer
{
    /**
     * @param array $data
     * @return array
     */
    public function serialize(array $data): array;
}
