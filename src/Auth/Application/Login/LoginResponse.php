<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Application\Login;

use ArtishUp\Shared\Application\Response;

final class LoginResponse extends Response
{
    private string $token;

    private function __construct(string $token)
    {
        $this->token = $token;
    }

    public static function create(string $token): self
    {
        return new self($token);
    }

    public function token(): string
    {
        return $this->token;
    }

    function toArray(): array
    {
        return [
            'token' => $this->token()
        ];
    }
}
