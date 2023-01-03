<!DOCTYPE html>
<html>
<head>
  <title><?=SYSTEM_NAME?></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-report-default.css"> 
  <style type="text/css">
    .text-right{text-align: right;}
    .center{text-align: center;}
    .right{text-align: right; padding-right: 5px;}
    td{min-width: 25px;}
    tr>td { padding: 0 3px;}
  </style>
</head>
<body>

  <?php $thDate = new ThaiDate(); ?>
  <div id="print-report" class="custom-border">
    <div id="header">
      <h2><?=ORG_NAME?></h2>
      <h3>ทะเบียนส่งตรวจทางห้องปฏิบัติการ</h3>
      <h3><?=$data['thDate']?></h3>
    </div>
    <table class="table" align="center" widtd="100%" border="1">
      <thead style="font-size: 14px; background-color: #ccc; text-align: center;">
        <td>ที่</td>
        <td>HN</td>
        <td>LAB</td>
        <td>ชื่อ-สกุล</td>
        <td>อายุ</td>
        <td>เลข ปชช.</td>
        <td>สิทธิ์</td>
        <td>ที่อยู่</td>
        <td>BP</td>
        <td>DTX</td>
        <td>FBS</td>
        <td>eGFR</td>
        <td>BUN</td>
        <td>Cr.</td>
        <td>Chol.</td>
        <td>TG</td>
        <td>HDL</td>
        <td>LDL</td>
        <td>Uric a.</td>
        <td>HbA1C</td>
        <td>Alb.</td>
        <td>Sgr</td>
        <td>Urine M.Alb.</td>
      </thead>
      <tbody  style="font-size: 13px">
        <?php $i=1; foreach ($data['visitsInfo'] as $value) : ?>
        <tr>
          <td class="right"><?=$i++?></td>
          <td class="center"><?=$value['hn'];?></td>
          <td></td>
          <td><?=$value['prenamelong'];?><?=$value['fname'];?> <?=$value['lname'];?></td>
          <td class="center"><?=$value['AGE'];?></td>
          <td class="center"><?=$value['idcard'];?></td>
          <td>(<?=$value['rightcode'];?>) <?= strlen($value['rightname']) > 30 ? preg_replace("/\([^)]+\)/","", mb_substr($value['rightname'],0,30,'UTF-8')) : $value['rightname'].'...';?></td>
          <td><?=$value['hnomoi'];?> ม.<?=$value['mumoi'];?></td>
          <td class="center"><?=$value['pressure'];?></td>
          <td class="center"><?=$value['DTX'];?></td>
          <td class="center"><?=$value['FBS'];?></td>
          <td class="center"><?=$value['eGFR'];?></td>
          <td class="center"><?=$value['BUN'];?></td>
          <td class="center"><?=$value['Creatinine'];?></td>
          <td class="center"><?=$value['Cholesterol'];?></td>
          <td class="center"><?=$value['Triglyceride'];?></td>
          <td class="center"><?=$value['HDL'];?></td>
          <td class="center"><?=$value['LDL'];?></td>
          <td class="center"><?=$value['Uric'];?></td>
          <td class="center"><?=$value['HbA1c'];?></td>
          <td class="center"><?=$value['Albumin'];?></td>
          <td class="center"><?=$value['Glucose'];?></td>
          <td class="center"><?=$value['Urine Microalbumin'];?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
</body>
</html>
