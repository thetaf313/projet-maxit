<?php

namespace App\Entity;

use App\Core\Abstract\AbstractEntity;

class User extends AbstractEntity {

    private int $id;
    private string $prenom;
    private string $nom;
    private string $adresse;
    private string $login;
    private string $password;
    private string $nin;
    private string $photoRecto;
    private string $photoVerso;
    private Role $role;
    private array $comptes = [];

    public function __construct(int $id=0, string $prenom='', string $nom='', string $adresse='', string $login='', string $password='', string $nin='', string $photoRecto='', string $photoVerso='')
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->login = $login;
        $this->password = $password;
        $this->nin = $nin;
        $this->photoRecto = $photoRecto;
        $this->photoVerso = $photoVerso;
        $this->role = new Role();
    }

    public static function toObject(array $array): static {
        $user = new static();
        $user->setId($array['id'] ?? 0);
        $user->setPrenom($array['prenom'] ?? '');
        $user->setNom($array['nom'] ?? '');
        $user->setAdresse($array['adresse'] ?? '');
        $user->setLogin($array['login'] ?? '');
        $user->setPassword($array['password'] ?? '');
        $user->setNin($array['numero_carte_identite'] ?? '');
        $user->setPhotoRecto($array['photo_identite_recto'] ?? '');
        $user->setPhotoVerso($array['photo_identite_verso'] ?? '');
        $user->getRole()->setId($array['role_id'] ?? 0);
        return $user;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->getId(),
            "prenom" => $this->getPrenom(),
            "nom" => $this->getNom(),
            "adresse" => $this->getAdresse(),
            "login" => $this->getLogin(),
            "password" => $this->getPassword(),
            "nin" => $this->getNin(),
            "photo_recto" => $this->getPhotoRecto(),
            "photo_verso" => $this->getPhotoVerso(),
            "role" => $this->getRole() ? $this->getRole()->toArray() : null,
            "comptes" => array_map(fn($compte) => $compte->toArray(), $this->getComptes()),
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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of nin
     */ 
    public function getNin()
    {
        return $this->nin;
    }

    /**
     * Set the value of nin
     *
     * @return  self
     */ 
    public function setNin($nin)
    {
        $this->nin = $nin;

        return $this;
    }

    /**
     * Get the value of photoRecto
     */ 
    public function getPhotoRecto()
    {
        return $this->photoRecto;
    }

    /**
     * Set the value of photoRecto
     *
     * @return  self
     */ 
    public function setPhotoRecto($photoRecto)
    {
        $this->photoRecto = $photoRecto;

        return $this;
    }

    /**
     * Get the value of photoVerso
     */ 
    public function getPhotoVerso()
    {
        return $this->photoVerso;
    }

    /**
     * Set the value of photoVerso
     *
     * @return  self
     */ 
    public function setPhotoVerso($photoVerso)
    {
        $this->photoVerso = $photoVerso;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of comptes
     */ 
    public function getComptes()
    {
        return $this->comptes;
    }

    /**
     * Set the value of comptes
     *
     * @return  self
     */ 
    public function addCompte(Compte $compte)
    {
        $this->comptes[] = $compte;

        return $this;
    }
}