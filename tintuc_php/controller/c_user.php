<?php
	session_start();
	include('model/m_user.php');
	class C_user{
		function dangkyTK($name, $email, $password){
			$m_user = new M_user();
			$id_user = $m_user->dangky($name, $email, $password);
			if($id_user > 0){
				$_SESSION['success'] = "Dang ky thanh cong";
				header('location:index.php');
				if(isset($_SESSION['error'])){
					unset($_SESSION['error']);
				}
			} else {
				$_SESSION['error'] = "Dang ky khong thanh cong";
				header('location:dangky.php');
			}
		}
	}
?>