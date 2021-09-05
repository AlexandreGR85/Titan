<?php

ini_set('display_errors', 'on'); 

//constante définissant le chemin vers le projet
define('WWW_URL', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

//fichier contenant toutes les constantes de configuration
require_once("configuration.php");


//essaie de l'action, interception avec catch si erreur
    
    //chargement automatique des fichiers contenant les objects necessaires dans le script
    require_once("librairies/autoload.php");
    
    //création de l'instance du controller et appel de la méthode principale
    \Application::process();
    
  


