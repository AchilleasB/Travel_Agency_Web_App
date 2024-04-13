<?php
namespace Services;
use Repositories\AccommodationRepository;
class AccommodationService {
    private $accommodationRepository;

    public function __construct()
    {
        $this->accommodationRepository = new AccommodationRepository();
    }

    public function getAllAccommodations($offset = NULL, $limit = NULL)
    {
        return $this->accommodationRepository->getAllAccommodations($offset, $limit);
        
    }
}