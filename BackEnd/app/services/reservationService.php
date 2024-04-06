<?php
namespace Services;

use Repositories\ReservationRepository;
use Models\Reservation;

class ReservationService
{
    private $reservationRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
    }

    public function getAllReservations($offset = NULL, $limit = NULL)
    {
        return $this->reservationRepository->getAllReservations($offset, $limit);
    }

    public function getOneReservation($id)
    {
        return $this->reservationRepository->getOneReservation($id);
    }

    public function create($reservation)
    {
        $reservation->setStatus(Reservation::STATUS_PENDING);
        return $this->reservationRepository->create($reservation);
    }

    public function getReservationsByUser($userId)
    {
        return $this->reservationRepository->getReservationsByUser($userId);
    }

    public function deleteReservation($id)
    {
        return $this->reservationRepository->deleteReservation($id);
    }

    public function approve($reservation)
    {
        $reservation->setStatus(Reservation::STATUS_APPROVED);
        return $this->reservationRepository->update($reservation);
    }
}