<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class People
{
  private $id;
  private $name;
  private $picture_url;
  private $actor_id;

    /**
   * Find a person based on its id
   *
   * @param int $id
   * @return self
   */
  public function find($id)
  {
    $pdo = Database::getPDO();

    $sqlQuery = "SELECT * FROM people WHERE id = {$id}";

    $pdoStatement = $pdo->query($sqlQuery);

    $people = $pdoStatement->fetchObject(self::class);

    return $people;
  }

  /**
   * Fin all persons
   *
   * @return array[objects]
   */
  public function findAll()
  {
    $pdo = Database::getPDO();
    
    $sqlQuery = "SELECT * FROM people";

    $pdoStatement = $pdo->query($sqlQuery);

    $peoplesList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    return $peoplesList;
  }

  public function findActors($id)
  {
    $pdo = Database::getPDO();
    
    $sqlQuery = "SELECT movie_actors.actor_id as id, people.name as name, people.picture_url as picture_url
                FROM movie_actors
                JOIN people ON movie_actors.actor_id = people.id
                WHERE movie_id = {$id}
                ORDER BY `order`";

    $pdoStatement = $pdo->query($sqlQuery);

    $actorsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

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
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of picture_url
   */ 
  public function getPictureUrl()
  {
    return $this->picture_url;
  }

  /**
   * Set the value of picture_url
   *
   * @return  self
   */ 
  public function setPictureUrl($picture_url)
  {
    $this->picture_url = $picture_url;

    return $this;
  }

  /**
   * Get the value of actor_id
   */ 
  public function getActorId()
  {
    return $this->actor_id;
  }

  /**
   * Set the value of actor_id
   *
   * @return  self
   */ 
  public function setActorId($actor_id)
  {
    $this->actor_id = $actor_id;

    return $this;
  }
}