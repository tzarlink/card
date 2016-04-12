<?php
	//查询当前用户所属公司的名片模板
	require_once'config.php';
	$sql = "select c.tpl from `card_user` u left join `card_company` c on u.pid=c.id where u.username='$_GET[u]'";
	$rs = mysql_fetch_assoc(mysql_query($sql));
	 
	require'themes/'.$rs['tpl'].'/index.php';  