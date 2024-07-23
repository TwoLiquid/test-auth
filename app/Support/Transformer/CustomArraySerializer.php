<?php

namespace App\Support\Transformer;

use League\Fractal\Serializer\ArraySerializer;

/**
 * Class CustomArraySerializer
 *
 * @package App\Support\Transformer
 */
class CustomArraySerializer extends ArraySerializer
{
    /**
     * Serialize a collection
     *
     * @param string|null $resourceKey
     * @param array $data
     *
     * @return array|array[]
     */
    public function collection(
        ?string $resourceKey,
        array $data
    ) : array
    {
        return $resourceKey ? [$resourceKey => $data] : $data;
    }

    /**
     * Serialize an item
     *
     * @param string|null $resourceKey
     * @param array $data
     *
     * @return array|array[]
     */
    public function item(
        ?string $resourceKey,
        array $data
    ) : array
    {
        return $resourceKey ? [$resourceKey => $data] : $data;
    }
}
