"# clinic" 
ขั้นตอนการติดตั้ง
1.ติดตั้งโปรแกรม Navicat
   1.1 เพิ่ม field "hn" varchar(6) ในตาราง person
   1.2 copy and paste query เพื่อสร้างตารางเก็บ log รายการส่งวิสิตในไลน์กลุ่มห้องบัตรโรงพยาบาลบาเจาะ
	CREATE TABLE `tbl_line_log`  (
	  `lineLogId` int(8) NOT NULL AUTO_INCREMENT,
	  `datetime` datetime NULL,
	  `visitdate` date NULL,
	  `idcard` varchar(13) NULL,
	  `lineText` text NULL,
	  `sendBy` varchar(50) NULL,
	  PRIMARY KEY (`lineLogId`)
	);

2.ติดตั้งโปรแกรม Visual Studio Code
   2.1 เปิดไฟล์ config.php ในโฟล์เดอร์ /app/config/config.php แก้ไขข้อมูล ชื่อหน่วยงาน ชื่อผู้อำนวยการ ข้อมูลที่อยู่ เลขที่หนังสือ และข้อมูลการเชื่อมต่อฐานข้อมูล

3. ติดตั้งโปรแกรม Docker Desktop
   3.1 ย้อนกลับไปเปิดโปรแกรม  Visual Studio Code
   3.2 กดเมนู Terminal -> New Terminal
   3.3 พิมพ์คำสั่ง docker-compose up -d เพื่อ build และ run docker container
   3.4 พิมพ์คำสั่ง docker-compose down เพื่อหยุดการทำงานของ docker container

4.ตั้งค่าโปรแกรม Docker Desktop ให้เปิดโดยอัตโนมัติเมื่อเปิดคอมพิวเตอร์ 
