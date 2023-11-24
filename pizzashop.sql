-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2023 at 09:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `subject`, `comment`, `feedback_date`) VALUES
(1, 'asd', 'asd@hotmail.com', 'asd', 'asd', '2023-11-09 09:27:51'),
(2, 'sad', 'asd@hotmail.com', 'asd', 'asd', '2023-11-09 09:34:49'),
(3, 'asd', 'asd@hotmail.com', '23213', '123', '2023-11-09 09:36:13'),
(4, 'james', 'james@hotmail.com', 'james', 'james', '2023-11-09 09:38:43'),
(5, 'asd', 'asd@hotmail.com', 'asd', '1232', '2023-11-09 09:45:57'),
(6, '123', 'asd@hotmail.com', '23213', 'we', '2023-11-09 09:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `delivery_address`, `order_date`, `order_status`) VALUES
(46, 32, 132.90, 'jane street Block 555 #93-20 S555', '2023-11-09 07:12:24', 'processing'),
(47, 33, 23.10, 'Jurong Street Block 555 #55-55 S555555', '2023-11-09 07:21:10', 'processing'),
(48, 33, 11.60, 'jurong west Block 999 #99-99 S999999', '2023-11-09 07:22:11', 'processing'),
(49, 33, 29.20, 'Jurong East Block 123123 #123123 S123123', '2023-11-09 07:53:01', 'processing'),
(50, 32, 77.10, 'jurong west Block 123 #123123 S123123', '2023-11-09 08:15:55', 'processing'),
(52, 33, 39.20, 'qwe Block  # S', '2023-11-09 08:33:48', 'processing'),
(53, 32, 29.20, '2132 Block 232 #23213 S23213', '2023-11-09 08:52:14', 'processing'),
(54, 32, 39.20, '123 Block 213 #213 S23', '2023-11-09 09:44:00', 'processing'),
(55, 32, 39.20, '213 Block 232 #232 S2323', '2023-11-09 09:45:48', 'processing'),
(56, 32, 67.10, 'jurong west Block 733 #09-09 S580303', '2023-11-09 11:38:40', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `name`, `quantity`) VALUES
(49, 46, 1, 'Two Pizzas Combo', 2),
(50, 46, 2, 'Family Combo', 2),
(51, 47, 5, 'Pepperoni Pizza', 1),
(52, 47, 11, 'Cinnamon Bites', 1),
(53, 48, 14, 'Large Sprite', 1),
(54, 48, 15, 'Green Tea', 1),
(55, 49, 1, 'Two Pizzas Combo', 1),
(56, 50, 2, 'Family Combo', 2),
(57, 52, 2, 'Family Combo', 1),
(58, 53, 1, 'Two Pizzas Combo', 1),
(59, 54, 2, 'Family Combo', 1),
(60, 55, 2, 'Family Combo', 1),
(61, 56, 2, 'Family Combo', 1),
(62, 56, 1, 'Two Pizzas Combo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `long_desc` text NOT NULL,
  `short_desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`, `category`) VALUES
(1, 'Two Pizzas Combo', 'Pepperoni Pizza: A favorite choice among pizza lovers for its delicious combination of cheese, tomato sauce, and pepperoni.|BBQ Chicken Pizza: A smoky pizza with seasoned chicken, tomato base, mozarella, red onions, capsicum, and cilantro.', 'Pepperoni Pizza|BBQ Chicken Pizza', 27.90, 'images/menu/twopizzacombo.png', 'combo'),
(2, 'Family Combo', 'Hawaiian Pizza: Hawaiian pizza is a savory delight featuring a classic combination of ham, pineapple, and melted cheese on a tomato sauce-covered crust.|BBQ Chicken Pizza: BBQ chicken pizza is a mouthwatering fusion of tender, barbecue-sauced chicken, red onions, and cheese, creating a smoky and savory flavor explosion on a pizza crust.|Cinnamon Bites: Cinnamon bites are delectable, bite-sized pastries generously coated in cinnamon and sugar, usually served with a sweet glaze for dipping or drizzling.|Coca-Cola: Coca-Cola is a carbonated soft drink known for its refreshing and effervescent taste, with a sweet and slightly tangy flavor, enjoyed by people around the world.', 'Hawaiian Pizza|BBQ Chicken Pizza|Cinnamon Bites|Coca-Cola', 37.90, 'images/menu/familycombo.png', 'combo'),
(3, 'Party Combo', 'Hawaiian Pizza: Hawaiian pizza is a savory delight featuring a classic combination of ham, pineapple, and melted cheese on a tomato sauce-covered crust.|BBQ Chicken Pizza: BBQ chicken pizza is a mouthwatering fusion of tender, barbecue-sauced chicken, red onions, and cheese, creating a smoky and savory flavor explosion on a pizza crust.|Pepperoni Pizza: A favorite choice among pizza lovers for its delicious combination of cheese, tomato sauce, and pepperoni.|Mushroom Pizza: Mushroom pizza is a savory delight featuring earthy and tender mushrooms, often sautéed for extra flavor, generously spread over a pizza crust and paired with cheese and complementary toppings.|Cinnamon Bites: Cinnamon bites are delectable, bite-sized pastries generously coated in cinnamon and sugar, usually served with a sweet glaze for dipping or drizzling.|Garlic Bread: Garlic bread is a delectable side dish made from sliced or halved bread, toasted to a golden brown, and generously infused with aromatic, buttery garlic spread.|Chicken Drumlets: Fried chicken drumlets coated with tangy barbecue sauce.|Coca-Cola: Coca-Cola is a carbonated soft drink known for its refreshing and effervescent taste, with a sweet and slightly tangy flavor, enjoyed by people around the world.', 'Hawaiian Pizza|BBQ Chicken Pizza|Cinnamon Bites|Garlic Bread| Chicken Drumlets|2x Coca-Cola', 82.90, 'images/menu/partycombo.png', 'combo'),
(4, 'Hawaiian Pizza', 'Hawaiian Pizza: Hawaiian pizza is a savory delight featuring a classic combination of ham, pineapple, and melted cheese on a tomato sauce-covered crust.', 'Hawaiian Pizza', 14.90, 'images/menu/hawaiian.jpg', 'pizza'),
(5, 'Pepperoni Pizza', 'Pepperoni Pizza: A favorite choice among pizza lovers for its delicious combination of cheese, tomato sauce, and pepperoni.', 'Pepperoni Pizza', 14.90, 'images/menu/pepperoni.jpg', 'pizza'),
(6, 'Cheese Pizza', 'Cheese Pizza: Cheese pizza is a simple yet classic delight, featuring a perfectly baked crust topped with a generous layer of gooey, melted cheese.', 'Cheese Pizza', 14.90, 'images/menu/cheese.jpg', 'pizza'),
(7, 'BBQ Chicken Pizza', 'BBQ Chicken Pizza: BBQ chicken pizza is a mouthwatering fusion of tender, barbecue-sauced chicken, red onions, and cheese, creating a smoky and savory flavor explosion on a pizza crust.', 'BBQ Chicken Pizza', 14.90, 'images/menu/bbqchicken.webp', 'pizza'),
(8, 'Seafood Pizza', 'Seafood Pizza: Seafood pizza is a delectable combination of a pizza crust topped with a variety of fresh or cooked seafood, such as shrimp, mussels, and squid, often complemented by a rich tomato sauce and cheese.', 'Seafood Pizza', 14.90, 'images/menu/seafood.jpg', 'pizza'),
(9, 'Vegetarian Pizza', 'Vegetarian Pizza: Vegetarian pizza is a flavorful and meat-free option, typically loaded with a variety of colorful vegetables, savory sauces, and melted cheese on a delicious pizza crust.', 'Vegetarian Pizza', 14.90, 'images/menu/vegetarian.jpg', 'pizza'),
(10, 'Chicken Drumlets', 'Chicken Drumlets: Fried chicken drumlets coated with tangy barbecue sauce.', 'Chicken Drumlets', 8.90, 'images/menu/drumlets.jpg', 'snacks'),
(11, 'Cinnamon Bites', 'Cinnamon Bites: Cinnamon bites are delectable, bite-sized pastries generously coated in cinnamon and sugar, usually served with a sweet glaze for dipping or drizzling.', 'Cinnamon Bites', 6.90, 'images/menu/cinnamon.webp', 'snacks'),
(12, 'Garlic Bread', 'Garlic Bread: Garlic bread is a delectable side dish made from sliced or halved bread, toasted to a golden brown, and generously infused with aromatic, buttery garlic spread.', 'Garlic Bread', 6.90, 'images/menu/garlic.webp', 'snacks'),
(13, 'Large Cola-Cola', 'Coca-Cola: Coca-Cola is a carbonated soft drink known for its refreshing and effervescent taste, with a sweet and slightly tangy flavor, enjoyed by people around the world.', 'Coca-Cola', 4.90, 'images/menu/cola.jpg', 'drinks'),
(14, 'Large Sprite', 'Sprite: Sprite is a crisp and refreshing lemon-lime flavored carbonated soft drink known for its zesty and tangy taste, offering a delightful thirst-quenching experience.', 'Sprite', 4.90, 'images/menu/sprite.webp', 'drinks'),
(15, 'Green Tea', 'Green Tea: Green tea is a fragrant and soothing beverage made from unoxidized tea leaves, prized for its fresh, slightly grassy flavor and a wide range of potential health benefits.', 'Green Tea', 5.40, 'images/menu/greentea.webp', 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(32, 'biyang1', '7cb6bbb8de205df7a14365c5346f6bf6', 'biyang_97@hotmail.sg'),
(33, 'biyang2', '7cb6bbb8de205df7a14365c5346f6bf6', 'biyang_97@outlook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
