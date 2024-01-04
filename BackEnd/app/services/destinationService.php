<?php
namespace Services;

use Repositories\DestinationRepository;

class DestinationService
{
    private $destinationRepository;

    public function __construct()
    {
        $this->destinationRepository = new DestinationRepository();
    }

    public function getAllDestinations($offset = NULL, $limit = NULL)
    {
        return $this->destinationRepository->getAllDestinations($offset, $limit);
    }

}