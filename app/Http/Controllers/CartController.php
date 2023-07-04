<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu giỏ hàng từ session hoặc cơ sở dữ liệu
        $cartItems = session('cart', []);

        // Tính tổng giá trị giỏ hàng
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem['quantity'] * $cartItem['price'];
        }

        // Truyền dữ liệu giỏ hàng và tổng giá trị vào view
        return view('home.pages.cart', compact('cartItems', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::find($productId);

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Lấy dữ liệu giỏ hàng từ session
        $cartItems = session('cart', []);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (array_key_exists($productId, $cartItems)) {
            // Nếu đã có, tăng số lượng
            $cartItems[$productId]['quantity'] += 1;
        } else {
            // Nếu chưa có, thêm sản phẩm vào giỏ hàng
            $cartItems[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        // Lưu dữ liệu giỏ hàng vào session
        session(['cart' => $cartItems]);

        return redirect()->route('home.pages.cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function remove(Request $request, $productId)
    {
        // Lấy dữ liệu giỏ hàng từ session
        $cartItems = session('cart', []);

        // Kiểm tra xem sản phẩm có trong giỏ hàng không
        if (array_key_exists($productId, $cartItems)) {
            // Nếu có, xóa sản phẩm khỏi giỏ hàng
            unset($cartItems[$productId]);

            // Lưu dữ liệu giỏ hàng vào session
            session(['cart' => $cartItems]);

            return redirect()->route('home.pages.cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        }

        return redirect()->route('home.pages.cart')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }
}
