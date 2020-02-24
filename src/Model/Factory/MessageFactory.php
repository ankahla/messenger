<?php

namespace Model\Factory;

use Model\Entity\Message;

final class MessageFactory
{
    public static function create(array $dbRow): Message
    {
        return (new Message($dbRow['sender_id']))
            ->setId($dbRow['id'])
            ->setReceiverId($dbRow['receiver_id'])
            ->setContent($dbRow['content'])
            ->setCreatedAt(new \DateTime($dbRow['created_at'], new \DateTimeZone('Europe/Paris')));
    }
}
