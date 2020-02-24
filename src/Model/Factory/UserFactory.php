<?php

namespace Model\Factory;

use Model\Entity\User;

final class UserFactory
{
    public static function create(array $dbRow): User
    {
        return (new User(
            $dbRow['email'],
            $dbRow['first_name'],
            $dbRow['last_name']
        ))
            ->setId($dbRow['id'])
            ->setHashedPasswd($dbRow['passwd']);
    }
}
