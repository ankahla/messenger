<?php

namespace Model\Entity;

class Message
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $receiverId;

    /**
     * @var string
     */
    private $content;

    /**
     * @var bool
     */
    private $unread;

    /**
     * @var \DateTime
     */
    private $createdAt;

    public function __construct(int $userId)
    {
        $this->$userId = $userId;
        $this->createdAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setReceiverId(int $receiverId): self
    {
        $this->receiverId = $receiverId;

        return $this;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setUnread(bool $unread): self
    {
        $this->unread = $unread;

        return $this;
    }

    public function isUnread(): bool
    {
        return $this->unread;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}