<?php defined('IN_WZ') or exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--让部分国产浏览器默认采用高速模式渲染页面,而非兼容模式-->
    <link rel="icon" href="../../favicon.ico">
    <title>找回密码</title>
    <!--cs-->
    <link type="text/css" rel="stylesheet" href="<?php echo R;?>member/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo R;?>css/login_style.css">
    <link href="<?php echo R;?>css/validform.css" rel="stylesheet">
    <!--js-->
    <script type="text/javascript" src="<?php echo R;?>member/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo R;?>member/js/bootstrap.js"></script>
    <script src="<?php echo R;?>js/validform.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.wuzhicms.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.wuzhicms.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div class="container login">
    <div class="verticalcenter">
        <div class="row">
            <div class="row" style="margin-left: 0px; margin-right: 0px;">
                <div class="col-xs-3 disanfang_ico" style="min-height: 530px;">
                    <div class="login-logo thumbnail" style="border-radius: 50%;" ><img  alt="Brand" src="<?php echo R;?>images/login-logo.png" class="img-circle" ></div>

                    <span style="color: #999999; font-size: 24px;"><span class="glyphicon glyphicon-phone color_heyilan" aria-hidden="true"></span> 重置密码</span><hr>
                    <span style="color: #999999">已是会员？<a style="color: #ba0600" href="index.php?m=member&amp;v=login">立即登录</a></span>
                </div>

                <div class="col-xs-9" style="margin-top: 60px">

                    <div class="typesbox" style="padding-left: 180px; padding-bottom: 36px;">
                        <ul class="nav nav-pills">
                            <li role="presentation" class="stypeclass "><a href="index.php?m=member&v=public_find_password_email"><span>邮箱重置密码</span></a></li>
                            <li role="presentation" class="stypeclass active"><a href="index.php?m=member&v=public_find_password_mobile"><span >手机重置密码</span></a></li>
                        </ul>
                    </div>

                    <div class="row">

                        <form action="" method="post" id="form-register" name="form-register" class="form-horizontal">
                            <input type="hidden" name="modelid" id="setmodelid" value="10">
                            <div class="form-group">
                                <label class="control-label col-xs-3">手机号码</label>
                                <div class="col-xs-9  form-inline">
                                    <input  style="width: 60%" type="text" id="mobile" name="mobile" class="form-control" placeholder="请输入手机号码" datatype="m" errormsg="请输入正确的手机号码" sucmsg="OK">
                                    <span class="Validform_checktip"><!--请输入手机号码--></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">图片验证码</label>
                                <div class="col-xs-9  form-inline">
                                    <input  style="width: 60%" type="text" name="checkcode" id="checkcode" class="form-control" id="Verificationcode" placeholder="请输入验证码" datatype="*4-4"	errormsg="请输入验证码" sucmsg="输入正确" onfocus="if($('#code_img').attr('src') == '<?php echo R;?>images/logincode.gif')$('#code_img').attr('src', '<?php echo WEBURL;?>api/identifying_code.php?w=112&h=40&rd='+Math.random());" ajaxurl="api/identifying_code_check.php"/>
                                    <img  src="<?php echo R;?>images/logincode.gif" id="code_img" alt="点击刷新"	onclick="$(this).attr('src', '<?php echo WEBURL;?>api/identifying_code.php?w=112&h=40&rd='+Math.random());" style="margin-top:2px;margin-right:4px; position: absolute; top: 0;right: 40%; max-height: 35px;">
                                    <span class="Validform_checktip"><!--请输入验证码--></span>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">短信验证码</label>
                                <div class="col-xs-9  form-inline">
                                    <input style="width: 60%"  type="text" class="form-control" id="smscode" placeholder="请输入手机收到的短信验证码" name="smscode" datatype="*4-4" errormsg="请输入短信验证码" sucmsg="输入正确" ajaxurl="api/sms_check.php">
                                    <button type="button" name="getsms" id="getsms" class="btn btn-default" onclick="sendsms();" style="margin-top:1px;  margin-right:4px; position: absolute; top: 0;right: 40%; border: none; border-left:1px solid #EEEEEE;  border-radius: 0;padding: 8px ">免费获取验证码</button>
                                    <span class="Validform_checktip"><!--请输入短信验证码--></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3"> </label>
                                <div class=" col-xs-9">
                                    <input style="width: 60%" type="submit" name="submit" class="btn btn-primary btn-lg" value=" 确认提交 " />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!--源邮箱找回密码-->
            <!--<div class="span7">
            <h4><span class="glyphicon glyphicon-phone color_heyilan" aria-hidden="true"></span> 重置密码</h4>
                <?php if(isset($GLOBALS['key'])) { ?>
                <form action="" method="post" name="findPassword" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label">新密码</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" placeholder="请输入密码" datatype="*" errormsg="请输入密码" sucmsg="OK">
                            <span class="Validform_wrong">请输入密码</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">确认密码</label>
                        <div class="col-sm-8">
                            <input type="password" name="pwdconfirm" class="form-control" placeholder="请确认密码" datatype="*" recheck="password" errormsg="您两次输入的账号密码不一致！" sucmsg="OK" >
                            <span class="Validform_wrong">请再次输入密码</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">验证码</label>
                        <div class="col-sm-8">
                            <input type="text" name="checkcode" class="form-control" id="Verificationcode" placeholder="请输入验证码" datatype="*4-4"	errormsg="请输入验证码" sucmsg="输入正确" onfocus="if($('#code_img').attr('src') == '<?php echo R;?>images/logincode.gif')$('#code_img').attr('src', '<?php echo WEBURL;?>api/identifying_code.php?w=112&h=40&rd='+Math.random());" />
                            <img src="<?php echo R;?>images/logincode.gif" id="code_img" alt="点击刷新"	onclick="$(this).attr('src', '<?php echo WEBURL;?>api/identifying_code.php?w=112&h=40&rd='+Math.random());">
                            <span class="Validform_wrong">请输入验证码</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="submit" name="submit" class="btn btn-login" value="立即找回" />
                    </div>
                </form>
                <?php } else { ?>
                <form action="" method="post" name="findPassword" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div class="col-sm-8">
                              <input type="text" name="email" class="form-control" placeholder="请输入Email" datatype="e" errormsg="请输入Email" sucmsg="OK">
                            <span class="Validform_wrong">请输入Email</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">验证码</label>
                        <div class="col-sm-8">
                            <input type="text" name="checkcode" class="form-control" id="Verificationcode" placeholder="请输入验证码" datatype="*4-4"	errormsg="请输入验证码" sucmsg="输入正确" onfocus="if($('#code_img').attr('src') == '<?php echo R;?>images/logincode.gif')$('#code_img').attr('src', '<?php echo WEBURL;?>api/identifying_code.php?w=112&h=40&rd='+Math.random());" />
                            <img src="<?php echo R;?>images/logincode.gif" id="code_img" alt="点击刷新"	onclick="$(this).attr('src', '<?php echo WEBURL;?>api/identifying_code.php?w=112&h=40&rd='+Math.random());">
                            <span class="Validform_wrong">请输入验证码</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="submit" name="submit" class="btn btn-login" value="确认提交" />
                    </div>
                </form>
                <?php } ?>
            </div>-->

        </div>
    </div>
</div>


<!--footer-->
<nav class="navbar navbar-default navbar-fixed-bottom login--bottom">
    <div class="container">
        <div class="col-xs-12" style="text-align: center">Copyright©2005-2015 版权所有 五指CMS 京ICP备14036160号-1 Powered by 五指CMS</div>
    </div>
</nav>

<script type="text/javascript">
$(function(){
		$(".form-horizontal").Validform({
			tiptype:3
		});
	});

</script>
<script type="text/javascript">
    var times = 0;
    function sendsms() {
        var mobile = $("#mobile").val();
        var checkcode = $("#checkcode").val();
        if(mobile== '' || checkcode=='') {
            $("#form-register").submit();
        } else {
            $.get( "index.php?m=sms&f=sms&v=sendsms",{ mobile:mobile,checkcode: checkcode }, function( data ) {
                if(data=='0') {
                    $("#smscode").val('');
                    times = 120;
                    $("#getsms").attr('disabled', true);
                    sendit();

                    $("#form-register").submit();
                } else if(data=='202') {
                    alert('图片验证码错误！');
                    $("#checkcode").focus();
                } else if(data=='203') {
                    alert('发送失败！今天发送数量太多！');
                } else if(data=='204') {
                    alert('发送过快，请2分钟后重试！');
                } else if(data=='205') {
                    alert('发送失败！今天发送数量太多！');
                } else {
                    alert('接口异常，短信发送失败！');
                }
            });
        }
    }
    setInterval("sendit()",1000);
    function sendit() {
        if(times==0) return false;
        var showtime = '';
        showtime = '已发送 '+times+'秒后获取';
        $("#getsms").text(showtime);
        times--;
        if(times<1) {
            times = 0;
            $("#code_img").click();
            $("#getsms").text('获取短信验证码');
            $("#getsms").attr('disabled',false);
        }
    }
</script>
</body>
</html>