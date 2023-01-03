<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-sticker.css"> 
  <style type="text/css">
  	span{padding-left: 50px}
  	p{ text-align: center; line-height: 16px;}
  	.left{text-align: left;}
  	hr{border-top: 1px solid #000;}
  </style>
</head>
<body onload="window.print()">
  <?php  $thDate = new ThaiDate(); ?>
    <div id="print-sticker" style="font-size: 16px;">
      <p><center>ใบนัดรับบริการ</center></p>
      <h3 style="font-weight: bold;"><center><?=ORG_NAME?></center></h3>
      <p><center><?=ORG_ADDRESS?></center></p>
      <hr>
      <p></p>
      <p class="left">HN : <?=$data['personInfo']['pid']?> <span> ชื่อ-สกุล : <?=$data['personInfo']['fullname']?> </span> <span> อายุ : <?=$data['personInfo']['AGE']?> ปี</span></p>
      <p class="left">วันที่นัด : <?=$thDate->thaiShortDate($data['appointmentInfo']['appodate'])?> <span>เวลา : <?=($data['appointmentInfo']['appotime'] == "") ? '08.30' : $data['appointmentInfo']['appotime']?> น.</span></p>
      <p class="left">คลินิค : - <span> Diag : <?=$data['appointmentInfo']['diagcode']?></span></p>
      <p class="left">สาเหตุการนัด : <?=$data['appointmentInfo']['appointypename']?></p>
      <p class="left">สิ่งที่ต้องปฏิบัติ : <?=$data['appointmentInfo']['comment']?></p>
      <p class="left">ผู้นัด : <?=$data['appointmentInfo']['prename']?><?=$data['appointmentInfo']['fname']?> <?=$data['appointmentInfo']['lname']?></p>
    </div>
</body>
</html>



