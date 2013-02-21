-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2012 at 07:51 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bucket`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ad`
--


-- --------------------------------------------------------

--
-- Table structure for table `ad_view`
--

CREATE TABLE `ad_view` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ad_view`
--


-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `num_people` int(10) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bookings`
--


-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` VALUES(1, 'Melbourne', 1, '2012-09-05', '2012-09-05');
INSERT INTO `city` VALUES(2, 'Sydney', 0, '2012-09-06', '2012-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `complete`
--

CREATE TABLE `complete` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `rating` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `complete`
--


-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `event_date_time` datetime NOT NULL,
  `fb_event_id` bigint(25) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` VALUES(37, 29, 8, '2012-09-15 01:00:00', 0, '2012-09-12', '2012-09-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `desc` text NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` VALUES(1, 'How do I reset my password?', 'If you have forgotten your password, and you are a classic user and have not logged in using face book. Go to login and then select forgotten password.  \r\n', '2012-09-14', '2012-09-14', 1);
INSERT INTO `faqs` VALUES(2, 'How do I add a listing? ', 'To add a listing simply login and select the add a listing page, and add your details.  ', '2012-09-14', '2012-09-14', 0);
INSERT INTO `faqs` VALUES(3, 'How much does it cost? ', 'It’s free to use fatecrew.com, and free to put a listing on. There’s know risk and we’ll help your business become more visual to search engines. ', '2012-09-14', '2012-09-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feature_listing`
--

CREATE TABLE `feature_listing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `listing_id` int(10) NOT NULL,
  `active` int(1) NOT NULL,
  `clicks` int(10) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  `modified_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `feature_listing`
--


-- --------------------------------------------------------

--
-- Table structure for table `flag`
--

CREATE TABLE `flag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `flag`
--


-- --------------------------------------------------------

--
-- Table structure for table `friend_to_event`
--

CREATE TABLE `friend_to_event` (
  `user_id` int(10) NOT NULL,
  `facebook_id` bigint(25) NOT NULL,
  `listing_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_to_event`
--


-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bucket_list_name` varchar(100) NOT NULL,
  `search_engine_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `cost` float(4,4) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date_live` date NOT NULL,
  `status` int(1) NOT NULL,
  `city_id` int(10) NOT NULL,
  `active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` VALUES(1, 'trip of a life time to las vegas with the guys', 'melbourne to vages', 'lonely planet', 'This tour is likely to Sell-out! The Grand Canyon All American Helicopter Tour regularly sells out weeks in advance, so book ahead to avoid disappointment!\r\n\r\nYou''ll discover the natural beauty of the Grand Canyon as your air-conditioned helicopter flies to the West Rim, passing over Lake Las Vegas, Lake Mead and the Hoover Dam en route. Hoover Dam is a spectacular sight from the air, curved between the rock canyon walls. During the flight, you can listen to a recorded commentary about the Grand Canyon and its surrounds via audio headphones.\r\n\r\nYou''ll land for an unforgettable champagne picnic, 3,200 feet (960 meters) below the rim. While you share a bottle of champagne under an authentic Native American Ramada shelter, your pilot/guide will be happy to answer any questions you may have about the canyon or your helicopter flight.\r\n\r\nYour Grand Canyon helicopter scenic flight ends with a low-level pass over the west side of the famous Las Vegas Strip. On landing, your limousine is waiting to whisk you back to your hotel.\r\n\r\nThere is a maximum capacity of 6 people per helicopter plus your pilot.\r\n\r\nPlease note: The listed price does not include a US $45 per person processing fee, payable at the time of tour check-in.', 0.9999, 'info@lonelyplanet.com', 'jetsetz-cheap-las-vegas-flights_1.jpg', '3600 Las Vegas Blvd,South, Las Vegas, NV, United States', '2012-09-06', 1, 1, 1, '2012-09-06', '2012-09-06');
INSERT INTO `listing` VALUES(3, 'drive a sports car', 'Supercar Drive Day plus Passenger', 'adrenalin', 'Start your engines – this is the best gift for any car fan. If they want to experience the Top Gear lifestyle for themselves, this Supercar Drive Day is the perfect gift. This package includes a non-driving passenger, so you (or someone else equally as lucky!) can travel with the driver and share the experience!\r\nSupercar Drive Day\r\n\r\nThis amazing full-day Supercar Driving event that will see you driving a range of exotic sports cars including\r\nFerrari California \r\nLamborghini Gallardo \r\nLamborghini Gallardo LP550 \r\nAudi R8 \r\nLotus Elise Club Racer\r\nFerrari F430\r\nMaserati GranCabrio\r\nAston Martin Roadster\r\n\r\nExit the city then swoop along the scenic coastal route to Wollongong, taking in Stanwell Tops and the spectacular Sea Cliff Bridge along the way.\r\n\r\nOn arrival you''ll have a vehicle briefing, sign some forms and look at the route maps before being issued the keys to the first car of the day - whereupon you''ll follow your lead driver out of the garage and hit the road. You''ll swap cars throughout to make sure you all have a chance to drive all of the vehicles.\r\n\r\nYou''ll stop for a well-earned lunch at Wollongong before taking some time for the obligatory photoshoot of all the cars together. Then it''s back on the road for the return journey - you''ll be back to the garage by around 5pm.\r\n\r\nThis experience is for 2 people; 1 driver and 1 non-driving passenger.', 0.9999, 'info@text.com', 'porsche-911-sports-exhaust-system11.jpg', 'melbourne', '2012-09-14', 1, 1, 1, '2012-09-14', '2012-09-14');
INSERT INTO `listing` VALUES(4, 'skydiving adventure', 'skydiving melbourne', 'Melbourne Skydive Centre', 'If you''ve ever wanted to feel the rush of jumping out of a plane and reaching speeds of up to 220km/h then tandem sky diving over the Yarra Valley or The Great Ocean Road could be the answer! Feel the wind rush through the plane as you prepare to skydive and feel the adrenalin.\n\nWe begin the day with a briefing with your Tandem Skydive instructor. This includes what to expect and what you will see on the plane flight to height, in freefall, under canopy and upon landing. The briefing takes approximately 15 to 20 minutes. Our Tandem Masters have completed 1000''s jumps and are members of the Australian Parachute Federation. Once the briefing is over, it will be time to gear up in preparation for your skydiving experience. You will be given jumpsuit pants and your instructor will fit you into a harness. You will walk out to the plane and there you will practice your exit. Once all the ground preparation has been completed, it is time to get in the plane and get ready for take-off!\n\nAs we leave the airfield in the aircraft, you will be treated to a scenic tour of the Yarra Valley, the Dandenong ranges as well as the city of Melbourne and Port Phillip Bay. If you are jumping from our new location over The Great Ocean Road then the views will include the beautiful coastal scenery of The Great Ocean Road, Bells Beach and the Melbourne CBD.\n\nOnce we reach height, it will be time to prepare you for the jump. The door opens and as you leave the plane, you and your tandem master will accelerate through the air reaching terminal velocity 220km/h. Freefall feels like riding a cushion of air similar to riding a big wave. In freefall, your senses will be able to take in stunning views as far as the eye can see.\n\nThen finally it''s time to pull your parachute open!  The parachute ride is very different from the loud rushing of air that you hear all around you in freefall, under canopy you sail around the sky, gliding.\n\nThe landing is easy, just lift your legs and let your instructor do the rest. The parachute will glide and you will eventually put your feet down to land.\n\nDuration - Skydiving is weather dependant - we ask that you allow 6 hours for the whole experience, on average the experience takes 2 to 3 hours including briefing, scenic flight, freefall, parachute ride and de-brief.', 0.9999, 'info@text.com', 'skydiving_2.jpg', 'melbourne', '2012-09-14', 1, 1, 1, '2012-09-14', '2012-09-14');
INSERT INTO `listing` VALUES(5, 'trip of a life time to Paris', 'Paris Holidays', 'lonely planet', 'hort on time? Got lots to check off your ''things to see'' list? The Best of Europe is the tour for you. Get straight into holiday mode with sightseeing in Paris then hop on a train to Amsterdam, before driving to Berlin & Prague, finishing in style with a flight to Rome. As the name says, we''ve taken all the best parts of Europe, the most convenient forms of travel & combined them all into one action packed trip.Get your cameras, taste buds & walking shoes ready...so much to see, eat & do, in the perfect amount of time to achieve it!', 0.9999, 'info@text.com', '2011012529_paris_night1.jpg', 'paris', '2012-09-14', 1, 1, 1, '2012-09-14', '2012-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `listing_view`
--

CREATE TABLE `listing_view` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing_view`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city_id` int(1) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `active` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `facebook_id` bigint(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(21, 'chrisevansau', 'Chris', 'Evans', 'hello@chrisevans.com.au', 'facebook user', 0, 'm', '0000-00-00', 1, '2012-09-10 17:12:48', '2012-09-10 17:12:48', 702912031);
INSERT INTO `user` VALUES(29, 'rusty.kuntz.714', 'Rusty', 'Kuntz', 'chris.evans@jwt.com', 'facebook user', 0, 'm', '0000-00-00', 1, '2012-09-12 11:23:19', '2012-09-12 11:23:19', 100004439882981);

-- --------------------------------------------------------

--
-- Table structure for table `user_to_list`
--

CREATE TABLE `user_to_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `facebook_id` bigint(25) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_to_list`
--

INSERT INTO `user_to_list` VALUES(1, 21, 702912031, 1, '2012-09-11');
INSERT INTO `user_to_list` VALUES(12, 29, 100004439882981, 3, '2012-09-14');
INSERT INTO `user_to_list` VALUES(13, 29, 100004439882981, 1, '2012-09-14');
