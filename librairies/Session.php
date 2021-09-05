<?php

/**
 * CLASSE DE GESTION DE LA SESSION (Y COMPRIS LES MESSAGES D'ERREUR !)
 * ---------------------------------
 * Cette classe donne toutes les méthodes utiles pour travailler sur la session.
 *
 * Ses méthodes sont statiques de façon à ce qu'on n'ait pas besoin de créer un objet issu de cette classe pour en utiliser les méthodes comme par exemple :
 *
 * $session = new Session();
 * $session->addFlash('error', "un message d'erreur");
 *
 * On peut directement appeler les méthodes sur la classe elle-même :
 *
 * Session::addFlash('error', "un message d'erreur")
 *
 * C'est beaucoup plus simple / rapide / clair !
 *
 * Voilà l'utilité des méthodes déclarées comme static !
 */
class Session
{

    /**
     * Permet d'ajouter un message Flash
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    public static function addFlash(string $type, string $message)
    {
        if (empty($_SESSION['messages'])) {
            $_SESSION['messages'] = [
                'error' => [],
                'success' => [],
            ];
        }
        $_SESSION['messages'][$type][] = $message;
    }

    /**
     * Permet de récupérer tout en supprimant les messages d'un certain type
     *
     * @param string $type
     * @return array
     */
    public static function getFlashes(string $type): array
    {
        if (empty($_SESSION['messages'])) {
            return [];
        }

        $messages = $_SESSION['messages'][$type];

        $_SESSION['messages'][$type] = [];

        return $messages;
    }

    /**
     * Permet de savoir si il existe des messages d'un certain type
     *
     * @param string $type
     * @return boolean
     */
    public static function hasFlashes(string $type): bool
    {
        if (empty($_SESSION['messages'])) {
            return false;
        }

        return !empty($_SESSION['messages'][$type]);
    }
    
    

}
