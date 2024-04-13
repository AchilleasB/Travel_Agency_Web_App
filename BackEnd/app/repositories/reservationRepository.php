<?php
namespace Repositories;

use PDO;
use PDOException;
use Models\Reservation;

class ReservationRepository extends Repository
{
    function getAllReservations($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT * FROM reservations";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
            $reservations = $stmt->fetchAll();
            return $reservations;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function create($reservation)
    {
        try {
            $query = "INSERT INTO reservations (trip_id, user_id, num_of_travellers, total_price, status) VALUES (:trip_id, :user_id, :num_of_travellers, :total_price, :status)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':trip_id', $reservation->trip_id, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $reservation->user_id, PDO::PARAM_INT);
            $stmt->bindParam(':num_of_travellers', $reservation->num_of_travellers, PDO::PARAM_INT);
            $stmt->bindParam(':total_price', $reservation->total_price, PDO::PARAM_INT);
            $stmt->bindParam(':status', $reservation->status, PDO::PARAM_STR);
            $stmt->execute();
            $reservation->id = $this->connection->lastInsertId();
            $reservation = $this->getOneReservation($reservation->id); 
            return $reservation;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOneReservation($id)
    {
        try {
            $query = "SELECT * FROM reservations WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
            $reservation = $stmt->fetch();
            return $reservation;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getReservationsByUser($userId)
    {
        try {
            $query = "SELECT * FROM reservations WHERE user_id = :user_id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Reservation::class);
            $reservations = $stmt->fetchAll();
            return $reservations;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteReservation($id)
    {
        try {
            $query = "DELETE FROM reservations WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function update($reservation)
    {
        try {
            $query = "UPDATE reservations SET status = :status WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':status', $reservation->status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $reservation->id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $reservation;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function mostReservedTrips()
    {
        try {
            $query = "SELECT trip_id, COUNT(trip_id) as total_reservations FROM reservations GROUP BY trip_id ORDER BY total_reservations DESC";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $reservations = $stmt->fetchAll();
            return $reservations;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}