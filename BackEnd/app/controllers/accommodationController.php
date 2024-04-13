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

}