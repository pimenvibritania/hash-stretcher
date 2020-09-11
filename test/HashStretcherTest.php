<?php

namespace pimenvibritania\HashStretcher;

use PHPUnit\Framework\TestCase;
use pimenvibritania\HashStretcher\Hasher;

class HashStretcherTest extends TestCase
{
    public function matchHash(){
        $hash = new Hasher();
        $hash = strlen($hash->create("pimen", "vibritania"));

        $this->assertEquals(32, $hash);
    }
}
