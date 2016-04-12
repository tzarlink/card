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
	
	//删除
	if(isset($_GET['del']))
	{
		$sql = 'delete from `card_user` where id='.$_GET['del'];
		mysql_query($sql);
	}
 
	$sql = "select * from `card_user` where `pid`='$_SESSION[company_id]'";
	$res = mysql_query($sql);
	
	while($rs=mysql_fetch_assoc($res))
	{
?>
		
		<div class="xm-box home-today-goods" style="width:1190px;margin:0 auto;">
		  <div class="hd">
		  	<a href='javascript:void(0)' onclick="show_user_info('<?php echo 'card_',$rs['id'] ?>')">
				<h3  style="width:1000px" class="title">&nbsp;<?php echo $rs['realname'] ?></h3>
			</a>
			<span style='float:right;margin-right:10px;margin-top:15px'><a href="?del=<?php echo $rs['id'] ?>">删除</a></span>
		  </div>
		</div>
		
	 
		<div class="footer container" id="card_<?php echo $rs['id'] ?>" style="margin-top:0;margin-bottom:10px;display:none ;">
		  <div class="footerup">
			<div class="footercont">
		   <style>.ll{color:#FF6F3D;font-weight:900;margin-left:20px}</style>
			  <div class="service clearfix" style="padding-left:10px">
				<img src="<?php if($rs['photo']!='') echo '/',$rs['photo']; else echo '/assets/img/user_photo.png' ?> " style="height:100px" />
				<span class='ll'>用户名：</span><?php echo $rs['username']; ?> 
				<span class='ll'>职位：</span><?php echo $rs['job']; ?> 	
				<span class='ll'>电话：</span><?php echo $rs['tel']; ?>  
				<span class='ll'>QQ:</span><?php echo $rs['qq']; ?> 
				<span class='ll'>邮箱：</span><?php echo $rs['mail']; ?> 
				<span class='ll'>箴言:</span><?php echo $rs['proverbs']; ?> 
 
			  </div>
			</div>
		  </div>
		
		</div>
<?php
	}
?>	
	
 
	<div class="footer container" style="margin-top:0;margin-bottom:10px">
	 
	<div class="footerbtm">
		<div class="info"> &copy; 2013-2014 东莞市科众软件科技有限公司 版权所有，并保留所有权利。 <img src="../assets/img/footerbg.png" /></div>
		  </div>
	</div>
	</div>	  
	 
	
 
</body>
</html>

<script>
	function show_user_info(id)
	{
		if(document.getElementById(id).style.display=="none")
			document.getElementById(id).style.display="block";
		else
			document.getElementById(id).style.display="none";
	}
</script>
