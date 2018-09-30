<?php

namespace IceproductionzTest\Stream;

use Iceproductionz\Stream\Csv;
use Iceproductionz\Stream\Stream;
use PHPUnit\Framework\TestCase;

class CsvTest extends TestCase
{
    /**
     * Test Construction of CSV Stream Interface
     */
    public function testConstruction()
    {
        $sut = new Csv(tmpfile());

        $this->assertInstanceOf(Csv::class, $sut);
        $this->assertInstanceOf(Stream::class, $sut);

        return $sut;
    }
}