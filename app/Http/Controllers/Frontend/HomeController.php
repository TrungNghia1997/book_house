<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\ProductRepository;
use App\Repositories\Backend\CategoryRepository;
use App\Models\Basket;
use DB;
use Auth;

class HomeController extends Controller
{
	private $productRepository;
    private $categoryRepository;
    private $basket;

    public function __construct() {
        $this->productRepository = new ProductRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->basket = new Basket();
    }

    public function index(){
        $productRepository = $this->productRepository->all();
        $categoryRepository = $this->categoryRepository->all();
        $productSale = DB::table('products')->limit(4)->orderBy('sale', 'desc')->get();
        $product_new = DB::table('products')->limit(8)->orderBy('id', 'desc')->get();
    	return view('users.elements.home', compact('productRepository', 'categoryRepository','productSale','product_new'));
    }

    public function search() {
        if($_GET['search']){
            $search = $_GET['search'];
            $productRepository = $this->productRepository->getSearch($search);
            return view('users.elements.search', compact('productRepository', 'search'));
        }
        else {
            return redirect()->back()->with('alert', 'Không có thông tin về sản phẩm này');
        }
    }

    public function getSale()
    {
        $productRepository = DB::table('products')
                        ->where('sale','>', 0)
                        ->get();
        $productRandom = DB::table('products')->inRandomOrder()->limit(6)->get();
        $categoryRepository = $this->categoryRepository->all();
        return view('users.elements.sale', compact('productRepository', 'productRandom', 'categoryRepository'));
    }
}
