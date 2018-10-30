<?php
//phuong thuc lay slide
	include('model/m_tintuc.php');
	class C_tintuc{
		public function index(){
			$m_tintuc = new m_tintuc();
			$slide = $m_tintuc->getSlide();
			$menu = $m_tintuc->getMenu();

			return array('slide'=>$slide, 'menu'=>$menu);
		}

		function loaitin(){
			$id_loai = $_GET['id_loai'];
			$m_tintuc = new M_tintuc();
			$danhmuctin = $m_tintuc->getTinTucByIdLoai($id_loai);
			$menu = $m_tintuc->getMenu();
			$title = $m_tintuc->getTitleById($id_loai);
			return array('danhmuctin'=>$danhmuctin, 'menu'=>$menu, 'title'=>$title);
		}
	}
?>