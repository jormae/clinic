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
            <h4>รายงานรายการมูลค่าการจัดซื้อและมูลค่าการบริโภคทั้งหมด</h4>
            <h5><?//=$deptName?></h5>
            <h5><?=$data['stockInfo']['stockName']?> โรงพยาบาลบาเจาะ</h5>
            <h5>ประจำเดือน <?=$data['thMonth']?></h5>
          </center>

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>ที่</th>
                <th>Serial No.</th>
                <th>รายการวัสดุ</th>
                <th>ราคาต่อหน่วย</th>
                <th>รายรับจำนวน</th>
                <th>ราคา (บาท)</th>
                <th>รายจ่ายจำนวน</th>
                <th>ราคา (บาท)</th>
              </thead>
              <tbody>
                <?php 
                  $total_deposit = 0;
                  $total_expense = 0;
                  $i=1;
                  foreach ( $data['transactionItemsInfo'] as $rows ) : 
                ?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$rows['itemCode']?></td>
                  <td><?=$rows['itemName']?></td>
                  <td><?=$rows['priceIncVat']?></td>
                  <td><?=$rows['STOCK_QUANTITY_PURCHASE']?></td>
                  <td><?=$rows['TOTAL_PRICE_PURCHASE']?> <?php $total_deposit += $rows['TOTAL_PRICE_PURCHASE'] ?></td>
                  <td><?=$rows['STOCK_QUANTITY_DISPENSE']?></td>
                  <td><?=$rows['TOTAL_PRICE_DISPENSE']?><?php $total_expense += $rows['TOTAL_PRICE_DISPENSE'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="text-danger">
                  <td colspan="4"></td>
                  <td>จำนวนเงิน</td>
                  <td><?=number_format($total_deposit, 2, '.', ',');?></td>
                  <td>จำนวนเงิน</td>
                  <td><?=number_format($total_expense, 2, '.', ',');?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    
  </div>
</div>

   <!-- modal transaction records -->
  <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="title title-up"><?=SYSTEM_NAME?></h5>
        </div>
        <div class="modal-body">
          <div class="typography-line">
              <span>ID</span>
              <span class="text-danger" id="transactionId" style="margin-left: 120px"></span>
          </div>
          <div class="row">
            <label class="col-md-2 col-form-label">ชื่อผู้ขอเบิก</label>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control select" id="requestBy">
              </div>
            </div>
            <label class="col-md-2 col-form-label">วันที่ขอเบิก</label>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control select" id="transactionDateTime">
              </div>
            </div>
          </div>
          <div class="row">
           <label class="col-md-2 col-form-label">ชื่อผู้จ่าย</label>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control select" id="deliveryBy">
              </div>
            </div>
            <label class="col-md-2 col-form-label">วันที่จ่าย</label>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control select" id="deliveryDateTime">
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table" id="data-list">
              <thead class=" text-primary">
                <th>ที่</th>
                <th>รหัสวัสดุ</th>
                <th>ชื่อพัสุด</th>
                <th>จำนวนขอเบิก</th>
                <th>จำนวนจ่าย</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="btn-cancel" data-dismiss="modal">ปิด</button>
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
