-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 21, 2023 at 01:08 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hal_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `no_ticket` int(11) NOT NULL,
  `seat_dt_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `total_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `cust_id`, `show_id`, `no_ticket`, `seat_dt_id`, `booking_date`, `total_amount`) VALUES
(18, 9, 29, 2, 19, '2023-03-04', '3000'),
(19, 9, 28, 2, 20, '2023-03-03', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `location`) VALUES
(1, 'HALシネマ', '東京新宿区');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `movie_name_en` varchar(100) NOT NULL,
  `movie_banner` varchar(100) NOT NULL,
  `movie_banner2` varchar(100) NOT NULL,
  `rel_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `director` varchar(50) NOT NULL,
  `cast` text NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `movie_name_en`, `movie_banner`, `movie_banner2`, `rel_date`, `duration`, `director`, `cast`, `description`) VALUES
(1, 'ＯＮＥ　ＰＩＥＣＥ　ＦＩＬＭ　ＲＥＤ', 'ＯＮＥ　ＰＩＥＣＥ　ＦＩＬＭ　ＲＥＤ\r\n', 'images/movie_banner/one_piece_b1.jpeg', 'images/movie_banner/one_piece_b2.jpeg', '2022-08-06', 115, '谷口悟朗', '声の出演：田中真弓、中井和哉、岡村明美、山口勝平、平田広明、大谷育江、山口由里子、矢尾一樹、チョー、宝亀克寿、名塚佳織、Ａｄｏ、津田健次郎、池田秀一、山田裕貴、せいや（霜降り明星）、粗品（霜降り明星）', '世界で最も愛されている歌手、ウタ。\r\n素性を隠したまま発信するその歌声は“別次元”と評されていた。そんな彼女が初めて公の前に姿を現すライブが開催される。色めき立つ海賊たち、目を光らせる海軍、そして何も知らずにただ彼女の歌声を楽しみにきたルフィ率いる麦わらの一味たち、ありとあらゆるウタファンが会場を埋め尽くす中、今まさに全世界待望の歌声が響き渡ろうとしていた。\r\n物語は、彼女が“シャンクスの娘”という衝撃の事実から動き出す―。'),
(2, 'アバター：ウェイ・オブ・ウォーター', 'AVATAR: THE WAY OF WATER', 'images/movie_banner/avatar_b1.jpeg', 'images/movie_banner/avatar_b2.jpeg', '2022-12-06', 192, 'ジェームズ・キャメロン', 'サム・ワーシントン、ゾーイ・サルダナ、シガーニー・ウィーバー\r\n', '第1作目から約10年後の惑星パンドラでのジェイクとネイティリの子供たちからなる家族の物語。\r\n一家は神聖なる森を追われ海の部族に助けを求めるが、その楽園のような海辺の世界にも人類の侵略の手が迫っていた・・・。'),
(4, '映画ドラえもん　のび太と空の理想郷', 'DORAEMON 2023', 'images/movie_banner/doraemon_b1.jpeg', 'images/movie_banner/doraemon_b2.jpeg', '2024-04-30', 107, '堂山卓見', '声の出演：水田わさび、大原めぐみ、かかずゆみ、木村昴、関智一、井上麻里奈、水瀬いのり、永瀬廉（Ｋｉｎｇ　＆　Ｐｒｉｎｃｅ）、山里亮太（南海キャンディーズ）、藤本美貴', '空に謎の三日月型の島を見つけたのび太は「あれこそ僕が探していたユートピアだ！」と言い張り、ドラえもんたちと一緒にひみつ道具の飛行船『タイムツェッペリン』で、その島を探しに出かけることに！色々な時代・場所を探してやっと見つけたその正体は、誰もがパーフェクトになれる夢のような楽園＜パラダピア＞だった！そしてそこで出会ったのは、何もかも完璧なパーフェクトネコ型ロボット・ソーニャ。すっかり仲良くなったドラえもんたちとソーニャだったが、どうやらこの楽園には大きな秘密が隠されているようで・・・。はたしてのび太たちは、その楽園の謎を解き明かすことができるのか！？'),
(5, 'エブリシング・エブリウェア・オール・アット・ワンス', 'EVERYTHING EVERYWHERE ALL AT ONCE', 'images/movie_banner/everything_b1.jpeg', 'images/movie_banner/everything_b2.jpeg', '2024-04-30', 139, 'ダニエルズ', 'ミシェル・ヨー、キー・ホイ・クァン、ジェイミー・リー・カーティス\r\n', 'エヴリンは疲れ果てていた。経営するコインランドリーの決算に、国税局からイチャモンをつけられて、税金の申告をやり直さなければならない。父親はボケてきたのに相変わらず頑固で介護も大変。娘のジョイは元々反抗的な上に、恋人のベッキーの存在を理解しない母親に不満を抱いている。夫のウェイモンドは優しいが、優柔不断で頼りにならない。そんな中、国税局で役人に絞られていると、突然夫が豹変。別の宇宙のウェイモンドだと名乗る彼はエヴリンに、「全宇宙にカオスをもたらす強大な悪を倒せるのは君だ」と宣告！まさかと驚くエヴリンだが、悪の手先に襲われマルチバースにジャンプ！全宇宙を舞台にした闘いが幕を開ける！'),
(8, 'アントマン＆ワスプ：クアントマニア', 'ANT-MAN AND THE WASP: QUANTUMANIA', 'images/movie_banner/antman_b1.jpeg', 'images/movie_banner/antman_b2.jpeg', '2022-08-06', 125, 'ペイトン・リード', 'ポール・ラッド、エヴァンジェリン・リリー、マイケル・ダグラス、ミシェル・ファイファー、ジョナサン・メジャース、キャスリン・ニュートン、ビル・マーレイ', '新たな「アベンジャーズ」へ続く物語が、ついに始動。\r\n身長わずか1.5cmの最小ヒーロー、アントマンとワスプは、<量子世界>に導く装置を生み出した娘キャシー達とともに、ミクロより小さな世界へ引きずり込まれてしまう。'),
(9, 'すずめの戸締まり', 'SUZUME NO TOJIMARI', 'images/movie_banner/suzume_no_tojimari_b1.jpeg', 'images/movie_banner/suzume_no_tojimari_b2.jpeg', '2022-08-06', 122, '新海誠', '声の出演：原菜乃華、松村北斗、深津絵里、染谷将太、伊藤沙莉、花瀬琴音、花澤香菜、松本白鸚', '世界で最も愛されている歌手、ウタ。\r\n素性を隠したまま発信するその歌声は“別次元”と評されていた。そんな彼女が初めて公の前に姿を現すライブが開催される。色めき立つ海賊たち、目を光らせる海軍、そして何も知らずにただ彼女の歌声を楽しみにきたルフィ率いる麦わらの一味たち、ありとあらゆるウタファンが会場を埋め尽くす中、今まさに全世界待望の歌声が響き渡ろうとしていた。\r\n物語は、彼女が“シャンクスの娘”という衝撃の事実から動き出す―。'),
(10, 'ザ・スーパーマリオブラザーズ・ムービー', 'THE SUPER MARIO BROS. MOVIE', 'images/movie_banner/mario_b1.jpeg', 'images/movie_banner/mario_b2.jpeg', '2024-04-30', 115, 'アーロン・ホーヴァス、マイケル・ジェレニック', '声の出演：宮野真守、志田有彩、畠中祐、三宅健太、関智一\r\n[ザ・スーパーマリオブラザーズ・ムービー ]', 'イルミネーションと任天堂が共同で制作する、「スーパーマリオ」のアニメーション映画。監督は『ティーン・タイタンズGO！トゥ・ザ・ムービー』のアーロン・ホーヴァスとマイケル・ジェレニック、脚本は『レゴ? ムービー2』『ミニオンズ フィーバー』のマシュー・フォーゲルが担当。イルミネーションの創業者であり最高経営責任者のクリス・メレダンドリと、任天堂の代表取締役フェローである宮本茂がプロデューサーを務め、ユニバーサル・ピクチャーズと任天堂が共同出資し、ユニバーサル・ピクチャーズによって全世界公開される。'),
(11, 'ダンジョンズ＆ドラゴンズ／アウトローたちの誇り', 'DUNGEONS AND DRAGONS HONOR AMONG THIEVES', 'images/movie_banner/dnd_b1.jpeg', 'images/movie_banner/dnd_b2.jpeg', '2023-04-08', 134, 'ジョン・フランシス・デイリー、ジョナサン・ゴールドスタイン', 'クリス・パイン、ミシェル・ロドリゲス、ジャスティス・スミス、ソフィア・リリス、レゲ＝ジャン・ペイジ、ヒュー・グラント', '様々な種族、モンスターが生息する世界、フォーゴトン・レルム。盗賊のエドガン（クリス・パイン）と彼の相棒である戦士のホルガ（ミシェル・ロドリゲス）は、ある目的のために旅に出る。\r\n特殊能力を持った魔法使いサイモン（ジャスティス・スミス）とドルイドのドリック（ソフィア・リリス）、そして聖騎士のゼンク（レゲ＝ジャン・ペイジ）とパーティを組み、全世界を脅かす巨大な悪の陰謀に対峙することになる…。');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `seat_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `cust_id`, `show_id`, `seat_no`) VALUES
(19, 9, 29, '2'),
(20, 9, 28, '2');

-- --------------------------------------------------------

--
-- Table structure for table `seat_reserved`
--

CREATE TABLE `seat_reserved` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `seat_number` varchar(50) NOT NULL,
  `reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat_reserved`
--

INSERT INTO `seat_reserved` (`id`, `show_id`, `cust_id`, `seat_number`, `reserved`) VALUES
(35, 29, 9, 'R4S5', 1),
(36, 29, 9, 'R4S6', 1),
(37, 28, 9, 'R3S4', 1),
(38, 28, 9, 'R3S5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time_id` int(11) NOT NULL,
  `no_seat` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `ticket_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`id`, `movie_id`, `show_date`, `show_time_id`, `no_seat`, `cinema_id`, `ticket_price`) VALUES
(2, 1, '2023-01-01', 6, 40, 1, 1500),
(5, 1, '2023-01-01', 7, 40, 1, 1500),
(7, 1, '2023-01-01', 8, 40, 1, 1500),
(8, 1, '2023-01-01', 9, 40, 1, 1500),
(9, 2, '2023-01-02', 7, 40, 1, 1500),
(10, 2, '2023-01-02', 9, 40, 1, 1500),
(11, 1, '2023-01-11', 9, 50, 1, 1500),
(12, 1, '2023-01-13', 6, 50, 1, 1500),
(13, 8, '2023-02-28', 6, 50, 1, 1500),
(14, 8, '2023-02-28', 8, 50, 1, 1500),
(15, 8, '2023-02-28', 9, 50, 1, 1500),
(16, 8, '2023-02-27', 6, 50, 1, 1300),
(17, 8, '2023-02-27', 7, 50, 1, 1500),
(18, 8, '2023-02-27', 8, 50, 1, 1500),
(19, 8, '2023-02-27', 9, 50, 1, 1500),
(20, 2, '2023-03-02', 6, 50, 1, 1500),
(21, 2, '2023-03-02', 7, 50, 1, 1500),
(22, 2, '2023-03-03', 6, 50, 1, 1500),
(23, 1, '2023-02-28', 6, 50, 1, 1500),
(24, 1, '2023-03-02', 6, 50, 1, 1300),
(25, 9, '2023-03-02', 6, 50, 1, 1500),
(26, 9, '2023-03-02', 7, 50, 1, 1500),
(27, 1, '2023-03-03', 6, 50, 1, 1500),
(28, 1, '2023-03-03', 7, 50, 1, 1500),
(29, 8, '2023-03-04', 6, 50, 1, 1500),
(30, 8, '2023-03-02', 8, 50, 1, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`id`, `time`) VALUES
(6, '10:00 - 13:00'),
(7, '13:30 - 16:30'),
(8, '17:00 - 20:00'),
(9, '20:30 - 23:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(8, 'testing1', 'testing@gmail.com', '654321', '2022-12-31 19:48:24'),
(9, 'dev123', 'dev123@gmail.com', '123dev', '2023-01-03 01:39:19'),
(10, 'test_user', 'test@gmail.com', 'test1234', '2023-03-01 01:08:07'),
(11, 'a', 'a@gmail.com', 'a', '2023-03-03 15:34:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `seat_dt_id` (`seat_dt_id`),
  ADD KEY `booking_ibfk_1` (`cust_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `seat_ibfk_1` (`cust_id`);

--
-- Indexes for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `cuts_id` (`cust_id`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `show_time_id` (`show_time_id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `show`
--
ALTER TABLE `show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`seat_dt_id`) REFERENCES `seat` (`id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`);

--
-- Constraints for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD CONSTRAINT `seat_reserved_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`),
  ADD CONSTRAINT `seat_reserved_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `show`
--
ALTER TABLE `show`
  ADD CONSTRAINT `show_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `show_ibfk_3` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `show_ibfk_4` FOREIGN KEY (`show_time_id`) REFERENCES `show_time` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
