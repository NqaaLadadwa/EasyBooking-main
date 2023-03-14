-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2023 at 05:26 PM
-- Server version: 8.0.21
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easybooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` char(200) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(200) NOT NULL,
  `type` tinyint NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `type`, `created_at`) VALUES
(80, 'Nqaa', 'nqaa@gmail.com', '$2y$10$xQKcZ41tc22/DzFpYdnHJOJg5cqDtRHJj92buu4EKJopr.OHV2Nou', 2, '2022-11-26 18:05:30'),
(91, 'Nemat', 'nematmimi01@gmail.com', '$2y$10$zFjs40W0OqFj67vbbCMJIernBgZnn39UQ//p2.Qjj3D8ENbeboUWu', 2, '2023-03-01 17:20:39'),
(92, 'Raneen', 'raneen@gmail.com', '$2y$10$VeJr4vujPCLYqlLRa8j7k.C/RrbDIOL8r2Ew5rsp8e4xH/hEgRXe.', 1, '2023-03-01 19:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `icon` varchar(500) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `icon`) VALUES
(13, 'Browsing Halls', '63a4dd93f1509.svg'),
(14, 'Fast Booking', '63a4de3fabc1f.svg'),
(15, 'Intelligent Calender', '63a4de55f39a0.svg'),
(16, 'Online Payment', '63a4de6e78225.svg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `FeedBack` varchar(500) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `FeedBack`, `user_id`) VALUES
(33, 'Easy Booking is a well-designed platform that offers a variety of features to help users book and manage hall reservations. The interface is intuitive and easy to navigate, and the system provides users with the ability to view availability, make bookings, and manage reservations easily. The system could be improved by adding more advanced features such as online payment processing, integration with calendars, and automated reminders for upcoming reservations.', 49),
(34, 'Easy Booking is a great addition to your services, and it offers a lot of value to your customers. The system is user-friendly, and the process of booking a hall is straightforward. However, it would be helpful to provide more information about the amenities and services available in each hall, as well as the policies and rules for using the space. This would help customers make more informed decisions about their bookings and avoid misunderstandings.', 50),
(35, 'Easy Booking is a comprehensive platform that provides users with a range of tools to book and manage hall reservations. The system is well-designed, and the interface is easy to navigate. The systems integration with other tools such as calendars and payment processing is seamless, and the system provides users with automated reminders for upcoming reservations.', 51);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_subhall`
--

CREATE TABLE `feedback_subhall` (
  `id` int NOT NULL,
  `experience` varchar(200) NOT NULL,
  `Recommendation` varchar(200) NOT NULL,
  `halls_images_useful` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `payment_process` varchar(200) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `user_id` int NOT NULL,
  `hall_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback_subhall`
--

INSERT INTO `feedback_subhall` (`id`, `experience`, `Recommendation`, `halls_images_useful`, `payment_process`, `feedback`, `user_id`, `hall_id`) VALUES
(49, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'The Gloria hall was an excellent venue for our event. The space was well-maintained and spacious, with comfortable seating and great lighting. The sound system was top-notch and provided excellent audio quality for our presentations. The staff was also friendly and accommodating, ensuring that everything ran smoothly throughout the event. Overall, I would highly recommend the Gloria hall to anyone looking for a high-quality event venue', 49, 78),
(50, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a wedding reception at the Gloria hall and was thoroughly impressed with the venue. The decor was elegant and tasteful, creating a beautiful ambiance for the occasion. The catering was also exceptional, with a delicious selection of food that catered to a variety of dietary needs. The staff were attentive and courteous, ensuring that guests were comfortable and had everything they needed. I would definitely recommend the Gloria hall for any special event or celebration', 51, 78),
(51, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently hosted a corporate conference at the Gloria hall and I couldn\'t be happier with the experience. The hall was equipped with modern technology, including high-speed internet and AV equipment, which made it easy for us to conduct presentations and seminars. The staff were also incredibly professional and helpful, ensuring that all our needs were met. The location was also convenient, with plenty of parking and easy access to public transport. ', 50, 78),
(52, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I attended a wedding reception at Elya Venues-Men hall and was blown away by the elegance and sophistication of the venue. The decor was stunning and the catering was exceptional. The staff were also very professional and went above and beyond to ensure that everyone had a great time. I would highly recommend this venue for any special occasion.\"\r\n\r\n', 50, 76),
(53, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a corporate event at Elya Venues-Men hall and was very impressed with the facilities and services provided. The hall was spacious and well-equipped with modern technology, making it easy to conduct presentations and seminars. The staff were also very professional and attentive to our needs. I would definitely recommend this venue for any business or corporate event.', 51, 76),
(54, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a graduation ceremony at Royal Hall-Indoor Women Hall and was very impressed with the venue. The hall was spacious and well-decorated, creating a beautiful and memorable atmosphere for the occasion. The sound system and lighting were also excellent.', 51, 73),
(55, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I attended a conference at Royal Hall-Indoor Women Hall and was very impressed with the facilities and services provided. The hall was spacious and well-equipped with modern technology, including high-speed internet and AV equipment. The staff were also very helpful and accommodating, ensuring that everything ran smoothly throughout the event.', 50, 73),
(56, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a music concert at Ramallah Cultural Palace and was blown away by the venue. The acoustics were exceptional, allowing for a truly immersive and captivating performance. The seating was also very comfortable and the staff were very helpful and friendly.', 50, 74),
(57, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I attended a cultural festival at Ramallah Cultural Palace and it was a fantastic experience. The venue was spacious and well-designed, allowing for a variety of performances and activities to take place simultaneously. The staff were very helpful and friendly, ensuring that everyone had a great time. I would definitely recommend this venue for any cultural or community event.', 51, 74),
(58, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently stayed at Carmel Hotel and was very impressed with the quality of service and facilities. The rooms were spacious and well-appointed, with all the amenities needed for a comfortable stay. The staff were also very friendly and helpful, ensuring that all my needs were met. The hotel\'s location was also very convenient, with easy access to shopping, restaurants, and other attractions. I would highly recommend this hotel for anyone visiting the area.', 51, 77),
(59, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I hosted a corporate event at Carmel Hotel-Wedding Hall and it was a huge success. The hall was well-equipped with modern technology, including high-speed internet and AV equipment, making it easy to conduct presentations and seminars. The staff were also very professional and helpful, ensuring that all our needs were met. The location was also very convenient, with easy access to transportation and parking. ', 50, 77),
(60, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently hosted a business conference at Carmel Hotel-Meeting Hall and it was a fantastic experience. The hall was spacious and well-equipped with modern technology, including high-speed internet and AV equipment, making it easy to conduct presentations and seminars. The catering was also exceptional, with a delicious selection of food and drinks that catered to all dietary needs.', 50, 92),
(61, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently stayed at Carmel Hotel and attended a meeting in one of their meeting rooms. The facilities were excellent, with all the amenities needed for a productive and comfortable meeting. The staff were also very helpful and attentive, ensuring that all our needs were met. The location was also very convenient, with easy access to transportation and other attractions.', 51, 92),
(62, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a conference at Ceaser Hotel-Meeting Hall and was very impressed with the facilities and services provided. The hall was well-designed and had all the necessary equipment for a successful conference, including AV equipment and high-speed internet. The catering was also exceptional, with a wide variety of delicious dishes that catered to all dietary needs. The staff were very professional and attentive, ensuring that everything ran smoothly t', 51, 79),
(63, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently stayed at Ceaser Hotel and attended a meeting in one of their meeting rooms. The facilities were excellent, with all the amenities needed for a productive and comfortable meeting. The staff were also very friendly and helpful, ensuring that all attendees had a great experience. The location was also very convenient, with easy access to transportation and other attractions. ', 50, 79),
(64, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a wedding reception at Al Qusoor-Women Hall and it was an unforgettable experience. The hall was beautifully decorated with a feminine touch and had a cozy and intimate atmosphere. The catering was also exceptional, with a delicious selection of food and desserts that catered to all tastes', 50, 88),
(65, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a networking event at Al Qusoor-Women Hall and was very impressed with the facilities and services provided. The hall was spacious and well-designed, making it easy to network and connect with other professionals. The catering was also excellent, with a variety of delicious food and drinks. The staff were very professional and attentive, ensuring that everything ran smoothly throughout the event. ', 51, 88),
(66, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a networking event at Al Qusoor-Men Hall and was very impressed with the facilities and services provided. The hall was spacious and well-designed, making it easy to network and connect with other professionals. The catering was also excellent, with a variety of delicious food and drinks. The staff were very professional and attentive, ensuring that everything ran smoothly throughout the event. ', 51, 89),
(67, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a wedding reception at Al Qusoor-Men Hall and it was an unforgettable experience. The hall was beautifully decorated with a feminine touch and had a cozy and intimate atmosphere. The catering was also exceptional, with a delicious selection of food and desserts that catered to all tastes', 50, 89),
(68, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a friend\'s wedding at Al Rahwan-Women Hall and it was a wonderful experience. The hall was beautifully decorated and had a warm and inviting atmosphere. The catering was also exceptional, with a wide variety of delicious food and desserts that catered to all tastes. The staff were very friendly and helpful, ensuring that everything ran smoothly throughout the event.', 50, 84),
(69, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a conference at Al Rahwan-Women Hall and was very impressed with the facilities and services provided. The hall was well-designed and had all the necessary equipment for a successful conference, including AV equipment and high-speed internet. The catering was also excellent, with a variety of delicious dishes that catered to all dietary needs. The staff were very professional and attentive, ensuring that everything ran smoothly throughout the event. ', 51, 84),
(70, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a friend\'s wedding at Al Rahwan-Men Hall and it was a wonderful experience. The hall was beautifully decorated and had a warm and inviting atmosphere. The catering was also exceptional, with a wide variety of delicious food and desserts that catered to all tastes. The staff were very friendly and helpful, ensuring that everything ran smoothly throughout the event.', 50, 85),
(71, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a conference at Al Rahwan-Men Hall and was very impressed with the facilities and services provided. The hall was well-designed and had all the necessary equipment for a successful conference, including AV equipment and high-speed internet. The catering was also excellent, with a variety of delicious dishes that catered to all dietary needs. The staff were very professional and attentive, ensuring that everything ran smoothly throughout the event. ', 51, 85),
(72, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a friend\'s wedding at Grand Palace-Women Hall  and it was a wonderful experience. The hall was beautifully decorated and had a warm and inviting atmosphere. The catering was also exceptional, with a wide variety of delicious food and desserts that catered to all tastes. The staff were very friendly and helpful, ensuring that everything ran smoothly throughout the event.', 50, 86),
(73, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a friend\'s wedding at Grand Palace-men Hall  and it was a wonderful experience. The hall was beautifully decorated and had a warm and inviting atmosphere. The catering was also exceptional, with a wide variety of delicious food and desserts that catered to all tastes. The staff were very friendly and helpful, ensuring that everything ran smoothly throughout the event.', 50, 87),
(74, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a conference at Grand Palace-Men Hall  and was very impressed with the facilities and services provided. The hall was well-designed and had all the necessary equipment for a successful conference, including AV equipment and high-speed internet. The catering was also excellent, with a variety of delicious dishes that catered to all dietary needs. The staff were very professional and attentive, ensuring that everything ran smoothly throughout the event. ', 51, 87),
(75, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a conference at Grand Palace-Women Hall  and was very impressed with the facilities and services provided. The hall was well-designed and had all the necessary equipment for a successful conference, including AV equipment and high-speed internet. The catering was also excellent, with a variety of delicious dishes that catered to all dietary needs. The staff were very professional and attentive, ensuring that everything ran smoothly throughout the event. ', 51, 86),
(76, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a wedding reception at Grand Park-Weddings Hall and it was an incredible experience. The hall was beautifully decorated and had a romantic ambiance that made the event feel very special. The catering was also exceptional, with a wide range of delicious dishes that catered to all tastes. The staff were very attentive and accommodating, ensuring that everything ran smoothly throughout the evening. I would highly recommend this venue for any wedding or other special occasion.', 51, 90),
(77, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a charity fundraiser at Grand Park-Weddings Hall and it was a great experience. The hall was well-designed and had all the necessary equipment for a successful event, including AV equipment and high-speed internet. The catering was also great, with a variety of delicious dishes and drinks. The staff were very accommodating and helpful, ensuring that the event ran smoothly from start to finish. I would highly recommend this venue for any large social or business event.', 50, 90),
(78, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a business conference at Grand Park-Meetings Hall and it was a great experience. The hall was spacious and well-equipped, with all the necessary equipment for a successful conference, including AV equipment, high-speed internet, and comfortable seating. The catering was also excellent, with a variety of delicious dishes and refreshments. The staff were very professional and helpful, ensuring that everything ran smoothly throughout the event.', 50, 91),
(79, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I hosted a team-building event at Grand Park-Meetings Hall and it was a fantastic experience. The hall was spacious and well-designed, with plenty of room for our group to participate in various activities. The catering was also great, with a variety of delicious snacks and refreshments that everyone enjoyed. The staff were also very accommodating and helpful, ensuring that all our needs were met. ', 51, 91),
(80, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a wedding reception at El Mirador Hotel-Women Hall and it was a wonderful experience. The hall was beautifully decorated and had a lovely ambiance that made the event feel very special. The catering was also exceptional, with a variety of delicious dishes and desserts that catered to all tastes. The staff were very attentive and accommodating, ensuring that everything ran smoothly throughout the evening.', 51, 95),
(81, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I hosted my daughter\'s quinceañera at El Mirador Hotel-Women Hall and it was a fantastic experience. The hall was spacious and well-designed, with plenty of room for our guests to socialize and dance. The catering was also excellent, with a delicious selection of food and desserts that everyone enjoyed. The staff were also very professional and helpful, ensuring that all our needs were met. The location was also very convenient, with easy access to transportation and ample parking.', 50, 95),
(82, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I hosted my brother quinceañera at El Mirador Hotel-Men Hall and it was a fantastic experience. The hall was spacious and well-designed, with plenty of room for our guests to socialize and dance. The catering was also excellent, with a delicious selection of food and desserts that everyone enjoyed. The staff were also very professional and helpful, ensuring that all our needs were met. The location was also very convenient, with easy access to transportation and ample parking.', 50, 96),
(83, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a wedding reception at El Mirador Hotel-Men Hall and it was a wonderful experience. The hall was beautifully decorated and had a lovely ambiance that made the event feel very special. The catering was also exceptional, with a variety of delicious dishes and desserts that catered to all tastes. The staff were very attentive and accommodating, ensuring that everything ran smoothly throughout the evening.', 51, 96),
(84, 'Excellent', 'Highly Recommend', 'Good', 'Good', '\"I recently attended a training seminar at El Mirador Hotel-Meetings Hall and it was a great experience. The hall was well-equipped with all the necessary equipment, including AV equipment and high-speed internet. The catering was also great, with a variety of delicious dishes and beverages. The staff were very professional and helpful, ensuring that everything ran smoothly throughout the event. The location was also very convenient, with easy access to transportation and ample parking.', 51, 97),
(85, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I hosted a team-building event at El Mirador Hotel-Meetings Hall and it was a fantastic experience. The hall was spacious and well-equipped, with plenty of room for our group to participate in various activities. The catering was also great, with a variety of delicious snacks and refreshments that everyone enjoyed. The staff were also very accommodating and helpful, ensuring that all our needs were met. ', 50, 97),
(86, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently hosted a retirement party for my colleague at El Mirador Hotel-Parties Hall and it was a great experience. The hall was well-equipped with all the necessary amenities, including AV equipment, high-speed internet, and comfortable seating. The catering was also excellent, with a variety of delicious dishes and beverages. The staff were very professional and helpful, ensuring that everything ran smoothly throughout the event. The location was also very convenient.', 50, 98),
(87, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I attended a friend\'s graduation party at El Mirador Hotel-Parties Hall and it was a great experience. The hall was spacious and well-designed, with plenty of room for our group to socialize and dance. The catering was also fantastic, with a variety of delicious food and drinks that everyone enjoyed. The staff were also very friendly and helpful, ensuring that all our needs were met.', 51, 98),
(88, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a wedding reception at Al Sufsaf-Women Hall Hall and it was a wonderful experience. The hall was beautifully decorated and had a lovely ambiance that made the event feel very special. The catering was also exceptional, with a variety of delicious dishes and desserts that catered to all tastes. The staff were very attentive and accommodating, ensuring that everything ran smoothly throughout the evening.', 51, 99),
(89, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a charity fundraiser at Al Sufsaf-Women Hall and it was a great experience. The hall was well-designed and had all the necessary equipment for a successful event, including AV equipment and high-speed internet. The catering was also great, with a variety of delicious dishes and drinks. The staff were very accommodating and helpful, ensuring that the event ran smoothly from start to finish. ', 50, 99),
(90, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a wedding reception at Al Sufsaf-Men Hall Hall and it was a wonderful experience. The hall was beautifully decorated and had a lovely ambiance that made the event feel very special. The catering was also exceptional, with a variety of delicious dishes and desserts that catered to all tastes. The staff were very attentive and accommodating, ensuring that everything ran smoothly throughout the evening.', 51, 100),
(91, 'Excellent', 'Highly Recommend', 'Good', 'Good', 'I recently attended a charity fundraiser at Al Sufsaf-Men Hall and it was a great experience. The hall was well-designed and had all the necessary equipment for a successful event, including AV equipment and high-speed internet. The catering was also great, with a variety of delicious dishes and drinks. The staff were very accommodating and helpful, ensuring that the event ran smoothly from start to finish. ', 50, 100),
(92, 'Excellent', 'Highly Recommend', 'Good', 'Good', ',', 37, 78);

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` int NOT NULL,
  `city` enum('Birzeit','Jifna','Betonya','Kufur Aqab','Ramallah','Ramallah(Al-Masayif)','Ramallah(Al-Tireh)','Ramallah (Al-Irsal)','Ramallah(Al-Masyoun)','Al-Bireh','Al-Bireh(Nablus Street)','Al-Bireh(Al-Balou)','Al-Bireh(Um Al-Sharayet)','Al-Bireh(Al-Quds Street)') NOT NULL,
  `address` varchar(255) NOT NULL,
  `hall_describtion` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image_view` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_view` varchar(500) NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('pending','approved','canceled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`, `type`, `city`, `address`, `hall_describtion`, `image`, `image_view`, `video_view`, `user_id`, `status`) VALUES
(79, 'Elya Venues', 1, 'Al-Bireh', 'Al-Bireh', '- Illuminated Dance Floor\r\n- Air-conditioning System\r\n- Separate entrances for both men and  women\r\n- Different options of decorations', '63d6e3a211735.pdf', '63d6e3a21171a.jpg', 'elya.mp4', 42, 'approved'),
(80, 'Royal Halls', 1, 'Jifna', 'Birzeit-Jiffna', 'It has 4 halls (2 indoor halls for women and 2 outdoor halls for men). \r\n\r\nContact info: 0599221720', '63d718e83c1cf.pdf', '63d718e83c1a1.png', 'royal.mp4', 43, 'approved'),
(81, 'Ramallah Cultural Palace', 2, 'Ramallah', 'Industrial Zone', 'It can accommodate 200 people and enjoys the maximum specifications, comprehensive audio-to-visual technology, heating and cooling systems, and tables that can be moved and set as needed.', '63d72051b9c68.pdf', '63d72051b9c36.jpg', 'Null', 44, 'approved'),
(82, 'Carmel Hotel', 3, 'Ramallah(Al-Masyoun)', 'Al-Masyoun', 'We have two halls, the first one is for weddings and the other one is for meetings.', '63d7339724ee0.pdf', '63d7339724ce1.png', 'carmel.mp4', 45, 'approved'),
(83, 'Gloria Venues', 1, 'Ramallah (Al-Irsal)', 'Al-Irsal', 'Two halls (one for men and one for women).', '63d739af19adc.pdf', '63d739af19ab7.png', 'gloria.mp4', 37, 'approved'),
(84, 'Ceaser Hotel', 3, 'Ramallah(Al-Masyoun)', 'Al-Masyoon', 'Two wedding halls for men and women and group of halls for meetings and other events.', '63d73d619d31c.pdf', '63d73d619d309.png', 'ceaser.mp4', 48, 'approved'),
(97, 'Al-Qusoor', 1, 'Al-Bireh(Um Al-Sharayet)', 'Um-Al Sharayet ', 'Two halls one for men and one for women ', '', 'qosor.png', 'qosor.mp4', 42, 'approved'),
(99, 'AL Rahwan Hall', 1, 'Al-Bireh(Nablus Street)', 'ِAl-Bireh (Nablus street) ', 'Two halls one of them for men and the other for women ', '', 'rahwan.png', 'rahwan.mp4', 42, 'approved'),
(107, 'Grand Palace Hall ', 1, 'Kufur Aqab', 'Kufur Aqab - Al matar street ', 'Two halls , one for men and one for women ', '', 'grandp.png', 'grandp.mp4', 42, 'approved'),
(108, 'Grand Park Hotel Hall ', 3, 'Ramallah(Al-Masyoun)', 'Al -Masyoon ', 'One Hall', '', 'grandpark.png', 'grandpark.mp4', 42, 'approved'),
(109, 'El Mirador Hotel Hall', 3, 'Ramallah(Al-Tireh)', 'Al -Tireh , Al-Manaa Center', 'Hall for women , outer hall for men ', '', 'mir.jpg', 'mir.mp4', 42, 'approved'),
(110, 'ِAl Sufsaf', 1, 'Al-Bireh(Al-Balou)', 'Al-Berih- Balou', 'One inner hall for women  and garden for men', '', 'safsaf.jpg', 'Null', 42, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subhall_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `uploaded_on`, `subhall_id`) VALUES
(79, '63d70a3c55695.PNG', '2023-01-30 02:07:24', 72),
(80, '63d70a54bdb64.PNG', '2023-01-30 02:07:48', 72),
(81, '63d70a666ba4e.PNG', '2023-01-30 02:08:06', 72),
(82, '63d70a7d8b457.PNG', '2023-01-30 02:08:29', 72),
(83, '63d70a8c551b3.PNG', '2023-01-30 02:08:44', 72),
(84, '63d70a9cbd60d.PNG', '2023-01-30 02:09:00', 72),
(85, '63d70aac4bdb5.PNG', '2023-01-30 02:09:16', 72),
(86, '63d70abbccf10.PNG', '2023-01-30 02:09:31', 72),
(87, '63d70acb2f3c1.PNG', '2023-01-30 02:09:47', 72),
(88, '63d70ade688bb.PNG', '2023-01-30 02:10:06', 72),
(89, '63d70aebbd69a.PNG', '2023-01-30 02:10:19', 72),
(90, '63d70b0b8c780.PNG', '2023-01-30 02:10:51', 72),
(91, '63d71badeff2e.PNG', '2023-01-30 03:21:49', 73),
(92, '63d71bc257291.PNG', '2023-01-30 03:22:10', 73),
(93, '63d71bd1dbc91.PNG', '2023-01-30 03:22:25', 73),
(94, '63d71bde06838.PNG', '2023-01-30 03:22:38', 73),
(95, '63d721a32f2f6.jpg', '2023-01-30 03:47:15', 74),
(96, '63d721c8c9fdd.jpg', '2023-01-30 03:47:52', 74),
(97, '63d7220712698.jpg', '2023-01-30 03:48:55', 74),
(98, '63d73b8dae655.jpg', '2023-01-30 05:37:49', 78),
(99, '63d73b9e1dd87.jpg', '2023-01-30 05:38:06', 78),
(100, '63d73ba8bfdd6.jpg', '2023-01-30 05:38:16', 78),
(101, '63d73bb53c1ab.jpg', '2023-01-30 05:38:29', 78),
(102, '63d73fda0451d.jpg', '2023-01-30 05:56:10', 79),
(103, '63d73fe570641.jpg', '2023-01-30 05:56:21', 79),
(104, '63d740140403d.jpg', '2023-01-30 05:57:08', 79),
(105, '63ffdf39a3e8a.jpg', '2023-03-02 01:26:49', 84),
(106, '63ffdf39a505e.jpg', '2023-03-02 01:26:49', 84),
(107, '63ffdf39a6eeb.jpg', '2023-03-02 01:26:49', 84),
(108, '63ffdf39a853b.jpg', '2023-03-02 01:26:49', 84),
(109, '63ffdf39a9dc9.jpg', '2023-03-02 01:26:49', 84),
(110, '63ffdf39ab2dd.jpg', '2023-03-02 01:26:49', 84),
(111, '63ffdf39ac459.jpg', '2023-03-02 01:26:49', 84),
(112, '63ffdf39add89.jpg', '2023-03-02 01:26:49', 84),
(113, '63ffdf39aef93.jpg', '2023-03-02 01:26:49', 84),
(114, '63ffdf39b00fc.jpg', '2023-03-02 01:26:49', 84),
(115, '63ffe0d39c70b.jpg', '2023-03-02 01:33:39', 85),
(116, '63ffe0d39df0a.jpg', '2023-03-02 01:33:39', 85),
(117, '63ffe0d39f245.jpg', '2023-03-02 01:33:39', 85),
(118, '63ffe7abda08a.jpg', '2023-03-02 02:02:51', 86),
(119, '63ffe7abdb451.jpg', '2023-03-02 02:02:51', 86),
(120, '63ffe7abdd018.jpg', '2023-03-02 02:02:51', 86),
(121, '63ffe7abde4eb.jpg', '2023-03-02 02:02:51', 86),
(122, '63ffe7abdf855.jpg', '2023-03-02 02:02:51', 86),
(123, '63ffe7abe08aa.jpg', '2023-03-02 02:02:51', 86),
(124, '63ffe7abe1a23.jpg', '2023-03-02 02:02:51', 86),
(125, '63ffe7abe2dfc.jpg', '2023-03-02 02:02:51', 86),
(126, '63ffe7abe48ef.jpg', '2023-03-02 02:02:51', 86),
(127, '63ffe7abe608e.jpg', '2023-03-02 02:02:51', 86),
(128, '63ffe7abe73bb.jpg', '2023-03-02 02:02:51', 86),
(129, '63ffe7abe8d41.jpg', '2023-03-02 02:02:51', 86),
(130, '63ffe7abe9ec9.jpg', '2023-03-02 02:02:51', 86),
(131, '63ffe89f535b7.jpg', '2023-03-02 02:06:55', 87),
(132, '63ffe89f552ca.jpg', '2023-03-02 02:06:55', 87),
(133, '63ffe89f56db4.jpg', '2023-03-02 02:06:55', 87),
(134, '63ffe89f58ad2.jpg', '2023-03-02 02:06:55', 87),
(135, '63ffe89f5a3ab.jpg', '2023-03-02 02:06:55', 87),
(136, '63ffe89f5c1d7.jpg', '2023-03-02 02:06:55', 87),
(137, '63ffe89f5da95.jpg', '2023-03-02 02:06:55', 87),
(138, '63ffe89f5f5be.jpg', '2023-03-02 02:06:55', 87),
(139, '63ffe89f60fdc.jpg', '2023-03-02 02:06:55', 87),
(140, '63ffe9a41082b.jpg', '2023-03-02 02:11:16', 88),
(141, '63ffe9a4119a0.jpg', '2023-03-02 02:11:16', 88),
(142, '63ffe9a412ae7.jpg', '2023-03-02 02:11:16', 88),
(143, '63ffe9a413fc3.jpg', '2023-03-02 02:11:16', 88),
(144, '63ffe9a415135.jpg', '2023-03-02 02:11:16', 88),
(145, '63ffe9a416275.jpg', '2023-03-02 02:11:16', 88),
(146, '63ffe9a4176f8.jpg', '2023-03-02 02:11:16', 88),
(147, '63ffe9a418afb.jpg', '2023-03-02 02:11:16', 88),
(148, '63ffe9a419e55.jpg', '2023-03-02 02:11:16', 88),
(149, '63ffe9a41b5cc.jpg', '2023-03-02 02:11:16', 88),
(150, '63ffe9a41c6e7.jpg', '2023-03-02 02:11:16', 88),
(151, '63ffe9a41d701.jpg', '2023-03-02 02:11:16', 88),
(152, '63ffea18221be.jpg', '2023-03-02 02:13:12', 89),
(153, '63ffea1823a93.jpg', '2023-03-02 02:13:12', 89),
(154, '63ffea1824afd.jpg', '2023-03-02 02:13:12', 89),
(155, '63ffeb4ecef31.jpg', '2023-03-02 02:18:22', 90),
(156, '63ffeb4ed0327.jpg', '2023-03-02 02:18:22', 90),
(157, '63ffeb4ed1901.jpg', '2023-03-02 02:18:22', 90),
(158, '63ffeb4ed2b73.jpg', '2023-03-02 02:18:22', 90),
(159, '63ffeb4ed42c8.jpg', '2023-03-02 02:18:22', 90),
(160, '63ffec1f85086.jpg', '2023-03-02 02:21:51', 91),
(161, '63ffec1f86589.jpg', '2023-03-02 02:21:51', 91),
(162, '63ffec1f87b61.jpg', '2023-03-02 02:21:51', 91),
(163, '63ffec1f88ca8.jpg', '2023-03-02 02:21:51', 91),
(164, '63ffec1f8a1e7.jpg', '2023-03-02 02:21:51', 91),
(165, '63ffec1f8b87a.jpg', '2023-03-02 02:21:51', 91),
(166, '63ffec1f8cd92.jpg', '2023-03-02 02:21:51', 91),
(167, '63ffec1f8e2d6.jpg', '2023-03-02 02:21:51', 91),
(168, '63fff0b907f4e.jpg', '2023-03-02 02:41:29', 92),
(169, '63fff0b90912a.jpg', '2023-03-02 02:41:29', 92),
(170, '63fff0b90a871.jpg', '2023-03-02 02:41:29', 92),
(171, '63fff0b90bb7d.jpg', '2023-03-02 02:41:29', 92),
(172, '63fff0b90cce0.jpg', '2023-03-02 02:41:29', 92),
(173, '63fff1b346a73.jpg', '2023-03-02 02:45:39', 77),
(174, '63fff1b3483eb.jpg', '2023-03-02 02:45:39', 77),
(175, '63fff1b349aa4.jpg', '2023-03-02 02:45:39', 77),
(176, '63fff1b34ad50.jpg', '2023-03-02 02:45:39', 77),
(177, '63fff1b34c16c.jpg', '2023-03-02 02:45:39', 77),
(178, '63fff1b34d29e.jpg', '2023-03-02 02:45:39', 77),
(179, '63fff788563b6.jpg', '2023-03-02 03:10:32', 95),
(180, '63fff788576f0.jpg', '2023-03-02 03:10:32', 95),
(181, '63fff78858b55.jpg', '2023-03-02 03:10:32', 95),
(182, '63fff78859cdf.jpg', '2023-03-02 03:10:32', 95),
(183, '63fff7885ae33.jpg', '2023-03-02 03:10:32', 95),
(184, '63fff7885c6b3.jpg', '2023-03-02 03:10:32', 95),
(185, '63fff7885d993.jpg', '2023-03-02 03:10:32', 95),
(186, '63fff7885e9ee.jpg', '2023-03-02 03:10:32', 95),
(187, '63fff7886023d.jpg', '2023-03-02 03:10:32', 95),
(188, '63fff78861c29.jpg', '2023-03-02 03:10:32', 95),
(189, '63fff78863221.jpg', '2023-03-02 03:10:32', 95),
(190, '63fff7886495c.jpg', '2023-03-02 03:10:32', 95),
(191, '63fff78866493.jpg', '2023-03-02 03:10:32', 95),
(192, '63fff788682e1.jpg', '2023-03-02 03:10:32', 95),
(193, '63fff78869874.jpg', '2023-03-02 03:10:32', 95),
(194, '63fff84e2fbf9.jpg', '2023-03-02 03:13:50', 96),
(195, '63fff84e3175f.jpg', '2023-03-02 03:13:50', 96),
(196, '63fff84e32ca6.jpg', '2023-03-02 03:13:50', 96),
(197, '63fff84e340fe.jpg', '2023-03-02 03:13:50', 96),
(198, '63fff84e35524.jpg', '2023-03-02 03:13:50', 96),
(199, '63fff906b975b.jpg', '2023-03-02 03:16:54', 97),
(200, '63fff906ba9c6.jpg', '2023-03-02 03:16:54', 97),
(201, '63fff906bbcc4.jpg', '2023-03-02 03:16:54', 97),
(202, '63fff906bd734.jpg', '2023-03-02 03:16:54', 97),
(203, '63fff97270252.jpg', '2023-03-02 03:18:42', 98),
(204, '63fff97271a6b.jpg', '2023-03-02 03:18:42', 98),
(205, '63fff972736f4.jpg', '2023-03-02 03:18:42', 98),
(206, '63fff972750f2.jpg', '2023-03-02 03:18:42', 98),
(207, '63fffad87e358.jpg', '2023-03-02 03:24:40', 99),
(208, '63fffad87f826.jpg', '2023-03-02 03:24:40', 99),
(209, '63fffad880c56.jpg', '2023-03-02 03:24:40', 99),
(210, '63fffad881d74.jpg', '2023-03-02 03:24:40', 99),
(211, '63fffad882ef2.jpg', '2023-03-02 03:24:40', 99),
(212, '63fffad884488.jpg', '2023-03-02 03:24:40', 99),
(213, '63fffad88588c.jpg', '2023-03-02 03:24:40', 99),
(214, '63fffad886a31.jpg', '2023-03-02 03:24:40', 99),
(215, '63fffad887c9d.jpg', '2023-03-02 03:24:40', 99),
(216, '63fffad888f44.jpg', '2023-03-02 03:24:40', 99),
(217, '63fffad88a07d.jpg', '2023-03-02 03:24:40', 99),
(218, '63fffad88b433.jpg', '2023-03-02 03:24:40', 99),
(219, '63fffad88c71f.jpg', '2023-03-02 03:24:40', 99),
(220, '63fffad88d98e.jpg', '2023-03-02 03:24:40', 99),
(221, '63fffad88ebc6.jpg', '2023-03-02 03:24:40', 99),
(222, '63fffad88fc17.jpg', '2023-03-02 03:24:40', 99),
(223, '63fffb5d303f1.jpg', '2023-03-02 03:26:53', 100),
(224, '63fffb5d316c1.jpg', '2023-03-02 03:26:53', 100),
(225, '63fffb5d3273f.jpg', '2023-03-02 03:26:53', 100),
(226, '63fffb5d3380a.jpg', '2023-03-02 03:26:53', 100),
(227, '63fffb5d34b1a.jpg', '2023-03-02 03:26:53', 100),
(228, '63fffb5d35bc6.jpg', '2023-03-02 03:26:53', 100),
(229, '63fffb5d36d9f.jpg', '2023-03-02 03:26:53', 100),
(230, '63fffb5d38303.jpg', '2023-03-02 03:26:53', 100),
(231, '63fffb5d3988d.jpg', '2023-03-02 03:26:53', 100),
(232, '6401eb61a1ccd.jpg', '2023-03-03 14:43:13', 76),
(233, '6401eb61a2b39.jpg', '2023-03-03 14:43:13', 76),
(234, '6401eb61a368a.jpg', '2023-03-03 14:43:13', 76),
(235, '6401eb61a40dc.jpg', '2023-03-03 14:43:13', 76),
(236, '6401eb61a4be0.jpg', '2023-03-03 14:43:13', 76),
(237, '6401eb61a565a.jpg', '2023-03-03 14:43:13', 76),
(238, '6401eb61a60b7.jpg', '2023-03-03 14:43:13', 76),
(239, '6401eb61a6d02.jpg', '2023-03-03 14:43:13', 76),
(240, '6401ee850e0c4.png', '2023-03-03 14:56:37', 101),
(241, '6401ee850ec25.png', '2023-03-03 14:56:37', 101),
(242, '6401ee850f770.png', '2023-03-03 14:56:37', 101),
(243, '6401ee85102b8.png', '2023-03-03 14:56:37', 101),
(244, '6401ee8510e02.png', '2023-03-03 14:56:37', 101),
(245, '6401ee851198a.png', '2023-03-03 14:56:37', 101),
(246, '6401ee851252f.png', '2023-03-03 14:56:37', 101),
(247, '6401ee85130e0.png', '2023-03-03 14:56:37', 101);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `user_id` int NOT NULL,
  `hall_id` int NOT NULL,
  `price` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `user_id`, `hall_id`, `price`, `name`, `created_at`) VALUES
(1, '5CP000792Y9352448', 32, 74, 40, 'nemat', '2023-02-17 23:05:14'),
(2, '4PK05472W0928571K', 32, 74, 200, 'Nemat', '2023-02-17 23:08:30'),
(3, '3U338711DS0899407', 32, 74, 800, 'Andalus', '2023-02-17 23:09:50'),
(4, '20X209340A8241109', 74, 32, 800, 'Nemat', '2023-02-17 23:33:52'),
(5, '5JK461042R608135D', 74, 32, 1000, 'nemat', '2023-02-18 11:31:01'),
(6, '1XA969467E729242F', 74, 32, 40, 'Nemat', '2023-02-18 11:42:50'),
(7, '93695735SF889001A', 78, 32, 40, 'Nemat', '2023-02-18 12:04:10'),
(8, '07B50693SM6803521', 32, 78, 140, 'jana', '2023-02-18 19:08:31'),
(9, '60694006CP0215638', 78, 32, 120, 'Nemat', '2023-02-18 19:39:54'),
(10, '0LC17766U4867415T', 32, 78, 61, 'Nemat', '2023-03-01 15:41:05'),
(11, '2R191223H81295713', 37, 73, 485, 'Nemat', '2023-03-05 18:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int NOT NULL,
  `hall_id` int NOT NULL,
  `Sunday` int NOT NULL,
  `Monday` int NOT NULL,
  `Tuesday` int NOT NULL,
  `Wednesday` int NOT NULL,
  `Thursday` int NOT NULL,
  `Friday` int NOT NULL,
  `Saturday` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `hall_id`, `Sunday`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`) VALUES
(2, 73, 7000, 8000, 5000, 6000, 9000, 13000, 10000),
(4, 74, 1000, 2000, 6000, 1000, 4000, 15000, 6000),
(7, 76, 5000, 15000, 16000, 15000, 20000, 20000, 6000),
(8, 77, 25000, 25000, 25000, 25000, 25000, 25000, 25000),
(9, 72, 10000, 15000, 15000, 15000, 15000, 20000, 20000),
(10, 78, 25000, 20000, 20000, 10000, 15000, 20000, 20000),
(11, 79, 100, 30000, 600, 1000, 4000, 20000, 6000),
(13, 84, 1200, 1200, 1200, 1200, 1500, 1800, 1800),
(14, 85, 1200, 1200, 1200, 1200, 1500, 1800, 1800),
(15, 86, 7000, 7000, 7000, 7000, 8000, 10000, 7000),
(16, 87, 7000, 7000, 7000, 7000, 8000, 10000, 7000),
(17, 88, 7000, 7000, 7000, 7000, 7000, 8000, 7000),
(18, 89, 7000, 7000, 7000, 7000, 7000, 8000, 7000),
(19, 90, 20000, 20000, 20000, 20000, 20000, 20000, 20000),
(20, 91, 10000, 10000, 10000, 10000, 10000, 10000, 10000),
(21, 92, 5000, 5000, 5000, 5000, 6000, 6000, 6000),
(24, 95, 10000, 10000, 10000, 10000, 11000, 11000, 10000),
(25, 96, 6000, 6000, 6000, 6000, 7000, 7000, 7000),
(26, 97, 5000, 5000, 5000, 5000, 8000, 8000, 8000),
(27, 98, 10000, 10000, 10000, 10000, 12000, 12000, 12000),
(28, 99, 5000, 5000, 5000, 6000, 7000, 7000, 7000),
(29, 100, 5000, 5000, 5000, 6000, 6000, 7000, 7000),
(30, 101, 14500, 14000, 14000, 14000, 14000, 15000, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `hall_id` int NOT NULL,
  `rating_number` int NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `hall_id`, `rating_number`, `description`) VALUES
(1, 1, 74, 5, NULL),
(2, 1, 74, 5, NULL),
(3, 1, 72, 5, NULL),
(4, 35, 74, 5, 'nice'),
(5, 35, 74, 1, ''),
(6, 35, 78, 2, ''),
(7, 35, 78, 5, 'wow'),
(8, 32, 74, 3, 'nnn'),
(9, 35, 72, 4, NULL),
(10, 35, 73, 4, NULL),
(11, 35, 73, 3, NULL),
(12, 35, 74, 5, NULL),
(13, 35, 76, 4, NULL),
(14, 35, 76, 3, NULL),
(15, 35, 77, 3, NULL),
(16, 35, 77, 5, NULL),
(17, 35, 77, 5, NULL),
(18, 35, 78, 4, NULL),
(19, 35, 78, 2, NULL),
(20, 35, 78, 4, NULL),
(21, 35, 79, 3, NULL),
(22, 35, 79, 3, NULL),
(23, 35, 84, 5, NULL),
(24, 35, 85, 3, NULL),
(25, 35, 85, 4, NULL),
(26, 35, 86, 5, NULL),
(27, 35, 86, 5, NULL),
(28, 35, 87, 3, NULL),
(29, 35, 86, 4, NULL),
(30, 35, 87, 4, NULL),
(31, 35, 87, 4, NULL),
(32, 35, 88, 3, NULL),
(33, 35, 88, 1, NULL),
(34, 35, 89, 5, NULL),
(35, 35, 90, 5, NULL),
(36, 35, 90, 4, NULL),
(37, 35, 90, 5, NULL),
(38, 35, 91, 5, NULL),
(39, 35, 91, 4, NULL),
(40, 35, 92, 4, NULL),
(41, 35, 95, 5, NULL),
(42, 35, 95, 4, NULL),
(43, 35, 96, 3, NULL),
(44, 35, 97, 5, NULL),
(45, 35, 97, 4, NULL),
(46, 35, 98, 3, NULL),
(47, 35, 98, 4, NULL),
(48, 35, 99, 5, NULL),
(49, 35, 99, 5, NULL),
(50, 35, 100, 5, NULL),
(51, 35, 100, 4, NULL),
(52, 35, 86, 5, NULL),
(53, 37, 78, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `number_guests` int NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `hall_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('pending','approved','canceled') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `event_type`, `number_guests`, `date`, `start_time`, `end_time`, `notes`, `hall_id`, `user_id`, `status`, `created_at`, `price`) VALUES
(58, '9', 100, '2023-03-08', '15:50:00', '19:50:00', '.', 74, 37, 'pending', '2023-03-01 19:51:04', 1000),
(59, '2', 100, '2023-02-27', '20:56:00', '22:56:00', '.', 78, 37, 'approved', '2023-03-01 19:56:21', 600),
(60, '2', 100, '2023-03-09', '19:38:00', '20:38:00', ',', 78, 48, 'canceled', '2023-03-03 18:38:51', 15000),
(61, '4', 100, '2023-03-09', '19:39:00', '20:39:00', ',', 78, 48, 'approved', '2023-03-03 18:41:08', 15000),
(62, '2', 100, '2023-03-13', '19:25:00', '21:25:00', '..', 73, 37, 'approved', '2023-03-05 18:26:04', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `subhalls`
--

CREATE TABLE `subhalls` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` int NOT NULL,
  `number_of_guests` int NOT NULL,
  `hall_describtion` varchar(500) NOT NULL,
  `services` varchar(500) NOT NULL,
  `image_view` varchar(300) NOT NULL,
  `hall_id` int NOT NULL,
  `num_of_reservation` int NOT NULL DEFAULT '0',
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subhalls`
--

INSERT INTO `subhalls` (`id`, `name`, `type`, `number_of_guests`, `hall_describtion`, `services`, `image_view`, `hall_id`, `num_of_reservation`, `price`) VALUES
(72, 'Elya Venues-Women hall', 1, 1000, '- Address: Al-Bireh, Al-Quds Street, near the southern entrance of Al-Bireh.\r\n- Contact info: 00970597311322', '- Air-conditioning System\r\n- Ample Parking\r\n- Separate Entrance\r\n- Security Group\r\n- Special Hospitality \r\n- Waiting Room For the Bride\r\n- Electrical Elevators \r\n- DJ and huge monitors\r\n- Different options for decorations', '63d70a1843c7b.png', 79, 2, 20000),
(73, 'Royal Hall-Indoor Women Hall', 1, 500, 'Address: Jifna near Birzeit\r\nContact info: 0599221720', 'Cake, flowers decorations, drinks, DJ, Dinner, and lighting. In addition, Security cameras, sound systems, and huge monitors.', '63d71a756e22d.png', 80, 0, 13000),
(74, 'Ramallah Cultural Palace', 2, 200, 'It can accommodate 200 people and enjoys the maximum specifications.', 'Comprehensive audio-to-visual technology, heating, and cooling systems, and tables that can be moved and set as needed.', '63d721051bc75.jpg', 81, 4, 15000),
(76, 'Elya Venues-Men hall', 1, 1000, '- Address: Al-Bireh, Al-Quds Street, near the southern entrance of Al-Bireh.\r\n- Contact info: 00970597311322', '- Air-conditioning System - Ample Parking - Separate Entrance - Security Group - Electrical Elevators - DJ and huge monitors - Different options for decorations', '63d723f09ff41.jpg', 79, 1, 20000),
(77, 'Carmel Hotel-Wedding Hall', 1, 500, 'Contact info: 02 297 2222', 'Dinner, Decoration, DJ, Cake, Parking, and Pool in the hall', '63d735a857c62.png', 82, 6, 15000),
(78, 'Gloria Venues-Women Hall', 1, 500, 'Contact info:  0568650650  //  022955700', 'Full service , dinner is available , many decorations, condition system (high quality ), special lighting system, special sound system, 3 screens, lighting dance floor.', '63d73a8cd2203.png', 83, 3, 30000),
(79, 'Ceaser Hotel-Meeting Hall', 2, 100, 'Address: Al-Masyoon\nService depends on the event and its organizers\nContact info: 0595111331', 'Drinks and lunch.', '63d73f7831c78.png', 84, 0, 10000),
(84, 'Al Rahwan-Women Hall', 1, 500, 'Located on Nablus Street \r\nContact info: 0599370910', 'Cake, Drinks, DJ, decorations \r\n-No dinner service', '63ffde2411e5f.PNG', 99, 0, 1800),
(85, 'Al Rahwan-Men Hall', 1, 500, 'Located on Nablus Street \r\nContact info: 0599370910', 'Cake, Drinks, DJ, Decorations, Parking \r\n-No dinner service', '63ffe0bf91a03.png', 99, 0, 1800),
(86, 'Grand Palace-Women Hall', 1, 500, 'Location: Al Matar Street \r\nContact info: 0597926040/0526169479/022352235', 'Drinks, DJ,  Flowers, and Decorations', '63ffe5b8cb3de.jpg', 107, 0, 10000),
(87, 'Grand Palace-Men Hall', 1, 500, 'Location: Al Matar Street \r\nContact info: 0597926040/0526169479/022352235', 'Drinks, DJ,  Flowers, and Decorations', '63ffe880ace49.jpg', 107, 0, 10000),
(88, 'Al Qusoor-Women Hall', 1, 500, 'Contact info:  02 295 0850', 'Cake, Drinks, DJ,  Flowers, and Decorations', '63ffe959b7067.jpg', 97, 0, 8000),
(89, 'Al Qusoor-Men Hall', 1, 500, 'Contact info:  02 295 0850', 'Cake, Drinks, DJ,  Flowers, and Decorations', '63ffea04857f8.jpg', 97, 0, 8000),
(90, 'Grand Park-Weddings Hall', 1, 200, 'Contact info: 02 294 6800', 'Cake, Decoration, DJ-Dinner on demand', '63ffeaf7aba99.jpg', 108, 0, 20000),
(91, 'Grand Park-Meetings Hall', 2, 200, 'Contact info: 02 294 6800', 'Drinks, Decoration, lunch buffet on demand', '63ffec034c887.jpg', 108, 0, 10000),
(92, 'Carmel Hotel-Meeting Hall', 2, 200, 'Contact info: 02 297 2222', 'Drinks, huge monitor, and launch buffet on demand', '63fff0ab9f2f4.jpg', 82, 0, 6000),
(95, 'El Mirador Hotel-Women Hall', 1, 200, 'Contact info: 0597071144', 'Cake, Drinks, DJ, Photo Shooting, Decorations, and Parking', '63fff7529a6ef.jpg', 109, 0, 11000),
(96, 'El Mirador Hotel-Men Hall', 1, 100, 'Contact info: 0597071144', 'Cake, Drinks, DJ, Photo Shooting, Decorations, and Parking', '63fff836696a3.jpg', 109, 0, 7000),
(97, 'El Mirador Hotel-Meetings Hall', 2, 100, 'Contact info: 0597071144', 'Drinks, Parking, and monitors', '63fff8ee9924e.jpg', 109, 0, 8000),
(98, 'El Mirador Hotel-Parties Hall', 3, 100, 'Contact info: 0597071144', 'Drinks, Cake, Parking, and Decorations', '63fff95d7f23a.jpg', 109, 0, 12000),
(99, 'Al Sufsaf-Women Hall', 1, 200, 'Contact info: 0598121180', 'Drinks, Cake, Parking, Photo Session, Decorations, and Dinner on demand', '63fffab817e35.jpg', 110, 0, 7000),
(100, 'Al Sufsaf-Men Hall', 1, 200, 'Contact info: 0598121180', 'Drinks, Cake, Parking, Photo Session, Decorations, and Dinner on demand', '63fffb4781bd0.jpg', 110, 0, 7000),
(101, 'Ceaser Hotel-Wedding Hall', 1, 500, 'Two halls for men and women, 200 men in men hall  , 240 women in women hall\r\nContact info: 0595111331', 'Cake, Drinks, DJ and Parking', '6401ee3c5eb31.png', 84, 0, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `type` enum('user','owner') CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `type`, `status`, `created_at`) VALUES
(37, 'owner', '$2y$10$FhLmn9UB/hf4R6T1nJerf.rAwjYEik/eLRECmjsmiqxUKsECBZS2u', 'owner@gmail.com', 'owner', 1, '2022-12-28 22:55:30'),
(42, 'NqaaOwner', '$2y$10$AT9SOs3PTP14GqM2/xKOW.ayIBmx5phyC3VRp.omo2lsIGxg6cFh6', 'nqaaowner@gmail.com', 'owner', 1, '2023-01-29 22:32:23'),
(43, 'Royal', '$2y$10$DAHXALeBbqexQkQV.ln9o.dk2skCXwXZx3y4wZBOMw5hy8wKAhOGS', 'royal@gmail.com', 'owner', 1, '2023-01-30 02:50:57'),
(44, 'RamallahPalace', 'Palace@123', 'palace@gmail.com', 'owner', 1, '2023-01-30 03:33:41'),
(45, 'Carmel Hotel', '$2y$10$8cSzUtesztom9nB6fsUWROccQ1qnj4oD36lwlp/UBy6cfeXXk3Te2', 'carmel@gmail.com', 'owner', 1, '2023-01-30 05:00:24'),
(46, 'Gloria Venues', '$2y$10$BchaqoFkUqId/6pTq4Ospe0YkMlrwv2lsx/iTYO.K9Vhlml2j047.', 'gloria@gmail.com', 'owner', 1, '2023-01-30 05:25:23'),
(48, 'Ceaser  Hotel', '$2y$10$5qlsSchg7xE7xBv.XLUBzuZ6QN0h6vm7pnnJtlaSgv.DO9P1VDQFO', 'ceaser2@gmail.com', 'owner', 1, '2023-01-30 05:43:42'),
(49, 'Sara', '$2y$10$ZiHVf1ZwaQfJGzKjLzkAkuCW.WGG7TBlhNihze8hAz0.MFvIvETPS', 'sara@gmail.com', 'user', 1, '2023-03-01 20:01:42'),
(50, 'Ahmad', '$2y$10$MfoK9AK3umZyWeHG8JWVHOE3cska9SJ010kkvV42itlD1gSv1lg.y', 'ahmad@gmail.com', 'user', 1, '2023-03-01 20:04:45'),
(51, 'Deema', '$2y$10$L37BvHRed.oIScD8fTK8Y.vq1lfGx7gBRpeYUdiifT.ENQe2m7Ona', 'deema@gmail.com', 'user', 1, '2023-03-01 20:06:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback_subhall`
--
ALTER TABLE `feedback_subhall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subhall_id` (`subhall_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hall` (`hall_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `subhalls`
--
ALTER TABLE `subhalls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `feedback_subhall`
--
ALTER TABLE `feedback_subhall`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `subhalls`
--
ALTER TABLE `subhalls`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`subhall_id`) REFERENCES `subhalls` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `subhalls` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`hall_id`) REFERENCES `subhalls` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `subhalls`
--
ALTER TABLE `subhalls`
  ADD CONSTRAINT `subhalls_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
