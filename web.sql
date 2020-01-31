/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.9-MariaDB : Database - projecttaweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projecttaweb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `projecttaweb`;

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `NIP` varchar(50) NOT NULL,
  `NIDN` varchar(20) DEFAULT NULL,
  `NamaDosen` varchar(100) DEFAULT NULL,
  `Alamat` varchar(200) DEFAULT NULL,
  `NoTelp` varchar(30) DEFAULT NULL,
  `Golongan` varchar(20) DEFAULT NULL,
  `Pangkat` varchar(20) DEFAULT NULL,
  `PendidikanTerakhir` varchar(10) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`NIP`),
  UNIQUE KEY `dosenname` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`NIP`,`NIDN`,`NamaDosen`,`Alamat`,`NoTelp`,`Golongan`,`Pangkat`,`PendidikanTerakhir`,`Username`,`Password`) values ('17153230','16789','Putu Man','Kori Nuansa  ','081999495969','1','2','S3','manus','manu');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `KodeJurusan` varchar(2) NOT NULL,
  `NamaJurusan` varchar(100) DEFAULT NULL,
  `NamaKaJurusan` varchar(100) DEFAULT NULL,
  `NoTelp` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`KodeJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`KodeJurusan`,`NamaJurusan`,`NamaKaJurusan`,`NoTelp`) values ('12','Teknik Elektro','Windiras','081999495969'),('15','Teknik Mesin','Wibawa','081567899'),('17','Akuntansi2','Putu Raka Ardana','0819993');

/*Table structure for table `ketuajurusan` */

DROP TABLE IF EXISTS `ketuajurusan`;

CREATE TABLE `ketuajurusan` (
  `KodeJurusan` varchar(2) DEFAULT NULL,
  `NIP` varchar(50) DEFAULT NULL,
  `Periode` varchar(20) DEFAULT NULL,
  KEY `KodeJur` (`KodeJurusan`),
  CONSTRAINT `KodeJur` FOREIGN KEY (`KodeJurusan`) REFERENCES `jurusan` (`KodeJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ketuajurusan` */

insert  into `ketuajurusan`(`KodeJurusan`,`NIP`,`Periode`) values ('17','17153230','2015');

/*Table structure for table `ketuaprodi` */

DROP TABLE IF EXISTS `ketuaprodi`;

CREATE TABLE `ketuaprodi` (
  `KodeProdi` varchar(2) DEFAULT NULL,
  `NIP` varchar(50) DEFAULT NULL,
  `Periode` varchar(20) DEFAULT NULL,
  KEY `KodeProdi` (`KodeProdi`),
  CONSTRAINT `KodeProdi` FOREIGN KEY (`KodeProdi`) REFERENCES `prodi` (`KodeProdi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ketuaprodi` */

insert  into `ketuaprodi`(`KodeProdi`,`NIP`,`Periode`) values ('13','17153230','2015');

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `NIM` varchar(20) NOT NULL,
  `NamaMahasiswa` varchar(100) DEFAULT NULL,
  `Alamat` varchar(200) DEFAULT NULL,
  `NoTelp` varchar(30) DEFAULT NULL,
  `KodeProdi` varchar(2) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NIM`),
  UNIQUE KEY `Username` (`Username`),
  KEY `KProdi` (`KodeProdi`),
  CONSTRAINT `KProdi` FOREIGN KEY (`KodeProdi`) REFERENCES `prodi` (`KodeProdi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`NIM`,`NamaMahasiswa`,`Alamat`,`NoTelp`,`KodeProdi`,`Username`,`Password`,`foto`) values ('17882','Rama Wahyudana','Kori Nuansa','081999495969','13','rama','wahyu','134207.jpg');

/*Table structure for table `prodi` */

DROP TABLE IF EXISTS `prodi`;

CREATE TABLE `prodi` (
  `KodeProdi` varchar(2) NOT NULL,
  `KodeJurusan` varchar(2) DEFAULT NULL,
  `NamaProdi` varchar(50) DEFAULT NULL,
  `NoTelp` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`KodeProdi`),
  KEY `KodeJurusan` (`KodeJurusan`),
  CONSTRAINT `KodeJurusan` FOREIGN KEY (`KodeJurusan`) REFERENCES `jurusan` (`KodeJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prodi` */

insert  into `prodi`(`KodeProdi`,`KodeJurusan`,`NamaProdi`,`NoTelp`) values ('13','12','Manajamen Informatika','0819993'),('17','15','Teknik Listrik','081567899');

/*Table structure for table `proposalta` */

DROP TABLE IF EXISTS `proposalta`;

CREATE TABLE `proposalta` (
  `NoProposal` int(11) NOT NULL AUTO_INCREMENT,
  `JudulProposal` varchar(250) DEFAULT NULL,
  `TahunProposal` varchar(10) DEFAULT NULL,
  `NIM` varchar(20) DEFAULT NULL,
  `NIPPembimbing1` varchar(50) DEFAULT NULL,
  `NIPPembimbing2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NoProposal`),
  KEY `NIPPembimbing1` (`NIPPembimbing1`),
  KEY `NIPPembimbing2` (`NIPPembimbing2`),
  CONSTRAINT `NIPPembimbing1` FOREIGN KEY (`NIPPembimbing1`) REFERENCES `dosen` (`NIP`),
  CONSTRAINT `NIPPembimbing2` FOREIGN KEY (`NIPPembimbing2`) REFERENCES `dosen` (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `proposalta` */

insert  into `proposalta`(`NoProposal`,`JudulProposal`,`TahunProposal`,`NIM`,`NIPPembimbing1`,`NIPPembimbing2`) values (7,'Sistem Informasi','2019','17882','17153230','17153230');

/*Table structure for table `tugasakhir` */

DROP TABLE IF EXISTS `tugasakhir`;

CREATE TABLE `tugasakhir` (
  `NoTA` int(11) NOT NULL AUTO_INCREMENT,
  `NoProposal` int(11) DEFAULT NULL,
  `JudulTA` varchar(200) DEFAULT NULL,
  `TahunTA` varchar(5) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `TglDisetujui` date DEFAULT NULL,
  `NIPPembimbing1` varchar(25) DEFAULT NULL,
  `NIPPembimbing2` varchar(25) DEFAULT NULL,
  `FolderSoftCopyLaporan` varchar(100) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`NoTA`),
  KEY `Proposal` (`NoProposal`),
  KEY `NIM1` (`NIM`),
  KEY `NIPPembimbing11` (`NIPPembimbing1`),
  KEY `NIPPembimbing12` (`NIPPembimbing2`),
  CONSTRAINT `NIM1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  CONSTRAINT `NIPPembimbing11` FOREIGN KEY (`NIPPembimbing1`) REFERENCES `dosen` (`NIP`),
  CONSTRAINT `NIPPembimbing12` FOREIGN KEY (`NIPPembimbing2`) REFERENCES `dosen` (`NIP`),
  CONSTRAINT `Proposal` FOREIGN KEY (`NoProposal`) REFERENCES `proposalta` (`NoProposal`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tugasakhir` */

insert  into `tugasakhir`(`NoTA`,`NoProposal`,`JudulTA`,`TahunTA`,`NIM`,`TglDisetujui`,`NIPPembimbing1`,`NIPPembimbing2`,`FolderSoftCopyLaporan`,`Status`) values (15,7,'Pemrograman Berbasis','2011','17882','2020-01-02','17153230','17153230','IMG_20181024_0037.pdf',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
