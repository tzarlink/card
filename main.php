<?php
	header("Content-type: text/html; charset=utf-8"); 

	require 'config.php';
	
	$act = !empty($_REQUEST['act']) ? $_REQUEST['act'] : 'login';
	
	if($act=='login')
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		
		
		IF($_POST['is_admin']) //检查是否公司管理员登录
		{ 
			$sql = "SELECT username,id FROM `card_company` WHERE username='$username' AND password='$password' ";
			$res = mysql_query($sql);
			$rs  = mysql_fetch_assoc($res);
			if($rs['id']>0)  
			{
				session_start();
				$_SESSION['company_admin'] = $rs['username'];
				$_SESSION['company_id'] = $rs['id'];
				header("location:admin/card_list.php?u=$rs[username]");
			}
			else
			{
				echo "<script>alert('账号或密码错误！');history.go(-1)</script>";
			}
		}
	    ELSE
		{ 
			$sql = "SELECT username,id FROM `card_user` WHERE username='$username' AND password='$password' ";
			$rs  = mysql_fetch_assoc(mysql_query($sql));
		
			if($rs['id']>0)  //会员登录
			{
				session_start();
				$_SESSION['username'] = $rs['username'];
				
				if($rs['username']=="admin")
				{   
					header("location:main.php?act=admin");
				}
				else
				{
					header("location:user.php?u=$rs[username]");
				}
			}
			else
			{
				echo "<script>alert('账号或密码错误！');history.go(-1)</script>";
			}
		}
	}
	elseif($act=='admin')  //科众总管理
	{ 
		echo <<<html
		<div id="nav" style="background:#99C702;height:35px;line-height:35px">
		<style>
			ul li { list-style:none;}
			a {text-decoration:none;color:gray;font-weight:800 }
			#nav a {text-decoration:none;color:#fff;font-weight:800 }
			a:hover {color:#f60}
		</style>
			<ul>
				<li><a href="main.php?act=company"> 企业列表 </a></li>
			</ul>
		</div>
	
html;
	
		if(isset($_POST['submit']))
		{ 
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$realname = trim($_POST['realname']);
			
			$sql = "INSERT INTO `card_user` (username,realname,password) values('$username','$realname','$password') ";
			mysql_query($sql);
			echo "<script>history.go(-1);</script>";
		}
		elseif(isset($_GET['del']))
		{  
			$sql ="DELETE FROM `card_user` WHERE `id`='$_GET[id]'";
			mysql_query($sql);
			echo "<script>window.location='main.php?act=admin'</script>";
		}
		else
		{
			$sql = "SELECT id,realname,username,password FROM `card_user` WHERE username <> 'admin' ";
			$res  = mysql_query($sql);
			$i=1;
			while($rs=mysql_fetch_assoc($res)){
				echo $i,'、',$rs['realname'],'&nbsp;&nbsp;',$rs['username'],'&nbsp;&nbsp;',$rs['password'],"<a href='main.php?act=admin&del=1&id={$rs['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;删除</a>",'<br/>';
				$i++;
			}
		}
		
echo <<<html
			<br/><br/><br/>
			<form action='' method='post'>
				用户名：  <input type='text' name='username'>
				密  码：  <input type="text" name="password">
				真实姓名：<input type="text" name="realname">
				<input type='submit' name='submit' value="新增">
			</form>
			
	
html;

 
	}
	elseif($act=='company')
	{
		echo <<<html
			<div id='nav' style="background:#99C702;height:35px;line-height:35px">
				<style>
				#nav ul li { list-style:none;}
				#nav a {text-decoration:none;color:#fff;font-weight:800 }
				     a {text-decoration:none;color:GRAY;font-weight:800 }
				a:hover {color:#f60}
				</style>
				<ul>
					<li><a href="main.php?act=admin"> 科众管理 </a></li>
				</ul>
			</div>
			
			<style>
				table tr td{border:1px solid #99C702;padding:4px}
				table {border-collapse:collapse;}
				th {border:1px solid #99C702;background:#D8E9C4}
			</style>
			<table style="border:1px solid #99C702;background:#E7F1DB;width:100%;color:#f90">
				<th>序号</th>
				<th>用户名</th>
				<th>公司名称</th>
				<th>联系电话</th>
				<th>公司地址</th>
				<th>编辑</th>
				
html;
		
		if(isset($_POST['submit'])) //增
		{ 
		 
		 $company = $_POST['company'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $sql = 'insert into card_company (company,username,password) values("'.$company.'","'.$username.'","'.$password.'")';
		 mysql_query($sql);
		 echo "<script>history.go(-1);</script>";
		
		}
		elseif(isset($_GET['del']))  //删
		{  
			$sql ="DELETE FROM `card_company` WHERE `id`='$_GET[id]'";
			mysql_query($sql);
			echo "<script>window.location='main.php?act=company'</script>";
		}
		else //查
		{
			$sql = "SELECT id,company,address,username,phone FROM `card_company`";
			$res  = mysql_query($sql);
			$i=1;
			while($rs=mysql_fetch_assoc($res)){
				echo "<tr>";
					echo "<td>",$i,"</td>";
					echo "<td>",$rs['username'],"</td>";
					echo "<td>",$rs['company'],"</td>";
					echo "<td>",$rs['phone'],"</td>";
					echo "<td>",$rs['address'],"</td>";
					echo "<td style='text-align:center'>","<a href='main.php?act=company&del=1&id={$rs['id']}'>删除</a>","</td>";
				echo "</tr>";
				
				$i++;
			}
		}


echo <<<html
			</table>
			
			<br/><br/><br/>
			<form action='' method='post'>
				公司名称：  <input type="text" name="company">
				用户名：  <input type="text" name="username">
				密码：  <input type="text" name="password">
				<input type='submit' name='submit' value="新增">
			</form>
			
			
	
html;


}//end


	
	