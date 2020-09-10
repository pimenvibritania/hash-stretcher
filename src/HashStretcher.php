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
     * Initiate constant for salt
     */
    const CSTART = 'PIM::';
    /**
     * Initiate constant for salt
     */
    const CLAST = '::2613';

    /**
     * @param $key
     * @return string
     */

    public function gost($key,$salt)
    {
        $hashed = self::CSTART.$key.$salt.self::CLAST;
        return hash("gost", $hashed);
    }

    /**
     * @param $key
     * @param $salt
     * @return mixed|string
     */
    public function snefru($key, $salt)
    {
        $hashed = self::CSTART.$key.$salt.self::CLAST;
        return hash("snefru", $hashed);
    }

    /**
     * @param $key
     * @param $salt
     * @return mixed|string
     */
    public function whirlpool($key, $salt)
    {
        $hashed = self::CSTART.$key.$salt.self::CLAST;
        return hash("whirlpool", $hashed);
    }

    /**
     * @param $key
     * @param $salt
     * @return mixed|string
     */
    public function create($key, $salt){
        $gost = self::gost($key, $salt);
        $snefru = self::snefru($key, $salt);
        
        $mixKey = $gost.$snefru;
        $mixSalt = self::CLAST.self::CSTART;
        $whirlpool = self::whirlpool($mixKey,$mixSalt);
        
        $hashed = self::CSTART.$whirlpool.self::CLAST;
        return $hashed;
    }
}
