<?php
	require 'config.php';
	
	session_start();
	
	if(isset($_GET[u]))
		$sql = "select u.*,c.*,c.username admin_username from `card_user` u left join `card_company` c on u.pid=c.id where u.username='$_GET[u]'";
	else
		$sql = "select id,username as admin_username,logo from `card_company` where username='$_GET[r]'";
	$rs = mysql_fetch_assoc(mysql_query($sql));
	//print_r($rs);
	if($_GET['r']){  //名片注册动作
		
		$behavior = '注册';
	}else{      //修改名片动作
		if($_SESSION['username']!=$_GET['u']) echo "<script>alert('禁止非法修改参数！');history.go(-1)</script>";
		
		//$sql = "select * from card_user where username='$_GET[u]'";
		//$res = mysql_query($sql);
		//$rs  = mysql_fetch_assoc($res);
		
		$behavior = '管理';
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>电子名片<?php echo $behavior ?>中心-技术支持：科众软件</title>
<link href="assets/css/user.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/manfind.css" rel="stylesheet" type="text/css"/>
<style>
.en .sub_login,.en .sub_login input{
  width:auto;
  padding:0 3px;
}
</style>
</head>
<body>
 
<?php
	
	//保存名片数据
	if(isset($_POST['submit']))  
	{
		if($_POST['act']=='注册')
		{
		   if ($_FILES["photo"]["error"] > 0){
				$photo = $_POST['photo_old'];
			}
			else
			{
				@$suffix = strtolower(array_pop(explode('.',$_FILES["photo"]["name"])));
				$dir = 'upimg/business_card/'.$rs['admin_username'].'/';
				if(!file_exists($dir))
				{
					mkdir($dir);
				}
				 $photo = $dir.time().'.'.$suffix;
				 move_uploaded_file($_FILES["photo"]["tmp_name"],$photo);
			}
				$username = trim($_POST['username']);
				$realname = trim($_POST['realname']);
				$job = trim($_POST['job']);
				$tel = trim($_POST['tel']);
				$qq = trim($_POST['qq']);
				$mail = trim($_POST['mail']);
				$password = trim($_POST['password']);
				$proverbs = trim($_POST['proverbs']);
				$pid = $_POST['pid'];
				
				$sql = "insert into `card_user` (realname,job,tel,qq,mail,password,proverbs,photo,username,pid) 
						values('$realname','$job','$tel','$qq','$mail','$password','$proverbs','$photo','$username','$pid')";  
				mysql_query($sql);
				
				if(mysql_error()=='')
				{
					echo "<script>alert('注册成功！');window.location='index.html'</script>";
				}
				else
				{  
					echo "<script>alert('注册失败，该用户已存在或用户名太长！');history.go(-1);</script>";
				}
		}
		else
		{  
			//print_r($_FILES);
			if ($_FILES["photo"]["error"] > 0)
			{
				//echo "Error: " . $_FILES["photo"]["error"] . "<br />";
				$photo = $_POST['photo_old'];
			}
			else
			{
				@$suffix = strtolower(array_pop(explode('.',$_FILES["photo"]["name"])));
				 $dir = 'upimg/business_card/'.$rs['admin_username'].'/';
				if(!file_exists($dir))
				{
					mkdir($dir);
				}
				 $photo = $dir.$_GET['u'].'.'.$suffix; 
				 move_uploaded_file($_FILES["photo"]["tmp_name"],$photo);
			}
				$username=$_GET['u'];
				$realname = $_POST['realname'];
				$job = $_POST['job'];
				$tel = $_POST['tel'];
				$qq = $_POST['qq']; 
				$mail = $_POST['mail'];
				$password = $_POST['password'];
				$proverbs = $_POST['proverbs'];
				
				$sql = "update `card_user` set realname='$realname',job='$job',tel='$tel',qq='$qq',mail='$mail',password='$password',proverbs='$proverbs',photo='$photo' where username='$username' ";
				mysql_query($sql);
				echo "<script language=JavaScript> location.replace(location.href);</script>";
		}

	}
	
	
 
	
	
	
 
	
?> 
<div class="top">
	<div class="logo">
    
        <img style='margin-top:-15px;height:80px; ' src="<?php echo $rs['logo'] ?>"  />        
      
	</div>
</div>

<div class="suc_content reg-account nojsp">
  <div class="suc_kuang">
    <div class="hei_513">
      <h4 class="h4_suc"><?php echo $behavior ?>我的名片</h4>
      <p class="suc_p" style="margin-bottom:30px">通过扫描您的二维码进入您的电子名片页面，也可以通过微信中将您的名片分享到朋友圈。 </p>
 
      <form method="post" action="" enctype="multipart/form-data" onsubmit="return check();">  <!--提交-->
		
        <dl class="login-dl clearfix">
		
		 <?php  
			  if($behavior=='注册')
			  {
				 echo <<<html
				  <dt class="dt_l">用户：</dt>
					<dd class="dd_r clearfix">
						<input type="text" value="" name="username" id="username" class="input_kuang val_m item errortip address" value=""   autocomplete="on" />
				    </dd>
html;
			  }
		 ?>
			
			
		<dt class="dt_l">密码：</dt>
			<dd class="dd_r clearfix" id="emailInner">
				<input type="password" value="<?php if($behavior != '注册') echo $rs['password'] ?>" name="password" id="password" class="input_kuang val_m item errortip address" value="" isRequired="true" rule="^[\w.\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\.)+[a-z]{2,6}$" autocomplete="off" /> <p style="margin-top:5px;margin-left:5px;color:gray" > </p>
           </dd>
		
		  <dt class="dt_l">姓名：</dt>
		  <dd class="dd_r dd_r_pos clearfix" id="pwdTd">
				<input type="text" value="<?php echo $rs['realname'] ?>" class="input_kuang item val_m errortip password" isRequired="true" id="pwd" name="realname" autocomplete="off" />
		  </dd>
		  
		  <dt class="dt_l">职位：</dt>
		  <dd class="dd_r dd_r_pos clearfix" id="pwdTd">
				<input type="text" value="<?php echo $rs['job'] ?>" class="input_kuang item val_m errortip password" isRequired="true" id="pwd" name="job" autocomplete="off" />
		  </dd>
		  
		  <dt class="dt_l">手机：</dt>
		  <dd class="dd_r dd_r_pos clearfix" id="pwdTd">
				<input type="text" value="<?php echo $rs['tel'] ?>" class="input_kuang item val_m errortip password" isRequired="true" id="pwd" name="tel" autocomplete="off" />
		  </dd>
		  
		  <dt class="dt_l">Q  Q：</dt>
		  <dd class="dd_r dd_r_pos clearfix" id="pwdTd">
				<input type="text" value="<?php echo $rs['qq'] ?>" class="input_kuang item val_m errortip password" isRequired="true" id="pwd" name="qq" autocomplete="off" />
		  </dd>
		
          <dt class="dt_l">邮箱：</dt>
			<dd class="dd_r clearfix" id="emailInner">
				<input type="text" value="<?php echo $rs['mail'] ?>" name="mail" id="emailInp" class="input_kuang val_m item errortip address" value="" isRequired="true" rule="^[\w.\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\.)+[a-z]{2,6}$" autocomplete="off" />
          </dd>
		  

		  <dt class="dt_l">照片：</dt>
			<dd class="dd_r clearfix" id="emailInner">
				<input type="file" name="photo" id="emailInp" class="input_kuang val_m item errortip address" value="" isRequired="true" rule="^[\w.\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\.)+[a-z]{2,6}$" autocomplete="off" />
           </dd>
		   
	  <dt class="dt_l">个人箴言：</dt>
	  <dd class="dd_r dd_r_pos clearfix" id="pwdTd">
			<textarea name="proverbs" style="width:500px;height:80px;padding:5px"><?php echo $rs['proverbs'] ?></textarea>
	  </dd>
	  
			<input type="hidden" name="photo_old" value="<?php echo $rs['photo'] ?>" >
 
	  <dt class="dt_l">&nbsp;</dt>
	  <dd class="dd_r la_height clearfix">
            <div style="margin-top:50px" class="sub_login flt_l">
			
			<input type="hidden" name="pid" value="<?php echo $rs['id']; ?>">
			<input type="hidden" name="act" value="<?php echo $behavior; ?>">
			<input type="submit" name="submit" class="no_bg" value="保存名片" />
			
			</div>
          </dd>
		  
	</dl>
	
</form>
 
 <!--个人照片-->
  <div style="margin-top:-450px;margin-right:40px;float:right">
	<img src="<?php if(!empty($rs['photo'])) echo $rs['photo']; else echo "/assets/img/user_photo.png"; ?>" width="100px"> <br/> 
	
<?php   
	$qr='http://'.$_SERVER['HTTP_HOST'].'/card.php?u='.$_GET['u']; 
	include('./phpqrcode/phpqrcode.php'); 
    $data = $qr;    // 二维码数据 
	$dir = 'upimg/business_card/'.$rs['admin_username'].'/';
	if(!file_exists($dir))
	{
		mkdir($dir);
	}
	
    $filename = $dir.'qr_'.$_GET['u'].'.png'; // 生成的文件名及路径
    $errorCorrectionLevel = 'L';      // 纠错级别：L、M、Q、H 
    $matrixPointSize = 4;             // 纠错级别：L、M、Q、H 
    QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
	
	if($behavior!='注册'){
		echo "<img width='110' style='margin-top:-30px' src='/upimg/business_card/",$rs['admin_username'],'/qr_',$_GET['u'],".png'>";
	}
?>
	<p style="padding-top:100px">名片链接地址：<?php if($behavior=='注册') $card_url ='名片地址及名片二维码注册完成后可见'; else $card_url=$qr  ?> 
	<a  href="<?php echo $card_url; ?>"><?php echo $card_url; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
  </div>
        </div>
    <div class="suc_botm"></div><!--这部分是卷角效果-->
  </div>
  
 
  
</div>
<div class="footer" style="width:auto;">
  <ul class="links">
    <li class="copyright"><span>Copyright 东莞市科众软件科技有限公司 Power By Tzarlink 2014</span></li>
  </ul>
</div>
 
</body>
</html>

<script>
	function check()
	{
		var pwd = document.getElementById('password').value;
		var usr = document.getElementById('username').value;
		 
		//检测用户名
		var patrn=/^(\w){1,10}$/;
		if (!patrn.exec(usr)) 
		{
			alert("用户名只能输入字母和数字,长度不能超过十个字符");
			return false
		}

		
		if(pwd=='')
		{
			alert('密码不能为空!');
			return false;
		}
 

	}
	
	
	 
	
</script>
