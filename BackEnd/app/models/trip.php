<?php
namespace Models;

use DateTime;

class Trip
{

    public int $id;
    public string $name;
    public string $image_path;
    public string $description;
    public DateTime $departure_date;
    public int $duration;
    public float $price;
    public bool $available;
    public int $accommodation_id;
    public Accommodation $accommodation;
    public string $category_id;
    public Category $category;
    public int $destination_id;
    public Destination $destination;
}
?>