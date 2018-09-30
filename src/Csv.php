<?php

namespace Iceproductionz\Stream;

use Iceproductionz\Stream\Exception\InvalidValue;

class Csv implements Stream
{
    /**
     * @var resource;
     */
    private $handle;

    /**
     * @var array
     */
    private $options;

    /**
     * Csv constructor.
     *
     * @param resource $handle
     * @param array    $options
     */
    public function __construct($handle, array $options= [])
    {
        if (!\is_resource($handle)) {
            throw new InvalidValue('$handle provided is not a resource');
        }

        if (!isset($options['delimiter'])) {
            $options['delimiter'] = ',';
        }

        if (!isset($options['enclosure'])) {
            $options['enclosure'] = '"';
        }

        if (!isset($options['escape'])) {
            $options['escape'] = '\\';
        }

        $this->handle = $handle;
        $this->options = $options;
    }

    /**
     * @param int $length
     *
     * @return array
     */
    public function read(int $length = 0): array
    {
        return fgetcsv($this->handle, $length, $this->options['delimiter'], $this->options['enclosure'], $this->options['escape']);
    }

    /**
     * @param mixed $data
     *
     * @return bool|int
     */
    public function write($data): bool
    {
        return fputcsv($this->handle, $data, $this->options['delimiter'], $this->options['enclosure'], $this->options['escape']);
    }

    /**
     * @return bool
     */
    public function rewind(): bool
    {
        return rewind($this->handle);
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return feof($this->handle);
    }

    /**
     * @return bool
     */
    public function close(): bool
    {
        return fclose($this->handle);
    }
}