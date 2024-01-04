<?php
namespace Repositories;

use Models\Accommodation;
use PDOException;
use PDO;

class AccommodationRepository extends Repository
{
    function getAllAccommodations($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT * FROM accommodations";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }

            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Accommodation::class);
            $accommodations = $stmt->fetchAll();

            return $accommodations;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function create($accommodation)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into accommodations (hotel_name, hotel_stars, meal_type) VALUES (:hotel_name, :hotel_stars, :meal_type)");
            $stmt->bindParam(':hotel_name', $accommodation->hotel_name);
            $stmt->bindParam(':hotel_stars', $accommodation->hotel_stars);
            $stmt->bindParam(':meal_type', $accommodation->meal_type);
            $stmt->execute();
            $accommodation->id = $this->connection->lastInsertId();
            
            return $this->getOneAccommodation($accommodation->id);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function update($accommodation, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE accommodations SET hotel_name = '$accommodation->hotel_name', hotel_stars = '$accommodation->hotel_stars', meal_type = '$accommodation->meal_type' WHERE id = $accommodation->id");
            $stmt->execute([
                $accommodation->hotel_name,
                $accommodation->hotel_stars,
                $accommodation->meal_type
            ]);
            return $this->getOneAccommodation($id);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function delete($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM accommodations WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return;
            } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }

    function getOneAccommodation($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM accommodations WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $accommodation = $stmt->fetch(PDO::FETCH_CLASS);
            return $accommodation;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function mapToAccommodation($row)
    {
        $accommodation = new Accommodation();
        $accommodation->id = $row['id'];
        $accommodation->hotel_name = $row['hotel_name'];
        $accommodation->hotel_stars = $row['hotel_stars'];
        $accommodation->meal_type = $row['meal_type'];
        return $accommodation;
    }
}