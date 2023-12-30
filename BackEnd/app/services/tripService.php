<?
namespace Services;
use Models\Trip;
use Repositories\TripRepository;
class TripService {
    private TripRepository $tripRepository;

    public function create(Trip $trip){
        $trip = $this->tripRepository->create($trip);
        return $trip;
    }
}