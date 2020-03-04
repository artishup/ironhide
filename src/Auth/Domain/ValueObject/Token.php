<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Domain\ValueObject;

use ArtishUp\Shared\Domain\ValueObject\StringValueObject;

class Token extends StringValueObject
{

    public static function create(string $value): Token
    {
        return new self($value);
    }
}
