<?php 
	include_once('config.inc.php');
    
    $array["do"]="getProductList";
    $products;
    $products_result = json_decode(get_data($config['host'] . 'ProductServlet', http_build_query($array), 'Content-Type: application/x-www-form-urlencoded'));
    if($products_result->resultCode == RESULT::SUCCESS){
        $products = $products_result->content;
    }else{
        echo "sadsad";
    }
    echo $twig->render('pages/tables/products.html', array(
            'products' => $products
        ));
?>