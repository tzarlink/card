<?php
	require 'config.php';
	
	$sql = "select u.*,c.*,c.username admin_username from `card_user` u left join `card_company` c on u.pid=c.id where u.username='$_GET[u]'";
	$res = mysql_query($sql);
	$rs  = mysql_fetch_assoc($res);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="UTF-8">
   <title><?php echo $rs['realname'] ?>的电子名片</title>

    
    <meta name="viewport" content="target-densitydpi=320,width=640,user-scalable=no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="white" />
    <style>
        @charset "utf-8";

body{ font-family:"Microsoft Yahei"; }
*{ padding:0; margin:0}
.cls {zoom:1;}
.cls:after {content:"";visibility:hidden;display:block;height:0;clear:both;}
img { border:none;}
ul,li{ padding:0px; list-style:none;}
a{text-decoration:none;outline:none}


.main{width:640px; margin:0 auto;}
	.content{ margin:auto; line-height:1.8em; font-size:28px;}
		.content .sub-title{background:#1E1E1E;height: 100px;padding: 10px 10px; color:#fff; font-size:24px;}
		.content .sub-title a{ color:#fff}
		.content strong{ display:block}
		.content .info{ padding:35px}
input{font-family:"Microsoft Yahei"; }
.center{ text-align:center}
.mt10{ margin-top:10px}
.mt20{ margin-top:20px;}
.mt30{ margin-top:30px}
.mt40{ margin-top:40px;}

	.foot{ text-align:center; padding:3em 0; color:#666; font-size:24px}

.left{ float:left}
.right{ float:right}


.head{ background:url(/themes/16/images/m/head-bg.png) repeat-x; height:88px; position:relative}

	.head .logo{ margin-top:25px; margin-left:20px;}
	.head .search-bg{ background:url(/themes/16/images/m/search-img.png) no-repeat; width:367px; height:62px; margin-top:12px; margin-left:20px;}
	.head .search-bg .input-search{ height:58px; line-height:normal; width:285px; color:#7FB4DF; margin-top:2px; margin-left:50px; font-size:28px;  border:none; background:url(/themes/16/images/m/input-bg.png) repeat-x; padding-left:5px;}

	.head  input::-webkit-input-placeholder {color:#fff;opacity:0.8 }
	.head .downs { margin-top:15px; margin-left:25px}

#box a{color:#0565AF;}
	.box2 h3{ color:#454545; margin-bottom:30px}
	.box2 .satff-box li{ float:left; width:100px; margin-right:63px; text-align:center}
	.box2 .satff-box li a{ display:block; margin-top:5px; color:#434343}
	.gz-box .warp p{ color:#454545}


#float-bg{position:absolute; top:0px; left:0px; bottom:0px; z-index:100; background:#000; width:100%; height:100%; filter:alpha(opacity=50);opacity: 0.5; display: none }
.big-code{ background:#FFF; padding:30px; position:fixed; left:50%; top:50%; margin-top:-170px; margin-left:-160px ;border-radius: 5px; z-index:101; display:none}
	.big-code p{ text-align:center;}

.pup-box{ background:#F2F2F3; padding:40px 25px; width:540px; position:fixed; left:50%; top:50%; margin-left:-295px; margin-top:-140px;  z-index:102; display:none}
	.pup-box p{ color:#8096AD; font-size:30px; margin-bottom:20px;}

/*微名片*/
	.head .apply-box a{ display:block; color:#FFF; font-size:28px; margin-top:44px;text-shadow: 1px 1px 0 #666;}
.foot-nav{ position:fixed; bottom:0;}
	.foot-nav .foot-list1{background:-webkit-gradient(linear, left top, left bottom, from(#0097e3), to(#007ed6)); opacity:0.85; height:85px; line-height:85px;}
	.foot-nav .foot-list1 li{ float:left; background:url(/themes/16/images/m/card/foot-libg.png) repeat-y right; width:128px; text-align:center; color:#fff;text-shadow: 1px 1px 0 #454545; position:relative}
	.foot-nav .foot-list1 li .border_corb{border-color: transparent transparent #fff;}
	.foot-nav .foot-list1 li.index{ color:#FFF100;}
	.foot-nav .foot-list1 li.index .border_corb {border-color: transparent transparent #FFF100;}
	.foot-nav .list2 li{ width:160px}
	.foot-nav .foot-list3 li{ width:192px;}
	.foot-nav .foot-list3 li.t2{ width:256px;}
        .lx-box{ position: fixed;left:auto; bottom:0; width:600px; text-align:center; background:#E7E7E7; border-radius: 8px; z-index:150; padding:0 20px}
        .lx-box .tit{ color:#454545; border-bottom:1px solid #D2D2D2; padding:15px 0; font-size:32px;}
        .lx-box ul{ padding:15px 0; }
        .lx-box li{ display:inline-block; margin:10px 48px 0 48px; text-align:center}
        .lx-box li a{ display:block; margin-top:5px; color:#888; text-shadow:none}
        .lx-box .downs-app{ border-top:1px solid #D2D2D2;padding:15px 0;}
        .fx-box{ margin:20px 20px}
        .fx-box a{ margin-right:20px;}
        .main-card43{background:#030102 url(/themes/16/images/m/card/v_bg35.jpg) no-repeat; height:100%;}
.main-card43 .top-qyname{ color:#FFFDFF; font-size:38px; text-align:center; padding:40px 0; }
.main-card43 .card-box{  padding:180px 0 50px 0; line-height:42px; margin:0 auto; text-align:center;  color:#0C0D08; font-size:48px; line-height:1.2em ;}
.main-card43 .card-box .name{ margin-top:20px; color:#FFFEFF}
.main-card43 .card-box span{ display:block; font-size:28px;}
.main-card43 .card-box .card-bg img{ border:3px solid #fff;border-radius: 5px;}
.main-card43 .card-box .text-info{ margin-left:15px; float:left}
.main-card43 .card-box .position{font-size:28px;color:#fff;}
.main-card43 .card-box .text-info span{ font-size:24px; color:#454545}
.main-card43 .enter-info{width:500px; font-size:24px; color:#BFBFBF; text-align:center; width:640px; line-height:1.8em }

.pup-foot-box{background: #F2F2F4;padding: 40px 35px;width: 490px;position: fixed;left: 50%;top: 50%;margin-left: -282px;margin-top: -140px;z-index: 102;border-radius: 5px; border:2px solid #B2B2B4; font-size:24px; line-height:1.6em; display:none}
	.pup-foot-box .text{ background:url(data:image/png;base64,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) no-repeat 5px 10px; padding-left:70px; color:#333}

.save-card{ position:fixed; right:0px; bottom:0px;}
	.company-top-box .company-info{ position:relative;  padding:10px 15px 15px 130px; }
	.company-top-box .company-info .logo{ position:absolute; top:15px; left:15px}
	.company-top-box .company-info .pup{ position:absolute; right:15px; top:35px;}

	.mess span{ color:#434343}

	.min-sub-nav a{display: inline-block;width: 194px;text-align: center;color: #434343;}
	.min-sub-nav a.index{ color:#fff}
.pro-box li{ float:left; margin:20px 6px 5px 8px}
	.pro-box li img{ border:2px solid #B7B9BD; margin-bottom:5px}
	.pro-box li span.price{ float:right; color:#B90101;}

#qy-message-box .title h3{ font-size:36px; display:inline; font-weight:normal}
#qy-message-box .title span{ margin-left:15px; font-size:24px}
.foot-nav .foot-list4 li{ width:320px}

        @media screen and (device-aspect-ratio: 2/3){ .content{ height:910px}.enter-info{ position:static !important; padding:-10px 0 100px 0 !important} }
    </style>
</head>
<body>


<!-- Copyright � 2005. Spidersoft Ltd -->
<style>
A.applink:hover {border: 2px dotted #DCE6F4;padding:2px;background-color:#ffff00;color:green;text-decoration:none}
A.applink       {border: 2px dotted #DCE6F4;padding:2px;color:#2F5BFF;background:transparent;text-decoration:none}
A.info          {color:#2F5BFF;background:transparent;text-decoration:none}
A.info:hover    {color:green;background:transparent;text-decoration:underline}
</style>

<!-- /Copyright � 2005. Spidersoft Ltd -->


<div class="pup-box" id="pup-box">
    <p><span id="pup-txt">创建微名片</span>，请先下载安装微名片APP</p>
    <a href="http://v.qy.cn/d.php?from=404619" rel="nofollow" onclick="$('#float-bg').hide();$('#pup-box').hide()"><input type="image" src="/themes/16/images/m/downs1.png"></a>　<input type="image" src="/themes/16/images/m/esc.png" id="esc_btn" onclick="$('#float-bg').hide();$('#pup-box').hide()">
</div>
<div style="background-image:url(/themes/16/images/m/card/webcard-bg.jpg); background-position: center 0;background-repeat: no-repeat;background-attachment: fixed; height:100%; background-size: cover;-webkit-background-size: cover;-o-background-size: cover;">
    <div class="main" style="height:100%;">

        <div class="content">
                        
<div class="main-card43 touch">
    <div class="top-qyname"><?php echo $rs['company'] ?></div>
    <div class="card-box">
        <div class="card-bg">
		<img style="height: 110px;" src="<?php echo $rs['photo'] ?>" onerror="this.src=''">
            <div class="name"><?php echo $rs['realname'] ?><span><?php echo $rs['job'] ?></span></div>

            <div class="position"><font style="color:#BFBFBF;">手机：</font><a href="tel:<?php echo str_replace('-','',$rs['tel']) ?>"><?php echo $rs['tel'] ?></a></div>
        </div>
    </div>
    <div class="enter-info">
        <p>
              电话：<a href="tel:<?php echo str_replace('-','',$rs['phone']) ?>"><?php echo $rs['phone'] ?></a><br>              传真：0769-22452700<br>              邮箱：<?php echo $rs['mail'] ?><br>            网址：www.ka.com<br>            地址：<?php echo $rs['address'] ?><br>        </p>
        <div class="fx-box" style="padding-bottom: 100px;"></div>
    </div>
</div>                                    <div class="foot-nav" style="display: none;">
                <!--<div class="lx-box">
                    <div class="tit">请选择联系方式</div>
                    <ul class="cls">
                                                <li onclick="location.href='mailto:2496267464@qq.com'"><a href="#"><img src="/themes/16/images/m/card/lx_pic3.png"></a><a href="#">邮件</a></li>
                        <li onclick="window.open('http://www.kz.com')"><a href="#"><img src="/themes/16/images/m/card/lx_pic5.png"></a><a href="#">网站</a></li>
                        <li onclick="$('#float-bg').show();$('.big-code').show();shownav()"><a href="#"><img src="/themes/16/images/m/card/lx_pic6.png"></a><a href="#">二维码</a></li>
                    </ul>
                                        <div class="downs-app"><a target="_blank" href="http://v.qy.cn/d.php?from=404619" ><input type="image" src="/themes/16/images/m/card/downs-app.png"></a></div>
                                    </div>-->

            </div>
                        			
                    </div>
    </div>
    <input type="hidden" name="is_show" id="is_show" value="1"/>
    <!--页脚弹窗-->
    <div id="float-bg" style="text-align: center;"></div>
	<div class="big-code" style="text-align:center;margin-left: -200px; margin-top:-250px; width: 370px;">
        <img src="m.php/nocheck/qrcode~a=404619" style='width:250px;height:250px;'>

        <p style="margin:15px 0; font-size:18px">扫描二维码，访问微名片</p>
        <p class="center">
            <div id="sms" style="border-top: 1px solid #dddddd;padding: 5px;display: block;font-size: 22px;text-align:left;">
                <table style="margin-top: 10px;">

                    <tr style="height:20px;">
                        <td><span>我的微名片是 http://404619.v.qy.cn 扫描打开即可保存至通讯录</span></td>
                    </tr>
                </table>

            </div>
            <br><a style="font-size: 22px;color:black" href='#' onClick="location.href='http://v.qy.cn/m.php/nocheck/vcodedown?a=404619'">下载二维码</a>        </p>
    </div>
    <div class="pup-foot-box">
        <div class="text">希望轻松获得免费的个性化企业手机网站？去CC就可以了！</div>
        <p class="mt40"><input id="downbtn" type="image" src="/themes/16/images/m/card/downs-cc.png">　<input id="clear" type="image" src="/themes/16/images/m/card/esc.png" ></p>
    </div>
</div>
<script src="/themes/16/js/jquery-1.8.3.min.js"></script>
<script>
    var h = $(document).height() + 1;
    $(document).height(h);
        $('.content').height(h);
        //$('body').scrollTop(1);

    $('.card-btn').click(function () {
        $('.apply-box').toggle();
    });
    $('#float-bg').click(function () {
        $(this).hide();
        $('.big-code').hide();
        $('.pup-foot-box').hide();
        $('#pup-box').hide();
    });
    $('#clear').click(function () {
        $('#float-bg').hide();
        $('.big-code').hide();
        $('.pup-foot-box').hide();
    });
    $('#downbtn').click(function(){
        window.open('http://cc.qy.cn/cc.php');
    });
    
    $('#float-bg').height(h);
    
    $(window).resize(function(){
    	h = $(document).height() + 1;
    	$(document).height(h);
    	$('#float-bg').height(h);
    });

    $('.foot-list1 li').click(
            function(){
                $('.foot-list1 li').removeClass('index');
                $(this).addClass('index');
            }
    );

    $('.bind-btn').click(
            function(){
                $('#login-box').hide();
                $('#bind-success').show();
            }
    );

    function show_down(t){
        if(t == 1){
            var text = "想和他一样拥有永不过期的电子名片吗？马上去CC申请吧！";
        }else if( t == 2){
            var text = "希望轻松获得免费的个性化企业手机网站？去CC就可以了！";
        }else if( t == 3){
            var text = "希望加他为好友，和他随时互动？那就和他一起用CC吧！";
        }
        $('#float-bg').show();
        $('.text').text(text);
        $('.pup-foot-box').show();
    }

    function shownav() {
        var is_show = $('#is_show').val();
        if (is_show == '1') {
            $('#vcard').hide();
            $('.head-pup').show();
            $('.foot-nav').show();
            $('#is_show').val('0');
        } else {
            $('#vcard').show();
            $('.head-pup').hide();
            $('.foot-nav').hide();
            $('#is_show').val('1');
        }
    }

    $('.touch').click(shownav);
    $('.socialimg').click(function(){
        $('#vcard').hide();
        $('.head-pup').show();
        $('.foot-nav').show();
        $('#is_show').val('0');
    });

    
var basUrl = '';
var dataForWeixin = {
    //appId: "",
    MsgImg: "<?php echo 'http://',$_SERVER['HTTP_HOST'],'/',$rs['photo']; ?>",
    url: "<?php echo 'http://',$_SERVER['HTTP_HOST'],'/card.php?u=',$rs['username']; ?>",
    title: "",
    desc: "<?php echo $rs['realname'] ?>的电子名片!",
    weibodesc: "",
    callback: function() {return;}
};

var onBridgeReady = function () {
    WeixinJSBridge.on('menu:share:appmessage', function (argv) {
        WeixinJSBridge.invoke('sendAppMessage', {
            //"appid": dataForWeixin.appId,
            "img_url": dataForWeixin.MsgImg,
            "img_width": "120",
            "img_height": "120",
            "link": basUrl + dataForWeixin.url,
            "desc": dataForWeixin.desc,
            "title": dataForWeixin.title
        }, function (res) { (dataForWeixin.callback)(); });
    });
    WeixinJSBridge.on('menu:share:timeline', function (argv) {
        (dataForWeixin.callback)();
        WeixinJSBridge.invoke('shareTimeline', {
            "img_url": dataForWeixin.MsgImg,
            "img_width": "120",
            "img_height": "120",
            "link": basUrl + dataForWeixin.url,
            "desc": dataForWeixin.desc,
            "title": dataForWeixin.desc
        }, function (res) { (dataForWeixin.callback)(); });
    });
    WeixinJSBridge.on('menu:share:weibo', function (argv) {
        WeixinJSBridge.invoke('shareWeibo', {
            "content": dataForWeixin.weibodesc + ' ' + basUrl + dataForWeixin.url,
            "url": basUrl + dataForWeixin.url,
			"img_url": dataForWeixin.MsgImg,
            "title": dataForWeixin.title
        }, function (res) { (dataForWeixin.callback)(); });
    });
    WeixinJSBridge.on('menu:share:facebook', function (argv) {
        WeixinJSBridge.invoke('shareFB', {
            "img_url": dataForWeixin.MsgImg,
            "img_width": "120",
            "img_height": "120",
            "link": basUrl + dataForWeixin.url,
            "desc": dataForWeixin.desc,
            "title": dataForWeixin.title
        }, function (res) { });
    });
};
if (document.addEventListener) {
    document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
} else if (document.attachEvent) {
    document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
    document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
}
</script>
<div style="display:none;">
    <script type="text/javascript">
        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fefdddeacce141f66a40601412b949bae' type='text/javascript'%3E%3C/script%3E"));
    </script></div>
</body>
</html>
