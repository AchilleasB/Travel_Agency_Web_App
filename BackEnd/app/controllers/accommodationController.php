<?php
namespace Controllers;

use Exception;
use Services\AccommodationService;
use Models\Accommodation;

class AccommodationController extends Controller {

    private $accommodationService;

    public function __construct()
    {
        $this->accommodationService = new AccommodationService();
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

        $accommodations = $this->accommodationService->getAllAccommodations($offset, $limit);
        if(!$accommodations){
            $this->respondWithError(404, "No accommodations found");
            return;
        }
        
        $this->respond($accommodations);
    }

    
    public function create()
    {
        try {
            $accommodation = $this->createObjectFromPostedJson(Accommodation::class);
            $accommodation = $this->accommodationService->create($accommodation);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
        
        $this->respond($accommodation);
    }

    public function update($id)
    {
        try {
            $accommodation = $this->createObjectFromPostedJson(Accommodation::class);
            $accommodation = $this->accommodationService->update($accommodation, $id);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($accommodation);
    }

    public function delete($id)
    {
        try {
            $accommodation = $this->accommodationService->delete($id);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($accommodation);
    }
}