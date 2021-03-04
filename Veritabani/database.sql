-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 Nis 2014, 20:29:45
-- Sunucu sürümü: 5.5.36-cll
-- PHP Sürümü: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `ndefter_1nuo3t6dpe2f4tme3rqdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aktifet`
--

CREATE TABLE IF NOT EXISTS `aktifet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aktifhash` varchar(250) NOT NULL,
  `uyeId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Tablo döküm verisi `aktifet`
--

INSERT INTO `aktifet` (`id`, `aktifhash`, `uyeId`) VALUES
(44, '398aef91324115715e5cfc7585708643', 4),
(46, '5ba664ea5514ac172928dee34bb0abe2', 6),
(47, 'e572b1a028a4a25596eed56d2a4f9b49', 7),
(49, '616136cc50dd7e7e05309b3c61cc9072', 7),
(50, '2f774917612d20423dcad61b732341fd', 4),
(53, 'fa58b9a2106b5b97a98a0f6ad02fcab2', 13),
(55, 'c4ec07424b86719b30e54b9cdc13de90', 15),
(56, 'dd6dd36ee00a8823a80a985628875e20', 16),
(57, '781c8cc996d05527f6ec91f85d92248b', 17);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notlar`
--

CREATE TABLE IF NOT EXISTS `notlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Not''un Id''si',
  `ekleyen_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Notu Ekleyen Kullanıcı Id''si',
  `baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT '' COMMENT 'Notun Başlığı',
  `icerik` varchar(3000) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Notun İçeriği',
  `tarih` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT '' COMMENT 'Notun Son Güncelleme Tarihi',
  `sadece_tarih` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Notun Gün-Ay-Yıl Tarihi (Bugün Eklenen Not Sayısını Görüntülemek İçin)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `notlar`
--

INSERT INTO `notlar` (`id`, `ekleyen_id`, `baslik`, `icerik`, `tarih`, `sadece_tarih`) VALUES
(1, 12, 'Uganda', 'Bu sefer calisiyor...', '2014-03-18 15:52:24', '2014-03-18'),
(2, 14, '1', 'deneme\r\n', '2014-03-19 01:05:45', '2014-03-19'),
(3, 14, 'Osman Simsek', 'https://www.youtube.com/watch?v=lOOJRowFqkU', '2014-03-19 01:52:09', '2014-03-19'),
(6, 11, 'ilk not', 'Deneme', '2014-03-23 23:49:48', '2014-03-23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifremiunuttum`
--

CREATE TABLE IF NOT EXISTS `sifremiunuttum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unuttumHash` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uyeId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `sifremiunuttum`
--

INSERT INTO `sifremiunuttum` (`id`, `unuttumHash`, `uyeId`) VALUES
(1, '40795304', 12),
(2, '1549617903', 14),
(3, '2323608286', 14);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE IF NOT EXISTS `uye` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kullanıcı id''si',
  `kadi` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Kullanıcı Adı',
  `adi` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Kullanıcı Adı ve Soyadı',
  `sifre` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Şifre',
  `mail` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Mail Adresi',
  `tel` varchar(20) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Kullanıcı Telefon Numarası',
  `dogum` varchar(25) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Kullanıcı Doğum Tarihi',
  `cinsiyet` varchar(5) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Kullanıcı Cinsiyeti',
  `ktarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Kayıt Tarihi',
  `ziyaret` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '' COMMENT 'Kullanıcı Ziyaret Sayısı',
  `aktif` int(2) NOT NULL DEFAULT '0' COMMENT 'Kullanıcı Aktifliği',
  `son_giris` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Sisteme Giriş Yapılan Son Tarihi',
  `aktif_giris` varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '' COMMENT 'Sisteme Giriş Yapılan Aktif Tarihi',
  `son_ip` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Sisteme Giriş Yapılan Son Ip''si',
  `aktif_ip` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Sisteme Giriş Yapılan Aktif Ip''si',
  `tema` int(2) NOT NULL DEFAULT '0' COMMENT 'Kullanıcı Teması',
  `baslangicturu` varchar(200) COLLATE utf8_turkish_ci NOT NULL COMMENT 'Başlangıç Turu İçin Değer',
  `profil_resmi` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'Profil Fotoğrafı',
  `dil` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=22 ;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `kadi`, `adi`, `sifre`, `mail`, `tel`, `dogum`, `cinsiyet`, `ktarih`, `ziyaret`, `aktif`, `son_giris`, `aktif_giris`, `son_ip`, `aktif_ip`, `tema`, `baslangicturu`, `profil_resmi`, `dil`) VALUES
(11, 'sefer', 'sefer', '2357797570', 'sfrdmrc@gmail.com', '', '', '', '2014-03-17 23:36:41', '', 1, '2014-03-28', '2014-03-28', '178.233.173.202', '178.233.173.202', 0, 'false', '376147.jpg', 0),
(14, 'dneme', 'dneme', '3455015357', 'duzoylummehmet@gmail.com', '', '', '', '2014-03-18 20:09:54', '', 1, '2014-03-19', '2014-03-19', '197.157.0.8', '41.202.233.187', 0, 'false', '', 0),
(15, 'sağanne', 'sağanne', '417171161', 'tomaklar@hotmail.com', '', '', '', '2014-03-18 20:12:33', '', 0, '', '', '', '', 0, '', '', 0),
(16, 'asdfg', 'asdfgcvx', '3313226584', 'm_duzoylum@hotmail.com', '123456', '', 'erkek', '2014-03-18 20:16:19', '', 1, '2014-03-18', '2014-03-18', '', '197.157.0.8', 0, 'false', '', 0),
(19, 'kullanici', 'İsim Soyisim', '3168364924', 'sfrdmrc@hotmail.com', '', '', '', '2014-03-23 21:59:42', '', 1, '2014-03-24', '2014-03-27', '41.202.233.180', '41.202.233.180', 0, 'false', '484933.jpg', 0),
(20, 'kurnaz5', 'Hakan ANAR', '1425133695', 'anarhakan@gmail.com', '', '', '', '2014-03-28 11:24:20', '', 1, '', '2014-03-28', '', '188.57.137.150', 0, 'false', '', 0),
(21, 'osman', 'taşgın', '1052659448', 'tasginosman@gmail.com', '', '', '', '2014-03-31 13:17:33', '', 1, '', '2014-03-31', '', '194.27.3.226', 0, 'false', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
