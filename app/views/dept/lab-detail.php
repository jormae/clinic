<?php 
  $thDate = new ThaiDate();
?>
<style type="text/css">
  #table-visit td:hover {
      cursor: pointer;
  }
  #table-visit a{
    text-decoration: none;
  }
</style>
<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding-bottom:10px">
  <div class="w3-row-padding w3-center" style="margin-top:80px">
    <h3 class="w3-center"><?=$data['pageTitle']?></h3>
    <p class="w3-center w3-large">รายการตรวจ</p>
  </div>
</div>

<div class="w3-container" style="padding:50px 16px">
  <div class="w3-row">
    <div class="w3-row w3-section ">
      <!-- <div class="w3-row-padding"> -->
        <div class="w3-col m3" style="padding-right: 10px">
          เลขที่บัตรประชาชน : <?=$data['personInfo']['idcard']?>
        </div>
        <div class="w3-col m3">
          ชื่อ-สกุล : <?=$data['personInfo']['fullname']?>
        </div>
        <div class="w3-col m4">
          สิทธิ์การรักษา : <?=$data['personInfo']['rightname']?>
        </div>
        
        
      <!-- </div> -->
    </div>
    <div class="w3-row w3-section ">
    <div class="w3-col m12">
          <a href="<?=BASEURL?>/prints/stickerlab/<?=$data['labsInfo'][0]['visitno']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์สติ๊กเกอร์</a>
          <a href="<?=BASEURL?>/prints/laborder/ht/<?=$data['labsInfo'][0]['visitno']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์ใบแล็บ HT</a>
          <a href="<?=BASEURL?>/prints/laborder/dm/<?=$data['labsInfo'][0]['visitno']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์ใบแล็บ DM</a>
        </div>
    </div>
  </div>
  <div class="w3-responsive">
    <table class="w3-table-all w3-hoverable" id="table-visit">
      <thead>
      <tr>
        <th>ที่</th>
        <th>LAB CODE</th>
        <th>ชื่อรายการตรวจ</th>
        <th>ผล</th>
        <th>ค่าต่ำ - ค่าสูงสุด</th>
        <th>ราคา</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; foreach ($data['labsInfo'] as $value) : ?>
      <tr>
        <td><?=$i++;?></td>
        <td><?=$value['labcode']?></td>
        <td><?=$value['labname']?></td>
        <td><?=$value['labresultdigit']?></td>
        <td><?=($value['stdm']) ? $value['stdm'] : $value['minstdm']?> - <?=$value['minstdf']?></td>
        <td><?=$value['labprice']?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function() {

      $("#search-content").on('keyup change',function () {
          var rows = $("#table-visit").find("tr").hide();
          if (this.value.length) {
              var data = this.value.split(" ");
              $.each(data, function (i, v) {
                  rows.filter(":contains('" + v + "')").show();
              });
          } else rows.show();
      });

  });
</script>

