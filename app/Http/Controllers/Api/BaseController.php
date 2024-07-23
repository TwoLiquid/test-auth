<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Support\Response\ApiResponseTrait;
use App\Support\Transformer\TransformTrait;

/**
 * Class BaseController
 *
 * @package App\Http\Controllers\Api
 */
abstract class BaseController extends Controller
{
    use ApiResponseTrait;
    use TransformTrait;
}
