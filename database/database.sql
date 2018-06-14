-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 09:11 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetmycampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(128) DEFAULT NULL,
  `css_style` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `css_style`) VALUES
(1, 'Gaming', 'gaming-thumbnail'),
(2, 'Politics', 'politics-thumbnail'),
(3, 'Culture', 'culture-thumbnail'),
(4, 'Startups', 'startups-thumbnail'),
(5, 'Sports', 'sports-thumbnail'),
(6, 'Health + Fitness', 'health-thumbnail'),
(7, 'Spirituality', 'spirituality-thumbnail'),
(8, 'Anime + Comic Books', 'anime-thumbnail'),
(9, 'Business', 'business-thumbnail'),
(10, 'Art', 'art-thumbnail'),
(11, 'Music', 'music-thumbnail'),
(12, 'LGBTQ', 'lgbtq-thumbnail'),
(13, 'Photography', 'photography-thumbnail'),
(14, 'Science + Technology', 'technology-thumbnail'),
(15, 'Travel', 'travel-thumbnail'),
(16, 'General', 'general-thumbnail'),
(17, 'Social Issues', 'social-thumbnail'),
(18, 'Theatre', 'theatre-thumbnail'),
(19, 'Books', 'books-thumbnail'),
(20, 'Tv + Films', 'films-thumbnail'),
(21, 'Campus Stories', 'rants-thumbnail'),
(22, 'Financial Aid', 'financialAid-thumbnail'),
(23, 'Majors', 'majors-thumbnail'),
(24, 'Admissions', 'admissions-thumbnail'),
(25, 'Greek life', 'greek-thumbnail'),
(26, 'Parties', 'parties-thumbnail'),
(27, 'Getting Into', 'gettingIn-thumbnail');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(10) UNSIGNED NOT NULL,
  `uni_name` varchar(60) NOT NULL,
  `city` varchar(19) NOT NULL,
  `state` varchar(2) NOT NULL,
  `email_url` varchar(23) NOT NULL,
  `uni_abrev` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `uni_name`, `city`, `state`, `email_url`, `uni_abrev`) VALUES
(1, 'Abilene Christian University', 'Abilene', 'TX', 'acu.edu', 'Abilene'),
(2, 'Adelphi University', 'Garden City', 'NY', 'adelphi.edu', 'adelphi'),
(3, 'Adler University', 'Chicago', 'IL', 'adler.edu', 'adler'),
(4, 'Alabama A & M University', 'Normal', 'AL', 'aamu.edu', 'alabamaa&m'),
(5, 'Alabama State University', 'Montgomery', 'AL', 'alasu.edu', 'alasu'),
(6, 'Alaska Pacific University', 'Anchorage', 'AK', 'alaskapacific.edu', 'alaskapacific'),
(7, 'Albertus Magnus College', 'New Haven', 'CT', 'albertus.edu', 'albertus'),
(8, 'Albion College', 'Albion', 'MI', 'albion.edu', 'albion'),
(9, 'Albright College', 'Reading', 'PA', 'albright.edu', 'albright'),
(10, 'Alcorn State University', 'Alcorn State', 'MS', 'alcorn.edu', 'alcorn'),
(11, 'Alfred University', 'Alfred', 'NY', 'alfred.edu', 'alfred'),
(12, 'Allan Hancock College', 'Santa Maria', 'CA', 'hancockcollege.edu', 'hancockcollege'),
(13, 'Allegheny College', 'Meadville', 'PA', 'allegheny.edu', 'allegheny'),
(14, 'Allen University', 'Columbia', 'SC', 'allenuniversity.edu', 'allenuniversity'),
(15, 'Alvernia University', 'Reading', 'PA', 'alvernia.edu', 'alvernia'),
(16, 'Amberton University', 'Garland', 'TX', 'amberton.edu', 'amberton'),
(17, 'American Baptist College', 'Nashville', 'TN', 'abcnash.edu', 'abcnash'),
(18, 'American Indian College', 'Phoenix', 'AZ', 'aicag.edu', 'aicag'),
(19, 'American National University - Salem', 'Salem', 'VA', 'ncbt.edu', 'ncbt'),
(20, 'American Sentinel University', 'Aurora', 'CO', 'americansentinel.edu', 'americansentinel'),
(21, 'American University', 'Washington', 'DC', 'american.edu', 'american'),
(22, 'Amherst College', 'Amherst', 'MA', 'amherst.edu', 'amherst'),
(23, 'Anaheim University', 'Anaheim', 'CA', 'anaheim.edu', 'anaheim'),
(24, 'Angelo State University', 'San Angelo', 'TX', 'angelo.edu', 'angelo'),
(25, 'Arcadia University', 'Glenside', 'PA', 'arcadia.edu', 'arcadia'),
(26, 'Arizona Christian University', 'Phoenix', 'AZ', 'swcaz.edu', 'swcaz'),
(27, 'Arizona State University', 'Tempe', 'AZ', 'asu.edu', 'asu'),
(28, 'Arkansas Northeastern College', 'Blytheville', 'AR', 'anc.edu', 'anc'),
(29, 'Arkansas State University', 'State University', 'AR', 'astate.edu', 'astate'),
(30, 'Arkansas State University - Beebe', 'Beebe', 'AR', 'asub.edu', 'asub'),
(31, 'Arkansas State University - Newport', 'Newport', 'AR', 'asun.edu', 'asun'),
(32, 'Arkansas State University - Mountain Home', 'Mountain Home', 'AR', 'asumh.edu', 'asumh'),
(33, 'Arkansas Tech University', 'Russellville', 'AR', 'atu.edu', 'atu'),
(34, 'Ashland University', 'Ashland', 'OH', 'ashland.edu', 'ashland'),
(35, 'Aspen University', 'Denver', 'CO', 'aspen.edu', 'aspen'),
(36, 'Assumption College', 'Worcester', 'MA', 'assumption.edu', 'assumption'),
(37, 'Athens State University', 'Athens', 'AL', 'athens.edu', 'athens'),
(38, 'Auburn University', 'Auburn University', 'AL', 'auburn.edu', 'auburn'),
(39, 'Auburn University-Montgomery', 'Montgomery', 'AL', 'aum.edu', 'aum'),
(40, 'Augusta State University', 'Augusta', 'GA', 'aug.edu', 'aug'),
(41, 'Aurora University', 'Aurora', 'IL', 'aurora.edu', 'aurora'),
(42, 'Babson College', 'Wellesley', 'MA', 'babson.edu', 'babson'),
(43, 'Bainbridge State College', 'Bainbridge', 'GA', 'bainbridge.edu', 'bainbridge'),
(44, 'Baker College', 'Flint', 'MI', 'baker.edu', 'baker'),
(45, 'Baker University', 'Baldwin City', 'KS', 'bakeru.edu', 'bakeru'),
(46, 'Bakersfield College', 'Bakersfield', 'CA', 'bakersfieldcollege.edu', 'bakersfieldcollege'),
(47, 'Ball State University', 'Muncie', 'IN', 'bsu.edu', 'bsu'),
(48, 'Bard College', 'Annandale-On-Hudson', 'NY', 'bard.edu', 'bard'),
(49, 'Barnard College', 'New York', 'NY', 'barnard.edu', 'barnard'),
(50, 'Barry University', 'Miami Shores', 'FL', 'barry.edu', 'barry'),
(51, 'Baruch College', 'New York', 'NY', 'baruch.cuny.edu', 'baruch.cuny'),
(52, 'Bates College', 'Lewiston', 'ME', 'bates.edu', 'bates'),
(53, 'Bay State College', 'Boston', 'MA', 'baystate.edu', 'baystate'),
(54, 'Baylor University', 'Waco', 'TX', 'baylor.edu', 'baylor'),
(55, 'Beacon University', 'Columbus', 'GA', 'beacon.edu', 'beacon'),
(56, 'Becker College', 'Worcester', 'MA', 'beckercollege.edu', 'beckercollege'),
(57, 'Belhaven University', 'Jackson', 'MS', 'belhaven.edu', 'belhaven'),
(58, 'Bellevue University', 'Bellevue', 'NE', 'bellevue.edu', 'bellevue'),
(59, 'Belmont University', 'Nashville', 'TN', 'belmont.edu', 'belmont'),
(60, 'Benedict College', 'Columbia', 'SC', 'benedict.edu', 'benedict'),
(61, 'Bentley University', 'Waltham', 'MA', 'bentley.edu', 'bentley'),
(62, 'Berkeley College', 'West Paterson', 'NJ', 'berkeleycollege.edu', 'berkeleycollege'),
(63, 'Berklee College of Music', 'Boston', 'MA', 'berklee.edu', 'berklee'),
(64, 'Berry College', 'Mount Berry', 'GA', 'berry.edu', 'berry'),
(65, 'Bethany College', 'Lindsborg', 'KS', 'bethanylb.edu', 'bethanylb'),
(66, 'Bethany University', 'Scotts Valley', 'CA', 'bethany.edu', 'bethany'),
(67, 'Bethel College', 'Mishawaka', 'IN', 'bethelcollege.edu', 'bethelcollege'),
(68, 'Bethel University', 'St. Paul', 'MN', 'bethel.edu', 'bethel'),
(69, 'Bethesda University', 'Anaheim', 'CA', 'buc.edu', 'bethesda'),
(70, 'Bethune - Cookman University', 'Daytona Beach', 'FL', 'bethune.cookman.edu', 'bethunecookman'),
(71, 'Bismarck State College', 'Bismarck', 'ND', 'bismarckstate.edu', 'bismarckstate'),
(72, 'Bloomfield College', 'Bloomfield', 'NJ', 'bloomfield.edu', 'bloomfield'),
(73, 'Blue Mountain College', 'Blue Mountain', 'MS', 'bmc.edu', 'bmc'),
(74, 'Boise State University', 'Boise', 'ID', 'boisestate.edu', 'boisestate'),
(75, 'Boston College', 'Chestnut Hill', 'MA', 'bc.edu', 'Bostoncollege'),
(76, 'Boston University', 'Boston', 'MA', 'bu.edu', 'Boston'),
(77, 'Bowdoin College', 'Brunswick', 'ME', 'bowdoin.edu', 'bowdoin'),
(78, 'Bowie State University', 'Bowie', 'MD', 'bowiestate.edu', 'bowiestate'),
(79, 'Bowling Green State University', 'Bowling Green', 'OH', 'bgsu.edu', 'Bowlinggreen'),
(80, 'Bradley University', 'Peoria', 'IL', 'bradley.edu', 'bradley'),
(81, 'Brandeis University', 'Waltham', 'MA', 'brandeis.edu', 'brandeis'),
(82, 'Bridgewater College', 'Bridgewater', 'VA', 'bridgewater.edu', 'bridgewater'),
(83, 'Bridgewater State University', 'Bridgewater', 'MA', 'bridgew.edu', 'bridgew'),
(84, 'Brigham Young University', 'Provo', 'UT', 'byu.edu', 'byu'),
(85, 'Brigham Young University - Hawaii', 'Laie', 'HI', 'byuh.edu', 'byuh'),
(86, 'Brooklyn College', 'Brooklyn', 'NY', 'brooklyn.cuny.edu', 'brooklyn'),
(87, 'Brown University', 'Providence', 'RI', 'brown.edu', 'brown'),
(88, 'Bryant University', 'Smithfield', 'RI', 'bryant.edu', 'bryant'),
(89, 'Bucknell University', 'Lewisburg', 'PA', 'bucknell.edu', 'bucknell'),
(90, 'Butler University', 'Indianapolis', 'IN', 'butler.edu', 'butler'),
(91, 'California Institute of Technology', 'Pasadena', 'CA', 'caltech.edu', 'caltech'),
(92, 'California Polytechnic State University', 'San Luis Obispo', 'CA', 'calpoly.edu', 'calpoly'),
(93, 'Cal State  - Bakersfield', 'Bakersfield', 'CA', 'csub.edu', 'bakersfield'),
(94, 'Cal State  - Channel Islands', 'Camarillo', 'CA', 'csuci.edu', 'csuci'),
(95, 'Cal State  - Chico', 'Chico', 'CA', 'csuchico.edu', 'chico'),
(96, 'Cal State  - Dominguez Hills', 'Carson', 'CA', 'csudh.edu', 'Dominguezhills'),
(97, 'Cal State  - East Bay', 'Hayward', 'CA', 'csueastbay.edu', 'csueastbay'),
(98, 'Cala State  - Fresno', 'Fresno', 'CA', 'fresnostate.edu', 'fresnostate'),
(99, 'Cal State  - Fullerton', 'Fullerton', 'CA', 'fullerton.edu', 'fullerton'),
(100, 'Cal State  - Long Beach', 'Long Beach', 'CA', 'csulb.edu', 'cslongbeach'),
(101, 'Cal State  - Los Angeles', 'Los Angeles', 'CA', 'calstatela.edu', 'calstatela'),
(102, 'Cal State  - Monterey Bay', 'Seaside', 'CA', 'csumb.edu', 'csumb'),
(103, 'Cal State  - Northridge', 'Northridge', 'CA', 'csun.edu', 'Northridge'),
(104, 'Cal State  - Sacramento', 'Sacramento', 'CA', 'csus.edu', 'Sacramento'),
(105, 'Cal State  - San Bernardino', 'San Bernardino', 'CA', 'csusb.edu', 'csusb'),
(106, 'Cal State  - San Marcos', 'San Marcos', 'CA', 'csusm.edu', 'csusm'),
(107, 'Cal State  - Stanislaus', 'Turlock', 'CA', 'csustan.edu', 'csustan'),
(108, 'Cameron University', 'Lawton', 'OK', 'cameron.edu', 'cameron'),
(109, 'Campbell University', 'Buies Creek', 'NC', 'campbell.edu', 'campbell'),
(110, 'Canisius College', 'Buffalo', 'NY', 'canisius.edu', 'canisius'),
(111, 'Capella University', 'Minneapolis', 'MN', 'capella.edu', 'capella'),
(112, 'Cardean University', 'Chicago', 'IL', 'cardean.edu', 'cardean'),
(113, 'Carleton College', 'Northfield', 'MN', 'carleton.edu', 'carleton'),
(114, 'Carnegie Mellon University', 'Pittsburgh', 'PA', 'cmu.edu', 'Carnegiemellon'),
(115, 'Carroll College', 'Helena', 'MT', 'carroll.edu', 'carroll'),
(116, 'Carroll University', 'Waukesha', 'WI', 'carrollu.edu', 'carrollu'),
(117, 'Case Western Reserve University', 'Cleveland', 'OH', 'case.edu', 'case'),
(118, 'Castleton State College', 'Castleton', 'VT', 'castleton.edu', 'castleton'),
(119, 'Central Methodist University', 'Fayette', 'MO', 'centralmethodist.edu', 'centralmethodist'),
(120, 'Central Michigan University', 'Mount Pleasant', 'MI', 'cmich.edu', 'cmich'),
(121, 'Central Washington University', 'Ellensburg', 'WA', 'cwu.edu', 'cwu'),
(122, 'Cerritos College', 'Norwalk', 'CA', 'cerritos.edu', 'cerritos'),
(123, 'Champlain College', 'Burlington', 'VT', 'champlain.edu', 'champlain'),
(124, 'Chapman University', 'Orange', 'CA', 'chapman.edu', 'chapman'),
(125, 'Charleston Southern University', 'Charleston', 'SC', 'csuniv.edu', 'csuniv'),
(126, 'Chicago State University', 'Chicago', 'IL', 'csu.edu', 'csu'),
(127, 'Claremont Lincoln University', 'Claremont', 'CA', 'claremontlincoln.edu', 'claremontlincoln'),
(128, 'Claremont McKenna College', 'Claremont', 'CA', 'claremontmckenna.edu', 'claremontmckenna'),
(129, 'Clarendon College', 'Clarendon', 'TX', 'clarendoncollege.edu', 'clarendoncollege'),
(130, 'Clarion University of Pennsylvania', 'Clarion', 'PA', 'clarion.edu', 'clarion'),
(131, 'Clark University', 'Worcester', 'MA', 'clarku.edu', 'clarku'),
(132, 'Clarke University', 'Dubuque', 'IA', 'clarke.edu', 'clarke'),
(133, 'Clarks Summit University', 'Clarks Summit', 'PA', 'clarkssummitu.edu', 'clarkssummitu'),
(134, 'Clarkson University', 'Potsdam', 'NY', 'clarkson.edu', 'clarkson'),
(135, 'Clayton  State University', 'Morrow', 'GA', 'clayton.edu', 'clayton'),
(136, 'Clemson University', 'Clemson', 'SC', 'clemson.edu', 'clemson'),
(137, 'Cleveland State University', 'Cleveland', 'OH', 'csuohio.edu', 'csuohio'),
(138, 'Coastal Carolina University', 'Conway', 'SC', 'coastal.edu', 'coastal'),
(139, 'Colby College', 'Waterville', 'ME', 'colby.edu', 'colby'),
(140, 'Colby-Sawyer College', 'New London', 'NH', 'colby-sawyer.edu', 'colby-sawyer'),
(141, 'Colgate University', 'Hamilton', 'NY', 'colgate.edu', 'colgate'),
(142, 'College of Charleston', 'Charleston', 'SC', 'cofc.edu', 'cofc'),
(143, 'College of Idaho', 'Caldwell', 'ID', 'collegeofidaho.edu', 'collegeofidaho'),
(144, 'The College of New Jersey', 'Ewing', 'NJ', 'tcnj.edu', 'tcnj'),
(145, 'College of the Holy Cross', 'Worcester', 'MA', 'holycross.edu', 'holycross'),
(146, 'College of William and Mary', 'Williamsburg', 'VA', 'wm.edu', 'william&mary'),
(147, 'Colorado College', 'Colorado Springs', 'CO', 'coloradocollege.edu', 'coloradocollege'),
(148, 'Colorado School of Mines', 'Golden', 'CO', 'mines.edu', 'mines'),
(149, 'Colorado State University', 'Fort Collins', 'CO', 'colostate.edu', 'colostate'),
(150, 'Colorado State University - Pueblo', 'Pueblo', 'CO', 'colostate-pueblo.edu', 'colostate-pueblo'),
(151, 'Columbia University', 'New York', 'NY', 'columbia.edu', 'columbia'),
(152, 'Columbus State University', 'Columbus', 'GA', 'columbusstate.edu', 'columbusstate'),
(153, 'Concord University', 'Athens', 'WV', 'concord.edu', 'concord'),
(154, 'Concordia University - Austin', 'Austin', 'TX', 'concordia.edu', 'concordia'),
(155, 'Concordia University Chicago', 'River Forest', 'IL', 'cuchicago.edu', 'cuchicago'),
(156, 'Cornell University', 'Ithaca', 'NY', 'cornell.edu', 'cornell'),
(157, 'Creighton University', 'Omaha', 'NE', 'creighton.edu', 'creighton'),
(158, 'Culinary Institute of America', 'Hyde Park', 'NY', 'culinary.edu', 'culinary'),
(159, 'Curry College', 'Milton', 'MA', 'curry.edu', 'curry'),
(160, 'Dakota State University', 'Madison', 'SD', 'dsu.edu', 'dsu'),
(161, 'Dalton State College', 'Dalton', 'GA', 'daltonstate.edu', 'daltonstate'),
(162, 'Dartmouth College', 'Hanover', 'NH', 'dartmouth.edu', 'dartmouth'),
(163, 'Davenport University', 'Grand Rapids', 'MI', 'davenport.edu', 'davenport'),
(164, 'Davidson College', 'Davidson', 'NC', 'davidson.edu', 'Davidson'),
(165, 'Daytona State College', 'Daytona Beach', 'FL', 'daytonastate.edu', 'daytonastate'),
(166, 'Delaware State University', 'Dover', 'DE', 'desu.edu', 'Delawarestate'),
(167, 'Delta State University', 'Cleveland', 'MS', 'deltastate.edu', 'deltastate'),
(168, 'Denison University', 'Granville', 'OH', 'denison.edu', 'denison'),
(169, 'DePaul University', 'Chicago', 'IL', 'depaul.edu', 'depaul'),
(170, 'DeVry University', 'Oakbrook Terrace', 'IL', 'devry.edu', 'devry'),
(171, 'Dixie State university', 'Saint George', 'UT', 'dixie.edu', 'dixie'),
(172, 'Dominican University of California', 'San Rafael', 'CA', 'dominican.edu', 'dominican'),
(173, 'Dongguk University - Los Angeles', 'Los Angeles', 'CA', 'dula.edu', 'dula'),
(174, 'Drake University', 'Des Moines', 'IA', 'drake.edu', 'drake'),
(175, 'Drexel University', 'Philadelphia', 'PA', 'drexel.edu', 'drexel'),
(176, 'Drury University', 'Springfield', 'MO', 'drury.edu', 'drury'),
(177, 'Duke University', 'Durham', 'NC', 'duke.edu', 'duke'),
(178, 'Duquesne University', 'Pittsburgh', 'PA', 'duq.edu', 'duq'),
(179, 'East Carolina University', 'Greenville', 'NC', 'ecu.edu', 'ecu'),
(180, 'East Tennessee State University', 'Johnson City', 'TN', 'etsu.edu', 'etsu'),
(181, 'Eastern Connecticut State University', 'Willimantic', 'CT', 'easternct.edu', 'easternct'),
(182, 'Eastern Illinois University', 'Charleston', 'IL', 'eiu.edu', 'eiu'),
(183, 'Eastern Kentucky University', 'Richmond', 'KY', 'eku.edu', 'eku'),
(184, 'Eastern Michigan University', 'Ypsilanti', 'MI', 'emich.edu', 'emich'),
(185, 'Eckerd College', 'Saint Petersburg', 'FL', 'eckerd.edu', 'eckerd'),
(186, 'Edinboro University of Pennsylvania', 'Edinboro', 'PA', 'edinboro.edu', 'edinboro'),
(187, 'Elizabethtown College', 'Elizabethtown', 'PA', 'etown.edu', 'etown'),
(188, 'Elmira College', 'Elmira', 'NY', 'elmira.edu', 'elmira'),
(189, 'Elon University', 'Elon', 'NC', 'elon.edu', 'elon'),
(190, 'Embry-Riddle  University', 'Daytona Beach', 'FL', 'erau.edu', 'Emoryriddle'),
(191, 'Emerson College', 'Boston', 'MA', 'emerson.edu', 'emerson'),
(192, 'Emmanuel College', 'Franklin Springs', 'GA', 'ec.edu', 'Emmanuel'),
(193, 'Emory University', 'Atlanta', 'GA', 'emory.edu', 'emory'),
(194, 'Fairfield University', 'Fairfield', 'CT', 'fairfield.edu', 'fairfield'),
(195, 'Fairmont State University', 'Fairmont', 'WV', 'fairmontstate.edu', 'fairmontstate'),
(196, 'Fashion Institute of Technology', 'New York', 'NY', 'fitnyc.edu', 'fitnyc'),
(197, 'Fayetteville State University', 'Fayetteville', 'NC', 'uncfsu.edu', 'uncfsu'),
(198, 'Ferrum College', 'Ferrum', 'VA', 'ferrum.edu', 'ferrum'),
(199, 'Fisher College', 'Boston', 'MA', 'fisher.edu', 'fisher'),
(200, 'Fitchburg State University', 'Fitchburg', 'MA', 'fsc.edu', 'fsc'),
(201, 'Florida Atlantic University', 'Boca Raton', 'FL', 'fau.edu', 'fau'),
(202, 'Florida Gulf Coast University', 'Fort Myers', 'FL', 'fgcu.edu', 'fgcu'),
(203, 'Florida Institute of Technology', 'Melbourne', 'FL', 'fit.edu', 'fit'),
(204, 'Florida International University', 'Miami', 'FL', 'fiu.edu', 'fiu'),
(205, 'Florida Memorial University', 'Miami Gardens', 'FL', 'fmuniv.edu', 'fmuniv'),
(206, 'Florida National University', 'Hialeah', 'FL', 'fnu.edu', 'fnu'),
(207, 'Florida Southern College', 'Lakeland', 'FL', 'flsouthern.edu', 'flsouthern'),
(208, 'Florida State University', 'Tallahassee', 'FL', 'fsu.edu', 'fsu'),
(209, 'Fordham University', 'Bronx', 'NY', 'fordham.edu', 'fordham'),
(210, 'Framingham State University', 'Framingham', 'MA', 'framingham.edu', 'framingham'),
(211, 'Franklin Pierce University', 'Rindge', 'NH', 'fpc.edu', 'Franklinpierce'),
(212, 'Frostburg State University', 'Frostburg', 'MD', 'frostburg.edu', 'frostburg'),
(213, 'Furman University', 'Greenville', 'SC', 'furman.edu', 'furman'),
(214, 'George Mason University', 'Fairfax', 'VA', 'gmu.edu', 'Georgemason'),
(215, 'George Washington University', 'Washington', 'DC', 'gwu.edu', 'gwu'),
(216, 'Georgetown University', 'Washington', 'DC', 'georgetown.edu', 'georgetown'),
(217, 'Georgia Institute of Technology', 'Atlanta', 'GA', 'gatech.edu', 'gatech'),
(218, 'Georgia Southern University', 'Statesboro', 'GA', 'georgiasouthern.edu', 'georgiasouthern'),
(219, 'Georgia State University', 'Atlanta', 'GA', 'gsu.edu', 'gsu'),
(220, 'Gettysburg College', 'Gettysburg', 'PA', 'gettysburg.edu', 'gettysburg'),
(221, 'Gonzaga University', 'Spokane', 'WA', 'gonzaga.edu', 'gonzaga'),
(222, 'Grambling State University', 'Grambling', 'LA', 'gram.edu', 'Grambling'),
(223, 'Grand Canyon University', 'Phoenix', 'AZ', 'gcu.edu', 'Grandcanyon'),
(224, 'Grand Valley State University', 'Allendale', 'MI', 'gvsu.edu', 'Grandvallley'),
(225, 'Grayson College', 'Denison', 'TX', 'grayson.edu', 'grayson'),
(226, 'Hampton University', 'Hampton', 'VA', 'hamptonu.edu', 'hamptonu'),
(227, 'Harvard University', 'Cambridge', 'MA', 'harvard.edu', 'harvard'),
(228, 'Harvey Mudd College', 'Claremont', 'CA', 'hmc.edu', 'Harveymudd'),
(229, 'Haverford College', 'Haverford', 'PA', 'haverford.edu', 'haverford'),
(230, 'Hawaii Pacific University', 'Honolulu', 'HI', 'hpu.edu', 'hpu'),
(231, 'Hawaii Technology Institute', 'Honolulu', 'HI', 'hti.edu', 'hti'),
(232, 'High Point University', 'High Point', 'NC', 'highpoint.edu', 'highpoint'),
(233, 'Hobart & William Smith Colleges', 'Geneva', 'NY', 'hws.edu', 'hws'),
(234, 'Hofstra University', 'Hempstead', 'NY', 'hofstra.edu', 'hofstra'),
(235, 'Howard University', 'Washington', 'DC', 'howard.edu', 'howard'),
(236, 'Humboldt State University', 'Arcata', 'CA', 'humboldt.edu', 'humboldt'),
(237, 'Hunter College', 'New York', 'NY', 'hunter.cuny.edu', 'hunter.cuny'),
(238, 'Huntington University', 'Huntington', 'IN', 'huntington.edu', 'huntington'),
(239, 'Idaho State University', 'Pocatello', 'ID', 'isu.edu', 'Idahostate'),
(240, 'Illinois College', 'Jacksonville', 'IL', 'ic.edu', 'Illinoiscollege'),
(241, 'Illinois Institute of Technology', 'Chicago', 'IL', 'iit.edu', 'iit'),
(242, 'Illinois State University', 'Normal', 'IL', 'ilstu.edu', 'ilstu'),
(243, 'Illinois Wesleyan University', 'Bloomington', 'IL', 'iwu.edu', 'iwu'),
(244, 'Indiana Institute of Technology', 'Fort Wayne', 'IN', 'indianatech.edu', 'indianatech'),
(245, 'Indiana State University', 'Terre Haute', 'IN', 'indstate.edu', 'indstate'),
(246, 'Indiana University - Purdue University Fort Wayne', 'Fort Wayne', 'IN', 'ipfw.edu', 'ipfw'),
(247, 'Indiana University - Purdue University Indianapolis', 'Indianapolis', 'IN', 'iupui.edu', 'iupui'),
(248, 'Indiana University', 'Bloomington', 'IN', 'iu.edu', 'Indiana'),
(249, 'Indiana University - East', 'Richmond', 'IN', 'iue.edu', 'Indianaeast'),
(250, 'Indiana Wesleyan University', 'Marion', 'IN', 'indwes.edu', 'indwes'),
(251, 'Iona College', 'New Rochelle', 'NY', 'iona.edu', 'Iona'),
(252, 'Iowa State University', 'Ames', 'IA', 'iastate.edu', 'iastate'),
(253, 'Iowa Wesleyan University', 'Mount Pleasant', 'IA', 'iwc.edu', 'iwc'),
(254, 'Ithaca College', 'Ithaca', 'NY', 'ithaca.edu', 'ithaca'),
(255, 'Jackson State University', 'Jackson', 'MS', 'jsums.edu', 'jsums'),
(256, 'Jacksonville State University', 'Jacksonville', 'AL', 'jsu.edu', 'jsu'),
(257, 'Jacksonville University', 'Jacksonville', 'FL', 'ju.edu', 'ju'),
(258, 'James Madison University', 'Harrisonburg', 'VA', 'jmu.edu', 'jmu'),
(259, 'Jefferson College', 'Hillsboro', 'MO', 'jeffco.edu', 'jeffco'),
(260, 'John Carroll University', 'University Heights', 'OH', 'jcu.edu', 'jcu'),
(261, 'Johns Hopkins University', 'Baltimore', 'MD', 'jhu.edu', 'jhu'),
(262, 'Johnson & Wales University', 'Providence', 'RI', 'jwu.edu', 'jwu'),
(263, 'Kansas State University', 'Manhattan', 'KS', 'k-state.edu', 'k-state'),
(264, 'Kansas Wesleyan University', 'Salina', 'KS', 'kwu.edu', 'kwu'),
(265, 'Keene State College', 'Keene', 'NH', 'keene.edu', 'keene'),
(266, 'Kennesaw State University', 'Kennesaw', 'GA', 'kennesaw.edu', 'kennesaw'),
(267, 'Kent State University', 'Kent', 'OH', 'kent.edu', 'kent'),
(268, 'Kentucky State University', 'Frankfort', 'KY', 'kysu.edu', 'kysu'),
(269, 'Kentucky Wesleyan College', 'Owensboro', 'KY', 'kwc.edu', 'kwc'),
(270, 'Keystone College', 'La Plume', 'PA', 'keystone.edu', 'keystone'),
(271, 'King University', 'Bristol', 'TN', 'king.edu', 'king'),
(272, 'La Salle University', 'Philadelphia', 'PA', 'lasalle.edu', 'lasalle'),
(273, 'Lamar University', 'Beaumont', 'TX', 'lamar.edu', 'lamar'),
(274, 'Lawrence University', 'Appleton', 'WI', 'lawrence.edu', 'lawrence'),
(275, 'Lee University', 'Cleveland', 'TN', 'leeuniversity.edu', 'leeuniversity'),
(276, 'Lehigh University', 'Bethlehem', 'PA', 'lehigh.edu', 'lehigh'),
(277, 'Lehman College', 'Bronx', 'NY', 'lehman.cuny.edu', 'lehman.cuny'),
(278, 'Lesley University', 'Cambridge', 'MA', 'lesley.edu', 'lesley'),
(279, 'Lewis & Clark College', 'Portland', 'OR', 'lclark.edu', 'lclark'),
(280, 'Lewis University', 'Romeoville', 'IL', 'lewisu.edu', 'lewisu'),
(281, 'Lewis-Clark State College', 'Lewiston', 'ID', 'lcsc.edu', 'lcsc'),
(282, 'Liberty University', 'Lynchburg', 'VA', 'liberty.edu', 'liberty'),
(283, 'Lipscomb University', 'Nashville', 'TN', 'lipscomb.edu', 'lipscomb'),
(284, 'Louisiana College', 'Pineville', 'LA', 'lacollege.edu', 'lacollege'),
(285, 'Louisiana State University - Alexandria', 'Alexandria', 'LA', 'lsua.edu', 'lsua'),
(286, 'Louisiana State University - Eunice', 'Eunice', 'LA', 'lsue.edu', 'lsue'),
(287, 'Louisiana State University - Shreveport', 'Shreveport', 'LA', 'lsus.edu', 'lsus'),
(288, 'Louisiana State University', 'Baton Rouge', 'LA', 'lsu.edu', 'lsu'),
(289, 'Louisiana Tech University', 'Ruston', 'LA', 'latech.edu', 'latech'),
(290, 'Loyola Marymount University', 'Los Angeles', 'CA', 'lmu.edu', 'lmu'),
(291, 'Loyola University Maryland', 'Baltimore', 'MD', 'loyola.edu', 'loyola'),
(292, 'Loyola University New Orleans', 'New Orleans', 'LA', 'loyno.edu', 'loyno'),
(293, 'Loyola University of Chicago', 'Chicago', 'IL', 'luc.edu', 'luc'),
(294, 'Luther College', 'Decorah', 'IA', 'luther.edu', 'luther'),
(295, 'Lynchburg College', 'Lynchburg', 'VA', 'lynchburg.edu', 'lynchburg'),
(296, 'Lyndon State College', 'Lyndonville', 'VT', 'lyndonstate.edu', 'lyndonstate'),
(297, 'Lynn University', 'Boca Raton', 'FL', 'lynn.edu', 'lynn'),
(298, 'Macon State College', 'Macon', 'GA', 'maconstate.edu', 'maconstate'),
(299, 'Manhattan College', 'Riverdale', 'NY', 'manhattan.edu', 'manhattan'),
(300, 'Marietta College', 'Marietta', 'OH', 'marietta.edu', 'marietta'),
(301, 'Marist College', 'Poughkeepsie', 'NY', 'marist.edu', 'marist'),
(302, 'Marquette University', 'Milwaukee', 'WI', 'marquette.edu', 'marquette'),
(303, 'Marshall University', 'Huntington', 'WV', 'marshall.edu', 'marshall'),
(304, 'Marymount California University', 'Rancho Palos Verdes', 'CA', 'marymountcalifornia.edu', 'marymountcalifornia'),
(305, 'Marymount Manhattan College', 'New York', 'NY', 'mmm.edu', 'mmm'),
(306, 'Marymount University', 'Arlington', 'VA', 'marymount.edu', 'marymount'),
(307, 'Massachusetts College of Art and Design', 'Boston', 'MA', 'massart.edu', 'massart'),
(308, 'Massachusetts Institute of Technology', 'Cambridge', 'MA', 'mit.edu', 'mit'),
(309, 'McNeese State University', 'Lake Charles', 'LA', 'mcneese.edu', 'mcneese'),
(310, 'Mercer University', 'Macon', 'GA', 'mercer.edu', 'mercer'),
(311, 'Mercy College', 'Dobbs Ferry', 'NY', 'mercy.edu', 'mercy'),
(312, 'Meridian University', 'Petaluma', 'CA', 'meridianuniversity.edu', 'meridianuniversity'),
(313, 'Methodist University', 'Fayetteville', 'NC', 'methodist.edu', 'methodist'),
(314, 'Miami University', 'Oxford', 'OH', 'muohio.edu', 'muohio'),
(315, 'Michigan State University', 'East Lansing', 'MI', 'msu.edu', 'Michiganstate'),
(316, 'Middle Tennessee State University', 'Murfreesboro', 'TN', 'mtsu.edu', 'mtsu'),
(317, 'Minnesota State University - Moorhead', 'Moorhead', 'MN', 'mnstate.edu', 'mnstate'),
(318, 'Mississippi State University', 'Mississippi State', 'MS', 'msstate.edu', 'msstate'),
(319, 'Mississippi Valley State University', 'Itta Bena', 'MS', 'mvsu.edu', 'mvsu'),
(320, 'Missouri Southern State University', 'Joplin', 'MO', 'mssu.edu', 'mssu'),
(321, 'Missouri State University', 'Springfield', 'MO', 'missouristate.edu', 'missouristate'),
(322, 'Missouri Tech', 'St. Charles', 'MO', 'motech.edu', 'motech'),
(323, 'Monmouth College', 'Monmouth', 'IL', 'monm.edu', 'monm'),
(324, 'Monmouth University', 'West Long Branch', 'NJ', 'monmouth.edu', 'monmouth'),
(325, 'Montana State University - Billings', 'Billings', 'MT', 'msubillings.edu', 'msubillings'),
(326, 'Montana State University - Bozeman', 'Bozeman', 'MT', 'montana.edu', 'montana'),
(327, 'Montana State University - Great Falls College of Technology', 'Great Falls', 'MT', 'msugf.edu', 'msugf'),
(328, 'Montana State University - Northern', 'Havre', 'MT', 'msun.edu', 'msun'),
(329, 'Montana Tech of the University of Montana', 'Butte', 'MT', 'mtech.edu', 'mtech'),
(330, 'Montclair State University', 'Montclair', 'NJ', 'montclair.edu', 'montclair'),
(331, 'Morehead State University', 'Morehead', 'KY', 'moreheadstate.edu', 'moreheadstate'),
(332, 'Morehouse College', 'Atlanta', 'GA', 'morehouse.edu', 'morehouse'),
(333, 'Mount Ida College', 'Newton Centre', 'MA', 'mountida.edu', 'mountida'),
(334, 'Murray State College', 'Tishomingo', 'OK', 'mscok.edu', 'mscok'),
(335, 'Murray State University', 'Murray', 'KY', 'murraystate.edu', 'murraystate'),
(336, 'Nebraska Wesleyan University', 'Lincoln', 'NE', 'nebrwesleyan.edu', 'nebrwesleyan'),
(337, 'New England Culinary Institute', 'Montpelier', 'VT', 'neci.edu', 'neci'),
(338, 'New England Institute of Technology', 'East Greenwich', 'RI', 'neit.edu', 'netech'),
(339, 'New Jersey City University', 'Jersey City', 'NJ', 'njcu.edu', 'njcu'),
(340, 'New Jersey Institute of Technology', 'Newark', 'NJ', 'njit.edu', 'njit'),
(341, 'New Mexico State University', 'Las Cruces', 'NM', 'nmsu.edu', 'nmsu'),
(342, 'New York Institute of Art and Design', 'New York', 'NY', 'sheffield.edu', 'sheffield'),
(343, 'New York Institute of Technology', 'New York', 'NY', 'nyit.edu', 'nyit'),
(344, 'New York University', 'New York', 'NY', 'nyu.edu', 'nyu'),
(345, 'Newbury College', 'Brookline', 'MA', 'newbury.edu', 'newbury'),
(346, 'Nicholls State University', 'Thibodaux', 'LA', 'nicholls.edu', 'nicholls'),
(347, 'Norfolk State University', 'Norfolk', 'VA', 'nsu.edu', 'nsu'),
(348, 'North Carolina A & T State University', 'Greensboro', 'NC', 'ncat.edu', 'ncat'),
(349, 'North Carolina State University', 'Raleigh', 'NC', 'ncsu.edu', 'Ncstate'),
(350, 'North Carolina Wesleyan College', 'Rocky Mount', 'NC', 'ncwc.edu', 'ncwc'),
(351, 'Northeastern Illinois University', 'Chicago', 'IL', 'neiu.edu', 'neiu'),
(352, 'Northeastern State University', 'Tahlequah', 'OK', 'nsuok.edu', 'nsuok'),
(353, 'Northeastern University', 'Boston', 'MA', 'northeastern.edu', 'northeastern'),
(354, 'Northern Arizona University', 'Flagstaff', 'AZ', 'nau.edu', 'nau'),
(355, 'Northern Illinois University', 'Dekalb', 'IL', 'niu.edu', 'niu'),
(356, 'Northern Kentucky University', 'Highland Heights', 'KY', 'nku.edu', 'nku'),
(357, 'Northern Michigan University', 'Marquette', 'MI', 'nmu.edu', 'nmu'),
(358, 'Northwest Missouri State University', 'Maryville', 'MO', 'nwmissouri.edu', 'nwmissouri'),
(359, 'Northwestern Oklahoma State University', 'Alva', 'OK', 'nwosu.edu', 'nwosu'),
(360, 'Northwestern Polytechnic University', 'Fremont', 'CA', 'npu.edu', 'npu'),
(361, 'Northwestern University', 'Evanston', 'IL', 'northwestern.edu', 'northwestern'),
(362, 'Norwich University', 'Northfield', 'VT', 'norwich.edu', 'norwich'),
(363, 'Nova Southeastern University', 'Fort Lauderdale', 'FL', 'nova.edu', 'nova'),
(364, 'Oakland University', 'Rochester', 'MI', 'oakland.edu', 'oakland'),
(365, 'Occidental College', 'Los Angeles', 'CA', 'oxy.edu', 'Occidental'),
(366, 'Ohio Dominican University', 'Columbus', 'OH', 'ohiodominican.edu', 'ohiodominican'),
(367, 'Ohio Northern University', 'Ada', 'OH', 'onu.edu', 'onu'),
(368, 'Ohio State University', 'Columbus', 'OH', 'osu.edu', 'osu'),
(369, 'Ohio Wesleyan University', 'Delaware', 'OH', 'owu.edu', 'owu'),
(370, 'Oklahoma City University', 'Oklahoma City', 'OK', 'okcu.edu', 'okcu'),
(371, 'Oklahoma State University', 'Stillwater', 'OK', 'pio.okstate.edu', 'okstate'),
(372, 'Oklahoma Wesleyan University', 'Bartlesville', 'OK', 'okwu.edu', 'okwu'),
(373, 'Old Dominion University', 'Norfolk', 'VA', 'odu.edu', 'olddominion'),
(374, 'Oral Roberts University', 'Tulsa', 'OK', 'oru.edu', 'Oralroberts'),
(375, 'Oregon Institute of Technology', 'Klamath Falls', 'OR', 'oit.edu', 'oit'),
(376, 'Oxnard College', 'Oxnard', 'CA', 'oxnardcollege.edu', 'oxnardcollege'),
(377, 'Pace University', 'New York', 'NY', 'pace.edu', 'pace'),
(378, 'Pacific Islands University', 'Mangilao', 'GU', 'piu.edu', 'piu'),
(379, 'Pacific Lutheran University', 'Tacoma', 'WA', 'plu.edu', 'plu'),
(380, 'Pacific Oaks College', 'Pasadena', 'CA', 'pacificoaks.edu', 'pacificoaks'),
(381, 'Pacific University', 'Forest Grove', 'OR', 'pacificu.edu', 'pacificu'),
(382, 'Palo Alto University', 'Palo Alto', 'CA', 'paloaltou.edu', 'paloaltou'),
(383, 'Pennsylvania Institute of Technology', 'Media', 'PA', 'pit.edu', 'pit'),
(384, 'Pennsylvania State University', 'University Park', 'PA', 'psu.edu', 'psu'),
(385, 'Pepperdine University', 'Malibu', 'CA', 'pepperdine.edu', 'pepperdine'),
(386, 'Piedmont College', 'Demorest', 'GA', 'piedmont.edu', 'piedmont'),
(387, 'Pittsburg State University', 'Pittsburg', 'KS', 'pittstate.edu', 'pittstate'),
(388, 'Plymouth State University', 'Plymouth', 'NH', 'plymouth.edu', 'plymouth'),
(389, 'Polk State College', 'Winter Haven', 'FL', 'polk.edu', 'polk'),
(390, 'Polytechnic Institute of New York', 'Brooklyn', 'NY', 'poly.edu', 'poly'),
(391, 'Pomona College', 'Claremont', 'CA', 'pomona.edu', 'pomona'),
(392, 'Post University', 'Waterbury', 'CT', 'post.edu', 'post'),
(393, 'Pratt Institute', 'Brooklyn', 'NY', 'pratt.edu', 'pratt'),
(394, 'Princeton University', 'Princeton', 'NJ', 'princeton.edu', 'princeton'),
(395, 'Providence College', 'Providence', 'RI', 'providence.edu', 'providence'),
(396, 'Purdue University', 'West Lafayette', 'IN', 'purdue.edu', 'purdue'),
(397, 'Purdue University Calumet', 'Hammond', 'IN', 'calumet.purdue.edu', 'calumet.purdue'),
(398, 'Queens College', 'Queens', 'NY', 'qc.cuny.edu', 'queens'),
(399, 'Quinnipiac University', 'Hamden', 'CT', 'quinnipiac.edu', 'quinnipiac'),
(400, 'Reed College', 'Portland', 'OR', 'reed.edu', 'reed'),
(401, 'Rensselaer Polytechnic Institute', 'Troy', 'NY', 'rpi.edu', 'rpi'),
(402, 'Rhode Island College', 'Providence', 'RI', 'ric.edu', 'ric'),
(403, 'Rhode Island School of Design', 'Providence', 'RI', 'risd.edu', 'risd'),
(404, 'Rice University', 'Houston', 'TX', 'rice.edu', 'rice'),
(405, 'Rider University', 'Lawrenceville', 'NJ', 'rider.edu', 'rider'),
(406, 'Robert Morris University', 'Moon Township', 'PA', 'rmu.edu', 'rmu'),
(407, 'Robert Morris University - Illinois', 'Chicago', 'IL', 'robertmorris.edu', 'robertmorris'),
(408, 'Rochester Institute of Technology', 'Rochester', 'NY', 'rit.edu', 'rit'),
(409, 'Roger Williams University', 'Bristol', 'RI', 'rwu.edu', 'rwu'),
(410, 'Rollins College', 'Winter Park', 'FL', 'rollins.edu', 'rollins'),
(411, 'Rutgers University', 'New Brunswick', 'NJ', 'rutgers.edu', 'rutgers'),
(412, 'Sacred Heart University', 'Fairfield', 'CT', 'sacredheart.edu', 'sacredheart'),
(413, 'Saint Anselm College', 'Manchester', 'NH', 'anselm.edu', 'anselm'),
(414, 'Saint Augustine\'s University', 'Raleigh', 'NC', 'st-aug.edu', 'st-aug'),
(415, 'Saint Cloud State University', 'Saint Cloud', 'MN', 'stcloudstate.edu', 'stcloudstate'),
(416, 'Saint Francis University', 'Loretto', 'PA', 'francis.edu', 'francis'),
(417, 'Saint Johns University', 'Collegeville', 'MN', 'csbsju.edu', 'csbsju'),
(418, 'Saint Joseph\'s University', 'Philadelphia', 'PA', 'sju.edu', 'sju'),
(419, 'Saint Leo University', 'Saint Leo', 'FL', 'saintleo.edu', 'saintleo'),
(420, 'Saint Louis University', 'Saint Louis', 'MO', 'slu.edu', 'Stlouis'),
(421, 'Saint Michaels College', 'Colchester', 'VT', 'smcvt.edu', 'Stmichaels'),
(422, 'Saint Paul\'s College', 'Lawrenceville', 'VA', 'saintpauls.edu', 'saintpauls'),
(423, 'Salem State University', 'Salem', 'MA', 'salemstate.edu', 'salemstate'),
(424, 'Salve Regina University', 'Newport', 'RI', 'salve.edu', 'salve'),
(425, 'San Diego State University', 'San Diego', 'CA', 'sdsu.edu', 'sdsu'),
(426, 'San Francisco Art Institute', 'San Francisco', 'CA', 'sfai.edu', 'sfai'),
(427, 'San Francisco State University', 'San Francisco', 'CA', 'sfsu.edu', 'sfsu'),
(428, 'San Jose State University', 'San Jose', 'CA', 'sjsu.edu', 'sjsu'),
(429, 'Santa Clara University', 'Santa Clara', 'CA', 'scu.edu', 'scu'),
(430, 'Savannah College of Art and Design', 'Savannah', 'GA', 'scad.edu', 'scad'),
(431, 'Savannah State University', 'Savannah', 'GA', 'savannahstate.edu', 'savannahstate'),
(432, 'Saybrook University', 'Oakland', 'CA', 'saybrook.edu', 'saybrook'),
(433, 'Seattle Pacific University', 'Seattle', 'WA', 'spu.edu', 'spu'),
(434, 'Seattle University', 'Seattle', 'WA', 'seattleu.edu', 'seattleu'),
(435, 'Seton Hall University', 'South Orange', 'NJ', 'shu.edu', 'Setonhall'),
(436, 'Siena College', 'Loudonville', 'NY', 'siena.edu', 'siena'),
(437, 'Simmons College', 'Boston', 'MA', 'simmons.edu', 'simmons'),
(438, 'Slippery Rock University', 'Slippery Rock', 'PA', 'sru.edu', 'Slipperyrock'),
(439, 'Smith College', 'Northampton', 'MA', 'smith.edu', 'smith'),
(440, 'Sonoma State University', 'Rohnert Park', 'CA', 'sonoma.edu', 'sonoma'),
(441, 'South Carolina State University', 'Orangeburg', 'SC', 'scsu.edu', 'scsu'),
(442, 'South Dakota State University', 'Brookings', 'SD', 'sdstate.edu', 'sdstate'),
(443, 'Southern Connecticut State University', 'New Haven', 'CT', 'southernct.edu', 'southernct'),
(444, 'Southern Methodist University', 'Dallas', 'TX', 'smu.edu', 'smu'),
(445, 'Southern New Hampshire University', 'Manchester', 'NH', 'snhu.edu', 'snhu'),
(446, 'Southern Oregon University', 'Ashland', 'OR', 'sou.edu', 'sou'),
(447, 'Southern Utah University', 'Cedar City', 'UT', 'suu.edu', 'southern utah'),
(448, 'Southwestern Oklahoma State University', 'Weatherford', 'OK', 'swosu.edu', 'swosu'),
(449, 'Springfield College', 'Springfield', 'MA', 'springfieldcollege.edu', 'springfield'),
(450, 'St. Bonaventure University', 'St. Bonaventure', 'NY', 'sbu.edu', 'Stbonaventure'),
(451, 'St. Catherine University', 'St. Paul', 'MN', 'stkate.edu', 'stkate'),
(452, 'St. Edward\'s University', 'Austin', 'TX', 'stedwards.edu', 'stedwards'),
(453, 'St. Francis College', 'Brooklyn Heights', 'NY', 'sfc.edu', 'sfc'),
(454, 'St. John\'s College', 'Annapolis', 'MD', 'sjc.edu', 'sjc'),
(455, 'St. John\'s University', 'Queens', 'NY', 'stjohns.edu', 'stjohns'),
(456, 'St. Lawrence University', 'Canton', 'NY', 'stlawu.edu', 'stlawu'),
(457, 'St. Luke\'s College', 'Sioux City', 'IA', 'stlukescollege.edu', 'stlukescollege'),
(458, 'St. Petersburg College', 'Clearwater', 'FL', 'spcollege.edu', 'spcollege'),
(459, 'Stanford University', 'Stanford', 'CA', 'stanford.edu', 'stanford'),
(460, 'Stetson University', 'DeLand', 'FL', 'stetson.edu', 'stetson'),
(461, 'Stevens Institute of Technology', 'Hoboken', 'NJ', 'stevens.edu', 'stevens'),
(462, 'Stevenson University', 'Stevenson', 'MD', 'stevenson.edu', 'stevenson'),
(463, 'Stonehill College', 'Easton', 'MA', 'stonehill.edu', 'stonehill'),
(464, 'Strayer University', 'Washington', 'DC', 'strayer.edu', 'strayer'),
(465, 'Suffolk University', 'Boston', 'MA', 'suffolk.edu', 'suffolk'),
(466, 'SUNY - Albany', 'Albany', 'NY', 'albany.edu', 'albany'),
(467, 'SUNY - Binghamton', 'Binghamton', 'NY', 'binghamton.edu', 'binghamton'),
(468, 'SUNY - Buffalo', 'Buffalo', 'NY', 'buffalo.edu', 'buffalo'),
(469, 'SUNY - Fredonia', 'Fredonia', 'NY', 'fredonia.edu', 'fredonia'),
(470, 'SUNY - Buffalo State', 'Buffalo', 'NY', 'buffalostate.edu', 'buffalostate'),
(471, 'SUNY - Brockport', 'Brockport', 'NY', 'brockport.edu', 'brockport'),
(472, 'SUNY - Cortland', 'Cortland', 'NY', 'cortland.edu', 'cortland'),
(473, 'SUNY - Geneseo', 'Geneseo', 'NY', 'geneseo.edu', 'geneseo'),
(474, 'SUNY - New Paltz', 'New Paltz', 'NY', 'newpaltz.edu', 'newpaltz'),
(475, 'SUNY - Old Westbury', 'Old Westbury', 'NY', 'oldwestbury.edu', 'oldwestbury'),
(476, 'SUNY - Oswego', 'Oswego', 'NY', 'oswego.edu', 'oswego'),
(477, 'SUNY - Plattsburgh', 'Plattsburgh', 'NY', 'plattsburgh.edu', 'plattsburgh'),
(478, 'SUNY - Oneonta', 'Oneonta', 'NY', 'oneonta.edu', 'oneonta'),
(479, 'SUNY - Polytechnic Institute', 'Utica', 'NY', 'sunypoly.edu', 'sunypoly'),
(480, 'SUNY - Potsdam', 'Potsdam', 'NY', 'potsdam.edu', 'potsdam'),
(481, 'SUNY - Purchase', 'Purchase', 'NY', 'purchase.edu', 'purchase'),
(482, 'SUNY - Stony Brook', 'Stony Brook', 'NY', 'sunysb.edu', 'sunysb'),
(483, 'Syracuse University', 'Syracuse', 'NY', 'syr.edu', 'syracuse'),
(484, 'Temple University', 'Philadelphia', 'PA', 'temple.edu', 'temple'),
(485, 'Tennessee State University', 'Nashville', 'TN', 'tnstate.edu', 'tnstate'),
(486, 'Texas A&M University', 'College Station', 'TX', 'tamu.edu', 'texasa&m'),
(487, 'Texas Christian University', 'Fort Worth', 'TX', 'tcu.edu', 'tcu'),
(488, 'Texas State University', 'San Marcos', 'TX', 'txstate.edu', 'txstate'),
(489, 'Texas Tech University', 'Lubbock', 'TX', 'ttu.edu', 'Texastech'),
(490, 'The Citadel', 'Charleston', 'SC', 'citadel.edu', 'citadel'),
(491, 'The University of Alabama', 'Tuscaloosa', 'AL', 'ua.edu', 'ua'),
(492, 'The University of Tampa', 'Tampa', 'FL', 'ut.edu', 'Tampa'),
(493, 'The University of Tennessee - Chattanooga', 'Chattanooga', 'TN', 'utc.edu', 'utc'),
(494, 'The University of Tennessee - Knoxville', 'Knoxville', 'TN', 'tennessee.edu', 'tennessee'),
(495, 'The University of Tennessee - Martin', 'Martin', 'TN', 'utm.edu', 'utm'),
(496, 'The University of Texas - Arlington', 'Arlington', 'TX', 'uta.edu', 'uta'),
(497, 'The University of Texas - Dallas', 'Richardson', 'TX', 'utdallas.edu', 'utdallas'),
(498, 'The University of Texas - El Paso', 'El Paso', 'TX', 'utep.edu', 'utep'),
(499, 'The University of Texas - San Antonio', 'San Antonio', 'TX', 'utsa.edu', 'utsa'),
(500, 'Touro College', 'New York', 'NY', 'touro.edu', 'touro'),
(501, 'Towson University', 'Towson', 'MD', 'towson.edu', 'towson'),
(502, 'Transylvania University', 'Lexington', 'KY', 'transy.edu', 'transy'),
(503, 'Troy University', 'Troy', 'AL', 'troy.edu', 'troy'),
(504, 'Tufts University', 'Medford', 'MA', 'tufts.edu', 'tufts'),
(505, 'Tulane University', 'New Orleans', 'LA', 'tulane.edu', 'tulane'),
(506, 'University of Akron', 'Akron', 'OH', 'uakron.edu', 'uakron'),
(507, 'University of Alabama - Birmingham', 'Birmingham', 'AL', 'uab.edu', 'alabama'),
(508, 'University of Alabama - Huntsville', 'Huntsville', 'AL', 'uah.edu', 'Alabamabirmingham'),
(509, 'University of Alaska - Anchorage', 'Anchorage', 'AK', 'alaska.edu', 'alaska'),
(510, 'University of Arizona', 'Tucson', 'AZ', 'arizona.edu', 'arizona'),
(511, 'University of Arkansas - Fayetteville', 'Fayetteville', 'AR', 'uark.edu', 'uark'),
(512, 'University of Arkansas - Little Rock', 'Little Rock', 'AR', 'ualr.edu', 'ualr'),
(513, 'University of Arkansas - Monticello', 'Monticello', 'AR', 'uamont.edu', 'uamont'),
(514, 'University of Arkansas - Pine Bluff', 'Pine Bluff', 'AR', 'uapb.edu', 'uapb'),
(515, 'University of Arkansas - Fort Smith', 'Fort Smith', 'AR', 'uafortsmith.edu', 'uafortsmith'),
(516, 'University of Atlanta', 'Atlanta', 'GA', 'uofa.edu', 'uofa'),
(517, 'University of Baltimore', 'Baltimore', 'MD', 'ubalt.edu', 'ubalt'),
(518, 'University of Bridgeport', 'Bridgeport', 'CT', 'bridgeport.edu', 'bridgeport'),
(519, 'University of California - Davis', 'Davis', 'CA', 'ucdavis.edu', 'ucdavis'),
(520, 'University of California - Los Angeles', 'Los Angeles', 'CA', 'ucla.edu', 'ucla'),
(521, 'University of California - San Diego', 'La Jolla', 'CA', 'ucsd.edu', 'ucsandiego'),
(522, 'University of California - Berkeley', 'Berkeley', 'CA', 'berkeley.edu', 'berkeley'),
(523, 'University of California - Irvine', 'Irvine', 'CA', 'uci.edu', 'Ucirvine'),
(524, 'University of California - Riverside', 'Riverside', 'CA', 'ucr.edu', 'ucrriverside'),
(525, 'University of California - San Francisco', 'San Francisco', 'CA', 'ucsf.edu', 'ucsf'),
(526, 'University of California - Santa Barbara', 'Santa Barbara', 'CA', 'ucsb.edu', 'Ucsantabarbara'),
(527, 'University of California - Santa Cruz', 'Santa Cruz', 'CA', 'ucsc.edu', 'Ucsantacruz'),
(528, 'University of Central Arkansas', 'Conway', 'AR', 'uca.edu', 'uca'),
(529, 'University of Central Florida', 'Orlando', 'FL', 'ucf.edu', 'ucf'),
(530, 'University of Central Missouri', 'Warrensburg', 'MO', 'ucmo.edu', 'ucmo'),
(531, 'University of Central Oklahoma', 'Edmond', 'OK', 'uco.edu', 'uco'),
(532, 'University of Charleston', 'Charleston', 'WV', 'ucwv.edu', 'ucwv'),
(533, 'University of Chicago', 'Chicago', 'IL', 'uchicago.edu', 'chicago'),
(534, 'University of Cincinnati', 'Cincinnati', 'OH', 'uc.edu', 'cincinnati'),
(535, 'University of Colorado - Boulder', 'Boulder', 'CO', 'colorado.edu', 'colorado'),
(536, 'University of Colorado - Colorado Springs', 'Colorado Springs', 'CO', 'uccs.edu', 'uccs'),
(537, 'University of Colorado - Denver', 'Aurora', 'CO', 'cudenver.edu', 'cudenver'),
(538, 'University of Connecticut', 'Storrs', 'CT', 'uconn.edu', 'uconn'),
(539, 'University of Dallas', 'Irving', 'TX', 'udallas.edu', 'udallas'),
(540, 'University of Dayton', 'Dayton', 'OH', 'udayton.edu', 'udayton'),
(541, 'University of Delaware', 'Newark', 'DE', 'udel.edu', 'udel'),
(542, 'University of Denver', 'Denver', 'CO', 'du.edu', 'du'),
(543, 'University of Dubuque', 'Dubuque', 'IA', 'dbq.edu', 'dbq'),
(544, 'University of Evansville', 'Evansville', 'IN', 'evansville.edu', 'evansville'),
(545, 'University of Florida', 'Gainesville', 'FL', 'ufl.edu', 'Florida'),
(546, 'University of Fort Lauderdale', 'Lauderhill', 'FL', 'uftl.edu', 'uftl'),
(547, 'University of Georgia', 'Athens', 'GA', 'uga.edu', 'Georgia'),
(548, 'University of Hartford', 'West Hartford', 'CT', 'hartford.edu', 'hartford'),
(549, 'University of Hawaii - Manoa', 'Honolulu', 'HI', 'manoa.hawaii.edu', 'hawaii'),
(550, 'University of Houston', 'Houston', 'TX', 'uh.edu', 'Houston'),
(551, 'University of Houston - Clear Lake', 'Houston', 'TX', 'uhcl.edu', 'uhcl'),
(552, 'University of Houston - Downtown', 'Houston', 'TX', 'uhd.edu', 'uhd'),
(553, 'University of Houston - Victoria', 'Victoria', 'TX', 'uhv.edu', 'uhv'),
(554, 'University of Idaho', 'Moscow', 'ID', 'uidaho.edu', 'uidaho'),
(555, 'University of Illinois - Chicago', 'Chicago', 'IL', 'uic.edu', 'uic'),
(556, 'University of Illinois - Springfield', 'Springfield', 'IL', 'uis.edu', 'uis'),
(557, 'University of Illinois - Urbana-Champaign', 'Champaign', 'IL', 'uiuc.edu', 'uiuc'),
(558, 'University of Indianapolis', 'Indianapolis', 'IN', 'uindy.edu', 'uindy'),
(559, 'University of Iowa', 'Iowa City', 'IA', 'uiowa.edu', 'Iowa'),
(560, 'University of Kansas', 'Lawrence', 'KS', 'ku.edu', 'Kansas'),
(561, 'University of Kentucky', 'Lexington', 'KY', 'uky.edu', 'Kentucky'),
(562, 'University of Louisiana - Lafayette', 'Lafayette', 'LA', 'louisiana.edu', 'louisiana'),
(563, 'University of Louisiana - Monroe', 'Monroe', 'LA', 'ulm.edu', 'ulm'),
(564, 'University of Louisville', 'Louisville', 'KY', 'louisville.edu', 'louisville'),
(565, 'University of Maine', 'Orono', 'ME', 'umaine.edu', 'umaine'),
(566, 'University of Mary Hardin-Baylor', 'Belton', 'TX', 'umhb.edu', 'umhb'),
(567, 'University of Mary Washington', 'Fredericksburg', 'VA', 'umw.edu', 'umw'),
(568, 'University of Maryland - Baltimore', 'Baltimore', 'MD', 'umaryland.edu', 'umaryland'),
(569, 'University of Maryland - Baltimore County', 'Baltimore', 'MD', 'umbc.edu', 'umbc'),
(570, 'University of Maryland - College Park', 'College Park', 'MD', 'umd.edu', 'umd'),
(571, 'University of Maryland - Eastern Shore', 'Princess Anne', 'MD', 'umes.edu', 'umes'),
(572, 'University of Maryland - University College', 'Adelphi', 'MD', 'umuc.edu', 'umuc'),
(573, 'University of Massachusetts - Boston', 'Boston', 'MA', 'umb.edu', 'umb'),
(574, 'University of Massachusetts - Dartmouth', 'North Dartmouth', 'MA', 'umassd.edu', 'umassd'),
(575, 'University of Massachusetts - Lowell', 'Lowell', 'MA', 'uml.edu', 'uml'),
(576, 'University of Massachusetts Amherst', 'Amherst', 'MA', 'umass.edu', 'umass'),
(577, 'University of Memphis', 'Memphis', 'TN', 'memphis.edu', 'memphis'),
(578, 'University of Miami', 'Coral Gables', 'FL', 'miami.edu', 'miami'),
(579, 'University of Michigan - Ann Arbor', 'Ann Arbor', 'MI', 'umich.edu', 'umich'),
(580, 'University of Minnesota', 'Minneapolis', 'MN', 'umn.edu', 'minnesota'),
(581, 'University of Mississippi', 'University', 'MS', 'olemiss.edu', 'olemiss'),
(582, 'University of Missouri - Columbia', 'Columbia', 'MO', 'missouri.edu', 'missouri'),
(583, 'University of Missouri - Kansas City', 'Kansas City', 'MO', 'umkc.edu', 'umkc'),
(584, 'University of Missouri - St Louis', 'Saint Louis', 'MO', 'umsl.edu', 'umsl'),
(585, 'University of Mobile', 'Mobile', 'AL', 'umobile.edu', 'umobile'),
(586, 'University of Nebraska - Kearney', 'Kearney', 'NE', 'unk.edu', 'unk'),
(587, 'University of Nebraska - Lincoln', 'Lincoln', 'NE', 'unl.edu', 'unl'),
(588, 'University of Nebraska - Omaha', 'Omaha', 'NE', 'unomaha.edu', 'unomaha'),
(589, 'University of Nevada - Las Vegas', 'Las Vegas', 'NV', 'unlv.edu', 'unlv'),
(590, 'University of Nevada - Reno', 'Reno', 'NV', 'unr.edu', 'unr'),
(591, 'University of New England', 'Biddeford', 'ME', 'une.edu', 'une'),
(592, 'University of New Hampshire', 'Durham', 'NH', 'unh.edu', 'unh'),
(593, 'University of New Haven', 'West Haven', 'CT', 'newhaven.edu', 'newhaven'),
(594, 'University of New Mexico', 'Albuquerque', 'NM', 'unm.edu', 'unm'),
(595, 'University of New Orleans', 'New Orleans', 'LA', 'uno.edu', 'uno'),
(596, 'University of North Alabama', 'Florence', 'AL', 'una.edu', 'una'),
(597, 'University of North Carolina - Asheville', 'Asheville', 'NC', 'unca.edu', 'unca'),
(598, 'University of North Carolina - Chapel Hill', 'Chapel Hill', 'NC', 'unc.edu', 'unc'),
(599, 'University of North Carolina - Greensboro', 'Greensboro', 'NC', 'uncg.edu', 'uncg'),
(600, 'University of North Carolina - Pembroke', 'Pembroke', 'NC', 'uncp.edu', 'uncp'),
(601, 'University of North Carolina - Wilmington', 'Wilmington', 'NC', 'uncw.edu', 'uncw'),
(602, 'University of North Dakota', 'Grand Forks', 'ND', 'und.edu', 'und'),
(603, 'University of North Florida', 'Jacksonville', 'FL', 'unf.edu', 'unf'),
(604, 'University of North Texas', 'Denton', 'TX', 'unt.edu', 'unt'),
(605, 'University of Northern Colorado', 'Greeley', 'CO', 'unco.edu', 'unco'),
(606, 'University of Northern Iowa', 'Cedar Falls', 'IA', 'uni.edu', 'uni'),
(607, 'University of Northern Virginia', 'Manassas', 'VA', 'unva.edu', 'unva'),
(608, 'University of Northwestern - St. Paul', 'Saint Paul', 'MN', 'nwc.edu', 'nwc'),
(609, 'University of Northwestern Ohio', 'Lima', 'OH', 'unoh.edu', 'unoh'),
(610, 'University of Notre Dame', 'Notre Dame', 'IN', 'nd.edu', 'nd'),
(611, 'University of Oklahoma', 'Norman', 'OK', 'ou.edu', 'Oklahoma'),
(612, 'University of Oregon', 'Eugene', 'OR', 'uoregon.edu', 'Oregon'),
(613, 'University of Pennsylvania', 'Philadelphia', 'PA', 'upenn.edu', 'upenn'),
(614, 'University of Phoenix', 'Tempe', 'AZ', 'phoenix.edu', 'phoenix'),
(615, 'University of Pikeville', 'Pikeville', 'KY', 'pc.edu', 'pc'),
(616, 'University of Pittsburgh', 'Pittsburgh', 'PA', 'pitt.edu', 'pitt'),
(617, 'University of Portland', 'Portland', 'OR', 'up.edu', 'up'),
(618, 'University of Rhode Island', 'Kingston', 'RI', 'uri.edu', 'uri'),
(619, 'University of Richmond', 'Richmond', 'VA', 'richmond.edu', 'richmond'),
(620, 'University of Rochester', 'Rochester', 'NY', 'rochester.edu', 'rochester'),
(621, 'University of San Diego', 'San Diego', 'CA', 'sandiego.edu', 'sandiego'),
(622, 'University of San Francisco', 'San Francisco', 'CA', 'usfca.edu', 'usfca'),
(623, 'University of Scranton', 'Scranton', 'PA', 'scranton.edu', 'scranton'),
(624, 'University of Sioux Falls', 'Sioux Falls', 'SD', 'usiouxfalls.edu', 'usiouxfalls'),
(625, 'University of South Alabama', 'Mobile', 'AL', 'usouthal.edu', 'usouthal'),
(626, 'University of South Carolina - Aiken', 'Aiken', 'SC', 'usca.edu', 'usca'),
(627, 'University of South Carolina - Beaufort', 'Bluffton', 'SC', 'uscb.edu', 'uscb'),
(628, 'University of South Carolina - Columbia', 'Columbia', 'SC', 'sc.edu', 'sc'),
(629, 'University of South Dakota', 'Vermillion', 'SD', 'usd.edu', 'usd'),
(630, 'University of South Florida', 'Tampa', 'FL', 'usf.edu', 'usf'),
(631, 'University of Southern California', 'Los Angeles', 'CA', 'usc.edu', 'usc'),
(632, 'University of Southern Indiana', 'Evansville', 'IN', 'usi.edu', 'usi'),
(633, 'University of Southern Maine', 'Portland', 'ME', 'usm.maine.edu', 'southernmaine'),
(634, 'University of Southern Mississippi', 'Hattiesburg', 'MS', 'usm.edu', 'usm'),
(635, 'University of Texas - Austin', 'Austin', 'TX', 'utexas.edu', 'utexas'),
(636, 'University of Texas - Tyler', 'Tyler', 'TX', 'uttyler.edu', 'uttyler'),
(637, 'University of Toledo', 'Toledo', 'OH', 'utoledo.edu', 'utoledo'),
(638, 'University of Tulsa', 'Tulsa', 'OK', 'utulsa.edu', 'utulsa'),
(639, 'University of Utah', 'Salt Lake City', 'UT', 'utah.edu', 'utah'),
(640, 'University of Vermont', 'Burlington', 'VT', 'uvm.edu', 'uvm'),
(641, 'University of Virginia', 'Charlottesville', 'VA', 'virginia.edu', 'virginia'),
(642, 'University of Washington', 'Seattle', 'WA', 'washington.edu', 'washington'),
(643, 'University of West Alabama', 'Livingston', 'AL', 'uwa.edu', 'uwa'),
(644, 'University of West Georgia', 'Carrollton', 'GA', 'westga.edu', 'westga'),
(645, 'University of Western States', 'Portland', 'OR', 'wschiro.edu', 'wschiro'),
(646, 'University of Wisconsin - Eau Claire', 'Eau Claire', 'WI', 'uwec.edu', 'uwec'),
(647, 'University of Wisconsin - Green Bay', 'Green Bay', 'WI', 'uwgb.edu', 'uwgb'),
(648, 'University of Wisconsin - La Crosse', 'La Crosse', 'WI', 'uwlax.edu', 'uwlax'),
(649, 'University of Wisconsin - Madison', 'Madison', 'WI', 'wisc.edu', 'wisc'),
(650, 'University of Wisconsin - Oshkosh', 'Oshkosh', 'WI', 'uwosh.edu', 'uwosh');
INSERT INTO `colleges` (`college_id`, `uni_name`, `city`, `state`, `email_url`, `uni_abrev`) VALUES
(651, 'University of Wisconsin - Parkside', 'Kenosha', 'WI', 'uwp.edu', 'uwp'),
(652, 'University of Wisconsin - Platteville', 'Platteville', 'WI', 'uwplatt.edu', 'uwplatt'),
(653, 'University of Wisconsin - River Falls', 'River Falls', 'WI', 'uwrf.edu', 'uwrf'),
(654, 'University of Wisconsin - Stevens Point', 'Stevens Point', 'WI', 'uwsp.edu', 'uwsp'),
(655, 'University of Wisconsin - Stout', 'Menomonie', 'WI', 'uwstout.edu', 'uwstout'),
(656, 'University of Wisconsin - Superior', 'Superior', 'WI', 'uwsuper.edu', 'uwsuper'),
(657, 'University of Wisconsin - Whitewater', 'Whitewater', 'WI', 'uww.edu', 'uww'),
(658, 'University of Wisconsin Colleges', 'Madison', 'WI', 'uwc.edu', 'uwc'),
(659, 'University of Wyoming', 'Laramie', 'WY', 'uwyo.edu', 'uwyo'),
(660, 'Utah State University', 'Logan', 'UT', 'usu.edu', 'usu'),
(661, 'Utah Valley University', 'Orem', 'UT', 'uvu.edu', 'uvu'),
(662, 'Utica College', 'Utica', 'NY', 'utica.edu', 'utica'),
(663, 'Valparaiso University', 'Valparaiso', 'IN', 'valpo.edu', 'valpo'),
(664, 'Vanderbilt University', 'Nashville', 'TN', 'vanderbilt.edu', 'vanderbilt'),
(665, 'Vassar College', 'Poughkeepsie', 'NY', 'vassar.edu', 'vassar'),
(666, 'Villanova University', 'Villanova', 'PA', 'villanova.edu', 'villanova'),
(667, 'Virginia Commonwealth University', 'Richmond', 'VA', 'vcu.edu', 'vcu'),
(668, 'Virginia Intermont College', 'Bristol', 'VA', 'vic.edu', 'vic'),
(669, 'Virginia State University', 'Petersburg', 'VA', 'vsu.edu', 'vsu'),
(670, 'Wagner College', 'Staten Island', 'NY', 'wagner.edu', 'wagner'),
(671, 'Wake Forest University', 'Winston Salem', 'NC', 'wfu.edu', 'wfu'),
(672, 'Washington and Lee University', 'Lexington', 'VA', 'wlu.edu', 'wlu'),
(673, 'Washington State University', 'Pullman', 'WA', 'wsu.edu', 'wsu'),
(674, 'Washington University in St Louis', 'Saint Louis', 'MO', 'wustl.edu', 'wustl'),
(675, 'Wayne State University', 'Detroit', 'MI', 'wayne.edu', 'wayne'),
(676, 'Weber State University', 'Ogden', 'UT', 'weber.edu', 'weber'),
(677, 'Wellesley College', 'Wellesley', 'MA', 'wellesley.edu', 'wellesley'),
(678, 'Wentworth Institute of Technology', 'Boston', 'MA', 'wit.edu', 'wit'),
(679, 'Wesleyan College', 'Macon', 'GA', 'wesleyancollege.edu', 'wesleyancollege'),
(680, 'Wesleyan University', 'Middletown', 'CT', 'wesleyan.edu', 'wesleyan'),
(681, 'West Texas A&M University', 'Canyon', 'TX', 'wtamu.edu', 'wtamu'),
(682, 'West Virginia State University', 'Institute', 'WV', 'wvstateu.edu', 'wvstateu'),
(683, 'West Virginia University', 'Morgantown', 'WV', 'wvu.edu', 'wvu'),
(684, 'West Virginia University - Parkersburg', 'Parkersburg', 'WV', 'wvup.edu', 'wvup'),
(685, 'West Virginia Wesleyan College', 'Buckhannon', 'WV', 'wvwc.edu', 'wvwc'),
(686, 'Western Connecticut State University', 'Danbury', 'CT', 'wcsu.edu', 'wcsu'),
(687, 'Western Illinois University', 'Macomb', 'IL', 'wiu.edu', 'wiu'),
(688, 'Western Kentucky University', 'Bowling Green', 'KY', 'wku.edu', 'wku'),
(689, 'Western Michigan University', 'Kalamazoo', 'MI', 'wmich.edu', 'wmich'),
(690, 'Western New England University', 'Springfield', 'MA', 'wnec.edu', 'wnec'),
(691, 'Western New Mexico University', 'Silver City', 'NM', 'wnmu.edu', 'wnmu'),
(692, 'Western Oklahoma State College', 'Altus', 'OK', 'wosc.edu', 'wosc'),
(693, 'Western Oregon University', 'Monmouth', 'OR', 'wou.edu', 'wou'),
(694, 'Western Washington University', 'Bellingham', 'WA', 'wwu.edu', 'wwu'),
(695, 'Westfield State University', 'Westfield', 'MA', 'wsc.ma.edu', 'westfield'),
(696, 'Wheaton College', 'Wheaton', 'IL', 'wheaton.edu', 'wheaton'),
(697, 'Wichita State University', 'Wichita', 'KS', 'wichita.edu', 'wichita'),
(698, 'Williams College', 'Williamstown', 'MA', 'williams.edu', 'williams'),
(699, 'Winona State University', 'Winona', 'MN', 'winona.edu', 'winona'),
(700, 'Winthrop University', 'Rock Hill', 'SC', 'winthrop.edu', 'winthrop'),
(701, 'Worcester Polytechnic Institute', 'Worcester', 'MA', 'wpi.edu', 'wpi'),
(702, 'Worcester State University', 'Worcester', 'MA', 'worcester.edu', 'worcester'),
(703, 'Xavier University', 'Cincinnati', 'OH', 'xavier.edu', 'xavier'),
(704, 'Yale University', 'New Haven', 'CT', 'yale.edu', 'yale'),
(705, 'Youngstown State University', 'Youngstown', 'OH', 'ysu.edu', 'ysu');

-- --------------------------------------------------------

--
-- Table structure for table `college_student`
--

CREATE TABLE `college_student` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `verified` varchar(255) DEFAULT 'no',
  `dateSignedUp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `collegeId` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_student`
--

INSERT INTO `college_student` (`id`, `firstName`, `lastName`, `username`, `email`, `token`, `verified`, `dateSignedUp`, `collegeId`) VALUES
(35, 'jason', 'feliz', 'arkham', 'arkham@harvard.edu', '$2y$10$KThv2Ly1HG4/suvsfj0EPuyKbRzzGSASZuubO.m1PFzLSNMmk3aVC', 'yes', '2017-11-22 07:38:40', 227),
(36, 'mike', 'jordan', 'mikejordan', 'mj@unc.edu', '$2y$10$z6C2J3w6/M6cwCRNbIU9ZOjmFWfPGsENua24Boro9wgKtPZDxiose', 'yes', '2017-11-22 18:23:35', 598),
(37, 'Nathan', 'Miranda', 'brandnate', 'nate@harvard.edu', '$2y$10$xuezjjtws2ZraNX4c1NwouqMlA2c2zPGMuU.U7PetUuJ50sgCr5lO', 'yes', '2017-12-12 20:06:03', 227),
(38, NULL, NULL, 'Anonymous', NULL, NULL, 'yes', '2018-01-08 23:52:30', NULL),
(39, 'Reggie', 'Miller', 'rmiler294333', 'rmiller@harvard.edu', '$2y$10$l7w4i6GwVQpYDNwfxHsFseHxGl7zhG631oy86VSd3fKWenW7AH.wa', 'no', '2018-03-14 05:24:11', 227),
(40, 'Mark', 'Jackson', 'mjackson', 'mjackson@harvard.edu', '$2y$10$I1Oqx7pUjw4pnNwyHdmNCOUwxegDlXQ2eG.hZvVEEUAyCatfFVl2K', 'no', '2018-03-14 05:28:58', 227),
(41, 'Rik', 'Smit', 'rSmit', 'rsmit@harvard.edu', '$2y$10$pA/Na9UPB/mooxJGBymzreqFHFauFWldFQm4JEWiL2srCqV0APF4W', 'no', '2018-03-14 05:29:46', 227),
(42, 'Bartolo', 'Colon', 'bColon', 'bColon@harvard.edu', '$2y$10$PB1vdkVOc0aX.lcwzWM5Ce3sNxDHp4xnFNk0QfBhXSMYb3iHi9uWG', 'no', '2018-03-14 21:23:54', 227),
(43, 'Jim', 'Halper', 'jhalper', 'jhalper@harvard.edu', '$2y$10$JP0SaA8DngHpZiZlfklE0ebl25m885yHHZfCx57OXTuIZ.9NUr9OG', 'no', '2018-03-14 21:46:32', 227),
(44, 'Dwight', 'Schrute', 'schrutefarms', 'dschrute@harvard.edu', '$2y$10$OZEIhBCqdr6g2T9UQZitzOTGOQn3h9WwnZE0DVaHdkQifCl63xsT2', 'no', '2018-03-14 21:48:17', 227),
(45, 'Michael', 'Jackson', 'mjackson1', 'mj1@harvard.edu', '$2y$10$7H9gMKLO0bbrdhX8Qvs2q.pw9Q2DCi0YXF85IYydgfwxY/knU8BhC', 'no', '2018-03-19 00:54:16', 227),
(46, 'Josh', 'Hendrick', 'jhendrick', 'jh@harvard.edu', '$2y$10$7p7H7NM.dx/tVbm.RmPKeOH4Xm8S0pR3AHj8W/DpyIC3iiZOJBTpe', 'no', '2018-03-19 00:56:30', 227),
(47, 'Luis', 'Felix', 'lfeliz', 'lfelix@harvard.edu', '$2y$10$k/asIv022.uPVjHudPra6Oxa/tUOurZeAcEWum4a35shNSmHPekfW', 'no', '2018-03-25 07:05:17', 227),
(49, 'Mike', 'Jones', 'mjones', 'mjones1@harvard.edu', '$2y$10$nrE.or1bmayeTvAkOmSHS.vlgVgOFnj1pQjoSPtJuA0rV2nNeK9am', 'no', '2018-06-14 14:42:19', 227),
(51, 'Rob', 'Yu', 'robyu', 'robyu@harvard.edu', '$2y$10$veKt8.ugTkbnV/OR0ZuBrOcivicLzU4b0qFJSgkdCCQZ.f1W7caK2', 'no', '2018-06-14 14:45:25', 227),
(52, 'Mary', 'Jane', 'maryjane', 'maryjane@harvard.edu', '$2y$10$.CdC6qyDY8E55ibBSfcXde.ocugbGgPYXLSBQH5yt74Fm0tgpG0se', 'no', '2018-06-14 17:00:19', 227);

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `community_id` int(10) UNSIGNED NOT NULL,
  `college_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `creator_id` int(10) UNSIGNED DEFAULT NULL,
  `community_name` varchar(256) DEFAULT NULL,
  `community_description` varchar(2048) DEFAULT NULL,
  `community_message` varchar(512) DEFAULT NULL,
  `community_category` varchar(32) DEFAULT NULL,
  `community_type` varchar(32) DEFAULT NULL,
  `community_color` varchar(128) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`community_id`, `college_id`, `category_id`, `creator_id`, `community_name`, `community_description`, `community_message`, `community_category`, `community_type`, `community_color`, `last_update`, `date_created`) VALUES
(1, 227, 20, 35, 'Ross&#39;s Sandwich', 'This community is more than just caring about saving stolen sandwiches at work, school, or even your own apartment. It&#39;s about honoring Ross&#39;s sandwich.\r\n\r\nWe dedicate our community to you, Ross Geller.\r\n\r\nPivottttttttttt', 'Welcome to the community dedicated to honor Ross&#39; Sandwich', 'group', 'public', '#DF7367', '2018-05-18 05:10:26', '2017-12-03 15:05:59'),
(2, 227, 21, 35, '@Harvard Rants', NULL, 'The best place to anonymously rant about Harvard.', 'story', 'public', '#477bd2', NULL, '2018-01-08 18:13:32'),
(4, 227, 14, 35, 'techies @harvard!', 'Nerding out....', 'we are nerds and we will rule the world. Wait, we already do! haha', 'group', 'public', '#a1a9c1', '2018-05-21 16:09:43', '2018-02-14 02:22:24'),
(9, 227, 21, 35, 'Sex, Drugs, and Alcohol!', NULL, 'We want the best, most outrageous party stories!', 'story', 'public', '#7baf86', NULL, '2018-02-15 18:07:38'),
(10, 394, 10, 35, 'art fans @princeton', NULL, 'we love art', 'group', 'public', '#ffcc2c', NULL, '2018-02-16 19:10:36'),
(20, 262, 9, 35, 'Wildcat Venture Club', NULL, 'Learn venture capitalist techniques', 'group', 'private', '#a1a9c1', '2018-05-08 11:53:25', '2018-03-26 19:47:35'),
(22, 227, 6, 35, 'Vegan Athletes @Harvard', NULL, 'Join our community if you would like to connect with vegan athletes on campus.', 'group', 'public', '#7baf86', NULL, '2018-04-04 19:10:00'),
(23, 227, 12, 35, 'LGBTQ @Harvard', 'Harvard&#39;s home for Lesbian, Gay, Bisexual, Transgender, Queer Community! Join the movement!!!!!', 'Meet and Discuss with LGBTQ advocates @Harvard!', 'group', 'public', '#ffbdbd', '2018-05-19 06:32:21', '2018-04-13 14:51:46'),
(24, 227, 1, 39, 'miller test', NULL, 'miller test', 'group', 'private', '#DF7367', '2018-05-08 08:20:33', '2018-04-25 15:45:59'),
(25, 227, 2, 39, 'miller test 2', 'join millers test', 'miller test 2', 'group', 'private', '#5a626f', '2018-05-16 13:32:08', '2018-04-25 19:38:14'),
(27, 227, 23, 38, 'Finance', NULL, NULL, 'majors', 'public', '#5a626f', NULL, '2018-06-14 14:21:31'),
(29, 227, 23, 38, 'Anthropology', NULL, NULL, 'majors', 'public', '#5a626f', NULL, '2018-06-14 14:45:25'),
(31, 227, 23, 38, 'Mathematics', NULL, NULL, 'majors', 'public', '#5a626f', NULL, '2018-06-14 17:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `community_admins`
--

CREATE TABLE `community_admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `community_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_level` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_admins`
--

INSERT INTO `community_admins` (`admin_id`, `community_id`, `student_id`, `admin_level`, `date_added`) VALUES
(2, 1, 35, 2, '2017-12-10 13:26:50'),
(3, 9, 35, 2, '2018-02-21 20:58:37'),
(9, 20, 35, 2, '2018-03-26 19:47:35'),
(11, 22, 35, 2, '2018-04-04 19:10:00'),
(12, 23, 35, 2, '2018-04-13 14:51:46'),
(13, 24, 39, 2, '2018-04-25 15:45:59'),
(14, 25, 39, 2, '2018-04-25 19:38:14'),
(16, 29, 38, 2, '2018-06-14 14:45:25'),
(17, 31, 38, 2, '2018-06-14 17:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `community_discussions`
--

CREATE TABLE `community_discussions` (
  `c_discussion_id` int(10) UNSIGNED NOT NULL,
  `community_id` int(10) UNSIGNED DEFAULT NULL,
  `major_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `c_discussion_title` varchar(1024) DEFAULT NULL,
  `c_discussion_post` varchar(4086) NOT NULL,
  `photo` varchar(64) DEFAULT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_discussions`
--

INSERT INTO `community_discussions` (`c_discussion_id`, `community_id`, `major_id`, `student_id`, `c_discussion_title`, `c_discussion_post`, `photo`, `post_date`) VALUES
(1, 1, NULL, 35, NULL, 'Who else has had to deal with people stealing your sandswich at work? Especially the most amazing thanksgiving sandhwich....smh', NULL, '2017-12-10 08:31:02'),
(2, 1, NULL, 35, NULL, 'Hey Guys,\r\n\r\nJust had the most amazing sandwich ever get robbed from me at work. I even left a note. I got Ross&#39;ed  today. :-(', NULL, '2017-12-11 14:58:27'),
(3, NULL, 2, 35, NULL, 'Need some recommendations for Finance classes for this upcoming Spring semester???????', NULL, '2018-01-03 12:12:25'),
(4, 2, NULL, 38, 'Off-campus living.....', 'A single, tiny room with shared bath could cost $800-$900+. One woman was offering a tiny section of attic which could only be accessed through a bathroom- no fan or air conditioner, for $750!!! Many of the landlords my friends and I have dealt with are charlatans. They see students as cash cows and take advantage of them. I\'ve heard many horror stories. There should be a law against what those so-called landlords do, especially considering they don\'t report the additional income to the IRS.', NULL, '2018-01-10 11:00:56'),
(12, NULL, 2, 35, NULL, 'Is Finance hard @harvard?', NULL, '2018-02-15 13:05:34'),
(17, 9, NULL, 42, 'hold my beer.....', 'hello,\r\n\r\nhold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, \r\n\r\n\r\nhold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, \r\n\r\n\r\n\r\nhold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, hold my beer, \r\n\r\nhold my beer, \r\n\r\n\r\nhold my beer, \r\nJason', NULL, '2018-04-04 07:49:42'),
(18, 24, NULL, 35, NULL, 'Hello Miller Test!\r\n\r\nHow are you doing today?', NULL, '2018-04-25 23:27:29'),
(19, 4, NULL, 35, NULL, 'Whats up, rulers of the galaxy?!', NULL, '2018-06-07 11:32:43'),
(20, 1, NULL, 35, NULL, 'nothing...!!', NULL, '2018-06-07 12:54:00'),
(21, 25, NULL, 35, NULL, 'no wayyy', NULL, '2018-06-07 12:57:47'),
(22, 1, NULL, 35, NULL, 'oh yeaaa...', NULL, '2018-06-13 21:05:32'),
(23, 9, NULL, 35, 'yes', 'let say yes to everyting', NULL, '2018-06-14 10:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `community_discussion_vote`
--

CREATE TABLE `community_discussion_vote` (
  `c_vote_id` int(10) UNSIGNED NOT NULL,
  `c_discussion_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `vote` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_discussion_vote`
--

INSERT INTO `community_discussion_vote` (`c_vote_id`, `c_discussion_id`, `student_id`, `vote`) VALUES
(2, 2, 35, 1),
(3, 1, 35, 1),
(8, 12, 42, 1),
(10, 2, 42, 1),
(11, 1, 42, 1),
(12, 12, 44, 0),
(13, 3, 44, 1),
(14, 2, 44, 1),
(16, 1, 44, 1),
(17, 4, 35, 1),
(18, 4, 42, 1),
(20, 2, 47, 1),
(21, 17, 42, 1),
(22, 2, 39, 1),
(23, 17, 35, 1),
(24, 19, 35, 1),
(25, 20, 35, 1),
(26, 22, 35, 1),
(27, 23, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `community_members`
--

CREATE TABLE `community_members` (
  `community_member_id` int(10) UNSIGNED NOT NULL,
  `community_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_read` text,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_members`
--

INSERT INTO `community_members` (`community_member_id`, `community_id`, `student_id`, `status`, `is_read`, `date_joined`) VALUES
(3, 1, 37, 1, NULL, '2017-12-14 22:29:52'),
(12, 4, 35, 1, NULL, '2018-02-22 01:06:01'),
(15, 1, 41, 1, NULL, '2018-03-14 01:30:18'),
(18, 1, 44, 1, NULL, '2018-03-14 18:07:36'),
(20, 4, 46, 1, NULL, '2018-03-18 20:59:31'),
(21, 10, 35, 1, NULL, '2018-03-19 13:41:07'),
(70, 1, 42, 1, NULL, '2018-03-26 12:49:22'),
(72, 1, 35, 1, NULL, '2018-03-26 17:22:56'),
(76, 20, 35, 1, NULL, '2018-03-28 19:02:44'),
(81, 10, 42, 1, NULL, '2018-04-03 06:56:53'),
(82, 22, 35, 1, NULL, '2018-04-04 19:10:00'),
(87, 24, 39, 1, NULL, '2018-04-25 15:45:59'),
(89, 10, 39, 1, NULL, '2018-04-25 17:49:02'),
(90, 25, 39, 1, NULL, '2018-04-25 19:38:14'),
(93, 22, 39, 1, NULL, '2018-04-26 13:57:57'),
(94, 1, 39, 1, NULL, '2018-05-05 15:57:53'),
(99, 23, 35, 1, NULL, '2018-05-08 15:46:58'),
(100, 25, 35, 1, NULL, '2018-05-08 15:48:21'),
(101, 23, 35, 1, NULL, '2018-05-09 18:16:28'),
(102, 25, 41, 1, NULL, '2018-05-22 18:35:54'),
(103, 24, 35, 2, 'no', '2018-06-07 14:47:22'),
(105, 9, 35, 1, NULL, '2018-06-14 14:03:41'),
(106, 27, 35, 1, NULL, '2018-06-14 14:25:48'),
(111, 29, 51, 1, NULL, '2018-06-14 14:45:25'),
(112, 31, 38, 1, NULL, '2018-06-14 17:00:19'),
(113, 31, 52, 1, NULL, '2018-06-14 17:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `c_discussion_replies`
--

CREATE TABLE `c_discussion_replies` (
  `c_discussion_reply_id` int(10) UNSIGNED NOT NULL,
  `c_discussion_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `reply_post` varchar(4096) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_discussion_replies`
--

INSERT INTO `c_discussion_replies` (`c_discussion_reply_id`, `c_discussion_id`, `student_id`, `reply_post`, `post_date`) VALUES
(1, 2, 37, 'Happens to me all the time in my doorm room. Smh', '2017-12-12 10:19:01'),
(3, 3, 37, 'Definitely take Intro to Finance with Professor Sternberg', '2018-01-08 11:35:22'),
(11, 12, 35, 'very hard!', '2018-02-27 19:20:05'),
(13, 14, 35, 'hello to you!', '2018-03-13 09:39:51'),
(14, 12, 42, 'Its hard but very rewarding!', '2018-03-14 13:35:27'),
(15, 2, 39, 'hello all!', '2018-04-25 11:47:19'),
(16, 2, 35, 'hey! we&#39;re the millers', '2018-06-04 19:54:43'),
(19, 2, 35, 'yalll', '2018-06-06 21:45:11'),
(20, 19, 35, 'do we rule?!!?', '2018-06-07 11:32:53'),
(21, 20, 35, 'nada!', '2018-06-07 12:54:05'),
(22, 21, 35, 'yesss', '2018-06-07 12:57:52'),
(23, 22, 35, 'niceee', '2018-06-13 21:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `c_discussion_r_reply`
--

CREATE TABLE `c_discussion_r_reply` (
  `r_reply_id` int(10) UNSIGNED NOT NULL,
  `c_discussion_reply_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `r_reply_post` varchar(4096) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_discussion_r_reply`
--

INSERT INTO `c_discussion_r_reply` (`r_reply_id`, `c_discussion_reply_id`, `student_id`, `r_reply_post`, `post_date`) VALUES
(1, 1, 35, 'So saddddddddddd...........', '2017-12-12 11:32:14'),
(2, 1, 37, 'I know, right? I\'m officially done making sandwiches. It\'s tv dinners and mac & Cheese till I graduate.', '2017-12-12 11:54:23'),
(3, 3, 35, 'thank you very much!', '2018-02-10 23:32:24'),
(10, 11, 42, 'not that hard!', '2018-03-14 13:35:36'),
(11, 1, 39, 'I love tv dinners!', '2018-05-05 11:58:14'),
(12, 15, 35, 'hey @rmiller294333', '2018-05-30 19:42:34'),
(13, 19, 35, 'hello!', '2018-06-07 08:32:51'),
(14, 15, 35, 'hey man!', '2018-06-07 08:35:23'),
(15, 20, 35, 'of course!!!!', '2018-06-07 11:33:12'),
(16, 19, 35, 'hey!!!!!!!!', '2018-06-07 11:40:01'),
(17, 21, 35, 'really??!', '2018-06-07 12:54:12'),
(18, 22, 35, 'nooooo', '2018-06-07 12:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_post`
--

CREATE TABLE `discussion_post` (
  `d_post_id` int(10) UNSIGNED NOT NULL,
  `d_topic_id` int(10) UNSIGNED DEFAULT NULL,
  `college_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `discussion_title` varchar(1024) DEFAULT NULL,
  `discussion_post` varchar(4096) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_post`
--

INSERT INTO `discussion_post` (`d_post_id`, `d_topic_id`, `college_id`, `student_id`, `discussion_title`, `discussion_post`, `post_date`) VALUES
(9, 23, 227, 35, 'What is you major and why did you pick it?', 'Hello, \r\n\r\nI&#39;m looking for some serious feedback as to what your majors are and why did you pick it? I&#39;m a freshmen at Harvard, and I&#39;m still undecided what my major is going to be. I&#39;m leaning towards the sciences but for sure I&#39;m keeping my options open. I will consider all replies. \r\n\r\nThanks!', '2018-06-05 19:09:48'),
(15, 34, 227, 35, 'dsfsf', 'sdfsdffd', '2018-06-07 15:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_replies`
--

CREATE TABLE `discussion_replies` (
  `d_reply_id` int(10) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `reply_post` varchar(4096) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_replies`
--

INSERT INTO `discussion_replies` (`d_reply_id`, `discussion_id`, `student_id`, `reply_post`, `post_date`) VALUES
(14, 9, 37, 'Great question.\r\n\r\nI had the same issues when I was a freshmen. I&#39;m a Computer Science major. I picked CS because I have been interested in programming since middle school. It was my first love and it made sense for me. Also, I did some research about which jobs will be highest in demand, and software engineers were at the top of the list. The research helped me make my final decisions and I haven&#39;t regretted once. My advice for you would be to choose something you loved doing as a kid, whether that was video games or playing sports. Also, do some research on the subjects you&#39;re interested in. You&#39;d be surprise how many subjects could be obselete in the near future.', '2018-06-06 13:59:07'),
(15, 15, 35, 'dslknnkdklnmmewdkwn3', '2018-06-07 12:28:05'),
(16, 15, 35, 'ffgg', '2018-06-07 12:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_r_replies`
--

CREATE TABLE `discussion_r_replies` (
  `r_reply_id` int(10) UNSIGNED NOT NULL,
  `d_reply_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `r_reply_post` varchar(4096) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_r_replies`
--

INSERT INTO `discussion_r_replies` (`r_reply_id`, `d_reply_id`, `student_id`, `r_reply_post`, `post_date`) VALUES
(36, 14, 35, 'Thanks so much for your reply. Computer Science was on my list. Will def keep my options open!!', '2018-06-06 14:00:30'),
(39, 16, 35, 'awesome!!', '2018-06-07 12:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_topics`
--

CREATE TABLE `discussion_topics` (
  `discussion_topic_id` int(10) UNSIGNED NOT NULL,
  `discussion_topic` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_topics`
--

INSERT INTO `discussion_topics` (`discussion_topic_id`, `discussion_topic`) VALUES
(1, 'Gaming'),
(2, 'Politics'),
(3, 'Culture'),
(4, 'Startups'),
(5, 'Sports'),
(6, 'Health + Fitness'),
(7, 'Spirituality'),
(8, 'Anime + Comic Books'),
(9, 'Business'),
(10, 'Art'),
(11, 'Music'),
(12, 'LGTBQ'),
(13, 'Photography'),
(14, 'Science + Technology'),
(15, 'Travel'),
(16, 'General'),
(17, 'Social Issues'),
(18, 'Theatre'),
(19, 'Books'),
(20, 'Tv + Films'),
(21, 'Campus rant'),
(22, 'Financial Aid'),
(23, 'Majors'),
(24, 'Admissions'),
(25, 'Sexual Orientation'),
(26, 'Ethics'),
(27, 'Campus Life'),
(28, 'Student Debt'),
(29, 'Life after College'),
(30, 'Away from Home'),
(31, 'Prospective Students'),
(32, 'Transfer Students'),
(33, 'Graduate Students'),
(34, 'Alumni'),
(35, 'Weird Dreams'),
(36, 'Environmental Issues '),
(37, 'Futurism'),
(38, 'Mainstream Media'),
(39, 'Food '),
(40, 'Jobs'),
(41, 'Romance'),
(42, 'Peer Pressure'),
(43, 'Getting In'),
(44, 'Freshmen Life'),
(45, 'Student Debt');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_vote`
--

CREATE TABLE `discussion_vote` (
  `vote_id` int(10) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_vote`
--

INSERT INTO `discussion_vote` (`vote_id`, `discussion_id`, `student_id`, `vote`) VALUES
(23, 9, 35, 1),
(24, 9, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_newsletter`
--

CREATE TABLE `email_newsletter` (
  `sign_up_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_newsletter`
--

INSERT INTO `email_newsletter` (`sign_up_id`, `email`) VALUES
(1, 'jason@meetmycampus.com'),
(2, ''),
(3, ''),
(4, ''),
(5, 'jason@meetmycampus.com'),
(6, 'nathan@meetmycampus.com'),
(7, 'nathan@meet.com'),
(8, 'tim@tim.com'),
(9, 'q'),
(10, 'nathan.miranda1@gmail.com'),
(11, 'nvockerodt@highlanderinstitute.org'),
(12, 'kjn@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_type_id` int(10) UNSIGNED NOT NULL,
  `college_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `community_id` int(10) UNSIGNED DEFAULT NULL,
  `event_access` varchar(32) DEFAULT NULL,
  `event_title` varchar(256) DEFAULT NULL,
  `event_description` varchar(512) DEFAULT NULL,
  `event_location` varchar(256) DEFAULT NULL,
  `event_address` varchar(256) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `event_photo` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_type_id`, `college_id`, `student_id`, `community_id`, `event_access`, `event_title`, `event_description`, `event_location`, `event_address`, `event_date`, `event_time`, `event_photo`, `date_created`) VALUES
(4, 1, 227, 35, 1, 'public', 'Coffee and Study', 'Who wants to meetup for coffee and study for final exams. Leave comments below or DM me', 'Starbucks on Mass Ave.', '', '2017-12-08', '06:00:00', '', '2017-12-08 09:49:38'),
(6, 6, 227, 44, NULL, 'public', 'Wall Street movie night', 'finance junkies watching wall street movies all night', 'dorm', NULL, '2018-04-14', '13:30:00', '', '2018-03-14 18:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

CREATE TABLE `event_attendees` (
  `event_attendee_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_attendees`
--

INSERT INTO `event_attendees` (`event_attendee_id`, `event_id`, `student_id`) VALUES
(4, 4, 37),
(11, 6, 44),
(12, 4, 44),
(29, 6, 35),
(34, 4, 35),
(37, 4, 42),
(39, 4, 39),
(40, 6, 39);

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `e_comment_id` int(10) UNSIGNED NOT NULL,
  `community_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` varchar(4096) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_comments`
--

INSERT INTO `event_comments` (`e_comment_id`, `community_id`, `event_id`, `student_id`, `comment`, `post_date`) VALUES
(1, 1, 4, 35, 'This is exactly what I need :-)', '2017-12-13 12:10:22'),
(15, 1, 4, 39, 'coffeee lifeee', '2018-05-16 16:52:15'),
(16, 1, 4, 39, '', '2018-05-27 00:11:50'),
(20, 1, 4, 35, 'niceee', '2018-06-07 14:42:04'),
(21, NULL, 6, 35, 'yupp', '2018-06-07 16:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_type_id` int(10) UNSIGNED NOT NULL,
  `event_type` varchar(32) NOT NULL,
  `event_type_photo` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`event_type_id`, `event_type`, `event_type_photo`) VALUES
(1, 'communities', ''),
(2, 'recreation_sports', ''),
(3, 'academics_career', ''),
(4, 'student_life', ''),
(5, 'local_events', ''),
(6, 'meetups', '');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `c_discussion_id` int(10) UNSIGNED DEFAULT NULL,
  `community_id` int(10) UNSIGNED DEFAULT NULL,
  `discussion_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `user_id`, `c_discussion_id`, `community_id`, `discussion_id`, `event_id`) VALUES
(3, 35, NULL, 1, NULL, NULL),
(6, 35, NULL, 2, NULL, NULL),
(52, 35, 4, NULL, NULL, NULL),
(56, 35, NULL, NULL, NULL, NULL),
(67, 35, 12, NULL, NULL, NULL),
(79, 47, 2, NULL, NULL, NULL),
(80, 47, 1, NULL, NULL, NULL),
(83, 35, NULL, NULL, NULL, 4),
(84, 35, NULL, NULL, NULL, 6),
(90, 42, 4, NULL, NULL, NULL),
(93, 42, 2, NULL, NULL, NULL),
(95, 39, 2, NULL, NULL, NULL),
(96, 39, 1, NULL, NULL, NULL),
(97, 39, 4, NULL, NULL, NULL),
(98, 35, 3, NULL, NULL, NULL),
(101, 39, NULL, NULL, NULL, 6),
(102, 35, NULL, NULL, 9, NULL),
(103, 37, NULL, NULL, 9, NULL),
(104, 35, 18, NULL, NULL, NULL),
(105, 35, 19, NULL, NULL, NULL),
(106, 35, NULL, NULL, 15, NULL),
(107, 35, 20, NULL, NULL, NULL),
(108, 35, 22, NULL, NULL, NULL),
(109, 35, 23, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friend_followers`
--

CREATE TABLE `friend_followers` (
  `follower_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `friend_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_followers`
--

INSERT INTO `friend_followers` (`follower_id`, `user_id`, `friend_id`) VALUES
(3, 35, 39),
(5, 35, 40),
(6, 35, 41),
(7, 35, 42),
(8, 35, 43),
(9, 35, 44),
(10, 35, 45),
(11, 35, 46),
(12, 35, 47),
(14, 39, 43),
(16, 39, 46),
(23, 39, 37),
(24, 39, 47),
(27, 39, 41),
(30, 39, 42),
(34, 39, 39),
(35, 39, 40),
(36, 39, 35),
(45, 35, 37),
(46, 35, 35);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `interest_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`interest_id`, `category_id`, `student_id`) VALUES
(1, 14, 35),
(4, 20, 35),
(5, 7, 35),
(7, 11, 35),
(23, 9, 37),
(24, 12, 37),
(26, 9, 35),
(29, 19, 35),
(30, 21, 35),
(31, 6, 35),
(35, 22, 42),
(36, 3, 42),
(37, 3, 39),
(38, 5, 39),
(39, 7, 39),
(40, 3, 35);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` int(10) UNSIGNED NOT NULL,
  `majorList_id` int(10) UNSIGNED DEFAULT NULL,
  `college_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `majorList_id`, `college_id`) VALUES
(2, 210, 227),
(7, 1112, 227),
(9, 900, 227);

-- --------------------------------------------------------

--
-- Table structure for table `majors_list`
--

CREATE TABLE `majors_list` (
  `majorList_id` int(10) UNSIGNED NOT NULL,
  `major` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majors_list`
--

INSERT INTO `majors_list` (`majorList_id`, `major`) VALUES
(1, 'Animal Training'),
(2, 'Dog/Pet/Animal Grooming'),
(3, 'Equestrian/Equine Studies'),
(4, 'Taxidermy/Taxidermist'),
(5, 'Agricultural and Food Products Processing'),
(6, 'Agribusiness/Agricultural Business Operations'),
(7, 'Agricultural Business and Management'),
(8, 'Agricultural Business Technology'),
(9, 'Agricultural Economics'),
(10, 'Agricultural/Farm Supplies Retailing and Wholesaling'),
(11, 'Farm/Farm and Ranch Management'),
(12, 'Agricultural Mechanics and Equipment/Machine Technology'),
(13, 'Agricultural Mechanization'),
(14, 'Agricultural Power Machinery Operation'),
(15, 'Agricultural Production Operations'),
(16, 'Agroecology and Sustainable Agriculture'),
(17, 'Animal/Livestock Husbandry and Production'),
(18, 'Aquaculture'),
(19, 'Crop Production'),
(20, 'Dairy Husbandry and Production'),
(21, 'Horse Husbandry/Equine Science and Management'),
(22, 'Viticulture and Enology'),
(23, 'Agricultural and Extension Education Services'),
(24, 'Agricultural Communication/Journalism'),
(25, 'Agricultural Animal Breeding'),
(26, 'Animal Health'),
(27, 'Animal Nutrition'),
(28, 'Animal Sciences'),
(29, 'Dairy Science'),
(30, 'Livestock Management'),
(31, 'Poultry Science'),
(32, 'Applied Horticulture/Horticulture Operations'),
(33, 'Floriculture/Floristry Operations and Management'),
(34, 'Greenhouse Operations and Management'),
(35, 'Landscaping and Groundskeeping'),
(36, 'Ornamental Horticulture'),
(37, 'Plant Nursery Operations and Management'),
(38, 'Turf and Turfgrass Management'),
(39, 'Food Science'),
(40, 'Food Technology and Processing'),
(41, 'International Agriculture'),
(42, 'Agricultural and Horticultural Plant Breeding'),
(43, 'Agronomy and Crop Science'),
(44, 'Horticultural Science'),
(45, 'Plant Protection and Integrated Pest Management'),
(46, 'Plant Sciences'),
(47, 'Range Science and Management'),
(48, 'Soil Chemistry and Physics'),
(49, 'Soil Microbiology'),
(50, 'Soil Science and Agronomy'),
(51, 'Architectural History and Criticism'),
(52, 'Architectural and Building Sciences/Technology'),
(53, 'Architectural Technology/Technician'),
(54, 'Architecture'),
(55, 'City/Urban, Community and Regional Planning'),
(56, 'Environmental Design/Architecture'),
(57, 'Interior Architecture'),
(58, 'Landscape Architecture'),
(59, 'Real Estate Development'),
(60, 'African Studies'),
(61, 'American/United States Studies/Civilization'),
(62, 'Asian Studies/Civilization'),
(63, 'Balkans Studies'),
(64, 'Baltic Studies'),
(65, 'Canadian Studies'),
(66, 'Caribbean Studies'),
(67, 'Chinese Studies'),
(68, 'Commonwealth Studies'),
(69, 'East Asian Studies'),
(70, 'European Studies/Civilization'),
(71, 'French Studies'),
(72, 'German Studies'),
(73, 'Irish Studies'),
(74, 'Italian Studies'),
(75, 'Japanese Studies'),
(76, 'Korean Studies'),
(77, 'Latin American and Caribbean Studies'),
(78, 'Latin American Studies'),
(79, 'Near and Middle Eastern Studies'),
(80, 'Pacific Area/Pacific Rim Studies'),
(81, 'Polish Studies'),
(82, 'Regional Studies (US, Canadian, Foreign)'),
(83, 'Russian Studies'),
(84, 'Russian, Central European, East European and Eurasian Studies'),
(85, 'Scandinavian Studies'),
(86, 'Slavic Studies'),
(87, 'South Asian Studies'),
(88, 'Southeast Asian Studies'),
(89, 'Spanish and Iberian Studies'),
(90, 'Tibetan Studies'),
(91, 'Ukraine Studies'),
(92, 'Ural-Altaic and Central Asian Studies'),
(93, 'Western European Studies'),
(94, 'African-American/Black Studies'),
(95, 'American Indian/Native American Studies'),
(96, 'Asian-American Studies'),
(97, 'Deaf Studies'),
(98, 'Disability Studies'),
(99, 'Folklore Studies'),
(100, 'Gay/Lesbian Studies'),
(101, 'Hispanic-American, Puerto Rican, and Mexican-American/Chicano Studies'),
(102, 'Women\'s Studies'),
(103, 'Aviation / Flight Training (UND Aerospace) '),
(104, 'Biochemistry'),
(105, 'Biochemistry and Molecular Biology'),
(106, 'Biophysics'),
(107, 'Molecular Biochemistry'),
(108, 'Molecular Biology'),
(109, 'Molecular Biophysics'),
(110, 'Photobiology'),
(111, 'Radiation Biology/Radiobiology'),
(112, 'Structural Biology'),
(113, 'Biology'),
(114, 'Biology/Biological Sciences'),
(115, 'Biomedical Sciences'),
(116, 'Bioinformatics'),
(117, 'Biometry/Biometrics'),
(118, 'Biostatistics'),
(119, 'Computational Biology'),
(120, 'Biotechnology'),
(121, 'Botany/Plant Biology'),
(122, 'Plant Molecular Biology'),
(123, 'Plant Pathology/Phytopathology'),
(124, 'Plant Physiology'),
(125, 'Anatomy'),
(126, 'Cell Biology and Anatomy'),
(127, 'Cell/Cellular and Molecular Biology'),
(128, 'Cell/Cellular Biology and Histology'),
(129, 'Developmental Biology and Embryology'),
(130, 'Aquatic Biology/Limnology'),
(131, 'Conservation Biology'),
(132, 'Ecology'),
(133, 'Ecology and Evolutionary Biology'),
(134, 'Environmental Biology'),
(135, 'Epidemiology'),
(136, 'Evolutionary Biology'),
(137, 'Marine Biology and Biological Oceanography'),
(138, 'Population Biology'),
(139, 'Systematic Biology/Biological Systematics'),
(140, 'Animal Genetics'),
(141, 'Genetics'),
(142, 'Genome Sciences/Genomics'),
(143, 'Human/Medical Genetics'),
(144, 'Microbial and Eukaryotic Genetics'),
(145, 'Molecular Genetics'),
(146, 'Plant Genetics'),
(147, 'Immunology'),
(148, 'Medical Microbiology and Bacteriology'),
(149, 'Microbiology'),
(150, 'Microbiology and Immunology'),
(151, 'Mycology'),
(152, 'Parasitology'),
(153, 'Virology'),
(154, 'Molecular Medicine'),
(155, 'Neuroanatomy'),
(156, 'Neurobiology'),
(157, 'Neurobiology and Anatomy'),
(158, 'Neurobiology and Behavior'),
(159, 'Neuroscience'),
(160, 'Environmental Toxicology'),
(161, 'Molecular Pharmacology'),
(162, 'Molecular Toxicology'),
(163, 'Neuropharmacology'),
(164, 'Pharmacology'),
(165, 'Pharmacology and Toxicology'),
(166, 'Toxicology'),
(167, 'Aerospace Physiology and Medicine'),
(168, 'Cardiovascular Science'),
(169, 'Cell Physiology'),
(170, 'Endocrinology'),
(171, 'Exercise Physiology'),
(172, 'Molecular Physiology'),
(173, 'Oncology and Cancer Biology'),
(174, 'Pathology/Experimental Pathology'),
(175, 'Physiology'),
(176, 'Reproductive Biology'),
(177, 'Vision Science/Physiological Optics'),
(178, 'Animal Behavior and Ethology'),
(179, 'Animal Physiology'),
(180, 'Entomology'),
(181, 'Wildlife Biology'),
(182, 'Zoology/Animal Biology'),
(183, 'Accounting'),
(184, 'Accounting and Business/Management'),
(185, 'Accounting and Finance'),
(186, 'Accounting Technology/Technician and Bookkeeping'),
(187, 'Auditing'),
(188, 'Business Administration and Management'),
(189, 'Customer Service Management'),
(190, 'E-Commerce/Electronic Commerce'),
(191, 'Logistics, Materials, and Supply Chain Management'),
(192, 'Non-Profit/Public/Organizational Management'),
(193, 'Office Management and Supervision'),
(194, 'Operations Management and Supervision'),
(195, 'Organizational Leadership'),
(196, 'Project Management'),
(197, 'Purchasing, Procurement/Acquisitions and Contracts Management'),
(198, 'Research and Development Management'),
(199, 'Retail Management'),
(200, 'Transportation/Mobility Management'),
(201, 'Business/Commerce'),
(202, 'Business Communications'),
(203, 'Business/Managerial Economics'),
(204, 'Construction Management'),
(205, 'Entrepreneurship/Entrepreneurial Studies'),
(206, 'Franchising and Franchise Operations'),
(207, 'Small Business Administration/Management'),
(208, 'Banking and Financial Support Services'),
(209, 'Credit Management'),
(210, 'Finance'),
(211, 'Financial Planning and Services'),
(212, 'International Finance'),
(213, 'Investments and Securities'),
(214, 'Public Finance'),
(215, 'Merchandising and Buying Operations'),
(216, 'Retailing and Retail Operations'),
(217, 'Sales, Distribution, and Marketing Operations'),
(218, 'Selling Skills and Sales Operations'),
(219, 'Casino Management'),
(220, 'Hospitality Administration/Management'),
(221, 'Hotel, Motel, and Restaurant Management'),
(222, 'Hotel/Motel Administration/Management'),
(223, 'Meeting and Event Planning'),
(224, 'Resort Management'),
(225, 'Restaurant/Food Services Management'),
(226, 'Tourism and Travel Services Management'),
(227, 'Human Resources Development'),
(228, 'Human Resources Management'),
(229, 'Labor and Industrial Relations'),
(230, 'Labor Studies'),
(231, 'Organizational Behavior Studies'),
(232, 'Insurance'),
(233, 'International Business'),
(234, 'Information Resources Management'),
(235, 'Knowledge Management'),
(236, 'Management Information Systems'),
(237, 'Actuarial Science'),
(238, 'Business Statistics'),
(239, 'Management Science'),
(240, 'International Marketing'),
(241, 'Marketing Research'),
(242, 'Marketing'),
(243, 'Real Estate'),
(244, 'Apparel and Accessories Marketing Operations'),
(245, 'Auctioneering'),
(246, 'Business and Personal/Financial Services Marketing Operations'),
(247, 'Fashion Merchandising'),
(248, 'Fashion Modeling'),
(249, 'Hospitality and Recreation Marketing Operations'),
(250, 'Special Products Marketing Operations'),
(251, 'Tourism and Travel Services Marketing Operations'),
(252, 'Tourism Promotion Operations'),
(253, 'Vehicle and Vehicle Parts and Accessories Marketing Operations'),
(254, 'Taxation'),
(255, 'Telecommunications Management'),
(256, 'Communications'),
(257, 'Mass Communication/Media Studies'),
(258, 'Speech Communication and Rhetoric'),
(259, 'Broadcast Journalism'),
(260, 'Journalism'),
(261, 'Photojournalism'),
(262, 'Advertising'),
(263, 'Health Communication'),
(264, 'International and Intercultural Communication'),
(265, 'Organizational Communication'),
(266, 'Political Communication'),
(267, 'Public Relations/Image Management'),
(268, 'Sports Communication'),
(269, 'Technical and Scientific Communication'),
(270, 'Publishing'),
(271, 'Digital Communication and Media/Multimedia'),
(272, 'Radio and Television'),
(273, 'Photographic and Film/Video Technology/Technician and Assistant'),
(274, 'Radio and Television Broadcasting Technology/Technician'),
(275, 'Recording Arts Technology/Technician'),
(276, 'Communications Technology/Technician'),
(277, 'Animation, Interactive Technology, Video Graphics and Special Effects'),
(278, 'Computer Typography and Composition Equipment Operator'),
(279, 'Graphic and Printing Equipment Operator Production'),
(280, 'Graphic Communications'),
(281, 'Platemaker/Imager'),
(282, 'Prepress/Desktop Publishing and Digital Imaging Design'),
(283, 'Printing Management'),
(284, 'Printing Press Operator'),
(285, 'Artificial Intelligence'),
(286, 'Computer and Information Sciences'),
(287, 'Informatics'),
(288, 'Information Technology'),
(289, 'Computer Programming, Specific Applications'),
(290, 'Computer Programming, Vendor/Product Certification'),
(291, 'Computer Programming/Programmer'),
(292, 'Computer Science'),
(293, 'Computer Graphics'),
(294, 'Data Modeling/Warehousing and Database Administration'),
(295, 'Modeling, Virtual Environments and Simulation'),
(296, 'Web Page, Digital/Multimedia and Information Resources Design'),
(297, 'Computer Systems Analysis/Analyst'),
(298, 'Computer Systems Networking and Telecommunications'),
(299, 'Computer and Information Systems Security/Information Assurance'),
(300, 'Computer Support Specialist'),
(301, 'Information Technology Project Management'),
(302, 'Network and System Administration/Administrator'),
(303, 'System, Networking, and LAN/WAN Management/Manager'),
(304, 'Web/Multimedia Management and Webmaster'),
(305, 'Data Entry/Microcomputer Applications'),
(306, 'Word Processing'),
(307, 'Data Processing and Data Processing Technology/Technician'),
(308, 'Information Science'),
(309, 'Building Construction Technology'),
(310, 'Building/Construction Site Management/Manager'),
(311, 'Building/Home/Construction Inspection/Inspector'),
(312, 'Building/Property Maintenance'),
(313, 'Carpet, Floor, and Tile Worker'),
(314, 'Concrete Finishing/Concrete Finisher'),
(315, 'Drywall Installation/Drywaller'),
(316, 'Glazier'),
(317, 'Insulator'),
(318, 'Metal Building Assembly/Assembler'),
(319, 'Painting/Painter and Wall Coverer'),
(320, 'Roofer'),
(321, 'Carpentry/Carpenter'),
(322, 'Electrical and Power Transmission Installation/Installer'),
(323, 'Electrician'),
(324, 'Lineworker'),
(325, 'Mason/Masonry'),
(326, 'Blasting/Blaster'),
(327, 'Pipefitting/Pipefitter and Sprinkler Fitter'),
(328, 'Plumbing Technology/Plumber'),
(329, 'Well Drilling/Driller'),
(330, 'Bilingual and Multilingual Education'),
(331, 'Indian/Native American Education'),
(332, 'Multicultural Education'),
(333, 'Curriculum and Instruction'),
(334, 'Administration of Special Education'),
(335, 'Adult and Continuing Education Administration'),
(336, 'Community College Education'),
(337, 'Educational Leadership and Administration'),
(338, 'Educational, Instructional, and Curriculum Supervision'),
(339, 'Elementary and Middle School Administration/Principalship'),
(340, 'Higher Education/Higher Education Administration'),
(341, 'Secondary School Administration/Principalship'),
(342, 'Superintendency and Educational System Administration'),
(343, 'Urban Education and Leadership'),
(344, 'Educational Assessment, Testing, and Measurement'),
(345, 'Educational Evaluation and Research'),
(346, 'Educational Statistics and Research Methods'),
(347, 'Learning Sciences'),
(348, 'Educational/Instructional Technology'),
(349, 'Education'),
(350, 'International and Comparative Education'),
(351, 'Social and Philosophical Foundations of Education'),
(352, 'Education/Teaching of Individuals in Early Childhood Special Education Programs'),
(353, 'Education/Teaching of Individuals in Elementary Special Education Programs'),
(354, 'Education/Teaching of Individuals in Junior High/Middle School Special Education Programs'),
(355, 'Education/Teaching of Individuals in Secondary Special Education Programs'),
(356, 'Education/Teaching of Individuals Who are Developmentally Delayed'),
(357, 'Education/Teaching of Individuals with Autism'),
(358, 'Education/Teaching of Individuals with Emotional Disturbances'),
(359, 'Education/Teaching of Individuals with Hearing Impairments Including Deafness'),
(360, 'Education/Teaching of Individuals with Mental Retardation'),
(361, 'Education/Teaching of Individuals with Multiple Disabilities'),
(362, 'Education/Teaching of Individuals with Specific Learning Disabilities'),
(363, 'Education/Teaching of Individuals with Speech or Language Impairments'),
(364, 'Education/Teaching of Individuals with Traumatic Brain Injuries'),
(365, 'Education/Teaching of Individuals with Vision Impairments Including Blindness'),
(366, 'Education/Teaching of the Gifted and Talented'),
(367, 'Special Education and Teaching'),
(368, 'College Student Counseling and Personnel Services'),
(369, 'Counselor Education/School Counseling and Guidance Services'),
(370, 'Adult and Continuing Education and Teaching'),
(371, 'Early Childhood Education and Teaching'),
(372, 'Elementary Education and Teaching'),
(373, 'Junior High/Intermediate/Middle School Education and Teaching'),
(374, 'Kindergarten/Preschool Education and Teaching'),
(375, 'Montessori Teacher Education'),
(376, 'Secondary Education and Teaching'),
(377, 'Teacher Education, Multiple Levels'),
(378, 'Waldorf/Steiner Teacher Education'),
(379, 'Agricultural Teacher Education'),
(380, 'Art Teacher Education'),
(381, 'Biology Teacher Education'),
(382, 'Business Teacher Education'),
(383, 'Chemistry Teacher Education'),
(384, 'Computer Teacher Education'),
(385, 'Drama and Dance Teacher Education'),
(386, 'Driver and Safety Teacher Education'),
(387, 'Earth Science Teacher Education'),
(388, 'English/Language Arts Teacher Education'),
(389, 'Environmental Education'),
(390, 'Family and Consumer Sciences/Home Economics Teacher Education'),
(391, 'Foreign Language Teacher Education'),
(392, 'French Language Teacher Education'),
(393, 'Geography Teacher Education'),
(394, 'German Language Teacher Education'),
(395, 'Health Occupations Teacher Education'),
(396, 'Health Teacher Education'),
(397, 'History Teacher Education'),
(398, 'Latin Teacher Education'),
(399, 'Mathematics Teacher Education'),
(400, 'Music Teacher Education'),
(401, 'Physical Education Teaching and Coaching'),
(402, 'Physics Teacher Education'),
(403, 'Psychology '),
(404, 'Reading Teacher Education'),
(405, 'Sales and Marketing Operations/Marketing and Distribution Teacher Education'),
(406, 'School Librarian/School Library Media Specialist'),
(407, 'Science Teacher Education/General Science Teacher Education'),
(408, 'Social Science Teacher Education'),
(409, 'Social Studies Teacher Education'),
(410, 'Spanish Language Teacher Education'),
(411, 'Speech Teacher Education'),
(412, 'Technical Teacher Education'),
(413, 'Technology Teacher Education/Industrial Arts Teacher Education'),
(414, 'Trade and Industrial Teacher Education'),
(415, 'Adult Literacy Tutor/Instructor'),
(416, 'Teacher Assistant/Aide'),
(417, 'Teaching English as a Second or Foreign Language/ESL Language Instructor'),
(418, 'Teaching French as a Second or Foreign Language'),
(419, 'Architectural Engineering Technology/Technician'),
(420, 'Civil Engineering Technology/Technician'),
(421, 'Computer Engineering Technology/Technician'),
(422, 'Computer Hardware Technology/Technician'),
(423, 'Computer Software Technology/Technician'),
(424, 'Computer Technology/Computer Systems Technology'),
(425, 'Construction Engineering Technology/Technician'),
(426, 'Architectural Drafting and Architectural CAD/CADD'),
(427, 'CAD/CADD Drafting and/or Design Technology/Technician'),
(428, 'Civil Drafting and Civil Engineering CAD/CADD'),
(429, 'Drafting and Design Technology/Technician'),
(430, 'Electrical/Electronics Drafting and Electrical/Electronics CAD/CADD'),
(431, 'Mechanical Drafting and Mechanical Drafting CAD/CADD'),
(432, 'Electrical, Electronic and Communications Engineering Technology/Technician'),
(433, 'Integrated Circuit Design'),
(434, 'Laser and Optical Technology/Technician'),
(435, 'Telecommunications Technology/Technician'),
(436, 'Automation Engineer Technology/Technician'),
(437, 'Biomedical Technology/Technician'),
(438, 'Electromechanical Technology/Electromechanical Engineering Technology'),
(439, 'Instrumentation Technology/Technician'),
(440, 'Robotics Technology/Technician'),
(441, 'Engineering Design'),
(442, 'Engineering/Industrial Management'),
(443, 'Packaging Science'),
(444, 'Hydraulics and Fluid Power Technology/Technician'),
(445, 'Surveying Technology/Surveying'),
(446, 'Energy Management and Systems Technology/Technician'),
(447, 'Environmental Engineering Technology/Environmental Technology'),
(448, 'Hazardous Materials Management and Waste Technology/Technician'),
(449, 'Heating, Ventilation, Air Conditioning and Refrigeration Engineering Technology/Technician'),
(450, 'Solar Energy Technology/Technician'),
(451, 'Water Quality and Wastewater Treatment Management and Recycling Technology/Technician'),
(452, 'Chemical Engineering Technology/Technician'),
(453, 'Industrial Technology/Technician'),
(454, 'Manufacturing Engineering Technology/Technician'),
(455, 'Metallurgical Technology/Technician'),
(456, 'Plastics and Polymer Engineering Technology/Technician'),
(457, 'Semiconductor Manufacturing Technology'),
(458, 'Welding Engineering Technology/Technician'),
(459, 'Aeronautical/Aerospace Engineering Technology/Technician'),
(460, 'Automotive Engineering Technology/Technician'),
(461, 'Mechanical Engineering/Mechanical Technology/Technician'),
(462, 'Mining Technology/Technician'),
(463, 'Petroleum Technology/Technician'),
(464, 'Nanotechnology'),
(465, 'Nuclear Engineering Technology/Technician'),
(466, 'Hazardous Materials Information Systems Technology/Technician'),
(467, 'Industrial Safety Technology/Technician'),
(468, 'Occupational Safety and Health Technology/Technician'),
(469, 'Quality Control Technology/Technician'),
(470, 'Aerospace, Aeronautical and Astronautical/Space Engineering'),
(471, 'Agricultural Engineering'),
(472, 'Architectural Engineering'),
(473, 'Biochemical Engineering'),
(474, 'Biological/Biosystems Engineering'),
(475, 'Bioengineering and Biomedical Engineering'),
(476, 'Ceramic Sciences and Engineering'),
(477, 'Chemical and Biomolecular Engineering'),
(478, 'Chemical Engineering'),
(479, 'Civil Engineering'),
(480, 'Geotechnical and Geoenvironmental Engineering'),
(481, 'Structural Engineering'),
(482, 'Transportation and Highway Engineering'),
(483, 'Water Resources Engineering'),
(484, 'Computer Engineering'),
(485, 'Computer Hardware Engineering'),
(486, 'Computer Software Engineering'),
(487, 'Construction Engineering'),
(488, 'Electrical and Electronics Engineering'),
(489, 'Laser and Optical Engineering'),
(490, 'Telecommunications Engineering'),
(491, 'Electromechanical Engineering'),
(492, 'Engineering Chemistry'),
(493, 'Engineering Mechanics'),
(494, 'Engineering Physics/Applied Physics'),
(495, 'Engineering Science'),
(496, 'Engineering'),
(497, 'Pre-Engineering'),
(498, 'Environmental/Environmental Health Engineering'),
(499, 'Forest Engineering'),
(500, 'Geological/Geophysical Engineering'),
(501, 'Industrial Engineering'),
(502, 'Manufacturing Engineering'),
(503, 'Materials Engineering'),
(504, 'Mechanical Engineering'),
(505, 'Mechatronics, Robotics, and Automation Engineering'),
(506, 'Metallurgical Engineering'),
(507, 'Mining and Mineral Engineering'),
(508, 'Naval Architecture and Marine Engineering'),
(509, 'Nuclear Engineering'),
(510, 'Ocean Engineering'),
(511, 'Operations Research'),
(512, 'Paper Science and Engineering'),
(513, 'Petroleum Engineering'),
(514, 'Polymer/Plastics Engineering'),
(515, 'Surveying Engineering'),
(516, 'Systems Engineering'),
(517, 'Textile Sciences and Engineering'),
(518, 'English Language and Literature'),
(519, 'American Literature (Canadian)'),
(520, 'American Literature (United States)'),
(521, 'Children\'s and Adolescent Literature'),
(522, 'English Literature (British and Commonwealth)'),
(523, 'General Literature'),
(524, 'Creative Writing'),
(525, 'Professional, Technical, Business, and Scientific Writing'),
(526, 'Rhetoric and Composition'),
(527, 'Writing'),
(528, 'Apparel and Textile Manufacture'),
(529, 'Apparel and Textile Marketing Management'),
(530, 'Apparel and Textiles'),
(531, 'Fashion and Fabric Consultant'),
(532, 'Textile Science'),
(533, 'Consumer Economics'),
(534, 'Consumer Services and Advocacy'),
(535, 'Family Resource Management Studies'),
(536, 'Business Family and Consumer Sciences/Human Sciences'),
(537, 'Consumer Merchandising/Retailing Management'),
(538, 'Family and Consumer Sciences/Human Sciences Communication'),
(539, 'Family and Consumer Sciences/Human Sciences'),
(540, 'Foods, Nutrition, and Wellness Studies'),
(541, 'Foodservice Systems Administration/Management'),
(542, 'Human Nutrition'),
(543, 'Facilities Planning and Management'),
(544, 'Home Furnishings and Equipment Installers'),
(545, 'Housing and Human Environments'),
(546, 'Adult Development and Aging'),
(547, 'Child Care and Support Services Management'),
(548, 'Child Care Provider/Assistant'),
(549, 'Child Development'),
(550, 'Developmental Services Worker'),
(551, 'Family and Community Services'),
(552, 'Family Systems'),
(553, 'Human Development and Family Studies'),
(554, 'African Languages, Literatures, and Linguistics'),
(555, 'American Indian/Native American Languages, Literatures, and Linguistics'),
(556, 'American Sign Language (ASL)'),
(557, 'Sign Language Interpretation and Translation'),
(558, 'Celtic Languages, Literatures, and Linguistics'),
(559, 'Ancient/Classical Greek Language and Literature'),
(560, 'Latin Language and Literature'),
(561, 'Chinese Language and Literature'),
(562, 'Japanese Language and Literature'),
(563, 'Korean Language and Literature'),
(564, 'Tibetan Language and Literature'),
(565, 'Danish Language and Literature'),
(566, 'Dutch/Flemish Language and Literature'),
(567, 'German Language and Literature'),
(568, 'Norwegian Language and Literature'),
(569, 'Scandinavian Languages, Literatures, and Linguistics'),
(570, 'Swedish Language and Literature'),
(571, 'Iranian Languages, Literatures, and Linguistics'),
(572, 'Applied Linguistics'),
(573, 'Comparative Literature'),
(574, 'Foreign Languages and Literatures'),
(575, 'Language Interpretation and Translation'),
(576, 'Linguistics'),
(577, 'Ancient Near Eastern and Biblical Languages, Literatures, and Linguistics'),
(578, 'Arabic Language and Literature'),
(579, 'Hebrew Language and Literature'),
(580, 'Modern Greek Language and Literature'),
(581, 'Catalan Language and Literature'),
(582, 'French Language and Literature'),
(583, 'Hispanic and Latin American Languages, Literatures, and Linguistics'),
(584, 'Italian Language and Literature'),
(585, 'Portuguese Language and Literature'),
(586, 'Romanian Language and Literature'),
(587, 'Spanish Language and Literature'),
(588, 'Albanian Language and Literature'),
(589, 'Baltic Languages, Literatures, and Linguistics'),
(590, 'Bosnian, Serbian, and Croatian Languages and Literatures'),
(591, 'Bulgarian Language and Literature'),
(592, 'Czech Language and Literature'),
(593, 'Polish Language and Literature'),
(594, 'Russian Language and Literature'),
(595, 'Slovak Language and Literature'),
(596, 'Ukrainian Language and Literature'),
(597, 'Bengali Language and Literature'),
(598, 'Hindi Language and Literature'),
(599, 'Punjabi Language and Literature'),
(600, 'Sanskrit and Classical Indian Languages, Literatures, and Linguistics'),
(601, 'Tamil Language and Literature'),
(602, 'Urdu Language and Literature'),
(603, 'Australian/Oceanic/Pacific Languages, Literatures, and Linguistics'),
(604, 'Burmese Language and Literature'),
(605, 'Filipino/Tagalog Language and Literature'),
(606, 'Indonesian/Malay Languages and Literatures'),
(607, 'Khmer/Cambodian Language and Literature'),
(608, 'Lao Language and Literature'),
(609, 'Thai Language and Literature'),
(610, 'Vietnamese Language and Literature'),
(611, 'Hungarian/Magyar Language and Literature'),
(612, 'Mongolian Language and Literature'),
(613, 'Turkish Language and Literature'),
(614, 'Uralic Languages, Literatures, and Linguistics'),
(615, 'Health and Wellness'),
(616, 'Advanced General Dentistry'),
(617, 'Dental Clinical Sciences'),
(618, 'Dental Materials'),
(619, 'Dental Public Health and Education'),
(620, 'Endodontics/Endodontology'),
(621, 'Oral Biology and Oral and Maxillofacial Pathology'),
(622, 'Oral/Maxillofacial Surgery'),
(623, 'Orthodontics/Orthodontology'),
(624, 'Pediatric Dentistry/Pedodontics'),
(625, 'Periodontics/Periodontology'),
(626, 'Prosthodontics/Prosthodontology'),
(627, 'Anesthesiologist Assistant'),
(628, 'Chiropractic Assistant/Technician'),
(629, 'Clinical/Medical Laboratory Assistant'),
(630, 'Emergency Care Attendant (EMT Ambulance)'),
(631, 'Lactation Consultant'),
(632, 'Medical/Clinical Assistant'),
(633, 'Occupational Therapist Assistant'),
(634, 'Pathology/Pathologist Assistant'),
(635, 'Pharmacy Technician/Assistant'),
(636, 'Physical Therapy Technician/Assistant'),
(637, 'Radiologist Assistant'),
(638, 'Respiratory Therapy Technician/Assistant'),
(639, 'Speech-Language Pathology Assistant'),
(640, 'Veterinary/Animal Health Technology/Technician and Veterinary Assistant'),
(641, 'Athletic Training/Trainer'),
(642, 'Cardiopulmonary Technology/Technologist'),
(643, 'Cardiovascular Technology/Technologist'),
(644, 'Diagnostic Medical Sonography/Sonographer and Ultrasound Technician'),
(645, 'Electrocardiograph Technology/Technician'),
(646, 'Electroneurodiagnostic/Electroencephalographic Technology/Technologist'),
(647, 'Emergency Medical Technology/Technician (EMT Paramedic)'),
(648, 'Gene/Genetic Therapy'),
(649, 'Hearing Instrument Specialist'),
(650, 'Magnetic Resonance Imaging (MRI) Technology/Technician'),
(651, 'Mammography Technician/Technology'),
(652, 'Medical Radiologic Technology/Science - Radiation Therapist'),
(653, 'Nuclear Medical Technology/Technologist'),
(654, 'Perfusion Technology/Perfusionist'),
(655, 'Physician Assistant'),
(656, 'Polysomnography'),
(657, 'Radiation Protection/Health Physics Technician'),
(658, 'Radiologic Technology/Science - Radiographer'),
(659, 'Respiratory Care Therapy/Therapist'),
(660, 'Surgical Technology/Technologist'),
(661, 'Direct Entry Midwifery'),
(662, 'Acupuncture and Oriental Medicine'),
(663, 'Ayurvedic Medicine/Ayurveda'),
(664, 'Holistic Health'),
(665, 'Homeopathic Medicine/Homeopathy'),
(666, 'Naturopathic Medicine/Naturopathy'),
(667, 'Traditional Chinese Medicine and Chinese Herbology'),
(668, 'Bioethics/Medical Ethics'),
(669, 'Chiropractic'),
(670, 'Blood Bank Technology Specialist'),
(671, 'Clinical Laboratory Science/Medical Technology/Technologist'),
(672, 'Clinical/Medical Laboratory Technician'),
(673, 'Cytogenetics/Genetics/Clinical Genetics Technology/Technologist'),
(674, 'Cytotechnology/Cytotechnologist'),
(675, 'Hematology Technology/Technician'),
(676, 'Histologic Technician'),
(677, 'Histologic Technology/Histotechnologist'),
(678, 'Ophthalmic Laboratory Technology/Technician'),
(679, 'Phlebotomy Technician/Phlebotomist'),
(680, 'Renal/Dialysis Technologist/Technician'),
(681, 'Sterile Processing Technology/Technician'),
(682, 'Audiology/Audiologist'),
(683, 'Audiology/Audiologist and Speech-Language Pathology/Pathologist'),
(684, 'Communication Sciences and Disorders'),
(685, 'Speech-Language Pathology/Pathologist'),
(686, 'Dental Assisting/Assistant'),
(687, 'Dental Hygiene/Hygienist'),
(688, 'Dental Laboratory Technology/Technician'),
(689, 'Dentistry'),
(690, 'Clinical Nutrition/Nutritionist'),
(691, 'Dietetic Technician'),
(692, 'Dietetics/Dietitian'),
(693, 'Dietitian Assistant'),
(694, 'Aromatherapy'),
(695, 'Herbalism/Herbalist'),
(696, 'Polarity Therapy'),
(697, 'Reiki'),
(698, 'Health Aide'),
(699, 'Home Health Aide/Home Attendant'),
(700, 'Medication Aide'),
(701, 'Rehabilitation Aide'),
(702, 'Clinical Research Coordinator'),
(703, 'Health Information/Medical Records Administration/Administrator'),
(704, 'Health Information/Medical Records Technology/Technician'),
(705, 'Health Unit Coordinator/Ward Clerk'),
(706, 'Health Unit Manager/Ward Supervisor'),
(707, 'Health/Health Care Administration/Management'),
(708, 'Health/Medical Claims Examiner'),
(709, 'Hospital and Health Care Facilities Administration/Management'),
(710, 'Long Term Care Administration/Management'),
(711, 'Medical Administrative/Executive Assistant and Medical Secretary'),
(712, 'Medical Insurance Coding Specialist/Coder'),
(713, 'Medical Insurance Specialist/Medical Biller'),
(714, 'Medical Office Assistant/Specialist'),
(715, 'Medical Office Computer Specialist/Assistant'),
(716, 'Medical Office Management/Administration'),
(717, 'Medical Reception/Receptionist'),
(718, 'Medical Staff Services Technology/Technician'),
(719, 'Medical Transcription/Transcriptionist'),
(720, 'Medical/Health Management and Clinical Assistant/Specialist'),
(721, 'Pre-Chiropractic Studies'),
(722, 'Pre-Dentistry Studies'),
(723, 'Pre-Medicine/Pre-Medical Studies'),
(724, 'Pre-Nursing Studies'),
(725, 'Pre-Occupational Therapy Studies'),
(726, 'Pre-Optometry Studies'),
(727, 'Pre-Pharmacy Studies'),
(728, 'Pre-Physical Therapy Studies'),
(729, 'Pre-Veterinary Studies'),
(730, 'Medical Scientist'),
(731, 'Medical Illustration/Medical Illustrator'),
(732, 'Medical Informatics'),
(733, 'Medicine'),
(734, 'Clinical Pastoral Counseling/Patient Counseling'),
(735, 'Clinical/Medical Social Work'),
(736, 'Community Health Services/Liaison/Counseling'),
(737, 'Genetic Counseling/Counselor'),
(738, 'Marriage and Family Therapy/Counseling'),
(739, 'Mental Health Counseling/Counselor'),
(740, 'Psychiatric/Mental Health Services Technician'),
(741, 'Substance Abuse/Addiction Counseling'),
(742, 'Movement Therapy and Movement Education'),
(743, 'Yoga Teacher Training/Yoga Therapy'),
(744, 'Ophthalmic Technician/Technologist'),
(745, 'Opticianry/Ophthalmic Dispensing Optician'),
(746, 'Optometric Technician/Assistant'),
(747, 'Orthoptics/Orthoptist'),
(748, 'Optometry'),
(749, 'Osteopathic Medicine/Osteopathy'),
(750, 'Clinical and Industrial Drug Development'),
(751, 'Clinical, Hospital, and Managed Care Pharmacy'),
(752, 'Industrial and Physical Pharmacy and Cosmetic Sciences'),
(753, 'Medicinal and Pharmaceutical Chemistry'),
(754, 'Natural Products Chemistry and Pharmacognosy'),
(755, 'Pharmaceutical Marketing and Management'),
(756, 'Pharmaceutical Sciences'),
(757, 'Pharmaceutics and Drug Design'),
(758, 'Pharmacoeconomics/Pharmaceutical Economics'),
(759, 'Pharmacy'),
(760, 'Pharmacy Administration and Pharmacy Policy and Regulatory Affairs'),
(761, 'Podiatric Medicine/Podiatry'),
(762, 'Licensed Practical/Vocational Nurse Training'),
(763, 'Nursing Assistant/Aide and Patient Care Assistant/Aide'),
(764, 'Behavioral Aspects of Health'),
(765, 'Community Health and Preventive Medicine'),
(766, 'Environmental Health'),
(767, 'Health Services Administration'),
(768, 'Health/Medical Physics'),
(769, 'International Public Health/International Health'),
(770, 'Maternal and Child Health'),
(771, 'Occupational Health and Industrial Hygiene'),
(772, 'Public Health'),
(773, 'Public Health Education and Promotion'),
(774, 'Adult Health Nurse/Nursing'),
(775, 'Clinical Nurse Leader'),
(776, 'Clinical Nurse Specialist'),
(777, 'Critical Care Nursing'),
(778, 'Emergency Room/Trauma Nursing'),
(779, 'Family Practice Nurse/Nursing'),
(780, 'Geriatric Nurse/Nursing'),
(781, 'Maternal/Child Health and Neonatal Nurse/Nursing'),
(782, 'Nurse Anesthetist'),
(783, 'Nurse Midwife/Nursing Midwifery'),
(784, 'Nursing Administration'),
(785, 'Nursing Education'),
(786, 'Nursing Practice'),
(787, 'Nursing Science'),
(788, 'Occupational and Environmental Health Nursing'),
(789, 'Palliative Care Nursing'),
(790, 'Pediatric Nurse/Nursing'),
(791, 'Perioperative/Operating Room and Surgical Nurse/Nursing'),
(792, 'Psychiatric/Mental Health Nurse/Nursing'),
(793, 'Public Health/Community Nurse/Nursing'),
(794, 'Registered Nursing/Registered Nurse'),
(795, 'Women\'s Health Nurse/Nursing'),
(796, 'Animal-Assisted Therapy'),
(797, 'Art Therapy/Therapist'),
(798, 'Assistive/Augmentative Technology and Rehabilitation Engineering'),
(799, 'Dance Therapy/Therapist'),
(800, 'Music Therapy/Therapist'),
(801, 'Occupational Therapy/Therapist'),
(802, 'Orthotist/Prosthetist'),
(803, 'Physical Therapy/Therapist'),
(804, 'Rehabilitation Science'),
(805, 'Therapeutic Recreation/Recreational Therapy'),
(806, 'Vocational Rehabilitation Counseling/Counselor'),
(807, 'Asian Bodywork Therapy'),
(808, 'Massage Therapy/Therapeutic Massage'),
(809, 'Somatic Bodywork'),
(810, 'Comparative and Laboratory Animal Medicine'),
(811, 'Large Animal/Food Animal and Equine Surgery and Medicine'),
(812, 'Small/Companion Animal Surgery and Medicine'),
(813, 'Veterinary Anatomy'),
(814, 'Veterinary Infectious Diseases'),
(815, 'Veterinary Microbiology and Immunobiology'),
(816, 'Veterinary Pathology and Pathobiology'),
(817, 'Veterinary Physiology'),
(818, 'Veterinary Preventive Medicine, Epidemiology, and Public Health'),
(819, 'Veterinary Sciences/Veterinary Clinical Sciences'),
(820, 'Veterinary Toxicology and Pharmacology'),
(821, 'Veterinary Medicine'),
(822, 'American History (United States)'),
(823, 'Asian History'),
(824, 'Canadian History'),
(825, 'European History'),
(826, 'History'),
(827, 'History and Philosophy of Science and Technology'),
(828, 'Military History'),
(829, 'Public/Applied History'),
(830, 'Corrections'),
(831, 'Corrections Administration'),
(832, 'Criminal Justice/Law Enforcement Administration'),
(833, 'Criminal Justice/Police Science'),
(834, 'Criminal Justice/Safety Studies'),
(835, 'Criminalistics and Criminal Science'),
(836, 'Critical Incident Response/Special Police Operations'),
(837, 'Cultural/Archaelogical Resources Protection'),
(838, 'Cyber/Computer Forensics and Counterterrorism'),
(839, 'Financial Forensics and Fraud Investigation'),
(840, 'Forensic Science and Technology'),
(841, 'Juvenile Corrections'),
(842, 'Law Enforcement Intelligence Analysis'),
(843, 'Law Enforcement Investigation and Interviewing'),
(844, 'Law Enforcement Record-Keeping and Evidence Management'),
(845, 'Maritime Law Enforcement'),
(846, 'Protective Services Operations'),
(847, 'Securities Services Administration/Management'),
(848, 'Security and Loss Prevention Services'),
(849, 'Suspension and Debarment Investigation'),
(850, 'Fire Prevention and Safety Technology/Technician'),
(851, 'Fire Science/Fire-fighting'),
(852, 'Fire Services Administration'),
(853, 'Fire Systems Technology'),
(854, 'Fire/Arson Investigation and Prevention'),
(855, 'Wildland/Forest Firefighting and Investigation'),
(856, 'Crisis/Emergency/Disaster Management'),
(857, 'Critical Infrastructure Protection'),
(858, 'Homeland Security'),
(859, 'Terrorism and Counterterrorism Operations'),
(860, 'Community Organization and Advocacy'),
(861, 'Public Administration'),
(862, 'Education Policy Analysis'),
(863, 'Health Policy Analysis'),
(864, 'International Policy Analysis'),
(865, 'Public Policy Analysis'),
(866, 'Social Work'),
(867, 'Youth Services/Administration'),
(868, 'Pre-Law Studies'),
(869, 'Law'),
(870, 'Advanced Legal Research/Studies'),
(871, 'American/US Law/Legal Studies/Jurisprudence'),
(872, 'Banking, Corporate, Finance, and Securities Law'),
(873, 'Canadian Law/Legal Studies/Jurisprudence'),
(874, 'Comparative Law'),
(875, 'Energy, Environment, and Natural Resources Law'),
(876, 'Health Law'),
(877, 'Intellectual Property Law'),
(878, 'International Business, Trade, and Tax Law'),
(879, 'International Law and Legal Studies'),
(880, 'Programs for Foreign Lawyers'),
(881, 'Tax Law/Taxation'),
(882, 'Court Reporting/Court Reporter'),
(883, 'Legal Administrative Assistant/Secretary'),
(884, 'Legal Assistant/Paralegal'),
(885, 'General Studies'),
(886, 'Humanities/Humanistic Studies'),
(887, 'Liberal Arts and Sciences/Liberal Studies'),
(888, 'Library and Archives Assisting'),
(889, 'Archives/Archival Administration'),
(890, 'Children and Youth Library Services'),
(891, 'Library and Information Science'),
(892, 'Applied Mathematics'),
(893, 'Computational and Applied Mathematics'),
(894, 'Computational Mathematics'),
(895, 'Financial Mathematics'),
(896, 'Mathematical Biology'),
(897, 'Algebra and Number Theory'),
(898, 'Analysis and Functional Analysis'),
(899, 'Geometry/Geometric Analysis'),
(900, 'Mathematics'),
(901, 'Topology and Foundations'),
(902, 'Mathematical Statistics and Probability'),
(903, 'Mathematics and Statistics'),
(904, 'Statistics'),
(905, 'Appliance Installation and Repair Technology/Technician'),
(906, 'Business Machine Repair'),
(907, 'Communications Systems Installation and Repair Technology'),
(908, 'Computer Installation and Repair Technology/Technician'),
(909, 'Electrical/Electronics Equipment Installation and Repair'),
(910, 'Industrial Electronics Technology/Technician'),
(911, 'Security System Installation, Repair, and Inspection Technology/Technician'),
(912, 'Heating, Air Conditioning, Ventilation and Refrigeration Maintenance Technology/Technician'),
(913, 'Heavy Equipment Maintenance Technology/Technician'),
(914, 'Industrial Mechanics and Maintenance Technology'),
(915, 'Gunsmithing/Gunsmith'),
(916, 'Locksmithing and Safe Repair'),
(917, 'Musical Instrument Fabrication and Repair'),
(918, 'Parts and Warehousing Operations and Maintenance Technology/Technician'),
(919, 'Watchmaking and Jewelrymaking'),
(920, 'Aircraft Powerplant Technology/Technician'),
(921, 'Airframe Mechanics and Aircraft Maintenance Technology/Technician'),
(922, 'Alternative Fuel Vehicle Technology/Technician'),
(923, 'Autobody/Collision and Repair Technology/Technician'),
(924, 'Automobile/Automotive Mechanics Technology/Technician'),
(925, 'Avionics Maintenance Technology/Technician'),
(926, 'Bicycle Mechanics and Repair Technology/Technician'),
(927, 'Diesel Mechanics Technology/Technician'),
(928, 'Engine Machinist'),
(929, 'High Performance and Custom Engine Technician/Mechanic'),
(930, 'Marine Maintenance/Fitter and Ship Repair Technology/Technician'),
(931, 'Medium/Heavy Vehicle and Truck Technology/Technician'),
(932, 'Motorcycle Maintenance and Repair Technology/Technician'),
(933, 'Recreation Vehicle (RV) Service Technician'),
(934, 'Small Engine Mechanics and Repair Technology/Technician'),
(935, 'Vehicle Emissions Inspection and Maintenance Technology/Technician'),
(936, 'Command & Control (C3, C4I) Systems and Operations'),
(937, 'Cyber/Electronic Operations and Warfare'),
(938, 'Information Operations/Joint Information Operations'),
(939, 'Information/Psychological Warfare and Military Media Relations'),
(940, 'Intelligence'),
(941, 'Signal/Geospatial Intelligence'),
(942, 'Strategic Intelligence'),
(943, 'Combat Systems Engineering'),
(944, 'Directed Energy Systems'),
(945, 'Engineering Acoustics'),
(946, 'Low-Observables and Stealth Technology'),
(947, 'Operational Oceanography'),
(948, 'Space Systems Operations'),
(949, 'Undersea Warfare'),
(950, 'Aerospace Ground Equipment Technology'),
(951, 'Air and Space Operations Technology'),
(952, 'Aircraft Armament Systems Technology'),
(953, 'Explosive Ordinance/Bomb Disposal'),
(954, 'Joint Command/Task Force (C3, C4I) Systems'),
(955, 'Military Information Systems Technology'),
(956, 'Missile and Space Systems Technology'),
(957, 'Munitions Systems/Ordinance Technology'),
(958, 'Radar Communications and Systems Technology'),
(959, 'Accounting and Computer Science'),
(960, 'Behavioral Sciences'),
(961, 'Biological and Physical Sciences'),
(962, 'Biopsychology'),
(963, 'Ancient Studies/Civilization'),
(964, 'Classical, Ancient Mediterranean and Near Eastern Studies and Archaeology'),
(965, 'Cognitive Science'),
(966, 'Computational Science'),
(967, 'Cultural Studies/Critical Theory and Analysis'),
(968, 'Dispute Resolution'),
(969, 'Gerontology'),
(970, 'Cultural Resource Management and Policy Analysis'),
(971, 'Historic Preservation and Conservation'),
(972, 'Holocaust and Related Studies'),
(973, 'Human Biology'),
(974, 'Human Computer Interaction'),
(975, 'Intercultural/Multicultural and Diversity Studies'),
(976, 'International/Global Studies'),
(977, 'Marine Sciences'),
(978, 'Maritime Studies'),
(979, 'Mathematics and Computer Science'),
(980, 'Medieval and Renaissance Studies'),
(981, 'Museology/Museum Studies'),
(982, 'Natural Sciences'),
(983, 'Nutrition Sciences'),
(984, 'Peace Studies and Conflict Resolution'),
(985, 'Science, Technology and Society'),
(986, 'Sustainability Studies'),
(987, 'Systems Science and Theory'),
(988, 'Fishing and Fisheries Sciences and Management'),
(989, 'Forest Management/Forest Resources Management'),
(990, 'Forest Resources Production and Management'),
(991, 'Forest Sciences and Biology'),
(992, 'Forest Technology/Technician'),
(993, 'Forestry'),
(994, 'Urban Forestry'),
(995, 'Wood Science and Wood Products/Pulp and Paper Technology'),
(996, 'Environmental Science'),
(997, 'Environmental Studies'),
(998, 'Natural Resources/Conservation'),
(999, 'Land Use Planning and Management/Development'),
(1000, 'Natural Resource Economics'),
(1001, 'Natural Resource Recreation and Tourism'),
(1002, 'Natural Resources Law Enforcement and Protective Services'),
(1003, 'Natural Resources Management and Policy'),
(1004, 'Water, Wetlands, and Marine Resources Management'),
(1005, 'Wildlife, Fish and Wildlands Science and Management'),
(1006, 'Health and Physical Education/Fitness'),
(1007, 'Kinesiology and Exercise Science'),
(1008, 'Physical Fitness Technician'),
(1009, 'Sport and Fitness Administration/Management'),
(1010, 'Sports Studies'),
(1011, 'Outdoor Education'),
(1012, 'Golf Course Operation and Grounds Management'),
(1013, 'Parks, Recreation and Leisure Facilities Management'),
(1014, 'Parks, Recreation and Leisure Studies'),
(1015, 'Baking and Pastry Arts/Baker/Pastry Chef'),
(1016, 'Bartending/Bartender'),
(1017, 'Culinary Arts/Chef Training'),
(1018, 'Culinary Science/Culinology'),
(1019, 'Food Preparation/Professional Cooking/Kitchen Assistant'),
(1020, 'Food Service, Waiter/Waitress, and Dining Room Management/Manager'),
(1021, 'Institutional Food Workers'),
(1022, 'Meat Cutting/Meat Cutter'),
(1023, 'Restaurant, Culinary, and Catering Management/Manager'),
(1024, 'Wine Steward/Sommelier'),
(1025, 'Aesthetician/Esthetician and Skin Care Specialist'),
(1026, 'Barbering/Barber'),
(1027, 'Cosmetology, Barber/Styling, and Nail Instructor'),
(1028, 'Cosmetology/Cosmetologist'),
(1029, 'Electrolysis/Electrology and Electrolysis Technician'),
(1030, 'Facial Treatment Specialist/Facialist'),
(1031, 'Hair Styling/Stylist and Hair Design'),
(1032, 'Make-Up Artist/Specialist'),
(1033, 'Master Aesthetician/Esthetician'),
(1034, 'Nail Technician/Specialist and Manicurist'),
(1035, 'Permanent Cosmetics/Makeup and Tattooing'),
(1036, 'Salon/Beauty Salon Management/Manager'),
(1037, 'Funeral Direction/Service'),
(1038, 'Funeral Service and Mortuary Science'),
(1039, 'Mortuary Science and Embalming/Embalmer'),
(1040, 'Philosophy and Religious Studies'),
(1041, 'Applied and Professional Ethics'),
(1042, 'Ethics'),
(1043, 'Logic'),
(1044, 'Philosophy'),
(1045, 'Buddhist Studies'),
(1046, 'Christian Studies'),
(1047, 'Hindu Studies'),
(1048, 'Islamic Studies'),
(1049, 'Jewish/Judaic Studies'),
(1050, 'Religion/Religious Studies'),
(1051, 'Astronomy'),
(1052, 'Astrophysics'),
(1053, 'Planetary Astronomy and Science'),
(1054, 'Atmospheric Chemistry and Climatology'),
(1055, 'Atmospheric Physics and Dynamics'),
(1056, 'Atmospheric Sciences and Meteorology'),
(1057, 'Meteorology'),
(1058, 'Analytical Chemistry'),
(1059, 'Chemical Physics'),
(1060, 'Chemistry'),
(1061, 'Environmental Chemistry'),
(1062, 'Forensic Chemistry'),
(1063, 'Inorganic Chemistry'),
(1064, 'Organic Chemistry'),
(1065, 'Physical Chemistry'),
(1066, 'Polymer Chemistry'),
(1067, 'Theoretical Chemistry'),
(1068, 'Geochemistry'),
(1069, 'Geochemistry and Petrology'),
(1070, 'Geology/Earth Science'),
(1071, 'Geophysics and Seismology'),
(1072, 'Hydrology and Water Resources Science'),
(1073, 'Oceanography, Chemical and Physical'),
(1074, 'Paleontology'),
(1075, 'Materials Chemistry'),
(1076, 'Materials Science'),
(1077, 'Physical Sciences'),
(1078, 'Acoustics'),
(1079, 'Atomic/Molecular Physics'),
(1080, 'Condensed Matter and Materials Physics'),
(1081, 'Elementary Particle Physics'),
(1082, 'Nuclear Physics'),
(1083, 'Optics/Optical Sciences'),
(1084, 'Physics'),
(1085, 'Plasma and High-Temperature Physics'),
(1086, 'Theoretical and Mathematical Physics'),
(1087, 'Boilermaking/Boilermaker'),
(1088, 'Shoe, Boot and Leather Repair'),
(1089, 'Upholstery/Upholsterer'),
(1090, 'Computer Numerically Controlled (CNC) Machinist Technology/CNC Machinist'),
(1091, 'Ironworking/Ironworker'),
(1092, 'Machine Shop Technology/Assistant'),
(1093, 'Machine Tool Technology/Machinist'),
(1094, 'Metal Fabricator'),
(1095, 'Sheet Metal Technology/Sheetworking'),
(1096, 'Tool and Die Technology/Technician'),
(1097, 'Welding Technology/Welder'),
(1098, 'Cabinetmaking and Millwork'),
(1099, 'Furniture Design and Manufacturing'),
(1100, 'Woodworking'),
(1101, 'Psychology'),
(1102, 'Cognitive Psychology and Psycholinguistics'),
(1103, 'Comparative Psychology'),
(1104, 'Developmental and Child Psychology'),
(1105, 'Experimental Psychology'),
(1106, 'Personality Psychology'),
(1107, 'Physiological Psychology/Psychobiology'),
(1108, 'Psychometrics and Quantitative Psychology'),
(1109, 'Psychopharmacology'),
(1110, 'Social Psychology'),
(1111, 'Chemical Technology/Technician'),
(1112, 'Anthropology'),
(1113, 'Cultural Anthropology'),
(1114, 'Medical Anthropology'),
(1115, 'Physical and Biological Anthropology'),
(1116, 'Archeology'),
(1117, 'Criminology'),
(1118, 'Demography and Population Studies'),
(1119, 'Applied Economics'),
(1120, 'Development Economics and International Development'),
(1121, 'Econometrics and Quantitative Economics'),
(1122, 'Economics'),
(1123, 'International Economics'),
(1124, 'Geographic Information Science and Cartography'),
(1125, 'Geography'),
(1126, 'International Relations and Affairs'),
(1127, 'National Security Policy Studies'),
(1128, 'American Government and Politics (United States)'),
(1129, 'Canadian Government and Politics'),
(1130, 'Political Economy'),
(1131, 'Political Science and Government'),
(1132, 'Rural Sociology'),
(1133, 'Research Methodology and Quantitative Methods'),
(1134, 'Social Sciences'),
(1135, 'Sociology and Anthropology'),
(1136, 'Sociology'),
(1137, 'Urban Studies/Affairs'),
(1138, 'Bible/Biblical Studies'),
(1139, 'Missions/Missionary Studies and Missiology'),
(1140, 'Lay Ministry'),
(1141, 'Pastoral Studies/Counseling'),
(1142, 'Urban Ministry'),
(1143, 'Women\'s Ministry'),
(1144, 'Youth Ministry'),
(1145, 'Religious Education'),
(1146, 'Religious/Sacred Music'),
(1147, 'Divinity/Ministry'),
(1148, 'Pre-Theology/Pre-Ministerial Studies'),
(1149, 'Rabbinical Studies'),
(1150, 'Talmudic Studies'),
(1151, 'Theology/Theological Studies'),
(1152, 'Aeronautics/Aviation/Aerospace Science and Technology'),
(1153, 'Air Traffic Controller'),
(1154, 'Airline Flight Attendant'),
(1155, 'Airline/Commercial/Professional Pilot and Flight Crew'),
(1156, 'Aviation/Airway Management and Operations'),
(1157, 'Flight Instructor'),
(1158, 'Construction/Heavy Equipment/Earthmoving Equipment Operation'),
(1159, 'Flagging and Traffic Control'),
(1160, 'Mobil Crane Operation/Operator'),
(1161, 'Railroad and Railway Transportation'),
(1162, 'Truck and Bus Driver/Commercial Vehicle Operator and Instructor'),
(1163, 'Commercial Fishing'),
(1164, 'Diver, Professional and Instructor'),
(1165, 'Marine Science/Merchant Marine Officer'),
(1166, 'Arts, Entertainment,and Media Management'),
(1167, 'Fine and Studio Arts Management'),
(1168, 'Music Management'),
(1169, 'Theatre/Theatre Arts Management'),
(1170, 'Crafts/Craft Design, Folk Art and Artisanry'),
(1171, 'Ballet'),
(1172, 'Dance'),
(1173, 'Commercial and Advertising Art'),
(1174, 'Commercial Photography'),
(1175, 'Design and Visual Communications'),
(1176, 'Fashion/Apparel Design'),
(1177, 'Game and Interactive Media Design'),
(1178, 'Graphic Design'),
(1179, 'Illustration'),
(1180, 'Industrial and Product Design'),
(1181, 'Interior Design'),
(1182, 'Acting'),
(1183, 'Costume Design'),
(1184, 'Directing and Theatrical Production'),
(1185, 'Drama and Dramatics/Theatre Arts'),
(1186, 'Musical Theatre'),
(1187, 'Playwriting and Screenwriting'),
(1188, 'Technical Theatre/Theatre Design and Technology'),
(1189, 'Theatre Literature, History and Criticism'),
(1190, 'Cinematography and Film/Video Production'),
(1191, 'Documentary Production'),
(1192, 'Film/Cinema/Video Studies'),
(1193, 'Photography'),
(1194, 'Art History, Criticism and Conservation'),
(1195, 'Art/Art Studies'),
(1196, 'Ceramic Arts and Ceramics'),
(1197, 'Drawing'),
(1198, 'Fiber, Textile and Weaving Arts'),
(1199, 'Fine/Studio Arts'),
(1200, 'Intermedia/Multimedia'),
(1201, 'Metal and Jewelry Arts'),
(1202, 'Painting'),
(1203, 'Printmaking'),
(1204, 'Sculpture'),
(1205, 'Brass Instruments'),
(1206, 'Conducting'),
(1207, 'Jazz/Jazz Studies'),
(1208, 'Keyboard Instruments'),
(1209, 'Music'),
(1210, 'Music History, Literature, and Theory'),
(1211, 'Music Pedagogy'),
(1212, 'Music Performance'),
(1213, 'Music Technology'),
(1214, 'Music Theory and Composition'),
(1215, 'Musicology and Ethnomusicology'),
(1216, 'Percussion Instruments'),
(1217, 'Stringed Instruments'),
(1218, 'Voice and Opera'),
(1219, 'Woodwind Instruments'),
(1220, 'Digital Arts'),
(1221, 'Visual and Performing Arts'),
(1222, 'Undeclared'),
(1223, 'Aeronautical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_to` varchar(64) NOT NULL,
  `user_from` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_about_me`
--

CREATE TABLE `profile_about_me` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `major_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `about` varchar(512) DEFAULT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `grad_year` year(4) DEFAULT NULL,
  `question_1` varchar(512) DEFAULT NULL,
  `question_2` varchar(128) DEFAULT NULL,
  `question_3` varchar(1028) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_about_me`
--

INSERT INTO `profile_about_me` (`profile_id`, `major_id`, `student_id`, `about`, `gender`, `location`, `grad_year`, `question_1`, `question_2`, `question_3`) VALUES
(2, 210, 35, 'Avid fan of the New England Patriots, Lover of all things coffee...', 'Male', 'Cranston,RI', 2014, 'Harvad was the best choice I\'ve ever made. Extremely competitive and intellectually challenging', 'Investment Theory and Applications', 'It was an easy decision once I got accepted.'),
(3, 242, 37, 'I love driving my range rover all over Cranston...', 'Male', 'Cranston, RI', 2018, NULL, NULL, NULL),
(4, 210, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 292, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 210, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 210, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 210, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 210, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 242, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 242, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 832, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 292, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1112, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 900, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report_content`
--

CREATE TABLE `report_content` (
  `report_content_id` int(10) UNSIGNED NOT NULL,
  `content_type` text NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_content`
--

INSERT INTO `report_content` (`report_content_id`, `content_type`, `content_id`) VALUES
(1, 'review', 5),
(2, 'review', 5),
(3, 'post', 1),
(4, 'post_reply_comment', 31),
(5, 'post', 8),
(6, 'event_comment', 16);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(10) UNSIGNED DEFAULT NULL,
  `reset_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(10) UNSIGNED NOT NULL,
  `college_id` int(10) UNSIGNED NOT NULL,
  `review_category_id` int(10) UNSIGNED NOT NULL,
  `review_rating_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `review_description` varchar(4096) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `college_id`, `review_category_id`, `review_rating_id`, `student_id`, `review_description`, `date_created`) VALUES
(1, 227, 1, 2, 35, 'I\'m so glad I chose Harvard over Yale when I was a young naive 17 year old. The overall experience fulfilled my the high standards I held Harvard to. I recommend any smart students serious about their college education to apply here. Professors here challenge your intelligence and push you beyond boundaries most young students set themselves.', '2017-12-08 15:41:57'),
(2, 227, 1, 1, 35, 'harvard is great!', '2018-02-14 16:46:13'),
(3, 227, 3, 2, 35, 'it was good', '2018-02-15 01:00:18'),
(5, 227, 2, 1, 41, 'Great food on and off campus!', '2018-03-13 21:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `reviews_categories`
--

CREATE TABLE `reviews_categories` (
  `review_category_id` int(10) UNSIGNED NOT NULL,
  `review_category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews_categories`
--

INSERT INTO `reviews_categories` (`review_category_id`, `review_category`) VALUES
(1, 'Overall Experience'),
(2, 'Food Scene'),
(3, 'Party Life'),
(4, 'Workload'),
(5, 'Professors'),
(6, 'Greek Life'),
(7, 'Dorm Life'),
(8, 'City Life'),
(9, 'Admissions'),
(10, 'Social Life'),
(11, 'Diversity'),
(12, 'Financial Aid'),
(13, 'Sorority Life'),
(14, 'Frat Life');

-- --------------------------------------------------------

--
-- Table structure for table `review_ratings`
--

CREATE TABLE `review_ratings` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `rating` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_ratings`
--

INSERT INTO `review_ratings` (`rating_id`, `rating`) VALUES
(1, 'Awesome'),
(2, 'Very Good'),
(3, 'Eh, Average'),
(4, 'Kinda Bad'),
(5, 'Horrible');

-- --------------------------------------------------------

--
-- Table structure for table `school_followers`
--

CREATE TABLE `school_followers` (
  `school_follower_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `college_id` int(10) UNSIGNED NOT NULL,
  `date_followed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_followers`
--

INSERT INTO `school_followers` (`school_follower_id`, `user_id`, `college_id`, `date_followed`) VALUES
(1, 35, 227, '2018-01-17 17:56:18'),
(2, 37, 227, '2018-01-17 17:56:18'),
(17, 35, 704, '2018-02-21 00:48:09'),
(18, 35, 402, '2018-02-22 22:31:44'),
(19, 35, 262, '2018-02-27 22:16:48'),
(21, 35, 394, '2018-03-02 13:31:47'),
(23, 47, 262, '2018-03-24 23:09:07'),
(25, 35, 466, '2018-03-29 21:45:30'),
(27, 39, 227, '2018-04-25 11:26:17'),
(28, 39, 227, '2018-04-25 11:48:06'),
(29, 39, 227, '2018-04-25 11:53:03'),
(30, 39, 227, '2018-04-25 11:53:46'),
(31, 39, 227, '2018-04-25 12:00:24'),
(32, 39, 227, '2018-04-25 13:15:21'),
(33, 39, 394, '2018-04-25 13:49:37'),
(34, 39, 227, '2018-04-26 14:20:09'),
(35, 39, 227, '2018-05-05 11:58:58'),
(36, 35, 221, '2018-05-30 20:13:55'),
(38, 49, 227, '2018-06-14 10:42:19'),
(39, 51, 227, '2018-06-14 10:45:25'),
(40, 52, 227, '2018-06-14 13:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) DEFAULT NULL,
  `verification_code` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `verification_code`) VALUES
(4, 935555),
(5, 596865),
(6, 830715),
(7, 384367),
(8, 971366),
(9, 224419),
(10, 776488),
(11, 377260),
(12, 820777),
(13, 329473);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `college_student`
--
ALTER TABLE `college_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collegestudent_ibfk_2` (`collegeId`);

--
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`community_id`),
  ADD UNIQUE KEY `community_name` (`community_name`),
  ADD KEY `communities_ibfk_2` (`category_id`),
  ADD KEY `communities_ibfk_4` (`creator_id`),
  ADD KEY `communities_ibfk_1` (`college_id`);

--
-- Indexes for table `community_admins`
--
ALTER TABLE `community_admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `community_admins_ibfk_1` (`community_id`),
  ADD KEY `community_admins_ibfk_2` (`student_id`);

--
-- Indexes for table `community_discussions`
--
ALTER TABLE `community_discussions`
  ADD PRIMARY KEY (`c_discussion_id`),
  ADD KEY `community_discussions_ibfk_1` (`community_id`),
  ADD KEY `community_discussions_ibfk_2` (`student_id`),
  ADD KEY `community_discussions_ibfk_3` (`major_id`);

--
-- Indexes for table `community_discussion_vote`
--
ALTER TABLE `community_discussion_vote`
  ADD PRIMARY KEY (`c_vote_id`),
  ADD KEY `community_discussion_vote_ibfk_1` (`c_discussion_id`),
  ADD KEY `community_discussion_vote_ibfk_2` (`student_id`);

--
-- Indexes for table `community_members`
--
ALTER TABLE `community_members`
  ADD PRIMARY KEY (`community_member_id`),
  ADD KEY `community_members_ibfk_1` (`community_id`),
  ADD KEY `community_members_ibfk_2` (`student_id`);

--
-- Indexes for table `c_discussion_replies`
--
ALTER TABLE `c_discussion_replies`
  ADD PRIMARY KEY (`c_discussion_reply_id`),
  ADD KEY `c_discussion_replies_ibfk_4` (`student_id`),
  ADD KEY `c_discussion_id` (`c_discussion_id`);

--
-- Indexes for table `c_discussion_r_reply`
--
ALTER TABLE `c_discussion_r_reply`
  ADD PRIMARY KEY (`r_reply_id`),
  ADD KEY `c_discussion_r_reply_ibfk_5` (`student_id`),
  ADD KEY `c_discussion_reply_id` (`c_discussion_reply_id`);

--
-- Indexes for table `discussion_post`
--
ALTER TABLE `discussion_post`
  ADD PRIMARY KEY (`d_post_id`),
  ADD KEY `discussion_post_ibfk_2` (`student_id`),
  ADD KEY `discussion_post_ibfk_4` (`d_topic_id`),
  ADD KEY `discussion_post_ibfk_3` (`college_id`);

--
-- Indexes for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
  ADD PRIMARY KEY (`d_reply_id`),
  ADD KEY `discussion_replies_ibfk_5` (`discussion_id`),
  ADD KEY `discussion_replies_ibfk_6` (`student_id`);

--
-- Indexes for table `discussion_r_replies`
--
ALTER TABLE `discussion_r_replies`
  ADD PRIMARY KEY (`r_reply_id`),
  ADD KEY `discussion_r_replies_ibfk_6` (`d_reply_id`),
  ADD KEY `discussion_r_replies_ibfk_9` (`student_id`);

--
-- Indexes for table `discussion_topics`
--
ALTER TABLE `discussion_topics`
  ADD PRIMARY KEY (`discussion_topic_id`);

--
-- Indexes for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `discussion_vote_ibfk_1` (`discussion_id`),
  ADD KEY `discussion_vote_ibfk_2` (`student_id`);

--
-- Indexes for table `email_newsletter`
--
ALTER TABLE `email_newsletter`
  ADD PRIMARY KEY (`sign_up_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `events_ibfk_1` (`event_type_id`),
  ADD KEY `events_ibfk_3` (`student_id`),
  ADD KEY `events_ibfk_4` (`community_id`),
  ADD KEY `events_ibfk_2` (`college_id`);

--
-- Indexes for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD PRIMARY KEY (`event_attendee_id`),
  ADD KEY `event_attendees_ibfk_1` (`event_id`),
  ADD KEY `event_attendees_ibfk_2` (`student_id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`e_comment_id`),
  ADD KEY `event_comments_ibfk_2` (`community_id`),
  ADD KEY `event_comments_ibfk_3` (`student_id`),
  ADD KEY `event_comments_ibfk_4` (`event_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `favorites_ibfk_1` (`user_id`),
  ADD KEY `favorites_ibfk_2` (`c_discussion_id`),
  ADD KEY `favorites_ibfk_3` (`community_id`),
  ADD KEY `favorites_ibfk_4` (`discussion_id`),
  ADD KEY `favorites_ibfk_5` (`event_id`);

--
-- Indexes for table `friend_followers`
--
ALTER TABLE `friend_followers`
  ADD PRIMARY KEY (`follower_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interest_id`),
  ADD KEY `category_id` (`category_id`) USING BTREE,
  ADD KEY `interests_ibfk_2` (`student_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`),
  ADD KEY `majors_ibfk_3` (`majorList_id`),
  ADD KEY `majors_ibfk_1` (`college_id`);

--
-- Indexes for table `majors_list`
--
ALTER TABLE `majors_list`
  ADD PRIMARY KEY (`majorList_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `profile_about_me`
--
ALTER TABLE `profile_about_me`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_about_me_ibfk_1` (`student_id`),
  ADD KEY `profile_about_me_ibfk_2` (`major_id`);

--
-- Indexes for table `report_content`
--
ALTER TABLE `report_content`
  ADD PRIMARY KEY (`report_content_id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD KEY `id` (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviews_ibfk_10` (`review_rating_id`),
  ADD KEY `reviews_ibfk_11` (`student_id`),
  ADD KEY `reviews_ibfk_9` (`review_category_id`),
  ADD KEY `reviews_ibfk_8` (`college_id`);

--
-- Indexes for table `reviews_categories`
--
ALTER TABLE `reviews_categories`
  ADD PRIMARY KEY (`review_category_id`);

--
-- Indexes for table `review_ratings`
--
ALTER TABLE `review_ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `school_followers`
--
ALTER TABLE `school_followers`
  ADD PRIMARY KEY (`school_follower_id`),
  ADD KEY `school_followers_ibfk_1` (`user_id`),
  ADD KEY `school_followers_ibfk_3` (`college_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;
--
-- AUTO_INCREMENT for table `college_student`
--
ALTER TABLE `college_student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `communities`
--
ALTER TABLE `communities`
  MODIFY `community_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `community_admins`
--
ALTER TABLE `community_admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `community_discussions`
--
ALTER TABLE `community_discussions`
  MODIFY `c_discussion_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `community_discussion_vote`
--
ALTER TABLE `community_discussion_vote`
  MODIFY `c_vote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `community_members`
--
ALTER TABLE `community_members`
  MODIFY `community_member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `c_discussion_replies`
--
ALTER TABLE `c_discussion_replies`
  MODIFY `c_discussion_reply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `c_discussion_r_reply`
--
ALTER TABLE `c_discussion_r_reply`
  MODIFY `r_reply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `discussion_post`
--
ALTER TABLE `discussion_post`
  MODIFY `d_post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
  MODIFY `d_reply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `discussion_r_replies`
--
ALTER TABLE `discussion_r_replies`
  MODIFY `r_reply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `discussion_topics`
--
ALTER TABLE `discussion_topics`
  MODIFY `discussion_topic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  MODIFY `vote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `email_newsletter`
--
ALTER TABLE `email_newsletter`
  MODIFY `sign_up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `event_attendees`
--
ALTER TABLE `event_attendees`
  MODIFY `event_attendee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `e_comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `friend_followers`
--
ALTER TABLE `friend_followers`
  MODIFY `follower_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `interest_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `major_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `majors_list`
--
ALTER TABLE `majors_list`
  MODIFY `majorList_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1224;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_about_me`
--
ALTER TABLE `profile_about_me`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `report_content`
--
ALTER TABLE `report_content`
  MODIFY `report_content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reviews_categories`
--
ALTER TABLE `reviews_categories`
  MODIFY `review_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `review_ratings`
--
ALTER TABLE `review_ratings`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `school_followers`
--
ALTER TABLE `school_followers`
  MODIFY `school_follower_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `college_student`
--
ALTER TABLE `college_student`
  ADD CONSTRAINT `collegestudent_ibfk_2` FOREIGN KEY (`collegeId`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `communities`
--
ALTER TABLE `communities`
  ADD CONSTRAINT `communities_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `communities_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `communities_ibfk_4` FOREIGN KEY (`creator_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `community_admins`
--
ALTER TABLE `community_admins`
  ADD CONSTRAINT `community_admins_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `community_admins_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `community_discussions`
--
ALTER TABLE `community_discussions`
  ADD CONSTRAINT `community_discussions_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `community_discussions_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `community_discussions_ibfk_3` FOREIGN KEY (`major_id`) REFERENCES `majors` (`major_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `community_discussion_vote`
--
ALTER TABLE `community_discussion_vote`
  ADD CONSTRAINT `community_discussion_vote_ibfk_1` FOREIGN KEY (`c_discussion_id`) REFERENCES `community_discussions` (`c_discussion_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `community_discussion_vote_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `community_members`
--
ALTER TABLE `community_members`
  ADD CONSTRAINT `community_members_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `community_members_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_discussion_replies`
--
ALTER TABLE `c_discussion_replies`
  ADD CONSTRAINT `c_discussion_replies_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `c_discussion_replies_ibfk_6` FOREIGN KEY (`c_discussion_id`) REFERENCES `community_discussions` (`c_discussion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_discussion_r_reply`
--
ALTER TABLE `c_discussion_r_reply`
  ADD CONSTRAINT `c_discussion_r_reply_ibfk_1` FOREIGN KEY (`c_discussion_reply_id`) REFERENCES `c_discussion_replies` (`c_discussion_reply_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion_post`
--
ALTER TABLE `discussion_post`
  ADD CONSTRAINT `discussion_post_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_post_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_post_ibfk_4` FOREIGN KEY (`d_topic_id`) REFERENCES `discussion_topics` (`discussion_topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion_replies`
--
ALTER TABLE `discussion_replies`
  ADD CONSTRAINT `discussion_replies_ibfk_5` FOREIGN KEY (`discussion_id`) REFERENCES `discussion_post` (`d_post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_replies_ibfk_6` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion_r_replies`
--
ALTER TABLE `discussion_r_replies`
  ADD CONSTRAINT `discussion_r_replies_ibfk_1` FOREIGN KEY (`d_reply_id`) REFERENCES `discussion_replies` (`d_reply_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_r_replies_ibfk_3` FOREIGN KEY (`d_reply_id`) REFERENCES `discussion_replies` (`d_reply_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_r_replies_ibfk_6` FOREIGN KEY (`d_reply_id`) REFERENCES `discussion_replies` (`d_reply_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_r_replies_ibfk_9` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion_vote`
--
ALTER TABLE `discussion_vote`
  ADD CONSTRAINT `discussion_vote_ibfk_1` FOREIGN KEY (`discussion_id`) REFERENCES `discussion_post` (`d_post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_vote_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_4` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD CONSTRAINT `event_attendees_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_attendees_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD CONSTRAINT `event_comments_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_comments_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_comments_ibfk_4` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`c_discussion_id`) REFERENCES `community_discussions` (`c_discussion_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_3` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_4` FOREIGN KEY (`discussion_id`) REFERENCES `discussion_post` (`d_post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_5` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_followers`
--
ALTER TABLE `friend_followers`
  ADD CONSTRAINT `friend_followers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `college_student` (`id`),
  ADD CONSTRAINT `friend_followers_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `college_student` (`id`);

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interests_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `majors`
--
ALTER TABLE `majors`
  ADD CONSTRAINT `majors_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `majors_ibfk_3` FOREIGN KEY (`majorList_id`) REFERENCES `majors_list` (`majorList_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_about_me`
--
ALTER TABLE `profile_about_me`
  ADD CONSTRAINT `profile_about_me_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_about_me_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `majors_list` (`majorList_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD CONSTRAINT `reset_password_ibfk_1` FOREIGN KEY (`id`) REFERENCES `college_student` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_10` FOREIGN KEY (`review_rating_id`) REFERENCES `review_ratings` (`rating_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_11` FOREIGN KEY (`student_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`review_category_id`) REFERENCES `reviews_categories` (`review_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_4` FOREIGN KEY (`review_category_id`) REFERENCES `reviews_categories` (`review_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_5` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_6` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_7` FOREIGN KEY (`review_category_id`) REFERENCES `reviews_categories` (`review_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_8` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_9` FOREIGN KEY (`review_category_id`) REFERENCES `reviews_categories` (`review_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school_followers`
--
ALTER TABLE `school_followers`
  ADD CONSTRAINT `school_followers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `college_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_followers_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_followers_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
