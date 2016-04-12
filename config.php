<?php
	mysql_connect("localhost",'card_test','card_test2014');
	mysql_select_db('card_test');
	mysql_query('set names utf8');
	
	error_reporting(E_ALL & ~E_NOTICE);
	
	
	
	//底部版权
	$C_footer = "<div style='color:#0A8AC5;text-align:center;margin-top:50pt;margin-bottom:10pt;'>技术支持：<a href='http://guanbost.net'>科众软件</a></div>";