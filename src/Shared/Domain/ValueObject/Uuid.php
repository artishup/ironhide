<?php

declare(strict_types = 1);

namespace ArtishUp\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    protected string $value;

    private function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);

        $this->value = $value;
    }

    public static function random(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public static function fromString(string $uuid): self
    {
        return new static($uuid);
    }

    public function value(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid($id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }

    public function equals(Uuid $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString()
    {
        return $this->value();
    }
}
