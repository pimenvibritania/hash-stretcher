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
    public function sha3($key, $salt);

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
    public function gost($key, $salt);

    /**
     * @param $key
     * @return mixed
     */
    public function joaat($key);

    /**
     * @param $key
     * @param $salt
     * @return mixed
     */
    public function create($key, $salt);
}