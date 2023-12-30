<?php
namespace Controllers;
use Exception;
use Services\TripService;

class TripController extends Controller {
    private TripService $tripService;
    
    public function create(){
        try {
            $trip = $this->createObjectFromPostedJson('Models\Trip');
            $trip = $this->tripService->create($trip);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
}