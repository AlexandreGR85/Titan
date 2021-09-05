<?php

namespace Controllers;

class Home extends Controller 
{
   public function index() {
       
        //affichage
        \Renderer::show($this->tplVars);
        
    }
    
    
}