<?php

namespace Tests\Traits;

use App\Models\User;
use Tests\TestCase;

trait ActingJWTUser
{
    public function JWTActingAs(User $user)
    {
        $token = auth('api')->fromUser($user);
        $this->withHeaders(['Authorization' => 'Bearer '.$token]);

        return $this;
    }
}
