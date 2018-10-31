<?php

	include('database.php');
	class M_tintuc extends database{
		function getSlide(){
			$sql = "SELECT * FROM slide";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function getMenu(){
			$sql = "SELECT tl.*, GROUP_CONCAT(Distinct lt.id,':', lt.Ten,':', lt.TenKhongDau) as LoaiTin, tt.id as idTin, tt.TieuDe as TieuDeTin, tt.Hinh as HinhTin, tt.TomTat as TomTatTin, tt.TieuDeKhongDau as TieuDeKhongDauTin FROM theloai tl INNER JOIN loaitin lt ON lt.idTheloai = tl.id INNER JOIN tintuc tt  ON tt.idLoaiTin = lt.id GROUP BY tl.id";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		//phan trang
		function getTinTucByIdLoai($id_loaitin, $vitri = -1, $limit = -1){			
			$sql = "SELECT * FROM tintuc WHERE idLoaiTin = $id_loaitin";
			if($vitri > -1 && $limit > 1){
				//neu truyen vi tri va limit thi noi chuoi voi chuoi $sql
				$sql .= " limit $vitri,$limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_loaitin));
		}

		function getTitleById($id_loaitin){
			$sql = "SELECT Ten FROM loaitin WHERE id = $id_loaitin";
			$this->setQuery($sql);
			return $this->loadRow(array($id_loaitin));
		}

		function getChitietTin($id){
			$sql = "SELECT * FROM tintuc WHERE id = $id";
			$this->setQuery($sql);
			return $this->loadRow(array($id));
		}

		function getComment($id_tin){
			$sql = "SELECT * FROM comment WHERE idTinTuc = $id_tin";
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_tin));
		}

		function getRelatedNews($alias){
			$sql = "SELECT tt.*, lt.TenKhongDau as TenKhongDau, lt.id as idLoaitin FROM tintuc tt INNER JOIN loaitin lt ON tt.idLoaiTin = lt.id WHERE lt.TenKhongDau = '$alias' limit 0, 5";
			$this->setQuery($sql);
			return $this->loadAllRows(array($alias));
		}

		function getAliasLoaitin($id_loaitin){
			$sql = "SELECT TenKhongDau FROM loaitin WHERE id = $id_loaitin";
			$this->setQuery($sql);
			return $this->loadRow(array($id_loaitin));
		}

		function getTinNoiBat(){
			$sql = "SELECT tt.*, lt.TenKhongDau as TenKhongDau, lt.id as idLoaitin FROM tintuc tt INNER JOIN loaitin lt ON tt.idLoaiTin = lt.id WHERE tt.NoiBat = 1 limit 0, 5";
			$this->setQuery($sql);
			return $this->loadAllRows(array());
		}
	}
?>