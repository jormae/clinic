      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup" id="alarmmsg">
              <?=$msg?>
            </div>
          <div class="row">
            
          	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>รายชื่อ<?=$data['pageTitle']?>ทั้งหมด</h2>
                  <p class="card-description">
                    <!-- <a href="#" class="btn btn-inverse-success btn-fw" data-toggle="modal" data-target="#myModal">เพิ่มหน่วยงานใหม่</a> -->
                    <!-- <code>.table-striped</code> -->
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped" id="example">
                      <thead>
                        <tr>
                          <th>ลำดับที่</th>
                          <th>เลขที่บัตรประชาชน</th>
                          <th>ชื่อ-สกุล</th>
                          <th>สถานะ</th>
                          <th>จัดการ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; foreach ( $data['staff'] as $staff ) : ?>
                        <tr>
                          <td><span><?=$i++?></span></td>
                          <td><?php $staffCid = $staff['staffCid']; echo $staffCid;?><input type="hidden" id="staffCid" value="<?=$staff['staffCid'];?>"></td>
                          <td><?php $staffFullname = $staff['staffFullname']; echo $staffFullname; ?><input type="hidden" id="staffFullname" value="<?=$staff['staffFullname'];?>"></td>
                          <td><span><?php if($staff['staffStatus']==1){echo "เปิด";}else{echo "ปิด";} ?></span></td>
                          <td> 
                            <button type="submit" class="btn btn-outline-success" onclick="insertStaffInfo(<?=$staffCid?>,'<?=$staffFullname?>')">นำข้อมูลเข้าระบบ</button>
                          </td>
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
        <!-- content-wrapper ends -->

<script type="text/javascript">



  function insertStaffInfo(staffCid, staffFullname)
  {
    // var staffCid      = document.getElementById('staffCid').value;
    // var staffFullname = document.getElementById('staffFullname').value;

    var x = confirm("กรุณายืนยันการรนำเข้าข้อมูลบุคลากร");

    if (x == true) {
      $.ajax({
        type:"POST",
        url: "<?=BASEURL?>/staff/insert/",
        data:{
          staffCid:staffCid,
          staffFullname:staffFullname,
          staffStatus:1
        },
        cache:false,
        // success: function(data){
        //     alert("นำข้อมูลบุคลากรเข้าสู่ระบบเรียบร้อยแล้ว");
        //     window.location = "<?=BASEURL?>/staff/";          
        // }
        success: function (data) {
          var msg = '<div class="col-12">'+
              '<span class="d-block d-md-flex align-items-center">'+
                '<p>นำเข้าข้อมูลบุคลากรสำเร็จ.</p>'+
                '<i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>'+
              '</span>'+
            '</div>';
          document.getElementById("alarmmsg").innerHTML = msg;
          setTimeout(function () {
             window.location = "<?=BASEURL?>/staff/"; //will redirect to your blog page (an ex: blog.html)
          }, 2000); //will call the function after 2 secs.
          // alert(data);             

        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
      });
    }
    return false;
  }
</script>