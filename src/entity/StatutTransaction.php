<?php

namespace App\Entity;

enum StatutTransaction:string {
    case VALIDE = 'Valide';
    case ANNULE = 'Annule';
    // case EN_ATTENTE = 'EN_ATTENTE';
}