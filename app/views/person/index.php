
<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding-bottom:10px">
  <div class="w3-row-padding w3-center" style="margin-top:80px">
    <h3 class="w3-center"><?=$data['pageTitle']?></h3>
    <p></p>
  </div>
</div>
<div class="w3-container" style="padding:50px 16px">
<!--   <div class="w3-row">
    <div class="w3-row w3-section ">
        <div class="w3-col m10" style="padding-right: 10px">
          <input class="w3-input w3-border" type="text" placeholder="ค้นหา" id="search-content" style="height: 47px">
        </div>
        <div class="w3-col m2">
          <input type="date" id="date" class="w3-input w3-border" value="<?=$data['date']?>">
        </div>
    </div>
  </div> -->
  <div class="w3-responsive">
    <table class="w3-table-all w3-hoverable" id="table-person" width="100%">
      <thead>
      <tr>
        <th>ที่</th>
        <!-- <th>PID</th> -->
        <th>CID</th>
        <th>HN</th>
        <th>ชื่อ-สกุล</th>
        <th>วันเกิด</th>
        <th>อายุ</th>
        <!-- <th>สถานะบุคคล</th> -->
        <th>สิทธิ์การรักษา</th>
        <th>ที่อยู่</th>
        <th>จัดการ</th>
      </tr>
    </thead>
    </table>
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function() {


      // $("#search-content").on('keyup change',function () {
      //     var rows = $("#table-person").find("tr").hide();
      //     if (this.value.length) {
      //         var data = this.value.split(" ");
      //         $.each(data, function (i, v) {
      //             rows.filter(":contains('" + v + "')").show();
      //         });
      //     } else rows.show();
      // });

      // $("#date").change(function(){
      //   let date = $(this).val()
      //   location.href='<?=BASEURL?>/dept/lab/'+date
      // })

      var table = $('#table-person').DataTable({
        "ajax":           '<?=BASEURL?>/api/person/',
        "scrollCollapse": false,
        "paging":         true,
        "bFilter":        true,
        "columns": [
        { "data":  null},
        { "data":  "idcard"},
        { "data":  "hn"},
        { "data": "fullname"},
        { "data":  "birth"},
        { "data":  "AGE"},
        { "data": "rightname" },
        { "data": "ADDRESS" },
        { "data": "idcard",
          render: function(data, type, row, meta){
            if(type === 'display'){
                data = '<a href="<?=BASEURL?>/person/' + data + '" class="w3-button w3-black w3-hover-red"><i class="fa fa-user w3-margin-right"></i> รายละเอียด</a>';
              }
            return data;
            }
        }
        ]
      });

      table.on( 'draw.dt', function () {
        var PageInfo = $('#table-person').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
          cell.innerHTML = i + 1 + PageInfo.start;
        });
      });

  });

</script>

