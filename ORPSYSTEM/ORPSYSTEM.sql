/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : PostgreSQL
 Source Server Version : 90405
 Source Host           : localhost
 Source Database       : ORPSYSTEM
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90405
 File Encoding         : utf-8

 Date: 12/01/2015 21:49:45 PM
*/

-- ----------------------------
--  Sequence structure for "deliveryorder_iddo_seq"
-- ----------------------------
DROP SEQUENCE IF EXISTS "deliveryorder_iddo_seq";
CREATE SEQUENCE "deliveryorder_iddo_seq" INCREMENT 1 START 4 MAXVALUE 9223372036854775807 MINVALUE 1 CACHE 1;
ALTER TABLE "deliveryorder_iddo_seq" OWNER TO "postgres";

-- ----------------------------
--  Sequence structure for "iddo_seq"
-- ----------------------------
DROP SEQUENCE IF EXISTS "iddo_seq";
CREATE SEQUENCE "iddo_seq" INCREMENT 1 START 5 MAXVALUE 9223372036854775807 MINVALUE 1 CACHE 1;
ALTER TABLE "iddo_seq" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "deliveryorderdetail"
-- ----------------------------
DROP TABLE IF EXISTS "deliveryorderdetail";
CREATE TABLE "deliveryorderdetail" (
	"iddeliveryorderdetail" int4 NOT NULL,
	"iddeliveryorder" int4 NOT NULL,
	"idrefbarang" int4 NOT NULL,
	"jumlahbarang" numeric(10,0),
	"keterangan" varchar(255),
	"expired_date" date,
	"idpackaging" int4
)
WITH (OIDS=FALSE);
ALTER TABLE "deliveryorderdetail" OWNER TO "postgres";

-- ----------------------------
--  Records of "deliveryorderdetail"
-- ----------------------------
BEGIN;
INSERT INTO "deliveryorderdetail" VALUES ('2', '2', '7', '2', null, null, null);
INSERT INTO "deliveryorderdetail" VALUES ('3', '3', '3', '2', null, null, null);
INSERT INTO "deliveryorderdetail" VALUES ('4', '4', '3', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('5', '4', '4', '3', '', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('6', '4', '9', '4', '-', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('7', '4', '7', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('8', '4', '3', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('9', '4', '4', '3', '', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('10', '4', '9', '4', '-', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('11', '4', '7', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('12', '4', '9', '4', '-', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('13', '4', '7', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('14', '4', '9', '4', '-', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('15', '4', '7', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('16', '4', '9', '4', '-', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('17', '4', '7', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('18', '4', '9', '4', '-', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('19', '4', '7', '2', '--', null, '1');
INSERT INTO "deliveryorderdetail" VALUES ('20', '5', '4', '2', '', '2015-07-29', '2');
INSERT INTO "deliveryorderdetail" VALUES ('21', '6', '4', '2', null, null, null);
INSERT INTO "deliveryorderdetail" VALUES ('22', '7', '5', '2', '', '2015-12-03', '2');
COMMIT;

-- ----------------------------
--  Table structure for "dopaket"
-- ----------------------------
DROP TABLE IF EXISTS "dopaket";
CREATE TABLE "dopaket" (
	"idpackaging" int4,
	"iddeliveryorder" int4,
	"nama" varchar(45)
)
WITH (OIDS=FALSE);
ALTER TABLE "dopaket" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "fakturpurchase"
-- ----------------------------
DROP TABLE IF EXISTS "fakturpurchase";
CREATE TABLE "fakturpurchase" (
	"idfakturpurchase" int4 NOT NULL,
	"nomor" varchar(45),
	"tanggal" date,
	"idsupplier" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "fakturpurchase" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "fakturpurchasedetail"
-- ----------------------------
DROP TABLE IF EXISTS "fakturpurchasedetail";
CREATE TABLE "fakturpurchasedetail" (
	"idfakturpurchase" int4 NOT NULL,
	"idrefbarang" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "fakturpurchasedetail" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "faktursales"
-- ----------------------------
DROP TABLE IF EXISTS "faktursales";
CREATE TABLE "faktursales" (
	"idfaktursales" int4 NOT NULL,
	"nomor" varchar(45),
	"tanggal" date,
	"idpelanggan" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "faktursales" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "faktursalesdetail"
-- ----------------------------
DROP TABLE IF EXISTS "faktursalesdetail";
CREATE TABLE "faktursalesdetail" (
	"idfaktursales" int4 NOT NULL,
	"idrefbarang" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "faktursalesdetail" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "hutang"
-- ----------------------------
DROP TABLE IF EXISTS "hutang";
CREATE TABLE "hutang" (
	"idhutang" int4 NOT NULL,
	"jumlah" float8,
	"status" varchar(250),
	"tanggalbayar" date,
	"idpengadaan" int4 NOT NULL,
	"tanggaltempo" varchar(45)
)
WITH (OIDS=FALSE);
ALTER TABLE "hutang" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "menu"
-- ----------------------------
DROP TABLE IF EXISTS "menu";
CREATE TABLE "menu" (
	"idmenu" int4 NOT NULL,
	"menu" varchar(50),
	"parent" int4,
	"classmenu" varchar(32),
	"functionmenu" varchar(32),
	"icon" varchar(32),
	"order" int4,
	"status" varchar(250)
)
WITH (OIDS=FALSE);
ALTER TABLE "menu" OWNER TO "postgres";

-- ----------------------------
--  Records of "menu"
-- ----------------------------
BEGIN;
INSERT INTO "menu" VALUES ('1', 'Transaksi', '0', 'transaksi', '#', 'clip-transfer', '2', '1');
INSERT INTO "menu" VALUES ('2', 'Master Data', '0', 'masterdata', '#', 'clip-list-5 ', '3', '1');
INSERT INTO "menu" VALUES ('3', 'Laporan', '0', 'laporan', '#', 'clip-file-2 ', '4', '1');
INSERT INTO "menu" VALUES ('4', 'Maintenance', '0', 'maintenance', '#', 'clip-settings ', '5', '1');
INSERT INTO "menu" VALUES ('5', 'Delivery Order', '1', 'transaksi', 'deliveryorder', 'NULL', '1', '1');
INSERT INTO "menu" VALUES ('6', 'Surat Jalan', '1', 'transaksi', 'suratjalan', 'NULL', '2', '1');
INSERT INTO "menu" VALUES ('7', 'Penerimaan Barang', '1', 'transaksi', 'penerimaanbarang', 'NULL', '3', '1');
INSERT INTO "menu" VALUES ('8', 'Barang', '2', 'masterdata', 'masterdatabarang', 'NULL', '1', '1');
INSERT INTO "menu" VALUES ('9', 'Pelanggan & Supplier', '2', 'masterdata', 'masterdatapelanggan', 'NULL', '2', '1');
INSERT INTO "menu" VALUES ('13', 'Laporan Delivery Order', '3', 'laporan', 'deliveryorder', 'NULL', '1', '1');
INSERT INTO "menu" VALUES ('14', 'Laporan Surat Jalan', '3', 'laporan', 'suratjalan', 'NULL', '2', '1');
INSERT INTO "menu" VALUES ('15', 'Laporan Penerimaan Barang', '3', 'laporan', 'penerimaanbarang', 'NULL', '4', '1');
INSERT INTO "menu" VALUES ('16', 'Rekapitulasi', '3', 'laporan', 'rekapitulasi', 'NULL', '7', '1');
INSERT INTO "menu" VALUES ('17', 'Backup Data', '4', 'maintenance', 'backupdata', 'NULL', '3', '0');
INSERT INTO "menu" VALUES ('18', 'User Management', '4', 'maintenance', 'usermanagement', 'NULL', '1', '1');
INSERT INTO "menu" VALUES ('19', 'Home', '0', 'home', 'index', 'clip-home', '1', '1');
INSERT INTO "menu" VALUES ('20', 'Stock Control', '3', 'laporan', 'stockcontrol', 'NULL', '6', '1');
INSERT INTO "menu" VALUES ('21', 'Kartu Stock', '3', 'laporan', 'kartustock', 'NULL', '5', '1');
INSERT INTO "menu" VALUES ('22', 'Mutasi', '3', 'laporan', 'mutasi', 'NULL', '3', '1');
COMMIT;

-- ----------------------------
--  Table structure for "menurole"
-- ----------------------------
DROP TABLE IF EXISTS "menurole";
CREATE TABLE "menurole" (
	"idmenurole" int4 NOT NULL,
	"idrole" int4 NOT NULL,
	"idmenu" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "menurole" OWNER TO "postgres";

-- ----------------------------
--  Records of "menurole"
-- ----------------------------
BEGIN;
INSERT INTO "menurole" VALUES ('1', '1', '1');
INSERT INTO "menurole" VALUES ('2', '1', '2');
INSERT INTO "menurole" VALUES ('3', '1', '3');
INSERT INTO "menurole" VALUES ('4', '1', '4');
INSERT INTO "menurole" VALUES ('5', '1', '5');
INSERT INTO "menurole" VALUES ('6', '1', '6');
INSERT INTO "menurole" VALUES ('7', '1', '7');
INSERT INTO "menurole" VALUES ('8', '1', '8');
INSERT INTO "menurole" VALUES ('9', '1', '9');
INSERT INTO "menurole" VALUES ('17', '1', '17');
INSERT INTO "menurole" VALUES ('18', '1', '18');
INSERT INTO "menurole" VALUES ('19', '1', '19');
INSERT INTO "menurole" VALUES ('23', '2', '19');
INSERT INTO "menurole" VALUES ('24', '2', '5');
INSERT INTO "menurole" VALUES ('25', '2', '1');
INSERT INTO "menurole" VALUES ('26', '3', '19');
INSERT INTO "menurole" VALUES ('27', '3', '6');
INSERT INTO "menurole" VALUES ('28', '3', '1');
INSERT INTO "menurole" VALUES ('29', '4', '19');
INSERT INTO "menurole" VALUES ('30', '4', '7');
INSERT INTO "menurole" VALUES ('31', '4', '1');
INSERT INTO "menurole" VALUES ('32', '5', '19');
INSERT INTO "menurole" VALUES ('33', '5', '3');
INSERT INTO "menurole" VALUES ('38', '5', '20');
INSERT INTO "menurole" VALUES ('39', '1', '20');
INSERT INTO "menurole" VALUES ('40', '1', '21');
INSERT INTO "menurole" VALUES ('41', '1', '13');
INSERT INTO "menurole" VALUES ('42', '1', '15');
INSERT INTO "menurole" VALUES ('43', '1', '14');
INSERT INTO "menurole" VALUES ('44', '1', '22');
INSERT INTO "menurole" VALUES ('45', '2', '3');
INSERT INTO "menurole" VALUES ('46', '2', '13');
INSERT INTO "menurole" VALUES ('47', '3', '3');
INSERT INTO "menurole" VALUES ('48', '3', '14');
INSERT INTO "menurole" VALUES ('49', '4', '3');
INSERT INTO "menurole" VALUES ('50', '4', '15');
INSERT INTO "menurole" VALUES ('51', '5', '21');
INSERT INTO "menurole" VALUES ('52', '5', '13');
INSERT INTO "menurole" VALUES ('53', '5', '15');
INSERT INTO "menurole" VALUES ('54', '5', '14');
COMMIT;

-- ----------------------------
--  Table structure for "package"
-- ----------------------------
DROP TABLE IF EXISTS "package";
CREATE TABLE "package" (
	"idpackage" int4 NOT NULL,
	"namapackage" varchar(128),
	"keterangan" varchar(255),
	"idrefstore" int4
)
WITH (OIDS=FALSE);
ALTER TABLE "package" OWNER TO "postgres";

-- ----------------------------
--  Records of "package"
-- ----------------------------
BEGIN;
INSERT INTO "package" VALUES ('1', 'Duo Galaxy ', 'paket duo galaxy', '1');
INSERT INTO "package" VALUES ('2', 'Doble LG', 'paket smartphone LG', '1');
COMMIT;

-- ----------------------------
--  Table structure for "packagedetail"
-- ----------------------------
DROP TABLE IF EXISTS "packagedetail";
CREATE TABLE "packagedetail" (
	"idpackagedetail" int4,
	"idpackage" int4,
	"idrefbarang" int4,
	"jumlahbarang" int4,
	"keterangan" varchar(255)
)
WITH (OIDS=FALSE);
ALTER TABLE "packagedetail" OWNER TO "postgres";

-- ----------------------------
--  Records of "packagedetail"
-- ----------------------------
BEGIN;
INSERT INTO "packagedetail" VALUES ('21', '1', '3', '2', '--');
INSERT INTO "packagedetail" VALUES ('22', '1', '4', '3', '');
INSERT INTO "packagedetail" VALUES ('23', '2', '9', '4', '-');
INSERT INTO "packagedetail" VALUES ('24', '2', '7', '2', '--');
COMMIT;

-- ----------------------------
--  Table structure for "packaging"
-- ----------------------------
DROP TABLE IF EXISTS "packaging";
CREATE TABLE "packaging" (
	"idpackaging" int4,
	"nama" char(100)
)
WITH (OIDS=FALSE);
ALTER TABLE "packaging" OWNER TO "postgres";

-- ----------------------------
--  Records of "packaging"
-- ----------------------------
BEGIN;
INSERT INTO "packaging" VALUES ('1', 'Dus                                                                                                 ');
INSERT INTO "packaging" VALUES ('2', 'Box                                                                                                 ');
INSERT INTO "packaging" VALUES ('3', 'Plastik                                                                                             ');
COMMIT;

-- ----------------------------
--  Table structure for "packaging2"
-- ----------------------------
DROP TABLE IF EXISTS "packaging2";
CREATE TABLE "packaging2" (
	"idpackaging" int4,
	"nama" varchar(45)
)
WITH (OIDS=FALSE);
ALTER TABLE "packaging2" OWNER TO "postgres";

-- ----------------------------
--  Records of "packaging2"
-- ----------------------------
BEGIN;
INSERT INTO "packaging2" VALUES ('1', 'packaging1');
INSERT INTO "packaging2" VALUES ('1', 'packaging1');
INSERT INTO "packaging2" VALUES ('1', 'packaging1');
COMMIT;

-- ----------------------------
--  Table structure for "pengadaan"
-- ----------------------------
DROP TABLE IF EXISTS "pengadaan";
CREATE TABLE "pengadaan" (
	"idpengadaan" int4 NOT NULL,
	"nomorpengadaan" varchar(45),
	"nomorreff" varchar(45),
	"idsupplier" int4 NOT NULL,
	"insertby" varchar(64) NOT NULL,
	"insertdate" timestamp(6) NULL,
	"idrefstore" int4 NOT NULL,
	"tanggalpengadaan" timestamp(6) NULL,
	"flag_app" "status_flag_app"
)
WITH (OIDS=FALSE);
ALTER TABLE "pengadaan" OWNER TO "postgres";

-- ----------------------------
--  Records of "pengadaan"
-- ----------------------------
BEGIN;
INSERT INTO "pengadaan" VALUES ('1', '01022', '01002', '1', 'imammz@ymail.com', null, '1', '2015-07-13 00:00:00', 'WEB');
INSERT INTO "pengadaan" VALUES ('3', 'SP1-2', null, '3', 'imammz@ymail.com', null, '2', '2015-07-29 00:00:00', 'WEB');
INSERT INTO "pengadaan" VALUES ('2', 'SP1-1', null, '2', 'imammz@ymail.com', null, '2', '2015-07-29 00:00:00', 'WEB');
INSERT INTO "pengadaan" VALUES ('4', '01022A', '01002', '1', 'imammz@ymail.com', null, '1', '2015-07-29 00:00:00', 'WEB');
INSERT INTO "pengadaan" VALUES ('5', '00pppa', '00011', '2', 'imammz@ymail.com', null, '1', '2015-07-29 00:00:00', 'WEB');
INSERT INTO "pengadaan" VALUES ('6', 'SP1-3', null, '3', 'imammz@ymail.com', null, '1', '2015-07-29 00:00:00', 'WEB');
INSERT INTO "pengadaan" VALUES ('7', '00000a', 'Abb', '1', 'imammz@ymail.com', null, '1', '2015-09-04 00:00:00', 'WEB');
COMMIT;

-- ----------------------------
--  Table structure for "pengadaandetail"
-- ----------------------------
DROP TABLE IF EXISTS "pengadaandetail";
CREATE TABLE "pengadaandetail" (
	"idpengadaandetail" int4 NOT NULL,
	"idpengadaan" int4 NOT NULL,
	"idrefbarang" int4 NOT NULL,
	"jumlahbarang" numeric(10,0),
	"keterangan" varchar(255),
	"idrefgudang" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "pengadaandetail" OWNER TO "postgres";

-- ----------------------------
--  Records of "pengadaandetail"
-- ----------------------------
BEGIN;
INSERT INTO "pengadaandetail" VALUES ('1', '1', '4', '1', '', '1');
INSERT INTO "pengadaandetail" VALUES ('2', '4', '6', '10', '...', '1');
INSERT INTO "pengadaandetail" VALUES ('3', '5', '4', '3', '', '0');
INSERT INTO "pengadaandetail" VALUES ('4', '7', '5', '20', '', '4');
COMMIT;

-- ----------------------------
--  Table structure for "pengadaanjenis"
-- ----------------------------
DROP TABLE IF EXISTS "pengadaanjenis";
CREATE TABLE "pengadaanjenis" (
)
WITH (OIDS=FALSE);
ALTER TABLE "pengadaanjenis" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "piutang"
-- ----------------------------
DROP TABLE IF EXISTS "piutang";
CREATE TABLE "piutang" (
	"idpiutang" int4 NOT NULL,
	"jumlah" float8,
	"status" varchar(250),
	"tanggalbayar" date,
	"tanggaltempo" date,
	"iddo" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "piutang" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "quotationpurchase"
-- ----------------------------
DROP TABLE IF EXISTS "quotationpurchase";
CREATE TABLE "quotationpurchase" (
	"idquotationpurchase" int4 NOT NULL,
	"nomor" varchar(45),
	"tanggal" date,
	"idsupplier" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "quotationpurchase" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "quotationpurchasedetail"
-- ----------------------------
DROP TABLE IF EXISTS "quotationpurchasedetail";
CREATE TABLE "quotationpurchasedetail" (
	"idquotationpurchase" int4 NOT NULL,
	"idrefbarang" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "quotationpurchasedetail" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "quotationsalesdetail"
-- ----------------------------
DROP TABLE IF EXISTS "quotationsalesdetail";
CREATE TABLE "quotationsalesdetail" (
	"idquotationsales" int4 NOT NULL,
	"idrefbarang" int4 NOT NULL,
	"jumlahbarang" int4,
	"keterangan" text,
	"idquotationsalesdetail" int4,
	"hargasatuan" float8
)
WITH (OIDS=FALSE);
ALTER TABLE "quotationsalesdetail" OWNER TO "postgres";

-- ----------------------------
--  Records of "quotationsalesdetail"
-- ----------------------------
BEGIN;
INSERT INTO "quotationsalesdetail" VALUES ('4', '9', '2', '-', '1', '1000000');
INSERT INTO "quotationsalesdetail" VALUES ('5', '3', '2', '3', '2', '5600000');
INSERT INTO "quotationsalesdetail" VALUES ('6', '13', '2', 'potongan harga 15%', '3', '1900000');
INSERT INTO "quotationsalesdetail" VALUES ('6', '7', '1', 'tanpa potongan harga', '4', '6100000');
INSERT INTO "quotationsalesdetail" VALUES ('7', '3', '2', '', '5', '4500000');
INSERT INTO "quotationsalesdetail" VALUES ('8', '4', '2', '', '6', '5000000');
INSERT INTO "quotationsalesdetail" VALUES ('8', '7', '1', '', '7', '6500000');
COMMIT;

-- ----------------------------
--  Table structure for "refbarang"
-- ----------------------------
DROP TABLE IF EXISTS "refbarang";
CREATE TABLE "refbarang" (
	"idrefbarang" int4 NOT NULL,
	"idrefsatuan" int4 NOT NULL,
	"kodebarang" varchar(64),
	"namabarang" varchar(128),
	"stockawal" int4,
	"stock" int4,
	"ukuran" varchar(64),
	"idrefgudang" int4,
	"idrefstore" int4 NOT NULL,
	"idpackage" int4,
	"meta" text,
	"alias" varchar(128),
	"image_file" varchar(140),
	"idpackaging" int4,
	"idrefjenisbarang" varchar(10),
	"harga_min" float8,
	"harga_max" float8
)
WITH (OIDS=FALSE);
ALTER TABLE "refbarang" OWNER TO "postgres";

-- ----------------------------
--  Records of "refbarang"
-- ----------------------------
BEGIN;
INSERT INTO "refbarang" VALUES ('8', '2', '00001', 'Jaket Nike Juve', '230', '230', null, '1', '2', null, null, null, null, null, null, null, null);
INSERT INTO "refbarang" VALUES ('6', '1', '0000001', 'TV Sharp LED 24', '10', '20', null, '1', '1', null, null, null, null, '1', '1', null, null);
INSERT INTO "refbarang" VALUES ('4', '1', '00000004A', 'Smartphone Samsung galaxy S5', '12', '12', null, '1', '1', null, null, null, null, '1', '1', null, null);
INSERT INTO "refbarang" VALUES ('5', '1', '00000005A', 'Smartphone Samsung galaxy Note 3 Neo', '12', '32', null, '1', '1', null, null, null, null, '1', '1', null, null);
INSERT INTO "refbarang" VALUES ('3', '1', '000003', 'Smartphone Samsung galaxy Note 4', '22', '-2', null, '1', '1', null, null, null, null, '1', '1', '6000000', '6500000');
INSERT INTO "refbarang" VALUES ('9', '1', '0000083', 'Smartphone LG G3 Pro', '25', '25', null, '1', '1', null, null, null, '8c60d18122a7ae0f98ee8c5263b91a79.png', '1', '1', '6000000', '6500000');
INSERT INTO "refbarang" VALUES ('12', '1', '001910101', 'Iphone 5s', null, null, null, null, '1', null, null, null, null, null, '1', '5100000', '5800000');
INSERT INTO "refbarang" VALUES ('13', '1', '101029191', 'Iphone 4', null, null, null, null, '1', null, null, null, null, null, '1', '1800000', '2100000');
INSERT INTO "refbarang" VALUES ('10', '1', '00002A', 'Iphone 6 Plus', '12', '12', null, '1', '1', null, null, null, '6fc5fe05780e08ceee1d4da2901f8741.jpg', '1', '1', '12200000', '11000000');
INSERT INTO "refbarang" VALUES ('7', '1', '0101201', 'Smartphone LG G4', '28', '28', null, '1', '1', null, null, null, '7faee8c60b63e58cb88d3a68365e0c88.jpg', '1', '1', '6100000', '6800000');
COMMIT;

-- ----------------------------
--  Table structure for "refgudang"
-- ----------------------------
DROP TABLE IF EXISTS "refgudang";
CREATE TABLE "refgudang" (
	"idrefgudang" int4 NOT NULL,
	"nomorgudang" varchar(45),
	"namagudang" varchar(45),
	"kapasitas" numeric(10,2),
	"idrefsatuan" int4,
	"alamatgudang" text
)
WITH (OIDS=FALSE);
ALTER TABLE "refgudang" OWNER TO "postgres";

-- ----------------------------
--  Records of "refgudang"
-- ----------------------------
BEGIN;
INSERT INTO "refgudang" VALUES ('2', '00011', 'Gudang Pratama 02A', '12.00', null, null);
INSERT INTO "refgudang" VALUES ('1', '01A', 'Gudang Pratama 01A', '250.00', '1', null);
INSERT INTO "refgudang" VALUES ('4', '00012', 'Gudang Jakarta', '2.00', null, null);
COMMIT;

-- ----------------------------
--  Table structure for "refjenisbarang"
-- ----------------------------
DROP TABLE IF EXISTS "refjenisbarang";
CREATE TABLE "refjenisbarang" (
	"idrefjenisbarang" varchar(10) NOT NULL,
	"jenisbarang" varchar(45),
	"parent" varchar(10),
	"meta" varchar(140)
)
WITH (OIDS=FALSE);
ALTER TABLE "refjenisbarang" OWNER TO "postgres";

-- ----------------------------
--  Records of "refjenisbarang"
-- ----------------------------
BEGIN;
INSERT INTO "refjenisbarang" VALUES ('2', 'Fashion', null, null);
INSERT INTO "refjenisbarang" VALUES ('1', 'Elektronik', null, null);
INSERT INTO "refjenisbarang" VALUES ('21', 'Baju', '2', null);
INSERT INTO "refjenisbarang" VALUES ('22', 'Tas', '2', null);
INSERT INTO "refjenisbarang" VALUES ('211', 'Baju Sport', '21', null);
INSERT INTO "refjenisbarang" VALUES ('3', 'Otomotif', null, null);
INSERT INTO "refjenisbarang" VALUES ('4', 'Kaos Berenang', '211', null);
INSERT INTO "refjenisbarang" VALUES ('5', 'Celana', '2', null);
COMMIT;

-- ----------------------------
--  Table structure for "refsatuan"
-- ----------------------------
DROP TABLE IF EXISTS "refsatuan";
CREATE TABLE "refsatuan" (
	"idrefsatuan" int4 NOT NULL,
	"namasatuan" varchar(45),
	"child" int4,
	"jumlah_perchild" float8
)
WITH (OIDS=FALSE);
ALTER TABLE "refsatuan" OWNER TO "postgres";

-- ----------------------------
--  Records of "refsatuan"
-- ----------------------------
BEGIN;
INSERT INTO "refsatuan" VALUES ('1', 'Pcs', null, null);
INSERT INTO "refsatuan" VALUES ('2', 'Lsn', '1', '12');
INSERT INTO "refsatuan" VALUES ('3', 'Box', '1', '20');
INSERT INTO "refsatuan" VALUES ('4', 'Rim', null, null);
INSERT INTO "refsatuan" VALUES ('5', 'Box RIM', '4', '5');
INSERT INTO "refsatuan" VALUES ('6', 'Kerat', '3', '10');
INSERT INTO "refsatuan" VALUES ('7', 'Gram', '1', '0');
INSERT INTO "refsatuan" VALUES ('8', 'Kilo', '7', '0');
COMMIT;

-- ----------------------------
--  Table structure for "quotationsales"
-- ----------------------------
DROP TABLE IF EXISTS "quotationsales";
CREATE TABLE "quotationsales" (
	"idquotationsales" int4 NOT NULL,
	"nomor" varchar(45),
	"tanggal" date,
	"idpelanggan" int4 NOT NULL,
	"idrefstore" int4,
	"status" char(45),
	"insertby" char(45),
	"flag_app" char(45),
	"dibuat_oleh" char(64),
	"idrefstatus" int4,
	"idrefjenispembayaran" int4
)
WITH (OIDS=FALSE);
ALTER TABLE "quotationsales" OWNER TO "postgres";

-- ----------------------------
--  Records of "quotationsales"
-- ----------------------------
BEGIN;
INSERT INTO "quotationsales" VALUES ('4', '10000X', '2015-10-02', '3', '1', 'KIRIM                                        ', 'imammz@ymail.com                             ', null, null, null, null);
INSERT INTO "quotationsales" VALUES ('5', '100002', '2015-10-02', '4', '1', 'KIRIM                                        ', 'imammz@ymail.com                             ', null, null, null, null);
INSERT INTO "quotationsales" VALUES ('6', '', '2015-10-02', '4', '1', 'KIRIM                                        ', 'imammz@ymail.com                             ', null, null, null, null);
INSERT INTO "quotationsales" VALUES ('7', '001010011', '2015-12-01', '3', '3', 'KIRIM                                        ', 'fai@gmail.com                                ', null, null, null, null);
INSERT INTO "quotationsales" VALUES ('8', '991010011', '2015-12-01', '1', '3', 'KIRIM                                        ', 'fai@gmail.com                                ', null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for "refstore"
-- ----------------------------
DROP TABLE IF EXISTS "refstore";
CREATE TABLE "refstore" (
	"idrefstore" int4 NOT NULL,
	"nama" varchar(45),
	"tlp" varchar(16),
	"email" varchar(45),
	"lokasi" varchar(128),
	"keterangan" text,
	"image_file" varchar(140)
)
WITH (OIDS=FALSE);
ALTER TABLE "refstore" OWNER TO "postgres";

-- ----------------------------
--  Records of "refstore"
-- ----------------------------
BEGIN;
INSERT INTO "refstore" VALUES ('2', 'Dina''s Store', '123', 'dinastore@gmail.com', 'Jaksel', '--', null);
INSERT INTO "refstore" VALUES ('1', 'Zerro Shops', '321', 'zerroshop@ymail.com', 'Jaktim', '---', '');
INSERT INTO "refstore" VALUES ('3', 'Fai''Shop', null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for "role"
-- ----------------------------
DROP TABLE IF EXISTS "role";
CREATE TABLE "role" (
	"idrole" int4 NOT NULL,
	"role" varchar(45)
)
WITH (OIDS=FALSE);
ALTER TABLE "role" OWNER TO "postgres";

-- ----------------------------
--  Records of "role"
-- ----------------------------
BEGIN;
INSERT INTO "role" VALUES ('1', 'Administrator');
INSERT INTO "role" VALUES ('2', 'Operator Delivery Order');
INSERT INTO "role" VALUES ('3', 'Operator Surat Jalan');
INSERT INTO "role" VALUES ('4', 'Operator Penerimaan Barang');
INSERT INTO "role" VALUES ('5', 'Operator Rekapitulasi');
INSERT INTO "role" VALUES ('6', 'Administrator Retail');
COMMIT;

-- ----------------------------
--  Table structure for "sharingproduct"
-- ----------------------------
DROP TABLE IF EXISTS "sharingproduct";
CREATE TABLE "sharingproduct" (
	"idsharingproduct" int4,
	"idrefbarang" int4,
	"jumlah_barang" int4,
	"idrefstore_pengirim" int4,
	"idrefstore_penerima" int4,
	"tanggal_kirim" timestamp(6) NULL,
	"tanggal_konfirmasi" timestamp(6) NULL,
	"status_konfirmasi" "status_standar" NOT NULL DEFAULT 'N'::status_standar
)
WITH (OIDS=FALSE);
ALTER TABLE "sharingproduct" OWNER TO "postgres";

-- ----------------------------
--  Records of "sharingproduct"
-- ----------------------------
BEGIN;
INSERT INTO "sharingproduct" VALUES ('1', '7', '2', '1', '2', '2015-07-29 00:00:00', '2015-07-29 00:00:00', 'Y');
INSERT INTO "sharingproduct" VALUES ('2', '3', '2', '1', '2', '2015-07-29 00:00:00', '2015-07-29 00:00:00', 'Y');
INSERT INTO "sharingproduct" VALUES ('3', '4', '2', '1', '2', '2015-07-30 00:00:00', '2015-07-29 00:00:00', 'Y');
COMMIT;

-- ----------------------------
--  Table structure for "suratjalan"
-- ----------------------------
DROP TABLE IF EXISTS "suratjalan";
CREATE TABLE "suratjalan" (
	"idsuratjalan" int4 NOT NULL,
	"iddeliveryorder" int4 NOT NULL,
	"nomorsuratjalan" varchar(45),
	"tanggalsuratjalan" timestamp(6) NULL,
	"nomormobil" varchar(45),
	"insertby" varchar(64) NOT NULL,
	"insertdate" timestamp(6) NULL,
	"supir" varchar(64),
	"dimuat" varchar(64),
	"penanggungjawab" varchar(64),
	"keterangan" varchar(255)
)
WITH (OIDS=FALSE);
ALTER TABLE "suratjalan" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "transaksibarang"
-- ----------------------------
DROP TABLE IF EXISTS "transaksibarang";
CREATE TABLE "transaksibarang" (
	"idtransaksibarang" int4 NOT NULL,
	"tanggaltransaksi" timestamp(6) NULL,
	"iddeliveryorderdetail" int4,
	"idpengadaandetail" int4,
	"iddeliveryorder" int4,
	"idpengadaan" int4,
	"transaksi" "status_transaksi"
)
WITH (OIDS=FALSE);
ALTER TABLE "transaksibarang" OWNER TO "postgres";

-- ----------------------------
--  Records of "transaksibarang"
-- ----------------------------
BEGIN;
INSERT INTO "transaksibarang" VALUES ('8', '2015-04-15 00:00:00', '0', '7', null, '8', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('9', '2015-07-14 00:00:00', null, '0', '8', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('10', '2015-07-14 00:00:00', null, '0', '9', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('11', '2015-07-14 00:00:00', null, '0', '9', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('12', '2015-07-14 00:00:00', null, '0', '10', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('13', '2015-07-14 00:00:00', null, '0', '10', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('14', '2015-07-13 00:00:00', '3', '0', '14', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('15', '2015-07-13 00:00:00', '4', '0', '14', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('16', '2015-07-13 00:00:00', '5', '0', '15', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('17', '2015-07-13 00:00:00', '6', '0', '15', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('20', '2015-07-13 00:00:00', '0', '1', null, '1', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('21', '2015-07-29 00:00:00', '1', '0', '1', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('22', '2015-07-29 00:00:00', '2', '0', '2', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('23', '2015-07-29 00:00:00', '0', null, null, '2', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('24', '2015-07-29 00:00:00', '3', '0', '3', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('25', '2015-07-29 00:00:00', '0', null, null, '3', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('26', '2015-07-29 00:00:00', '4', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('27', '2015-07-29 00:00:00', '5', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('28', '2015-07-29 00:00:00', '6', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('29', '2015-07-29 00:00:00', '7', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('30', '2015-07-29 00:00:00', '8', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('31', '2015-07-29 00:00:00', '9', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('32', '2015-07-29 00:00:00', '10', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('33', '2015-07-29 00:00:00', '11', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('34', '2015-07-29 00:00:00', '12', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('35', '2015-07-29 00:00:00', '13', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('36', '2015-07-29 00:00:00', '14', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('37', '2015-07-29 00:00:00', '15', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('38', '2015-07-29 00:00:00', '16', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('39', '2015-07-29 00:00:00', '17', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('40', '2015-07-29 00:00:00', '18', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('41', '2015-07-29 00:00:00', '19', '0', '4', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('42', '2015-07-29 00:00:00', '0', '2', null, '4', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('43', '2015-07-29 00:00:00', '20', '0', '5', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('44', '2015-07-29 00:00:00', '0', '3', null, '5', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('45', '2015-07-29 00:00:00', '21', '0', '6', null, 'KIRIM');
INSERT INTO "transaksibarang" VALUES ('46', '2015-07-29 00:00:00', '0', null, null, '6', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('47', '2015-09-04 00:00:00', '0', '4', null, '7', 'TERIMA');
INSERT INTO "transaksibarang" VALUES ('48', '2015-12-01 00:00:00', '22', '0', '7', null, 'KIRIM');
COMMIT;

-- ----------------------------
--  Table structure for "useraccount"
-- ----------------------------
DROP TABLE IF EXISTS "useraccount";
CREATE TABLE "useraccount" (
	"password" varchar(64),
	"namalengkap" varchar(64),
	"nomorhp" varchar(16),
	"email" varchar(64) NOT NULL,
	"alamat" varchar(128),
	"idrole" int4 NOT NULL,
	"idrefstore" int4 NOT NULL,
	"actived" int4 NOT NULL DEFAULT 0,
	"hash" text,
	"active_date" timestamp(6) WITH TIME ZONE,
	"image_file" varchar(140)
)
WITH (OIDS=FALSE);
ALTER TABLE "useraccount" OWNER TO "postgres";

-- ----------------------------
--  Records of "useraccount"
-- ----------------------------
BEGIN;
INSERT INTO "useraccount" VALUES ('SXjHjHRERUsejtS2kdkaSXs2kbg4jKxx', 'dina', null, 'dina@ymail.com', null, '6', '2', '1', null, null, null);
INSERT INTO "useraccount" VALUES ('SXjHjHRERUsejtS2kdkaSXs2kbg4jKxx', 'imam', null, 'imammz@ymail.com', null, '6', '1', '1', null, null, null);
INSERT INTO "useraccount" VALUES ('SXjHjHRERUsejtS2kdkaSXs2kbg4jKxx', 'Wahyu Faira', null, 'fai@gmail.com', null, '6', '3', '0', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for "refjenislogs"
-- ----------------------------
DROP TABLE IF EXISTS "refjenislogs";
CREATE TABLE "refjenislogs" (
	"idrefjenislogs" int4 NOT NULL,
	"jenis" char(64)
)
WITH (OIDS=FALSE);
ALTER TABLE "refjenislogs" OWNER TO "postgres";

-- ----------------------------
--  Records of "refjenislogs"
-- ----------------------------
BEGIN;
INSERT INTO "refjenislogs" VALUES ('1', 'Login                                                           ');
INSERT INTO "refjenislogs" VALUES ('2', 'Logout                                                          ');
INSERT INTO "refjenislogs" VALUES ('3', 'Tambah Data Barang                                              ');
COMMIT;

-- ----------------------------
--  Table structure for "logs"
-- ----------------------------
DROP TABLE IF EXISTS "logs";
CREATE TABLE "logs" (
	"idlogs" int4,
	"ipaddress" char(128),
	"email" char(128),
	"namalengkap" char(128),
	"idrefstore" int4,
	"logstime" timestamp(6) NULL,
	"idrefjenislogs" int4
)
WITH (OIDS=FALSE);
ALTER TABLE "logs" OWNER TO "postgres";

-- ----------------------------
--  Records of "logs"
-- ----------------------------
BEGIN;
INSERT INTO "logs" VALUES (null, '::1                                                                                                                             ', 'imammz@ymail.com                                                                                                                ', 'imam                                                                                                                            ', '1', '2015-11-27 10:27:35', '1');
INSERT INTO "logs" VALUES (null, '::1                                                                                                                             ', 'imammz@ymail.com                                                                                                                ', 'imam                                                                                                                            ', '1', '2015-11-27 15:22:42', '1');
INSERT INTO "logs" VALUES (null, '::1                                                                                                                             ', 'imammz@ymail.com                                                                                                                ', 'imam                                                                                                                            ', '1', '2015-11-27 16:50:37', '1');
INSERT INTO "logs" VALUES (null, '::1                                                                                                                             ', 'imammz@ymail.com                                                                                                                ', 'imam                                                                                                                            ', '1', '2015-11-27 17:08:23', '1');
INSERT INTO "logs" VALUES (null, '::1                                                                                                                             ', 'imammz@ymail.com                                                                                                                ', 'imam                                                                                                                            ', '1', '2015-11-30 09:08:17', '1');
INSERT INTO "logs" VALUES (null, '::1                                                                                                                             ', 'imammz@ymail.com                                                                                                                ', 'imam                                                                                                                            ', '1', '2015-12-01 20:01:01', '1');
INSERT INTO "logs" VALUES (null, '::1                                                                                                                             ', 'fai@gmail.com                                                                                                                   ', 'Wahyu Faira                                                                                                                     ', '3', '2015-12-01 20:25:47', '1');
COMMIT;

-- ----------------------------
--  Table structure for "pelanggan"
-- ----------------------------
DROP TABLE IF EXISTS "pelanggan";
CREATE TABLE "pelanggan" (
	"idpelanggan" int4 NOT NULL,
	"namapelanggan" varchar(128),
	"nomorhppelanggan" varchar(45),
	"emailpelanggan" varchar(128),
	"alamatpelanggan" varchar(45),
	"kotapelanggan" varchar(45),
	"jenispelanggan" varchar(250) NOT NULL,
	"keterangan" text,
	"idrefstore" int4
)
WITH (OIDS=FALSE);
ALTER TABLE "pelanggan" OWNER TO "postgres";

-- ----------------------------
--  Records of "pelanggan"
-- ----------------------------
BEGIN;
INSERT INTO "pelanggan" VALUES ('4', 'PT Atma Jaya', '019101', 'atmajaya@gmail.com', 'Jl Baktijaya Pocis 11 no 64', 'Tangerang Selatan', 'PT', '0', null);
INSERT INTO "pelanggan" VALUES ('3', 'Dina''s Store 2', '1232', 'dinastore@gmail.com2', 'Jaksel2', 'Jakarta', 'Bizon Partner', '0', null);
INSERT INTO "pelanggan" VALUES ('1', 'Joni A', '09181212', 'joni@ymail.com', '', '', 'PT', '0', null);
COMMIT;

-- ----------------------------
--  Table structure for "supplier"
-- ----------------------------
DROP TABLE IF EXISTS "supplier";
CREATE TABLE "supplier" (
	"idsupplier" int4 NOT NULL,
	"namasupplier" varchar(128),
	"nomorhpsupplier" varchar(45),
	"emailsupplier" varchar(128),
	"alamatsupplier" varchar(45),
	"kotasupplier" varchar(45),
	"jenissupplier" varchar(250) NOT NULL,
	"keterangan" text,
	"idrefstore" int4
)
WITH (OIDS=FALSE);
ALTER TABLE "supplier" OWNER TO "postgres";

-- ----------------------------
--  Records of "supplier"
-- ----------------------------
BEGIN;
INSERT INTO "supplier" VALUES ('1', 'PT Jaya Agung A', '08129201', 'jayaagung@gmail.com', 'Jl Bintaro Jaya Nomor 12', 'Tangerang Kota', 'PT', '....  ', null);
INSERT INTO "supplier" VALUES ('5', 'Zerro Shops Z', '3219', 'zerroshopZZ@ymail.com', 'JaktimZ', 'Jakarta', 'Bizon PartnerZ', 'Partner Sharing Product', null);
COMMIT;

-- ----------------------------
--  Table structure for "refjenisreport"
-- ----------------------------
DROP TABLE IF EXISTS "refjenisreport";
CREATE TABLE "refjenisreport" (
	"idrefjenisreport" int4 NOT NULL,
	"jenisreport" varchar(64) NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "refjenisreport" OWNER TO "postgres";

-- ----------------------------
--  Records of "refjenisreport"
-- ----------------------------
BEGIN;
INSERT INTO "refjenisreport" VALUES ('1', 'Laporan Barang Masuk');
INSERT INTO "refjenisreport" VALUES ('2', 'Laporan Barang Keluar');
INSERT INTO "refjenisreport" VALUES ('3', 'Mutasi Stock');
INSERT INTO "refjenisreport" VALUES ('4', 'Stock Control');
INSERT INTO "refjenisreport" VALUES ('5', 'Laporan Quotation');
COMMIT;

-- ----------------------------
--  Table structure for "quotation"
-- ----------------------------
DROP TABLE IF EXISTS "quotation";
CREATE TABLE "quotation" (
	"idquotaion" int4 NOT NULL,
	"idpelanggan" int4 NOT NULL,
	"tanggalqutation" timestamp(6) NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "quotation" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "refstatus"
-- ----------------------------
DROP TABLE IF EXISTS "refstatus";
CREATE TABLE "refstatus" (
	"idrefstatus" int4 NOT NULL,
	"status" varchar(64) NOT NULL,
	"step" varchar(64)
)
WITH (OIDS=FALSE);
ALTER TABLE "refstatus" OWNER TO "postgres";

-- ----------------------------
--  Records of "refstatus"
-- ----------------------------
BEGIN;
INSERT INTO "refstatus" VALUES ('1', 'KIRIM Quotation', 'Sales');
INSERT INTO "refstatus" VALUES ('2', 'PROSES PO', 'Sales');
INSERT INTO "refstatus" VALUES ('3', 'BATAL PO', 'Sales');
INSERT INTO "refstatus" VALUES ('4', 'PO', 'Purchasing');
INSERT INTO "refstatus" VALUES ('5', 'PROSES DO', 'Purchasing');
INSERT INTO "refstatus" VALUES ('6', 'BATAL DO', 'Purchasing');
INSERT INTO "refstatus" VALUES ('7', 'DO', 'Inventory');
INSERT INTO "refstatus" VALUES ('8', 'Barang Diterima', 'Inventory');
COMMIT;

-- ----------------------------
--  Table structure for "deliveryorder"
-- ----------------------------
DROP TABLE IF EXISTS "deliveryorder";
CREATE TABLE "deliveryorder" (
	"iddeliveryorder" int4 NOT NULL DEFAULT nextval('deliveryorder_iddo_seq'::regclass),
	"nomordo" varchar(45),
	"tanggaldo" timestamp(6) NULL,
	"nomorpo" varchar(45),
	"nomorso" varchar(45),
	"disetujui" varchar(45),
	"idpelanggan" int4 NOT NULL,
	"insertby" varchar(64) NOT NULL,
	"insertdate" timestamp(6) NULL,
	"status" varchar(250),
	"idrefstore" int4 NOT NULL,
	"flag_app" "status_flag_app",
	"idquotationsales" int4,
	"nama_kurir" varchar(128),
	"nama_penerima" varchar(128),
	"tanggal_diterima" timestamp(6) NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "deliveryorder" OWNER TO "postgres";

-- ----------------------------
--  Records of "deliveryorder"
-- ----------------------------
BEGIN;
INSERT INTO "deliveryorder" VALUES ('2', 'SP2-1', '2015-07-29 00:00:00', null, null, 'imammz@ymail.com', '2', 'imammz@ymail.com', null, 'PROSES', '1', 'WEB', null, null, null, null);
INSERT INTO "deliveryorder" VALUES ('3', 'SP2-2', '2015-07-29 00:00:00', null, null, 'imammz@ymail.com', '3', 'imammz@ymail.com', null, 'PROSES', '1', 'WEB', null, null, null, null);
INSERT INTO "deliveryorder" VALUES ('4', '000004A', '2015-07-29 00:00:00', null, null, 'imam', '1', 'imammz@ymail.com', null, 'PROSES', '1', 'WEB', null, null, null, null);
INSERT INTO "deliveryorder" VALUES ('5', '00006D', '2015-07-29 00:00:00', null, null, 'imam', '1', 'imammz@ymail.com', null, 'PROSES', '1', 'WEB', null, null, null, null);
INSERT INTO "deliveryorder" VALUES ('6', 'SP2-3', '2015-07-29 00:00:00', null, null, 'imammz@ymail.com', '3', 'imammz@ymail.com', null, 'PROSES', '1', 'WEB', null, null, null, null);
INSERT INTO "deliveryorder" VALUES ('7', '000011', '2015-12-01 00:00:00', null, null, '', '3', 'fai@gmail.com', null, 'PROSES', '3', 'WEB', null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for "invoice"
-- ----------------------------
DROP TABLE IF EXISTS "invoice";
CREATE TABLE "invoice" (
	"idinvoice" int4 NOT NULL,
	"nomor_invoice" varchar(64) NOT NULL,
	"tanggal_invoice" timestamp(6) NOT NULL,
	"idquotationsales" int4 NOT NULL,
	"idpelanggan" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "invoice" OWNER TO "postgres";

-- ----------------------------
--  Table structure for "refjenispembayaran"
-- ----------------------------
DROP TABLE IF EXISTS "refjenispembayaran";
CREATE TABLE "refjenispembayaran" (
	"idrefjenispembayaran" int4 NOT NULL,
	"jenispembayaran" varchar(128) NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "refjenispembayaran" OWNER TO "postgres";

-- ----------------------------
--  Records of "refjenispembayaran"
-- ----------------------------
BEGIN;
INSERT INTO "refjenispembayaran" VALUES ('2', 'Lunas Di Akhir');
INSERT INTO "refjenispembayaran" VALUES ('1', 'Lunas Di Awal');
INSERT INTO "refjenispembayaran" VALUES ('3', 'Cicilan');
COMMIT;


-- ----------------------------
--  Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "deliveryorder_iddo_seq" OWNED BY "deliveryorder"."iddeliveryorder";
-- ----------------------------
--  Primary key structure for table "deliveryorderdetail"
-- ----------------------------
ALTER TABLE "deliveryorderdetail" ADD CONSTRAINT "deliveryorderdetail_pkey" PRIMARY KEY ("iddeliveryorderdetail") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "fakturpurchase"
-- ----------------------------
ALTER TABLE "fakturpurchase" ADD CONSTRAINT "fakturpurchase_pkey" PRIMARY KEY ("idfakturpurchase") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "fakturpurchasedetail"
-- ----------------------------
ALTER TABLE "fakturpurchasedetail" ADD CONSTRAINT "fakturpurchasedetail_pkey" PRIMARY KEY ("idfakturpurchase", "idrefbarang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "faktursales"
-- ----------------------------
ALTER TABLE "faktursales" ADD CONSTRAINT "faktursales_pkey" PRIMARY KEY ("idfaktursales") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "faktursalesdetail"
-- ----------------------------
ALTER TABLE "faktursalesdetail" ADD CONSTRAINT "faktursalesdetail_pkey" PRIMARY KEY ("idfaktursales", "idrefbarang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "hutang"
-- ----------------------------
ALTER TABLE "hutang" ADD CONSTRAINT "hutang_pkey" PRIMARY KEY ("idhutang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "menu"
-- ----------------------------
ALTER TABLE "menu" ADD CONSTRAINT "menu_pkey" PRIMARY KEY ("idmenu") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "menurole"
-- ----------------------------
ALTER TABLE "menurole" ADD CONSTRAINT "menurole_pkey" PRIMARY KEY ("idmenurole") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "package"
-- ----------------------------
ALTER TABLE "package" ADD CONSTRAINT "idpackage" PRIMARY KEY ("idpackage") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "pengadaan"
-- ----------------------------
ALTER TABLE "pengadaan" ADD CONSTRAINT "pengadaan_pkey" PRIMARY KEY ("idpengadaan") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "pengadaandetail"
-- ----------------------------
ALTER TABLE "pengadaandetail" ADD CONSTRAINT "pengadaandetail_pkey" PRIMARY KEY ("idpengadaandetail") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "piutang"
-- ----------------------------
ALTER TABLE "piutang" ADD CONSTRAINT "piutang_pkey" PRIMARY KEY ("idpiutang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "quotationpurchase"
-- ----------------------------
ALTER TABLE "quotationpurchase" ADD CONSTRAINT "quotationpurchase_pkey" PRIMARY KEY ("idquotationpurchase") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "quotationpurchasedetail"
-- ----------------------------
ALTER TABLE "quotationpurchasedetail" ADD CONSTRAINT "quotationpurchasedetail_pkey" PRIMARY KEY ("idquotationpurchase", "idrefbarang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refbarang"
-- ----------------------------
ALTER TABLE "refbarang" ADD CONSTRAINT "refbarang_pkey" PRIMARY KEY ("idrefbarang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refgudang"
-- ----------------------------
ALTER TABLE "refgudang" ADD CONSTRAINT "refgudang_pkey" PRIMARY KEY ("idrefgudang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refjenisbarang"
-- ----------------------------
ALTER TABLE "refjenisbarang" ADD CONSTRAINT "refjenisbarang_pkey" PRIMARY KEY ("idrefjenisbarang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refsatuan"
-- ----------------------------
ALTER TABLE "refsatuan" ADD CONSTRAINT "refsatuan_pkey" PRIMARY KEY ("idrefsatuan") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "quotationsales"
-- ----------------------------
ALTER TABLE "quotationsales" ADD CONSTRAINT "quotationsales_pkey" PRIMARY KEY ("idquotationsales") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refstore"
-- ----------------------------
ALTER TABLE "refstore" ADD CONSTRAINT "refstore_pkey" PRIMARY KEY ("idrefstore") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "role"
-- ----------------------------
ALTER TABLE "role" ADD CONSTRAINT "Role_pkey" PRIMARY KEY ("idrole") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "suratjalan"
-- ----------------------------
ALTER TABLE "suratjalan" ADD CONSTRAINT "suratjalan_pkey" PRIMARY KEY ("idsuratjalan") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "transaksibarang"
-- ----------------------------
ALTER TABLE "transaksibarang" ADD CONSTRAINT "transaksibarang_pkey" PRIMARY KEY ("idtransaksibarang") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "useraccount"
-- ----------------------------
ALTER TABLE "useraccount" ADD CONSTRAINT "User_pkey" PRIMARY KEY ("email") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refjenislogs"
-- ----------------------------
ALTER TABLE "refjenislogs" ADD CONSTRAINT "idrefjenislogs" PRIMARY KEY ("idrefjenislogs") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "pelanggan"
-- ----------------------------
ALTER TABLE "pelanggan" ADD CONSTRAINT "pelanggan_pkey" PRIMARY KEY ("idpelanggan") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "supplier"
-- ----------------------------
ALTER TABLE "supplier" ADD CONSTRAINT "supplier_pkey" PRIMARY KEY ("idsupplier") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refjenisreport"
-- ----------------------------
ALTER TABLE "refjenisreport" ADD CONSTRAINT "refjenisreport_pkey" PRIMARY KEY ("idrefjenisreport") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "deliveryorder"
-- ----------------------------
ALTER TABLE "deliveryorder" ADD CONSTRAINT "deliveryorder_pkey" PRIMARY KEY ("iddeliveryorder") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table "refjenispembayaran"
-- ----------------------------
ALTER TABLE "refjenispembayaran" ADD CONSTRAINT "refjenispembayaran_pkey" PRIMARY KEY ("idrefjenispembayaran") NOT DEFERRABLE INITIALLY IMMEDIATE;

