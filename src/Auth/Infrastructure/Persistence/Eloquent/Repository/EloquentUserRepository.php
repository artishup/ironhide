<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Infrastructure\Persistence\Eloquent\Repository;

use DateTime;
use ArtishUp\Auth\Domain\Entity\User;
use ArtishUp\Auth\Domain\Repository\UserRepository;
use ArtishUp\Auth\Domain\ValueObject\Email;
use ArtishUp\Auth\Domain\ValueObject\Password;
use ArtishUp\Auth\Infrastructure\Persistence\Eloquent\Model\EloquentUser;
use ArtishUp\Shared\Domain\ValueObject\Uuid;

class EloquentUserRepository implements UserRepository
{

    public function findByEmail(Email $email): ?User
    {
        $user = EloquentUser::query()->where('email', $email->value())->first();

        if ($user) {
            return User::create(
                Uuid::fromString($user->uuid),
                $user->first_name,
                $user->last_name,
                Email::create($user->email),
                Password::create($user->password),
                DateTime::createFromFormat('m-d-Y H:i:s', $user->created_at),
                DateTime::createFromFormat('m-d-Y H:i:s', $user->updated_at)
            );
        }

        return null;
    }
}
