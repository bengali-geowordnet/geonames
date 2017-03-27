<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 --
-- Database: `farhanar_geonames`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1codes`
--

CREATE TABLE IF NOT EXISTS `admin1codes` (
  `code` char(6) DEFAULT NULL,
  `name` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin1codesascii`
--

CREATE TABLE IF NOT EXISTS `admin1codesascii` (
  `code` char(6) DEFAULT NULL,
  `name` text,
  `nameAscii` text,
  `geonameid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin2codes`
--

CREATE TABLE IF NOT EXISTS `admin2codes` (
  `code` varchar(30) DEFAULT NULL,
  `name_local` text,
  `name` text,
  `geonameid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alternatename`
--

CREATE TABLE IF NOT EXISTS `alternatename` (
  `alternatenameId` int(11) NOT NULL,
  `geonameid` int(11) DEFAULT NULL,
  `isoLanguage` varchar(7) DEFAULT NULL,
  `alternateName` text,
  `isPreferredName` varchar(1) DEFAULT '0',
  `isShortName` varchar(1) DEFAULT '0',
  `isColloquial` varchar(1) DEFAULT '0',
  `isHistoric` varchar(1) DEFAULT '0',
  PRIMARY KEY (`alternatenameId`),
  KEY `ind_pk` (`geonameid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `continentcodes`
--

CREATE TABLE IF NOT EXISTS `continentcodes` (
  `code` char(2) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `geonameid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countryinfo`
--

CREATE TABLE IF NOT EXISTS `countryinfo` (
  `iso_alpha2` char(2) DEFAULT NULL,
  `iso_alpha3` char(3) DEFAULT NULL,
  `iso_numeric` int(11) DEFAULT NULL,
  `fips_code` varchar(3) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `capital` varchar(200) DEFAULT NULL,
  `areainsqkm` double(20,4) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `continent` char(2) DEFAULT NULL,
  `tld` char(3) DEFAULT NULL,
  `currency` char(3) DEFAULT NULL,
  `currencyName` char(20) DEFAULT NULL,
  `Phone` char(10) DEFAULT NULL,
  `postalCodeFormat` char(20) DEFAULT NULL,
  `postalCodeRegex` varchar(200) DEFAULT NULL,
  `languages` varchar(200) DEFAULT NULL,
  `geonameId` int(11) DEFAULT NULL,
  `neighbours` varchar(50) DEFAULT NULL,
  `equivalentFipsCode` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `featurecodes`
--

CREATE TABLE IF NOT EXISTS `featurecodes` (
  `code` char(7) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `featurecodes_bn`
--

CREATE TABLE IF NOT EXISTS `featurecodes_bn` (
  `code` char(7) NOT NULL DEFAULT '',
  `iso_639_2` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(200) CHARACTER SET utf32 DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`code`,`iso_639_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geoname`
--

CREATE TABLE IF NOT EXISTS `geoname` (
  `geonameid` int(11) NOT NULL,
  `name` varchar(400) DEFAULT NULL,
  `asciiname` varchar(400) DEFAULT NULL,
  `alternatenames` text,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `fclass` char(1) DEFAULT NULL,
  `fcode` varchar(10) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `cc2` varchar(60) DEFAULT NULL,
  `admin1` varchar(20) DEFAULT NULL,
  `admin2` varchar(80) DEFAULT NULL,
  `admin3` varchar(20) DEFAULT NULL,
  `admin4` varchar(20) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `elevation` varchar(50) DEFAULT NULL,
  `gtopo30` int(11) DEFAULT NULL,
  `timezone` varchar(40) DEFAULT NULL,
  `moddate` date DEFAULT NULL,
  PRIMARY KEY (`geonameid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geoname_data_dump`
--

CREATE TABLE IF NOT EXISTS `geoname_data_dump` (
  `geonameid` int(11) NOT NULL,
  `name` varchar(400) DEFAULT NULL,
  `asciiname` varchar(400) DEFAULT NULL,
  `alternatenames` text,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `fclass` char(1) DEFAULT NULL,
  `fcode` varchar(10) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `cc2` varchar(60) DEFAULT NULL,
  `admin1` varchar(20) DEFAULT NULL,
  `admin2` varchar(80) DEFAULT NULL,
  `admin3` varchar(20) DEFAULT NULL,
  `admin4` varchar(20) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `elevation` varchar(50) DEFAULT NULL,
  `gtopo30` int(11) DEFAULT NULL,
  `timezone` varchar(40) DEFAULT NULL,
  `moddate` date DEFAULT NULL,
  PRIMARY KEY (`geonameid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hierarchy`
--

CREATE TABLE IF NOT EXISTS `hierarchy` (
  `parantid` int(11) DEFAULT NULL,
  `childid` int(11) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `iso_languagecodes`
--

CREATE TABLE IF NOT EXISTS `iso_languagecodes` (
  `iso_639_3` char(4) DEFAULT NULL,
  `iso_639_2` varchar(50) DEFAULT NULL,
  `iso_639_1` varchar(50) DEFAULT NULL,
  `language_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `recordid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `geonameid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`recordid`),
  KEY `userid` (`userid`),
  KEY `geonameid` (`geonameid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE IF NOT EXISTS `timezones` (
  `timeZoneId` varchar(200) DEFAULT NULL,
  `GMT_offset` decimal(3,1) DEFAULT NULL,
  `DST_offset` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  UNIQUE KEY `email` (`email`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 */

