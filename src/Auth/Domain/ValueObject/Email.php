<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Domain\ValueObject;

use ArtishUp\Shared\Domain\ValueObject\StringValueObject;

final class Email extends StringValueObject
{
    public static function create(string $value): Email
    {
        return new self($value);
    }
}
