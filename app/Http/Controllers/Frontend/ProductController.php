<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\ProductRepository;
use App\Repositories\Backend\CategoryRepository;
use DB;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct() {
        $this->productRepository = new ProductRepository();
        $this->categoryRepository = new CategoryRepository();
    }

    public function index()
    {
        $productRepository = $this->productRepository->getList();
        $categoryRepository = $this->categoryRepository->all();
        return view('users.elements.product', compact('productRepository', 'categoryRepository'));
    }

    public function shortOld()
    {
        $productRepository = $this->productRepository->getListOld();
        $categoryRepository = $this->categoryRepository->all();
        $productRandom = DB::table('products')->inRandomOrder()->limit(6)->get();
        return view('users.elements.product', compact('productRepository','productRandom', 'categoryRepository'));
    }

    public function priceAsc()
    {
        $productRepository = $this->productRepository->getListPrice();
        $categoryRepository = $this->categoryRepository->all();
        $productRandom = DB::table('products')->inRandomOrder()->limit(6)->get();
        return view('users.elements.product', compact('productRepository','productRandom', 'categoryRepository'));
    }

    public function priceDesc()
    {
        $productRepository = $this->productRepository->getListPriceDesc();
        $categoryRepository = $this->categoryRepository->all();
        $productRandom = DB::table('products')->inRandomOrder()->limit(6)->get();
        return view('users.elements.product', compact('productRepository','productRandom', 'categoryRepository'));
    }

    public function getProductDetail(int $id)
    {
        $productRepository = $this->productRepository->getById($id);
        $productCategory = DB::table('products')
                 ->where('category_id', $productRepository->category_id)
                 ->paginate(12);
        $productRandom = DB::table('products')->inRandomOrder()->limit(6)->get();
        $imgs = explode('+img+', $productRepository->images);
        return view('users.elements.product_detail', compact('productRepository','productRandom', 'imgs', 'productCategory'));

    }
}
