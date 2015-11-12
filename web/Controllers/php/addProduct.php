<?php 
	include_once('config.inc.php');
    
    $array["do"]="getBrandList";

    $brands;
    $brands_result = json_decode(get_data($config['host'] . 'BrandServlet', http_build_query($array), 'Content-Type: application/x-www-form-urlencoded'));
    if($brands_result->resultCode == RESULT::SUCCESS){
        $brands = $brands_result->content;
    }else{
        echo "sadsad";
    }



	$array["do"]="getSections";

    $sections;
    $sections_result = json_decode(get_data($config['host'] . 'SectionServlet', http_build_query($array), 'Content-Type: application/x-www-form-urlencoded'));
    if($sections_result->resultCode == RESULT::SUCCESS){
    	$sections = $sections_result->content;
    }else{
    	echo "sadsad";
    }

    echo $twig->render('pages/forms/general.html', array(
            'sections' => $sections,
            'brands' => $brands,
            'test' => "asdsa"
        ));
?>