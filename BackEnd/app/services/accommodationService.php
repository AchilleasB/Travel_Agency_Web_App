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
    public function create($accommodation){
        $accommodation = $this->accommodationRepository->create($accommodation);
        return $accommodation;
    }

    public function update($accommodation, $id){
        $accommodation = $this->accommodationRepository->update($accommodation, $id);
        return $accommodation;
    }

    public function delete($id){
        $accommodation = $this->accommodationRepository->delete($id);
        return $accommodation;
    }
}