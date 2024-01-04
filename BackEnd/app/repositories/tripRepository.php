<?php
namespace Repositories;

use DateTime;
use Models\Trip;
use Models\Accommodation;
use Models\Category;
use Models\Destination;

use PDOException;
use PDO;

class TripRepository extends Repository
{
    function getAllTrips($offset, $limit)
    {
        try {
            $query = "SELECT trips.*, categories.category_type, accommodations.hotel_name, accommodations.hotel_stars,
                accommodations.meal_type, destinations.name
             FROM trips
             INNER JOIN categories ON trips.category_id = categories.id
             INNER JOIN accommodations ON trips.accommodation_id = accommodations.id
             INNER JOIN destinations ON trips.destination_id = destinations.id";

            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }

            $stmt = $this->connection->prepare($query);

            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }

            $stmt->execute();
            $trips =array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false  ) {
                $trips[] = $this->rowToTrip($row);
            }

            return $trips;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    function create($trip)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into trips (name, image_path, description, departure_date, accommodation_id, duration, price, rating, available, category_id, destination_id) 
                                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $trip->name,
                $trip->image_path,
                $trip->description,
                $trip->departure_date,
                $trip->accommodation_id,
                $trip->duration,
                $trip->price,
                $trip->available,
                $trip->category_id,
                $trip->destination_id
            ]);

            $trip->id = $this->connection->lastInsertId();
            $trip = $this->getOneTrip($trip->id); 
            return $trip;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOneTrip(int $id)
    {
        try {
            $query = $this->connection->prepare(
                "SELECT trip.*, category.category_type, accommodation.hotel_name, accommodation.hotel_stars,
                accommodation.meal_type, destination.name
             FROM trips as trip
             INNER JOIN categories as category ON trip.category_id = category.id
             INNER JOIN accommodations as accommodation ON trip.accommodation_id = accommodation.id
             INNER JOIN destinations as destination ON trip.destination_id = destination.id
             WHERE trip.id = ?"
            );
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $trip = $this->rowToTrip($row);
            return $trip;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function rowToTrip($row)
    {
        $trip = new Trip();
        $trip->id = $row['id'];
        $trip->name = $row['name'];
        $trip->image_path = $row['image_path'];
        $trip->description = $row['description'];
        $trip->departure_date = new DateTime($row['departure_date']);
        $trip->duration = $row['duration'];
        $trip->price = $row['price'];
        $trip->available = $row['available'];

        $trip->accommodation_id = $row['accommodation_id'];
        $accommodation = new Accommodation();
        $accommodation->id = $row['accommodation_id'];
        $accommodation->hotel_name = $row['hotel_name'];
        $accommodation->hotel_stars = $row['hotel_stars'];
        $accommodation->meal_type = $row['meal_type'];
        $trip->accommodation = $accommodation;

        $trip->category_id = $row['category_id'];
        $category = new Category();
        $category->id = $row['category_id'];
        $category->category_type = $row['category_type'];
        $trip->category = $category;

        $trip->destination_id = $row['destination_id'];
        $destination = new Destination();
        $destination->id = $row['destination_id'];
        $destination->name = $row['name'];
        $trip->destination = $destination;

        return $trip;
    }

}