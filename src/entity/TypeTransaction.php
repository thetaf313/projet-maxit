<?php

namespace App\Entity;

enum TypeTransaction: string {

    case PAIEMENT = 'Paiement';
    case DEPOT = 'Depot';
    case RETRAIT = 'Retrait';
}