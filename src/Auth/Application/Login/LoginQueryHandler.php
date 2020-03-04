<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Application\Login;

use Firebase\JWT\JWT;
use ArtishUp\Auth\Domain\ValueObject\Email;
use ArtishUp\Auth\Domain\ValueObject\Password;
use ArtishUp\Auth\Domain\Repository\UserRepository;

final class LoginQueryHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(LoginQuery $query): ?LoginResponse
    {
        $email = Email::create($query->email());
        $password = Password::create($query->password());

        $user = $this->userRepository->findByEmail($email);

        //TODO: verify password
        $secret = 'SAW!@$#DWAS@!#';

        if ($user) {
            $jwt = JWT::encode($user->toArray(), $secret);

            return LoginResponse::create($jwt);
        }

        return null;
    }
}
