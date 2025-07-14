<?php

namespace App\Entity;

use DateTime;

class Transaction {

    private int $id;
    private DateTime $date;
    private float $montant;
    private Compte $compte;
    private TypeTransaction $typeTransaction;
    private StatutTransaction $statutTransaction;

    public function __construct(int $id=0, ?DateTime  $date=null, float $montant=0.0, ?TypeTransaction $typeTransaction=null, ?StatutTransaction $statutTransaction=null)
    {
        $this->id = $id;
        $this->date = $date;
        $this->montant = $montant;
        $this->compte = new Compte();
        $this->typeTransaction = $typeTransaction;
        $this->statutTransaction = $statutTransaction;
    }

    public static function toObject(array $data): Transaction
    {
        $transaction = new Transaction(
            $data['id'] ?? 0,
            isset($data['date']) ? new DateTime($data['date']) : null,
            $data['montant'] ?? 0.0,
            isset($data['type_transaction']) ? TypeTransaction::from($data['type_transaction']) : null,
            isset($data['statut_transaction']) ? StatutTransaction::from($data['statut_transaction']) : null
        );
        if (isset($data['compte_id'])) {
            $transaction->getCompte()->setId($data['compte_id']);
        }
        return $transaction;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date->format('Y-m-d H:i:s'),
            'montant' => $this->montant,
            'compte_id' => $this->compte->getId(),
            'type_transaction' => $this->typeTransaction ? $this->typeTransaction->value : null,
            'statut_transaction' => $this->statutTransaction ? $this->statutTransaction->value : null
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
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of compte
     */ 
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set the value of compte
     *
     * @return  self
     */ 
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get the value of typeTransaction
     */ 
    public function getTypeTransaction()
    {
        return $this->typeTransaction;
    }

    /**
     * Set the value of typeTransaction
     *
     * @return  self
     */ 
    public function setTypeTransaction($typeTransaction)
    {
        $this->typeTransaction = $typeTransaction;

        return $this;
    }

    /**
     * Get the value of statutTransaction
     */ 
    public function getStatutTransaction()
    {
        return $this->statutTransaction;
    }

    /**
     * Set the value of statutTransaction
     *
     * @return  self
     */ 
    public function setStatutTransaction($statutTransaction)
    {
        $this->statutTransaction = $statutTransaction;

        return $this;
    }
}