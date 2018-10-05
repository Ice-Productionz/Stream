<?php

namespace IceproductionzTest\Stream;

use Iceproductionz\Stream\File\Csv;
use Iceproductionz\Stream\StreamInterface;
use PHPUnit\Framework\TestCase;

class CsvTest extends TestCase
{
    /**
     * Test Construction of CSV Stream Interface
     */
    public function testConstruction(): void
    {
        $sut = new Csv($this->mockStream());

        $this->assertInstanceOf(Csv::class, $sut);
        $this->assertInstanceOf(StreamInterface::class, $sut);
    }

    /**
     * Test Reading CSV
     */
    public function testReadingCSV(): void
    {
        $sut = new Csv($this->mockStream());

        foreach ($this->provideData() as $expectedRow) {
            $row = $sut->read();

            $this->assertSame($expectedRow, $row);
        }
    }

    private function mockStream()
    {
        $resource = tmpfile();
        foreach ($this->provideData() as $row) {
            fputcsv($resource, $row);
        }
        rewind($resource);

        return $resource;
    }

    private function  provideData(): array
    {
        return [
            ['header-1', 'header-2', 'header-3', 'header-4', 'header-5', 'header-6'],
            ['row-1-col-1', 'row-1-col-2', 'row-1-col-3', 'row-1-col-4', 'row-1-col-5', 'row-1-col-6'],
            ['row-2-col-1', 'row-2-col-2', 'row-2-col-3', 'row-2-col-4', 'row-2-col-5', 'row-2-col-6'],
            ['row-3-col-1', 'row-3-col-2', 'row-3-col-3', 'row-3-col-4', 'row-3-col-5', 'row-3-col-6']
        ];
    }
}