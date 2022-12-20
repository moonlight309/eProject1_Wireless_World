CREATE DATABASE WirelessWorld;
USE WirelessWorld;

CREATE TABLE `admin`(
	UserId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	UserName VARCHAR(255) NOT NULL,
	`Password` VARCHAR(255) NOT NULL
);

INSERT INTO `admin`(UserName,`Password`) VALUES
	('Admin','123456');
	
CREATE TABLE `productbrand`(
	BrandId INT NOT NULL ,
	BrandName VARCHAR(255) NOT NULL,
	BrandDescription LONGTEXT 
);

INSERT INTO `productbrand` (`BrandId`, `BrandName`, `BrandDescription`) VALUES
	(1, 'Apple', 'Apple Inc. is an American multinational technology company that specializes in consumer electronics, software and online services headquartered in Cupertino, California, United States'),
	(2, 'Oppo', 'OPPO Electronics Corp ( with the brand name OPPO - Camera Phone, formerly: OPPO - Smartphone) is a Chinese manufacturer of electronic devices, Android mobile phones , headquartered in Dongguan , Guangdong , the subsidiary of the electronics group BBK Electronics'),
	(3, 'SamSung', 'The Samsung Group[3] (or simply Samsung, stylized as SΛMSUNG) (Korean: 삼성 [samsʌŋ]) is a South Korean multinational manufacturing conglomerate headquartered in Samsung Town, Seoul, South Korea'),
	(4, 'Xiaomi', 'Xiaomi Corporation (/ˈʃaʊmiː/;[2] Chinese: 小米 ), commonly known as Xiaomi and registered in Asia as Xiaomi Inc., is a Chinese designer and manufacturer of consumer electronics and related software, home appliances, and household items. Behind Samsung, it is the second largest manufacturer of smartphones in the world, most of which run the MIUI operating system'),
	(5, 'Vivo', 'Vivo Communication Technology Co. Ltd., (styled as vivo), is a Chinese multinational technology company headquartered in Dongguan, Guangdong that designs and develops smartphones, smartphone accessories, software and online services. The company develops software for its phones, distributed through its V-Appstore, with iManager included in their proprietary, Android-based operating system, Funtouch OS in Global, Origin OS in Mainland China and India');


CREATE TABLE `products`(
	ProductId INT NOT NULL,
	ProductName VARCHAR(255) NOT NULL,
	ProductPrice DOUBLE NOT NULL,
	ProductDescription LONGTEXT,
	BrandId INT NOT NULL
);

INSERT INTO `products` (`ProductId`, `ProductName`, `ProductPrice`, `ProductDescription`, `BrandId`) VALUES
	(1, 'iPhone 13 Pro Max 128GB', 28490000, '<br><i class="fa fa-mobile"></i>: 6.7 inch, OLED, Super Retina XDR, 2778 x 1284 Pixels. <br>\r\n<i class="fa fa-camera"></i>:12.0 MP + 12.0 MP + 12.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:12.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Apple A15 Bionic.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 1),
	(2, 'iPhone 12 64GB', 17499000, '<br><i class="fa fa-mobile"></i>: 6.1 inch, OLED, Super Retina XDR, 2532 x 1170 Pixels. <br>\r\n<i class="fa fa-camera"></i>:12.0 MP + 12.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:12.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Apple A14 Bionic.<br>\r\n<i class="fa fa-hdd-o"></i>: \r\n64 GB.', 1),
	(3, 'iPhone SE 2022 64GB', 12490000, '<br><i class="fa fa-mobile"></i>: 4.7 inch, IPS LCD, HD, 1334 x 750 Pixels. <br>\r\n<i class="fa fa-camera"></i>:12.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:7.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Apple A15 Bionic.<br>\r\n<i class="fa fa-hdd-o"></i>: 64 GB.', 1),
	(4, 'iPhone 11 64GB', 11999000, '<br><i class="fa fa-mobile"></i>: 6.1 inch, IPS LCD, Liquid Retina HD, 828 x 1792 Pixels. <br>\r\n<i class="fa fa-camera"></i>:12.0 MP + 12.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:12.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Apple A13 Bionic.<br>\r\n<i class="fa fa-hdd-o"></i>: 64 GB.', 1),
	(5, 'iPhone 7 32GB', 3490000, '<br><i class="fa fa-mobile"></i>: LED-backlit IPS LCD4.7"Retina HD. <br>\r\n<i class="fa fa-camera"></i>:12.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:7.0 MP.<br>\r\n<i class="fa fa-microchip"></i>:Apple A10 Fusion.<br>\r\n<i class="fa fa-hdd-o"></i>: 32 GB.', 1),
	(6, 'iPhone 8 Plus 64GB', 4299000, '<br><i class="fa fa-mobile"></i>: LED-backlit IPS LCD5.5"Retina HD. <br>\r\n<i class="fa fa-camera"></i>:2 camera 12 MP. <br>\r\n<i class="fa fa-id-badge"></i>:7.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Apple A11 Bionic.<br>\r\n<i class="fa fa-hdd-o"></i>: 64 GB.', 1),
	(7, 'OPPO Find X3 Pro 5G', 18990000, '<br><i class="fa fa-mobile"></i>: 6.7 inch, AMOLED, QHD+, 1440 x 3216 Pixels. <br>\r\n<i class="fa fa-camera"></i>:50.0 MP + 50.0 MP + 13.0 MP + 3.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:32.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Snapdragon 888.<br>\r\n<i class="fa fa-hdd-o"></i>: 256 GB.', 2),
	(8, 'OPPO Reno 7 Z 5G', 10490000, '<br><i class="fa fa-mobile"></i>:Chính: 6.43 inch, Chính: AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:64.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:16.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Snapdragon 695 5G.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 2),
	(9, 'OPPO Reno 6 5G', 9990000, '<br><i class="fa fa-mobile"></i>:6.43 inch, AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:64.0 MP + 8.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:\r\n32.0 MP.<br>\r\n<i class="fa fa-microchip"></i>:MediaTek Dimensity 900 5G.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 2),
	(10, 'OPPO A95', 5990000, '<br><i class="fa fa-mobile"></i>:\r\n6.43 inch, AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:48.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:16.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nSnapdragon 662.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 2),
	(11, 'OPPO A16', 3790000, '<br><i class="fa fa-mobile"></i>: 6.52 inch, IPS LCD, HD+, 720 x 1600 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n13.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:8.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Mediatek Helio G35.<br>\r\n<i class="fa fa-hdd-o"></i>: 32 GB.', 2),
	(12, 'OPPO A57', 4490000, '<br><i class="fa fa-mobile"></i>: 6.56 inch, LCD, HD+, 720 x 1612 Pixels. <br>\r\n<i class="fa fa-camera"></i>:13.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:8.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Helio G35.<br>\r\n<i class="fa fa-hdd-o"></i>: 64 GB.', 2),
	(13, 'SamSung Galaxy S22 5G', 16990000, '<br><i class="fa fa-mobile"></i>: 6.1 inch, Dynamic AMOLED 2X, FHD+, 1080 x 2340 Pixels. <br>\r\n<i class="fa fa-camera"></i>:50.0 MP + 12.0 MP + 10.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:10.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Snapdragon 8 Gen 1.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 3),
	(14, 'SamSung Galaxy A73 5G', 10790000, '<br><i class="fa fa-mobile"></i>: \r\n6.7 inch, Super AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n108.0 MP + 12.0 MP + 5.0 MP + 5.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:32.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nSnapdragon 778G.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 3),
	(15, 'SamSung Galaxy M52 5G', 7390000, '<br><i class="fa fa-mobile"></i>: \r\n6.7 inch, Super AMOLED Plus, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n64.0 MP + 12.0 MP + 5.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:32.0 MP.<br>\r\n<i class="fa fa-microchip"></i>:\r\nSnapdragon 778G.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 3),
	(16, 'SamSung Galaxy A13', 4090000, '<br><i class="fa fa-mobile"></i>:Chính: 6.6 inch, TFT LCD, FHD+, 1200 x 2408 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n50.0 MP + 5.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:8.0 MP.<br>\r\n<i class="fa fa-microchip"></i>:Exynos 850.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 3),
	(17, 'SamSung Galaxy A03s', 3390000, '<br><i class="fa fa-mobile"></i>:\r\n6.5 inch, TFT LCD, HD+, 720 x 1600 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n13.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:5.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nMediaTek MT6765.<br>\r\n<i class="fa fa-hdd-o"></i>: 64 GB.', 3),
	(18, 'SamSung Galaxy A03', 2890000, '<br><i class="fa fa-mobile"></i>: \r\n6.5 inch, PLS LCD, HD+, 720 x 1600 Pixels. <br>\r\n<i class="fa fa-camera"></i>:48.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:5.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nUnisoc T606.<br>\r\n<i class="fa fa-hdd-o"></i>: 32 GB.', 3),
	(19, 'Xiaomi 11T Pro 5G', 11990000, '<br><i class="fa fa-mobile"></i>:\r\n6.67 inch, AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:108.0 MP + 8.0 MP + 5.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:16.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Snapdragon 888.<br>\r\n<i class="fa fa-hdd-o"></i>: 256 GB.', 4),
	(20, 'Xiaomi 12 Pro', 20990000, '<br><i class="fa fa-mobile"></i>:\r\n6.28 inch, AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n50.0 MP + 13.0 MP + 5.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:32.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nSnapdragon 8 Gen 1.<br>\r\n<i class="fa fa-hdd-o"></i>: 256 GB.', 4),
	(21, 'Xiaomi 11 Lite 5G NE', 7990000, '<br><i class="fa fa-mobile"></i>: \r\n6.55 inch, AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n64.0 MP + 8.0 MP + 5.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:20.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nSnapdragon 778G.<br>\r\n<i class="fa fa-hdd-o"></i>: 256 GB.', 4),
	(22, 'Xiaomi Redmi 10 2022', 4090000, '<br><i class="fa fa-mobile"></i>:\r\n6.5 inch, IPS LCD, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:50.0 MP + 8.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:8.0 MP.<br>\r\n<i class="fa fa-microchip"></i>:\r\nMediaTek Helio G88.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 4),
	(23, 'Xiaomi Redmi 9A', 3590000, '<br><i class="fa fa-mobile"></i>:\r\n6.53 inch, PLS LCD, HD+, 720 x 1600 Pixels. <br>\r\n<i class="fa fa-camera"></i>:13.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:5.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nHelio G25.<br>\r\n<i class="fa fa-hdd-o"></i>: 32 GB.', 4),
	(24, 'Xiaomi Redmi 9C', 2999000, '<br><i class="fa fa-mobile"></i>: \r\n6.53 inch, IPS LCD, HD+, 720 x 1600 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n13.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:5.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Mediatek Helio G35.<br>\r\n<i class="fa fa-hdd-o"></i>: 64 GB.', 4),
	(25, 'Vivo V23 5G', 11990000, '<br><i class="fa fa-mobile"></i>: \r\n6.44 inch, AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n64.0 MP + 8.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:\r\n50.0 MP + 8.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: MediaTek Dimensity 920.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 5),
	(26, 'Vivo Y33s', 7990000, '<br><i class="fa fa-mobile"></i>:\r\n6.58 inch, IPS LCD, FHD+, 2408 x 1080 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n50.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:\r\n16.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: MediaTek Helio G81.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 5),
	(27, 'Vivo Y53s', 5790000, '<br><i class="fa fa-mobile"></i>: \r\n6.58 inch, IPS LCD, FHD+, 2408 x 1080 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n64.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:\r\n16.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nHelio G80.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 5),
	(28, 'Vivo Y21s', 4490000, '<br><i class="fa fa-mobile"></i>:6.51 inch, IPS LCD, HD+, 720 x 1600 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n50.0 MP + 2.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:8.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: \r\nHelio G80.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 5),
	(29, 'Vivo Y23s', 7490000, '<br><i class="fa fa-mobile"></i>:\r\n6.44 inch, AMOLED, FHD+, 1080 x 2400 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n64.0 MP + 8.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:50.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: MediaTek Helio G96.<br>\r\n<i class="fa fa-hdd-o"></i>: 128 GB.', 5),
	(30, 'Vivo Y15s', 3090000, '<br><i class="fa fa-mobile"></i>:\r\n6.51 inch, IPS LCD, HD+, 720 x 1600 Pixels. <br>\r\n<i class="fa fa-camera"></i>:\r\n13.0 MP + 2.0 MP. <br>\r\n<i class="fa fa-id-badge"></i>:8.0 MP.<br>\r\n<i class="fa fa-microchip"></i>: Helio P35.<br>\r\n<i class="fa fa-hdd-o"></i>: 32 GB.', 5);



SELECT products.ProductName, products.ProductPrice, products.ProductDescription, productbrand.BrandName 
FROM products INNER JOIN productbrand ON products.BrandID = productbrand.BrandID;

SELECT products.BrandID, productbrand.BrandName 
FROM products INNER JOIN productbrand ON products.BrandID = productbrand.BrandID; 

CREATE TABLE `images`(
	ImageId INT NOT NULL,
	ImageName LONGTEXT NOT NULL,
	ImageTitle VARCHAR(255) NOT NULL,
	ProductId INT NOT NULL
);

INSERT INTO `images` (`ImageId`, `ImageName`, `ImageTitle`, `ProductId`) VALUES
	(1, './Image/iphone13promax.jpg', 'Xanh Lá', 1),
	(2, './Image/iphone13promax1.jpg', 'Trắng', 1),
	(4, './Image/iphone12.jpg', 'xanh Dương', 2),
	(5, './Image/iphone12a.jpg', 'Trắng', 2),
	(6, './Image/iphoneSE.jpg', 'Trắng', 3),
	(7, './Image/iphoneSE1.jpg', 'Đỏ', 3),
	(8, './Image/iphoneSE2.jpg', 'Đen', 3),
	(9, './Image/iphone11.jpg', 'Xanh Lá', 4),
	(10, './Image/iphone11a.jpg', 'Đỏ', 4),
	(11, './Image/iphone11b.jpg', 'Đen', 4),
	(12, './Image/iphone7.jpg', 'Bạc', 5),
	(13, './Image/iphone7a.jpg', 'Đen', 5),
	(14, './Image/iphone7b.jpg', 'Vàng Đồng', 5),
	(15, './Image/iphone8plus.jpg', 'Vàng Hồng', 6),
	(16, './Image/iphone8plus1.jpg', 'Bạc', 6),
	(17, './Image/oppofindx3pro.jpg', 'xanh Dương', 7),
	(18, './Image/oppofindx3pro1.jpg', 'Đen', 7),
	(19, './Image/opporeno7z.jpg', 'Đen', 8),
	(20, './Image/opporeno7z1.jpg', 'Bạc', 8),
	(21, './Image/opporeno6.jpg', 'Bạc', 9),
	(22, './Image/opporeno6a.jpg', 'Đen', 9),
	(23, './Image/oppoA95.jpg', 'Xanh Bạc', 10),
	(24, './Image/oppoA95a.jpg', 'Đen', 10),
	(25, './Image/oppoA16.jpg', 'Trắng', 11),
	(26, './Image/oppoA16a.jpg', 'Xanh Đen', 11),
	(27, './Image/oppoA57.jpg', 'Xanh Lá', 12),
	(26, './Image/oppoA57a.jpg', 'Đen', 12),
	(28, './Image/ssgalaxys22.jpg', 'Hồng', 13),
	(30, './Image/ssgalaxys22a.jpg', 'Đen', 13),
	(31, './Image/ssgalaxya73.jpg', 'Xanh Lá', 14),
	(32, './Image/ssgalaxya73a.jpg', 'Đen', 14),
	(33, './Image/ssgalaxya73b.jpg', 'Trắng', 14),
	(34, './Image/ssgalaxym52.jpg', 'xanh Dương', 15),
	(35, './Image/ssgalaxym52a.jpg', 'Đen', 15),
	(36, './Image/ssgalaxya13.jpg', 'Đen', 16),
	(37, './Image/ssgalaxya13a.jpg', 'xanh Dương', 16),
	(38, './Image/ssgalaxya13b.jpg', 'Cam', 16),
	(39, './Image/ssgalaxya03s.jpg', 'Xanh Đen', 17),
	(40, './Image/ssgalaxya03s1.jpg', 'Trắng', 17),
	(41, './Image/ssgalaxya03.jpg', 'Đen', 18),
	(42, './Image/ssgalaxya03a.jpg', 'Đỏ', 18),
	(43, './Image/xiaomi11tpro.jpg', 'Đen', 19),
	(44, './Image/xiaomi11tpro1.jpg', 'Bạc', 19),
	(45, './Image/xiaomi12pro.jpg', 'Xanh Lá', 20),
	(46, './Image/xiaomi12pro1.jpg', 'Tím', 20),
	(47, './Image/xiaomi12pro2.jpg', 'Đen', 20),
	(48, './Image/xiaomi11lite5gne.jpg', 'xanh Dương', 21),
	(49, './Image/xiaomi11lite5gne1.jpg', 'Xanh Lá', 21),
	(50, './Image/xiaomi11lite5gne2.jpg', 'Đen', 21),
	(51, './Image/xiaomiredmi10.jpg', 'Đen', 22),
	(52, './Image/xiaomiredmi10a.jpg', 'Xanh Bạc', 22),
	(53, './Image/xiaomiredmi9a.jpg', 'Đen', 23),
	(54, './Image/xiaomiredmi9a1.jpg', 'Xanh Lá', 23),
	(55, './Image/xiaomiredmi9c.jpg', 'Xanh Lá', 24),
	(56, './Image/xiaomiredmi9c1.jpg', 'xanh Tím', 24),
	(57, './Image/xiaomiredmi9c2.jpg', 'xanh Dương', 24),
	(58, './Image/vivov23.jpg', 'Đen', 25),
	(59, './Image/vivov23a.jpg', 'Vàng', 25),
	(60, './Image/vivoy33s.jpg', 'Vàng', 26),
	(61, './Image/vivoy33s1.jpg', 'Xanh Bạc', 26),
	(62, './Image/vivoy53s.jpg', 'Đen', 27),
	(63, './Image/vivoy53s1.jpg', 'xanh Tím', 27),
	(64, './Image/vivoy21s.jpg', 'xanh Dương', 28),
	(65, './Image/vivoy21s1.jpg', 'Đen', 28),
	(66, './Image/vivoy23s.jpg', 'Đen', 29),
	(67, './Image/vivoy23s1.jpg', 'xanh Tím', 29),
	(68, './Image/vivoy15s.jpg', 'xanh Ngọc', 30),
	(69, './Image/vivoy15s1.jpg', 'Đen', 30);

CREATE TABLE `orders`(
	OrderId INT NOT NULL,
	FullName VARCHAR(255) NOT NULL,
	Phone VARCHAR(10) NOT NULL,
	Color VARCHAR(255) NOT NULL,	
	ProductName VARCHAR(255) NOT NULL,
	Image VARCHAR(255) NOT NULL,
	ProductDescription LONGTEXT,
	ProductPrice DOUBLE NOT NULL,
	Quantity INT NOT NULL,
	`Status` VARCHAR(255)
);


SELECT products.ProductName, images.ImageName ,products.ProductPrice, products.ProductDescription FROM products INNER JOIN images
ON products.ProductId = images.ProductId;

SELECT  images.ImageName, images.ProductId
FROM products INNER JOIN images
ON products.ProductId = images.ProductId 
INNER JOIN productbrand ON products.BrandId = productbrand.BrandId  
WHERE productbrand.BrandId = 1;

WITH nameimage as(
SELECT *,ROW_NUMBER()
OVER(PARTITION BY ProductId order BY ProductId) rownum
FROM datas
WHERE BrandId = 1 
)
SELECT * FROM nameimage WHERE  rownum = 1  ;

CREATE VIEW datas AS
SELECT products.ProductId, products.ProductName, products.ProductPrice, products.ProductDescription,
productbrand.BrandId, productbrand.BrandName, productbrand.BrandDescription,
images.ImageId, images.ImageName, images.ImageTitle
FROM products INNER JOIN productbrand
ON products.BrandId = productbrand.BrandId
INNER JOIN images ON products.ProductId = images.ProductId;

SELECT * FROM datas
WHERE ProductName LIKE '%iphone%' ;

SELECT * FROM products;


ALTER TABLE `productbrand`
  ADD PRIMARY KEY (`BrandId`);
  
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `BrandId` (`BrandId`);
  
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageId`),
  ADD KEY `ProductId` (`ProductId`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`);
  

ALTER TABLE `productbrand`
  MODIFY `BrandId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
ALTER TABLE `products`
  MODIFY `ProductId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
ALTER TABLE `images`
  MODIFY `ImageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
ALTER TABLE `orders`
  MODIFY `OrderId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  
ALTER TABLE `products`
  ADD CONSTRAINT `fk_BrandId` FOREIGN KEY (`BrandId`) REFERENCES `productbrand` (`BrandId`);
  
ALTER TABLE `images`
  ADD CONSTRAINT `fk1_ProductId` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`);
  
  bookbook