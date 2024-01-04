<?php
namespace Repositories;

use PDO;
use PDOException;
use Models\Destination;

class DestinationRepository extends Repository
{
    function getAllDestinations($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT * FROM destinations";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, Destination::class);
            $destinations = $stmt->fetchAll();
            return $destinations;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}