<?php

namespace katosdev\Signature\Access;

use katosdev\signature;
use Flarum\User\Access\AbstractPolicy;
use Flarum\User\User;

class signature extends AbstractPolicy
{
    public function can(User $actor, string $ability, signature $model)
    {
        if ($actor->hasPermission('setSignature')
        &&
        (
            $actor->id === $user->id
            ||
            (
                $actor->id !== $user->id && $actor->can('edit', $model)
            )
        )
    )
        return $this->allow();
    else
        return $this->deny();
}
}
