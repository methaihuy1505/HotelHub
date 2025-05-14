<?php 
class ProductController{
    function index(){
        // $productRepository=new ProductRepository();
        // $conds=[];
        // $sorts=[];
        // $page=1;
        // $item_per_page=9;
        // $categoryRepository=new CategoryRepository();
        // $categories=$categoryRepository->getAll();
        // $categoryName="Tất cả sản phẩm";
        // //$category_id=!empty($_GET["category_id"])?$_GET["category_id"]:null;
        // $category_id=$_GET["category_id"]??null;
        // if($category_id){
        //     $conds=[
        //         "category_id"=>[
        //             "type"=>"=",
        //             "val"=>$category_id
        //         ]
        //         ];
        //     $category=$categoryRepository->find($category_id);
        //     $categoryName=$category->getName();
        // }
        // $price_range=$_GET["price-range"]??null;
        // if($price_range){
        //     $tmp=explode("-",$price_range);
        //     $start=$tmp[0];
        //     $end=$tmp[1];
        //     $conds=[
        //         "sale_price"=>[
        //             "type"=>"BETWEEN",
        //             "val"=>"$start AND $end"
        //         ]
        //     ];
        //     if($end=="greater"){
        //         $conds=[
        //             "sale_price"=>[
        //                 "type"=>">=",
        //                 "val"=>"$start"
        //             ]
        //         ];
        //     };
        // }
        // $products=$productRepository->getBy($conds,$sorts,$page,$item_per_page);
        require "view/product/index.php";
    }
}
?>