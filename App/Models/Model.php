<?php
namespace App\Models;

use PDO;
use App\Database\Database;

class Model extends Database
{
    public static function all()
    {
        $query = "SELECT * FROM " . static::$table;
        $stmt = self::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function show($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id = {$id}";
        $stmt = self::connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO " . static::$table . " ({$columns})  VALUES ({$values})";
        $stmt = self::connect()->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($id, $name)
    {
        $sql = "UPDATE " . static::$table . " SET name = ? WHERE id = ?";

        $con = self::connect()->prepare($sql);

        // Bind the parameters correctly
        $con->bindParam(1, $name);
        $con->bindParam(2, $id);

        if ($con->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public static function updateKitob($id, $name, $text, $muallif_id, $janr_id)
    {
        $sql = "UPDATE " . static::$table . " SET name = ?, text = ?, muallif_id = ?, janr_id = ? WHERE id = ?";

        $con = self::connect()->prepare($sql);

        $con->bindParam(1, $name);
        $con->bindParam(2, $text);
        $con->bindParam(3, $muallif_id);
        $con->bindParam(4, $janr_id);
        $con->bindParam(5, $id);

        if ($con->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = {$id}";
        $stat = self::connect()->prepare($sql);
        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function attach($data)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE email = '$data[0]' AND password = '$data[1]'";
        $stmt = self::connect()->prepare($query);
        
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    public static function registr($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO " . static::$table . " ({$columns})  VALUES ({$values})";
        $stmt = self::connect()->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}