<?php
namespace Models;

class Reservation {
    public int $id;
    public int $user_id;
    public int $trip_id;
    public int $num_of_travellers;
    public int $total_price;
    public string $status;

    const STATUS_PENDING = "pending";
    const STATUS_APPROVED = "approved";

    public function setStatus(string $status): void
    {
        if ($status !== self::STATUS_PENDING && $status !== self::STATUS_APPROVED) {
            throw new \Exception("Invalid status");
        }

        $this->status = $status;
    }
}
?>