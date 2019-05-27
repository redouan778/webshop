<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Product;
class Cart extends Model
{
    public $items;
    public $totalPrice;
    public $totalCount;


    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->items = session('cart', []);
        if($this->items == null) $this->items = [];
        session(['cart'=>$this->items]);
    }

    //Get products from session variable 'cart'. If the cart variable(products in cart) is not empty, calculate the total price.
    public function index()
    {
        return request()->session()->get('cart');
    }


    //Add product to cart if it doesn't exist in the cart yet. If it does exist, add one to the amount.
    public function addToCart($id)
    {
        //The id is already in the session and it will be
        if (array_key_exists($id, $this->items) ){
            $this->items[$id]['amount']  = $this->items[$id]['amount'] + 1;
        }else{
            $product = Product::find($id);
            //If the id doesn't is in the session, it will be
            if($product != null){
                $this->items[$id] = ['name'=> $product->name, 'price'=> $product->price, 'amount' => 1];
            }
        }

        session(['cart'=>$this->items]);
        $this->reCalculate();
    }

    //Get the total amount of all products
    public function getTotal()
    {
        $this->reCalculate();
       return $this->totalPrice;
    }


    public function reCalculate()
    {
        $this->totalPrice = 0;
        $this->totalCount = 0;

        foreach ($this->items as $item){
            $this->totalPrice = $this->totalPrice + ($item['price'] * $item['amount']);
            $this->totalCount = $this->totalCount + $item['amount'];
        }
    }


    //Remove product from the cart.
    public function removeFromCart($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $productsInCart = request()->session()->get('cart');
        foreach($productsInCart as $key => $productInCart)
        {
            if($productInCart->id == $id)
            {
                request()->session()->pull('cart.'.$key, 'default');
            }
        }
    }

    //Update the cart. Alter product amount according to the entered value in amount input.
    public function updateCart($request, $id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $productsInCart = request()->session()->get('cart');
        foreach($productsInCart as $productInCart)
        {
            if($productInCart->id == $id)
            {
                if($request->amount <= 0 || $request->amount == '')
                {
                    $this->removeFromCart($id);
                }else
                {
                    $productInCart->amount = $request->amount;
                }
            }
        }
    }
}
