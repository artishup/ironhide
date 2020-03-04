<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Domain\ValueObject;

use ArtishUp\Shared\Domain\ValueObject\StringValueObject;

final class Password extends StringValueObject
{
    public static function create(string $value): Password
    {
        return new self($value);
    }
}
