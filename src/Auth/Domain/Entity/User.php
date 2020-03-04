<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Domain\Entity;

use DateTime;
use ArtishUp\Shared\Domain\Entity\Entity;
use ArtishUp\Auth\Domain\ValueObject\Email;
use ArtishUp\Shared\Domain\ValueObject\Uuid;
use ArtishUp\Auth\Domain\ValueObject\Password;

class User extends Entity
{
    private Uuid $uuid;
    private string $firstName;
    private string $lastName;
    private Email $email;
    private Password $password;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    private function __construct(
        Uuid $uuid,
        string $firstName,
        string $lastName,
        Email $email,
        Password $password,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->uuid = $uuid;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        Uuid $uuid,
        string $firstName,
        string $lastName,
        Email $email,
        Password $password,
        DateTime $createdAt,
        DateTime $updatedAt
    ){
        return new self($uuid, $firstName, $lastName, $email, $password, $createdAt, $updatedAt);
    }

    public function uuid(): Uuid
    {
        return $this->uuid;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    function toArray(): array
    {
        return [
            'uuid'      => $this->uuid(),
            'firstName' => $this->firstName(),
            'lastName'  => $this->lastName(),
            'email'     => $this->email(),
            'password'  => $this->password(),
            'createdAt' => $this->createdAt(),
            'updatedAt' => $this->updatedAt()
        ];
    }
}
