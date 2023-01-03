<!-- Header with full-height image -->
<!-- <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home"> -->
 <header class="w3-display-container w3-grayscale-min">
  <div class="w3-container">
    <br><br><br>
    <p class="w3-center w3-large">หน่วยงาน</p>
    <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
      <div class="w3-col l6 m12 w3-margin-bottom">
        <div class="w3-card w3-center w3-padding-large">
          <i class="fa fa-address-card-o" style="font-size: 80px;"></i>
          <div class="w3-container">
            <h3>ห้องบัตร</h3>
            <div class="w3-responsive">
              <table class="w3-table-all" id="table-lines">
                <thead>
                <tr>
                  <th>ที่</th>
                  <th>ชื่อไลน์กลุ่ม</th>
                  <th>สถานะ</th>
                  <th>จัดการ</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($data['linesInfo'] as $value) : ?>
                <tr>
                  <td><?=$i++;?></td>
                  <td><?=$value['lineGroupName']?></td>
                  <td><?=$value['isLineActive'] == 1 ? '<span class="w3-text-green">Active</span>' : '<span class="w3-text-red">In-active'?></span></td>
                  <td><a href="<?=BASEURL?>/system/line/<?=$value['lineId']?>" class="w3-button w3-border w3-grey">รายละเอียด</a></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="w3-col l6 m12 w3-margin-bottom">
       
        <div class="w3-card w3-center w3-padding-large">
          <i class="fa fa-comments" style="font-size: 80px;"></i>
          <div class="w3-container">
            <h3>จุดซักประวัติ</h3>
            <p class="w3-opacity">ซักประวัติ & ดูประวัติ</p>
            <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-paper-plane"></i> GO!</button></p>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</header>

