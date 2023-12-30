<?php
namespace Repositories;

use PDOException;
use PDO;
use Models\Trip;

class TripRepository extends Repository {
    public function create(Trip $trip){
        try {
            $stmt = $this->connection->prepare("INSERT into trips (name, image_path, description, departure_date, meal_id, accomodation_id, duration, price, rating, available, category_id, destination_id) 
                                                 VALUES (:name, :image_path, :description, :departure_date, :meal, :accomodation_id, :duration, :price, :rating, :available, :category, :destination_id)");
            $stmt->execute([
                'name' => $trip->name,
                'image_path' => $trip->image_path,
                'description' => $trip->description,
                'departure_date' => $trip->departure_date,
                'meal' => $trip->meal,
                'accomodation_id' => $trip->accomodation->id,
                'duration' => $trip->duration,
                'price' => $trip->price,
                'rating' => $trip->rating,
                'available' => $trip->available,
                'category' => $trip->category,
                'destination_id' => $trip->destination->id
            ]);
            $trip->id = $this->connection->lastInsertId();
            return $trip;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}