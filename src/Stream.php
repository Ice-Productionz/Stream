<?php

namespace Iceproductionz\Stream;

interface Stream
{
    /**
     * @param int $length
     *
     * @return mixed
     */
    public function read(int $length = 0);

    /**
     * @param mixed $data
     *
     * @return bool
     */
    public function write($data): bool;

    /**
     * @return bool
     */
    public function rewind(): bool;

    /**
     * @return bool
     */
    public function eof(): bool;

    /**
     * @return bool
     */
    public function close(): bool;
}