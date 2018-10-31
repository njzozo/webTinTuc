<?php
//phuong thuc lay slide
	include('model/m_tintuc.php');
	include('model/pager.php');

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

			$alias = $m_tintuc->getAliasLoaitin($id_loai);
			$danhmuctin = $m_tintuc->getTinTucByIdLoai($id_loai);
			$trang_hientai = (isset($_GET['page']))?$_GET['page']:1; //neu co truyen tham so page thi get tham so page do, nguoc lai default page = 1

			//phan trang
			$pagination = new pagination(count($danhmuctin), $trang_hientai, 6, 5); //co the truyen gia tri hoac de gia tri default
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai - 1)*$limit;
			$danhmuctin = $m_tintuc->getTinTucByIdLoai($id_loai, $vitri, $limit);

			$menu = $m_tintuc->getMenu();
			$title = $m_tintuc->getTitleById($id_loai);
			return array('danhmuctin'=>$danhmuctin, 'menu'=>$menu, 'title'=>$title, 'thanh_phantrang'=>$paginationHTML, 'alias'=>$alias);
		}

		function chitietTin(){
			$id_tin = $_GET['id_tin'];
			$alias = $_GET['loai_tin'];
			$m_tintuc = new M_tintuc();
			$chitietTin = $m_tintuc->getChitietTin($id_tin);
			$comment = $m_tintuc->getComment($id_tin);
			$relatednews = $m_tintuc->getRelatedNews($alias);
			$tinnoibat = $m_tintuc->getTinNoiBat();
			return array('chitietTin'=>$chitietTin, 'comment'=>$comment, 'relatednews'=>$relatednews, 'tinnoibat'=>$tinnoibat);
		}
	}
?>