<?php
class QueryBuilder {
     protected $pdo;

     public function __construct(PDO $pdo) {
          $this->pdo = $pdo;
     }

     public function all($table) {
          $statement = $this->pdo->prepare("SELECT * FROM {$table}");
          $statement->execute();
          return $statement->fetchAll(PDO::FETCH_CLASS);
     }

     public function insert($table, $parameters) {
          $query = sprintf('insert into %s (%s) values (%s)',
               $table,
               implode(', ', array_keys($parameters)),
               ':' . implode(', :', array_keys($parameters))
          );
          try {
               $statement = $this->pdo->prepare($query);
               $statement->execute($parameters);
               return true;
          } catch (\Exception $e) {
               die($e->getMessage());
               die('whooops! something went wrong.');
          }

     }

     public function select($table, $conditions) {
          $con = "";
          foreach($conditions as $column => $value):
               $con .= " {$column} = '{$value}' AND";
          endforeach;
          $con = $con ? "where" . trim($con, 'AND') : "";
          $statement = $this->pdo->prepare("SELECT * FROM {$table} " . $con);
          $statement->execute();
          return $statement->fetchAll(PDO::FETCH_CLASS);
     }

     public function selectId($table, $id) {
          try {
               $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");
               $statement->execute();
               return $statement->fetchAll(PDO::FETCH_CLASS);
          } catch (Exception $e) {
               throw new Exception($e->getMessage());
          }    
     }

     public function update($table, $id, $parameters) {
          $query = "UPDATE {$table} SET";
          $comma = " ";
          foreach($parameters as $column => $value):
               if(!empty($value)){
                    $query .= $comma . $column . " = '" . trim($value) . "'";
                    $comma = ", ";
               }
          endforeach;
          $query .= " WHERE id = {$id}";
          try {
               $statement = $this->pdo->prepare($query);
               $statement->execute();
               return true;
          } catch (\Exception $e) {
               die($e->getMessage());
               die('whooops! something went wrong.');
          }
     }

     public function selectRaw($query) {
          try {
               $statement = $this->pdo->prepare($query);
               $statement->execute();
               return $statement->fetchAll(PDO::FETCH_CLASS);
          } catch (\Exception $e) {
               die($e->getMessage());
               die('whooops! something went wrong.');
          }
     }

     public function delete($table, $id) {
          $query = "DELETE FROM {$table} WHERE id = {$id}";
          try {
               $statement = $this->pdo->prepare($query);
               $statement->execute();
               return true;
          } catch (Exception $e) {
               return false;
          }
     }
}
