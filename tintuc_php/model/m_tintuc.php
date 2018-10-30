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

		function getTinTucByIdLoai($id_loaitin){
			$sql = "SELECT * FROM tintuc WHERE idLoaiTin = $id_loaitin";
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_loaitin));
		}

		function getTitleById($id_loaitin){
			$sql = "SELECT Ten FROM loaitin WHERE id = $id_loaitin";
			$this->setQuery($sql);
			return $this->loadRow(array($id_loaitin));
		}
	}
?>