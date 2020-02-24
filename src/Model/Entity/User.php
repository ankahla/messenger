<?php

namespace Model\Entity;

class User
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var null|string
     */
    private $firstName;

    /**
     * @var null|string
     */
    private $lastName;

    /**
     * @var string
     */
    private $hashedPasswd;

    public function __construct($email, $firstName = '', $lastName = '')
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setHashedPasswd(string $hashedPasswd): self
    {
        $this->hashedPasswd = $hashedPasswd;

        return $this;
    }

    public function getHashedPasswd(): ?string
    {
        return $this->hashedPasswd;
    }
}
