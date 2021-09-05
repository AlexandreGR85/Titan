<?php

namespace Controllers;


abstract class Controller
{
   
    protected $model;
    
    
    protected $tplVars = []; //un tableau qui contiendra toutes les valeurs par default à transmettre au template
  
    public function __construct()
    {

    // 1. Vérifier que le développeur a bien renseigné le nom d'un model
    if (!empty($this->modelName)) {
            // 2. Vérifier si le model existe
            $chemin = str_replace("\\", "/", "librairies/{$this->modelName}.php");
            // Si $this->modelName contient "User", ça donne "libraries/Models/User.php"

        $this->model = new $this->modelName();
        
    }
    
        
        /*
        initialisation des données par default
        */
        
        
        $this->tplVars = $this->tplVars + ['WWW_URL' => WWW_URL];
        
    }

}
