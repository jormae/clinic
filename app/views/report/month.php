<?php $thDate = new ThaiDate(); ?>
<input type="hidden" id="stockId" value="<?=$data['stockInfo']['stockId']?>">
<div class="content">
  <div class="row">
    <div class="col-md-4">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">ค้นหารายงานประจำเดือน - <small class="description">System Reports</small></h5>
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group  has-label" id="input-itemName">
                <label>รายงาน</label>
                <select class="form-control" id="reportId">
                  <option value="">กรุณาเลือกรายงาน</option>
                  <option value="01" <?= ($data['reportId'] == "01") ? "selected='selected'" : "" ?>>01 - รายงานสรุปการเบิก-จ่ายวัสดุ</option>
                  <option value="02" <?= ($data['reportId'] == "02") ? "selected='selected'" : "" ?>>02 - รายงานการเบิก-จ่ายวัสดุ</option>
                  <option value="03" <?= ($data['reportId'] == "03") ? "selected='selected'" : "" ?>>03 - รายงานสรุปการเบิก-จ่ายวัสดุแยกตามหน่วยงาน</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group has-label">
                <label>เดือน</label>
                <select class="form-control" id="month" name="month">
                  <option value="">กรุณาเลือกเดือน</option>
                  <option value="01" <?= ($data['month'] == "01") ? "selected='selected'" : "" ?>>มกราคม</option>
                  <option value="02" <?= ($data['month'] == "02") ? "selected='selected'" : "" ?>>กุมภาพันธ์</option>
                  <option value="03" <?= ($data['month'] == "03") ? "selected='selected'" : "" ?>>มีนาคม</option>
                  <option value="04" <?= ($data['month'] == "04") ? "selected='selected'" : "" ?>>เมษายน</option>
                  <option value="05" <?= ($data['month'] == "05") ? "selected='selected'" : "" ?>>พฤษภาคม</option>
                  <option value="06" <?= ($data['month'] == "06") ? "selected='selected'" : "" ?>>มิถุนายน</option>
                  <option value="07" <?= ($data['month'] == "07") ? "selected='selected'" : "" ?>>กรกฎาคม</option>
                  <option value="08" <?= ($data['month'] == "08") ? "selected='selected'" : "" ?>>สิงหาคม</option>
                  <option value="09" <?= ($data['month'] == "09") ? "selected='selected'" : "" ?>>กันยายน</option>
                  <option value="10" <?= ($data['month'] == "10") ? "selected='selected'" : "" ?>>ตุลาคม</option>
                  <option value="11" <?= ($data['month'] == "11") ? "selected='selected'" : "" ?>>พฤศจิกายน</option>
                  <option value="12" <?= ($data['month'] == "12") ? "selected='selected'" : "" ?>>ธันวาคม</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group has-label">
                <label>เดือน</label>
                <select class="form-control" id="year">
                  <option value="">กรุณาเลือกปี</option>
                  <?php $nextYear=date('Y')+1; for($strYear=2018;$strYear<=$nextYear;$strYear++){ ?>
                  <option value="<?=$strYear?>" <?= ($strYear == $data['year']) ? "selected='selected'" : "" ?>><?=$strYear+543?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <button class="btn btn-sm btn-danger" id="btn-search"><i id="loader"></i> ค้นหา</button>
          <input type="hidden" id="stockId" value="<?=$data['stockInfo']['stockId']?>">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">เบิก-จ่ายล่าสุด - <small class="description">Latest Transaction</small></h5>
        </div>
        <div class="card-body">
          <center>
            <h4>รายงานสรุปข้อมูลมูลค่าการจัดซื้อและมูลค่าการบริโภคทั้งหมด</h4>
            <h5><?//=$deptName?></h5>
            <h5><?=$data['stockInfo']['stockName']?> โรงพยาบาลบาเจาะ</h5>
            <h5>ประจำเดือน <?=$data['thMonth']?></h5>
          </center>
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>รายการ</th>
                <th>ยอดยกมา</th>
                <th>มูลค่าการจัดซื้อ</th>
                <th>มูลค่าบริโภคทั้งหมด</th>
                <th>คงเหลือ</th>
              </thead>
              <tbody>
                <tr>
                  <?php 
                    $remain_balance  = $data['sumInfo']['remainBalance'];
                    $total_purchase  = $data['sumInfo']['total_purchase'];
                    $total_dispense  = $data['sumInfo']['total_dispense'];
                    $total_balance   = $data['sumInfo']['total_balance']; 

                  ?>
                  <td>จำนวนเงิน (บาท)</td>
                  <td><?=number_format($remain_balance, 2, '.', ',');?></td>
                  <td><?=number_format($total_purchase, 2, '.', ',');?></td>
                  <td><?=number_format($total_dispense, 2, '.', ',');?></td>
                  <td><?=number_format($total_balance, 2, '.', ',');?></td>
                </tr>
                <tr>
                  <td colspan="5">มูลค่าคงคลัง = <?=number_format($total_balance, 2, '.', ',');?> บาท</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <?php if ($data['stockInfo']['stockId'] == 3) { ?>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ที่</th>
                  <th>สถานพยาบาล</th>
                  <th>จำนวนเงิน (บาท)</th>
                </thead>
                <tbody>
                  <?php 
                    $i=1; 
                    $totalClinicDispense = 0;
                    foreach ($data['clinicDispenseInfo'] as $row) : 
                  ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?=$row['DEPT_NAME'];?></td>
                      <td><?=number_format($row['TOTAL_PRICE'], 2, '.', ',');?> <?php $totalClinicDispense += $row['TOTAL_PRICE'];?></td>
                    </tr>
                  <?php endforeach; ?>
                  <tr>
                    <td colspan="2">รวม</td>
                    <td><?=number_format($totalClinicDispense, 2, '.', ',');?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php } ?>

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>บริษัท/ร้าน</th>
                <th>จำนวนเงิน (บาท)</th>
                <th>เลขที่บิล</th>
                <th>อนุมัติซื้อ</th>
                <th>อนุมัติจ่าย</th>
              </thead>
              <tbody>
                <?php foreach ( $data['purchaseInfo'] as $rows ) : ?>
                <tr>
                  <td><?=$rows['companyName']?></td>
                  <td><?=number_format($rows['totalPrice'], 2, '.', ',');?></td>
                  <td><?=$rows['billNo']?></td>
                  <td><?=$rows['approveRef']?> / <?=$thDate->thaiShortDate($rows['approveDate'])?></td>
                  <td><?=$rows['dispenseRef']?> / <?=$thDate->thaiShortDate($rows['dispenseDate'])?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    
  </div>
</div>



<script type="text/javascript">
  $("#btn-search").click(function(){
    let stockId   = $("#stockId").val();
    let reportId = $("#reportId").val();
    let month    = $("#month").val();
    let year     = $("#year").val();
    let yearMonth= year+'-'+month;
    let link     = "<?=BASEURL?>/reports/month/"+stockId+"/"+reportId+'/'+yearMonth

    $.ajax({
      type:"POST",
      url: link,
      data:{
        reportId:reportId,
        yearMonth:yearMonth
      },
      cache:false,
      success:function(data){
        // let respond = JSON.parse(data)
        // console.log(html)
        console.log(link)
        setTimeout(function() {
          window.location.replace(link);
        },1000)
        // console.log(this.data.yearMonth);
      }
    })
  })
</script>
