/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : ktl

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-03-17 01:50:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `kpi`
-- ----------------------------
DROP TABLE IF EXISTS `kpi`;
CREATE TABLE `kpi` (
  `kpi_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `kpi_group` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `kpi_no` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `kpi_name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `detail` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `target` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `owner` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `kpi_data` varchar(100) CHARACTER SET utf8 DEFAULT '' COMMENT 'เป้าหมาย',
  `kpi_result` varchar(100) CHARACTER SET utf8 DEFAULT '' COMMENT 'ผลงานที่ได้',
  `kpi_rate` decimal(6,0) DEFAULT 0 COMMENT 'ร้อยละที่ได้',
  `kpi_type_data` char(1) CHARACTER SET utf8 DEFAULT '' COMMENT '0 มากดี 1 น้อยดี',
  `kpi_tar` decimal(6,0) DEFAULT 0 COMMENT 'เกณฑ์เป้าหมาย',
  `kpi_scale` double DEFAULT NULL COMMENT 'scale cockpit',
  `kpi_source` varchar(2) DEFAULT '' COMMENT 'แหล่งข้อมูล 1 กรอก 2 ประมวลผล',
  `kpi_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ว ด ป ปรับข้อมูล',
  `flag_result` int(1) DEFAULT 0 COMMENT 'ผลการประเมิน',
  PRIMARY KEY (`kpi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of kpi
-- ----------------------------
INSERT INTO `kpi` VALUES ('101', '1', '1', 'ระดับความเสี่ยงด้านการเงิน (risk score)  ', 'อัตรา/เดือน', 'ไม่เกินระดับ ๓', 'การเงิน , CFO , งานประกันฯ', '100', '90', '90', '0', '100', '100', '1', '2021-03-17 01:47:55', '0');
INSERT INTO `kpi` VALUES ('102', '1', '1.1', 'อัตราสภาพคล่องทางการเงิน', null, null, null, '100', '22', '22', '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('103', '1', '1.1.1', 'Quick Ratio', 'อัตรา/เดือน', '≥ ๑', 'การเงิน , CFO , งานประกันฯ', '60', '50', '90', '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('104', '1', '1.1.2', 'Current Ratio', 'อัตรา/เดือน', '≥ ๑.๕', 'การเงิน , CFO , งานประกันฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('105', '1', '1.1.3', 'Cash Ratio', 'อัตรา/เดือน', '≥ ๐.๘', 'การเงิน , CFO , งานประกันฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('106', '1', '1.2', 'ความมั่นคงทางการเงิน ', null, null, null, null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('107', '1', '1.2.1', 'NWC เป็นบวก', 'จำนวนเงิน/เดือน', '> ๐', 'การเงิน , CFO , งานประกันฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('108', '1', '1.2.2', 'EBITDA เป็นบวก', 'จำนวนเงิน/เดือน', '> ๐', 'การเงิน , CFO , งานประกันฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('109', '1', '2', 'ข้อมูลทางบัญชีผ่านเกณฑ์คุณภาพบัญชี', 'ร้อยละ/ไตรมาส', '90', 'การเงิน , CFO , งานประกันฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('110', '2', '3', 'อัตราความพึงพอใจของผู้รับบริการ ', null, null, null, null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('111', '2', '3.1', 'ผู้ป่วยนอก', 'ร้อยละ/ปีละ๒ครั้ง', '≥๘๕', 'คุณกาญจนา จึงธีรพานิช', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('112', '2', '3.2', 'ผู้ป่วยใน', 'ร้อยละ/ปีละ๒ครั้ง', '≥๘๕', 'คุณนันทนา  บุญพอ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('113', '3', '4', 'บริการด้านการแพทย์เฉพาะทางที่สามารถเปิดบริการได้ครบ ๔ สาขาหลัก', 'สาขา/ปี', '๒ สาขา (กุมารเวชกรรม/อายุรกรรม)', 'องค์กรแพทย์', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('114', '3', '5', 'อัตราการเข้าถึงบริการสุขภาพตามกลุ่มวัย', null, null, null, null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('115', '3', '5.1', 'ร้อยละผู้ป่วยโรคสมาธิสั้นเข้าถึงบริการสุขภาพจิต', 'ร้อยละ/๓ เดือน', '30', 'ปฐมภูมิฯ , NCD', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('116', '3', '5.2', 'ร้อยละเด็กอายุ ๖-๑๔ ปี สูงดี สมส่วน', 'ร้อยละ/ปีละ๒ครั้ง', '67', 'ปฐมภูมิฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('117', '3', '5.3', 'ร้อยละการตั้งครรภ์ซ้ำในหญิงอายุน้อยกว่า ๒๐ ปี', 'ร้อยละ/๓ เดือน', '<๑๔', 'ปฐมภูมิฯ , ANC', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('118', '3', '5.4', 'ร้อยละของประชากรสูงอายุที่มีพฤติกรรมสุขภาพที่พึงประสงค์', 'ร้อยละ/๓ เดือน', '60', 'ปฐมภูมิฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('119', '3', '5.5', 'ร้อยละสตรีอายุ ๓๐-๖๐ ปีได้รับการคัดกรองมะเร็งปากมดลูก', 'ร้อยละ/๓ เดือน', '80', 'ปฐมภูมิฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('120', '3', '5.6', 'ร้อยละของผู้ป่วยโรคเบาหวานรายใหม่ลดลง', 'ร้อยละ/ ๓ เดือน', '≥ ๕', 'ปฐมภูมิฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('121', '3', '5.7', 'ร้อยละกลุ่มสงสัยป่วยโรคความดันโลหิตสูงได้รับการติดตาม', 'ร้อยละ/ ๓ เดือน', '≥ ๕๒', 'ปฐมภูมิฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('122', '3', '6', 'อัตราการเกิดอุบัติการณ์ทางคลินิก ระดับ E – I ', 'ร้อยละ/เดือน', '< ๕', 'RM , PCT , ทุกหน่วยงาน', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('123', '3', '7', 'อัตราการทบทวน อุบัติการณ์ทางคลินิก ระดับ E – I', 'ร้อยละ/เดือน', '100', 'RM , PCT , ทุกหน่วยงาน', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('124', '3', '8', 'ผ่านการรับรองคุณภาพ ', null, null, null, null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('125', '3', '8.1', 'HA', 'ผ่าน/๓ปี', 'ผ่านRe-Ac๒', 'QMR , ศูนย์คุณภาพ , ทุกหน่วยงาน', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('126', '3', '8.2', 'QA', 'ผ่าน/ปี', 'ผ่านระดับ๒', 'องค์กพยาบาล', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('127', '3', '8.3', 'LA (ผ่านการรับรองปี ๖๔ แล้ว หมดอายุ ๑๖ ธค. ๖๔)', 'ผ่าน/ปี', 'ผ่าน', 'เทคนิคการแพทย์', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('128', '4', '9', 'ระดับความสำเร็จการผ่านประเมินมาตรฐาน HA_IT ', 'ขั้น/ปี', 'ขั้นที่ ๑', 'IT , IM', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('129', '4', '10', 'ระดับความสำเร็จระบบติดตาม กำกับการดำเนินงาน ', 'ระดับ/เดือน', 'ระดับ ๑ และ 2 ๑๐๐%', 'งานประกันฯ , ศูนย์คุณภาพ , ทีมนำ , ทุกหน่วยงาน', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('134', '5', '11', 'ระดับความสำเร็จของการจัดหา/ปรับปรุงอาคารบริการ/สนับสนุนบริการ (ทั้งหมด ๑๓ โครงการ)', 'ระดับ/ปี', 'ระดับ ๑ ร้อยละ๕๐', 'บริหาร , ENV', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('138', '6', '12', '๑๒. อัตราบุคลากรสายวิชาชีพหลัก สายวิชาชีพเฉพาะ และบุคลากรสายสนับสนุน ครบตามเกณฑ์ (กรอบFTEกระทรวงฯ)', 'ร้อยละ/ปี', '≥๘๐', 'งานการเจ้าหน้าที่ , HR', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('139', '6', '13', 'อัตราบุคลากรผ่านเกณฑ์การประเมิน competency ', null, null, null, null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('140', '6', '13.1', 'Core competency ', 'ร้อยละ/ปีละ๒ครั้ง', '≥๘๐', 'HR', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('141', '6', '13.2', 'Functional competency ', 'ร้อยละ/ปี', '≥๘๐', 'HR', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('142', '6', '13.3', 'Specific competency ', 'ร้อยละ/ปี', '≥๘๐', 'HR', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('143', '6', '14', 'อัตราบุคลากรมีภาวะสุขภาพอยู่ในเกณฑ์ปกติ ', 'ร้อยละ/ปี', '≥๗๐', 'HR', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('144', '6', '15', 'ระดับความสุขของบุคลากร (วัดจากความพึงพอใจของบุคลากร)', 'ร้อยละ/ปี', '≥๗๐', 'คุณนันทนา  บุญพอ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('145', '6', '16', 'จำนวนบุคลากรเจ็บป่วยจากการทำงาน', null, null, null, null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('146', '6', '16.1', 'จำนวนบุคลากรที่ได้รับอุบัติเหตุเกิดจากการปฏิบัติงาน', 'คน/ปี', '≤๑๐', 'IC', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('147', '6', '16.2', 'จำนวนบุคลากรติดเชื้อ TB', 'คน/ปี', '0', 'IC', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('148', '6', '16.3', 'จำนวนบุคลากรติดเชื้อ Hep-B', 'คน/ปี', '0', 'IC', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('149', '6', '16.4', 'จำนวนบุคลากรติดเชื้อ โรคอุบัติใหม่ Covid-๑๙', 'คน/ปี', '0', 'IC', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('150', '7', '17', 'จำนวน PCC ที่ได้มาตรฐานตามเกณฑ์ (เดิมมี๓ทีม)', 'ทีม/ปี', '๒ ทีม', 'ปฐมภูมิฯ', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('151', '7', '18', 'ร้อยละผู้รับบริการ OPD ที่มาจาก PCC ในเขตอำเภอกันทรารมย์ลดลง', 'ร้อยละ/ปี', 'ลดลง ๒๐%', 'ปฐมภูมิ , OPD', null, null, null, '0', '100', '100', null, null, '0');
INSERT INTO `kpi` VALUES ('152', '7', '19', 'จำนวน รพ.สต. ที่สามารถเข้าถึงข้อมูลผู้รับบริการในโรงพยาบาล ตามชั้นความลับ', 'แห่ง/ปี', '17', 'ปฐมภูมิฯ', null, null, null, '0', '100', '100', null, null, '0');

-- ----------------------------
-- Table structure for `kpi_group`
-- ----------------------------
DROP TABLE IF EXISTS `kpi_group`;
CREATE TABLE `kpi_group` (
  `g_no` int(2) NOT NULL,
  `g_name` varchar(100) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`g_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of kpi_group
-- ----------------------------
INSERT INTO `kpi_group` VALUES ('1', 'ด้านการเงิน');
INSERT INTO `kpi_group` VALUES ('2', 'ด้านผู้รับบริการ');
INSERT INTO `kpi_group` VALUES ('3', 'ด้านกระบวนการ');
INSERT INTO `kpi_group` VALUES ('4', 'ด้านเทคโนโลยี');
INSERT INTO `kpi_group` VALUES ('5', 'ด้านโครงสร้างพื้นฐาน');
INSERT INTO `kpi_group` VALUES ('6', 'ด้านบุคลากร');
INSERT INTO `kpi_group` VALUES ('7', 'ด้านสังคมชุมชนเครือข่ายฯ');

-- ----------------------------
-- Table structure for `mem_kpi`
-- ----------------------------
DROP TABLE IF EXISTS `mem_kpi`;
CREATE TABLE `mem_kpi` (
  `mem_no` int(3) NOT NULL AUTO_INCREMENT,
  `mem_id` int(3) DEFAULT NULL,
  `kpi_id` varchar(3) CHARACTER SET utf8 DEFAULT '',
  `d_update` timestamp(3) NULL DEFAULT NULL,
  PRIMARY KEY (`mem_no`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mem_kpi
-- ----------------------------
INSERT INTO `mem_kpi` VALUES ('1', '1', '101', '0000-00-00 00:00:00.000');
INSERT INTO `mem_kpi` VALUES ('2', '1', '102', null);
INSERT INTO `mem_kpi` VALUES ('3', '1', '103', null);
INSERT INTO `mem_kpi` VALUES ('4', '71', '111', null);
INSERT INTO `mem_kpi` VALUES ('72', '68', '112', null);
INSERT INTO `mem_kpi` VALUES ('73', '149', '115', null);
INSERT INTO `mem_kpi` VALUES ('74', '147', '116', null);
INSERT INTO `mem_kpi` VALUES ('75', '147', '117', null);
INSERT INTO `mem_kpi` VALUES ('76', '150', '118', null);
INSERT INTO `mem_kpi` VALUES ('77', '147', '119', null);
INSERT INTO `mem_kpi` VALUES ('78', '113', '120', null);
INSERT INTO `mem_kpi` VALUES ('79', '113', '121', null);
INSERT INTO `mem_kpi` VALUES ('80', '147', '150', null);
INSERT INTO `mem_kpi` VALUES ('81', '147', '151', null);
INSERT INTO `mem_kpi` VALUES ('82', '147', '152', null);
INSERT INTO `mem_kpi` VALUES ('83', '37', '142', null);
INSERT INTO `mem_kpi` VALUES ('84', '37', '140', null);
INSERT INTO `mem_kpi` VALUES ('85', '37', '141', null);
INSERT INTO `mem_kpi` VALUES ('86', '109', '147', null);
INSERT INTO `mem_kpi` VALUES ('87', '20', '134', null);
INSERT INTO `mem_kpi` VALUES ('88', '172', '128', null);
INSERT INTO `mem_kpi` VALUES ('89', '139', '129', null);
INSERT INTO `mem_kpi` VALUES ('90', '139', '103', null);
INSERT INTO `mem_kpi` VALUES ('91', '139', '104', null);
INSERT INTO `mem_kpi` VALUES ('92', '139', '105', null);
INSERT INTO `mem_kpi` VALUES ('93', '77', '122', null);
INSERT INTO `mem_kpi` VALUES ('94', '77', '123', null);
INSERT INTO `mem_kpi` VALUES ('95', '8', '113', null);

-- ----------------------------
-- Table structure for `tb_member`
-- ----------------------------
DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member` (
  `mem_id` int(3) NOT NULL AUTO_INCREMENT,
  `mem_user` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `mem_password` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `mem_name` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `mem_clinic` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `mem_level` varchar(100) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_member
-- ----------------------------
INSERT INTO `tb_member` VALUES ('1', 'leo', 'leo', 'ยุพราช พันแสน', '1', '2');
INSERT INTO `tb_member` VALUES ('2', 'neo', 'neo', 'วราวุธ อสิพงษ์', '2', '2');
INSERT INTO `tb_member` VALUES ('3', 'wrw', 'wrw', 'วีระวุธ เพ็งชัย', '3', '2');
INSERT INTO `tb_member` VALUES ('8', '1349900092525', 'h10928', 'นายกิตติคม  วงศ์ชา', '1', '2');
INSERT INTO `tb_member` VALUES ('9', '1339900215724', 'h10928', 'นางสาวกมลพรรณ อ้อมแก้ว', '1', '2');
INSERT INTO `tb_member` VALUES ('10', '1339900234648', 'h10928', 'นายณัฐชนน  วงศ์ชา', '1', '2');
INSERT INTO `tb_member` VALUES ('11', '1349900502049', 'h10928', 'นายอภิเชษฐ์  ทัดเทียม', '1', '2');
INSERT INTO `tb_member` VALUES ('12', '1339900229946', 'h10928', 'นายพงษ์เสก   สมสุข', '1', '2');
INSERT INTO `tb_member` VALUES ('13', '1309900844993', 'h10928', 'นายพงศ์วิชญ์   แก้วภมร', '1', '2');
INSERT INTO `tb_member` VALUES ('14', '1350100260417', 'h10928', 'นางสาวฟาติมา  แสงศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('15', '1330900214886', 'h10928', 'นางสาวกมลเนตร  มณีนิล', '1', '2');
INSERT INTO `tb_member` VALUES ('16', '3339900134208', 'h10928', 'นายพิชิต  ตรีไตรสิทธิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('17', '1349900538752', 'h10928', 'นายจตุรภัทร  สมานพงษ์', '1', '2');
INSERT INTO `tb_member` VALUES ('18', '1339900392146', 'h10928', 'นายศรัณย์  นิติศิริ', '1', '2');
INSERT INTO `tb_member` VALUES ('19', '1339900375144', 'h10928', 'นายวิบูลย์ลักษณ์  นามสาย', '1', '2');
INSERT INTO `tb_member` VALUES ('20', '3330300319781', 'h10928', 'นายกิติเวช  โคตรวงศ์', '1', '2');
INSERT INTO `tb_member` VALUES ('21', '3330300740362', 'h10928', 'นางสาวลำใย   ศิริบูรณ์', '1', '2');
INSERT INTO `tb_member` VALUES ('22', '3349900305711', 'h10928', 'นางปรินรัตน์  จันดาพืช', '1', '2');
INSERT INTO `tb_member` VALUES ('23', '3480400218586', 'h10928', 'นางปาริชาต  วงศ์ประสาร', '1', '2');
INSERT INTO `tb_member` VALUES ('24', '3349800099052', 'h10928', 'นางกนกวรรณ  อรัญถิตย์', '1', '2');
INSERT INTO `tb_member` VALUES ('25', '3330300365324', 'h10928', 'นายเชาว์โกมล  เสาโกมุท', '1', '2');
INSERT INTO `tb_member` VALUES ('26', '1320100020220', 'h10928', 'นางภัทรานิษฐ์  ยิ่งยง', '1', '2');
INSERT INTO `tb_member` VALUES ('27', '3350800757060', 'h10928', 'นางสาววนิดา   สุภจันทร์', '1', '2');
INSERT INTO `tb_member` VALUES ('28', '3929900436462', 'h10928', 'นายกฤตพล  สุรศักดิ์พิพัฒน์', '1', '2');
INSERT INTO `tb_member` VALUES ('29', '3339900175150', 'h10928', 'นางเบญจมาศ  สุรศักดิ์พิพัฒน์', '1', '2');
INSERT INTO `tb_member` VALUES ('30', '1339900051705', 'h10928', 'นางสลิลรัตน์  วัฒนวงษ์สิงห์', '1', '2');
INSERT INTO `tb_member` VALUES ('31', '3339900156155', 'h10928', 'นายณัฐพงษ์  เหลืองช่อสิริ', '1', '2');
INSERT INTO `tb_member` VALUES ('32', '1339900186325', 'h10928', 'นางสาวอนงค์นาฏ  หุ่นงาม', '1', '2');
INSERT INTO `tb_member` VALUES ('33', '1199600110856', 'h10928', 'นางสาวฐิติการ์   พิเชฐไพศาล', '1', '2');
INSERT INTO `tb_member` VALUES ('34', '1101402106944', 'h10928', 'นางสาวพัณณิตา  โชติค้ำวงศ์', '1', '2');
INSERT INTO `tb_member` VALUES ('35', '3330300596016', 'h10928', 'นายสุนทร  อารีย์', '1', '2');
INSERT INTO `tb_member` VALUES ('36', '1339900400548', 'h10928', 'นายวัชรากร  ชราศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('37', '3330200117299', 'h10928', 'นายสมชาย  ชาลี', '1', '2');
INSERT INTO `tb_member` VALUES ('38', '3349900976756', 'h10928', 'นางสาวศุภร  สองสีดา', '1', '2');
INSERT INTO `tb_member` VALUES ('39', '3349900846364', 'h10928', 'นางสาวสุขุมาล  กาฬเนตร', '1', '2');
INSERT INTO `tb_member` VALUES ('40', '5341500013208', 'h10928', 'นางสาวอุไร  ขุณีวรรณ', '1', '2');
INSERT INTO `tb_member` VALUES ('41', '3330300900823', 'h10928', 'นางสาวยุวธิดา  ศิริจันดา', '1', '2');
INSERT INTO `tb_member` VALUES ('42', '3330300958082', 'h10928', 'นางสาวพัทรียา  ภักดี', '1', '2');
INSERT INTO `tb_member` VALUES ('43', '1340700212324', 'h10928', 'นางสาวจุฑารัตน์  สมดี', '1', '2');
INSERT INTO `tb_member` VALUES ('44', '3340900047382', 'h10928', 'นายขรรค์ชัย   วรรณุรักษ์', '1', '2');
INSERT INTO `tb_member` VALUES ('45', '1330900123741', 'h10928', 'นางสาวชญาฏุพัจน์  โพธิ์งาม', '1', '2');
INSERT INTO `tb_member` VALUES ('46', '3330300159970', 'h10928', 'นางปริยาภัทร  เพชรนาวี', '1', '2');
INSERT INTO `tb_member` VALUES ('47', '3330101027194', 'h10928', 'นางสาวเมทินี  แก้ววิชัย', '1', '2');
INSERT INTO `tb_member` VALUES ('48', '3331300241189', 'h10928', 'นายชาตรี   ทาบุญมา', '1', '2');
INSERT INTO `tb_member` VALUES ('49', '1330300020606', 'h10928', 'นางพิลากร  พรมขันตี', '1', '2');
INSERT INTO `tb_member` VALUES ('50', '2330700022264', 'h10928', 'นายพิทักษ์  กองตะคุ', '1', '2');
INSERT INTO `tb_member` VALUES ('51', '1331500017324', 'h10928', 'นางสาวเบญจพร  พวงปัญญา', '1', '2');
INSERT INTO `tb_member` VALUES ('52', '1330200035741', 'h10928', 'นางสาวเสาวลักษณ์  สีหะวงษ์', '1', '2');
INSERT INTO `tb_member` VALUES ('53', '1339900446157', 'h10928', 'นางสาวดวงกมล  จำปาเรือง', '1', '2');
INSERT INTO `tb_member` VALUES ('54', '1339900554596', 'h10928', 'นางสาวพรพรรณ   สุขอ้วน', '1', '2');
INSERT INTO `tb_member` VALUES ('55', '3330501012747', 'h10928', 'นายสายรุ้ง  สมาธิ', '1', '2');
INSERT INTO `tb_member` VALUES ('56', '3330401651624', 'h10928', 'นางสาวสุวรา  สีมาขันธ์', '1', '2');
INSERT INTO `tb_member` VALUES ('57', '3330301187454', 'h10928', 'นางรัชฎาภรณ์  ชาภักดี', '1', '2');
INSERT INTO `tb_member` VALUES ('58', '3470101478764', 'h10928', 'นางสาวดุจฤทัย  รับงาม', '1', '2');
INSERT INTO `tb_member` VALUES ('59', '1331200025364', 'h10928', 'นางสุประนอม วงษ์ญาติ', '1', '2');
INSERT INTO `tb_member` VALUES ('60', '1330500157478', 'h10928', 'นางสาวนงลักษ์ เพ็ญจันทร์', '1', '2');
INSERT INTO `tb_member` VALUES ('61', '3330300041928', 'h10928', 'นางมะลิวัลย์  ไชยสัตย์', '1', '2');
INSERT INTO `tb_member` VALUES ('62', '1339900067881', 'h10928', 'นางพัฑฒิดา  ศักดิวัตบวรทัต', '1', '2');
INSERT INTO `tb_member` VALUES ('63', '3330300724090', 'h10928', 'นางสาวนภกุล  ศรีอุดมวุฒิ', '1', '2');
INSERT INTO `tb_member` VALUES ('64', '2330100018401', 'h10928', 'นางสาวสุปราณี  พรมสิทธิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('65', '3330300265907', 'h10928', 'นายภัทรนันท์  ปักปิ่น', '1', '2');
INSERT INTO `tb_member` VALUES ('66', '1349900459208', 'h10928', 'นางอรอินทร์  สืบสิมมา', '1', '2');
INSERT INTO `tb_member` VALUES ('67', '3330300955024', 'h10928', 'นายฉัตรชัย  กีรติรวี', '1', '2');
INSERT INTO `tb_member` VALUES ('68', '3329900237635', 'h10928', 'นางนันทนา  บุญพอ', '1', '2');
INSERT INTO `tb_member` VALUES ('69', '3329900236175', 'h10928', 'นางอัมพรพรรณ  เชาว์ศิริกุล', '1', '2');
INSERT INTO `tb_member` VALUES ('70', '3349900117591', 'h10928', 'นางอรุณี  เพชรสิทธิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('71', '5341500031303', 'h10928', 'นางกาญจนา  จึงธีรพานิช', '1', '2');
INSERT INTO `tb_member` VALUES ('72', '5330300019902', 'h10928', 'นางสาวสมรศรี  สามสี', '1', '2');
INSERT INTO `tb_member` VALUES ('73', '3369901525987', 'h10928', 'นางสาวจารุวรรณ  นาจำปา', '1', '2');
INSERT INTO `tb_member` VALUES ('74', '3340700166949', 'h10928', 'นางนิภาภรณ์  เรือนแก้ว', '1', '2');
INSERT INTO `tb_member` VALUES ('75', '3330300956250', 'h10928', 'นางอุไร  ชินวงค์', '1', '2');
INSERT INTO `tb_member` VALUES ('76', '3330300959283', 'h10928', 'นางณัฐรดา  อนุสินธ์', '1', '2');
INSERT INTO `tb_member` VALUES ('77', '3330300584832', 'h10928', 'นางเบญญาภา  ไชยดรุณ', '1', '2');
INSERT INTO `tb_member` VALUES ('78', '3330300550814', 'h10928', 'นางสุภาพ  สุขอ้วน', '1', '2');
INSERT INTO `tb_member` VALUES ('79', '3330300727480', 'h10928', 'นางเฉลิมศรี  แก้วเนตร', '1', '2');
INSERT INTO `tb_member` VALUES ('80', '3331300183677', 'h10928', 'นางวราภรณ์  บัวลา', '1', '2');
INSERT INTO `tb_member` VALUES ('81', '3330300563932', 'h10928', 'นางกาบอุบล  มณีวรรณ', '1', '2');
INSERT INTO `tb_member` VALUES ('82', '3330300327341', 'h10928', 'นางแววใจ  ทัดเทียม', '1', '2');
INSERT INTO `tb_member` VALUES ('83', '3330401178449', 'h10928', 'นางชุชาดา  กมลรัตน์', '1', '2');
INSERT INTO `tb_member` VALUES ('84', '5330300023632', 'h10928', 'นางสาววิไลวรรณ  บัวหอม', '1', '2');
INSERT INTO `tb_member` VALUES ('85', '3330301195490', 'h10928', 'นางหัสยาภรณ์  ทองเสี่ยน', '1', '2');
INSERT INTO `tb_member` VALUES ('86', '3330300753120', 'h10928', 'นางวิไลทิพย์  เครือไชย', '1', '2');
INSERT INTO `tb_member` VALUES ('87', '3330401387722', 'h10928', 'นางอรอนงค์  ปรักมาส', '1', '2');
INSERT INTO `tb_member` VALUES ('88', '3330300732106', 'h10928', 'นางหทัยชนก  ชัยเวช', '1', '2');
INSERT INTO `tb_member` VALUES ('89', '3330300947340', 'h10928', 'นางพรรัตน์   โพธิ์ศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('90', '5330400054254', 'h10928', 'นางสาริสา  ตันตยานนท์', '1', '2');
INSERT INTO `tb_member` VALUES ('91', '3330900881617', 'h10928', 'นางพรศิริ  แก้วศรีนนท์', '1', '2');
INSERT INTO `tb_member` VALUES ('92', '3330300285461', 'h10928', 'นายธวัชชัย  กิ่งบู', '1', '2');
INSERT INTO `tb_member` VALUES ('93', '4330300001975', 'h10928', 'นางภิญญาพัชญ์  แสงมาศ', '1', '2');
INSERT INTO `tb_member` VALUES ('94', '5330390009201', 'h10928', 'นางหัฏฐรีญา  บุญรินทร์', '1', '2');
INSERT INTO `tb_member` VALUES ('95', '3331300274940', 'h10928', 'นางสาวชลดา  สติปัญ', '1', '2');
INSERT INTO `tb_member` VALUES ('96', '3330301114627', 'h10928', 'นางนงลักษณ์  พุฒพวง', '1', '2');
INSERT INTO `tb_member` VALUES ('97', '3330300993121', 'h10928', 'นางสาวอุไรวรรณ  บุญเรือง', '1', '2');
INSERT INTO `tb_member` VALUES ('98', '3330300306719', 'h10928', 'นางกิตติยาภรณ์  โสวภาค', '1', '2');
INSERT INTO `tb_member` VALUES ('99', '3330200107935', 'h10928', 'นางฉัตรรัตน์  พีระชัยศักดิ์ ', '1', '2');
INSERT INTO `tb_member` VALUES ('100', '3330100842501', 'h10928', 'นางสาวอุมาพร  พันธนาม', '1', '2');
INSERT INTO `tb_member` VALUES ('101', '3330300546604', 'h10928', 'นางสมหญิง  ยอดจักร์', '1', '2');
INSERT INTO `tb_member` VALUES ('102', '3330300356252', 'h10928', 'นางสาวทิพวรรณ  สุราวุธ', '1', '2');
INSERT INTO `tb_member` VALUES ('103', '3330300033640', 'h10928', 'นางบุญล้อม   กุลชาติ', '1', '2');
INSERT INTO `tb_member` VALUES ('104', '3330300040646', 'h10928', 'นางสาวมลิวรรณ  นนท์ใส', '1', '2');
INSERT INTO `tb_member` VALUES ('105', '3330300845172', 'h10928', 'นางปภาดา  บึงไกร', '1', '2');
INSERT INTO `tb_member` VALUES ('106', '3330300419971', 'h10928', 'นางลำใย  ดวงปากดี', '1', '2');
INSERT INTO `tb_member` VALUES ('107', '3330301040381', 'h10928', 'นางวิมล  สังข์ทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('108', '3330300733170', 'h10928', 'นางชนิดา  ผาหยาด', '1', '2');
INSERT INTO `tb_member` VALUES ('109', '3100602286666', 'h10928', 'นางอภิญญา  ใจธรรม', '1', '2');
INSERT INTO `tb_member` VALUES ('110', '1101400221576', 'h10928', 'นางสาวชลิดา  ชำนาญเนติวิทย์', '1', '2');
INSERT INTO `tb_member` VALUES ('111', '3330300157900', 'h10928', 'นางสาวสุพัตรา  ศรีนวล', '1', '2');
INSERT INTO `tb_member` VALUES ('112', '3330300733021', 'h10928', 'นางสาวรัตยา   บุญศักดิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('113', '3330300430479', 'h10928', 'นายสุรชัย  ชัยรัตน์', '1', '2');
INSERT INTO `tb_member` VALUES ('114', '1330300016102', 'h10928', 'นางกีรติกา  ทองจันทร์', '1', '2');
INSERT INTO `tb_member` VALUES ('115', '3330300286661', 'h10928', 'นางสุนิสา  สินกิติกุล', '1', '2');
INSERT INTO `tb_member` VALUES ('116', '1330300031195', 'h10928', 'นางสายสมร  ธนะศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('117', '1330300100421', 'h10928', 'นางสาวเกษสุดา  ชาภักดี', '1', '2');
INSERT INTO `tb_member` VALUES ('118', '1342200032400', 'h10928', 'นางสาวเทียนทอง  สงวนงาม', '1', '2');
INSERT INTO `tb_member` VALUES ('119', '1339900060461', 'h10928', 'นางสาวศริญญา แสงทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('120', '2330900017264', 'h10928', 'นายเมธี  สุรวิทย์', '1', '2');
INSERT INTO `tb_member` VALUES ('121', '1349900260959', 'h10928', 'นางอรภากร  มูลตระกูล', '1', '2');
INSERT INTO `tb_member` VALUES ('122', '1330300116077', 'h10928', 'นางสาวชบาไพร  นามวงษา', '1', '2');
INSERT INTO `tb_member` VALUES ('123', '1339900104540', 'h10928', 'นางสิรินภา  วิศิษฎเศรษฐ์ ', '1', '2');
INSERT INTO `tb_member` VALUES ('124', '1330300086470', 'h10928', 'นางสาวอุทัยวรรณ  แก้วพวง', '1', '2');
INSERT INTO `tb_member` VALUES ('125', '1330300125211', 'h10928', 'นางสาวปิยวดี  เสียงหวาน', '1', '2');
INSERT INTO `tb_member` VALUES ('126', '3330300622700', 'h10928', 'นางสาวพรพิมล  สิมมา', '1', '2');
INSERT INTO `tb_member` VALUES ('127', '1330300138241', 'h10928', 'นางสาวศิรินภา  ศิริกุล', '1', '2');
INSERT INTO `tb_member` VALUES ('128', '1471200200271', 'h10928', 'นางสาวกมลชนก  อัมภรัตน์', '1', '2');
INSERT INTO `tb_member` VALUES ('129', '1330300161064', 'h10928', 'นางสาวอรพรรณ  อนันต์', '1', '2');
INSERT INTO `tb_member` VALUES ('130', '3330400538069', 'h10928', 'นางวิมลพันธ์  ย่างเยื้อง', '1', '2');
INSERT INTO `tb_member` VALUES ('131', '1349900318221', 'h10928', 'นางสาวลลิตา  แฝงทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('132', '1330300104494', 'h10928', 'นางสาวแคททรียา  พงศ์พรหม', '1', '2');
INSERT INTO `tb_member` VALUES ('133', '1330300103030', 'h10928', 'นางสาวอัจฉรา  ดอกคำ', '1', '2');
INSERT INTO `tb_member` VALUES ('134', '2330300018154', 'h10928', 'นางสาวรุ่งนภา  วราพุฒ', '1', '2');
INSERT INTO `tb_member` VALUES ('135', '1330300117235', 'h10928', 'นางสาวสุมิตรา  สู่เสน', '1', '2');
INSERT INTO `tb_member` VALUES ('136', '3329900237643', 'h10928', 'นางลัดดา  ธานี', '1', '2');
INSERT INTO `tb_member` VALUES ('137', '3330100166956', 'h10928', 'นางทยานิจ  แก้วภมร', '1', '2');
INSERT INTO `tb_member` VALUES ('138', '3330301045129', 'h10928', 'นางสาวมณีรัตน์  พลศักดิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('139', '3309901524557', 'h10928', 'นางเกษก่อง  สีหะวงษ์', '1', '2');
INSERT INTO `tb_member` VALUES ('140', '3330300108151', 'h10928', 'นางพัตยา   ทาบุญมา', '1', '2');
INSERT INTO `tb_member` VALUES ('141', '1309900768090', 'h10928', 'นางสาวกัญญาลักษณ์  สรเสริฐ', '1', '2');
INSERT INTO `tb_member` VALUES ('142', '1339900244309', 'h10928', 'นางสาวกนกนาฎ  แก้วพวง', '1', '2');
INSERT INTO `tb_member` VALUES ('143', '1330300121984', 'h10928', 'นายสุรศักดิ์   ศรีไชยา', '1', '2');
INSERT INTO `tb_member` VALUES ('144', '1349900692948', 'h10928', 'นางสาวอรยา   นิกุล', '1', '2');
INSERT INTO `tb_member` VALUES ('145', '3330300949784', 'h10928', 'นางลักษมี  อุ่นอุดม', '1', '2');
INSERT INTO `tb_member` VALUES ('146', '3330300358573', 'h10928', 'นางเกษศิรินทร์  โพธิ์ทิพย์', '1', '2');
INSERT INTO `tb_member` VALUES ('147', '3330800487348', 'h10928', 'นางบรรจงจิตร  นนใส', '1', '2');
INSERT INTO `tb_member` VALUES ('148', '3330300723832', 'h10928', 'นางฐิตาพร  จันทพันธ์', '1', '2');
INSERT INTO `tb_member` VALUES ('149', '3330300022648', 'h10928', 'นางฐิติพรรณ์  บุญมา', '1', '2');
INSERT INTO `tb_member` VALUES ('150', '3330300728257', 'h10928', 'นางสุดารัตน์  บัวจูม', '1', '2');
INSERT INTO `tb_member` VALUES ('151', '3330300559048', 'h10928', 'นางสาวกมลรัตน์  พบบุญ', '1', '2');
INSERT INTO `tb_member` VALUES ('152', '3330900845343', 'h10928', 'นายไพรวัลย์  โคศรีสุทธิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('153', '1339900462969', 'h10928', 'นายศุภฤกษ์   ขอสินกลาง', '1', '2');
INSERT INTO `tb_member` VALUES ('154', '3330300949814', 'h10928', 'นางเพียงเพ็ญ  ช่างเพชร', '1', '2');
INSERT INTO `tb_member` VALUES ('155', '1329900140279', 'h10928', 'นางสาวสุวิมล   ศรีดา', '1', '2');
INSERT INTO `tb_member` VALUES ('156', '1339900201171', 'h10928', 'นางสาวอิศริยา  โศกหอม', '1', '2');
INSERT INTO `tb_member` VALUES ('157', '1349900518531', 'h10928', 'นางสาวลัดดาวัลย์  วงค์ใหญ่', '1', '2');
INSERT INTO `tb_member` VALUES ('158', '1349900527858', 'h10928', 'นางสาวสาธิกา  ผ่านดี', '1', '2');
INSERT INTO `tb_member` VALUES ('159', '1330300176657', 'h10928', 'นางสาวธิดาวรรณ  ศรีรักษา', '1', '2');
INSERT INTO `tb_member` VALUES ('160', '1330300174816', 'h10928', 'นางสาวภัทรมน   เคนสี', '1', '2');
INSERT INTO `tb_member` VALUES ('161', '1339900294152', 'h10928', 'นางสาววรยากร  เข็มทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('162', '1330300186458', 'h10928', 'นางสาวพิชญะนันท์  จันทร์ฉาย', '1', '2');
INSERT INTO `tb_member` VALUES ('163', '1330300195660', 'h10928', 'นางสาวชลธิชา  สิงห์ซอม', '1', '2');
INSERT INTO `tb_member` VALUES ('164', '1330300194051', 'h10928', 'นางสาวตติยา  สิมณี', '1', '2');
INSERT INTO `tb_member` VALUES ('165', '1349900694762', 'h10928', 'นางสาวสุวรรณรัตน์ แนวจำปา', '1', '2');
INSERT INTO `tb_member` VALUES ('166', '1349900750828', 'h10928', 'นางสาวสุดาพร  สารคาม', '1', '2');
INSERT INTO `tb_member` VALUES ('167', '1330300201767', 'h10928', 'นางสาวณัฐณิชา  โทลา', '1', '2');
INSERT INTO `tb_member` VALUES ('168', '1330600095512', 'h10928', 'นายกิตติภัฎ   จันดาพืช', '1', '2');
INSERT INTO `tb_member` VALUES ('169', '1330300212491', 'h10928', 'นางสาววิมลศิริ  สาสุข', '1', '2');
INSERT INTO `tb_member` VALUES ('170', '1461300009564', 'h10928', 'นางสาวศิริพร  ธนิตกุล', '1', '2');
INSERT INTO `tb_member` VALUES ('171', '1330300042081', 'h10928', 'นายฤทัย  ประดู่', '1', '2');
INSERT INTO `tb_member` VALUES ('172', '3330300561034', 'h10928', 'นายเกรียงศักดิ์  บุญรอต', '1', '2');
INSERT INTO `tb_member` VALUES ('173', '1349900366285', 'h10928', 'นางสาวนฤภรณ์  มงคลจิตร', '1', '2');
INSERT INTO `tb_member` VALUES ('174', '1119900502423', 'h10928', 'นางสาวภาณุมาศ  ชิณวงษ์', '1', '2');
INSERT INTO `tb_member` VALUES ('175', '1330400331999', 'h10928', 'นางโชติกา  สีสารี', '1', '2');
INSERT INTO `tb_member` VALUES ('176', '1339900230880', 'h10928', 'นางสาวอักษรินทร์   สมคิด', '1', '2');
INSERT INTO `tb_member` VALUES ('177', '3330300947692', 'h10928', 'นางสุพิชญา  สิงหะไชย', '1', '2');
INSERT INTO `tb_member` VALUES ('178', '3331000319549', 'h10928', 'นายแก้ว  อ่อนโส', '1', '2');
INSERT INTO `tb_member` VALUES ('179', '3330300531453', 'h10928', 'นางฉวีวรรณ  มุขธระโกษา', '1', '2');
INSERT INTO `tb_member` VALUES ('180', '3330101561735', 'h10928', 'นางเยาวรัตน์  วินทะไชย', '1', '2');
INSERT INTO `tb_member` VALUES ('181', '3330300737426', 'h10928', 'นางสุวรรณี  จันตะ', '1', '2');
INSERT INTO `tb_member` VALUES ('182', '3330300956781', 'h10928', 'นายวิศิษฐ์  แก้วลา', '1', '2');
INSERT INTO `tb_member` VALUES ('183', '3330300926784', 'h10928', 'นายวิชิต  พบบุญ', '1', '2');
INSERT INTO `tb_member` VALUES ('184', '5330300032992', 'h10928', 'นางสาวคำเปี่ยง  คำแฝง', '1', '2');
INSERT INTO `tb_member` VALUES ('185', '5330300019368', 'h10928', 'นายสมพงษ์  มั่นปรีอ่อน', '1', '2');
INSERT INTO `tb_member` VALUES ('186', '3330300945916', 'h10928', 'นายสมพร  แดงเกลี้ยง', '1', '2');
INSERT INTO `tb_member` VALUES ('187', '3330900461677', 'h10928', 'นายมนูญ  มะลิงาม', '1', '2');
INSERT INTO `tb_member` VALUES ('188', '3330101340861', 'h10928', 'นางสุดาพร  ทองลือ', '1', '2');
INSERT INTO `tb_member` VALUES ('189', '3330300938724', 'h10928', 'นางโสมวิภา  ทานะ', '1', '2');
INSERT INTO `tb_member` VALUES ('190', '3330300939878', 'h10928', 'นางวิบูลย์  จิตดี', '1', '2');
INSERT INTO `tb_member` VALUES ('191', '3330300212978', 'h10928', 'นางสาวพรรณวดี  บุญพอ', '1', '2');
INSERT INTO `tb_member` VALUES ('192', '3330101348144', 'h10928', 'นายวานิชณ์  จิตโชติ', '1', '2');
INSERT INTO `tb_member` VALUES ('193', '3330300546639', 'h10928', 'นายปภาวิน   บัวจูม', '1', '2');
INSERT INTO `tb_member` VALUES ('194', '3341800033879', 'h10928', 'นางสาวนุชจรี  สาระบุตร', '1', '2');
INSERT INTO `tb_member` VALUES ('195', '3330300956683', 'h10928', 'นางกฤตพร  คำเสน', '1', '2');
INSERT INTO `tb_member` VALUES ('196', '3330300032741', 'h10928', 'นางอรวรรณ์  สุขอ้วน', '1', '2');
INSERT INTO `tb_member` VALUES ('197', '3310401180338', 'h10928', 'นางบุญจิตร  บัวแก้ว', '1', '2');
INSERT INTO `tb_member` VALUES ('198', '3440600953182', 'h10928', 'นายพัฒนา  บัวบาน', '1', '2');
INSERT INTO `tb_member` VALUES ('199', '3320500297900', 'h10928', 'นายปกรณ์   ทรงวาจา', '1', '2');
INSERT INTO `tb_member` VALUES ('200', '3330300392313', 'h10928', 'นายธีระศักดิ์  บัวแก้ว', '1', '2');
INSERT INTO `tb_member` VALUES ('201', '3330300952254', 'h10928', 'นายสมบูรณ์  พรมดวง', '1', '2');
INSERT INTO `tb_member` VALUES ('202', '3320501230337', 'h10928', 'นายธนา  ดวงปากดี', '1', '2');
INSERT INTO `tb_member` VALUES ('203', '3330300949211', 'h10928', 'นายพงษ์พิทักษ์  ไหมทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('204', '3330300214687', 'h10928', 'นางสาวแพงศรี  ศรีพิทักษ์', '1', '2');
INSERT INTO `tb_member` VALUES ('205', '3330300216825', 'h10928', 'นายคำปน  สลับศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('206', '3330300761254', 'h10928', 'นางมนตรี  ภาดี', '1', '2');
INSERT INTO `tb_member` VALUES ('207', '3330300197791', 'h10928', 'นายธีรศักดิ์  มั่นยืนยาว', '1', '2');
INSERT INTO `tb_member` VALUES ('208', '3330300958260', 'h10928', 'นางณัฐณิชา   บัวหอม', '1', '2');
INSERT INTO `tb_member` VALUES ('209', '1331000032600', 'h10928', 'นางพัชรินทร์  คำไหล', '1', '2');
INSERT INTO `tb_member` VALUES ('210', '3330300366061', 'h10928', 'นางสาวสุธีรา  ลาภบุตร', '1', '2');
INSERT INTO `tb_member` VALUES ('211', '3330300742063', 'h10928', 'นายอุเทน  ศรีไชยา', '1', '2');
INSERT INTO `tb_member` VALUES ('212', '3330900510431', 'h10928', 'นายวิเชียร  บุดดี', '1', '2');
INSERT INTO `tb_member` VALUES ('213', '3330300553686', 'h10928', 'นายธนานันท์  นนทา', '1', '2');
INSERT INTO `tb_member` VALUES ('214', '1330303393387', 'h10928', 'นายสมใจ  พุ่มทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('215', '3330300216698', 'h10928', 'นางสาวกฤษฎาพร  อัมภรัตน์', '1', '2');
INSERT INTO `tb_member` VALUES ('216', '3330300022656', 'h10928', 'นางสาวอนุธิดา  พละศักดิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('217', '1149900141811', 'h10928', 'นางสาวพนัดดา  บุญช่วย', '1', '2');
INSERT INTO `tb_member` VALUES ('218', '3480100684948', 'h10928', 'นางวิภาวดี  ทองสุ', '1', '2');
INSERT INTO `tb_member` VALUES ('219', '3330300596164', 'h10928', 'นางศิริพร  เข็มธนู', '1', '2');
INSERT INTO `tb_member` VALUES ('220', '3330300445425', 'h10928', 'นางเพ็ญศิริ  แดงเกลี้ยง', '1', '2');
INSERT INTO `tb_member` VALUES ('221', '3320900951691', 'h10928', 'นางวัลยา  กุมภวา', '1', '2');
INSERT INTO `tb_member` VALUES ('222', '2330300018782', 'h10928', 'นางสาวกานติมา  จันทร์แดง', '1', '2');
INSERT INTO `tb_member` VALUES ('223', '3330300411971', 'h10928', 'นางสาวสาคร  สุวรรณกูฎ', '1', '2');
INSERT INTO `tb_member` VALUES ('224', '1339900060895', 'h10928', 'นายสาธิต  เสาเวียง', '1', '2');
INSERT INTO `tb_member` VALUES ('225', '1330300029077', 'h10928', 'นางอัญญารัตน์  ชาภักดี', '1', '2');
INSERT INTO `tb_member` VALUES ('226', '3330300733200', 'h10928', 'นายจารุศักดิ์  รองในมือง', '1', '2');
INSERT INTO `tb_member` VALUES ('227', '1349900044911', 'h10928', 'นายสุวัฒชัย  แสงทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('228', '3330300861526', 'h10928', 'นายเทอดศักดิ์  บึงไกร', '1', '2');
INSERT INTO `tb_member` VALUES ('229', '1330400068953', 'h10928', 'นายสมศักดิ์  สุขศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('230', '3330301040411', 'h10928', 'นายไพจิตร  อัมภรัตน์', '1', '2');
INSERT INTO `tb_member` VALUES ('231', '1330300034747', 'h10928', 'นายเทวิน  ทองเพ็ชร', '1', '2');
INSERT INTO `tb_member` VALUES ('232', '1330300008908', 'h10928', 'นางนงนุช  ผาสุขมูล', '1', '2');
INSERT INTO `tb_member` VALUES ('233', '3330300557193', 'h10928', 'นางญาณิศา  นนทา', '1', '2');
INSERT INTO `tb_member` VALUES ('234', '3330300443252', 'h10928', 'นางภัสดาพร  สมาธิ', '1', '2');
INSERT INTO `tb_member` VALUES ('235', '1330300127958', 'h10928', 'นางปนิดา  บัวหอม', '1', '2');
INSERT INTO `tb_member` VALUES ('236', '3330300033631', 'h10928', 'นางสาวทองหล่อ  แถวปัดถา', '1', '2');
INSERT INTO `tb_member` VALUES ('237', '3320900251036', 'h10928', 'นางรัตนา  บุญศักดิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('238', '3330301062881', 'h10928', 'นายพัฒนศักดิ์  มะโน', '1', '2');
INSERT INTO `tb_member` VALUES ('239', '3330300040654', 'h10928', 'นายนวลจันทร์  นนท์ใส', '1', '2');
INSERT INTO `tb_member` VALUES ('240', '1330300108856', 'h10928', 'นางสาวอรพรรณ   ธนะศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('241', '1330300082130', 'h10928', 'นางณัณฑิชา  บุดดาหน', '1', '2');
INSERT INTO `tb_member` VALUES ('242', '3330300554704', 'h10928', 'นางสุดารัตน์  แข็งการเขตร', '1', '2');
INSERT INTO `tb_member` VALUES ('243', '1331000275243', 'h10928', 'นางสาวปัญจพร  ดอกจันทร์', '1', '2');
INSERT INTO `tb_member` VALUES ('244', '1330300083128', 'h10928', 'นายรามิล        แดงเกลี้ยง', '1', '2');
INSERT INTO `tb_member` VALUES ('245', '3330300547384', 'h10928', 'นายวัชนนท์  นิลแสง', '1', '2');
INSERT INTO `tb_member` VALUES ('246', '3330300729440', 'h10928', 'นางสาวเพียรผกา  ไชยรัตน์', '1', '2');
INSERT INTO `tb_member` VALUES ('247', '3330301036855', 'h10928', 'นางสาวสุจิตตา  อัมภรัตน์', '1', '2');
INSERT INTO `tb_member` VALUES ('248', '1330300087492', 'h10928', 'นางสาวจันทร์ทิพย์  สุริโย', '1', '2');
INSERT INTO `tb_member` VALUES ('249', '1339900083496', 'h10928', 'นางสาวโชติกา  ผิวอ่อน', '1', '2');
INSERT INTO `tb_member` VALUES ('250', '1330300190897', 'h10928', 'นางสาวจันทร์จิรา  แจ้งสว่าง', '1', '2');
INSERT INTO `tb_member` VALUES ('251', '3330300119846', 'h10928', 'นายพลศักดิ์  ทานะ', '1', '2');
INSERT INTO `tb_member` VALUES ('252', '1330300143856', 'h10928', 'นางสาวศิริพร  หมื่นสุข', '1', '2');
INSERT INTO `tb_member` VALUES ('253', '1349900635391', 'h10928', 'นางสาวสุธีรัตน์  วิลา', '1', '2');
INSERT INTO `tb_member` VALUES ('254', '1339900525201', 'h10928', 'นางสาวจามจุรี    วิไล', '1', '2');
INSERT INTO `tb_member` VALUES ('255', '1339900581062', 'h10928', 'นางสาวปภาวรินทร์  ทองลือ', '1', '2');
INSERT INTO `tb_member` VALUES ('256', '1339900532363', 'h10928', 'นางอัจฉรีญา  ช่างแก้ว', '1', '2');
INSERT INTO `tb_member` VALUES ('257', '1330300216586', 'h10928', 'นางสาวสุดารัตน์  ทุมแถว', '1', '2');
INSERT INTO `tb_member` VALUES ('258', '1330300167321', 'h10928', 'นายธีระพงษ์   นามวงษา', '1', '2');
INSERT INTO `tb_member` VALUES ('259', '3330301076679', 'h10928', 'นายณรัฐกรณ์  นามโสภา', '1', '2');
INSERT INTO `tb_member` VALUES ('260', '1339900436127', 'h10928', 'นางสาวเบญจมาศ  ศิรินัย', '1', '2');
INSERT INTO `tb_member` VALUES ('261', '2330400061728', 'h10928', 'นางสาวลลิตา  โคตรสุข', '1', '2');
INSERT INTO `tb_member` VALUES ('262', '1330300119793', 'h10928', 'นางสาวอรพรรณ  คำศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('263', '3330300326621', 'h10928', 'นายสมชาย  บุญศักดิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('264', '1330300122000', 'h10928', 'นางสาวนุจรี  เหลียวสูง', '1', '2');
INSERT INTO `tb_member` VALUES ('265', '1330300202925', 'h10928', 'นางสาวเบญญาภา  พันธ์วิไล', '1', '2');
INSERT INTO `tb_member` VALUES ('266', '1349900619779', 'h10928', 'นางสาวพัชริดา  คำศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('267', '1330300112802', 'h10928', 'นางสาวทิพวรรณ  พงษ์พรม', '1', '2');
INSERT INTO `tb_member` VALUES ('268', '5330302726118', 'h10928', 'นายบุลิน         โผ่ดี', '1', '2');
INSERT INTO `tb_member` VALUES ('269', '1330300153070', 'h10928', 'นางสาวภัทธิดา  พงษ์ทอง', '1', '2');
INSERT INTO `tb_member` VALUES ('270', '3330300211629', 'h10928', 'นางสมพร   ทนธรรม', '1', '2');
INSERT INTO `tb_member` VALUES ('271', '3330300553872', 'h10928', 'นางทองมี  คำสาย', '1', '2');
INSERT INTO `tb_member` VALUES ('272', '3440800034385', 'h10928', 'นางนงนุช พละศักดิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('273', '3330300217040', 'h10928', 'นางบุญสนอง พงษ์อ่อน', '1', '2');
INSERT INTO `tb_member` VALUES ('274', '3330300929392', 'h10928', 'นางบุญมี สุนีพัฒน์', '1', '2');
INSERT INTO `tb_member` VALUES ('275', '3330300327287', 'h10928', 'นางเพ็ญนภา  บุดดี', '1', '2');
INSERT INTO `tb_member` VALUES ('276', '5330302597857', 'h10928', 'นางสาวพรรณี บุตรวงศ์', '1', '2');
INSERT INTO `tb_member` VALUES ('277', '3330300947781', 'h10928', 'นางสาวทองสา จันทร์แจ้ง', '1', '2');
INSERT INTO `tb_member` VALUES ('278', '3330300950120', 'h10928', 'นางสาวโยธิวงษ์ ลวดทรง', '1', '2');
INSERT INTO `tb_member` VALUES ('279', '3330300329956', 'h10928', 'นางสุนิตตา  พื้นพรม', '1', '2');
INSERT INTO `tb_member` VALUES ('280', '5330300023535', 'h10928', 'นางสมใจ วันตา', '1', '2');
INSERT INTO `tb_member` VALUES ('281', '3330300049601', 'h10928', 'นางสำลี  ทานะ', '1', '2');
INSERT INTO `tb_member` VALUES ('282', '3330300034280', 'h10928', 'นางธนาภรณ์  บุตรการ', '1', '2');
INSERT INTO `tb_member` VALUES ('283', '1330300152898', 'h10928', 'นายประวิทย์   จิตดี', '1', '2');
INSERT INTO `tb_member` VALUES ('284', '5330300040430', 'h10928', 'นางสาวจันจิรา  แก้วแจ้ง', '1', '2');
INSERT INTO `tb_member` VALUES ('285', '3349900916907', 'h10928', 'นายวัฒนา  มนัส', '1', '2');
INSERT INTO `tb_member` VALUES ('286', '3330300032724', 'h10928', 'นางรัชนี   สุทธิภักดิ์', '1', '2');
INSERT INTO `tb_member` VALUES ('287', '1330300232891', 'h10928', 'นายปกิต   ทองสุ', '1', '2');
INSERT INTO `tb_member` VALUES ('288', '1330300039188', 'h10928', 'นางสาวดวงฤทัย วงค์ใหญ่', '1', '2');
INSERT INTO `tb_member` VALUES ('289', '1330300013545', 'h10928', 'นางสาววิภาดา  ทองทวี', '1', '2');
INSERT INTO `tb_member` VALUES ('290', '1349900772470', 'h10928', 'นางสาวอภิญญา  ศรีบุญ', '1', '2');
INSERT INTO `tb_member` VALUES ('291', '1340400206884', 'h10928', 'นางสาวพรสวรรค์  ยศศิริ', '1', '2');
INSERT INTO `tb_member` VALUES ('292', '1330300129403', 'h10928', 'นายพงษ์พัฒน์  คำเอี่ยม', '1', '2');
INSERT INTO `tb_member` VALUES ('293', '1330300186261', 'h10928', 'นางสาวปิ่นมณี   เงาศรี', '1', '2');
INSERT INTO `tb_member` VALUES ('294', '1103100465404', 'h10928', 'นางสาวสุรัญญา  คำสุ่ย', '1', '2');
INSERT INTO `tb_member` VALUES ('295', '1341500243979', 'h10928', 'นางสาวกนกวรรณ  พลอยพันธ์', '1', '2');
INSERT INTO `tb_member` VALUES ('296', '1330300226883', 'h10928', 'นางสาวพรสุดา  ชาภักดี', '1', '2');
INSERT INTO `tb_member` VALUES ('297', '1339900186325', 'h10928', 'นางสาวอนงนาฏ  ทองมาก', '1', '2');
INSERT INTO `tb_member` VALUES ('298', '2620100030611', 'h10928', 'นางรัตนดา  นันทา', '1', '2');
INSERT INTO `tb_member` VALUES ('299', '1349900905771', 'h10928', 'นางสาวศิรดา   อั้งดา', '1', '2');
INSERT INTO `tb_member` VALUES ('300', '1330300220770', 'h10928', 'นางสาวสุภัทรา  เขียวอ่อน', '1', '2');
