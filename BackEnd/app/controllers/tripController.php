<?php
namespace Controllers;

use Exception;
use Services\TripService;
use Models\Trip;

class TripController extends Controller {
    private $tripService;

    public function __construct()
    {
        $this->tripService = new TripService();
    }
    
    public function getAll()
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $trips = $this->tripService->getAllTrips($offset, $limit);

        if(!$trips){
            $this->respondWithError(404, "No trips found");
            return;
        }
        
        $this->respond($trips);
    }

    public function getOne($id)
    {
        $trip = $this->tripService->getOneTrip($id);

        if(!$trip){
            $this->respondWithError(404, "Trip not found");
            return;
        }

        $this->respond($trip);
    }

    public function create()
    {
        try {
            $trip = $this->createObjectFromPostedJson(Trip::class);
            $trip = $this->tripService->create($trip);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($trip);
    }
}