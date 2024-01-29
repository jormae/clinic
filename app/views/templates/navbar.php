<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="<?=BASEURL?>/dashboard" class="w3-bar-item w3-button w3-wide"><?=SYSTEM_NAME?></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <div class="w3-dropdown-hover">
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-list-alt"></i> จุดบริการ</a>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="margin-top: 58px;">
          <!-- <a href="<?=BASEURL?>/dept/reg" class="w3-bar-item w3-button">ห้องบัตร</a>
          <a href="<?=BASEURL?>/dept/screen1" class="w3-bar-item w3-button">ซักประวัติ</a>
          <a href="<?=BASEURL?>/dept/screen2" class="w3-bar-item w3-button">หน้าห้องตรวจ</a>
          <a href="<?=BASEURL?>/dept/drug" class="w3-bar-item w3-button">ห้องยา</a> -->
          <!-- <a href="<?=BASEURL?>/dept/doctor" class="w3-bar-item w3-button">ห้องตรวจ</a> -->
          <a href="<?=BASEURL?>/dept/lab" class="w3-bar-item w3-button">ห้องแล็บ</a>
        </div>
      </div>
<!--       <div class="w3-dropdown-hover">
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-users"></i> ทะเบียนผู้ป่วย</a>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="margin-top: 58px;">
          <a href="<?=BASEURL?>/patient/ht" class="w3-bar-item w3-button"><i class="fa fa-address-book"></i> คลินิคความดัน</a>
          <a href="<?=BASEURL?>/patient/dm" class="w3-bar-item w3-button"><i class="fa fa-user"></i> คลินิคเบาหวาน</a>
          <a href="<?=BASEURL?>/patient/anc" class="w3-bar-item w3-button"><i class="fa fa-bank"></i> คลินิคมารดา</a>
        </div>
      </div> -->
      <!-- <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a>
      <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> รายงาน</a> -->
<!--       <div class="w3-dropdown-hover">
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-database"></i> ข้อมูล</a>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="margin-top: 58px;">
          <a href="<?=BASEURL?>/person" class="w3-bar-item w3-button"><i class="fa fa-address-book"></i> ข้อมูลประชากร</a>
          <a href="<?=BASEURL?>/user" class="w3-bar-item w3-button"><i class="fa fa-user"></i> ข้อมูลผู้ใช้</a>
          <a href="<?=BASEURL?>/org" class="w3-bar-item w3-button"><i class="fa fa-bank"></i> ข้อมูลองค์กร</a>
        </div>
      </div> -->
      <div class="w3-dropdown-hover">
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user-circle-o"></i> <?=$_SESSION['fullname']?></a>
        <div class="w3-dropdown-content w3-bar-block w3-border" style="margin-top: 58px;">
          <!-- <a href="<?=BASEURL?>/profile" class="w3-bar-item w3-button">บัญชีผู้ใช้</a> -->
          <a href="<?=BASEURL?>/auth/logout" class="w3-bar-item w3-button">ออกจากระบบ</a>
        </div>
      </div>
    </div>

    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

</div>