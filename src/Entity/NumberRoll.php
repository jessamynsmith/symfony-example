<?php

namespace App\Entity;

use App\Repository\NumberRollRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NumberRollRepository::class)
 */
class NumberRoll
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $remote_addr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $forwarded_for;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getRemoteAddr(): ?string
    {
        return $this->remote_addr;
    }

    public function setRemoteAddr(string $remote_addr): self
    {
        $this->remote_addr = $remote_addr;

        return $this;
    }

    public function getForwardedFor(): ?string
    {
        return $this->forwarded_for;
    }

    public function setForwardedFor(string $forwarded_for): self
    {
        $this->forwarded_for = $forwarded_for;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
