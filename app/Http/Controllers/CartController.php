<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return view('cart', compact('cart'));
    }

    public function add(Request $request){
        $product = $request->get('product');
        //dd(session());

        //verificar se existe sessão para o produto
        if(session()->has('cart')){
            // Existindo ou adiciono o produto nesta sessão
            session()->push('cart', $product);
        } else {
            //não existindo eu crio a sessão com o primeiro produto
            $products[] = $product;

            session()->put('cart', $products);
        }

        flash('Produto adicionado no carrinho!')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }
}
