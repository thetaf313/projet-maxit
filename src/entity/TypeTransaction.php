<?php

namespace App\Entity;

enum TypeTransaction: string {

    case PAIEMENT = 'PAIEMENT';
    case DEPOT = 'DEPOT';
    case RETRAIT = 'RETRAIT';
}