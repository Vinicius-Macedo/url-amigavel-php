<?php

class Database
{

  private $servername = 'localhost';
  private $username = 'root';
  private $password = 'password';
  private $dbname = 'db_php_projeto';
  private $port = '3306';
  private $dbh;
  private $stmt;

  public function __construct()
  {
    $dsn = 'mysql:host=' . $this->servername . ';port=' . $this->port . ';dbname=' . $this->dbname;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  public function bind($parametro, $valor, $tipo = null)
  {
    if (is_null($tipo)) :
      switch (true):
        case is_int($valor):
          $tipo = PDO::PARAM_INT;
          break;
        case is_bool($valor):
          $tipo = PDO::PARAM_BOOL;
          break;
        case is_null($valor):
          $tipo = PDO::PARAM_NULL;
          break;
        default:
          $tipo = PDO::PARAM_STR;
      endswitch;
    endif;

    $this->stmt->bindValue($parametro, $valor, $tipo);
  }

  public function execute()
  {
    return $this->stmt->execute();
  }

  public function fetch()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function fetchAll()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }
}
