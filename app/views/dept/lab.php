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
      <div id="message-box"></div> 
      <!-- <div class="w3-row-padding"> -->
        <div class="w3-col m12">
          <!-- <a href="<?=BASEURL?>/prints/stickerlabs/<?=$data['date']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์สติ๊กเกอร์ทั้งหมด</a> -->
          <a href="<?=BASEURL?>/prints/doclabs/<?=$data['date']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์ใบปะหน้า</a>
          <a href="<?=BASEURL?>/prints/reportlabs/<?=$data['date']?>" class="w3-button w3-light-grey"><i class="fa fa-print w3-margin-right"></i>พิมพ์ทะเบียนรายการตรวจ</a>
          <button class="w3-button w3-green w3-right" id="btn-line" <?=$data['btnLineStatus']?>><i class="fa fa-comment w3-margin-right"></i> ส่งไลน์</button>
          <input type="hidden" id="selectedDate" value="<?=$data['date']?>">
        </div>
        
      <!-- </div> -->
    </div>
  </div>
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
    <table class="w3-table-all w3-hoverable" id="table-visit" width="100%">
      <thead>
      <tr>
        <th>ที่</th>
        <th>วันที่ - เวลา</th>
        <th>HN</th>
        <th>CID</th>
        <th>ชื่อ-สกุล</th>
        <th>อายุ</th>
        <th>Diag</th>
        <th>สถานะบุคคล</th>
        <th>สิทธิ์การรักษา</th>
        <th>สถานะการส่งไลน์</th>
        <th>จัดการ</th>
      </tr>
    </thead>
    </table>
  </div>
  
</div>

  <!-- The Modal -->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header  class="w3-container w3-light-grey">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright" id="btn-close">&times;</span>
        <h2>ข้อมูลประชากร</h2>
      </header>
      <div class="w3-container">
        <div id="message-modal"></div>
          <div class="w3-row-padding">
            <div class="w3-col m6">
              <p>HN</p>
              <input class="w3-input w3-border" type="number"  id="hn">
            </div>
            <div class="w3-col m6">
              <p>เลขที่บัตรประชาชน</p>
              <input class="w3-input w3-border" type="text"  id="idcard" disabled="true">
            </div>
          </div>  
          <div class="w3-row-padding">
            <div class="w3-col m6">
              <p>ชื่อ-สกุล</p>
              <input class="w3-input w3-border" type="text"  id="fullname" disabled="true">
            </div>
            <div class="w3-col m6">
              <p>เพศ</p>
              <input class="w3-input w3-border" type="text"  id="sex" disabled="true">
            </div>
          </div>  
          <div class="w3-row-padding">
            <div class="w3-col m6">
              <p>วันเกิด</p>
              <input class="w3-input w3-border" type="date"  id="birthday" disabled="true">
            </div>
            <div class="w3-col m6">
              <p>อายุ</p>
              <input class="w3-input w3-border" type="text"  id="age" disabled="true">
            </div>
          </div>         
      </div>
      <hr>
      <footer class="w3-container">
        <button class="w3-button w3-section w3-blue w3-padding w3-right" id="btn-save">บันทึก</button>
      </footer>
    </div>
  </div>
  <!-- Modal -->
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

      $("#date").change(function(){
        let date = $(this).val()
        location.href='<?=BASEURL?>/dept/lab/'+date
      })

      let date = $("#date").val()
      var table = $('#table-visit').DataTable({
        "ajax":           '<?=BASEURL?>/api/dept_lab/'+date,
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
        { "data": "hn" ,
          render: function(data, type, row){
            return (data == null) ? '<button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large idcard" onclick="getID('+row.idcard+'); showModal();">แก้ไข</button>' : '<button class="w3-btn w3-white w3-border w3-border-green w3-text-green w3-round-large idcard" onclick="getID('+row.idcard+'); showModal();">'+data+'</button>';
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
            return (data == '1') ? '<span class="w3-text-green">ในเขตรับผิดชอบ</span>' : '<span class="w3-text-red">นอกเขตรับผิดชอบ';
            } 
        },
        { "data": "rightname" },
        { "data": "LINE_STATUS", 
          render: function (data, type, row) {
            return (data == null) ? '<span class="w3-text-grey"><i class="fa fa-comment"></i> รอการส่ง</span>' : '<span class="w3-text-green"><i class="fa fa-comment"></i> ส่งแล้ว</span>';
          }
        }, 
        { "data": "visitno",
          render: function(data, type, row, meta){
            if(type === 'display'){
                data = '<a href="<?=BASEURL?>/dept/laborder/' + data + '" class="w3-button w3-black w3-hover-red"><i class="fa fa-user w3-margin-right"></i> รายละเอียด</a>';
              }
            return data;
            }
        }
        ]
      });

      table.on( 'draw.dt', function () {
        var PageInfo = $('#table-visit').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
          cell.innerHTML = i + 1 + PageInfo.start;
        });
      });

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
              success:function(data)
              {
                let res = JSON.parse(data)
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


  function getID(id){
    console.log(id);
    $.ajax({
      type:'POST',
      url:'<?=BASEURL?>/api/person/'+id,
      success:function(data){
        let res = JSON.parse(data)
        let strSex = (res.data.sex == 1) ? "ชาย" : "หญิง"
        $("#hn").val(res.data.hn)
        $("#idcard").val(res.data.idcard)
        $("#fullname").val(res.data.fullname)
        $("#birthday").val(res.data.birth)
        $("#age").val(res.data.AGE_Y)
        $("#sex").val(strSex)
        $("#hn").focus()
      }
    })
  }

  function showModal(){
    document.getElementById('id01').style.display='block';
  }


  $("#btn-save").click(function(){
    let hn = $("#hn").val()
    let idcard = $("#idcard").val()

    if (hn.length != 7) {
      swal("กรุณาใส่ HN ให้ถูกต้อง!", {icon: "error"});
    }
    else{
      
      $("#btn-save").prop('disabled',true)

      $.ajax({
      type:'POST',
      url:'<?=BASEURL?>/person/update_hn/'+idcard,
      data:{hn:hn},
      success:function(data){
        let res = JSON.parse(data)
        if (res.success == true) {
          swal('success',res.message,'success').then((value) => {
            location.reload();
          })
        }
        else{
          swal(res.message, {icon: "error"});
        }
      }
    })
    }

    
  })
</script>

