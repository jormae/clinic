<div class="w3-container w3-light-grey" style="padding-bottom:10px">
  <div class="w3-row-padding w3-center" style="margin-top:80px">
    <h3 class="w3-center"><?=$data['pageTitle']?></h3>
    <p></p>
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
          <!-- <button class="w3-button w3-green w3-right" id="btn-line"><i class="fa fa-facebook w3-margin-right"></i> ส่งไลน์</button> -->
        </div>
        
      <!-- </div> -->
    </div>
  </div>

  <div class="w3-responsive">
    <table class="w3-table-all w3-hoverable" id="table-user" width="100%">
      <thead>
      <tr>
        <th>ที่</th>
        <th>บัญชีผู้ใช้</th>
        <th>ชื่อ-สกุล</th>
        <th>ประเภท</th>
        <th>ตำแหน่ง</th>
        <th>จัดการ</th>
      </tr>
    </thead>
    </table>
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function() {


      var table = $('#table-user').DataTable({
        ajax: {
            url: 'http://localhost:3305/users/',
            dataSrc: '',
        },
        "scrollCollapse": false,
        "paging":         true,
        "bFilter":        true,
        "columns": [
        { "data":  null},
        { "data":  "username"},
        { "data":  "fullname"},
        { "data":  "officertype"},
        { "data":  "officerposition"},
        // { "data":  "username"},
        { "data":  "idcard",
          render: function(data, type, row, meta){
            if(type === 'display'){
                data = '<a href="<?=BASEURL?>/user/form/' + data + '" class="w3-button w3-black w3-hover-red"><i class="fa fa-user w3-margin-right"></i> รายละเอียด</a>';
              }
            return data;
            }
        }
        ]
      });

      table.on( 'draw.dt', function () {
        var PageInfo = $('#table-user').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
          cell.innerHTML = i + 1 + PageInfo.start;
        });
      });


  });

</script>

