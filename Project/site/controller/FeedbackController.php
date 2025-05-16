<?php
class FeedbackController
{
    public function index()
    {
        // $productRepository=new ProductRepository();
        // $cond=[];
        // $sort=["featured"=>"DESC"];
        // $page=1;
        // $item_per_page=4;
        // //Lấy 4 sản phẩm nổi bật
        // $featuredProducts=$productRepository->getBy($cond,$sort,$page,$item_per_page);
        // //Lấy 4 sản phẩm mới nhất
        // $sort=["created_date"=>"DESC"];
        // $newestProducts=$productRepository->getBy($cond,$sort,$page,$item_per_page);
        // //Lấy tất cả danh mục và tất cả sản phẩm thuộc từng loại danh mục tương ứng
        // $categoryRepository=new CategoryRepository();
        // $categories=$categoryRepository->getAll();
        // $categoryProducts=[];
        // foreach($categories as $category){
        //     $cond=[
        //         "category_id"=>[
        //             "type"=>"=",
        //             "val"=>$category->getID()
        //         ]
        //         ];
        //     $products=$productRepository->getBy($cond,$sort,$page,$item_per_page);
        //     $categoryProducts[$category->getName()]=$products;
        // } 

        require "view/feedback/index.php";
    }
}