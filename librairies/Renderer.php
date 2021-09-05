<?php
/* class traitant le rendu html de la page */

class Renderer {
    
    /**
     * La fonction show() permet d'afficher un template.
     *
     * @param string $template Le chemin vers le fichier .phtml sans l'extension
     * @param array $variables Le tableau associatif contenant les variables utilisées dans le template PHTML
     * @return void
     */
    public static function show(array $tplVars = [])
    {
       
        
        require('librairies/templates/layout.phtml');

    }
    
    public static function showSuccess(array $tplVars = []){

        require('librairies/templates/layoutSuccess.phtml');

    }
}