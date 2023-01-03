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
  </div>
</div>

<div class="w3-container" style="padding:50px 16px">
  <div class="w3-row">
    <div class="w3-row w3-section ">
      <!-- <div class="w3-row-padding"> -->
        <div class="w3-col m12">
          <span id="message-box"></span>
          <!-- <a href="<?=BASEURL?>/prints/stickerlabs/<?=$data['date']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์สติ๊กเกอร์ทั้งหมด</a>
          <a href="<?=BASEURL?>/prints/doclabs/<?=$data['date']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์ใบปะหน้า</a>
          <a href="<?=BASEURL?>/prints/reportlabs/<?=$data['date']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์ทะเบียนรายการตรวจ</a> -->
          <button class="w3-button w3-green w3-right" id="btn-line"><i class="fa fa-facebook w3-margin-right"></i> ส่งไลน์</button>
        </div>
        
      <!-- </div> -->
    </div>
  </div>
  <div class="w3-row">
    <div class="w3-row w3-section ">
        <div class="w3-col m12" style="padding-right: 10px">
          <input class="w3-input w3-border" type="text" placeholder="ค้นหา" id="search-content" style="height: 47px">
        </div>
    </div>
  </div>
  <div class="w3-responsive">
    <table class="w3-table-all w3-hoverable" id="table-user">
      <thead>
      <tr>
        <th>ที่</th>
        <th>บัญชีผู้ใช้</th>
        <th>ชื่อ-สกุล</th>
        <th>ประเภท</th>
        <th>ตำแหน่ง</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; foreach ($data['usersInfo'] as $value) : ?>
      <tr>
        <td><?=$i++;?></td>
        <td><?=$value['username']?></td>
        <td><?//=$value['prename']?><?=$value['fname']?> <?=$value['lname']?></td>
        <td><?=$value['officertype']?></td>
        <td><?=$value['officerposition']?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function() {

    $("#search-content").on('keyup change',function () {
      var rows = $("#table-user").find("tr").hide();
      if (this.value.length) {
        var data = this.value.split(" ");
        $.each(data, function (i, v) {
          rows.filter(":contains('" + v + "')").show();
        });
      } else rows.show();
    });

  });

  $("#btn-line").click(function(){
    console.log('clicked')
    $.ajax({
      type:'POST',
      url: '<?=BASEURL?>/user/linenotify',
      success:function(html)
      {
        console.log(html)
        let res = JSON.parse(data)
        // console.log(res)
        // if (res.success == true) {
        //   $("#message-box").text(res.message)
        // }
        // else{
        //   $("#message-box").text(res.message)
        // }
      }
    })

  })
</script>

