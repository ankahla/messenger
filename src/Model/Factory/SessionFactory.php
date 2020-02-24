<?php

namespace Model\Factory;

use Model\Entity\Session;

final class SessionFactory
{
    public static function create(array $dbRow): Session
    {
        return (new Session($dbRow['user_id']))
            ->setId($dbRow['id'])
            ->setUsername($dbRow['username'] ?? '')
            ->setCreatedAt(new \DateTime($dbRow['created_at'], new \DateTimeZone('Europe/Paris')));
    }
}
