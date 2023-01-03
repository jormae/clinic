<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-sticker.css"> 
  <style type="text/css">
  	p{text-align: center;}
  </style>
</head>
<!-- <body onload="window.print()"> -->
<body>
  <?php  $thDate = new ThaiDate(); ?>
    <div id="print-sticker" style="font-size: 12px;">
    	<?php foreach ($data['labsInfo'] as $value) : ?>
    	<div class="row">
	    	<div class="box-sticker sticker">
		      	<p><?=ORG_ABBR?></p>
			    <p>วันที่ <?=$thDate->thaiShortDate($value['visitdate'])?></p>
			    <p><?=$value['prename']?><?=$value['fname']?> <?=$value['lname']?> อายุ <?=$value['AGE']?> ปี</p>
			    <p>ผู้เจาะ ....................... เวลา ................</p>
			    <p>รายการตรวจ........................................</p>
	    	</div>
	    	<div class="box-sticker sticker">
		      	<p><?=ORG_ABBR?></p>
			    <p>วันที่ <?=$thDate->thaiShortDate($value['visitdate'])?></p>
			    <p><?=$value['prename']?><?=$value['fname']?> <?=$value['lname']?> อายุ <?=$value['AGE']?> ปี</p>
			    <p>ผู้เจาะ ....................... เวลา ................</p>
			    <p>รายการตรวจ........................................</p>
	    	</div>
	    	<div class="box-sticker sticker">
		      	<p><?=ORG_ABBR?></p>
			    <p>วันที่ <?=$thDate->thaiShortDate($value['visitdate'])?></p>
			    <p><?=$value['prename']?><?=$value['fname']?> <?=$value['lname']?> อายุ <?=$value['AGE']?> ปี</p>
			    <p>ผู้เจาะ ....................... เวลา ................</p>
			    <p>รายการตรวจ........................................</p>
	    	</div>
	    	<!-- <hr> -->
	    </div>
		<?php endforeach ?>
    </div>
</body>
</html>



