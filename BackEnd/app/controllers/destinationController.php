<?php
namespace Controllers;

use Services\DestinationService;

class DestinationController extends Controller
{
    private $destinationService;

    public function __construct()
    {
        $this->destinationService = new DestinationService();
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

        $destinations = $this->destinationService->getAllDestinations($offset, $limit);
        if(!$destinations){
            $this->respondWithError(404, "No destinations found");
            return;
        }
        $this->respond($destinations);        
    }

}