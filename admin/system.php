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
	
	$sql = "select id,password from `card_company` where `username`='$_SESSION[company_admin]'";
	$rs  = mysql_fetch_assoc(mysql_query($sql));
	
	if(isset($_POST['submit']))
	{
		$id         = $_POST['id'];
		$password   = trim($_POST['password']);		
			
		$sql = "update `card_company` set password='$password' where id='$id'";
		mysql_query($sql);
		echo "<script language=JavaScript>	alert('密码修改成功！');  </script>";
	}
?>
 
<form action='' method='post' enctype="multipart/form-data"  >
    <div class="xm-box home-today-goods" style="width:1190px;margin:0 auto">
      <div class="hd">
        <h3 class="title">修改登录密码</h3>   
      </div>
	  
      <div class="bd clearfix" style="height:250px;text-align:center">
       
  
			<b>新密码：</b><input type="text" id='password' style="width:300px;margin-top:100px;font-size:16px;font-wight:900"  class="input_kuang" name="password" autocomplete="on">&nbsp;&nbsp;&nbsp;
			 <p style='display:none' id='suc'>新密码修改成功！</p>
			<input type='hidden' name='id' value="<?php echo $rs['id'] ?>">
	</div>
     
    </div>
 
	<input type="hidden" name="logo_old" value="<?php echo $rs['logo'] ?>" >
	<input type="submit" name="submit" class="sub_login no_bg "  style="margin-top:18px" value="保存修改">
  
  
  
<div class="footer container">
 
  
  <div class="footerbtm">
    <div class="info"> &copy; 2013-2014 东莞市科众软件科技有限公司 版权所有，并保留所有权利。 <img src="../assets/img/footerbg.png" /></div>
  </div>
</div>
</form>
 
</body>
</html>

<script>
	function ck_pwd()
	{
		var p1 = document.getElementById('password');
		var p2 = document.getElementById('password2');
		 
		if(p1 != p2 )
		{
			alert('两次密码不一致！');
			return false;
		}
	}
</script>
