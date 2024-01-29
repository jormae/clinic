<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white w3-col s5" style="padding:48px">
    <p><center><img src="<?=BASEURL?>/img/logo.png" width="100px"></center></p>
    <p><center><?=ORG_NAME?></center></p>
    <p><center><?=ORG_ADDRESS?></center></p>
    <br>
      <div class="w3-row">
        <div class="w3-col s3">
          <i class="fa fa-user fa-fw w3-xxlarge w3-margin-right"></i>
        </div>
        <div class="w3-col s9">
          <input class="w3-input w3-border" type="text" placeholder="ชื่อบัญชี" id="username">
        </div>
      </div>
      <div class="w3-row" style="padding: 10px 0">
        <div class="w3-col s3">
          <i class="fa fa-lock fa-fw w3-xxlarge w3-margin-right"></i>
        </div>
        <div class="w3-col s9">
          <input class="w3-input w3-border" type="password" placeholder="รหัสผ่าน" id="password">
        </div>
      </div>
      <div class="w3-row" style="padding: 10px 0">
        <button class="w3-button w3-black w3-right" id="btn-login" >
          <i class="fa fa-sign-in"></i> เข้าสู่ระบบ
        </button>
      </div>
  </div>
</header>
<script type="text/javascript">
  $("#btn-login").click(function(){
        // let form_auth = $("#form-auth").serialize()
        let username = $("#username").val()
        let password = $("#password").val()
        console.log(username)
        console.log('<?=BASEURL?>')
    
        $.ajax({
            type:'POST',
            url: '<?=BASEURL?>/auth/login',
            data:{
                username:username,
                password:password
            },
            success:function(data){
              console.log(data)
                let res = data
                if (res.success) {
                    location.replace('<?=BASEURL?>/dept/lab')
                }
                else{
                    console.log("ERR!")
                    $("#txt-message").text(res.message)
                }
            }
        })
    })
</script>
