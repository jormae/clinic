      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p><?='username : '.$data['session']['username'].' ชื่อ-สกุล : '.$data['session']['fullname'].' BHIP : '.$data['session']['bhip']?></p>
                <a class="btn ml-auto download-button d-none d-md-block" href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download Free Version</a>
                <a class="btn purchase-button mt-4 mt-md-0" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Upgrade To Pro</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <div class="row">            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>รายการตัวชี้วัดหน่วยงาน <?=$data['pageTitle']?> ประจำเดือน </h2>
                  <p class="card-description">
                    <!-- <a href="#" class="btn btn-inverse-success btn-fw" data-toggle="modal" data-target="#myModal">เพิ่มหน่วยงานใหม่</a> -->
                    <!-- <a href="<?=BASEURL?>/kpi/form" class="btn btn-inverse-success btn-fw">เพิ่ม<?=$data['pageTitle']?>ใหม่</a> -->
                    <!-- <code>.table-striped</code> -->
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ลำดับที่</th>
                          <th>ชื่อตัวชี้วัด</th>
                          <th>ค่าตัวชี้วัด</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php var_dump( $data['dashboard_overallkpi']); $i = 1; foreach ( $data['dashboard_overallkpi'] as $overallKpi ) : ?>
                        <tr>
                          <td><span><?=$i++?></span></td>
                          <td><span><?=$overallKpi['kpiName'];?></span></td>
                          <td><span><?=$overallKpi['kpiFinalValue'];?></span></td>
                        </tr>

                      <?php endforeach;  ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>

          </div>      
        </div>
        <!-- content-wrapper ends -->

<script type="text/javascript">
  function searchKPI()
  {
    var kpiDeptId = document.getElementById('kpiDeptId').value;
    var year      = document.getElementById('year').value;
    var month     = document.getElementById('month').value;
    var kpiYearMonth = year+'-'+month;
    console.log(kpiYearMonth);

    if (kpiDeptId == "") {
      alert("กรุณาเลือกหน่วยงาน");
      return false;
    }else if(year == ""){
      alert("กรุณาเลือกเดือน");
      return false; 
    }else if(month == ""){
      alert("กรุณาเลือกปี");
      return false; 
    }
    else{

      $.ajax({
            type: "POST",
            url: "<?=BASEURL?>/dashboard/search",
            // dataType: 'JSON',
            data: {
              kpiDeptId:kpiDeptId,
              kpiYearMonth:kpiYearMonth 
              // month:month,
              // year:year
            },
            cache: false,
            success: function(html) {
              console.log(html);
            }
          });
    }
  }
</script>