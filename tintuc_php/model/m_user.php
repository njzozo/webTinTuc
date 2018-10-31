<?php
	include('database.php');

	class M_user extends database{
		function dangky($name, $email, $password){
			$sql = "INSERT INTO users (name, email, password) VALUES(?, ?, ?)";
			$this->setQuery($sql);
			$result = $this->execute(array($name, $email, ($password)));
				if($result){
					return $this->getLastId();
				} else {
					return false;
				}
		}
	}
?>