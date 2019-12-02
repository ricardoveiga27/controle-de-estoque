<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create(Request $request){
    
        $newProduct = new Product();
        $newProduct->name = $request-> nameProduct;
        $newProduct->discription = $request-> discription;
        $newProduct->quantity = $request-> quantity;
        $newProduct->price = $request-> price;
        $newProduct->user_id = Auth::user()->id;
      
        $result = $newProduct->save();
        
        return view('products.form', ["result" => $result]);

    }

    public function viewForm(Request $request){
        return view('products.form');
    }

    public function viewFormUpdate(Request $request, $id=0){
        $product = Product::find($id);
        if($product){
            return view('products.formUpdate',["product"=>$product]);
        } else {
            return view ('products.formUpdate');
        }
        
    }

    public function upDate(Request $request){
        //para atualizar devemos buscar um objeto ao invez de criar''
        //usando Products::find($idProduct)

        $product = Product::find($request->idProduct);
        $product->name = $request-> nameProduct;
        $product->discription = $request-> discription;
        $product->quantity = $request-> quantity;
        $product->price = $request-> price;
      
        $result = $product->save();
        
        return view('products.formUpdate', ["result" => $result]);
        
    }

    public function delete(Request $request, $id=0){
        $result = Product::destroy($id);
        if($result){
            return redirect('/produtos');
        }
    }

    public function viewAllProducts(Request $request){
        //vai pesquisar do Product::All()
        $listProducts = Product::all();
        return view ('products.products', ['listProducts'=>$listProducts]);

    }

    public function viewOneProduct(Request $request){
        //vai pesquisar do Product::find()
        
    }
}
