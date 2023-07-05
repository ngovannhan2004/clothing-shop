<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private CartService $cartService;

    /**
     * Display a listing of the resource.
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService; // Initialize the $cartService property in the constructor
    }

    public function index()
    {
        $carts = $this->cartService->getAll();

        return view('admin.pages.cart', compact('carts'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $existingCartItem = $this->cartService->findCartItem($request->product_id, $request->user_id);

        if ($existingCartItem) {
            // Sản phẩm đã tồn tại trong giỏ hàng, tăng quantity
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng, tạo mới
            $data = [
                'name' => ucfirst($request->name),
                'price' => $request->price,
                'quantity' => $request->quantity,
                'product_id' => $request->product_id,
                'user_id' => $request->user_id
            ];
            $this->cartService->create($data);
        }

        return redirect()->route('home.pages.cart')->with('success', 'Thêm sản phẩm thành công');
    }

    public function create($product_id, $quantity) {
//        dd($product_id, $quantity);
        $existingCartItem = $this->cartService->findCartItem($product_id, Auth::user()->id);

        if ($existingCartItem) {
            // Sản phẩm đã tồn tại trong giỏ hàng, tăng quantity
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng, tạo mới
            $data = [
                'price' => 0,
                'quantity' => $quantity,
                'product_id' => $product_id,
                'user_id' => Auth::user()->id
            ];
            $this->cartService->create($data);
        }

        return redirect()->back();
    }



    public function update(UpdateCartRequest $request, Cart $cart, $id)
    {
        $existCart = $this->cartService->getById($id);
        if (empty($existCart)) {
            return redirect()->back();
        }
        $data = [
            'name' => ucfirst($request->name),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id
        ];

        $this->cartService->update($data, $id);

        $updatedCart = $this->cartService->getById($id);
        if (!empty($updatedCart) && isset($updatedCart->quantity)) {
            $updatedCart->quantity += $request->quantity;
            $updatedCart->save();
        }

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->cartService->delete($id);
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
}
