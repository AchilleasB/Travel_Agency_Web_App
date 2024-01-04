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
    public function create($trip){
        $trip = $this->tripRepository->create($trip);
        return $trip;
    }
}