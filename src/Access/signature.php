<?php

namespace katosdev\Signature\Access;

use katosdev\signature;
use Flarum\User\Access\AbstractPolicy;
use Flarum\User\User;

class user extends AbstractPolicy
{
    public function setSignature(User $actor, string $ability, signature $user)
    {
        if ($actor->hasPermission('setSignature')
        &&
        (
            $actor->id === $user->id
            ||
            (
                $actor->id !== $user->id && $actor->setSignature('edit', $user)
            )
        )
    )
        return $this->allow();
    else
        return $this->deny();
}
}
