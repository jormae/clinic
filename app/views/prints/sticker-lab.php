<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/css/print-sticker.css"> 
</head>
<body onload="window.print()">
  <?php  $thDate = new ThaiDate(); ?>
    <div id="print-sticker">
      
      <div class="row">
	    	<div class="box-sticker sticker">
		      	<p style="font-size: 12px;"><?=ORG_ABBR?></p>
			    <p style="font-size: 12px;">วันที่ <?=$thDate->thaiShortDate($data['personInfo']['visitdate'])?></p>
			    <p style="font-size: 12px;"><?=$data['personInfo']['fullname']?> อายุ <?=$data['personInfo']['AGE']?> ปี</p>
			    <p style="font-size: 12px;">ผู้เจาะ......................เวลา................</p>
			    <p style="font-size: 12px; text-align: left;">Diag.......................HN : <?=$data['personInfo']['hn']?></p>
	    	</div>
<!-- 	    	<div class="clearfix"></div>
	    	<div class="box-sticker sticker" style="margin-top:-5px; padding-bottom: 1px;">
		      	<p style="font-size: 12px;"><?=ORG_ABBR?></p>
			    <p style="font-size: 12px;">วันที่ <?=$thDate->thaiShortDate($data['personInfo']['visitdate'])?></p>
			    <p style="font-size: 12px;"><?=$data['personInfo']['fullname']?> อายุ <?=$data['personInfo']['AGE']?> ปี</p>
			    <p style="font-size: 12px;">ผู้เจาะ......................เวลา................</p>
			    <p style="font-size: 12px; text-align: left;">Diag.......................HN : <?=$data['personInfo']['hn']?></p>
	    	</div>
	    	<div class="clearfix"></div>
	    	<div class="box-sticker sticker" style="margin-top:-5px; margin-bottom: -10px;">
		      	<p style="font-size: 12px;"><?=ORG_ABBR?></p>
			    <p style="font-size: 12px;">วันที่ <?=$thDate->thaiShortDate($data['personInfo']['visitdate'])?></p>
			    <p style="font-size: 12px;"><?=$data['personInfo']['fullname']?> อายุ <?=$data['personInfo']['AGE']?> ปี</p>
			    <p style="font-size: 12px;">ผู้เจาะ......................เวลา................</p>
			    <p style="font-size: 12px; text-align: left;">Diag.......................HN : <?=$data['personInfo']['hn']?></p>
	    	</div> -->
	    	<!-- <hr> -->
	    </div>
    </div>
</body>
</html>



