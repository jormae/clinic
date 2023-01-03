      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2><?=$data['pageTitle']?> <?=$data['reportSubmission'][0]['kpiYearMonth']?> </h2>
                  <p class="card-description"></p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ลำดับที่</th>
                          <th>หน่วยงาน</th>
                          <th>เดือน</th>
                          <th>ตัวชี้วัดทั้งหมด</th>
                          <th>ค่าตัวชี้วัดที่คีย์</th>
                          <th>ค่าตัวชี้วัดที่ไม่คีย์</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; foreach ( $data['reportSubmission'] as $report ) : ?>
                        <tr>
                          <td><span><?=$i++?></span></td>
                          <td><span><?=$report['kpiDeptName'];?></span></td>
                          <td><span><?=$report['kpiYearMonth'];?></span></td>
                          <td><span><?=$report['TOTAL_KPI'];?></span></td>
                          <td><span><?=$report['TOTAL_KEY'];?></span></td>
                          <td><span><?=$report['TOTAL_UNKEY'];?></span></td>
                        </tr>
                        <?php endforeach;  ?>

                        <?php $i = 1; foreach ( $data['reportUnsubmission'] as $report ) : ?>
                        <tr style="color: red">
                          <td><span><?=$i++?></span></td>
                          <td><span><?=$report['kpiDeptName'];?></span></td>
                          <td><span><?=$report['kpiYearMonth'];?></span></td>
                          <td><span><?=$report['TOTAL_KPI'];?></span></td>
                          <td><span><?=$report['TOTAL_KEY'];?></span></td>
                          <td><span><?=$report['TOTAL_UNKEY'];?></span></td>
                        </tr>
                        <?php endforeach;  ?>

                      </tbody>
                    </table>
                    <br>
                    <a href="<?=BASEURL?>/reports/" class="btn btn-outline-danger">กลับ</a>

                  </div>
                </div>
              </div>
            </div>

          </div>      
        </div>
        <!-- content-wrapper ends -->
