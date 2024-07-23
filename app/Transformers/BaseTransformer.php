<?php

namespace App\Transformers;

use App\Support\Transformer\TransformTrait;
use League\Fractal\TransformerAbstract;

/**
 * Class BaseTransformer
 *
 * @package App\Support\Transformer
 */
abstract class BaseTransformer extends TransformerAbstract
{
    use TransformTrait;

    abstract public function getItemKey();

    abstract public function getCollectionKey();
}
