<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-sticker.css"> 
  <style type="text/css">
  	span{padding-left: 50px}
  	p{ text-align: center; line-height: 16px;}
  </style>
</head>
<body onload="window.print()">
  <?php  $thDate = new ThaiDate(); ?>
    <div id="print-sticker" style="font-size: 16px; margin: 80px 60px 0 60px;" >
      <h2 style="font-weight: bold;"><center>ใบส่งตรวจทางห้องปฏิบัติการ โรงพยาบาลบาเจาะ</center></h2>
      <p><center>( <?=ORG_ABBR?> )</center></p>
      <p><center>วันที่ <?=$thDate->thaiShortDate($data['personInfo']['visitdate'])?> <span>เวลา <?=$data['personInfo']['timestart']?></span></center></p>
      <p><center>เลขที่ ปชช.  <?=$data['personInfo']['idcard']?> <span>HN : <?=$data['personInfo']['hn']?></span></center></p>
      <p><?=$data['personInfo']['fullname']?> <span> วันเกิด <?=$thDate->thaiShortDate($data['personInfo']['birth'])?></span> <span> อายุ <?=$data['personInfo']['AGE']?> ปี</span></p>
      <p><center>ที่อยู่.  <?=$data['personInfo']['ADDRESS']?></center></p>
      <p>สิทธิ์ : <?=$data['personInfo']['rightname']?> <span>Diag : <?=$data['diag']?></span></p>
      <hr>
      <div class="box box2">
      	<?php if ($data['diag'] == "HT") { ?>
      	<ul>
	      	<li><input type="checkbox" checked="true"> CBC</li>
	      	<li><input type="checkbox" checked="true"> Creatinine</li>
	      	<li><input type="checkbox" checked="true"> Lipid Profile</li>
	      	<ul>
		      	<li><input type="checkbox" checked="true"> Cholesterol</li>
		      	<li><input type="checkbox" checked="true"> Triglyceride</li>
		      	<li><input type="checkbox" checked="true"> HDL</li>
		      	<li><input type="checkbox" checked="true"> LDL</li>
	      	</ul>
	      	<li><input type="checkbox" checked="true"> Urine Albumine/Sugar</li>
	      	<li><input type="checkbox" checked="true"> Glucose</li>
	      	<li><input type="checkbox" checked="true"> Uric Acid</li>
	    </ul>
	  	<?php } elseif ($data['diag'] == "DM") { ?>
	  	<ul>
	      	<li><input type="checkbox" checked="true"> CBC</li>
	      	<li><input type="checkbox" checked="true"> Creatinine</li>
	      	<li><input type="checkbox" checked="true"> Lipid Profile</li>
	      	<ul>
		      	<li><input type="checkbox" checked="true"> Cholesterol</li>
		      	<li><input type="checkbox" checked="true"> Triglyceride</li>
		      	<li><input type="checkbox" checked="true"> HDL</li>
		      	<li><input type="checkbox" checked="true"> LDL</li>
	      	</ul>
	      	<li><input type="checkbox" checked="true"> HbA1C</li>
	      	<li><input type="checkbox" checked="true"> Urine Micro Albumine</li>
	      	<li><input type="checkbox" checked="true"> Uric Acid</li>
	    </ul>
	  	<?php } ?>
      </div>
      <div class="box box2" style="float: right;">
      	<ul>
	      	<li><input type="checkbox"> Elyte</li>
	      	<li><input type="checkbox"> UA</li>
	      	<li><input type="checkbox"> BUN</li>
	      	<li><input type="checkbox"> TFT</li>
	      </ul>
      </div>
      
    </div>
</body>
</html>



