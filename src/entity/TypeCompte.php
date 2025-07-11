<?php

namespace App\Entity;

enum TypeCompte: string {
    case PRINCIPAL = 'PRINCIPAL';
    case SECONDAIRE = 'SECONDAIRE';
}