      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">                  
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ค้นหารายงานตัวชี้วัด</h4>
                  <div class="row">
                      <!-- <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">หน่วยงาน</label>
                          <div class="col-sm-8">
                            <select class="form-control" id="kpiDeptId" name="kpiDeptId">
                              <option value="">กรุณาเลือกหน่วยงาน</option>
                              <?php foreach ( $data['kpidept'] as $kpidept ) : ?>
                              <option value="<?=$kpidept['kpiDeptId']?>"  <?php if($kpidept['kpiDeptId']==$data['dept']['kpiDeptId']){echo "selected='selected'";} ?> ><?=$kpidept['kpiDeptName']?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div> -->
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">รายงาน</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="reportNo" name="reportNo">
                              <option value="">กรุณาเลือกรายงาน</option>
                              <option value="01">รายงานผลตัวชีวัดทั้งหมด</option>                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">ปีงบประมาณ</label>
                          <div class="col-sm-8">
                            <select class="form-control" id="year" name="year">
                              <option value="">กรุณาเลือกปี</option>
                              <?php $nextYear=date('Y')+1; for($strYear=2018;$strYear<=$nextYear;$strYear++){ ?>
                              <option value="<?=$strYear?>"><?=$strYear+543?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group row">
                          <label class="col-sm-12">
                            <button class="btn btn-outline-danger" onclick="submitYearMonthInfo()">แสดง</button>
                            <!-- <button class="btn btn-outline-danger" type="submit">แสดง</button> -->
                          </label>
                        </div>
                      </div>
                    </div>                    
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

<script type="text/javascript">

    function submitYearMonthInfo(){
    var year      = document.getElementById('year').value;
    var reportNo  = document.getElementById('reportNo').value;
    
    if (year == "") {
      alert('กรุณาเลือกปีงบประมาณ');
      return false;
    }
    else if(reportNo == ""){
      alert('กรุณาเลือกเดือนรายงาน');
      return false;
    }
    else{

          $.ajax({
            type:"POST",
            url:"<?=BASEURL?>/reports/annual/"+reportNo+"/"+year,
            data:{
              reportNo:reportNo,
              year:year
            },
            cache:false, 
            success: function(data){
              
              // console.log(this.url)
               window.location = this.url;
             
            }
          });
        }
  }
</script>
