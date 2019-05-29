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
        //Retrieves all the data from the session.
        return request()->session()->get('cart');
    }


    //Add product to cart if it doesn't exist in the cart yet. If it does exist, add one to the amount.
    public function addToCart($id)
    {
        //The ID is already is in the session it will be incremented by 1.
        if (array_key_exists($id, $this->items) ){
            $this->items[$id]['amount']  = $this->items[$id]['amount'] + 1;
        }else{
            $product = Product::find($id);
            //if the ID doesn't exist, it will be incremented by 1.
            if($product != null){
                $this->items[$id] = ['id' => $product->id ,'name'=> $product->name, 'price'=> $product->price, 'amount' => 1];
            }
        }
        session(['cart'=>$this->items]);
        $this->reCalculate();
    }


    //Recalculate  the session total amount and total price,
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
        $productsInCart = request()->session()->get('cart');
        foreach($productsInCart as $key => $productInCart)
        {
            if($productInCart['id'] == $id)
            {
//                if ($productInCart['amount'] === 1) {
                    request()->session()->pull('cart.' . $key, 'default');
//                }else{
//                    $kill = $productInCart['amount'] --;
//                    print_r($productInCart['amount']);
//                    request()->session()->pull('cart.' . $kill . $key, 'default');
//                    print_r(session()->get('cart'));
//                    $this->reCalculate();
//                    die();
//                }
            }
        }
    }


    //Removes all the products from the cart.
    public function deleteAll()
    {
        request()->session()->forget('cart');
    }


    //Get the total amount of all products
    public function getTotal()
    {
        $this->reCalculate();
        return $this->totalPrice;
    }

    //
    public function getTotalCount()
    {
        $this->reCalculate();
        return $this->totalCount;
    }

}
