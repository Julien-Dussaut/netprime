<?php

namespace App\Models;

use App\Utils\Database;
use PDO;
use App\Models\People;
require __DIR__ . '/People.php';

class Movie
{
  private $id;
  private $release_date;
  private $title;
  private $synopsis;
  private $rating;
  private $poster_url;
  private $background_url;
  private $director_id;
  private $composer_id;

  /**
   * Find a movie based on its id
   *
   * @param int $id
   * @return self
   */
  public function find($id)
  {
    $pdo = Database::getPDO();
    
    $sqlQuery = "SELECT * FROM movies WHERE id = {$id}";

    $pdoStatement = $pdo->query($sqlQuery);

    $movie = $pdoStatement->fetchObject(self::class);

    return $movie;
  }

  /**
   * Fin all movies
   *
   * @return array[objects]
   */
  public function findAll()
  {
    $pdo = Database::getPDO();
    
    $sqlQuery = "SELECT * FROM movies";

    $pdoStatement = $pdo->query($sqlQuery);

    $moviesList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    return $moviesList;
  }

  public function searchByTitle($title)
  {
    $pdo = Database::getPDO();
    
    $sqlQuery = 'SELECT * FROM movies WHERE title LIKE \'%' . $title . '%\'';

    $pdoStatement = $pdo->query($sqlQuery);

    $moviesList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    return $moviesList;
  }

  /**
   * Retrieve a people with its id
   *
   * @param int $id
   * @return Object People
   */
  public function getDirector()
  {
    $directorInMovie = new People();
    
    $director = $directorInMovie->find($this->director_id);

    return $director;
  }

  /**
   * Retrieve a people with its id
   *
   * @param int $id
   * @return Object People
   */
  public function getComposer()
  {
    $composerInMovie = new People();
    
    $composer = $composerInMovie->find($this->composer_id);

    return $composer;
  }

  public function getActors()
  {
    $actorsInMovie = new People();

    $actorsList = $actorsInMovie->findActors($this->id);

    return $actorsList;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of release_date
   */ 
  public function getReleaseDate()
  {
    return $this->release_date;
  }

  /**
   * Set the value of release_date
   *
   * @return  self
   */ 
  public function setReleaseDate($release_date)
  {
    $this->release_date = $release_date;

    return $this;
  }

  /**
   * Get the value of title
   */ 
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */ 
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of synopsis
   */ 
  public function getSynopsis()
  {
    return $this->synopsis;
  }

  /**
   * Set the value of synopsis
   *
   * @return  self
   */ 
  public function setSynopsis($synopsis)
  {
    $this->synopsis = $synopsis;

    return $this;
  }

  /**
   * Get the value of rating
   */ 
  public function getRating()
  {
    return $this->rating;
  }

  /**
   * Set the value of rating
   *
   * @return  self
   */ 
  public function setRating($rating)
  {
    $this->rating = $rating;

    return $this;
  }

  /**
   * Get the value of poster_url
   */ 
  public function getPosterUrl()
  {
    return $this->poster_url;
  }

  /**
   * Set the value of poster_url
   *
   * @return  self
   */ 
  public function setPosterUrl($poster_url)
  {
    $this->poster_url = $poster_url;

    return $this;
  }

  /**
   * Get the value of background_url
   */ 
  public function getBackgroundUrl()
  {
    return $this->background_url;
  }

  /**
   * Set the value of background_url
   *
   * @return  self
   */ 
  public function setBackgroundUrl($background_url)
  {
    $this->background_url = $background_url;

    return $this;
  }

  /**
   * Get the value of director_id
   */ 
  public function getDirectorId()
  {
    return $this->director_id;
  }

  /**
   * Set the value of director_id
   *
   * @return  self
   */ 
  public function setDirectorId($director_id)
  {
    $this->director_id = $director_id;

    return $this;
  }

  /**
   * Get the value of composer_id
   */ 
  public function getComposerId()
  {
    return $this->composer_id;
  }

  /**
   * Set the value of composer_id
   *
   * @return  self
   */ 
  public function setComposerId($composer_id)
  {
    $this->composer_id = $composer_id;

    return $this;
  }
}