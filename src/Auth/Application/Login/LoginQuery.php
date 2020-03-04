<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Application\Login;

final class LoginQuery
{
    private string $email;

    private string $password;

    private function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public static function create(string $email, string $password): self
    {
        return new self($email, $password);
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }
}
