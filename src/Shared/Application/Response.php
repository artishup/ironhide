<?php

declare(strict_types = 1);

namespace ArtishUp\Shared\Application;

use JsonSerializable;

abstract class Response implements JsonSerializable
{

    abstract function toArray(): array;

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
