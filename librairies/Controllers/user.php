<?php

namespace Controllers;

class User extends Controller{

    protected $modelName = \Models\users::class;

    public function create() 
    {
        
        
        //quels controle on doit faire avant de lancer une insertion dans la base ?
        
        //vérifier la présence des champs obligatoire
          
        if (empty($_POST['name']) ||
            empty($_POST['surname']) ||
            empty($_POST['email'])) 
          
        {
            //au moins un des champs obligatoires non rempli
            \Session::addFlash('error', 'au moins un des champs obligatoires non rempli !');
          
        }
        
        //test firstname et lastname non numérique
        if (ctype_digit($_POST['name']) || ctype_digit($_POST['surname']))
        {
            //au moins le nom ou le prénom est numérique
            \Session::addFlash('error', 'nom et prénom ne peuvent pas être numérique !');
            
            
        }
        
        //vérifier le format de l'email
        //utiliser filter_var('bob@example.com', FILTER_VALIDATE_EMAIL)
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            //l'email n'est pas au bon format
            \Session::addFlash('error', 'l\'email n\'est pas au bon format !');
            
        }
        
        
        //traiter le formulaire
        //preparation un tableau
        $data['Name'] = $_POST['name'];
        $data['Surname'] = $_POST['surname'];
        $data['Mail'] = $_POST['email'];
        //si on arrive ici on va pouvoir insérer

        $this->model->insert($data);
        
    }
    
}
        
               
    
