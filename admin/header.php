<?php 
	$file = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')); 
	require'../config.php';  
	require'../function.php';  
	
	if(!check_admin())
	{
		echo "<script>alert('请先登录！');window.location='../index.html'</script>";
	}
?>
<div class="header container" >
  <div class="nav">
    <div class="clearfix"> 
      <div class="lnks clearfix">
        <ul class="lnks-li">
          <li><a class="lnk <?php if('/card_list.php'==$file) echo 'on'; ?>" href="card_list.php">名片列表</a></li>
		  <li><a class="lnk <?php if('/template.php'==$file) echo 'on'; ?>" href="template.php"> 名片模板 </a></li>
		  <li><a class="lnk <?php if('/system.php'==$file) echo 'on'; ?>" href="system.php"> 修改密码 </a></li>
        </ul>
      </div>
    </div>
  </div>
</div>



