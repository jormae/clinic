<?php 
  $thDate = new ThaiDate();
?>
<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding-bottom:10px">
  <div class="w3-row-padding w3-center" style="margin-top:80px">
    <h3 class="w3-center"><?=$data['pageTitle']?></h3>
    <p class="w3-center w3-large"><?=$data['thDate']?></p>
  </div>
</div>
<div class="w3-container" style="padding:50px 16px">
  <div class="w3-row">
    <div class="w3-row w3-section ">
      <!-- <div class="w3-row-padding"> -->
        <div class="w3-col m10" style="padding-right: 10px">
          <input class="w3-input w3-border" type="text" placeholder="ค้นหา" id="search-content" style="height: 47px">
        </div>
        <div class="w3-col m2">
          <input type="date" id="date" class="w3-input w3-border" value="<?=$data['date']?>">
        </div>
      <!-- </div> -->
    </div>
  </div>
  <div class="w3-responsive">
    <table class="w3-table-all w3-hoverable" id="table-visit">
      <thead>
      <tr>
        <th>ที่</th>
        <th>วันที่ - เวลา</th>
        <th>CID</th>
        <th>ชื่อ-สกุล</th>
        <th>อายุ</th>
        <th>Diag</th>
        <th>สถานะบุคคล</th>
        <th>สิทธิ์การรักษา</th>
        <th>จัดการ</th>
      </tr>
    </thead>
    </table>
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function() {

      $('#table-visit tr').click(function() {
          var href = $(this).find("a").attr("href");
          console.log(href)
          if(href) {
              window.location = href;
          }
      });

      $("#search-content").on('keyup change',function () {
          var rows = $("#table-visit").find("tr").hide();
          if (this.value.length) {
              var data = this.value.split(" ");
              $.each(data, function (i, v) {
                  rows.filter(":contains('" + v + "')").show();
              });
          } else rows.show();
      });

      $("#date").change(function(){
        let date = $(this).val()
        console.log(date)

        location.href='<?=BASEURL?>/dept/doctor/'+date

      })

  });

  $("#btn-line").click(function(){
    let date = $("#selectedDate").val()
    var rowCount = $('#table-visit tbody tr').length;
    if (rowCount < 1) {
      $("#message-box").html('<div class="w3-panel w3-pale-red">\
                                <h5>ไม่มีผู้มารับบริการในวันที่เลือก กรุณาลองใหม่อีกครั้ง</h5>\
                              </div>'
                            )
    }
    else{
    // console.log(rowCount)
    swal({
        text: "กรุณายืนยันการส่งข้อมูลเข้าไลน์กลุ่มห้องบัตร โรงพยาบาลบาเจาะ!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then(
        function(isConfirm){
          if(isConfirm)
          {
            $.ajax({
              type:'POST',
              url: '<?=BASEURL?>/system/linenotify',
              data:{date:date},
              success:function(html)
              {
                console.log(html)
                let res = JSON.parse(data)
                console.log(res)
                if (res.success == true) {
                      $("#message-box").html('<div class="w3-panel w3-pale-green">\
                        <h5>'+res.message+'</h5>\
                      </div>')
                    }
                    else{
                      $("#message-box").html('<div class="w3-panel w3-pale-red">\
                        <h5>'+res.message+'</h5>\
                      </div>')
                    }
              }
            })
          }
        }
      )
    }
  })

  let date = $("#date").val()
  var table = $('#table-visit').DataTable({
    "ajax":           '<?=BASEURL?>/api/dept_doctor/'+date,
    "scrollCollapse": false,
    "paging":         false,
    "bFilter":        false,
    "columns": [
    { "data":  null},
    { "data": null ,
        render: function ( data, type, row ) {
            return row.visitdate +' '+ row.timestart;
        }
    },
    { "data": "idcard" },
    { "data": null ,
        render: function ( data, type, row ) {
            return row.prename + row.fname +' '+ row.lname;
        }
    },
    { "data": "AGE" },
    { "data": "diagcode" },
    { "data": "incup" , 
      render: function (data, type, row) {
        return (data == '1') ? '<span class="w3-text-green">ในเขตรับผิดชอบ</span>' : '<span class="w3-text-red">นอกเขตรับผิดชอบ';} 
    },
    { "data": "rightname" },
    { "data": "visitno",
      render: function(data, type, row, meta){
        if(type === 'display'){
            data = '<a href="<?=BASEURL?>/visit/vn/' + data + '" class="w3-button w3-black w3-hover-red"><i class="fa fa-print w3-margin-right"></i> รายละเอียด</a>';
          }
        return data;
        }
    }
    ],
    "columnDefs": [ 
    {
      "searchable": false,
      "orderable": false,
      "targets": 0
    } 
    ],
    "order": [[ 1, 'asc' ]]
  });

  table.on( 'draw.dt', function () {
    var PageInfo = $('#table-visit').DataTable().page.info();
    table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
      cell.innerHTML = i + 1 + PageInfo.start;
    });
  });

</script>

