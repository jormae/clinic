<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-report-default.css"> 
  <style type="text/css">
  	span{padding-left: 50px}
  	p{ text-align: center; line-height: 16px;}
  </style>
</head>
<body onload="window.print()">
  <div id="print-report">
    <center><h3>ทะเบียนผู้ป่วยคลินิคความดัน</h3></center>
<table class="table" width="100%">
    <thead class=" text-primary">
      <th>ที่</th>
        <th>CID</th>
        <th>HN</th>
        <th>ชื่อ-สกุล</th>
        <th>วันเกิด</th>
        <th>อายุ</th>
        <!-- <th>สิทธิ์การรักษา</th>
        <th>ที่อยู่</th> -->
    </thead>
    <tbody>
      <?php 
      $i=1; 
      foreach ( $data['patientsInfo'] as $row ) : 
      ?>
        <tr>
          <td><?=$i++?>.</td>
          <td><center><?=$row['idcard']?></center></td>
          <td><center><?=$row['hn']?></center></td>
          <td><span style="padding-left: 20px"><?=$row['fullname']?></span></td>
          <td><center><?=$row['birth']?></center></td>
          <td><center><?=$row['AGE']?> ปี</center></td>
          <!-- <td><?=$row['rightname']?></td>
          <td><?=$row['ADDRESS']?></td> -->
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
</body>
</html>



