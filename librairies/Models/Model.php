<?php

namespace Models;



/**

 * LES PROPRIETES :
 * -----------------
 * - $db est un objet de la classe PDO qui représente la connexion à la base de données
 * - $table  est une chaine de caractère qui indique au model à quelle table il s'intéresse !
 *
 * LA METHODE :
 * -----------------
 
 * insert($array) : insertion d'une nouvelle ligne dans la table
 
 */
abstract class Model
{
    
    protected $db;

    protected $table;

    /**
     * Constructeur qui vérifie que la table est bien précisée
     * et qui met en place la connexion à la base de données
     */
    public function __construct(){
        // 1. On vérifie que le nom de la table est bien précisé
        if (empty($this->table)) {
            // Si le développeur a zappé cette étape, on la lui rappelle avec une bonne grosse erreur !
            throw new \Exception('Vous devez absolument spécifier une propriété <em>protected $table</em> dans votre classe ' . get_called_class() . ' qui hérite de Model et qui contient le nom de la table à attaquer.');
        }

        // 2. Si tout est bon, on créé l'objet PDO en utilisant les données du fichier de configuration
       $this->db =\Database::getInstance();
        //$this->db = getInstance();
    }

    
    /**
     * Permet d'insérer un nouvel enregistrement 
     *
     * @param array $data
     * @return integer
     */
    public function insert(array $data): int{
        $sql = "INSERT INTO $this->table SET ";

        $columns = array_keys($data);
        $sqlColumns = [];

        foreach ($columns as $column) {
            $sqlColumns[] = "$column = :$column";
        }

        $sql .= implode(",", $sqlColumns);

        $query = $this->db->prepare($sql);

        $query->execute($data);

        return $this->db->lastInsertId();
    }

}