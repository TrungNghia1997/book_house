<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Basket;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB;
use App\Repositories\Backend\UserRepository;
use Auth;

class cartController extends Controller
{
    private $basket;

    public function __construct( Basket $basket){
         $this->basket = $basket;
    }

    public function getAddCart($id){
    	$product = Product::find($id);
    	Cart::add([
			'id' => $id,
	 		'name' =>$product->name,
	 		'qty' => 1,
	 		'price' => $product->price,
	 		'weight' =>0,
	 		'options' => ['img' => $product->avatar,'price_sale' => $product->sale,]
    	]);
    	return redirect('cart/show');
    }

    public function getshowCart()
    {
    	$data['items'] = Cart::content();
        $data['initial'] = Cart::initial();
    	$data['total'] = Cart::total();
    	return view('users.elements.cart', $data);
    }

    public function getDeleteCart($id)
    {
    	if($id === 'all'){
    		Cart::destroy();
    	}else {
    		Cart::remove($id);
    	}
    	return back();

    }

    public function getUpdateCart(Request $request)
    {
    	Cart::update($request->rowId,$request->qty);
    }

    public function postshowCart(Request $request)
    {
        if(isset(Auth::user()->id)){
            $data = $request->all();
            $data['email'] = Auth::user()->email;
            $data['name'] = Auth::user()->name;
            $data['phone'] = Auth::user()->phone_number;
            $data['address'] = Auth::user()->address;
            $data['nameproduct']=implode("+", (array)$data['nameproduct']);
            $data['qty']=implode("+", (array)$data['qty']);

            if (empty($data)) {
                return back();
            }

            $this->basket->create($data);
            Cart::destroy();

            return redirect()->back()->with('alert','Thanh cong!');
        }
        else{
            return redirect('dang_nhap');
        }

    }


}
