
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?=BASEURL?>/assets/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/assets/css/login.css">
<!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Kanit|Mitr" rel="stylesheet">
    <style type="text/css">
       /*h1, h2, h3, h4 ,h5, h6, p, span, ul> li> a, button, input{ font-family: 'Kanit', sans-serif;}  */
       .label-input100{ font-family: 'Kanit', sans-serif;} 
       .txt1, .message{ font-family: 'Kanit', sans-serif;}  
       .login100-form-btn{ font-family: 'Kanit', sans-serif; font-size: 20px} 
       .login100-form-title{ font-family: 'Kanit', sans-serif;}
       .modal-content{ font-family: 'Kanit', sans-serif;}
    </style>
    <script src="<?=BASEURL?>/assets/js/jquery-3.5.1.js"></script>

</head>
<body style="background-color: #666666; ">
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="margin-top: -50px">
                <div class="login100-form validate-form" style="background-color: #fcfcfc" id="form-auth">
                    <div class="login100-form-title p-b-43">
                        <img src="<?=BASEURL?>/assets/images/logo.png" width="150px">
                    </div>
                    <span class="login100-form-title p-b-43">
                        โรงพยาบาลบาเจาะ <br>
                        Bacho Hospital Web Portal
                    </span>
                    
                    <center><p id="txt-message" style="color: red; font-size: 20px; padding-bottom:"  class="message"></p></center>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" id="username">
                        <!-- <span class="focus-input100"></span> -->
                        <span class="label-input100">ชื่อบัญชี</span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" id="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">รหัสผ่าน</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1" data-toggle="modal" data-target="#exampleModalCenter">
                                ลืมรหัสผ่าน?
                            </a>
                        </div>
                    </div>
            

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="btn-auth">
                            เข้าสู่ระบบ
                        </button>
                    </div>
                </div>
                    
                <!-- </form> -->

                <div class="login100-more" style="background-image: url('<?=BASEURL?>/assets/images/bg-04.jpg');">
                </div>
            </div>
        </div>
    </div>
    
<script type="text/javascript">
    $("#btn-auth").click(function(){
        // let form_auth = $("#form-auth").serialize()
        let username = $("#username").val()
        let password = $("#password").val()
        console.log(username)
    
        $.ajax({
            type:'POST',
            url: '<?=BASEURL?>/auth/login',
            data:{
                username:username,
                password:password
            },
            success:function(data){
                let res = data
                console.log(res)
                if (res.success) {
                    location.replace('<?=BASEURL?>/dashboard')
                }
                else{
                    console.log("ERR!")
                    $("#txt-message").text(res.message)
                }
            }
        })
    })
</script>

</body>
</html>