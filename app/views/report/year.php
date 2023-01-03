<style type="text/css">
  @media print {
    @page {size: landscape;}

    body *{ visibility: hidden; }
    #print-area { 
      visibility: visible; 
      /*border: 1px solid ;*/
      margin-left: -280px;
    }
    #print-area * { 
      visibility: visible; 
      font-size: 10px; 
    }
    .btn {display: none}


}
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">            
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div id="print-area">
                    <h2><center><?=$data['pageTitle']?></center></h2>
                    <p class="card-description"></p>
                    <!-- <div class="table-responsive"> -->
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th width="80px">ลำดับที่</th>
                            <th width="120px">เกณฑ์</th>
                            <th width="150">ชื่อตัวชี้วัด</th>
                            <th width="100px">ตุลาคม</th>
                            <th width="100px">พฤศจิกายน</th>
                            <th width="100px">ธันวาคม</th>
                            <th width="100px">มกราคม</th>
                            <th width="100px">กุมภาพันธ์</th>
                            <th width="100px">มีนาคม</th>
                            <th width="100px">เมษายน</th>
                            <th width="100px">พฤษภาคม</th>
                            <th width="100px">มิถุนายน</th>
                            <th width="100px">กรกฎาคม</th>
                            <th width="100px">สิงหาคม</th>
                            <th width="100px">กันยายน</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; foreach ( $data['reportAnnaul'] as $kpiReport ) : ?>
                          <tr>
                            <td><span><?=$i++?></span></td>
                            <td><span><?=$kpiReport['kpiSymbol'];?> <?=$kpiReport['kpiGoal'];?></span></td>
                            <td>
                              <span style="text-align: left; line-height: 1.5; color: red"><?=$kpiReport['kpiName'];?></span>
                              <!-- <br>
                              <span style="text-align: left; line-height: 1.5">ตัวตั้ง : <?=$kpiReport['kpiInput'];?></span><br>
                              <span style="text-align: left; line-height: 1.5">ตัวหาร : <?=$kpiReport['kpiOutput'];?></span> -->
                            </td>
                            <td><?=empty($kpiReport['October'])   ? '-' : $kpiReport['October'].'%';?></td>
                            <td><?=empty($kpiReport['November'])  ? '-' : $kpiReport['November'].'%';?></td>
                            <td><?=empty($kpiReport['December'])  ? '-' : $kpiReport['December'].'%';?></td>
                            <td><?=empty($kpiReport['January'])   ? '-' : $kpiReport['January'].'%';?></td>
                            <td><?=empty($kpiReport['February'])  ? '-' : $kpiReport['February'].'%';?></td>
                            <td><?=empty($kpiReport['March'])     ? '-' : $kpiReport['March'].'%';?></td>
                            <td><?=empty($kpiReport['April'])     ? '-' : $kpiReport['April'].'%';?></td>
                            <td><?=empty($kpiReport['May'])       ? '-' : $kpiReport['May'].'%';?></td>
                            <td><?=empty($kpiReport['June'])      ? '-' : $kpiReport['June'].'%';?></td>
                            <td><?=empty($kpiReport['July'])      ? '-' : $kpiReport['July'].'%';?></td>
                            <td><?=empty($kpiReport['August'])    ? '-' : $kpiReport['August'].'%';?></td>
                            <td><?=empty($kpiReport['September']) ? '-' : $kpiReport['September'].'%';?></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <br>
                      <a href="<?=BASEURL?>/reports/" class="btn btn-outline-danger">กลับ</a>
                      <a href="javascript:window.print()" class="btn btn-outline-danger">พิมพ์รายงาน</a>

                    <!-- </div> -->
                  </div>
                </div>
              </div>
            </div>

          </div>      
        </div>
        <!-- content-wrapper ends -->
