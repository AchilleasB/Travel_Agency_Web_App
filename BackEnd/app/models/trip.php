<?php
namespace Models;
use DateTime;

class Trip {

    public int $id;
    public string $name;
    public string $image_path;
    public string $description;
    public DateTime $departure_date;
    public Meal $meal;
    public Accomodation $accomodation;
    public int $duration;
    public float $price;
    public int $rating;
    public bool $available;
    public Category $category;
    public Destination $destination;
}
?>