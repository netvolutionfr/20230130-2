<?php

class Utilisateur
{
    public int $id;
    public string $nom;
    public string $prenom;
    public string $email;

    public function __construct()
    {
        $this->id = 0;
        $this->nom = '';
        $this->prenom = '';
        $this->email = '';
    }

    public function getUtilisateurById(int $id): bool
    {
        require 'db.php';

        $sql = 'SELECT * FROM utilisateur WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['id'];
            $this->nom = $row['nom'];
            $this->prenom = $row['prenom'];
            $this->email = $row['email'];

            return true;
        }

        return false;
    }

    public function getUtilisateurByEmail(string $email): bool
    {
        require 'db.php';

        $sql = 'SELECT * FROM utilisateur WHERE email = :email';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['id'];
            $this->nom = $row['nom'];
            $this->prenom = $row['prenom'];
            $this->email = $row['email'];

            return true;
        }

        return false;
    }

    public function affiche() {
        echo $this->nom . ' ' . $this->prenom . ' (' . $this->email . ')';
    }
}