<?php

require_once "SingletonPattern.php";

class Database extends SingletonPattern {
  /**
   * Hold the Database connection.
   *
   * @var mysqli|NULL $connection
   */
  private ?mysqli $connection  = null;

  /**
   * Prevent the direct creation of the object.
   *
   *
   * @return void
   */
  protected function __construct() {
    parent::__construct();
    $this->connection =  new mysqli('localhost',  'root', 'admin', 'test');
  }

  /**
   * Get the connection.
   * @return \mysqli|null
   */
  public static function getConnection(): ?mysqli {
    $connection = self::getInstance();
    return $connection->connection;
  }
}