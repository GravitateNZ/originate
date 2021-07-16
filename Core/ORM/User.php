<?php

namespace MillenniumFalcon\Core\ORM;

use MillenniumFalcon\Core\ORM\Traits\UserTrait;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

class User extends \MillenniumFalcon\Core\ORM\Generated\User implements UserInterface, EquatableInterface, \Serializable, PasswordUpgraderInterface
{
    use UserTrait;

    /**
     * @param User $user
     * @param string $newEncodedPassword
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        $user->setPassword($newEncodedPassword);
        $user->save();
    }
}