<?php

	function check_admin(){  //检查是否公司管理员
		session_start();
		if($_SESSION['company_admin']!=''){
			return true;
		}else{
			return false;
		}
	}