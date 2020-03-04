<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Domain\Repository;

use ArtishUp\Auth\Domain\Entity\User;
use ArtishUp\Auth\Domain\ValueObject\Email;

interface UserRepository
{

    public function findByEmail(Email $email): ?User;
}
