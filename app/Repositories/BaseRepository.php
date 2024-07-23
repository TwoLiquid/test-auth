<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Exception;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
abstract class BaseRepository
{
    /**
     * Cache usage
     *
     * @var bool
     */
    protected bool $caching;

    /**
     * Cache time
     *
     * @var int
     */
    protected int $cacheTime;

    /**
     * Pagination step
     *
     * @var int
     */
    protected int $perPage;

    /**
     * @return bool
     */
    public function getCaching() : bool
    {
        return $this->caching;
    }

    /**
     * @param bool $caching
     */
    public function setCaching(
        bool $caching
    ) : void
    {
        $this->caching = $caching;
    }

    /**
     * @return int
     */
    public function getCacheTime() : int
    {
        return $this->cacheTime;
    }

    /**
     * @param int $cacheTime
     */
    public function setCacheTime(
        int $cacheTime
    ) : void
    {
        $this->cacheTime = $cacheTime;
    }

    /**
     * @return int
     */
    public function getPerPage() : int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage(
        int $perPage
    ) : void
    {
        $this->perPage = $perPage;
    }

    /**
     * @param QueryException $exception
     *
     * @throws Exception
     */
    protected function throwRepositoryException(
        QueryException $exception
    ) : void
    {
        throw new Exception(
            $exception->getMessage(),
            $exception->getCode()
        );
    }
}
