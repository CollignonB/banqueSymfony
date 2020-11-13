<?php

namespace App\Entity;

use App\Repository\AccountsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountsRepository::class)
 */
class Accounts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $opening_date;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="accounts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=AccountTypes::class, inversedBy="accounts")
     */
    private $AccountType;

    /**
     * @ORM\OneToMany(targetEntity=Transferts::class, mappedBy="Accounts")
     */
    private $transferts;

    public function __construct()
    {
        $this->transferts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOpeningDate(): ?\DateTimeInterface
    {
        return $this->opening_date;
    }

    public function setOpeningDate(\DateTimeInterface $opening_date): self
    {
        $this->opening_date = $opening_date;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->User;
    }

    public function setUser(?Users $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getAccountType(): ?AccountTypes
    {
        return $this->AccountType;
    }

    public function setAccountType(?AccountTypes $AccountType): self
    {
        $this->AccountType = $AccountType;

        return $this;
    }

    /**
     * @return Collection|Transferts[]
     */
    public function getTransferts(): Collection
    {
        return $this->transferts;
    }

    public function addTransfert(Transferts $transfert): self
    {
        if (!$this->transferts->contains($transfert)) {
            $this->transferts[] = $transfert;
            $transfert->setAccounts($this);
        }

        return $this;
    }

    public function removeTransfert(Transferts $transfert): self
    {
        if ($this->transferts->removeElement($transfert)) {
            // set the owning side to null (unless already changed)
            if ($transfert->getAccounts() === $this) {
                $transfert->setAccounts(null);
            }
        }

        return $this;
    }
}
