<?php
namespace App\Http\Services;

use App\Models\Cart;

class CartService implements DAOInterface
{

    private Cart $cart;

    public function __construct(Cart $cart){
        $this->cart = $cart;
    }
    public function getAll()
    {
        return $this->cart->all();
    }

    public function getAllNotIn($id)
    {
        return Cart::whereNotIn('id', [$id])->get();
    }

    public  function findCartItem($product_id, $user_id) {
        return $this->cart->where('product_id', $product_id)->where('user_id', $user_id)->first();
    }

    public function getById($id)
    {
        return $this->cart->find($id);
    }

    public function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function update($data, $id)
    {
        $cart = $this -> cart->find($id);
        $cart->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id'],
        ]);
    }

    function delete($id)
    {
        $cart = $this -> cart->find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Xóa danh sản phẩm  thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm .');
        }



    }

    function search($value)
    {
        // TODO: Implement search() method.
    }

    public function create($data)
    {
        // TODO: Implement create() method.
        $cart =new Cart();
        $cart-> price = $data['price'];
        $cart-> quantity = $data['quantity'];
        $cart-> product_id = $data['product_id'];
        $cart-> user_id = $data['user_id'];
        $cart ->save();
    }
}
