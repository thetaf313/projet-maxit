<?php

namespace App\Entity;

enum StatutTransaction:string {
    case VALIDE = 'VALIDE';
    case ECHOUE = 'ECHOUE';
    case ANNULE = 'ANNULE';
    // case EN_ATTENTE = 'EN_ATTENTE';
}