<?php
namespace pimenvibritania\HashStretcher;

use pimenvibritania\HashStretcher\HashStretcherInterface as HasherContract;

/**
 * Class Hasher
 * @package pimenvibritania\HashStretcher
 */
class Hasher implements HasherContract
{
    /**
     * Initiate constant for codename
     */
    const CODE = '::PIMEN::';


    public function sha3($key,$salt)
    {
        $hashed = self::CODE.$key.$salt;
        return hash("sha3-512", $hashed);
    }

    /**
     * @param $key
     * @param $salt
     * @return mixed|string
     */
    public function whirlpool($key, $salt)
    {
        $hashed = self::CODE.$key.$salt;
        return hash("whirlpool", $hashed);
    }

    public function gost($key, $salt)
    {
        $hashed = self::CODE.$key.$salt;
        return hash("gost", $hashed);
    }

    public function md5($key, $salt)
    {
        $hashed = self::CODE.$key.$salt;
        return hash("md5", $hashed);
    }

    /**
     * @param $key
     * @param $salt
     * @return mixed|string
     */
    public function create($key, $salt){

        $sha3 = self::sha3($key, $salt);
        $whirlpool = self::whirlpool($key, $salt);
        $gost = self::gost(($sha3.$whirlpool), $salt);
        $md5 = self::md5($gost, $salt);

        $decode = base64_decode($md5);
        $hashed = "PIMEN::".$decode."=";

        return $hashed;
    }
}
