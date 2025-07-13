<?php

namespace App\Entity;

class Compte {

    private int $id;
    private string $telephone;
    private float $solde;
    private ?TypeCompte $typeCompte;
    private User $user;
    private array $transactions = [];

    public function __construct(int $id=0, $telephone='', float $solde=0.0, ?TypeCompte $typeCompte=null)
    {
        $this->id = $id;
        $this->telephone = $telephone;
        $this->solde = $solde;
        $this->typeCompte = $typeCompte;
        $this->user = new User();
    }

    public static function toObject(array $data): Compte
    {
        $compte = new Compte(
            $data['id'] ?? 0,
            $data['telephone'] ?? '',
            $data['solde'] ?? 0.0,
            isset($data['type_compte']) ? TypeCompte::from($data['type_compte']) : null
        );
        if (isset($data['user'])) {
            $compte->setUser(User::toObject($data['user']));
        }
        return $compte;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'telephone' => $this->telephone,
            'solde' => $this->solde,
            'type_compte' => $this->typeCompte ? $this->typeCompte->value : null,
            'user' => $this->user->toArray(),
            'transactions' => array_map(fn($transaction) => $transaction->toArray(), $this->transactions)
        ];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @return  self
     */ 
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }


    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of transactions
     */ 
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Set the value of transactions
     *
     * @return  self
     */ 
    public function addTransaction(Transaction $transaction)
    {
        $this->transactions[] = $transaction;

        return $this;
    }

    /**
     * Get the value of typeCompte
     */ 
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }

    /**
     * Set the value of typeCompte
     *
     * @return  self
     */ 
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }
}