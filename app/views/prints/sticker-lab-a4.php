<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-sticker.css"> 
</head>
<body onload="window.print()">
  <?php  $thDate = new ThaiDate(); ?>
    <div id="print-sticker" style="margin-left: 60px">
      
      <div class="row">
	    	<div class="box-sticker-a4 sticker-a4">
		      	<p><?=ORG_ABBR?></p>
			    <p style="font-size: 12px;">วันที่ <?=$thDate->thaiShortDate($data['personInfo']['visitdate'])?></p>
			    <p style="font-size: 12px;"><?=$data['personInfo']['fullname']?> อายุ <?=$data['personInfo']['AGE']?> ปี</p>
			    <p style="font-size: 12px;">ผู้เจาะ......................เวลา................</p>
			    <p style="font-size: 12px; text-align: left; padding-left: 5px;">Diag.......................HN : <?=$data['personInfo']['hn']?></p>
	    	</div>
	    	<div class="box-sticker-a4 sticker-a4">
		      	<p><?=ORG_ABBR?></p>
			    <p style="font-size: 12px;">วันที่ <?=$thDate->thaiShortDate($data['personInfo']['visitdate'])?></p>
			    <p style="font-size: 12px;"><?=$data['personInfo']['fullname']?> อายุ <?=$data['personInfo']['AGE']?> ปี</p>
			    <p style="font-size: 12px;">ผู้เจาะ......................เวลา................</p>
			    <p style="font-size: 12px; text-align: left; padding-left: 5px;">Diag.......................HN : <?=$data['personInfo']['hn']?></p>
	    	</div>
	    	<div class="box-sticker-a4 sticker-a4">
		      	<p><?=ORG_ABBR?></p>
			    <p style="font-size: 12px;">วันที่ <?=$thDate->thaiShortDate($data['personInfo']['visitdate'])?></p>
			    <p style="font-size: 12px;"><?=$data['personInfo']['fullname']?> อายุ <?=$data['personInfo']['AGE']?> ปี</p>
			    <p style="font-size: 12px;">ผู้เจาะ......................เวลา................</p>
			    <p style="font-size: 12px; text-align: left; padding-left: 5px;">Diag.......................HN : <?=$data['personInfo']['hn']?></p>
	    	</div>
	    	<!-- <hr> -->
	    </div>
    </div>
</body>
</html>



