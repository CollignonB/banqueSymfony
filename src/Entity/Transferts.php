<?php

namespace App\Entity;

use App\Repository\TransfertsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransfertsRepository::class)
 */
class Transferts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $type;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity=Accounts::class, inversedBy="transferts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Accounts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAccounts(): ?Accounts
    {
        return $this->Accounts;
    }

    public function setAccounts(?Accounts $Accounts): self
    {
        $this->Accounts = $Accounts;

        return $this;
    }
}
