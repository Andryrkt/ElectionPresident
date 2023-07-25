<?php

namespace Models;

class User extends Model
{
    protected string $table = 'users';

   public function getByUser(string $nom)
   {
    $statement = $this->getPDO()->prepare("SELECT * FROM {$this->table} WHERE nom = ?");
    $statement->execute([$nom]);
    return $statement->fetch();
   }
}