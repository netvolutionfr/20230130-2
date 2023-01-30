<?php
require 'Utilisateur.php';
$utilisateur = new Utilisateur();

if ($utilisateur->getUtilisateurByEmail('titi@example.com')) {
    $utilisateur->affiche();
} else {
    echo 'Utilisateur introuvable';
}
