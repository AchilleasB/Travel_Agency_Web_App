<?
namespace Services;
use Repositories\TripRepository;
class TripService {
    private $tripRepository;

    public function __construct()
    {
        $this->tripRepository = new TripRepository();
    }

    public function getAllTrips($offset = NULL, $limit = NULL)
    {
        $trips = $this->tripRepository->getAllTrips($offset, $limit);
        return $trips;
    }

    public function getOneTrip($id)
    {
        $trip = $this->tripRepository->getOneTrip($id);
        return $trip;
    }

    public function create($trip){
        $trip = $this->tripRepository->create($trip);
        return $trip;
    }
}