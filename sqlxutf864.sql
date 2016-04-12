/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : khj

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2015-01-13 15:55:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for card_company
-- ----------------------------
DROP TABLE IF EXISTS `card_company`;
CREATE TABLE `card_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `company` char(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `about_us` text NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `tpl` char(15) NOT NULL,
  `tpl_name` char(15) NOT NULL COMMENT '根据themes下目录名扫描而来',
  `site` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of card_company
-- ----------------------------
INSERT INTO `card_company` VALUES ('1', 'kezhong', '123465', '东莞市科众软件科技有限公司', '东莞市莞城东纵大道地王商务中心四楼', '400-898-1160', '微营商务成立于2012年12月26，是国内首批微信第三方应用专业开发商，是国内基于微信行业应用解决方案的专业提供商， 专注于微信技术开发和微信营销。我们拥有自己的技术团队，具备自主开发计算机软件的能力和技术。 能够为各行业提供专业的技术解决方案、推广方案。 所开发出的软件功能强大、稳定、美 观易用。我们以科学的项目管理方法，严格高效的工作流程及研发方案，保证软件质量和扩充性。', '中国平安.平安中国', ' /upimg/logo/kezhong.png', '2', '蓝色风格', 'www.guanbost.com');
INSERT INTO `card_company` VALUES ('7', 'pingan', 'pingan2014', '中国平安人寿保险股份有限公司', '东莞市厚街镇厚街大道河田路段河兴大夏A栋4楼', '0769-85835361', '中国平安 保险·银行·投资', '你的平安       我的承诺', '/upimg/logo/pingan.png', 'pingan', '中国平安风格', null);
INSERT INTO `card_company` VALUES ('8', 'renshou', '15024010223', '中国人寿保险股份有限公司东莞分公司', '东莞市东城中路达鑫创富中心六楼', '95519', '', '成己为人、成人达己；用心经营、诚信服务', '/upimg/logo/renshou.jpg', 'pingan', '', null);
INSERT INTO `card_company` VALUES ('12', 'phnanhai', '123456', '福建平和南海生物技术有限公司', '漳州市蓝田工业区横一路，南海饮料厂', '400-8529989', '福建平和南海生物技术有限公司是一家高科技日化企业。公司秉承“忠实科学、献身环保、服务社会、造福人类”的企业宗旨，开发研制了生产个人护理用品的领域。以改革创新为核心，开拓中国环保型日化市场。“诚信、正直、勤奋、创新”是我们的企业精神，贯穿在企业的每一个组织与行动上，在不断提升自身的同时，遵循以人文本的社会理念，本着“让每一个中国人用上优质的沐浴露”为企业使命和企业发展主旋律，以此不断专研，并突破创新！坚持科学持续发展观，将纯民族品牌发扬光大。\r\n有了使命感，才能不断地超越自己！经我司研究人员长达近五年的潜心专研，以科技创新技术，从柚皮中萃取植物精华，精细研制而成的天然环保型护理产品，以其独特的植物原料和工艺生产方式，获得国家发明专利。于2013年年底成功推出品牌——柚皮王沐浴露，洗发水和牙膏等系列产品，正式进军日化领域。中高档定位，健康环保，是个人日常护理用品领域的又一新兴产品。以天然护理、个人健康为产品理念，全心全意为亿万中国百姓营造健康生活氛围、塑造美丽生活典范。打造柚皮王成为国际著名品牌，领航潮流的新型日化企业。为成为中国最大的沐浴露经销商的目标做出不懈努力。', '科技改变未来 柚皮王洗出健康', '/upimg/logo/phnanhai.png', 'pingan', '', null);
INSERT INTO `card_company` VALUES ('13', 'bb', '123456', '背包', '', '', '', '', '', '9', '', null);

-- ----------------------------
-- Table structure for card_user
-- ----------------------------
DROP TABLE IF EXISTS `card_user`;
CREATE TABLE `card_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `realname` char(6) NOT NULL,
  `job` char(10) DEFAULT NULL,
  `tel` char(15) DEFAULT NULL,
  `qq` char(14) DEFAULT NULL,
  `mail` char(30) DEFAULT NULL,
  `proverbs` tinytext,
  `photo` char(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `pwd` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of card_user
-- ----------------------------
INSERT INTO `card_user` VALUES ('1', '1', 'admin', 'dgkzhong2014', '管理员', '技术2', '158444545456', '416781002', 'tzarlink@foxmail.com', '			我的师傅的his箴言			', null);
INSERT INTO `card_user` VALUES ('45', '1', 'huangcongj', '123465', '黄丛进', '运营总监', '18620859697', '1379106534', 'huangcongjin@guanbost.com', '', 'upimg/business_card/kezhong/huangcongj.jpg');
INSERT INTO `card_user` VALUES ('46', '1', 'monkey_q', '123456', '卓晓秋', '策划师', '13537312801', '', '', '', '');
INSERT INTO `card_user` VALUES ('47', '1', 'liangminyi', '123465', '梁敏仪', '行政文员', '13414353472', '1210468821', '1210468821@qq.com', '唔好急，慢慢黎，最紧要快.', 'upimg/business_card/kezhong/liangminyi.jpg');
INSERT INTO `card_user` VALUES ('99', '1', 'zhoujiafu', '123465', '周嘉福', '销售', ' 13727581591', '932401877', 'zhoujiafu@guanbost.com', '', 'upimg/business_card/kezhong/zhoujiafu.jpg');
INSERT INTO `card_user` VALUES ('100', '1', 'tangzhi', '123465', '汤治', '渠道主管', '15309150405', '1248106724', 'tangzi@guanbost.com', '', 'upimg/business_card/kezhong/tangzhi.jpg');
INSERT INTO `card_user` VALUES ('104', '1', 'yangwenbo', '123456', '杨文博', null, null, null, null, null, null);
INSERT INTO `card_user` VALUES ('105', '1', 'wuqiaoxia', '123465', '吴巧霞', '讲师', '18929332566', '570753754', 'wuqiaoxia@guanbost.com', '', 'upimg/business_card/kezhong/wuqiaoxia.jpg');
INSERT INTO `card_user` VALUES ('106', '1', 'panmingxi', '123465', '潘明溪', '美工', '15625762162', '964699295', '964699295@qq.com', '', 'upimg/business_card/kezhong/panmingxi.jpg');
INSERT INTO `card_user` VALUES ('107', '1', 'luopengfei', '123465', '罗鹏飞', '技术总监', '18938164398', '109397234', 'luopengfei@guanbost.com', '', 'upimg/business_card/kezhong/luopengfei.jpg');
INSERT INTO `card_user` VALUES ('108', '1', 'chenzelun', '123465', '陈泽伦', 'PHP工程师', '13712981010', '930806929', 'chenzelun@guanbost.com', '我为自己代言', 'upimg/business_card/kezhong/chenzelun.jpg');
INSERT INTO `card_user` VALUES ('109', '1', 'chenziping', '123465', '陈子平', '总经理', '13509818202', '121183769', 'chenziping@guanbost.com', 'www.guanbost.net', 'upimg/business_card/kezhong/chenziping.png');
INSERT INTO `card_user` VALUES ('110', '1', 'guijiang', '123465', '桂江', '销售代表', '15016989008', '543436733', 'guijian@guanbost.com', '', 'upimg/business_card/kezhong/guijiang.jpg');
INSERT INTO `card_user` VALUES ('116', '1', 'dongxiang', '123465', '董翔', '', '13480098939', '1026253628', 'zerodongstar@126.com', 'I doing what i said.', 'upimg/business_card/kezhong/dongxiang.jpg');
INSERT INTO `card_user` VALUES ('120', '1', 'yuyaping', '123465', '余晓晓', '销售代表', '13527963318', '2414953242', 'yuxiaoxiao@guanbost.com', '', 'upimg/business_card/kezhong/yuyaping.jpg');
INSERT INTO `card_user` VALUES ('121', '1', 'yangxuanji', '123465', '杨璇基', '项目经理', '18664377692', '35190333', 'yangxuanji@guanbost.com', '', 'upimg/business_card/kezhong/yangxuanji.jpg');
INSERT INTO `card_user` VALUES ('123', '1', 'tzarlink', '123465', '唐长老', '取真经', '18938167683', '583907935', 'tangzhe@guanbost.com', '', 'upimg/business_card/kezhong/tzarlink.png');
INSERT INTO `card_user` VALUES ('128', '1', 'litianyan', '123465', '李天雁', '人事主管', '13428695325', '735720534', '735720534@qq.com', '', 'upimg/business_card/kezhong/litianyan.jpg');
INSERT INTO `card_user` VALUES ('132', '1', 'cuiyaling', '123465', '崔亚玲', '销售代表', '13713414579', '1765777088', 'cuiyaling@guanbost.com', '', 'upimg/business_card/kezhong/cuiyaling.png');
INSERT INTO `card_user` VALUES ('179', '0', 'test', '123456', '方法', '发大水', '发大水', '发大水', '发大水', '发大水', 'upimg/1400690978.jpg');
INSERT INTO `card_user` VALUES ('180', '0', '11', '123456', '发的萨芬', '发大水', '发大水啊', '发大水', '发大水啊', '发大水', 'upimg/business_card//.jpg');
INSERT INTO `card_user` VALUES ('190', '1', 'Mike_44', 'maijianguan', '麦健冠', '销售代表', '13533522374', '152983569', 'maijianguan@guanbost.com', '', 'upimg/business_card/kezhong/1400720429.jpeg');
INSERT INTO `card_user` VALUES ('192', '1', 'aka748', '123465', '董翔', '销售代表', '13480098939', '1026253628', 'dongxiang@guanbost.com', 'I was doing what i said.', 'upimg/business_card/kezhong/aka748.jpg');
INSERT INTO `card_user` VALUES ('198', '1', 'oscar', 'w000000', '杨文博', '业务代表', '33689483', '2492488480', '2492488480@qq.com', '平凡不是你的错，但是如果甘于平庸却是大错特错', '');
INSERT INTO `card_user` VALUES ('201', '1', 'money', '123456', '梁敏仪', '行政文员', '13414353472', '1210468821', '1210468821@qq.com', '唔好急，慢慢黎，最紧要快.', 'upimg/1400318448.jpg');
INSERT INTO `card_user` VALUES ('209', '1', 'hcj', '780516', '黄丛进', '运营总监', '18620859697', '1379106534', 'huangcongjin@guanbost.com', '', 'upimg/1400297229.jpg');
INSERT INTO `card_user` VALUES ('223', '8', 'zhangym', '15024010223', '张月明', '业务主任', '15024010223', '965505626', '965505626@qq.com', '', 'upimg/business_card/renshou/1400745344.png');
INSERT INTO `card_user` VALUES ('224', '7', 'daixiuxian', 'pingan2014', '戴秀贤', '营业部经理', '13809267938', '525784858', '525784858@qq.com', '你的平安，我的选择！', 'upimg/business_card/pingan/1400749081.jpg');
INSERT INTO `card_user` VALUES ('229', '1', 'zengyizhou', '123465', '曾益洲', '导演', '18607693026', '364847289', '364847289@qq.com', '', 'upimg/business_card/kezhong/1400829836.jpg');
INSERT INTO `card_user` VALUES ('232', '1', 'chenjz', '123465', '陈洁钊', '美工', '13750240791', '2496267464', '2496267464@qq.com', '', 'upimg/business_card/kezhong/chenjz.jpg');
INSERT INTO `card_user` VALUES ('233', '1', 'chendelin', '123465', '陈德麟', '', '18038314299', '490705460', 'dgchendelin@163.com', '', 'upimg/business_card/kezhong/1401152604.jpg');
INSERT INTO `card_user` VALUES ('234', '12', 'wujinhui', '123456', '吴锦辉', '总经理', '18620463752', '844251865', '844251865@qq.com', '科技改变未来   柚皮王洗出健康', 'upimg/business_card/phnanhai/1401432424.jpg');
INSERT INTO `card_user` VALUES ('237', '12', 'Aren', '123456', '黄莉婷', '东莞总代理', '13267468769', '916280610', '916280610@qq.com', '', 'upimg/business_card/phnanhai/Aren.jpg');
INSERT INTO `card_user` VALUES ('240', '12', '1234', '1234', '123', '123', '123', '123', '123', '', '');
INSERT INTO `card_user` VALUES ('241', '13', '123', '123', '123', '123', '123', '123', '123', '', 'upimg/business_card/bb/1402878700.png');
INSERT INTO `card_user` VALUES ('242', '1', '33', '33', '33', '33', '33', '33', '33', '22', 'upimg/business_card/kezhong/1402879237.jpg');
INSERT INTO `card_user` VALUES ('243', '1', '3', '3', '3', '3', '3', '3', '3', '3', 'upimg/business_card/kezhong/1402879293.png');
INSERT INTO `card_user` VALUES ('244', '0', 'ccczzzl', 'ccczzzl', '能不能', '不不不', '214654654', '456465465', '4564654', '15216545', 'upimg/business_card//1402879531.jpg');
INSERT INTO `card_user` VALUES ('246', '1', '456', '456', '456', '456', '456', '456', '456', '456', 'upimg/business_card/kezhong/1402880134.jpg');
INSERT INTO `card_user` VALUES ('247', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'upimg/business_card/kezhong/1402880426.jpg');
INSERT INTO `card_user` VALUES ('248', '1', '2', '2', '2', '2', '2', '2', '2', '2', 'upimg/business_card/kezhong/1402880520.jpg');
INSERT INTO `card_user` VALUES ('249', '1', '4', '4', '4', '4', '4', '4', '4', '4', 'upimg/business_card/kezhong/1402881043.jpg');
