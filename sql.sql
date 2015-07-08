#新建数据库
create database print;




CREATE TABLE `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  
  `customer` varchar(255) DEFAULT '' COMMENT '用户名',
  `order_no` varchar(255) DEFAULT '' COMMENT '订单号',
  `order_num` varchar(255) DEFAULT '' COMMENT '订单数量',
  `order_w` varchar(255) DEFAULT '' COMMENT '订单数量',
  `order_detail` varchar(255) DEFAULT '' COMMENT '订单详情',
  `express_no` varchar(255) DEFAULT '' COMMENT '快递公司',
  `tracking` varchar(255) DEFAULT '' COMMENT '快递单号',
  `reciver` varchar(255) DEFAULT '' COMMENT '收件人姓名',
  `reciver_tel` varchar(255) DEFAULT '' COMMENT '收件人电话',
  `reciver_post` varchar(255) DEFAULT '' COMMENT '收件人邮编',
  `reciver_province` varchar(255) DEFAULT '' COMMENT '收件人省份',
  `reciver_city` varchar(255) DEFAULT '' COMMENT '收件人城市',
  `reciver_street` varchar(255) DEFAULT '' COMMENT '收件人街道',
  `sender` varchar(255) DEFAULT '' COMMENT '发件人姓名',
  `sender_tel` varchar(255) DEFAULT '' COMMENT '发件人电话',
  `sender_post` varchar(255) DEFAULT '' COMMENT '发件人邮编',
  `sender_address` varchar(255) DEFAULT '' COMMENT '发件人地址',
  `print_count` int(11) DEFAULT '0' COMMENT '打印次数',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '订单编号',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2029 DEFAULT CHARSET=utf8 COMMENT='订单表';

--user表添加字段,用来保存用户订单每页显示的个数
alter table users add `limit_page` int(60) default '100' comment '用户订单显示个数';

alter table orders add `tracking_internal` varchar(255) default '' comment '国内快递单号';

--在新建订单的时候,添加一个字段:print_number,用来存储一个订单打印的张数量
alter table orders add `print_number` int(10) default '1' comment '订单打印张数';