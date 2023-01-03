<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup" id="alarmmsg"></div>
          <div class="row">

            <div class="col-12 grid-margin">
              <form id="staffForm">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">ข้อมูล<?=$data['pageTitle']?></h2>
                  <button class="btn btn-light" onclick="window.location = '<?=BASEURL?>/staff/search/'">ค้นหา</button>

                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">เลขที่บัตรประชาชน</label>
                          <div class="col-sm-8">
                              <input type="number" class="form-control" id="staffCid" placeholder="เลขที่บัตรประชาชน" value="<?=$data['staff']['staffCid'];?>"  />  
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">ชื่อผู้รับผิดชอบตัวชี้วัด</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="staffFullname" placeholder="ชื่อผู้รับผิดชอบตัวชี้วัด" value="<?=$data['staff']['staffFullname'];?>"  />  
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">สถานะ</label>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="staffStatus" value="1" <?php if($data['staff']['staffStatus']==1){echo "checked='checked'";} ?>> เปิด
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="staffStatus" value="0" <?php if($data['staff']['staffStatus']==0){echo "checked='checked'";} ?>> ปิด
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                    
                <hr>
                  <button type="submit" class="btn btn-success mr-2" onclick="saveStaffInfo(<?=$data['staff']['staffId'];?>)">บันทึก</button>
                  <button class="btn btn-light" onclick="window.location = '<?=BASEURL?>/staff/'">ยกเลิก</button>
                </div>
                </form>
              </div>
            </div>

          </div>
        </div>


<script type="text/javascript">

  function getRadioValue(form, name) {
      var val;
      var radios = form.elements[name];
      
      for (var i=0, len=radios.length; i<len; i++) {
          if ( radios[i].checked ) { 
              val = radios[i].value; 
              break; 
          }
      }
      return val;
  }
  function saveStaffInfo(staffId) {

    var staffCid        = document.getElementById('staffCid').value;
    var staffFullname   = document.getElementById('staffFullname').value;
    var staffStatus     = getRadioValue(document.getElementById('staffForm'), 'staffStatus');

    if (staffCid == "") {
      alert("เลขที่บัตรประชาชน");
      return false;
    }
    else{
        // // AJAX code to submit form.
        if (!staffId) { //insert url
          var url ="<?=BASEURL?>/staff/insert/";
        }else{ //update url
          var url ="<?=BASEURL?>/staff/update/"+staffId;
        }

          $.ajax({
            type: "POST",
            url: url,
            data: {
              staffCid:staffCid, 
              staffFullname:staffFullname,
              staffStatus:staffStatus
            },
            cache: false,
              success: function(data) {
                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                window.location = "<?=BASEURL?>/staff/";  
              }
          });

       
      }
    }
      
</script>