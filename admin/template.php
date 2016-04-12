<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="科众软件-电子名片系统" />
<meta name="Description" content="科众软件-企业电子名片管理中心" />
<title>企业电子名片管理中心 - Powered by 科众软件</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="../assets/css/base.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/index.css" rel="stylesheet" type="text/css" />
 
<body>
 
<?php 
	require"header.php"; 
	
	$sql = "select * from `card_company` where `username`='$_SESSION[company_admin]'";
	$rs  = mysql_fetch_assoc(mysql_query($sql));
	
	if(isset($_POST['submit']))
	{
		$company  = trim($_POST['company']);
		$slogan   = trim($_POST['slogan']);
		$address  = trim($_POST['address']);
		$phone    = trim($_POST['phone']);
		$about_us = trim($_POST['about_us']);
		$tpl      = $_POST['tpl'];
		
		if ($_FILES["logo"]["error"] > 0) //logo上传
		{
			//echo "Error: " . $_FILES["logo"]["error"] . "<br />";
			$logo = $_POST['logo_old'];
		}
		else
		{
			@$suffix = strtolower(array_pop(explode('.',$_FILES["logo"]["name"])));
			 $logo = "../upimg/logo/".$_SESSION[company_admin].'.'.$suffix;
			 move_uploaded_file($_FILES["logo"]["tmp_name"],$logo);
			 $logo = "/upimg/logo/".$_SESSION[company_admin].'.'.$suffix;
		}
		
		$sql = "update `card_company` set company='$company',slogan='$slogan',address='$address',phone='$phone',about_us='$about_us',logo='$logo',tpl='$tpl' where username='$_SESSION[company_admin]'";
		mysql_query($sql);
		echo "<script language=JavaScript> location.replace(location.href);</script>";
	}
?>
 
<form action='' method='post' enctype="multipart/form-data" >
    <div class="xm-box home-today-goods" style="width:1190px;margin:0 auto">
      <div class="hd">
        <h3 class="title">名片固定信息管理</h3>   
      </div>
	  
      <div class="bd clearfix" style="height:380px">
        <div class="home-featured-goods">
			<textarea placeholder="请在此输入公司简介..." name="about_us" style="resize:none;padding:5px;width:430px;height:300px;border:none" ><?php echo $rs['about_us'] ?></textarea>
        </div>
		
        <div class="xm-goods-list-wrap" style="padding-left:5px;font-size:15px">
			<b>公司名称：</b><input type="text" style="width:600px;margin-top:10px" value="<?php echo $rs['company'] ?>" class="input_kuang" name="company" autocomplete="on">
			<b>公司口号：</b><input type="text" style="width:600px;margin-top:10px" value="<?php echo $rs['slogan'] ?>" class="input_kuang" name="slogan" autocomplete="on">
			<b>公司地址：</b><input type="text" style="width:600px;margin-top:10px" value="<?php echo $rs['address'] ?>" class="input_kuang" name="address" autocomplete="on">
			<b>公司总机：</b><input type="text" style="width:600px;margin-top:10px" value="<?php echo $rs['phone'] ?>" class="input_kuang" name="phone" autocomplete="on">
			<b>公司logo：</b><input type="file" style="width:600px;margin-top:10px;height:20px" class="input_kuang" name="logo" autocomplete="on">
			<img src="<?php if($rs['logo']!='') echo $rs['logo']; else echo '../assets/img/nopic.jpg'; ?>" style="max-height:120px;margin-top:10px;margin-left:76px" >
			
			<?php
				$url = 'http://'.$_SERVER['HTTP_HOST'].'/user.php?r='.$_SESSION['company_admin']; //名片注册地址
			
				include('../phpqrcode/phpqrcode.php'); 
				$filename = '../upimg/register/'.$rs['username'].'.png'; // 生成的文件名及路径
				$errorCorrectionLevel = 'L';      // 纠错级别：L、M、Q、H 
				$matrixPointSize = 4;             // 纠错级别：L、M、Q、H 
				QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
			?>
			
			<img src="<?php echo $filename ?>" style="height:115px;margin-top:10px;margin-left:260px;margin-right:17px" >
			<p style="font-size:15px;margin-top:6px;float:right;margin-right:17px"><b>名片注册地址：
			<a target='_blank' href="<?php echo $url ?>"><?php echo $url ?></a> 或扫描上方二维码注册</b></p> 
        </div>
      </div>
    </div>
 
	<input type="hidden" name="logo_old" value="<?php echo $rs['logo'] ?>" >
	<input type="submit" name="submit" class="sub_login no_bg "  style="margin-top:18px" value="保存修改">
  
  
  
<div class="footer container">


  <div class="footerup"> <p style='margin-left:20px;margin-top:-5px;line-height:30px;font-weight:900'>模板选择 . 更多模板正在开发中，敬请期待！</p>
    <div class="footercont">

	<div>
	<?php
		$dir = opendir("../themes");  //要扫的目录
		while (($file = readdir($dir)) !== false)   //一定要用恒等于，因为如果某个文件名叫’0′，或某些被系统认为是代表false，用!=就会停止循环
		{
			if(substr($file,0,1)!='.')
			{
				//echo "PATH: " . $file . "<br />";
					if($rs['tpl']==$file) $checked = 'checked'; else $checked=''; 
					echo "<div style='width:200px;margin-left:25px;float:left;margin-top:20px'>";
					echo "<img src='/themes/".$file."/preview.png'>";
					echo "<p style='text-align:center;margin-top:10px'><input name='tpl'  ".$checked." value='".$file."' style='width:20px;height:20px' type='radio' ></p>";
				    echo "</div>";
				 	 
				 
				
		 
				 
html;
			}
		}
echo "<div style='clear:both'></div>";
		  closedir($dir);
	?>
       
   
		
	</div>
	  
	  
	  
	  
	  
    </div>
</div>
  
  
  <div class="footerbtm">
    <div class="info"> &copy; 2013-2014 东莞市科众软件科技有限公司 版权所有，并保留所有权利。 <img src="../assets/img/footerbg.png" /></div>
  </div>
</div>
</form>
 
</body>
</html>
