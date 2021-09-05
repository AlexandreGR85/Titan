<?php

namespace Controllers;

class Home extends Controller 
{
   public function index() {
       
        //affichage
        \Renderer::show($this->tplVars);
        
    }

    public function success() {
       
        //affichage
       
        $this->tplVars = [];
        $this->tplVars = $this->tplVars + ['EXERCICE_ADIMEO/librairie/Controllers/welcome'];
        
        \Renderer::showSuccess($this->tplVars);
        
    }

    
    
}