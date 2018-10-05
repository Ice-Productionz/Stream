<?php

namespace Iceproductionz\Stream\File;

use Iceproductionz\Stream\Exception\InvalidValue;
use Iceproductionz\Stream\StreamInterface;

class File implements StreamInterface
{
    /**
     * @var resource
     */
    private $handle;

    /**
     * File constructor.
     *
     * @param resource $handle
     */
    public function __construct($handle)
    {
        if (!\is_resource($handle)) {
            throw new InvalidValue('$handle provided is not a resource');
        }

        $this->handle = $handle;
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public function read(int $length = 0): string
    {
        return fread($this->handle, $length);
    }

    /**
     * @param mixed $data
     *
     * @return bool
     */
    public function write($data): bool
    {
        return fwrite($this->handle, $data);
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
