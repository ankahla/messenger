<?php

namespace Model\Entity;

class Session
{
    /**
     * session duration in secondes
     *
     * @var int
     */
    public const MAX_DURATION = 1800;

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $username;

    /**
     * @var \DateTime
     */
    private $createdAt;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
        $this->username = '';
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

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
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

    public function isExpired(): bool
    {
        $now = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $now->modify(sprintf('-%d seconde', self::MAX_DURATION));

        return $this->createdAt < $now;
    }
}