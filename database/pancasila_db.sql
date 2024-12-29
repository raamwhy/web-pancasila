-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 05:42 PM
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
-- Database: `pancasila_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`) VALUES
(1, 'rishfan', 'rishfan@gmail.com', 'rishfan'),
(2, 'imam', 'imam@gmail.com', 'imam1234');
(3, 'jaya', 'jaya@gmail.com', 'jaya1234');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tgl_dibuat` date DEFAULT NULL,
  `heroImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `tgl_dibuat`, `heroImg`) VALUES
(4, 'Contoh lagi ya sayang :>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam unde officia beatae! Aspernatur facere similique a, aut, labore adipisci suscipit molestias soluta, sapiente sint minus eos nemo atque repellendus quia!\r\nSoluta reprehenderit dolore, sequi officia atque exercitationem esse quia necessitatibus dignissimos cumque libero. Ratione, eos. Earum, nemo et fuga nobis reiciendis non tenetur nostrum dolorem esse, impedit officiis laboriosam sunt?\r\nSunt nostrum laborum ratione, dignissimos est ipsa facere repellat, libero beatae, saepe minima reiciendis atque itaque possimus voluptates expedita esse ad. Non, velit ratione ipsam itaque necessitatibus sunt perferendis expedita?\r\nFuga ducimus impedit voluptatem nemo alias exercitationem facilis asperiores. Molestiae magnam aut corporis incidunt corrupti natus quos, pariatur ratione voluptate cupiditate. Impedit labore dolorem rerum rem consequatur quibusdam ipsa quia?\r\n\r\nConsequatur facilis debitis id deleniti odit tempora delectus dignissimos exercitationem. Ipsum obcaecati iste quam in magnam aliquam totam molestiae accusamus, provident maxime, atque quibusdam, maiores praesentium architecto dignissimos laborum unde.', '2024-12-13', 'perjanjian.jpg'),
(5, 'contoh artikel versi berapapun dah', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis totam soluta doloribus quisquam tempora placeat blanditiis sint. Exercitationem voluptates quisquam, neque ipsum, incidunt impedit, hic unde eos porro saepe earum.\r\n\r\n            Non, iure quia error commodi ut consectetur cumque voluptas saepe, est libero doloribus molestias nesciunt fugiat ex at veniam amet recusandae asperiores illum eveniet tempora id distinctio nobis! Praesentium, velit!\r\n\r\n            Dolore, et! Officiis ullam error maxime odit quia quisquam ipsam, blanditiis, deleniti repudiandae, saepe cupiditate esse nam animi reiciendis ad quo a sed doloribus voluptatem? Eos laborum culpa enim modi!', '2024-12-13', 'bendera.jpg'),
(6, 'ini judul', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed illo quam nisi. Officiis quasi dolorum eius iusto. Cupiditate fugit ad ratione error, velit rerum voluptatem nemo, corporis, nisi veritatis repellendus?\r\n            Asperiores quibusdam reiciendis culpa libero illo laborum quasi explicabo commodi enim obcaecati dolorem, eos ipsa! Veniam laudantium sed ea eius eum. Vel dolor dolorum maxime dicta, voluptatum magni consectetur reiciendis.\r\n            Iste possimus fugiat enim deserunt perferendis aliquid, temporibus sequi quasi harum omnis. Molestias, quaerat voluptatum iusto saepe, commodi deserunt ducimus doloremque beatae dignissimos perferendis optio maxime! Placeat eveniet facere saepe?\r\n\r\n            <b>Aliquid fugit ipsum similique ratione? Deserunt necessitatibus cupiditate odit. Sint, modi iure dolorem aperiam, porro optio repudiandae </b>eaque laborum accusantium corporis aliquam magnam expedita fugit dolore perferendis magni nam laudantium.\r\n            Rerum consequuntur eos blanditiis facere repudiandae. Libero quaerat dicta debitis, recusandae impedit id, nesciunt harum eius a quidem reprehenderit expedita eos necessitatibus inventore, perspiciatis rem repellat rerum aliquam dolor nihil?\r\n            Consequatur pariatur laboriosam voluptatem? Repellendus nemo similique ab nesciunt iste maiores laudantium odio! Voluptas quia nesciunt inventore repellendus atque ipsa harum, debitis omnis. Itaque aut at, velit nam vel laudantium?\r\n            Non quaerat autem corporis repellat soluta placeat mollitia, sapiente illo, laborum, quis nulla maxime neque nostrum quo ut perspiciatis est saepe iusto sequi tempora eveniet ducimus. Magni ut amet quod.\r\n\r\n            Odio officiis quo, eos libero omnis facilis quibusdam distinctio quia incidunt unde. Atque, a architecto dolore voluptates veniam autem quaerat distinctio, sed nihil amet sapiente dolorum repellendus expedita ducimus tenetur?', '2024-12-13', 'us.jpg'),
(7, 'ini judul part 2', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio nisi voluptate suscipit saepe deleniti sapiente praesentium! Aperiam iste quam ex, tenetur similique natus, harum eius obcaecati quisquam ipsum molestias? Assumenda?\r\n            Veritatis, dignissimos cum! Quibusdam a, quidem qui inventore amet nobis at. Fugit similique ducimus dolorum illo odit unde quod saepe vel doloribus dicta ab, enim pariatur blanditiis, quae ipsa quis?\r\n            Vero amet exercitationem, impedit voluptas expedita delectus? Quae ad quis reiciendis, dolorum voluptate adipisci temporibus sint, voluptates, consequuntur illum aliquid expedita repudiandae molestias totam dolores ea minima! Quo, repellendus provident.\r\n            Non delectus iste voluptas atque doloribus minus tempora iure corrupti ipsum libero placeat nobis, cupiditate adipisci totam animi enim possimus, omnis deleniti quod eaque nesciunt. Magnam, aliquid aperiam. Qui, minima.\r\n\r\n            Aut quidem sit inventore saepe, dolores earum illo magnam quis fugit consequatur quo repellendus facere doloremque libero recusandae ipsa, quae modi vel! Provident perspiciatis quam fugiat doloremque mollitia, quaerat totam.\r\n            Blanditiis totam possimus aperiam optio sint ipsa et quis at praesentium in ipsum officia, ad ducimus itaque fuga atque magni incidunt delectus? Incidunt obcaecati dicta natus unde quo, beatae autem!', '2024-12-13', 'intro.jpg'),
(8, 'Gacorr kang', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus sed laborum sit dolor tempora iusto, incidunt repellendus nisi iste assumenda eveniet id iure in dignissimos, mollitia atque amet ratione aperiam. Iure odit sequi nostrum dolorem expedita, cum, doloremque ad similique omnis numquam eius asperiores quo! Ea, inventore pariatur. Cum quae laborum id reiciendis in quia! Delectus sit libero sunt eius! Nesciunt, consectetur, quo repudiandae minus eligendi nihil magni possimus eius temporibus fugit ipsa natus! Dolores laborum qui harum sed explicabo voluptatum deleniti, illum est ut nesciunt nobis illo, dolorem animi. Labore totam, ad repudiandae iure ratione exercitationem quisquam. Iusto sunt, beatae commodi eius placeat, omnis fuga accusantium reiciendis ipsa debitis perspiciatis delectus illo laboriosam dicta est! Quam, nobis distinctio! Sequi. Suscipit aliquid adipisci animi id dolores doloribus magnam officia cumque aspernatur.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\">Quis culpa molestias minima, voluptas laborum aperiam aspernatur est aliquid, id placeat enim animi nostrum ipsa saepe magni deleniti. Modi sunt, eaque a cum sapiente reprehenderit molestias ea vero. Tenetur repellendus</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\">Ini gambar, NGERTI KAN LO?!</p>\r\n<p>&nbsp;</p>\r\n<p><strong>&nbsp;molestias odio autem necessitatibus hic commodi, atque dignissimos suscipit a, qui non sint id consectetur itaque velit officiis? Repellat voluptatem</strong> quidem, totam fugit <span style=\"text-decoration: underline;\"><strong>non dolorum</strong></span> nobis labore in, sint, debitis perspiciatis? Nulla quos ex fugit quas, ullam odio aspernatur ipsa consequuntur repellat natus eveniet, provident omnis. Iste, commodi? Eius ad nulla dolores ratione est! Exercitationem ipsam nam alias, repudiandae voluptas libero, quas iure illo voluptatem laudantium quod. Quia ullam at repudiandae facere doloremque nobis, magni expedita autem minima. Necessitatibus repellendus sint delectus</p>\r\n<ol style=\"list-style-type: upper-alpha;\">\r\n<li>eum enim harum consectetur impedit nemo a?</li>\r\n<li>Quasi aspernatur mollitia quibusdam inventore quisquam et officiis earum quo expedita magni labore ullam temporibus distinctio, obcaecati</li>\r\n<li>incidunt quod! Cumque, earum. Soluta dolore amet necessitatibus laborum maiores optio nemo velit fugit commodi dicta vero beatae placeat qui aspernatur non corporis est ratione minima excepturi, ad sequi pariatur quia aliquam?</li>\r\n</ol>\r\n<ul>\r\n<li>ad repudiandae iure ratione exercitationem quisquam. Iusto sunt,</li>\r\n<li>beatae commodi eius placeat, omnis fuga accusantium reiciendis ipsa debitis</li>\r\n<li>perspiciatis delectus illo laboriosam dicta est! Quam, nobis distinctio! Sequi. Suscipit aliquid adipisci animi id dolores doloribus magnam officia cumque aspernatur.</li>\r\n</ul>', '2024-12-13', 'bendera.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
