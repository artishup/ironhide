<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Infrastructure\Persistence\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

class EloquentUser extends Model
{
    protected $table = 'users';
}
