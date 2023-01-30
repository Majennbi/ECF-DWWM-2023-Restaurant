<?php

namespace App\EntityListener;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserListener
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function prePersist(User $user): void
    {
        $this->encode($user);
    }

    public function preUpdate(User $user): void
    {
        $this->encode($user);
    }

    /**
     * Encode password base on plainPassword
     * @param User $user
     * @return void
     */
    public function encode(User $user): void
    {
        if ($user->getPlainPassword() === null) {
            return;
        }

        $user->setPassword(
            $this->hasher->hashPassword(
            $user, 
            $user->getPlainPassword())
        );
    }
}