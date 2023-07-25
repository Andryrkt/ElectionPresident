<?php

namespace Models;
use PDO;
use PDOException;
use Source\Constant;

class Model
{
    protected static PDO $pdo;
    protected string $table;

    public function __construct()
    {
        try {
            static::$pdo = new PDO('mysql:host='.Constant::DB_HOST.';dbname='.Constant::DB_NAME,
            Constant::DB_USERNAME,
            Constant::DB_PASSWORD, 
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage(); die();
        }

        $this->table = strtolower(explode('\\', get_class($this))[1]) . 's';
    }

    protected function getPDO(): PDO
    {
        return static::$pdo;
    }

    public function all(): array
    {
       $statement =  $this->getPDO()->query("SELECT * FROM {$this->table}");

       return $statement->fetchAll();
    } 

    public function findById(int $id)
    {
        $statement = $this->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function executerRequete($requete, ?array $params = []) 
    {
        $statement = $this->getPDO()->prepare($requete);
        $statement->execute($params);
        return $statement;
    }

    public function recupererResultats($requete, ?array $params = []) : array 
    {
        $statement = $this->executerRequete($requete, $params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    Public function insertData(array $input)
    {   
        foreach ($input as $key => $value) {
            $tabKey[] = $key;
            if ($value == '') {
                $tabValue [] = null;
            } else if ($key == 'mdp') {
                $tabValue [] = password_hash($value, PASSWORD_DEFAULT);
            }else{   
                $tabValue[] = $value;
            } 
        }
        unset($tabKey[count($tabKey)-1]);
        unset($tabValue[count($tabValue)-1]);
    
        $ligneKey = implode(',', $tabKey);
   
        for ($i=0; $i < count($tabValue) ; $i++) { 
            $tabBaraingo[] = '?';
        }

        $ligneValue = implode(',', $tabBaraingo);
   
        $sql = "INSERT INTO {$this->table}($ligneKey) 
                VALUE ($ligneValue)";

        $this->executerRequete($sql, $tabValue);
    }

    

    public function destroy(int $id) 
    {
        $requete = "DELETE FROM {$this->table} WHERE id= ?";
        return $this->executerRequete($requete, [$id]);
    }
    
    public function update(int $id, array $donnees) 
    {
        $champs = [];
        foreach ($donnees as $champ => $valeur) {
            $champs[] = "{$champ} = :{$champ}";
        }
        $champsClause = implode(", ", $champs);
        $requete = "UPDATE {$this->table} SET $champsClause WHERE id = $id";
       return $this->executerRequete($requete, $donnees);
    }

}