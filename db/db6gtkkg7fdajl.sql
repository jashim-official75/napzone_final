-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2023 at 10:59 AM
-- Server version: 5.7.39-42-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db6gtkkg7fdajl`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(14, 'puzzle', '2022-01-13 01:59:01', '2022-01-13 01:59:01'),
(15, 'hyper casual', '2022-01-13 01:59:19', '2022-01-13 01:59:19'),
(16, 'platformer', '2022-01-13 01:59:28', '2022-01-13 01:59:28'),
(17, 'arcade', '2022-01-13 01:59:37', '2022-01-13 01:59:37'),
(18, 'shooting', '2022-01-13 01:59:46', '2022-01-13 01:59:46'),
(19, 'educational', '2022-01-13 02:00:07', '2022-01-13 02:00:07'),
(20, 'board', '2022-01-13 02:00:16', '2022-01-13 02:00:16'),
(21, 'multiplayer', '2022-01-13 02:00:25', '2022-01-13 02:00:25'),
(22, 'sports', '2022-01-13 02:00:32', '2022-01-13 02:00:32'),
(23, 'racing', '2022-01-13 02:00:38', '2022-01-13 02:00:38'),
(24, 'action', '2022-01-24 01:27:47', '2022-01-24 01:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_games`
--

CREATE TABLE `favorite_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorite_games`
--

INSERT INTO `favorite_games` (`id`, `subscriber_id`, `game_id`, `created_at`, `updated_at`) VALUES
(2, 6, 28, '2023-10-30 12:09:32', '2023-10-30 12:09:32'),
(3, 6, 21, '2023-10-30 12:09:40', '2023-10-30 12:09:40'),
(4, 6, 18, '2023-10-30 12:09:47', '2023-10-30 12:09:47'),
(5, 6, 5, '2023-10-30 12:09:54', '2023-10-30 12:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keyword` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `is_free` int(11) NOT NULL DEFAULT '1',
  `is_exclusive` int(11) NOT NULL DEFAULT '1',
  `total_play` bigint(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `game_thumbnail`, `game_file`, `zip`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `is_free`, `is_exclusive`, `total_play`, `created_at`, `updated_at`) VALUES
(1, 'Blow Out', 'Uploads/Game/Thumbnail/1698497622-blow-out-arcade-game.webp', 'blow-out', 'AllGames/blow-out', 'Blow Out is the classic arcade game where you test your skills! With its simple gameplay and addictive action, Blow Out is the perfect game for everyone.', 'Experience the Thrill of the Arcade with Our Blow Out Game', 'blow out arcade game, arcade game, online arcade game, classic arcade game, skill game, chance game, fun game, addictive game, easy to play, stunning graphics', 'It\'s time to cut out the bombs which are set for you! Don\'t waste time! Cause they\'ll blow you out if you don\'t cut them out! So hurry! The bombs are on fire! Blow Out Bomb Blast Ninja is an addictive game. You have to cut out the bombs which are set for you! Don\'t waste time, or they\'ll blow you out if you don\'t do it fast enough! The countdown has begun, and there\'s no turning back, so hurry up before it all blows over in a blaze of glory!!', 0, 0, 14, '2023-10-28 18:53:42', '2023-10-28 19:56:45'),
(2, 'Bunge Jungle', 'Uploads/Game/Thumbnail/1698498136-bunge-jungle-endless-platformer.webp', 'bunge-jungle', 'AllGames/bunge-jungle', 'Jump from platform to platform, avoid obstacles, and defeat enemies as you make your way.', 'Bunge Jungle: Endless Platformer Game', 'platformer game, action game, endless runner, jungle game, bunge jumping game\r\njumping game, obstacle course game, enemy combat, challenging game, addictive, game, fun game', 'Bored of all the games you played? Are you tired of tapping with your fingers? Then stop playing these orthodox games. Bunge Jungle is here for you to keep you off from the stress of tapping because the only job for you is to tilt your device! Crazy game mechanics are here for you to try!\r\nYou are jumping! Not by tapping with your fingers! The only task for you is to tilt your device the way you want to jump. Avoid the barricades because if you jump on them, it’s game over for you, sadly! Jump along, and gain some points! \r\nSo what are you waiting for now? Let yourself loose because the time has come for you to download the best jumping game there is now on the market!', 0, 1, 0, '2023-10-28 19:02:16', '2023-10-30 00:46:33'),
(3, 'Car Nabbing', 'Uploads/Game/Thumbnail/1698498945-car-nabbing (1).webp', 'car-nabbing', 'AllGames/car-nabbing', 'Car Nabbing is the perfect game for anyone who loves challenges. Nab cars in one click and see how high you can score.', 'Car Nabbing: Nab Cars in One Click and Have Fun!', 'car nabbing game, one click game, car game, challenge game, fast-paced, game, fun game, nab cars, test your skills, ultimate car nabber', 'Car Nabbing: Police Car Chase In this game some thieves rob the bank and the police try to catch them. Are you a daring driver to drive a police chase game? \r\n\r\nThe thieves are trying their best to not be caught by police and the police try hard to catch them from every side. If the police man catches them then he will destroy their car with the police man’s car.', 0, 0, 1, '2023-10-28 19:15:45', '2023-10-29 18:53:02'),
(4, 'Punch King', 'Uploads/Game/Thumbnail/1698499401-punch-king.webp', 'punch-king', 'AllGames/punch-king', 'Punch King - Arcade Game is a fun and addictive arcade game where you can knock out your opponents and become the champion.', 'Play Punch King and Experience the Thrill of Boxing', 'punch king, arcade game, boxing game, fight game, knockout game, champion game, fun game, addictive game, simple controls, all ages, free game', 'Enjoy the action fighting gameplay with Punch King. Play this exciting and warm-up game alone & destroy the bugs. Thousands of exciting levels and a super warming mood to eliminate bugs. Punching kick as a pro-level kung fu expert to vanishing bugs.', 0, 1, 3, '2023-10-28 19:23:21', '2023-10-30 00:46:56'),
(5, 'Robo BoomTown', 'Uploads/Game/Thumbnail/1698500576-robo-boom-town-game.webp', 'robo-boomtown', 'AllGames/robo-boomtown', 'Robo Boomtown is a fun and addictive game that is perfect for players of all ages. With its simple controls and easy-to-learn gameplay.', 'Play Robo Boomtown, the Best Online Game', 'online robot building game, robot building game, build your own robot empire, customize your robots, deploy your robots, mine resources, build structures, battle other players, fun and addictive game, simple controls, easy-to-learn gameplay, Robo Boomtown tycoon.', 'Robo BoomTown is a fun game to play. The game has very simple gameplay where you have to collect power and keep the robot alive! But it is not that easy to keep him alive; there are bombs everywhere. Be aware of the bombs and try to dodge them all. If any of them fall on you, the game will be over. You can use the arrow keys to play the game.', 0, 1, 8, '2023-10-28 19:42:56', '2023-10-30 12:10:33'),
(6, 'Somersault Ninja', 'Uploads/Game/Thumbnail/1698501081-somersault-ninja.webp', 'somersault-ninja', 'AllGames/somersault-ninja', 'Somersault Ninja is a platformer exciting new ninja game online! Flip and soar through the air, avoiding obstacles and defeating enemies.', 'Somersault Ninja: Flip and Soar to Victory', 'somersault ninja, ninja game, online game, flip and soar, avoid obstacles, defeat enemies, simple controls, addictive gameplay, for players of all ages', 'Our new game and extremely attractive Ninja Jump. Once upon a time in the middle of the night. A group of ninjas came out with naked swords.To put one ninja group in a food crisis, they set out to steal another ninja group\'s food at night. But other ninja groups also started attacking them to protect their food. Here the player will play for the stolen ninjas. That\'s why he has to defend himself from the attacks of other ninja groups.', 0, 0, 3, '2023-10-28 19:51:21', '2023-10-28 23:31:25'),
(7, 'Speed Row', 'Uploads/Game/Thumbnail/1698501799-speed-row-traffic-racing-car-online-game-free.webp', 'speed-row', 'AllGames/speed-row', 'Speed Row Racing is the most exciting online rowing game on the market! With realistic physics and immersive gameplay.', 'Speed Row: The Most Exciting Online Racing Game', 'online rowing game, speed row racing, rowing game, racing game, multiplayer game, real time game, realistic physics, immersive gameplay.', 'The speed is thrilling. Everyone says Speeding cars can reach the top of the thrill. \r\nThis game is a competitive game. Competitors\' hopes of winning the top spot in the competition make the game more competitive.Here the player must pass all the other cars to feel the thrilling thrill of speed.', 0, 1, 10, '2023-10-28 20:03:19', '2023-10-30 12:44:09'),
(9, 'Apples Lemons', 'Uploads/Game/Thumbnail/1698503959-apples-lemons..webp', 'apples-lemons', 'AllGames/apples-lemons', 'apples lemons arcade game', 'Apples and Lemons: Most Exciting Fruit Matching Game Online', 'fruit matching game, fun games, addictive games, simple controls, easy to learn, challenging levels, high scores, competition, friends, master', 'Apples & Lemons is a hyper casual puzzle game that is set in the fictional town of Lemons. You are a character who loves to play puzzles, and your focus is on completing tasks within the limited time frame. The game is built around a south-american take on the style of Apples and Lemons, where the focus is on the individualism of players’ tweets as they participate in a dialogue about the game.', 0, 0, 6, '2023-10-28 20:39:20', '2023-10-30 12:26:24'),
(10, 'Scary Math', 'Uploads/Game/Thumbnail/1698504281-scary-math.webp', 'scary-math', 'AllGames/scary-math', 'Scary Math is the math game that will give you nightmares! Test your math skills while surviving the horror in this fun and challenging game.', 'Play Scary Math and Test Your Math Skills', 'scary math, math game, horror game, challenging game, fun game, solve math problems, brain teaser, math master, test your skills, nightmare game, survival game', 'Scary Math is an educational game. Here players need to choose right or wrong from the following equations. Each equation provides a few seconds to choose the correct selection.\r\nScary Math: Learn with Monster Math, the educational game that improves math skills including addition, subtraction, multiplication, division, and family maths.\r\nFree monster math bundle Games for everyone from kids to adults. Best maths practice game to train your brain & is designed for all ages including kids, girls and boys 1st 2nd, adults including parents and grandparents. Smallest in size Maths App on Google Play ! Easiest multiplication and division games with Addition and Subtraction games all math reflex in one app. Increase your brain power with an excellent educational game for learning mathematics for sushi monsters and adults of all ages. Math games are free with an xtra math mathematics monster', 0, 1, 0, '2023-10-28 20:44:41', '2023-10-30 00:45:30'),
(11, 'Twinning', 'Uploads/Game/Thumbnail/1698505057-copy-of-twinning.webp', 'twinning', 'AllGames/twinning', 'Test Your Color Matching Skills in Twinning. With simple controls and addictive gameplay, Twinning is the perfect game to play.', 'Play the Best Color Matching Game Online - Twinning', 'twinning, color matching game, fun games, challenging games, all ages, online game, addictive game, simple controls, unlock new challenges, match the colors, complete the levels', 'Twining Color Switch comes the Color Switch Lovers New Color Switch World\r\nTwining games are made for increasing the focusing level of players. In this game a candy drops from the middle of the circle. The circle has four colors. Players need to tab left and right to switch the circle colors. When the same-colored candy drops the same side of the circle color, then the candy color will change. If somehow the player is losing his/her attention from the game, then there are more possibilities that he/she loses.', 0, 1, 2, '2023-10-28 20:57:37', '2023-10-30 00:41:36'),
(12, 'Tic Tac Toe', 'Uploads/Game/Thumbnail/1698505738-tictactoe-thumbnail-.webp', 'tic-tac-toe', 'AllGames/tic-tac-toe', 'Play the classic Tic Tac Toe game online. Challenge the AI and see who can get three in a row first.', 'Tic Tac Toe Online: Play the Classic Game', 'tic tac toe, tic-tac-toe, online game, free game, classic game, multiplayer game, single player game, strategy game, puzzle game, brain teaser, fun game.', 'Tic Tac Toe - one of the most classic board games that is so enjoyable. If you haven\'t played it before, this online version of tic tac toe will definitely make it more fun.\r\n\r\nTic-tac-toe, or noughts and crosses, is a pencil-and-paper game for two players, X and O, who take turns marking the spaces in a 3×3 grid. The X player always goes first. The player who succeeds in placing three respective marks in a horizontal, vertical, or diagonal row wins the game. In this app you can play online or locally with your friends!', 0, 0, 6, '2023-10-28 21:08:58', '2023-10-29 18:32:16'),
(13, 'Shoots Skibidi', 'Uploads/Game/Thumbnail/1698558902-shoots-skibidi.webp', 'shoots-skibidi', 'AllGames/shoots-skibidi', 'Shoots Skibidi is the most fun and addictive hyper casual game of the year. With simple controls and endless gameplay, you\'ll be hooked in no time', 'Shoots Skibidi: The Most Fun Hyper Casual Game of the Year', 'Shoots Skibidi, hyper casual game, endless runner game, shooting game, fun game, addictive game, simple controls, quick breaks, long gaming sessions, free game', 'Shoots Skibidi Dop Dop Yes Yes Tap Down is the most addictive shooting game. With its simple yet challenging gameplay, you\'ll be hooked from the first time you play. Tap down to shoot the enemies as they come at you from all sides. Use your powerups to take down the bosses and progress to the next level. There are endless hours of fun to be had with Shoots Skibidi Dop Dop Yes Yes Tap Down.', 0, 1, 4, '2023-10-29 11:55:02', '2023-10-30 00:43:12'),
(14, 'On The Away', 'Uploads/Game/Thumbnail/1698559385-on-the-away.webp', 'on-the-away', 'AllGames/on-the-away', 'Become the trendy skater in town! On the away brings you the most fantastic skater game. No wait for a cracker of a game that will assure your time does not get wasted. Lots of obstacles to dodge and a BIG score to make!\r\nSkating is in, and now you can get a taste of the skater stunt with this awesome game. As a skyline skater, you\'ll have to dodge lots of obstacles as you skate your way through levels while gathering points!', 'Skate Your Way to Freedom in On The Away:', 'skateboarding game, online skateboarding game, free skateboarding game, realistic physics, stunning graphics, challenging levels, skateboard tricks, skateboard challenges, city streets, skateboarding skills, skateboarding fan, beginner skateboarder, pro skateboarder', 'On The Away: Skate Game is the ultimate skateboarding experience for all ages and skill levels. With realistic physics, and a variety of challenging levels.', 0, 1, 3, '2023-10-29 12:03:05', '2023-10-30 00:51:28'),
(15, 'Living Dead', 'Uploads/Game/Thumbnail/1698560178-living-dead-promo-.webp', 'living-dead', 'AllGames/living-dead', 'The Zombie Apocalypse has just begun! A pandemic is spreading, and people are starting to mutate into some kind of walking dead. Help survivors by killing the zombie outbreak and stop the end of the world. Travel to the wasteland, take your rifle, and try your sniper skills shooting the unkilled! You will need strategy and precision to stop the assault in this zombie action shooter game. Keep your finger on the trigger, survive and shoot every living dead. This is a zombie hunter 3d zombie apocalypse game. You set the dead target zombie of zombie shooter games. You are shooting zombies in this game,e also called the death games.', 'Run for Your Life in Living Dead Endless Runner', 'Living Dead Endless Runner, endless runner game, zombie game, survival game, apocalypse game, run for your life, post-apocalyptic world, zombies, obstacles, traps, coins, power-ups, character upgrades, weapon upgrades, survive the apocalypse', 'Living Dead is the ultimate endless runner game for fans of zombies and survival games. Run through a world filled with zombies, obstacles, and traps.', 0, 1, 2, '2023-10-29 12:16:18', '2023-10-30 00:42:56'),
(16, 'Nap Block Puzzle', 'Uploads/Game/Thumbnail/1698560722-features (1).webp', 'nap-block-puzzle', 'AllGames/nap-block-puzzle', 'Nap Block Puzzle is a fun and challenging puzzle game that will test your logic and spatial reasoning skills. In this game, your objective is to arrange colorful blocks to help a sleepy character take a well-deserved nap. The blocks come in various shapes and sizes, and it\'s your job to fit them together to create a comfortable resting place for our tired friend.', 'Nap Block Puzzle: A Fun and Challenging Block Puzzle Game', 'Nap Block Puzzle, block puzzle game, puzzle game, brain teaser, logic game, challenging game, addictive game, free game', 'Nap Block Puzzle is a fun and challenging block puzzle game that will keep you entertained for hours on end.', 0, 0, 10, '2023-10-29 12:25:22', '2023-10-29 19:37:43'),
(17, 'Rule Out', 'Uploads/Game/Thumbnail/1698562295-rule-out.webp', 'rule-out', 'AllGames/rule-out', 'Get Ready To Take Challenge Super Addictive Game Rule Out: Dangerous Circle.\r\nThis beautiful round earth hides a silent death net. To escape from this death trap one must always be clever and attentive. The player has to save himself by cleverly changing the direction of his speed from the net of death.\r\nGet ready to be hooked to the super addictive game \"Circle Running\", a perfect pastime for your breaks!', 'One-Click Elimination: The Fun and Challenging Game', 'Rule Out, One Click, one-click elimination, deductive reasoning game, game for all ages, fun game, challenging game, clues, elimination, puzzle game, brain teaser', 'The goal of the game is to save yourself from obstracle with just one click. As the game progresses, the games become more difficult.', 0, 1, 3, '2023-10-29 12:51:35', '2023-10-30 00:42:37'),
(18, 'Head The Ball', 'Uploads/Game/Thumbnail/1698562620-head-the-ball-arcade-game.webp', 'head-the-ball', 'AllGames/head-the-ball', 'Head The Ball is a new way for soccer players to head the ball. By using your head, you can create an impact that is difficult for your opponent to miss. With your head, you can create an impact that is difficult for your opponent to miss. Your opponent will be forced to defend against the ball if it falls off your hand. You can also use this ability to create space on the pitch for your teammates.', 'Head The Ball: Endless Fun and Challenge', 'head the ball, endless soccer game, online soccer game, free soccer game, soccer game, football game, endless game, arcade game, casual game, addictive game, high score', 'Play against friends or challenge yourself to beat your high score. Head The Ball is the ultimate test of your soccer skills!', 0, 1, 3, '2023-10-29 12:57:00', '2023-10-30 00:42:46'),
(19, 'Number Snake', 'Uploads/Game/Thumbnail/1698563090-number-snake.webp', 'number-snake', 'AllGames/number-snake', 'With the Number Snake Game, you can play this challenging game using your finger. The objective is to guide the snake of balls through a maze of obstacles, and break as many bricks as possible. There are different levels of difficulty that you can change at any time, so there\'s always something new to try.  Get additional balls and make the biggest snake ever!  This fun and challenging game is easy to play but hard to reach high scores, so be sure to challenge yourself!', 'Number Snake Hyper Casual Game: Play Now and Have Fun!', 'number snake, hyper casual game, addictive game, simple controls, endless gameplay, maze game, avoid obstacles, collect points, high score, game over\r\ndownload now, play now, have fun', 'Number Snake is the most addictive hyper casual game of 2023! With simple controls and endless gameplay, you\'ll be hooked in no time.', 0, 1, 12, '2023-10-29 13:04:50', '2023-10-30 00:41:29'),
(20, 'Memory Mystery', 'Uploads/Game/Thumbnail/1698563986-memory-mystry-online.webp', 'memory-mystery', 'AllGames/memory-mystery', 'Animal Match Master is a puzzle game that you can play online. The objective of the game is to link three animals of the same kind. You can play the game by yourself or with other people. Animal Match Master is a fun and challenging online game that tests your memory and matching skills. There are three difficulty levels to choose from, and you can even compete against other players online.', 'Memory Mystery: A Fun and Challenging Memory Game', 'memory mystery, memory game, brain game, puzzle game, challenging game, addictive game, fun game, all ages, free game, online game', 'Memory Mystery is a fun and challenging memory game that will test your skills and keep you entertained for hours.', 0, 1, 6, '2023-10-29 13:19:46', '2023-10-30 00:41:22'),
(21, 'Crazy Traffic Race', 'Uploads/Game/Thumbnail/1698564520-crazy-traffic-racer-online.webp', 'crazy-traffic-race', 'AllGames/crazy-traffic-race', 'Traffic control is an online game in which you control traffic in the city. Keep traffic steady and avoid it. The faster you finish the level, the more points you earn. Maximize your score by carefully avoiding collisions. If you would like to play this game, then there are unique traffic control online games.', 'Crazy Traffic Race: The Most Thrilling Online Racing Game', 'crazy traffic race, online racing game, racing game, driving game, traffic game, speed game, adrenaline rush, thrilling game, addictive game, easy to pick up, difficult to master', 'Crazy Traffic Race is the most thrilling online racing game you\'ll ever play where you have to play against the traffic lights.', 0, 0, 9, '2023-10-29 13:28:40', '2023-10-30 12:24:00'),
(22, 'Candy Monster', 'Uploads/Game/Thumbnail/1698565257-candy-monstar-online.webp', 'candy-monster', 'AllGames/candy-monster', 'Candy Match game, here you have to match 3 or more of the same type doll to clear them from the board. Every time you clear 5 or more to get extra time and continue playing. This game is very simple to play but very hard to master. Play the free Christmas puzzle and kill your boring time.', 'Candy rush Monster: A Sweetly Addictive Match-3 Game', 'candy crush monster, match-3 game, puzzle game, casual game, free game, addictive game, sweet game, delicious game, fun game, family game', 'Candy Monster is a sweetly addictive match-3 game that will keep you entertained for hours on end. Match your way through hundreds of levels.', 0, 1, 4, '2023-10-29 13:40:57', '2023-10-30 00:42:29'),
(23, 'Egg Fry', 'Uploads/Game/Thumbnail/1698565505-egg-fry (1).webp', 'egg-fry', 'AllGames/egg-fry', 'Are you up for some breakfast cooking? Hungry enough in the morning? Then it\'s high time you cook something delicious in this Egg Fry of a game! Discover how you can cook, whereas you can play as well in this game!', 'Play the Best Egg Fry Arcade Game and Have a Blast', 'egg fry arcade game,arcade game, fun game, challenging game, fry eggs, avoid obstacles, collect power-ups, score big, easy to play, addictive gameplay', 'Egg Fry Arcade Game is the most fun and challenging arcade game you\'ll ever play! Stop the eggs from getting fry.', 0, 0, 4, '2023-10-29 13:45:05', '2023-10-29 18:35:05'),
(24, 'Warriors Vs Evil', 'Uploads/Game/Thumbnail/1698578880-icon.webp', 'warriors-vs-evil', 'AllGames/warriors-vs-evil', 'The Warrior Kingdom is a fighting game where the warrior fights with the enemies to protect his Kingdom. He has very sharp skills that will help him win the battle and save his Kingdom. Because the player will play the role of a warrior and will be alone on the battlefield, he has a lot of responsibility on his shoulders. Use your skills and promptness to help the warrior save his Kingdom.', 'Warriors Vs Evil: Battle Your Way Through Hordes of Evil', 'warriors vs evil, action game, online action game, action rpg, battle, evil, enemies, warriors, unique abilities, playstyles, gear, weapons, team up, bosses', 'Warriors Vs Evil is an online action game where you can battle your way through hordes of evil enemies.', 0, 1, 7, '2023-10-29 17:28:00', '2023-10-30 00:51:37'),
(25, 'Fruits Fit', 'Uploads/Game/Thumbnail/1698580168-fruits-fit-.webp', 'fruits-fit', 'AllGames/fruits-fit', 'Fruits Shooter Pop Master is a free online game. Shoot fruits and pop all the fruits in this fun puzzle game!\r\nIn this free online game, you are a fruit shooter. You must shoot all the fruits in order to win! The objective of the game is to pop as many fruits as possible in each level. There are five levels with different obstacles and challenges that you must overcome. Your goal is to pop all the fruits in each level before time runs out!', 'Fruits Fit: Learn About english names of Fruits.', 'fruit learning game, fun fruit game, educational fruit game, kids fruit game, learn fruit names, match fruits, identify fruits, grow fruits, fun and engaging, educational game, kids game', 'his educational game is perfect for kids of all ages, and it\'s a great way to learn the names of different fruits.', 0, 1, 21, '2023-10-29 17:49:28', '2023-10-30 12:23:37'),
(26, 'Choco Ball', 'Uploads/Game/Thumbnail/1698584262-Choco Ball .webp', 'choco-ball', 'AllGames/choco-ball', 'Enjoy a fun and challenging experience as you draw lines through a slew of obstacles! Get into the action fast as you help those cute little choco balls reach their destination at each level. \r\nUnlock all kinds of different balls like fireballs, ice cubes, and Play with your friends for free Draw lines to guide the Choco Balls into a basket for your little girl. But watch out, it\'s not as simple as you think! The balls will continuously rise from below and then fall, so be careful with those tricky angles - one wrong move could cost you three lives. \r\nAre you the master of precision? You have to help our little girl collect all of her chocolates by drawing lines through them. If so, test your anticipation skills in this fantastic draw a line game. One of the best line drawing games is here to kill your boredom. Numerous amounts of choco balls rising from below, then falling on the line! So help a poor girl to have some choco balls in this ball line game!', 'Choco Ball: Bounce, and Draw Your Way to the Top', 'Choco Ball arcade game, arcade game, classic arcade game, bounce, dodge, collect, coins, leaderboard, fun, challenging, addictive', 'Go through a variety of levels, dodging obstacles and collecting coins as you go. See how far you can make it to the top of the leaderboard!', 0, 0, 8, '2023-10-29 18:57:42', '2023-10-30 12:25:12'),
(27, 'Air Force Commando', 'Uploads/Game/Thumbnail/1698589741-air-force-commando1.webp', 'air-force-commando', 'AllGames/air-force-commando', 'Air Combat Game In Air Combat Game you control a plane of your choosing and battle with other players in an attempt to become the top dog by having the most kills or whatever other goal you want to achieve through combat.', 'Air Force Commando: Experience the Thrill of Infinite Flight', 'air force commando, endless game, flight game, shooting game, arcade game, action, game, pilot, homeland, defense, upgrades, power-ups', 'Experience the thrill of infinite flight in our Air Force Commando Endless Game! Soar through the skies and battle enemies in this exciting and challenging game', 0, 1, 7, '2023-10-29 20:29:01', '2023-10-30 00:42:23'),
(28, 'Christmas Highway', 'Uploads/Game/Thumbnail/1698590892-christmas-highway-65 (1).webp', 'christmas-highway', 'AllGames/christmas-highway', 'The Christmas Highway Online Santa Clause game is a great way to get into the holiday spirit. This free game lets you control Santa Claus as he navigates his way through a winter wonderland. With stunning graphics and holiday music, this game is sure to get you into the Christmas spirit.', 'Christmas Highway: Drive Through the Holiday Season', 'Christmas Highway, Endless Game, Christmas game, endless driving game, holiday game, festive game, fun game, dodge obstacles, collect coins', 'With its festive atmosphere and fun gameplay, experience the thrill of endless driving as you dodge obstacles and collect coins.', 0, 1, 1, '2023-10-29 20:48:12', '2023-10-30 12:16:20'),
(29, 'Fish Match Master', 'Uploads/Game/Thumbnail/1698592481-fish-match-master-65 (1).webp', 'fish-match-master', 'AllGames/fish-match-master', 'Looking for a fun and challenging match 3 puzzle game? Look no further than Fish Match Master. In this online game, you\'ll need to match three or more identical fish to clear them from the board. With each level, the challenge increases, so you\'ll need to be quick and strategic to progress. Can you become the ultimate Fish Match Master? Play now and find out!', 'Fish Match Master Puzzle Game: Match Fish and Solve Puzzles!', 'fish match master puzzle game, fish puzzle game, matching game, puzzle game, casual game, fun game, addictive game, challenging game, over 100 levels, free game', 'Match colorful fish to solve puzzles and progress through the game. With over 100 levels to play, there\'s something for everyone in Fish Match Master match 3', 0, 1, 1, '2023-10-29 21:14:41', '2023-10-30 00:51:16'),
(30, 'Snowman Jump', 'Uploads/Game/Thumbnail/1698593446-snowman-jump-65 (1).webp', 'snowman-jump', 'AllGames/snowman-jump', 'Snowman Jump Online is a fast-paced action game that will keep you entertained for hours. In the game, you control a snowman as he jumps around an endless winter landscape, avoiding obstacles and enemies. The goal is to get as high as possible and score as many points as you can. Snowman Jump Online is a great game for all ages and will definitely keep you coming back for more.', 'Snowman Jump: Tap to Jump and Avoid Obstacles!', 'snowman jump, one tap game, jumping game, obstacle game, arcade game, casual, game, fun game, addictive game, simple controls, challenging gameplay, free game', 'Tap to jump and avoid obstacles to make the new high score. With simple controls and challenging gameplay, Snowman Jump is the perfect game for everyone.', 0, 1, 2, '2023-10-29 21:30:46', '2023-10-30 00:40:41'),
(31, 'Hill Racing', 'Uploads/Game/Thumbnail/1698645786-hill-racing-online.webp', 'hill-racing', 'AllGames/hill-racing', 'Hill Racing is an excellent driving game that is entirely dependent on your ability to earn the greatest possible score. Hill Racing will help you improve your hand-eye coordination and will keep you entertained for hours; you will not get tired even if you play it for a long period of time. Play this entertaining and addicting Offroad Simulator Game to be entertained while waiting in line, on a break, or on a bus or train.', 'Hill Racing Arcade Game Race Up the Hills and Collect Coins', 'hill racing, arcade game, racing game, physics game, endless game, collect coins, upgrade vehicles, addictive', 'Hill Racing is a physics-based arcade game where you race your vehicle up hills and collect coins. Your vehicle and travel further distances in this addictive, endless driving game.', 0, 0, 2, '2023-10-30 12:03:06', '2023-10-30 12:10:15'),
(32, 'Jump Halloween', 'Uploads/Game/Thumbnail/1698648331-jump-halloween.webp', 'jump-halloween', 'AllGames/jump-halloween', 'Halloween Games Online are the perfect way to get into the spirit of the season by playing some amazing Halloween games.\r\nJump Halloween Online is a new and exciting online game that will have you on the edge of your seat!', 'Play Jump Halloween arcade game and see how far you can go', 'jump halloween, arcade game, halloween arcade game, fun game, spooky game, jump game, ghost game, monster game, challenge game, addictive game', 'Jump Halloween is a fun and spooky Arcade Game that is perfect for Halloween. Jump over and see how far you can go in this fast-paced game.', 0, 0, 1, '2023-10-30 12:45:31', '2023-10-30 12:46:32'),
(33, 'Summer Dino', 'Uploads/Game/Thumbnail/1698649418-Summer Dino.webp', 'summer-dino', 'AllGames/summer-dino', 'The \"Summer Dino Swimming\" online game is a fun and challenging way to enjoy summertime. Players must help the little dinosaurs swim through the ocean, avoiding obstacles and collecting coins. The goal is to get as far as possible before the time runs out.', 'Summer Dino - Arcade Game: The Best Dino Game Around', 'summer dino, arcade game, dino game, dinosaur game, fun game, addictive game, challenging levels, coins, power-ups, adventure', 'Summer Dino - Arcade Game is the perfect way to cool off on a hot summer day. With its fun and addictive gameplay, you\'ll be hooked in no time.', 0, 0, 0, '2023-10-30 13:03:38', '2023-10-30 13:03:38'),
(34, 'Flying Challenge', 'Uploads/Game/Thumbnail/1698650949-flying-challenge.webp', 'flying-challenge', 'AllGames/flying-challenge', 'Flying challenge is a bird flying game with a twist. Here you have to control the bird while flying and help the bird to go through all the obstacles that come on the way of her journey. Your goal is to fly the bird as long as you can, let’s see how long you can go in one flight without falling. Keep your eyes stable to avoid the obstacle.', 'Flying Challenge: Take to the Skies, Test Your Flying Skills', 'flying game, flying challenge, flying ace, realistic physics, stunning graphics, challenging missions, flight simulation, flying games for kids, flying games for adults, free flying games', 'With its realistic physics and stunning graphics, Flying Challenge will hook you in  no time. So what are you waiting for? Start playing today.', 0, 0, 0, '2023-10-30 13:29:09', '2023-10-30 13:29:09'),
(35, 'Escaping Zombie', 'Uploads/Game/Thumbnail/1698651200-dead-target-shoot-zombies-online-games.webp', 'escaping-zombie', 'AllGames/escaping-zombie', 'Get your heart pumping with the Escaping Zombie Online Jump Game! With just one click, you can start playing this addicting game. See how long you can last against the never-ending hordes of zombies. Can you make it to the top of the leaderboard? Play now and find out!', 'Play Escaping Zombie and Experience the Thrill of Escaping', 'Escaping Zombie, arcade game, zombie game, survival game, action game, fast-paced game, challenging game, simple controls, addictive gameplay, weapons, power-ups, zombie apocalypse', 'Escaping Zombie - Arcade Game is a thrilling arcade game where you must use your skills and reflexes to escape from hordes of zombies.', 0, 0, 0, '2023-10-30 13:33:20', '2023-10-30 13:33:20'),
(36, 'Robot Fish', 'Uploads/Game/Thumbnail/1698651760-robot-fish.webp', 'robot-fish', 'AllGames/robot-fish', 'Robot Fish Online is a free online game that allows you to control a robotic fish in an underwater world. The game is played through a web browser and requires no download.', 'Robot Fish: The Best Robot Fish Game Online', 'robot fish, robot fishing, fishing game, online game, simulator, realistic graphics, addictive gameplay, leaderboard, competition', 'Robot Fish is the best robot fishing game online! With easy and addictive gameplay, you\'ll be hooked in no time.', 0, 0, 4, '2023-10-30 13:42:40', '2023-10-30 16:54:25'),
(37, 'Save the Pumpkin', 'Uploads/Game/Thumbnail/1698664256-save-the-pumpkin.webp', 'save-the-pumpkin', 'AllGames/save-the-pumpkin', 'Save the Pumpkin is a fun Halloween adventure game in which you must save the pumpkin from spooky creatures.\r\nAre you ready for a Halloween adventure? In Save Pumpkin, you will embark on a spooky journey to rescue the pumpkin from evil creatures. Use your quick reflexes to dodge obstacles and defeat enemies in this exciting game. Save the Pumpkin is perfect for all ages and offers endless hours of fun. So, join the adventure today and become a pumpkin hero! Download now and experience the thrill of this fantastic game.', 'Help the Pumpkin Survive in This Adventurous Online Game', 'Save the Pumpkin, online game, puzzle game, problem-solving game, challenging game, addictive game, fun game, pumpkin game', 'With its stunning graphics the game feels lively to play and its simple controls and addictive gameplay, Save the Pumpkin is the perfect game for people of all ages.', 0, 0, 0, '2023-10-30 17:10:56', '2023-10-30 17:10:56'),
(38, 'Survival Snowman', 'Uploads/Game/Thumbnail/1698665730-survival-snowman.webp', 'survival-snowman', 'AllGames/survival-snowman', '\"Survival Snowman\" is a free online game that challenges players to help a snowman survive in a cold environment. Players must use their strategic and resourceful thinking to keep the snowman alive for as long as possible. \"Survival Snowman\" is a great game for players who enjoy puzzles and strategy games.', 'Survival Snowman: Essential Tips for Snow Survival', 'Snow survival, Winter survival, Snowman survival, Cold weather survival, Snow survival tips, Winter wilderness tips, Snow survival guide', 'Discover crucial snow survival strategies with our Survival Snowman guide. Learn how to stay safe and warm in winter wilderness. Get expert tips now!', 0, 0, 0, '2023-10-30 17:35:30', '2023-10-30 17:35:30'),
(39, 'Save The Heart', 'Uploads/Game/Thumbnail/1698666308-save-the-heart.webp', 'save-the-heart', 'AllGames/save-the-heart', '\"Save The Heart\" is an exhilarating adventure game where you embark on a heroic quest to rescue the heart of the kingdom. The game features a captivating storyline filled with challenges and puzzles that will test your wit and courage.\r\nYour mission is to journey through mystical landscapes, confront daunting foes, and collect ancient relics to restore light and hope to the realm. With stunning graphics, immersive gameplay, and an epic soundtrack, \"Save The Heart\" offers an unforgettable gaming experience', 'Save the Heart: The Ultimate Challenge for Arcade Gamers', 'save the heart, arcade game, challenging game, exciting game, addictive gameplay, simple controls, race against time, save the world, test your skills, test your reflexes, arcade gamers', 'Save the Heart - Arcade Game is a challenging and exciting arcade game where you have to protect the heart from break. Sounds fun right, play now.', 0, 0, 0, '2023-10-30 17:45:08', '2023-10-30 17:45:08'),
(40, 'Fruit Slasher', 'Uploads/Game/Thumbnail/1698667905-fruit-slasher.webp', 'fruit-slasher', 'AllGames/fruit-slasher', 'Welcome to Fruit Slasher, the most thrilling arcade game of all time! Get your blade ready to slice and dice a colorful array of fruits in this exciting fruity adventure. Test your skills and reflexes as you aim for high scores and compete against friends and players worldwide. With its addictive gameplay, Fruit Slasher promises endless fun and entertainment. Can you become the ultimate fruit-cutting master? Swipe your way to victory and prove your slicing skills in this epic arcade challenge.', 'Fruit Slasher Arcade Game | Slice and Dice Fruits for Fun', 'Fruit Slasher, Arcade Game, Fruit Slice, High Scores, Fruit Cutting, Endless Fun, Fruity Adventure, Slice and Dice, Addictive Gameplay, Fruit Ninja,', 'Enjoy the ultimate fruit slashing arcade game! Slice and dice a variety of fruits for high scores and endless fun. Get ready to master the art of fruit cutting!', 0, 0, 0, '2023-10-30 18:11:45', '2023-10-30 18:11:45'),
(41, 'City scape Challenge', 'Uploads/Game/Thumbnail/1698670367-cityscape-challenge.webp', 'city-scape-challenge', 'AllGames/city-scape-challenge', '\"City Scape Challenge\" is the ultimate racing game that takes you on a high-speed adventure through the heart of the city. Strap in, rev your engines, and prepare to race against the best urban racers in this action-packed gaming experience.', 'City Scape Challenge: Race through the city', 'City Scape Challenge, racing game, city racing game, new racing game, exciting racing game, immersive racing game, stunning graphics, realistic physics, overtake opponents, become the ultimate city racer', 'City Scape Challenge is the new and exciting racing game. Race through busy streets, dodge obstacles to become the ultimate city racer.', 0, 0, 0, '2023-10-30 18:52:47', '2023-10-30 18:52:47'),
(42, 'Bushman Bamboo', 'Uploads/Game/Thumbnail/1698671264-bushbamboo.webp', 'bushman-bamboo', 'AllGames/bushman-bamboo', 'Enjoy your free time exploring bushmen journeys with the help of bamboo. From all over the internet this free online game is the best just for you. For any activity level it is the perfect game. Game features Entertaining and enjoyable. High quality graphics. Challenging levels.', 'Bushman Bamboo: Jump Through the Jungle!', 'Bushman Bamboo, platformer game, jungle game, bamboo swinging game, addictive gameplay, stunning visuals, challenging levels, dangerous obstacles, unlockable abilities, power-ups, become the ultimate Bushman.', 'Jump through the jungle in the Bushman Bamboo platformer game! With its addictive gameplay, this game is sure to keep you entertained for hours.', 0, 0, 0, '2023-10-30 19:07:44', '2023-10-30 19:07:44'),
(43, 'Halloween Shooter', 'Uploads/Game/Thumbnail/1698673896-halloween-shooter.webp', 'halloween-shooter', 'AllGames/halloween-shooter', 'Halloween Shooter is a fun and addicting game that you can play online on NapZone Games. In this game, your goal is to match 3 or more bubbles of the same color and clear them from the board. You can play this game alone or with friends, and see who can get the high score!', 'Enjoy a Halloween with Our Fun and Addictive Shooter Game', 'Halloween Shooter, shooter game, Halloween game, monster game, spooky game, fun game, addictive game, weapons, challenging levels, free game', 'Shoot, Match and vanish. Halloween Shooter is a fun and addictive shooter game that is perfect for all ages.  So what are you waiting for?', 0, 0, 0, '2023-10-30 19:51:36', '2023-10-30 19:51:36'),
(44, 'Jump Monster', 'Uploads/Game/Thumbnail/1698674338-jump-monster.webp', 'jump-monster', 'AllGames/jump-monster', 'The \"Monster Jump Adventure Online Game\" is a fun and addicting game that allows players to experience the thrill of jumping and avoiding obstacles. The monster jump adventure online game is a great way for players to have fun and excitement. The game offers a unique and challenging gameplay that is different from other online games. The player can choose to play as a monster or a human in the game. There are many different levels to the game, and each level gets more difficult as the player progresses.', 'Jump Moster: Swing through the platforms to play', 'jump monster, platformer game, jump, swinging, puzzles, enemies, unique, gameplay, fresh take, fun, challenging', 'Jump Monster is a fun and challenging platformer game where you swing your way through platforms, and defeat enemies.', 0, 0, 0, '2023-10-30 19:58:58', '2023-10-30 19:58:58'),
(45, 'Long Road Trip', 'Uploads/Game/Thumbnail/1698906271-long-road-trip-65 (1).webp', 'long-road-trip', 'AllGames/long-road-trip', 'Discover the joys of a long road trip with this free online game! You\'ll have to plan your route carefully, avoid traffic jams, and make sure you reach your destination safely. Pack your bags and hit the open road today!', 'Long Road Trip: The Fun and Challenging Car Game', 'circle road trip, car game, road trip game, fun game, challenging game, avoid obstacles, collect coins, travel as far as possible, easy to learn, difficult to master, one tap game', 'Long Road Trip is a fun and challenging car game that will keep you entertained for hours on end. The goal of the game is to keep driving around a circle road', 0, 0, 0, '2023-11-02 12:24:31', '2023-11-02 12:24:31'),
(46, 'Jungle Escape', 'Uploads/Game/Thumbnail/1698906716-jungle-escape-65 (1).webp', 'jungle-escape', 'AllGames/jungle-escape', 'A fun action game where you are the Viking and you direct your dragon through swarms of enemies to reach the end of each level. There is one big bonus loop within each level that contains a plethora of enemies, but there is only time for one before the bonus ends! The game ends when all of your life and energy runs out. Each weapon gives a different bonus to the Vikings\' score so be sure to try them all on each level!', 'Jungle Escape: Test Your Skills and Escape the Jungle', 'jungle escape, online game, escape game, adventure game, puzzle game, challenging game, fun game, all ages, test your skills, escape the jungle', 'Jungle Escape is a thrilling online game where you must escape the jungle. With challenging puzzles and obstacles, this game is sure to test your skills.', 0, 0, 0, '2023-11-02 12:31:56', '2023-11-02 12:31:56'),
(47, 'Honey Collector Bee', 'Uploads/Game/Thumbnail/1698906937-honey-collector-bee-65 (1).webp', 'honey-collector-bee', 'AllGames/honey-collector-bee', 'Honey Collector Bee Game is an online platformer about a bee who collects flowers and makes honey. Do you want to play the best free online platformer games? You will find a lot of fun playing the Honey Collector Bee Game. This game is a lot of fun and it is also a great way to learn more about bees and beekeeping.\r\nThe Honey Collector Bee Game is an exciting free online platformer that lets you experience what it\'s like to be a bee. You can choose the flowers you want to collect and trade them in at the hive for different types of honey. The best part is that it\'s compatible with mobile devices, so you can play it everywhere!', 'Honey Collector Bee: Fun and Addictive Bee Game for All', 'honey collector bee game, bee game, collect honey, build hive, fun and addictive game, kids and adults game, simple controls, challenging levels, buzzing good time', 'The game features simple controls and challenging levels that will keep you entertained for hours. Can you collect all the honey and build the biggest hive?', 0, 0, 0, '2023-11-02 12:35:37', '2023-11-02 12:35:37'),
(48, 'Happy Color Sorting', 'Uploads/Game/Thumbnail/1698907491-happy-color-sorting-65 (1).webp', 'happy-color-sorting', 'AllGames/happy-color-sorting', 'Slime Matching is an online game that tests players\' ability to match colors. It\'s a terrific way to pass the time because the game is straightforward but addictive. Your ability to match colors will be put to the test in the game Slime Matching Online. To win the game, you must match as many different colors as you can. Looking for an entertaining and difficult online game? Slime matching is the only place to look! You must match colors in this game as quickly and precisely as you can. There is a challenge for everyone thanks to the variety of levels. So start matching right away to see whether you can win the championship of slime matching!', 'Test Your Logic Skills with Our happy  Color Sorting Puzzle Game', 'happy color sorting puzzle game, puzzle game, brain game, sort the colors, solve the puzzle, logic skills, hundreds of levels, free to play', 'Happy Color Sorting Puzzle Game is a fun and challenging brain game that is perfect for all ages. Sort the colored water into the correct tubes and solve the puzzle.', 0, 0, 0, '2023-11-02 12:44:51', '2023-11-02 12:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `game_categories`
--

CREATE TABLE `game_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_categories`
--

INSERT INTO `game_categories` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 17, '2023-10-28 18:53:42', '2023-10-28 18:53:42'),
(2, 2, 16, '2023-10-28 19:02:16', '2023-10-28 19:02:16'),
(3, 3, 23, '2023-10-28 19:15:45', '2023-10-28 19:15:45'),
(4, 4, 17, '2023-10-28 19:23:21', '2023-10-28 19:23:21'),
(5, 5, 24, '2023-10-28 19:42:56', '2023-10-28 19:42:56'),
(6, 6, 16, '2023-10-28 19:51:21', '2023-10-28 19:51:21'),
(7, 7, 23, '2023-10-28 20:03:19', '2023-10-28 20:03:19'),
(9, 9, 17, '2023-10-28 20:39:20', '2023-10-28 20:39:20'),
(10, 10, 19, '2023-10-28 20:44:41', '2023-10-28 20:44:41'),
(11, 11, 19, '2023-10-28 20:57:37', '2023-10-28 20:57:37'),
(12, 12, 14, '2023-10-28 21:08:58', '2023-10-28 21:08:58'),
(13, 13, 15, '2023-10-29 11:55:02', '2023-10-29 11:55:02'),
(14, 14, 22, '2023-10-29 12:03:05', '2023-10-29 12:03:05'),
(15, 15, 24, '2023-10-29 12:16:18', '2023-10-29 12:16:18'),
(16, 16, 14, '2023-10-29 12:25:22', '2023-10-29 12:25:22'),
(17, 17, 22, '2023-10-29 12:51:35', '2023-10-29 12:51:35'),
(18, 18, 22, '2023-10-29 12:57:00', '2023-10-29 12:57:00'),
(19, 19, 15, '2023-10-29 13:04:50', '2023-10-29 13:04:50'),
(20, 20, 16, '2023-10-29 13:19:46', '2023-10-29 13:19:46'),
(21, 21, 23, '2023-10-29 13:28:40', '2023-10-29 13:28:40'),
(22, 22, 16, '2023-10-29 13:40:57', '2023-10-29 13:40:57'),
(23, 23, 17, '2023-10-29 13:45:05', '2023-10-29 13:45:05'),
(24, 24, 23, '2023-10-29 17:28:00', '2023-10-29 17:28:00'),
(25, 25, 19, '2023-10-29 17:49:28', '2023-10-29 17:49:28'),
(26, 26, 17, '2023-10-29 18:57:42', '2023-10-29 18:57:42'),
(27, 27, 17, '2023-10-29 20:29:01', '2023-10-29 20:29:01'),
(28, 28, 23, '2023-10-29 20:48:12', '2023-10-29 20:48:12'),
(29, 29, 14, '2023-10-29 21:14:41', '2023-10-29 21:14:41'),
(30, 30, 17, '2023-10-29 21:30:46', '2023-10-29 21:30:46'),
(31, 31, 23, '2023-10-30 12:03:06', '2023-10-30 12:03:06'),
(32, 32, 17, '2023-10-30 12:45:31', '2023-10-30 12:45:31'),
(33, 33, 17, '2023-10-30 13:03:38', '2023-10-30 13:03:38'),
(34, 34, 17, '2023-10-30 13:29:09', '2023-10-30 13:29:09'),
(35, 35, 17, '2023-10-30 13:33:20', '2023-10-30 13:33:20'),
(36, 36, 17, '2023-10-30 13:42:40', '2023-10-30 13:42:40'),
(37, 37, 14, '2023-10-30 17:10:56', '2023-10-30 17:10:56'),
(38, 38, 14, '2023-10-30 17:35:30', '2023-10-30 17:35:30'),
(39, 39, 14, '2023-10-30 17:45:08', '2023-10-30 17:45:08'),
(40, 40, 17, '2023-10-30 18:11:46', '2023-10-30 18:11:46'),
(41, 41, 23, '2023-10-30 18:52:47', '2023-10-30 18:52:47'),
(42, 42, 17, '2023-10-30 19:07:44', '2023-10-30 19:07:44'),
(43, 43, 18, '2023-10-30 19:51:36', '2023-10-30 19:51:36'),
(44, 44, 16, '2023-10-30 19:58:58', '2023-10-30 19:58:58'),
(45, 45, 15, '2023-11-02 12:24:31', '2023-11-02 12:24:31'),
(46, 46, 18, '2023-11-02 12:31:56', '2023-11-02 12:31:56'),
(47, 47, 17, '2023-11-02 12:35:37', '2023-11-02 12:35:37'),
(48, 48, 14, '2023-11-02 12:44:51', '2023-11-02 12:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `game_plays`
--

CREATE TABLE `game_plays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_02_091735_create_games_table', 1),
(6, '2021_12_02_092041_create_game_plays_table', 1),
(7, '2021_12_02_092114_create_categories_table', 1),
(8, '2021_12_02_092135_create_game_categories_table', 1),
(9, '2021_12_15_070048_create_subscribers_table', 1),
(10, '2021_12_15_070651_create_subscriber_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` int(11) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `validity`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'daily', 86400, 1, '2022-01-11 03:49:05', '2022-01-11 03:49:05'),
(2, 'weekly', 604800, 1, '2022-01-11 03:49:35', '2022-01-11 03:49:35'),
(3, 'monthly', 2592000, 1, '2022-01-11 03:49:50', '2022-01-11 03:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_plans`
--

CREATE TABLE `purchase_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'D for daily W for weekly B for biweekly M for monthly O for on demand',
  `autorenew` int(11) NOT NULL DEFAULT '1',
  `renewed` int(11) NOT NULL DEFAULT '0',
  `confirmed_by_user` int(11) NOT NULL DEFAULT '0',
  `purchase_confirmed` int(11) NOT NULL DEFAULT '0',
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `unsubscribe` tinyint(10) NOT NULL DEFAULT '0',
  `refid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_plans`
--

INSERT INTO `purchase_plans` (`id`, `plan_id`, `subscriber_id`, `service_type`, `autorenew`, `renewed`, `confirmed_by_user`, `purchase_confirmed`, `start_at`, `end_at`, `unsubscribe`, `refid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-08 12:26:44', 0, '1', '2023-10-08 18:26:44', '2023-10-08 18:26:48'),
(2, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-11 10:32:33', 0, '1', '2023-10-11 16:32:33', '2023-10-11 16:32:37'),
(3, 1, 1, 'D', 1, 0, 0, 0, NULL, '2023-10-17 07:52:37', 0, '1', '2023-10-17 13:52:37', '2023-10-17 13:52:37'),
(4, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-17 07:52:50', 0, '1', '2023-10-17 13:52:50', '2023-10-17 13:52:59'),
(5, 2, 6, 'W', 1, 0, 1, 0, NULL, '2023-10-17 08:40:42', 0, '6', '2023-10-17 14:40:42', '2023-10-17 14:40:46'),
(6, 1, 1, 'D', 1, 0, 0, 0, NULL, '2023-10-17 08:48:27', 0, '1', '2023-10-17 14:48:27', '2023-10-17 14:48:27'),
(7, 1, 1, 'D', 1, 0, 0, 0, NULL, '2023-10-17 08:48:38', 0, '1', '2023-10-17 14:48:38', '2023-10-17 14:48:38'),
(8, 3, 2, 'M', 1, 0, 1, 0, NULL, '2023-10-17 09:01:46', 0, '2', '2023-10-17 15:01:46', '2023-10-17 15:01:46'),
(9, 3, 2, 'M', 1, 0, 0, 0, NULL, '2023-10-17 09:03:34', 0, '2', '2023-10-17 15:03:34', '2023-10-17 15:03:34'),
(10, 2, 6, 'W', 1, 0, 1, 0, NULL, '2023-10-17 09:14:05', 0, '6', '2023-10-17 15:14:05', '2023-10-17 15:14:05'),
(11, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-17 09:20:59', 0, '1', '2023-10-17 15:20:59', '2023-10-17 15:20:59'),
(12, 2, 1, 'W', 1, 0, 0, 0, NULL, '2023-10-17 09:21:06', 0, '1', '2023-10-17 15:21:06', '2023-10-17 15:21:06'),
(13, 3, 1, 'M', 1, 0, 0, 0, NULL, '2023-10-17 09:21:13', 0, '1', '2023-10-17 15:21:13', '2023-10-17 15:21:13'),
(14, 1, 1, 'D', 1, 0, 0, 0, NULL, '2023-10-17 09:21:40', 0, '1', '2023-10-17 15:21:40', '2023-10-17 15:21:40'),
(15, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-17 18:08:26', 0, '1', '2023-10-18 00:08:26', '2023-10-18 00:08:29'),
(16, 3, 6, 'M', 1, 0, 1, 0, NULL, '2023-10-18 05:09:10', 0, '6', '2023-10-18 11:09:10', '2023-10-18 11:09:13'),
(17, 2, 6, 'W', 1, 0, 1, 0, NULL, '2023-10-18 05:09:35', 0, '6', '2023-10-18 11:09:35', '2023-10-18 11:09:40'),
(18, 2, 6, 'W', 1, 0, 0, 0, NULL, '2023-10-18 05:09:55', 0, '6', '2023-10-18 11:09:55', '2023-10-18 11:09:55'),
(19, 3, 6, 'M', 1, 0, 0, 0, NULL, '2023-10-18 08:15:18', 0, '6', '2023-10-18 14:15:18', '2023-10-18 14:15:18'),
(20, 1, 6, 'D', 1, 0, 0, 0, NULL, '2023-10-18 08:15:29', 0, '6', '2023-10-18 14:15:29', '2023-10-18 14:15:29'),
(21, 3, 6, 'M', 1, 0, 0, 0, NULL, '2023-10-18 12:45:17', 0, '6', '2023-10-18 18:45:17', '2023-10-18 18:45:17'),
(22, 3, 6, 'M', 1, 0, 1, 0, NULL, '2023-10-18 12:45:29', 0, '6', '2023-10-18 18:45:29', '2023-10-18 18:45:32'),
(23, 2, 6, 'W', 1, 0, 1, 0, NULL, '2023-10-18 12:46:26', 0, '6', '2023-10-18 18:46:26', '2023-10-18 18:46:30'),
(24, 2, 6, 'W', 1, 0, 1, 0, NULL, '2023-10-18 12:46:53', 0, '6', '2023-10-18 18:46:53', '2023-10-18 18:46:56'),
(25, 2, 2, 'W', 1, 0, 0, 0, NULL, '2023-10-18 12:59:34', 0, '2', '2023-10-18 18:59:34', '2023-10-18 18:59:34'),
(26, 2, 2, 'W', 1, 0, 1, 0, NULL, '2023-10-18 13:01:43', 0, '2', '2023-10-18 19:01:43', '2023-10-18 19:09:15'),
(27, 1, 6, 'D', 1, 0, 0, 0, NULL, '2023-10-18 13:02:13', 0, '6', '2023-10-18 19:02:13', '2023-10-18 19:02:13'),
(28, 1, 6, 'D', 1, 0, 1, 0, NULL, '2023-10-18 13:02:19', 0, '6', '2023-10-18 19:02:19', '2023-10-18 19:02:23'),
(29, 1, 6, 'D', 1, 0, 0, 0, NULL, '2023-10-18 13:02:43', 0, '6', '2023-10-18 19:02:43', '2023-10-18 19:02:43'),
(30, 1, 6, 'D', 1, 0, 0, 0, NULL, '2023-10-18 13:06:28', 0, '6', '2023-10-18 19:06:28', '2023-10-18 19:06:28'),
(31, 1, 6, 'D', 1, 0, 0, 0, NULL, '2023-10-18 13:08:18', 0, '6', '2023-10-18 19:08:18', '2023-10-18 19:08:18'),
(32, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-18 16:23:08', 0, '1', '2023-10-18 22:23:08', '2023-10-18 22:23:11'),
(33, 1, 2, 'D', 1, 0, 1, 0, NULL, '2023-10-22 06:40:55', 0, '2', '2023-10-22 12:40:55', '2023-10-22 12:40:59'),
(34, 1, 2, 'D', 1, 0, 1, 0, NULL, '2023-10-22 06:41:30', 0, '2', '2023-10-22 12:41:30', '2023-10-22 12:41:33'),
(35, 1, 6, 'D', 1, 0, 1, 0, NULL, '2023-10-22 06:51:49', 0, '6', '2023-10-22 12:51:49', '2023-10-22 12:51:55'),
(36, 1, 6, 'D', 1, 0, 1, 0, NULL, '2023-10-22 06:58:24', 0, '6', '2023-10-22 12:58:24', '2023-10-22 12:58:28'),
(37, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-22 16:47:24', 0, '1', '2023-10-22 22:47:24', '2023-10-22 22:47:24'),
(38, 1, 6, 'D', 1, 0, 1, 0, NULL, '2023-10-23 14:56:08', 0, '6', '2023-10-23 20:56:08', '2023-10-23 20:56:08'),
(39, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-23 15:15:43', 0, '1', '2023-10-23 21:15:43', '2023-10-23 21:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verified` int(11) NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `unique_id`, `phone_num`, `name`, `image`, `otp_verified`, `token`, `created_at`, `updated_at`) VALUES
(1, 'ZF09cU', '8801568562265', 'Sohel Rana', 'assets/frontend/images/uploads/user/6543e3ceac31e.jfif', 1, 'W14vCgRbQY67cIBn0VTeHwzo79t9Dh', '2023-10-08 17:39:40', '2023-11-03 00:00:46'),
(2, 'ayWZxI', '8801580150519', NULL, NULL, 1, 'zMz0lVjVDdQPYjl3hV8t0FqY7R7kSR', '2023-10-09 21:02:54', '2023-10-17 14:48:08'),
(3, '1i0Voo', '8801561097077', NULL, NULL, 0, 'mVsqJh8tgv3mrTYjrIipba3VqHhurn', '2023-10-10 00:12:50', '2023-10-10 00:12:50'),
(4, '8wEGn2', '8801566562285', NULL, NULL, 0, 'dc162GjNTG4buGp19SOp08G9UizXRb', '2023-10-10 13:08:56', '2023-10-10 13:08:56'),
(5, 'TVhLmn', '8801566054504', NULL, NULL, 0, 'ObEu8gWAvg95aFZ2fL5Xy5ls3i6UPJ', '2023-10-11 02:00:53', '2023-10-11 02:00:53'),
(6, 'uJGuhZ', '8801569128880', 'NapZone Office', 'assets/frontend/images/uploads/user/653a2b76c67f5.webp', 1, 'jJDlRhVVh1t5vG2rFwmowX3aGkuh0h', '2023-10-17 14:39:16', '2023-10-26 15:03:50'),
(7, 'SINjMM', '8801568562225', NULL, NULL, 0, 'Losa255terp5mn81w89HqRAAWlnDXk', '2023-10-18 00:07:50', '2023-10-18 00:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_details`
--

CREATE TABLE `subscriber_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriber_details`
--

INSERT INTO `subscriber_details` (`id`, `subscriber_id`, `device`, `ip`, `platform`, `browser`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-08 17:39:40', '2023-10-08 17:39:40'),
(2, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-08 17:41:45', '2023-10-08 17:41:45'),
(3, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-09 20:55:10', '2023-10-09 20:55:10'),
(4, 2, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-09 21:02:54', '2023-10-09 21:02:54'),
(5, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-09 21:15:53', '2023-10-09 21:15:53'),
(6, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-09 23:01:36', '2023-10-09 23:01:36'),
(7, 3, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-10 00:12:50', '2023-10-10 00:12:50'),
(8, 1, 'Mobile', '220.152.112.137', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-10 09:10:28', '2023-10-10 09:10:28'),
(9, 4, 'Mobile', '220.152.112.137', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-10 13:08:56', '2023-10-10 13:08:56'),
(10, 1, 'Mobile', '220.152.112.137', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-10 13:09:32', '2023-10-10 13:09:32'),
(11, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-10 14:15:29', '2023-10-10 14:15:29'),
(12, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-10 18:19:49', '2023-10-10 18:19:49'),
(13, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-10 18:36:17', '2023-10-10 18:36:17'),
(14, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-10 21:09:32', '2023-10-10 21:09:32'),
(15, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-11 00:50:18', '2023-10-11 00:50:18'),
(16, 5, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-11 02:00:53', '2023-10-11 02:00:53'),
(17, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-11 16:12:46', '2023-10-11 16:12:46'),
(18, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-13 19:03:48', '2023-10-13 19:03:48'),
(19, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-14 01:29:22', '2023-10-14 01:29:22'),
(20, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-16 19:44:25', '2023-10-16 19:44:25'),
(21, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-17 13:48:32', '2023-10-17 13:48:32'),
(22, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 117.0.0.0', '2023-10-17 13:49:38', '2023-10-17 13:49:38'),
(23, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-17 14:39:16', '2023-10-17 14:39:16'),
(24, 2, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 14:47:49', '2023-10-17 14:47:49'),
(25, 5, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 14:57:55', '2023-10-17 14:57:55'),
(26, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 14:59:12', '2023-10-17 14:59:12'),
(27, 2, 'Mobile', '157.119.186.134', 'iOS', 'Chrome version: 113.0.5672.121', '2023-10-17 15:01:35', '2023-10-17 15:01:35'),
(28, 2, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 15:03:28', '2023-10-17 15:03:28'),
(29, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 18:26:54', '2023-10-17 18:26:54'),
(30, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 23:24:57', '2023-10-17 23:24:57'),
(31, 5, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 23:25:13', '2023-10-17 23:25:13'),
(32, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-17 23:25:22', '2023-10-17 23:25:22'),
(33, 7, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-18 00:07:50', '2023-10-18 00:07:50'),
(34, 1, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-18 00:08:10', '2023-10-18 00:08:10'),
(35, 5, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 10:26:51', '2023-10-18 10:26:51'),
(36, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 10:27:01', '2023-10-18 10:27:01'),
(37, 1, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-18 14:10:42', '2023-10-18 14:10:42'),
(38, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-18 14:13:45', '2023-10-18 14:13:45'),
(39, 5, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 18:20:41', '2023-10-18 18:20:41'),
(40, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 18:20:50', '2023-10-18 18:20:50'),
(41, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 117.0.0.0', '2023-10-18 18:44:50', '2023-10-18 18:44:50'),
(42, 2, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 18:58:25', '2023-10-18 18:58:25'),
(43, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 19:02:00', '2023-10-18 19:02:00'),
(44, 5, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 21:26:06', '2023-10-18 21:26:06'),
(45, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-18 21:26:17', '2023-10-18 21:26:17'),
(46, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-19 12:43:35', '2023-10-19 12:43:35'),
(47, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-20 01:24:20', '2023-10-20 01:24:20'),
(48, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-20 01:25:25', '2023-10-20 01:25:25'),
(49, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-20 01:27:43', '2023-10-20 01:27:43'),
(50, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-20 01:28:10', '2023-10-20 01:28:10'),
(51, 2, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 12:40:26', '2023-10-22 12:40:26'),
(52, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 12:49:44', '2023-10-22 12:49:44'),
(53, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 12:50:08', '2023-10-22 12:50:08'),
(54, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 12:50:09', '2023-10-22 12:50:09'),
(55, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 12:51:08', '2023-10-22 12:51:08'),
(56, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 12:51:35', '2023-10-22 12:51:35'),
(57, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-22 12:58:07', '2023-10-22 12:58:07'),
(58, 2, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 13:50:19', '2023-10-22 13:50:19'),
(59, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 18:44:51', '2023-10-22 18:44:51'),
(60, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 22:44:00', '2023-10-22 22:44:00'),
(61, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 14:03:49', '2023-10-23 14:03:49'),
(62, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 20:55:08', '2023-10-23 20:55:08'),
(63, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 23:59:16', '2023-10-23 23:59:16'),
(64, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 01:37:03', '2023-10-24 01:37:03'),
(65, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 13:48:37', '2023-10-24 13:48:37'),
(66, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:12:02', '2023-10-24 14:12:02'),
(67, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:12:17', '2023-10-24 14:12:17'),
(68, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:28:16', '2023-10-24 14:28:16'),
(69, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:28:36', '2023-10-24 14:28:36'),
(70, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:34:19', '2023-10-24 14:34:19'),
(71, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:35:33', '2023-10-24 14:35:33'),
(72, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:35:45', '2023-10-24 14:35:45'),
(73, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:50:11', '2023-10-24 14:50:11'),
(74, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-24 14:51:45', '2023-10-24 14:51:45'),
(75, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 00:33:26', '2023-10-26 00:33:26'),
(76, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 00:33:40', '2023-10-26 00:33:40'),
(77, 1, 'Computer', '103.145.208.14', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 11:53:36', '2023-10-26 11:53:36'),
(78, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 15:00:22', '2023-10-26 15:00:22'),
(79, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 15:01:28', '2023-10-26 15:01:28'),
(80, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-26 15:04:56', '2023-10-26 15:04:56'),
(81, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 16:52:37', '2023-10-26 16:52:37'),
(82, 2, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 17:51:48', '2023-10-26 17:51:48'),
(83, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-27 00:25:11', '2023-10-27 00:25:11'),
(84, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-27 00:25:38', '2023-10-27 00:25:38'),
(85, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-27 15:17:15', '2023-10-27 15:17:15'),
(86, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-27 15:17:41', '2023-10-27 15:17:41'),
(87, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-27 15:43:28', '2023-10-27 15:43:28'),
(88, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-27 15:44:15', '2023-10-27 15:44:15'),
(89, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-27 15:47:19', '2023-10-27 15:47:19'),
(90, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-28 02:01:17', '2023-10-28 02:01:17'),
(91, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-28 02:06:46', '2023-10-28 02:06:46'),
(92, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-28 13:50:53', '2023-10-28 13:50:53'),
(93, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-28 19:06:38', '2023-10-28 19:06:38'),
(94, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-28 19:09:45', '2023-10-28 19:09:45'),
(95, 5, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-28 23:02:28', '2023-10-28 23:02:28'),
(96, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-28 23:29:24', '2023-10-28 23:29:24'),
(97, 1, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 12:05:37', '2023-10-29 12:05:37'),
(98, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 12:07:11', '2023-10-29 12:07:11'),
(99, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 14:25:29', '2023-10-29 14:25:29'),
(100, 2, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 14:25:30', '2023-10-29 14:25:30'),
(101, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-29 14:27:18', '2023-10-29 14:27:18'),
(102, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 17:29:27', '2023-10-29 17:29:27'),
(103, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 17:33:03', '2023-10-29 17:33:03'),
(104, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 17:44:10', '2023-10-29 17:44:10'),
(105, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 17:59:36', '2023-10-29 17:59:36'),
(106, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-29 18:02:38', '2023-10-29 18:02:38'),
(107, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 18:08:09', '2023-10-29 18:08:09'),
(108, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-29 18:09:28', '2023-10-29 18:09:28'),
(109, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 18:19:03', '2023-10-29 18:19:03'),
(110, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 18:21:39', '2023-10-29 18:21:39'),
(111, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 18:25:08', '2023-10-29 18:25:08'),
(112, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 18:35:36', '2023-10-29 18:35:36'),
(113, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-29 18:42:29', '2023-10-29 18:42:29'),
(114, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 18:42:54', '2023-10-29 18:42:54'),
(115, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-29 19:27:17', '2023-10-29 19:27:17'),
(116, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-29 20:06:58', '2023-10-29 20:06:58'),
(117, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-29 20:06:58', '2023-10-29 20:06:58'),
(118, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 21:27:04', '2023-10-29 21:27:04'),
(119, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 23:36:16', '2023-10-29 23:36:16'),
(120, 5, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 23:39:29', '2023-10-29 23:39:29'),
(121, 6, 'Computer', '103.181.69.44', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-29 23:39:47', '2023-10-29 23:39:47'),
(122, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 00:26:52', '2023-10-30 00:26:52'),
(123, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 00:32:19', '2023-10-30 00:32:19'),
(124, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 00:51:10', '2023-10-30 00:51:10'),
(125, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 00:51:10', '2023-10-30 00:51:10'),
(126, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 11:46:10', '2023-10-30 11:46:10'),
(127, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 12:00:45', '2023-10-30 12:00:45'),
(128, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 12:16:19', '2023-10-30 12:16:19'),
(129, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-30 12:48:24', '2023-10-30 12:48:24'),
(130, 6, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 15:02:04', '2023-10-30 15:02:04'),
(131, 2, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 16:24:17', '2023-10-30 16:24:17'),
(132, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 16:56:29', '2023-10-30 16:56:29'),
(133, 6, 'Computer', '103.141.134.33', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 16:59:45', '2023-10-30 16:59:45'),
(134, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-30 17:00:29', '2023-10-30 17:00:29'),
(135, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-30 22:29:28', '2023-10-30 22:29:28'),
(136, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-30 23:05:17', '2023-10-30 23:05:17'),
(137, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-30 23:25:08', '2023-10-30 23:25:08'),
(138, 6, 'Mobile', '103.141.134.33', 'AndroidOS', 'Chrome version: 118.0.0.0', '2023-10-30 23:25:24', '2023-10-30 23:25:24'),
(139, 1, 'Computer', '157.119.186.134', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-31 00:08:21', '2023-10-31 00:08:21'),
(140, 1, 'Computer', '103.146.54.254', 'Windows', 'Chrome version: 118.0.0.0', '2023-11-02 12:44:16', '2023-11-02 12:44:16'),
(141, 1, 'Computer', '103.146.54.254', 'Windows', 'Chrome version: 119.0.0.0', '2023-11-03 00:00:21', '2023-11-03 00:00:21'),
(142, 1, 'Computer', '103.146.54.254', 'Windows', 'Chrome version: 119.0.0.0', '2023-11-03 00:08:34', '2023-11-03 00:08:34'),
(143, 1, 'Computer', '103.146.54.254', 'Windows', 'Chrome version: 119.0.0.0', '2023-11-03 00:14:11', '2023-11-03 00:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `phone_num`, `problem`, `contacted`, `created_at`, `updated_at`) VALUES
(1, '01717105379', 'test', 1, '2022-01-14 21:37:57', '2022-01-23 14:23:45'),
(2, '67 322 91 10', 'Hello,\r\n\r\nIt is with sad regret to inform you that DataList.biz is shutting down. We have made all our databases available for you at a one-time fee.\r\n\r\nYou can visit us on DataList.biz\r\n\r\nRegards.\r\nDarla', 0, '2022-03-12 21:54:16', '2022-03-12 21:54:16'),
(3, '+1 304-873-4360', 'It is with sad regret to inform you DataList.biz is shutting down on 25 March 2022. \r\n\r\nWe have made available databases per country for all companies available.. \r\n\r\nYou can view our samples and download databases instantly on our website DataList.biz', 0, '2022-03-23 18:03:43', '2022-03-23 18:03:43'),
(4, '079 0005 7779', 'Hello.\r\n\r\nWe are offering Bullet Proof SMTP servers that never get suspended. Email as much as you want.\r\n\r\nDMCA ignored, bulletproof locations, 100% uptime guaranteed, unlimited data transfer, and 24/7/365 support.\r\n\r\n100 Spots available. BulletProofSMTP.org', 1, '2022-04-13 00:33:48', '2022-10-10 21:48:59'),
(5, '0327 4375911', 'Would you like to send targeted messages to website owners, just like this one?\r\n\r\nContact Page Marketing..  \r\n\r\nWe will deliver your message to website owners, excellent for B2B products.\r\n\r\nhttps://cutt.ly/ChatToUs', 1, '2022-06-22 05:24:13', '2022-10-10 21:49:09'),
(6, '079 2186 1640', 'Convert napzone.games to an app with one click!\r\n\r\n80% of users browse websites from their phones. \r\n\r\nHave the App send out push notifications without any extra marketing costs!\r\n\r\nMakeMySiteMobile.com', 1, '2022-07-06 03:35:23', '2022-08-30 23:17:03'),
(7, '(02) 4088 5759', 'Hi,\r\n\r\nYour website is only listed in 8 out of a possible 12,489 directories.\r\n\r\nWe are a service that lists your website in all these directories.\r\n\r\nPlease visit us on DirectoryBump.com to find our more.\r\n\r\nRegards,\r\nEdythe Mcafee', 0, '2023-05-18 19:13:04', '2023-05-18 19:13:04'),
(8, '01994037309', 'Hi. This is a problem when I\'m using this it will be close.', 0, '2023-10-31 00:17:19', '2023-10-31 00:17:19'),
(9, '01994037306', 'sadfsadfsadfsd', 0, '2023-10-31 00:17:41', '2023-10-31 00:17:41'),
(10, '01994037306', 'Hii', 0, '2023-10-31 00:19:35', '2023-10-31 00:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@napzone.games', '$2y$10$lrqsrx2CiQyOBLUr/qXucuWhYsIiq4LqeQhQ53jx2h.LDJjKlh92W$2y$10$FRfEvY.Ovo6ElPO2XT53ouqIuO7n46.wgP0zv6vuiBjRXVSCQFJnK$2y$10$k3/wBQ4wXZREjXSZBApml.IGFpmQQuvtIuxK.ngTqd5Xex7EC47su$2y$10$r8pv5sCgkNhQcqsKsxJLc.DMMnTKMSHMXsdZgGc2DI7b4Etf1410q', NULL, '2022-01-05 12:08:30', '2022-01-05 12:08:30'),
(4, 'sohel rana', 'admin@gmail.com', '$2a$12$8gE/KqRiWEEr9F6rNrJ3NuULZUuVtU0..nu/rvZC.h7ngHC8ufUr2', NULL, '2023-10-22 12:45:28', '2023-10-22 12:45:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_games`
--
ALTER TABLE `favorite_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `games_game_name_unique` (`game_name`),
  ADD UNIQUE KEY `games_game_thumbnail_unique` (`game_thumbnail`),
  ADD UNIQUE KEY `games_game_file_unique` (`game_file`);

--
-- Indexes for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_categories_game_id_foreign` (`game_id`),
  ADD KEY `game_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `game_plays`
--
ALTER TABLE `game_plays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_plays_subscriber_id_foreign` (`subscriber_id`),
  ADD KEY `game_plays_game_id_foreign` (`game_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_plans`
--
ALTER TABLE `purchase_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_plans_plan_id_foreign` (`plan_id`),
  ADD KEY `purchase_plans_subscriber_id_foreign` (`subscriber_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_unique_id_unique` (`unique_id`);

--
-- Indexes for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriber_details_subscriber_id_foreign` (`subscriber_id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_games`
--
ALTER TABLE `favorite_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `game_plays`
--
ALTER TABLE `game_plays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_plans`
--
ALTER TABLE `purchase_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD CONSTRAINT `game_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_categories_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `game_plays`
--
ALTER TABLE `game_plays`
  ADD CONSTRAINT `game_plays_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_plays_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_plans`
--
ALTER TABLE `purchase_plans`
  ADD CONSTRAINT `purchase_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `purchase_plans_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`);

--
-- Constraints for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  ADD CONSTRAINT `subscriber_details_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
