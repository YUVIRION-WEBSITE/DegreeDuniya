-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 01:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuvironuniversity`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` enum('slider','page','section') NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `slug`, `type`, `content`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Our University', 'welcome-university', 'slider', 'Discover the vibrant academic community at our university, offering world-class education and opportunities for growth.', 'https://plus.unsplash.com/premium_photo-1677567996070-68fa4181775a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1172', 'published', '2025-10-06 11:00:00', '2025-10-13 07:21:20'),
(2, 'About Our Institution', 'about-institution', 'slider', 'Learn about our history, mission, and commitment to fostering innovation and excellence in education.', 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200', 'published', '2025-10-06 11:00:00', '2025-10-06 11:00:00'),
(3, 'Graduation Highlights', 'graduation-highlights', 'slider', 'Celebrate the achievements of our graduates with memorable moments from our annual convocation ceremonies.', 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200', 'published', '2025-10-06 11:00:00', '2025-10-06 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `facilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`facilities`)),
  `logo_path` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `university_id`, `name`, `slug`, `description`, `tagline`, `facilities`, `logo_path`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 'College of Engineering', 'college-engineering-ntu', 'Leading engineering programs with state-of-the-art facilities.', 'Engineering Excellence', '[\"Library\", \"Laboratories\", \"Hostel\", \"Sports Complex\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(2, 1, 'College of Sciences', 'college-sciences-ntu', 'Advancing scientific research and education.', 'Discovering Tomorrow', '[\"Research Labs\", \"Library\", \"Auditorium\"]', 'https://dolphinlifesciences.com/wp-content/uploads/2024/07/Top-BSc-MLT-Colleges-in-Punjab-770x329.jpg', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(3, 1, 'College of Management', 'college-management-ntu', 'Preparing future business leaders.', 'Leadership Redefined', '[\"Conference Halls\", \"Library\", \"Wi-Fi Campus\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(4, 1, 'College of Arts', 'college-arts-ntu', 'Fostering creativity and cultural studies.', 'Inspiring Creativity', '[\"Art Studios\", \"Library\", \"Theater\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(5, 1, 'College of Technology', 'college-technology-ntu', 'Innovating through technology education.', 'Tech for Future', '[\"Labs\", \"Hostel\", \"Innovation Hub\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(6, 2, 'College of Physics', 'college-physics-gsu', 'Exploring the universe through physics.', 'Unraveling Mysteries', '[\"Physics Labs\", \"Library\", \"Observatory\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(7, 2, 'College of Chemistry', 'college-chemistry-gsu', 'Advancing chemical sciences.', 'Chemistry for Change', '[\"Chem Labs\", \"Library\", \"Research Center\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(8, 2, 'College of Biology', 'college-biology-gsu', 'Studying life and its processes.', 'Life in Focus', '[\"Bio Labs\", \"Library\", \"Greenhouse\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(9, 2, 'College of Environmental Science', 'college-env-science-gsu', 'Promoting sustainability and environmental studies.', 'Green Tomorrow', '[\"Field Labs\", \"Library\", \"Eco Center\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(10, 2, 'College of Mathematics', 'college-mathematics-gsu', 'Mastering the language of numbers.', 'Numbers Matter', '[\"Math Labs\", \"Library\", \"Computing Center\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(11, 3, 'College of Education', 'college-education-peu', 'Training future educators.', 'Shaping Educators', '[\"Teaching Labs\", \"Library\", \"Workshops\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(12, 3, 'College of Humanities', 'college-humanities-peu', 'Exploring human culture and history.', 'Understanding Humanity', '[\"Library\", \"Seminar Halls\", \"Cultural Center\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(13, 3, 'College of Social Sciences', 'college-social-sciences-peu', 'Studying societal dynamics.', 'Society in Focus', '[\"Research Labs\", \"Library\", \"Debate Halls\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(14, 3, 'College of Law', 'college-law-peu', 'Preparing future legal professionals.', 'Justice for All', '[\"Moot Court\", \"Library\", \"Legal Aid Clinic\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(15, 3, 'College of Economics', 'college-economics-peu', 'Analyzing economic trends and policies.', 'Economic Insight', '[\"Data Labs\", \"Library\", \"Seminar Rooms\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(16, NULL, 'College of Innovation', 'college-innovation-iu', 'Fostering entrepreneurial skills.', 'Innovate Today', '[\"Incubation Center\", \"Library\", \"Workshops\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(17, NULL, 'College of Technology', 'college-technology-iu', 'Advancing tech education.', 'Tech Pioneers', '[\"Tech Labs\", \"Library\", \"Hackathon Space\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(18, NULL, 'College of Design', 'college-design-iu', 'Creating innovative designs.', 'Design the Future', '[\"Design Studios\", \"Library\", \"Exhibition Halls\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(19, NULL, 'College of Business', 'college-business-iu', 'Building business leaders.', 'Lead with Vision', '[\"Conference Rooms\", \"Library\", \"Networking Hub\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(20, NULL, 'College of AI Studies', 'college-ai-studies-iu', 'Leading in AI and machine learning.', 'AI for Tomorrow', '[\"AI Labs\", \"Library\", \"Computing Center\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(21, NULL, 'College of Sustainability', 'college-sustainability-fvu', 'Promoting sustainable practices.', 'Green Future', '[\"Eco Labs\", \"Library\", \"Sustainability Center\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(22, NULL, 'College of Health Sciences', 'college-health-sciences-fvu', 'Advancing healthcare education.', 'Healthy Tomorrow', '[\"Medical Labs\", \"Library\", \"Clinic\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(23, NULL, 'College of Engineering', 'college-engineering-fvu', 'Engineering for a better future.', 'Build the Future', '[\"Engineering Labs\", \"Library\", \"Workshops\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(24, NULL, 'College of Arts', 'college-arts-fvu', 'Fostering artistic expression.', 'Artistic Vision', '[\"Art Studios\", \"Library\", \"Gallery\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(25, NULL, 'College of Education', 'college-education-fvu', 'Training educators for tomorrow.', 'Educate the Future', '[\"Teaching Labs\", \"Library\", \"Seminar Rooms\"]', 'https://img.freepik.com/free-photo/high-angle-girl-taking-selfie-library_23-2148448045.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `eligibility` text DEFAULT NULL,
  `scope` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `university_id`, `college_id`, `name`, `slug`, `description`, `duration`, `fees`, `eligibility`, `scope`, `image_path`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'B.Tech in Computer Science', 'btech-computer-science-ntu', 'Undergraduate program in computer science.', '4 years', 80000.00, '12th with PCM, minimum 60%.', 'Software development, AI, data science.', 'https://ebz-static.s3.ap-south-1.amazonaws.com/easebuzz-static/online-courses.png', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(2, 1, 1, 'B.Tech in Mechanical Engineering', 'btech-mechanical-eng-ntu', 'Undergraduate program in mechanical engineering.', '4 years', 75000.00, '12th with PCM, minimum 60%.', 'Automotive, manufacturing, robotics.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(3, 1, 1, 'B.Tech in Civil Engineering', 'btech-civil-eng-ntu', 'Undergraduate program in civil engineering.', '4 years', 70000.00, '12th with PCM, minimum 60%.', 'Construction, infrastructure, urban planning.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(4, 1, 1, 'B.Tech in Electrical Engineering', 'btech-electrical-eng-ntu', 'Undergraduate program in electrical engineering.', '4 years', 72000.00, '12th with PCM, minimum 60%.', 'Power systems, electronics, renewable energy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(5, 1, 1, 'M.Tech in AI', 'mtech-ai-ntu', 'Postgraduate program in artificial intelligence.', '2 years', 90000.00, 'B.Tech with minimum 65%.', 'AI research, machine learning, data science.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(6, 1, 2, 'B.Sc in Physics', 'bsc-physics-ntu', 'Undergraduate program in physics.', '3 years', 50000.00, '12th with PCM, minimum 55%.', 'Research, academia, technology.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(7, 1, 2, 'B.Sc in Chemistry', 'bsc-chemistry-ntu', 'Undergraduate program in chemistry.', '3 years', 48000.00, '12th with PCM, minimum 55%.', 'Chemical industries, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(8, 1, 2, 'B.Sc in Biology', 'bsc-biology-ntu', 'Undergraduate program in biology.', '3 years', 49000.00, '12th with PCB, minimum 55%.', 'Biotech, healthcare, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(9, 1, 2, 'M.Sc in Physics', 'msc-physics-ntu', 'Postgraduate program in physics.', '2 years', 60000.00, 'B.Sc with minimum 60%.', 'Advanced research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(10, 1, 2, 'M.Sc in Chemistry', 'msc-chemistry-ntu', 'Postgraduate program in chemistry.', '2 years', 58000.00, 'B.Sc with minimum 60%.', 'Chemical research, industry.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(11, 1, 3, 'BBA', 'bba-ntu', 'Undergraduate program in business administration.', '3 years', 65000.00, '12th with minimum 50%.', 'Management, entrepreneurship.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(12, 1, 3, 'MBA in Finance', 'mba-finance-ntu', 'Postgraduate program in finance.', '2 years', 95000.00, 'Bachelor’s with minimum 60%.', 'Finance, banking, consulting.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(13, 1, 3, 'MBA in Marketing', 'mba-marketing-ntu', 'Postgraduate program in marketing.', '2 years', 92000.00, 'Bachelor’s with minimum 60%.', 'Marketing, advertising, sales.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(14, 1, 3, 'MBA in HR', 'mba-hr-ntu', 'Postgraduate program in human resources.', '2 years', 90000.00, 'Bachelor’s with minimum 60%.', 'HR management, organizational development.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(15, 1, 3, 'B.Com', 'bcom-ntu', 'Undergraduate program in commerce.', '3 years', 55000.00, '12th with minimum 50%.', 'Accounting, finance, business.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(16, 1, 4, 'BA in Literature', 'ba-literature-ntu', 'Undergraduate program in literature.', '3 years', 45000.00, '12th with minimum 50%.', 'Writing, teaching, publishing.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(17, 1, 4, 'BA in History', 'ba-history-ntu', 'Undergraduate program in history.', '3 years', 43000.00, '12th with minimum 50%.', 'Research, academia, heritage.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(18, 1, 4, 'BA in Sociology', 'ba-sociology-ntu', 'Undergraduate program in sociology.', '3 years', 44000.00, '12th with minimum 50%.', 'Social work, research, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(19, 1, 4, 'MA in Literature', 'ma-literature-ntu', 'Postgraduate program in literature.', '2 years', 55000.00, 'Bachelor’s with minimum 55%.', 'Advanced writing, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(20, 1, 4, 'MA in History', 'ma-history-ntu', 'Postgraduate program in history.', '2 years', 53000.00, 'Bachelor’s with minimum 55%.', 'Historical research, curatorship.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(21, 1, 5, 'B.Tech in AI', 'btech-ai-ntu', 'Undergraduate program in artificial intelligence.', '4 years', 82000.00, '12th with PCM, minimum 60%.', 'AI, machine learning, data science.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(22, 1, 5, 'B.Tech in Cybersecurity', 'btech-cybersecurity-ntu', 'Undergraduate program in cybersecurity.', '4 years', 78000.00, '12th with PCM, minimum 60%.', 'Cybersecurity, IT security.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(23, 1, 5, 'B.Tech in Data Science', 'btech-data-science-ntu', 'Undergraduate program in data science.', '4 years', 79000.00, '12th with PCM, minimum 60%.', 'Data analytics, big data.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(24, 1, 5, 'M.Tech in Cybersecurity', 'mtech-cybersecurity-ntu', 'Postgraduate program in cybersecurity.', '2 years', 88000.00, 'B.Tech with minimum 65%.', 'Advanced cybersecurity, consulting.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(25, 1, 5, 'M.Tech in Data Science', 'mtech-data-science-ntu', 'Postgraduate program in data science.', '2 years', 90000.00, 'B.Tech with minimum 65%.', 'Data science, analytics, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(26, 2, 6, 'B.Sc in Astrophysics', 'bsc-astrophysics-gsu', 'Undergraduate program in astrophysics.', '3 years', 52000.00, '12th with PCM, minimum 55%.', 'Astronomy, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(27, 2, 6, 'B.Sc in Quantum Physics', 'bsc-quantum-physics-gsu', 'Undergraduate program in quantum physics.', '3 years', 53000.00, '12th with PCM, minimum 55%.', 'Quantum research, technology.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(28, 2, 6, 'M.Sc in Astrophysics', 'msc-astrophysics-gsu', 'Postgraduate program in astrophysics.', '2 years', 62000.00, 'B.Sc with minimum 60%.', 'Astronomical research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(29, 2, 6, 'M.Sc in Quantum Physics', 'msc-quantum-physics-gsu', 'Postgraduate program in quantum physics.', '2 years', 61000.00, 'B.Sc with minimum 60%.', 'Quantum computing, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(30, 2, 6, 'PhD in Physics', 'phd-physics-gsu', 'Doctoral program in physics.', '3-5 years', 70000.00, 'M.Sc with minimum 65%.', 'Advanced research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(31, 2, 7, 'B.Sc in Organic Chemistry', 'bsc-organic-chemistry-gsu', 'Undergraduate program in organic chemistry.', '3 years', 49000.00, '12th with PCM, minimum 55%.', 'Pharma, chemical industries.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(32, 2, 7, 'B.Sc in Inorganic Chemistry', 'bsc-inorganic-chemistry-gsu', 'Undergraduate program in inorganic chemistry.', '3 years', 48000.00, '12th with PCM, minimum 55%.', 'Materials science, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(33, 2, 7, 'M.Sc in Organic Chemistry', 'msc-organic-chemistry-gsu', 'Postgraduate program in organic chemistry.', '2 years', 59000.00, 'B.Sc with minimum 60%.', 'Drug development, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(34, 2, 7, 'M.Sc in Inorganic Chemistry', 'msc-inorganic-chemistry-gsu', 'Postgraduate program in inorganic chemistry.', '2 years', 58000.00, 'B.Sc with minimum 60%.', 'Materials, catalysis research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(35, 2, 7, 'PhD in Chemistry', 'phd-chemistry-gsu', 'Doctoral program in chemistry.', '3-5 years', 68000.00, 'M.Sc with minimum 65%.', 'Advanced chemical research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(36, 2, 8, 'B.Sc in Microbiology', 'bsc-microbiology-gsu', 'Undergraduate program in microbiology.', '3 years', 50000.00, '12th with PCB, minimum 55%.', 'Biotech, healthcare.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(37, 2, 8, 'B.Sc in Biotechnology', 'bsc-biotechnology-gsu', 'Undergraduate program in biotechnology.', '3 years', 51000.00, '12th with PCB, minimum 55%.', 'Biotech industries, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(38, 2, 8, 'M.Sc in Microbiology', 'msc-microbiology-gsu', 'Postgraduate program in microbiology.', '2 years', 60000.00, 'B.Sc with minimum 60%.', 'Advanced biotech, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(39, 2, 8, 'M.Sc in Biotechnology', 'msc-biotechnology-gsu', 'Postgraduate program in biotechnology.', '2 years', 61000.00, 'B.Sc with minimum 60%.', 'Genetic engineering, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(40, 2, 8, 'PhD in Biology', 'phd-biology-gsu', 'Doctoral program in biology.', '3-5 years', 70000.00, 'M.Sc with minimum 65%.', 'Biological research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(41, 2, 9, 'B.Sc in Environmental Science', 'bsc-env-science-gsu', 'Undergraduate program in environmental science.', '3 years', 48000.00, '12th with PCB/PCM, minimum 55%.', 'Environmental management, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(42, 2, 9, 'B.Sc in Ecology', 'bsc-ecology-gsu', 'Undergraduate program in ecology.', '3 years', 49000.00, '12th with PCB, minimum 55%.', 'Conservation, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(43, 2, 9, 'M.Sc in Environmental Science', 'msc-env-science-gsu', 'Postgraduate program in environmental science.', '2 years', 58000.00, 'B.Sc with minimum 60%.', 'Sustainability, environmental consulting.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(44, 2, 9, 'M.Sc in Ecology', 'msc-ecology-gsu', 'Postgraduate program in ecology.', '2 years', 59000.00, 'B.Sc with minimum 60%.', 'Ecological research, conservation.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(45, 2, 9, 'PhD in Environmental Science', 'phd-env-science-gsu', 'Doctoral program in environmental science.', '3-5 years', 68000.00, 'M.Sc with minimum 65%.', 'Environmental research, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(46, 2, 10, 'B.Sc in Mathematics', 'bsc-mathematics-gsu', 'Undergraduate program in mathematics.', '3 years', 47000.00, '12th with PCM, minimum 55%.', 'Academia, data analysis.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(47, 2, 10, 'B.Sc in Statistics', 'bsc-statistics-gsu', 'Undergraduate program in statistics.', '3 years', 48000.00, '12th with PCM, minimum 55%.', 'Data science, analytics.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(48, 2, 10, 'M.Sc in Mathematics', 'msc-mathematics-gsu', 'Postgraduate program in mathematics.', '2 years', 57000.00, 'B.Sc with minimum 60%.', 'Research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(49, 2, 10, 'M.Sc in Statistics', 'msc-statistics-gsu', 'Postgraduate program in statistics.', '2 years', 58000.00, 'B.Sc with minimum 60%.', 'Data analytics, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(50, 2, 10, 'PhD in Mathematics', 'phd-mathematics-gsu', 'Doctoral program in mathematics.', '3-5 years', 67000.00, 'M.Sc with minimum 65%.', 'Advanced mathematical research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(51, 3, 11, 'B.Ed', 'bed-peu', 'Undergraduate program in education.', '2 years', 50000.00, 'Bachelor’s with minimum 50%.', 'Teaching, educational administration.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(52, 3, 11, 'M.Ed', 'med-peu', 'Postgraduate program in education.', '2 years', 60000.00, 'B.Ed with minimum 55%.', 'Educational leadership, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(53, 3, 11, 'B.A. in Education', 'ba-education-peu', 'Undergraduate program in education studies.', '3 years', 45000.00, '12th with minimum 50%.', 'Teaching, curriculum design.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(54, 3, 11, 'M.A. in Education', 'ma-education-peu', 'Postgraduate program in education studies.', '2 years', 55000.00, 'Bachelor’s with minimum 55%.', 'Educational policy, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(55, 3, 11, 'PhD in Education', 'phd-education-peu', 'Doctoral program in education.', '3-5 years', 65000.00, 'M.Ed with minimum 65%.', 'Educational research, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(56, 3, 12, 'BA in Philosophy', 'ba-philosophy-peu', 'Undergraduate program in philosophy.', '3 years', 44000.00, '12th with minimum 50%.', 'Academia, critical thinking.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(57, 3, 12, 'BA in History', 'ba-history-peu', 'Undergraduate program in history.', '3 years', 43000.00, '12th with minimum 50%.', 'Research, heritage management.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(58, 3, 12, 'MA in Philosophy', 'ma-philosophy-peu', 'Postgraduate program in philosophy.', '2 years', 54000.00, 'Bachelor’s with minimum 55%.', 'Philosophical research, teaching.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(59, 3, 12, 'MA in History', 'ma-history-peu', 'Postgraduate program in history.', '2 years', 53000.00, 'Bachelor’s with minimum 55%.', 'Historical research, curatorship.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(60, 3, 12, 'PhD in Humanities', 'phd-humanities-peu', 'Doctoral program in humanities.', '3-5 years', 66000.00, 'Master’s with minimum 65%.', 'Research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(61, 3, 13, 'BA in Sociology', 'ba-sociology-peu', 'Undergraduate program in sociology.', '3 years', 45000.00, '12th with minimum 50%.', 'Social work, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(62, 3, 13, 'BA in Political Science', 'ba-political-science-peu', 'Undergraduate program in political science.', '3 years', 44000.00, '12th with minimum 50%.', 'Policy analysis, governance.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(63, 3, 13, 'MA in Sociology', 'ma-sociology-peu', 'Postgraduate program in sociology.', '2 years', 55000.00, 'Bachelor’s with minimum 55%.', 'Social research, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(64, 3, 13, 'MA in Political Science', 'ma-political-science-peu', 'Postgraduate program in political science.', '2 years', 54000.00, 'Bachelor’s with minimum 55%.', 'Political analysis, diplomacy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(65, 3, 13, 'PhD in Social Sciences', 'phd-social-sciences-peu', 'Doctoral program in social sciences.', '3-5 years', 67000.00, 'Master’s with minimum 65%.', 'Social research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(66, 3, 14, 'LLB', 'llb-peu', 'Undergraduate program in law.', '3 years', 70000.00, 'Bachelor’s with minimum 50%.', 'Legal practice, judiciary.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(67, 3, 14, 'BA LLB', 'ba-llb-peu', 'Integrated undergraduate program in law.', '5 years', 75000.00, '12th with minimum 50%.', 'Legal practice, corporate law.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(68, 3, 14, 'LLM', 'llm-peu', 'Postgraduate program in law.', '2 years', 80000.00, 'LLB with minimum 55%.', 'Advanced legal practice, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(69, 3, 14, 'M.A. in Criminology', 'ma-criminology-peu', 'Postgraduate program in criminology.', '2 years', 60000.00, 'Bachelor’s with minimum 55%.', 'Criminal justice, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(70, 3, 14, 'PhD in Law', 'phd-law-peu', 'Doctoral program in law.', '3-5 years', 72000.00, 'LLM with minimum 65%.', 'Legal research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(71, 3, 15, 'B.A. in Economics', 'ba-economics-peu', 'Undergraduate program in economics.', '3 years', 46000.00, '12th with minimum 50%.', 'Economic analysis, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(72, 3, 15, 'B.Sc in Economics', 'bsc-economics-peu', 'Undergraduate program in economics.', '3 years', 47000.00, '12th with PCM, minimum 50%.', 'Data analysis, finance.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(73, 3, 15, 'M.A. in Economics', 'ma-economics-peu', 'Postgraduate program in economics.', '2 years', 56000.00, 'Bachelor’s with minimum 55%.', 'Economic research, consulting.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(74, 3, 15, 'M.Sc in Economics', 'msc-economics-peu', 'Postgraduate program in economics.', '2 years', 57000.00, 'B.Sc with minimum 55%.', 'Quantitative analysis, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(75, 3, 15, 'PhD in Economics', 'phd-economics-peu', 'Doctoral program in economics.', '3-5 years', 68000.00, 'Master’s with minimum 65%.', 'Economic research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(76, NULL, 16, 'BBA in Entrepreneurship', 'bba-entrepreneurship-iu', 'Undergraduate program in entrepreneurship.', '3 years', 67000.00, '12th with minimum 50%.', 'Startups, business development.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(77, NULL, 16, 'B.Tech in Innovation', 'btech-innovation-iu', 'Undergraduate program in innovation technology.', '4 years', 80000.00, '12th with PCM, minimum 60%.', 'Innovation management, tech startups.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(78, NULL, 16, 'MBA in Innovation', 'mba-innovation-iu', 'Postgraduate program in innovation management.', '2 years', 95000.00, 'Bachelor’s with minimum 60%.', 'Innovation consulting, leadership.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(79, NULL, 16, 'M.Tech in Entrepreneurship', 'mtech-entrepreneurship-iu', 'Postgraduate program in entrepreneurial technology.', '2 years', 90000.00, 'B.Tech with minimum 65%.', 'Tech startups, product development.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(80, NULL, 16, 'PhD in Innovation', 'phd-innovation-iu', 'Doctoral program in innovation studies.', '3-5 years', 72000.00, 'Master’s with minimum 65%.', 'Innovation research, consulting.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(81, NULL, 17, 'B.Tech in Robotics', 'btech-robotics-iu', 'Undergraduate program in robotics.', '4 years', 82000.00, '12th with PCM, minimum 60%.', 'Robotics, automation.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(82, NULL, 17, 'B.Tech in IoT', 'btech-iot-iu', 'Undergraduate program in Internet of Things.', '4 years', 81000.00, '12th with PCM, minimum 60%.', 'IoT development, smart systems.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(83, NULL, 17, 'M.Tech in Robotics', 'mtech-robotics-iu', 'Postgraduate program in robotics.', '2 years', 92000.00, 'B.Tech with minimum 65%.', 'Advanced robotics, automation.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(84, NULL, 17, 'M.Tech in IoT', 'mtech-iot-iu', 'Postgraduate program in Internet of Things.', '2 years', 91000.00, 'B.Tech with minimum 65%.', 'IoT solutions, smart tech.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(85, NULL, 17, 'PhD in Technology', 'phd-technology-iu', 'Doctoral program in technology.', '3-5 years', 73000.00, 'M.Tech with minimum 65%.', 'Tech research, innovation.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(86, NULL, 18, 'B.Des in Graphic Design', 'bdes-graphic-design-iu', 'Undergraduate program in graphic design.', '4 years', 65000.00, '12th with minimum 50%.', 'Graphic design, advertising.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(87, NULL, 18, 'B.Des in Industrial Design', 'bdes-industrial-design-iu', 'Undergraduate program in industrial design.', '4 years', 66000.00, '12th with minimum 50%.', 'Product design, manufacturing.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(88, NULL, 18, 'M.Des in Graphic Design', 'mdes-graphic-design-iu', 'Postgraduate program in graphic design.', '2 years', 75000.00, 'Bachelor’s with minimum 55%.', 'Advanced design, branding.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(89, NULL, 18, 'M.Des in Industrial Design', 'mdes-industrial-design-iu', 'Postgraduate program in industrial design.', '2 years', 74000.00, 'Bachelor’s with minimum 55%.', 'Product innovation, design.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(90, NULL, 18, 'PhD in Design', 'phd-design-iu', 'Doctoral program in design.', '3-5 years', 70000.00, 'Master’s with minimum 65%.', 'Design research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(91, NULL, 19, 'BBA in Marketing', 'bba-marketing-iu', 'Undergraduate program in marketing.', '3 years', 66000.00, '12th with minimum 50%.', 'Marketing, sales, branding.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(92, NULL, 19, 'BBA in Finance', 'bba-finance-iu', 'Undergraduate program in finance.', '3 years', 65000.00, '12th with minimum 50%.', 'Finance, banking.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(93, NULL, 19, 'MBA in Marketing', 'mba-marketing-iu', 'Postgraduate program in marketing.', '2 years', 94000.00, 'Bachelor’s with minimum 60%.', 'Marketing strategy, advertising.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(94, NULL, 19, 'MBA in Finance', 'mba-finance-iu', 'Postgraduate program in finance.', '2 years', 93000.00, 'Bachelor’s with minimum 60%.', 'Financial management, consulting.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(95, NULL, 19, 'PhD in Business', 'phd-business-iu', 'Doctoral program in business.', '3-5 years', 71000.00, 'MBA with minimum 65%.', 'Business research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(96, NULL, 20, 'B.Tech in AI', 'btech-ai-iu', 'Undergraduate program in artificial intelligence.', '4 years', 83000.00, '12th with PCM, minimum 60%.', 'AI development, machine learning.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(97, NULL, 20, 'B.Tech in Machine Learning', 'btech-machine-learning-iu', 'Undergraduate program in machine learning.', '4 years', 82000.00, '12th with PCM, minimum 60%.', 'Machine learning, data science.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(98, NULL, 20, 'M.Tech in AI', 'mtech-ai-iu', 'Postgraduate program in artificial intelligence.', '2 years', 92000.00, 'B.Tech with minimum 65%.', 'AI research, advanced tech.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(99, NULL, 20, 'M.Tech in Machine Learning', 'mtech-machine-learning-iu', 'Postgraduate program in machine learning.', '2 years', 91000.00, 'B.Tech with minimum 65%.', 'Machine learning research, analytics.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(100, NULL, 20, 'PhD in AI', 'phd-ai-iu', 'Doctoral program in artificial intelligence.', '3-5 years', 73000.00, 'M.Tech with minimum 65%.', 'AI research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(101, NULL, 21, 'B.Sc in Sustainability Studies', 'bsc-sustainability-studies-fvu', 'Undergraduate program in sustainability.', '3 years', 48000.00, '12th with PCB/PCM, minimum 55%.', 'Sustainability consulting, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(102, NULL, 21, 'B.Sc in Renewable Energy', 'bsc-renewable-energy-fvu', 'Undergraduate program in renewable energy.', '3 years', 49000.00, '12th with PCM, minimum 55%.', 'Renewable energy, green tech.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(103, NULL, 21, 'M.Sc in Sustainability Studies', 'msc-sustainability-studies-fvu', 'Postgraduate program in sustainability.', '2 years', 58000.00, 'B.Sc with minimum 60%.', 'Sustainable development, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(104, NULL, 21, 'M.Sc in Renewable Energy', 'msc-renewable-energy-fvu', 'Postgraduate program in renewable energy.', '2 years', 59000.00, 'B.Sc with minimum 60%.', 'Energy policy, green tech.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(105, NULL, 21, 'PhD in Sustainability', 'phd-sustainability-fvu', 'Doctoral program in sustainability.', '3-5 years', 68000.00, 'M.Sc with minimum 65%.', 'Sustainability research, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(106, NULL, 22, 'B.Sc in Nursing', 'bsc-nursing-fvu', 'Undergraduate program in nursing.', '4 years', 60000.00, '12th with PCB, minimum 55%.', 'Nursing, healthcare.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(107, NULL, 22, 'B.Sc in Public Health', 'bsc-public-health-fvu', 'Undergraduate program in public health.', '3 years', 55000.00, '12th with PCB, minimum 55%.', 'Public health, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(108, NULL, 22, 'M.Sc in Nursing', 'msc-nursing-fvu', 'Postgraduate program in nursing.', '2 years', 65000.00, 'B.Sc Nursing with minimum 60%.', 'Advanced nursing, healthcare management.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(109, NULL, 22, 'M.Sc in Public Health', 'msc-public-health-fvu', 'Postgraduate program in public health.', '2 years', 62000.00, 'B.Sc with minimum 60%.', 'Health policy, epidemiology.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(110, NULL, 22, 'PhD in Health Sciences', 'phd-health-sciences-fvu', 'Doctoral program in health sciences.', '3-5 years', 70000.00, 'M.Sc with minimum 65%.', 'Health research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(111, NULL, 23, 'B.Tech in Civil Engineering', 'btech-civil-engineering-fvu', 'Undergraduate program in civil engineering.', '4 years', 78000.00, '12th with PCM, minimum 60%.', 'Construction, infrastructure.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(112, NULL, 23, 'B.Tech in Mechanical Engineering', 'btech-mechanical-engineering-fvu', 'Undergraduate program in mechanical engineering.', '4 years', 79000.00, '12th with PCM, minimum 60%.', 'Manufacturing, robotics.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(113, NULL, 23, 'M.Tech in Civil Engineering', 'mtech-civil-engineering-fvu', 'Postgraduate program in civil engineering.', '2 years', 88000.00, 'B.Tech with minimum 65%.', 'Advanced construction, urban planning.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(114, NULL, 23, 'M.Tech in Mechanical Engineering', 'mtech-mechanical-engineering-fvu', 'Postgraduate program in mechanical engineering.', '2 years', 89000.00, 'B.Tech with minimum 65%.', 'Advanced robotics, manufacturing.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(115, NULL, 23, 'PhD in Engineering', 'phd-engineering-fvu', 'Doctoral program in engineering.', '3-5 years', 72000.00, 'M.Tech with minimum 65%.', 'Engineering research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(116, NULL, 24, 'BA in Fine Arts', 'ba-fine-arts-fvu', 'Undergraduate program in fine arts.', '3 years', 45000.00, '12th with minimum 50%.', 'Art, illustration, curation.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(117, NULL, 24, 'BA in Performing Arts', 'ba-performing-arts-fvu', 'Undergraduate program in performing arts.', '3 years', 46000.00, '12th with minimum 50%.', 'Theater, performance.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(118, NULL, 24, 'MFA in Fine Arts', 'mfa-fine-arts-fvu', 'Postgraduate program in fine arts.', '2 years', 55000.00, 'Bachelor’s with minimum 55%.', 'Advanced art, curation.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(119, NULL, 24, 'MFA in Performing Arts', 'mfa-performing-arts-fvu', 'Postgraduate program in performing arts.', '2 years', 56000.00, 'Bachelor’s with minimum 55%.', 'Theater production, performance.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(120, NULL, 24, 'PhD in Arts', 'phd-arts-fvu', 'Doctoral program in arts.', '3-5 years', 67000.00, 'Master’s with minimum 65%.', 'Art research, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(121, NULL, 25, 'B.Ed', 'bed-fvu', 'Undergraduate program in education.', '2 years', 50000.00, 'Bachelor’s with minimum 50%.', 'Teaching, educational administration.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(122, NULL, 25, 'M.Ed', 'med-fvu', 'Postgraduate program in education.', '2 years', 60000.00, 'B.Ed with minimum 55%.', 'Educational leadership, research.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(123, NULL, 25, 'B.A. in Education', 'ba-education-fvu', 'Undergraduate program in education studies.', '3 years', 45000.00, '12th with minimum 50%.', 'Teaching, curriculum design.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(124, NULL, 25, 'M.A. in Education', 'ma-education-fvu', 'Postgraduate program in education studies.', '2 years', 55000.00, 'Bachelor’s with minimum 55%.', 'Educational policy, academia.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(125, NULL, 25, 'PhD in Education', 'phd-education-fvu', 'Doctoral program in education.', '3-5 years', 65000.00, 'M.Ed with minimum 65%.', 'Educational research, policy.', 'https://img.freepik.com/free-photo/young-student-sitting-university-library-break-from-studying_496169-1232.jpg?semt=ais_hybrid&w=740&q=80', NULL, '2025-10-05 18:30:00', '2025-10-05 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','contacted','closed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `message`, `university_id`, `college_id`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rahul kumar singh', 'rk9600460@gmail.com', '9334274325', 'Hello', 1, NULL, NULL, 'pending', '2025-10-08 06:53:55', '2025-10-08 06:53:55'),
(3, 'rahul', 'rk3@gmail.com', '54545454544', 'dfgdgf', 1, NULL, NULL, 'pending', '2025-10-12 10:52:23', '2025-10-12 10:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_05_075928_create_testimonial_table', 1),
(5, '2025_10_05_125009_add)slugfield', 1),
(6, '2025_10_05_223415__update_enquiries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3H4VD0sqNMohU42v2LJADIy2p69chNm6dRsMGeCO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3RBdDB6cWRycUo0bGd4cFNQOHBVMUYyRmgzMHBueVJidDkxbVJWaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wdWJsaWMvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1763388058),
('I75c9iyrCOQWjFnehaeKK9LPW9U61biUGfwgdbGu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidlAzeDVmUGZpWnJMUnVtZllwS2p6U05NNGpIRURaQlphdmRFcUdabiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb2xsZWdlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1763554099),
('j3NBn62kTmXVo5WZbpibOcZE4bIAzRm4RYRWaJek', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1ZiblpmWFc1VTl6RE5KYU9EcGExMTY0bGdtbjNVdFR6NnN2ZjV4WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wdWJsaWMvdW5pdmVyc2l0aWVzL2dsb2JhbC1zY2llbmNlLXVuaXZlcnNpdHkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763464578),
('l0BBEEZTFPAJhYKJxsWp9bREsLqomr8pbRIWfMwW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXl6aW1IWGNSNVZqOEFDUTR3QVRybFIyQzBlMTZtYWM0Q2dDdE1LSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wdWJsaWMvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1763451078);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT 'UMS',
  `site_email` varchar(255) DEFAULT NULL,
  `site_phone` varchar(255) DEFAULT NULL,
  `site_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `date`, `photo_path`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Sharma', '2025-01-15', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc9APxkj0xClmrU3PpMZglHQkx446nQPG6lA&s', 'Great experience with this university. Highly recommended!', 5, '2025-10-08 08:26:49', '2025-10-08 08:26:49'),
(2, 'Anjali Verma', '2025-02-10', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc9APxkj0xClmrU3PpMZglHQkx446nQPG6lA&s', 'The staff was very supportive and helpful.', 4, '2025-10-08 08:26:49', '2025-10-08 08:26:49'),
(3, 'Vikram Singh', '2025-03-05', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc9APxkj0xClmrU3PpMZglHQkx446nQPG6lA&s', 'Courses are well structured and informative.', 5, '2025-10-08 08:26:49', '2025-10-08 08:26:49'),
(4, 'Priya Kapoor', '2025-04-20', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc9APxkj0xClmrU3PpMZglHQkx446nQPG6lA&s', 'I loved the campus environment and facilities.', 4, '2025-10-08 08:26:49', '2025-10-08 08:26:49'),
(5, 'Amit Joshi', '2025-05-12', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc9APxkj0xClmrU3PpMZglHQkx446nQPG6lA&s', 'Excellent faculty and practical learning opportunities.', 5, '2025-10-08 08:26:49', '2025-10-08 08:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `location` varchar(255) DEFAULT NULL,
  `type` enum('government','private') NOT NULL DEFAULT 'private',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `slug`, `description`, `vision`, `mission`, `logo_path`, `images`, `location`, `type`, `created_at`, `updated_at`) VALUES
(1, 'National Tech University', 'national-tech-university', 'A leading institution for technological advancement and research.', 'To foster innovation and leadership.', 'To provide cutting-edge education and research opportunities.', 'https://images.pexels.com/photos/4347368/pexels-photo-4347368.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', NULL, 'Tech City, India', 'government', '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(2, 'Global Science University', 'global-science-university', 'Premier university for sciences and interdisciplinary studies.', 'To advance scientific discovery.', 'To educate and inspire future scientists.', 'https://www.annauniv.edu/images/main-slider/slide1.jpeg', NULL, 'Science City, India', 'private', '2025-10-05 18:30:00', '2025-10-05 18:30:00'),
(3, 'Pioneer Education University', 'pioneer-education-university', 'Dedicated to holistic education and professional development.', 'To create global leaders.', 'To offer quality education for all.', 'https://images.pexels.com/photos/4347368/pexels-photo-4347368.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', NULL, 'Edu City, India', 'private', '2025-10-05 18:30:00', '2025-10-05 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `profile_picture`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Singh', 'admin@example.com', '9334274325', '$2y$12$B80rc8d2w4HQsQ4Ji3TB7uGAWBkZ8.OB6EdPlIjcOsAW8DJlljUqK', 'profiles/HnMsNzmfuipy5eabXW36O4BxA6qXp9EGlS2jwsr8.jpg', '2025-10-07 05:24:25', NULL, '2025-10-07 05:24:28', '2025-11-19 06:37:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_slug_unique` (`slug`),
  ADD KEY `cms_type_index` (`type`),
  ADD KEY `cms_status_index` (`status`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colleges_slug_unique` (`slug`),
  ADD KEY `colleges_university_id_index` (`university_id`),
  ADD KEY `colleges_slug_index` (`slug`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_university_id_index` (`university_id`),
  ADD KEY `courses_college_id_index` (`college_id`),
  ADD KEY `courses_slug_index` (`slug`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_email_index` (`email`),
  ADD KEY `enquiries_university_id_index` (`university_id`),
  ADD KEY `enquiries_status_index` (`status`),
  ADD KEY `enquiries_college_id_index` (`college_id`),
  ADD KEY `enquiries_course_id_index` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_is_read_index` (`is_read`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_foreign` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_email_index` (`email`),
  ADD KEY `students_course_id_index` (`course_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_name_index` (`name`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `universities_slug_unique` (`slug`),
  ADD KEY `universities_slug_index` (`slug`),
  ADD KEY `universities_type_index` (`type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `courses_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `enquiries_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `enquiries_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
