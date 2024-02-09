<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-report.css"> 
  <style type="text/css">
    /*li{line-height: 30px;}*/
  </style>
</head>
<body>
    <div id="print-report" style="font-size: 14px;">
      <img src="<?=BASEURL?>/img/garuda1.jpg" height="85" style="margin-top: -30px; margin-left: 260px; position: fixed; ">
      <p style="float: left; margin-top: 0"><?=ORG_DOC_NO?>/</p>
      <div id="box-address" >
        <p><?=ORG_ABBR?></p>
        <p class="addr"><?=ORG_ADDRESS?></p>
      </div>
      <br><br><br>
      <p>เรื่อง ส่งตรวจวิเคราะห์และอ่านผล</p>
      <p>เรียน ผู้อำนวยการโรงพยาบาลบาเจาะ</p>
      <p>สิ่งที่ส่งมาด้วย .........................จำนวน ราย</p>
      <p class="indent">ด้วย<?=ORG_NAME?> ยังขาดอุปกรณ์และน้ำยาในการตรวจวิเคราะห์ทางห้องปฏิบัติการ ไม่สามารถทำการวิเคราะห์ได้ จึงขอส่งตัวอย่างเพื่อตรวจวิเคราะห์และอ่านผลดังต่อไปนี้</p>
      <table class="table-noborder" width="100%">
        <?php $total_persons = 1; foreach ($data['labsInfo'] as $value) : ?>
        <tr>
          <td><?=$total_persons++;?>. ชื่อ <?=$value['prename']?><?=$value['fname']?> <?=$value['lname']?>  อายุ <?=$value['AGE']?> ปี เลข ปชช. <?=$value['idcard']?> ตรวจ..........  สิทธิ์ <?=$value['rightname']?></td>
        </tr>
        <?php endforeach ?>
      </table>
      <p class="indent">เมื่อดำเนินการเสร็จเรียบร้อยแล้ว ทาง<?=ORG_NAME?> จะมาขอรับผลการตรวจในวันถัดไป</p>
      <p class="indent">จึงเรียนมาเพื่อโปรดพิจารณาอนุเคราะห์</p>
      <br><br><br>
      <div id="sign">
        <p>ขอแสดงความนับถือ</p>
        <br><br>
        <!-- <p><?=DIRECTOR_NAME?></p>
        <p><?=PROFESSIONAL_POSITION?></p>
        <p><?=MANAGEMENT_POSITION?><?=ORG_NAME?></p> -->
      </div>
      
    </div>
</body>
</html>



