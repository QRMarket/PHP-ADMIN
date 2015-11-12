<?php 
	header('Content-type: application/json');
	include_once('config.inc.php');

	print_r($_FILES);

	$array["do"]="addProduct";
	if($_POST["product_brand"]){
		$array['brand_id']=$_POST["product_brand"];
	}
	$array['name']=$_POST["product_name"];
	if($_POST["product_code"]){
		$array['bracode']=$_POST["product_code"];
	}
	if($_POST["product_desc"]){
		$array['desc']=$_POST["product_desc"];
	}
	if($_POST["product_section"]){
		$array['section_id']=$_POST["product_section"];
	}
	if($_FILES["product_image"]){
		$tmpfile = $_FILES['product_image']['tmp_name'];
		$filename = basename($_FILES['product_image']['name']);
		$array["files"] = $_FILES['product_image'];
	}else{
		echo "lkşkşki";
	}
var_dump($array);
   echo get_data($config['host'] . 'ProductServlet', $array, 'Content-Type: multipart/form-data');
    
?>