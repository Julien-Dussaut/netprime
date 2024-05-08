<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\Movie;
use App\Models\People;

class MainController extends CoreController {

    /**
     * Méthode qui se charge d'afficher la page d'accueil
     *
     * @return void
     */
    public function homeAction()
    {
        $this->show('home');
    }

    /**
     * Méthode qui se charge d'affimoviesList
     * @return void
     */
    public function searchAction()
    {
        $searchedTerm = filter_input(INPUT_GET, 'search');
        $movieInController = new Movie();
        $moviesList = $movieInController->searchByTitle($searchedTerm);
        
        $this->show('result', ['moviesList' => $moviesList, 'searchedTerm' => $searchedTerm]);
    }

    public function movieAction()
    {
        $id = intval(substr($_GET['page'], strrpos($_GET['page'], '/') + 1, strlen($_GET['page'])));
        $movieInController = new Movie();
        $movie = $movieInController->find($id);

        $director = $movie->getDirector();
        $composer = $movie->getComposer();
        $actorsList = $movie->getActors();
        $this->show('movie', ['movie' => $movie, 'director' => $director, 'composer' => $composer, 'actorsList' => $actorsList]);
    }

}