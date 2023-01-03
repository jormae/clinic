<div class="content">
  <div class="row">
    <span id="msg"></span>
    <div class="col-md-12">
      <div class="row">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> <?=$data['pageTitle']?></h4>
              <a href="<?=BASEURL?>/company/<?=$data['stockInfo']['stockId']?>" class="btn btn-sm btn-danger pull-right">กลับ</a>
            </div>
            <div class="card-body">
              <form id="companyForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group  has-label" id="input-companyName">
                    <label>ชื่อบริษัท</label>
                    <input type="text" class="form-control" placeholder="ชื่อบริษัท" id="companyName" value="<?=$data['companyInfo']['companyName']?>"  required="true">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group  has-label" id="input-companyName">
                    <label>ชื่อผู้ขาย</label>
                    <input type="text" class="form-control" placeholder="ชื่อผู้ขาย" id="saleName" value="<?=$data['companyInfo']['saleName']?>"  required="true">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-label">
                    <label>โทรศัพท์</label>
                    <input type="text" class="form-control" placeholder="โทรศัพท์" id="telephoneNo" value="<?=$data['companyInfo']['telephoneNo']?>"  required="true">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-label">
                    <label>อีเมล</label>
                    <input type="email" class="form-control" placeholder="อีเมล" id="email" value="<?=$data['companyInfo']['email']?>" required="true">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-label">
                    <label>ที่อยู่</label>
                    <textarea rows="4" cols="80" class="form-control" placeholder="ที่อยู่" id="address"> <?=$data['companyInfo']['address']?></textarea>
                  </div>
                </div>
              </div>
              </form>
            </div>
            <div class="card-footer ">
              <hr>
              <button class="btn btn-sm btn-danger" id="btn-save"><i id="loader"></i> บันทึก</button>
              <input type="hidden" id="stockId" value="<?=$data['stockInfo']['stockId']?>">
              <input type="hidden" id="companyId" value="<?=$data['companyInfo']['companyId']?>">
              <input type="hidden" id="insertedAt" value="<?=$data['companyInfo']['insertedAt']?>">
              <a href="<?=BASEURL?>/company/<?=$data['stockInfo']['stockId']?>" class="btn btn-sm btn-danger">ยกเลิก</a>
            </div>
          </div>
    </div>
  </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->
<script>
 function setFormValidation(id){
    $(id).validate({
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
        },
        success: function(element) {
            $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
        },
        errorPlacement : function(error, element) {
            $(element).append(error);
        },
    });
  }

  $(document).ready(function() {
    setFormValidation('#companyForm');
    // setFormValidation('#TypeValidation');
    // setFormValidation('#LoginValidation');
    // setFormValidation('#RangeValidation');
  });
</script>
<script type="text/javascript">


  $("#btn-save").click(function() {
    let stockId       = $('#stockId').val()
    let companyId     = $('#companyId').val()
    let companyName   = $('#companyName').val()
    let saleName      = $('#saleName').val()
    let telephoneNo   = $('#telephoneNo').val()
    let email         = $('#email').val()
    let address       = $('#address').val()
    let insertedAt    = $('#insertedAt').val()

    //  function setFormValidation(id){
    //     $(id).validate({
    //         highlight: function(element) {
    //             $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
    //             $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
    //         },
    //         success: function(element) {
    //             $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
    //             $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
    //         },
    //         errorPlacement : function(error, element) {
    //             $(element).append(error);
    //         },
    //     });
    //   }
      
    // setFormValidation('#companyForm');
    if(!companyName){
      $.notify({
            icon: 'https://img.icons8.com/color/48/000000/user-female-circle.png',
            title: '<?=SYSTEM_NAME?>',
            message: 'กรุณาใส่ข้อมูลให้ครบทถ้วนสมบูรณ์'
          },
          {
            type: 'danger',
            delay: 10000,
            icon_type: 'imgae',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert" style="padding-left:-20px">' +
              '<img data-notify="icon" class="img-circle pull-left">' +
              '<span data-notify="title" style="font-size:1.0rem">{1}</span>' +
              '<p data-notify="message">{2}</p>' +
            '</div>'
          })

      $('#companyName').focus();
      $("#input-companyName").addClass("has-error");
    }
    else{

      $("#loader").addClass("fa fa-spinner fa-spin");
      $("input").prop('disabled', true);
      $("textarea").prop('disabled', true);
      $("#btn-save").prop('disabled', true);

      let uri
      if (companyId) {
        uri = '<?=BASEURL?>/company/update/'+companyId
      }
      else{
        uri = '<?=BASEURL?>/company/insert/'
      }
      $.ajax({
        type:'POST',
        url: uri,
        data:{
          stockId:stockId,
          companyId:companyId,
          companyName:companyName,
          saleName:saleName,
          telephoneNo:telephoneNo,
          email:email,
          address:address,
          insertedAt:insertedAt
        },
        cache:false,
        success:function(data){
          // console.log(html)
          let response = JSON.parse(data)
          console.log(response)
          $.notify({
            icon: 'https://img.icons8.com/color/48/000000/user-female-circle.png',
            title: '<?=SYSTEM_NAME?>',
            message: response.message
          },
          {
            type: 'danger',
            delay: 10000,
            icon_type: 'imgae',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert" style="padding-left:-20px">' +
              '<img data-notify="icon" class="img-circle pull-left">' +
              '<span data-notify="title" style="font-size:1.0rem">{1}</span>' +
              '<p data-notify="message">{2}</p>' +
            '</div>'
          })

          if (response.action == 'insert') {
            $('#companyName').focus()
            $('#companyName').val('')
            $('#telephoneNo').val('')
            $('#email').val('')
            $('#address').val('')
          }
          
          $("#loader").removeClass("fa fa-spinner fa-spin");
          $("input").prop('disabled', false);
          $("textarea").prop('disabled', false);
          $("#btn-save").prop('disabled', false);

        }
      })
    }
  })

 
</script>
