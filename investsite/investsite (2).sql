-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 06:35 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privillege` int(1) NOT NULL,
  `updatetime` int(12) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `privillege`, `updatetime`, `flag`) VALUES
(1, 'admin', '123456', 1, 1504127552, 1);

-- --------------------------------------------------------

--
-- Table structure for table `btcaddress`
--

CREATE TABLE `btcaddress` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `packageid` int(5) NOT NULL,
  `receivebtcid` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `rate` float NOT NULL,
  `updatetime` int(11) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('7jfku7tkiuhg821p16j09piu3aj5ciu0', '::1', 1511770758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737303735383b),
('er1frv9a2g19eauo4rgqq29osa9n833d', '::1', 1511772311, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737323331313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('q8i3u02ujlsb29nq40t94d02rma6e596', '::1', 1511772642, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737323634323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('k93mv3e71388oanpe10mmik1pbfmv6as', '::1', 1511772951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737323935313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('gfs72901pvb5jf69do9bvotf97k1noao', '::1', 1511773302, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737333330323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('39b63t6oq1d1evvfu3mgc1h87i2encpk', '::1', 1511773637, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737333633373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('m1qgsabier8geu7h73dvb15n8he7du6g', '::1', 1511773979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737333937393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('stf1p8vhjhms037i37tn8oqhdg3kbi9q', '::1', 1511774284, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737343238343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('11tii3k8ph2vca04ktjf2s8634s51ptb', '::1', 1511774648, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737343634383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('2joomjcadno874af7vkra3c5l9c588i4', '::1', 1511776612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737363631323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('0c28a2270rndjlg18409ni6a4pte10k2', '::1', 1511776983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737363938333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('5abeut2e10qjicemiiiuh32hfhail6bg', '::1', 1511777350, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737373335303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('1h87a1lrqcdhrnui62b2kv8l5jj1jd7u', '::1', 1511777736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737373733363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('pu8lhkh5vl42902vnkmok857h5sved9b', '::1', 1511778038, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737383033383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('mjlqhs3r73a84j0b30o1k981qj9n85kh', '::1', 1511779449, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737393434393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('03tfabfhu2ag7io86f5g65su64ourodj', '::1', 1511779867, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313737393836373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('5bgr1jm80e16vfj04n930svdtt7265sa', '::1', 1511780335, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738303333353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('2juispf5c575qops2i8qpscoo9dhsao1', '::1', 1511780676, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738303637363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('u3rtodl6vh83tklgviih28o14a200bs8', '::1', 1511781013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738313031333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('u95jkt3aessoqi25s7lakbcig1mbb9vl', '::1', 1511781357, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738313335373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('jcdgr73jrn3s3fes6bdqug9hl2s2ufle', '::1', 1511781700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738313730303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('hk2r9p6eui7ldtfq0qhu081j8090gtkd', '::1', 1511782054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738323035343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('8hk93apimgru94cr3n4v81liioffg5lg', '::1', 1511782362, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738323336323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c623a313b),
('o5qlbjl1mj9is2sbdkrh2f9vn5obs31s', '::1', 1511787953, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738373935333b),
('m3k3qlqbt35qnkmi8t9h89o5ldk9hhhb', '::1', 1511788800, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738383830303b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('sjgn9s9aguaa45tecu5vuge4cmvibg86', '::1', 1511789184, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738393138343b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('t8roqac036ltedi67tccrm77raqei1ci', '::1', 1511789529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313738393532393b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('u2bluo8i07vrgvhe5oekjc4hohpf0l4j', '::1', 1511790033, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739303033333b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('h5sm28i38v1pmrl08t5keb90bl0flssh', '::1', 1511790670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739303637303b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('r3rv50oev92ekrcgae03mapv8m8js42p', '::1', 1511791004, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739313030343b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('nm1brjt5ti3g421fm8fedpi5ooi0ib6e', '::1', 1511791319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739313331393b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('m60njdcsiigo6i2273jtkjijgoq380rg', '::1', 1511791636, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739313633363b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('n1bt8u2g354dvgpfh6ri7kuk6g7tmca5', '::1', 1511791951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739313935313b69647c733a313a2237223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('q39cs6ch8rtqjatil1ksg5l9iks0gmm9', '::1', 1511792298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739323239383b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('dnrvkusg8fiugsdho2ikh2d6lrm7bdpf', '::1', 1511792299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313739323239383b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('tep33jv0l7jdb0uic1600agnelig9lt6', '::1', 1511802496, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313830323439363b),
('35b0du0o810n3j89kn9rgv7uk4ghbn3c', '::1', 1511802872, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313830323837323b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('52kjco0qiof0akv4qebl4udtaqmue1nf', '::1', 1511802913, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313830323837323b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('bbfq012d636g1d8bne6ec84tvov8c6vt', '::1', 1511841495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313834313439353b),
('n18ks6v1jvi4ke8kbko3h6inb0888ffu', '::1', 1511844878, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313834343837383b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('qgbc4ci0ffge6fa0im1itcls0e4a2d23', '::1', 1511845903, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313834353930333b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('in6q0ojb56m07d7gfd38fdoees4ko17c', '::1', 1511847078, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313834373037383b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b),
('e7cinvlvj1g3ju33q5gmb53ntchmbdbi', '::1', 1511847288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313834373037383b69647c733a313a2233223b666c61677c733a313a2231223b6c6f67696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `invest`
--

CREATE TABLE `invest` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `packageid` int(5) NOT NULL,
  `amount` float NOT NULL,
  `updatetime` int(11) NOT NULL,
  `paymentway` varchar(10) NOT NULL,
  `depositby` varchar(10) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invest`
--

INSERT INTO `invest` (`id`, `memberid`, `packageid`, `amount`, `updatetime`, `paymentway`, `depositby`, `flag`) VALUES
(1, 5, 2, 400, 1511600471, 'pm', 'admin', 1),
(2, 4, 2, 200, 1511600514, 'pm', 'admin', 1),
(3, 3, 1, 10, 1511761289, 'pm', 'admin', 1),
(4, 3, 1, 30, 1511761383, 'pm', 'admin', 1),
(5, 3, 1, 10, 1511761483, 'pm', 'admin', 1),
(6, 3, 1, 30, 1511761506, 'pm', 'admin', 1),
(7, 3, 3, 50, 1511762200, 'btc', 'admin', 1),
(8, 2, 1, 20, 1511770334, 'pm', 'admin', 1),
(9, 3, 0, 0, 1511847163, 'pm_balance', '', 1),
(10, 3, 0, 10, 1511847288, 'pm_balance', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(33) NOT NULL,
  `referid` varchar(11) NOT NULL,
  `sq` varchar(255) NOT NULL,
  `sa` varchar(255) NOT NULL,
  `btcid` varchar(100) NOT NULL,
  `pmid` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `isblock` int(1) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `fullname`, `email`, `password`, `referid`, `sq`, `sa`, `btcid`, `pmid`, `ip`, `isblock`, `updatetime`, `flag`) VALUES
(3, 'bdcashout', 'papon Chandra Shaha', 'jobs4papon@gmail.com', 'papon123456', '0', 'my name?', 'papon', '', 'U4421212', '103.67.198.230', 0, 1510985969, 1),
(6, 'tariq4478', 'Tarique Mosharraf', 'tariq4478@gmail.com', '123', '1', 'What was the make and model of your first car?', 'asdf', 'sdfasf', 'U3434344', '::1', 0, 1511768953, 1),
(7, 'papon', 'papon', 'sojib@gmail.com', '123', '3', 'What is the name of your favorite childhood friend?', 'sss', 'rr', 'uuuu', '::1', 0, 1511770182, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `packagename` varchar(50) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `mindeposit` float NOT NULL,
  `maxdeposit` float NOT NULL,
  `profitpercentage` float NOT NULL,
  `periodoption` int(1) NOT NULL,
  `expiry` int(5) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `packagename`, `tagline`, `mindeposit`, `maxdeposit`, `profitpercentage`, `periodoption`, `expiry`, `updatetime`, `flag`) VALUES
(1, 'Basic', 'Basic', 10, 2000, 2, 1, 100, 1511761552, 1),
(2, 'Hourly Package', '100 Hours', 50, 1000, 3, 1, 100, 1511083907, 1),
(3, 'Gold Package ', 'Daily for 12 days', 100, 5000, 15, 2, 10, 1511762180, 1),
(4, 'Hourly Gold Package', '10 Days', 100, 5000, 15, 2, 10, 1511761571, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymentoption`
--

CREATE TABLE `paymentoption` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `pm` int(11) NOT NULL,
  `btc` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `investid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `updatetime` int(11) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profit`
--

INSERT INTO `profit` (`id`, `memberid`, `investid`, `amount`, `updatetime`, `flag`) VALUES
(1, 5, 1, 12, 1511683052, 1),
(2, 4, 2, 6, 1511683052, 1);

-- --------------------------------------------------------

--
-- Table structure for table `referralcomission`
--

CREATE TABLE `referralcomission` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `downline` int(11) NOT NULL,
  `depositamoun` float NOT NULL,
  `investid` int(11) NOT NULL,
  `comission` float NOT NULL,
  `updatetime` int(11) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referralcomission`
--

INSERT INTO `referralcomission` (`id`, `memberid`, `downline`, `depositamoun`, `investid`, `comission`, `updatetime`, `flag`) VALUES
(1, 0, 2, 20, 8, 1, 1511770334, 1),
(2, 0, 3, 0, 9, 0, 1511847163, 1),
(3, 0, 3, 10, 10, 0.5, 1511847288, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `gateway` varchar(10) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `accountid` varchar(255) NOT NULL,
  `batchid` varchar(20) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `memberid`, `amount`, `gateway`, `updatetime`, `accountid`, `batchid`, `flag`) VALUES
(1, 2, 0.3, 'pm', 1511257373, 'U3434444', '343434', 1),
(2, 2, 0.001, 'btc', 1511257373, 'U3434444', '3434', 1),
(3, 2, 1, 'pm', 1511589810, 'U3434444', '343434', 1),
(4, 4, 1, 'pm', 1511683093, 'U3434444', '654555', 1),
(5, 3, 4, 'btc', 1511766909, '1ljsadlfjljfdldjf2jdlkjfslkdfjjdf3', '5343344', 1),
(6, 3, 1, 'btc', 1511768311, '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `btcaddress`
--
ALTER TABLE `btcaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invest`
--
ALTER TABLE `invest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referralcomission`
--
ALTER TABLE `referralcomission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `btcaddress`
--
ALTER TABLE `btcaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invest`
--
ALTER TABLE `invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referralcomission`
--
ALTER TABLE `referralcomission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
