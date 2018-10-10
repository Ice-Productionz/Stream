<?php

namespace Iceproductionz\Stream;

interface StreamInterface
{
    /**
     * Returns whether or not the stream is readable.
     *
     * @return bool
     */
    public function isReadable(): bool;
    /**
     * Read data from the stream.
     *
     * @param int $length Read up to $length bytes from the object and return
     *     them. Fewer than $length bytes may be returned if underlying stream
     *     call returns fewer bytes.
     * @return mixed Returns the data read from the stream
     * @throws \RuntimeException if an error occurs.
     */
    public function read(int $length = 0);

    /**
     * Write data to the stream.
     *
     * @param $data
     *
     * @return bool Returns the number of bytes written to the stream.
     */
    public function write($data): bool;

    /**
     * Returns whether or not the stream is writable.
     *
     * @return bool
     */
    public function isWritable(): bool;

    /**
     * Seek to the beginning of the stream.
     *
     * If the stream is not seekable, this method will raise an exception;
     * otherwise, it will perform a seek(0).
     *
     * @see seek()
     * @link http://www.php.net/manual/en/function.fseek.php
     * @throws \RuntimeException on failure.
     */
    public function rewind(): void ;

    /**
     * Returns the current position of the file read/write pointer
     *
     * @return int Position of the file pointer
     * @throws \RuntimeException on error.
     */
    public function tell();

    /**
     * Returns true if the stream is at the end of the stream.
     *
     * @return bool
     */
    public function eof(): bool;

    /**
     * Closes the stream and any underlying resources.
     *
     * @return void
     */
    public function close(): void;
}
