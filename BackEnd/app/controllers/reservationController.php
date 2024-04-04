<?php
namespace Controllers;

use Services\ReservationService;
use Models\Reservation; 
use Exception;

class ReservationController extends Controller
{
    private $reservationService;

    public function __construct()
    {
        $this->reservationService = new ReservationService();
    }

    public function getAll()
    {

        // Checks for a valid jwt, returns 401 if none is found
        // $token = $this->checkForJwt();
        // if (!$token)
        //     return;
        
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $reservations = $this->reservationService->getAllReservations($offset, $limit);
        if(!$reservations){
            $this->respondWithError(404, "No reservations found");
            return;
        }
        $this->respond($reservations);        
    }

    public function create()
    {
        try {
            $reservation = $this->createObjectFromPostedJson(Reservation::class);
            var_dump($reservation);
            $reservation = $this->reservationService->create($reservation);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($reservation);
    }

    public function getReservationsByUser($userId){
        $reservations = $this->reservationService->getReservationsByUser($userId);
        if(!$reservations){
            $this->respondWithError(404, "No reservations found");
            return;
        }
        $this->respond($reservations);
    }

}