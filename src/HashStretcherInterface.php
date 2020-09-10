<?php

namespace pimenvibritania\HashStretcher;

/**
 * Interface HashStretcherInterface
 * @package pimenvibritania\HashStretcher
 */
interface HashStretcherInterface
{
    /**
     * @param $key
     * @param $salt
     * @return mixed
     */
    public function gost($key, $salt);

    /**
     * @param $key
     * @param $salt
     * @return mixed
     */
    public function snefru($key, $salt);

    /**
     * @param $key
     * @param $salt
     * @return mixed
     */
    public function whirlpool($key, $salt);

    /**
     * @param $key
     * @param $salt
     * @return mixed
     */
    public function create($key, $salt);
}