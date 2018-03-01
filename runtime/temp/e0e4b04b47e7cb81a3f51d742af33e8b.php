<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"D:\wamp64\www\zerg/application/admin\view\login.html";i:1506561574;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit"> 
    <title>上海禾捷广告传媒有限公司管理系统 </title>
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css" rel="stylesheet">
    <link href="__CSS__/login.min.css" rel="stylesheet">
    
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7" style="color:#fff">
            <div class="signin-info">
                <div class="logopanel m-b">
                </div>
                <div class="m-b"></div>
                <h4>欢迎使用 <strong>上海禾捷广告传媒有限公司管理系统 </strong></h4>
                <ul class="m-b">

                </ul>
            </div>
        </div>
        <div class="col-sm-5" style="color:#fff">
            <form id="doLogin" name="doLogin" method="post" action="<?php echo url('doLogin'); ?>">
                <p class="m-t-md" id="err_msg">登录到后台</p>
                <input type="text" class="form-control uname" placeholder="用户名" id="username" name="username" />
                <input type="password" class="form-control pword m-b" placeholder="密码" id="password" name="password" />
                <?php if(config('verify_type') == 1): ?>
                    <div style="margin-bottom:70px">
                        <input type="text" class="form-control" placeholder="验证码" style="color:black;width:120px;float:left;margin:0px 0px;" name="code" id="code"/>
                        <img src="<?php echo url('checkVerify'); ?>" onclick="javascript:this.src='<?php echo url('checkVerify'); ?>?tm='+Math.random();" style="float:right;cursor: pointer"/>
                    </div>
                <?php else: ?>
                    <div id="embed-captcha"></div>
                    <p id="wait">正在加载验证码......</p>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary btn-block">登　录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left" style="color:#fff">
            &copy; 2017 上海禾捷广告传媒有限公司 . 
            <br>
            <<a href="http://www.bj-wang.com">标匠(昆山)科技网络有限公司</a>
        </div>
    </div>
</div>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/jquery.form.js"></script>
<script src="__JS__/layer/layer.js"></script>
<script src="__JS__/lunhui.js"></script>
 <script>
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };
   

    $(function(){
        $('#doLogin').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });
        
        function checkForm(){
            if( '' == $.trim($('#username').val())){           
                lunhui.error('请输入登录用户名');
                return false;
            }
     
            if( '' == $.trim($('#password').val())){
                lunhui.error('请输入登录密码');
                return false;
            }

            $("button").removeClass('btn-primary').addClass('btn-danger').text("登录中...");
        }


        function complete(data){
            if(data.code==1){
                lunhui.success(data.msg,data.url);
            }else{ 
                lunhui.error(data.msg);
                $("button").removeClass('btn-danger').addClass('btn-primary').text("登　录");       
                return false;   
            }
        }
    });


</script>
</body>
</html>