-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 14, 2024 at 01:20 PM
-- Server version: 11.0.3-MariaDB-1:11.0.3+maria~ubu2204
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_stars` int(11) NOT NULL,
  `meal_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `hotel_name`, `hotel_stars`, `meal_type`) VALUES
(1, 'Marriot', 5, 'All inclusive'),
(2, 'Four Seasons', 5, 'Full-Board'),
(3, 'Kempinski', 4, 'All Inclusive'),
(5, 'Hayatt', 5, 'Full-Board'),
(6, 'Rosewood', 4, 'Half-Board'),
(7, 'De l\'Europe', 4, 'Half-Board');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_type` varchar(255) NOT NULL,
  `image_path` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_type`, `image_path`) VALUES
(1, 'Individual', 'https://lp-cms-production.imgix.net/2021-12/GettyImages-1311033137.jpg?auto=format&w=1440&h=810&fit=crop&q=75'),
(2, 'Group', 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3JvdXAlMjB0cmF2ZWx8ZW58MHx8MHx8fDA%3D'),
(3, 'Honeymoon', 'https://media.cnn.com/api/v1/images/stellar/prod/underscored-cheap-honeymoon-packages-lead-couple-honeymoon-beach-maldives.jpg?q=h_1800,w_3200,x_0,y_0'),
(4, 'Family', 'https://www.thedailymeal.com/img/gallery/50-affordable-family-friendly-summer-trips-gallery/happy-family-with-two-kids-hands-up-on-beach-picture-id677652068_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `image_path`, `description`) VALUES
(1, 'Europe', 'https://i0.wp.com/blog.lowcostvibes.com/wp-content/uploads/2023/10/Best-European-Holiday-Destinations-Low-Cost-Vibes-Blog-Good-Vibes-Only.jpg?resize=1200%2C680&ssl=1', 'Embark on a European adventure, where history blends seamlessly with modernity. From the romance of Paris to the ancient allure of Rome, and the vibrant streets of Barcelona to the picturesque landscapes of Switzerland, Europe offers a tapestry of diverse experiences. Discover iconic landmarks, savor delectable cuisines, and explore charming villages that encapsulate the continent\'s timeless appeal. Your journey through Europe promises unforgettable moments and endless beauty.'),
(2, 'Asia', 'https://premiotravels.com/wp-content/uploads/2018/05/asia-summer-travel-and-tour-holiday-package-1.jpg', 'Explore the wonderful Asia, where ancient traditions meet modern innovation. From the timeless allure of China and the artistic elegance of Japan to the tropical beauty of Southeast Asia and the cultural mosaic of the Middle East, each corner offers a unique experience. Immerse yourself in vibrant markets, savor local flavors, and witness the harmonious blend of tradition and progress. Asia beckons with warm hospitality, inviting you to discover the rich stories that shape its dynamic tapestry.'),
(3, 'Africa', 'https://imagevars.gulfnews.com/2022/10/18/Africa-travel---Main_183eb0b45d6_medium.jpg', 'Experience an African odyssey, where a rich tapestry of cultures intertwines with breathtaking natural wonders. From the vibrant rhythms of Marrakech to the ancient mystique of Egypt\'s pyramids, and the lush landscapes of Kenya\'s savannahs to the vibrant markets of Cape Town, Africa beckons with an array of enchanting experiences. Immerse yourself in the essence of its history, indulge in tantalizing cuisines, and wander through quaint villages that epitomize the continent\'s timeless allure. Your journey through Africa assures unforgettable encounters and boundless splendor.'),
(4, 'North America', 'https://imagevars.gulfnews.com/2022/10/12/US-Travel_183cc70b46b_medium.jpg', 'Commence a grand voyage through North America, where the rhythm of life varies as much as the landscapes. Feel the pulse of New York City\'s bustling streets, where skyscrapers touch the sky and dreams take flight. Traverse the rugged beauty of the Canadian Rockies, where emerald lakes mirror snow-capped peaks in a mesmerizing dance. Indulge in the rich flavors where every dish tells a story of heritage and passion. North America invites you to wander through its vibrant cities, awe-inspiring nature, and diverse cultures, promising an unforgettable odyssey of exploration and enchantment.'),
(5, 'South America', 'https://www.salkantaytrekking.com/blog/wp-content/uploads/2021/08/collage-south-america1080x608-1024x576.jpg', 'Set out on an enchanting odyssey through South America, where ancient wonders and natural marvels beckon. Explore the mystical ruins of Machu Picchu, where the Inca civilization whispers secrets of a bygone era amidst mist-shrouded mountains. Feel the rhythmic beats of Rio de Janeiro\'s Carnival, a celebration of life and joy that reverberates through the sun-kissed beaches and vibrant streets. Immerse yourself in the passionate tango rhythms of Buenos Aires, a city where every corner tells a tale of passion and resilience. South America invites you to delve into its rich history, diverse landscapes, and warm hospitality, promising a journey filled with awe-inspiring experiences and unforgettable memories.');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `num_of_travellers` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `trip_id`, `num_of_travellers`, `total_price`, `status`) VALUES
(2, 20, 1, 2, 1700, 'Pending'),
(3, 21, 3, 2, 4800, 'Approved'),
(5, 24, 1, 3, 2550, 'Pending'),
(6, 21, 1, 4, 3400, 'Approved'),
(7, 25, 2, 2, 3500, 'Pending'),
(16, 25, 6, 3, 5400, 'Pending'),
(17, 25, 4, 2, 2400, 'Approved'),
(18, 20, 10, 2, 8400, 'Pending'),
(19, 20, 6, 4, 7200, 'Pending'),
(20, 24, 3, 2, 4800, 'Approved'),
(21, 25, 4, 2, 2400, 'Pending'),
(22, 24, 13, 1, 2900, 'Pending'),
(23, 24, 9, 1, 3500, 'Approved'),
(24, 21, 10, 2, 8400, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(255) NOT NULL,
  `trip_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `departure_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `price` float NOT NULL,
  `available` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `accommodation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `trip_name`, `image_path`, `description`, `departure_date`, `duration`, `price`, `available`, `category_id`, `destination_id`, `accommodation_id`) VALUES
(1, 'Rome', 'https://tourismmedia.italia.it/is/image/mitur/20220127150143-colosseo-roma-lazio-shutterstock-756032350-1?wid=1600&hei=900&fit=constrain,1&fmt=webp', 'Welcome to Rome, where ancient wonders meet modern allure. Explore iconic landmarks like the Colosseum and Pantheon, meander through charming cobblestone streets, and savor the flavors of authentic Italian cuisine. Whether you\'re captivated by history, art, or simply the city\'s enchanting atmosphere, Rome promises an unforgettable experience. Embrace the eternal allure of the Eternal City.', '2024-05-15', 5, 850, 1, 4, 1, 2),
(2, 'Hong Kong', 'https://media.istockphoto.com/id/900611166/photo/aerial-view-of-hong-kong.jpg?s=612x612&w=0&k=20&c=y4azy2FlLI4YaTTF_dH8boEF4HrNR-Vohm6sBZjX0oA=', 'Welcome to Hong Kong, a dynamic blend of East and West. Marvel at the iconic skyline framing Victoria Harbour, explore traditional temples amidst modern skyscrapers and savor diverse cuisine. Immerse yourself in the lively markets of Kowloon and experience the captivating fusion of culture that defines this vibrant metropolis. Hong Kong awaits with a unique charm that seamlessly combines tradition and modern allure.', '2024-06-10', 7, 1750, 1, 2, 2, 5),
(3, 'Santorini', 'https://cdn.kimkim.com/files/a/content_articles/featured_photos/45f034435482095d69e525bf34ee72e6a0637119/big-5037295f6df57507ff5ef78ee59dee89.jpg', 'Welcome to Santorini, a Greek paradise where ancient charm meets Aegean beauty. Explore the iconic white-washed buildings clinging to dramatic cliffs, witness breathtaking sunsets over the Caldera, and stroll through enchanting cobblestone streets. Whether you\'re drawn to the historical sites, crystal-clear waters, or delectable Greek cuisine, Santorini promises an unforgettable Mediterranean experience. An amazing place for an unforgettable honeymoon!', '2024-06-02', 5, 2400, 1, 3, 1, 1),
(4, 'Paris', 'https://www.visa.mn/dam/VCOM/regional/ap/images/travel-with-visa/paris/marquee-travel-paris-800x450.jpg', 'Welcome to Paris, where timeless elegance intertwines with contemporary charm. Discover iconic landmarks such as the Eiffel Tower and Notre-Dame Cathedral, stroll along enchanting cobblestone streets, and indulge in the exquisite flavors of French cuisine. Whether you\'re drawn to its rich history, world-renowned art, or the romantic ambiance that fills its air, Paris guarantees an unforgettable journey. Embrace the unparalleled allure of the City of Light.', '2024-06-12', 3, 1200, 1, 3, 1, 7),
(5, 'Barcelona', 'https://i.pinimg.com/736x/c7/79/2e/c7792e69955ce244fe0a4123f3c0d356.jpg', 'Welcome to Barcelona, where vibrant energy harmonizes with historical treasures. Explore iconic landmarks like the Sagrada Familia and Park Güell, wander through bustling streets filled with colorful markets, and delight in the eclectic flavors of Catalan cuisine. Whether you\'re fascinated by its unique architecture, passionate culture, or the lively atmosphere pulsating through its streets, Barcelona offers an unforgettable experience. Embrace the dynamic charm of this captivating city.', '2024-07-01', 5, 1400, 1, 1, 1, 2),
(6, 'Zurich', 'https://a.cdn-hotels.com/gdcs/production127/d484/b9ca99c3-b15e-48ab-a3cb-983186637256.jpg?impolicy=fcrop&w=800&h=533&q=medium', 'Welcome to Zurich, where modern sophistication meets picturesque beauty. Discover the charming Old Town with its medieval architecture and vibrant cafes, stroll along the serene shores of Lake Zurich, and indulge in the flavors of Swiss cuisine at cozy restaurants. Whether you\'re enchanted by its pristine landscapes, world-class shopping, or the tranquility that pervades its atmosphere, Zurich promises a memorable experience. Embrace the enchanting allure of this Swiss gem.', '2024-06-25', 4, 1800, 1, 4, 1, 6),
(7, 'Egypt', 'https://facts.net/wp-content/uploads/2023/06/38-facts-about-egypt-1688101892.jpeg', 'Welcome to Egypt, where ancient wonders whisper tales of a glorious past. Explore iconic landmarks like the Great Pyramids of Giza and the Sphinx, wander through bustling bazaars filled with exotic treasures, and savor the flavors of traditional Egyptian cuisine. Whether you\'re mesmerized by its millennia-old history, awe-inspiring monuments, or the mystical aura that pervades its landscapes, Egypt offers an unforgettable journey. Immerse yourself in the timeless allure of this land of pharaohs and pyramids.', '2024-07-01', 7, 1300, 1, 2, 3, 1),
(8, 'Kenya-Tanzania', 'https://www.yourafricansafari.com/media/images/itineraries/2024/01/31/KENYA_AND_TZ_PHOTO_2.PNG', 'Welcome to Kenya and Tanzania, where the untamed wilderness awaits your exploration. Embark on thrilling safaris across the vast savannahs of the Maasai Mara and Serengeti, witness the majestic beauty of roaming wildlife, and immerse yourself in the rich cultures of local tribes. Whether you\'re captivated by the awe-inspiring landscapes, the adrenaline rush of encountering wildlife up close, or the warmth of African hospitality, Kenya and Tanzania offer unforgettable adventures. Embrace the raw beauty and untamed spirit of these East African gems.', '2024-06-16', 14, 3300, 1, 2, 3, 3),
(9, 'Philippines', 'https://image.cnbcfm.com/api/v1/image/106950658-1633051794104-gettyimages-1080140752-2018-philippines-mavic-810-editcopy.jpeg?v=1633312046&w=760&h=405&vtcrop=y', 'Welcome to the Philippines, where tropical paradise meets cultural richness. Explore pristine white-sand beaches adorned with swaying palm trees, dive into crystal-clear waters teeming with vibrant marine life, and experience the warmth of Filipino hospitality in bustling cities and serene villages alike. Whether you\'re drawn to its stunning natural wonders, centuries-old Spanish colonial heritage, or the mouthwatering flavors of Filipino cuisine, the Philippines promises an unforgettable journey. Embrace the beauty and diversity of this archipelago nation.', '2024-06-08', 16, 3500, 1, 2, 2, 1),
(10, 'Japan', 'https://www.followmeaway.com/wp-content/uploads/2019/04/planning-a-trip-to-Japan-mount-fuji.jpg', 'Welcome to Japan, where ancient traditions blend harmoniously with modern innovation. Discover iconic landmarks like the historic temples of Kyoto and the bustling streets of Tokyo, immerse yourself in the tranquility of Japanese gardens, and savor the delicate flavors of sushi and ramen. Whether you\'re captivated by its rich cultural heritage, cutting-edge technology, or the serene beauty of cherry blossom season, Japan offers an unforgettable experience. Embrace the unique charm and timeless elegance of the Land of the Rising Sun.', '2024-05-30', 13, 4200, 1, 2, 2, 5),
(11, 'New York', 'https://media.tacdn.com/media/attractions-splice-spp-674x446/07/25/13/74.jpg', 'Welcome to New York, where the pulse of the city never sleeps and every street holds a story. Explore iconic landmarks like the Statue of Liberty and Times Square, wander through diverse neighborhoods alive with culture and creativity, and indulge in the flavors of world-class cuisine from around the globe. Whether you\'re captivated by its towering skyscrapers, vibrant arts scene, or the bustling energy of its streets, New York promises an unforgettable adventure. Embrace the spirit and diversity of the city that never fails to dazzle.', '2024-06-22', 4, 1600, 1, 1, 4, 6),
(12, 'Peru', 'https://images.squarespace-cdn.com/content/v1/609d3f1781f4a87463f238cb/1697737227729-9HO26TLIGFM74U4WITN4/image-asset.jpeg', 'Welcome to Peru, where ancient civilizations meet breathtaking landscapes. Explore iconic landmarks like Machu Picchu and the Nazca Lines, traverse the rugged Andes Mountains, and immerse yourself in the rich tapestry of indigenous cultures. Whether you\'re drawn to the mystique of Inca ruins, the vibrant colors of traditional textiles, or the tantalizing flavors of Peruvian cuisine, Peru offers an unforgettable journey. Embrace the magic and wonder of this South American gem.', '2024-07-08', 9, 2700, 1, 2, 5, 2),
(13, 'Rio de Janeiro', 'https://hnj-website.s3.amazonaws.com/uploads/2020/10/001288-Copacabana-Rio-de-Janeiro-pixabay-1963744.jpg', 'Welcome to Rio de Janeiro, where vibrant energy meets natural splendor. Explore iconic landmarks like the Christ the Redeemer statue and the Sugarloaf Mountain, soak up the sun on the famous Copacabana beach, and experience the rhythm of samba in the lively streets. Whether you\'re captivated by the breathtaking views from the Tijuca Forest, the colorful celebrations of Carnival, or the flavors of Brazilian cuisine, Rio de Janeiro promises an unforgettable adventure. Embrace the infectious joy and beauty of this coastal paradise.', '2024-06-20', 12, 2900, 1, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(20, 'Hulk', 'hulk@email.com', '$2y$10$4u2JAfQ649n/n.OZxgy0tu7ehAs9ujGwufGnjtYU.WRfz76mOyfMC', 'customer'),
(21, 'Achil', 'achil@email.com', '$2y$10$UowrPjnQ.9c0ML789m3h9uYLK5MfEXXMr4etBp4DgVnRnsFF7Q3PW', 'admin'),
(24, 'Thor', 'thor@email.com', '$2y$10$A6jCkmMAMaGP26/9gLMDRuoStJ5cf7Z5pUMtvnTuVMP7G22X2snpi', 'customer'),
(25, 'Odin', 'odin@email.com', '$2y$10$oZiOKn.vFfmwfFXJSvs5o.hPVqVU4MwjevXMDTd67tjBXYlXMI.OG', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `accommodation_details_id` (`accommodation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`),
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `trips_ibfk_4` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
