<?php $thDate = new ThaiDate(); ?>
<div class="w3-container w3-light-grey" style="padding-bottom:10px">
  <div class="w3-row-padding w3-center" style="margin-top:80px">
    <h3 class="w3-center"><?=$data['pageTitle']?></h3>
    <input type="hidden" id="visitno" value="<?=$data['visitInfo']['visitno']?>">
  </div>
</div>

<div class="w3-container" style="padding:50px 16px">
  <div class="w3-row">
    <div class="w3-row w3-section ">
      <!-- <div class="w3-row-padding"> -->
        <div class="w3-col m3">
        </div>
        <div class="w3-col m9 w3-right">
        <div class="w3-col m4">
          PID : <?=$data['visitInfo']['pid']?>
        </div>
        <div class="w3-col m4" style="padding-right: 10px">
          เลขที่บัตรประชาชน : <?=$data['visitInfo']['idcard']?>
        </div>
        <div class="w3-col m4">
          ชื่อ-สกุล : <?=$data['visitInfo']['fullname']?>
        </div>
        <div class="w3-col m4" style="padding-right: 10px">
          เพศ : <?=$data['visitInfo']['sex'] == 1 ? "ชาย" : "หญิง" ?>
        </div>
        <div class="w3-col m4">
          วันเกิด : <?=$thDate->thaiShortDate($data['visitInfo']['birth'])?>
        </div>
        <div class="w3-col m4">
          อายุ : <?=$data['visitInfo']['AGE_Y']?> ปี <?=$data['visitInfo']['AGE_M']?> เดือน <?=$data['visitInfo']['AGE_D']?> วัน
        </div>
        <div class="w3-col m4">
          สัญชาติ : <?=$data['visitInfo']['nationname']?>
        </div>
        <div class="w3-col m4">
          เชื้อชาติ : <?=$data['visitInfo']['nationname']?>
        </div>
        <div class="w3-col m4">
          ศาสนา : <?=$data['visitInfo']['religionname']?>
        </div>
        <div class="w3-col m4">
          การศึกษา : <?=$data['visitInfo']['educationname']?>
        </div>
        <div class="w3-col m4">
          อาชีพ : <?=$data['visitInfo']['occupaname']?>
        </div>
        <div class="w3-col m4">
          สิทธิ์การรักษา : <?=$data['visitInfo']['rightname']?>
        </div>
        <div class="w3-col m4">
          ประเภท : <?=$data['visitInfo']['typelive']?>
        </div>
        <div class="w3-col m4">
          โทรศัพท์ : -
        </div>
        <div class="w3-col m4">
          มือถือ : <?=$data['visitInfo']['mobile']?>
        </div>
        <div class="w3-col m12">
          ที่อยู่ : <?=$data['visitInfo']['ADDRESS']?>
        </div>
      </div>
        
        
        <!-- </div> -->
      </div>
    </div>
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink w3-light-grey" onclick="openTab(event,'Screen')">Screen</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Diagnose')">Diagnose</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Lab')">Lab</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Drug')">Drug</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Appointment')">Appointment</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'History')">History</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Note')">Note</button>
    </div>

    <div id="Screen" class="w3-container w3-display-container w3-light-grey tab">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Screen :: ซักประวัติ</h2>
      <form id="form-detail">
        <div class="w3-row-padding" style="padding-top: 10px">
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>BW :</label>
          </div>
          <div class="w3-col s12 m11 l3" style="padding-top: 10px">
            <input class="w3-input w3-border" type="text" name="weight" value="<?=$data['visitInfo']['weight']?>">
          </div>
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>HEIGHT :</label>
          </div>
          <div class="w3-col s12 m11 l3" style="padding-top: 10px">
            <input class="w3-input w3-border" type="text" name="weight" value="<?=$data['visitInfo']['height']?>">
          </div>
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>WAIST :</label>
          </div>
          <div class="w3-col s12 m11 l3" style="padding-top: 10px">
            <input class="w3-input w3-border" type="text" name="weight" value="<?=$data['visitInfo']['waist']?>"> 
          </div>
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>TEMP :</label>
          </div>
          <div class="w3-col s12 m11 l3" style="padding-top: 10px">
            <input class="w3-input w3-border" type="text" name="weight" value="<?=$data['visitInfo']['temperature']?>"> 
          </div>
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>PULSE :</label>
          </div>
          <div class="w3-col s12 m11 l3" style="padding-top: 10px">
            <input class="w3-input w3-border" type="text" name="weight" value="<?=$data['visitInfo']['pulse']?>"> 
          </div>
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>BP :</label>
          </div>
          <div class="w3-col s12 m11 l3" style="padding-top: 10px">
            <input class="w3-input w3-border" type="text" name="weight" value="<?=$data['visitInfo']['pressure']?>"> 
          </div>
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>CC : </label>
          </div>
          <div class="w3-col m11" style="padding-top: 10px">
            <textarea class="w3-input w3-border"><?=$data['visitInfo']['symptoms']?></textarea>
          </div>
          <div class="w3-col s12 m1" style="padding-top: 10px">
            <label>HPI : </label>
          </div>
          <div class="w3-col m11" style="padding-top: 10px">
            <textarea class="w3-input w3-border"><?=$data['visitInfo']['symptomsco']?></textarea>
          </div>
        </div>
      </form>
      <br>
    </div>
    <div id="Diagnose" class="w3-container w3-display-container w3-light-grey tab" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Diagnose :: การวินิจฉัยโรค</h2>
      <div class="w3-responsive">
        <table class="w3-table-all w3-hoverable" id="table-diagnose" width="100%">
          <thead>
          <tr class="w3-grey">
            <th>ที่</th>
            <th>Diag Code</th>
            <th>Diag Name</th>
            <th>Diag Type</th>
            <th>คำอธิบาย</th>
            <th>แพทย์</th>
          </tr>
        </thead>
        </table>
      </div>
    <br>
    </div>
    <div id="Lab" class="w3-container w3-display-container w3-light-grey tab" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Lab Items :: รายการตรวจทางห้องปฏิบัติการ</h2>
      <div class="w3-responsive">
        <table class="w3-table-all w3-hoverable" id="table-lab" width="100%">
          <thead>
          <tr class="w3-grey">
            <th>ที่</th>
            <th>Lab Code</th>
            <th>ชื่อรายการตรวจ</th>
            <th>ผลการตรวจ</th>
            <th>ค่าต่ำ - ค่าสูงสุด</th>
            <th>ราคา</th>
          </tr>
        </thead>
        </table>
      </div> 
    <br>
    </div>
    <div id="Drug" class="w3-container w3-display-container w3-light-grey tab" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Drug :: รายการยา</h2>
      <div class="w3-responsive">
        <table class="w3-table-all w3-hoverable" id="table-drug" width="100%">
          <thead>
          <tr class="w3-grey">
            <th>ที่</th>
            <th>ชื่อยา</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>ราคารวม</th>
            <th>ผู้จ่ายยา</th>
          </tr>
        </thead>
        </table>
      </div>
    <br>
    </div>
    <div id="Appointment" class="w3-container w3-display-container w3-light-grey tab" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Appointment :: การนัดหมาย</h2>
      <div class="w3-responsive">
        <table class="w3-table-all w3-hoverable" id="table-appointment" width="100%">
          <thead>
          <tr class="w3-grey">
            <th>ที่</th>
            <th>วันที่ - เวลา(นัด)</th>
            <th>ประเภทการนัด</th>
            <th>Diag</th>
            <th>คำแนะนำ</th>
            <th>ผู้นัด</th>
            <th>จัดการ</th>
          </tr>
        </thead>
        </table>
      </div>
    <br>
    </div>
    <br>
    <div id="History" class="w3-container w3-display-container w3-light-grey tab" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>History</h2>
      <p>==== COMING SOON ====</p> 
    </div>
    <div id="Note" class="w3-container w3-display-container w3-light-grey tab" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h2>Note</h2>
      <p>==== COMING SOON ====</p>
    <br>
    </div>
  </div>

  <script>
      function openTab(event,tabName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }

        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" w3-light-grey", "");
        }
        document.getElementById(tabName).style.display = "block"; 
        event.currentTarget.className += " w3-light-grey"; 
      }
    </script>

<script type="text/javascript">
  $(document).ready(function() {
    let visitno = $("#visitno").val()
    var t_dx = $('#table-diagnose').DataTable( {
      "ajax":           '<?=BASEURL?>/api/diagnose/'+visitno,
      "scrollCollapse": false,
      "paging":         false,
      "bFilter":        false,
      "columns": [
      { "data":  null},
      { "data": "diagcode" },
      { "data": "diseasename" },
      { "data": "dxtype" },
      { "data": "dxtypedesc" },
      { "data": "doctordiag" }
      ]
    });

    t_dx.on( 'draw.dt', function () {
      var PageInfo = $('#table-diagnose').DataTable().page.info();
      t_dx.column(0, { page: 'current' }).nodes().each( function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
    });

    var t_lab = $('#table-lab').DataTable( {
      "ajax":           '<?=BASEURL?>/api/lab/'+visitno,
      "scrollCollapse": false,
      "paging":         false,
      "bFilter":        false,
      "columns": [
      { "data":  null},
      { "data": "labcode" },
      { "data": "labname" },
      { "data": "labresultdigit" },
      { "data": "minstdf" },
      { "data": "labprice" }
      ]
    });

    t_lab.on( 'draw.dt', function () {
      var PageInfo = $('#table-lab').DataTable().page.info();
      t_lab.column(0, { page: 'current' }).nodes().each( function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
    });

    var t_drug = $('#table-drug').DataTable( {
      "ajax":           '<?=BASEURL?>/api/drug/'+visitno,
      "scrollCollapse": false,
      "paging":         false,
      "bFilter":        false,
      "columns": [
      { "data":  null},
      { "data": "drugname" },
      { "data": "unit" },
      { "data": "costprice" },
      { "data": null ,
          render: function ( data, type, row ) {
              return row.unit * row.costprice;
          } },
      { "data": "doctor1" }
      ]
    });

    t_drug.on( 'draw.dt', function () {
      var PageInfo = $('#table-drug').DataTable().page.info();
      t_drug.column(0, { page: 'current' }).nodes().each( function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
    });

    var t_appointment = $('#table-appointment').DataTable( {
      "ajax":           '<?=BASEURL?>/api/appointment/'+visitno,
      "scrollCollapse": false,
      "paging":         true,
      "bFilter":        false,
      "columns": [
        { "data": null},
        { "data": "appotime" ,
          render: function ( data, type, row ) {
              return (data == null) ? row.appodate +' 08:30' : row.appodate +' '+row.appotime;
          }
        },
        { "data": "appointypename" },
        { "data": "diagcode" },
        { "data": "comment" },
        { "data": "fname" },
        { "data": "visitno" ,
         "render": function(data, type, row, meta){
            if(type === 'display'){
                data = '<a href="<?=BASEURL?>/prints/appointment/' + data + '" class="w3-button w3-black w3-hover-red"><i class="fa fa-print w3-margin-right"></i> พิมพ์ใบนัด</a>';
              }
            return data;
            }
        }
      ]
    });

    t_appointment.on( 'draw.dt', function () {
      var PageInfo = $('#table-appointment').DataTable().page.info();
      t_appointment.column(0, { page: 'current' }).nodes().each( function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
    });

  });
</script>


