<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\MenuService;
use App\Http\Services\ProductService;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    private ProductService $productService;
    private CategoryService $categoryService;
    private UserService $userService;
    private MenuService $MenuService;


    public function __construct(ProductService $productService, CategoryService $categoryService, UserService $userService, MenuService $MenuService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
        $this->MenuService = new $MenuService();
    }

    public function home()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        $menus = $this->MenuService->getAll();
        return view('home.layouts.home', compact(['products', 'categories','menus']));
    }

    public function login()
    {
        return view('home.layouts.login');
    }
    public function postLogin(Request $request)
    {
        $checkLogin = $this->userService->login($request);
        if ($checkLogin !== null) {
            auth()->login($checkLogin);
            return redirect()->to('/')->with('success', 'Đăng nhập thành công');
        } else {
            $message = 'Tài khoản hoặc mật khẩu không chính xác';
            return redirect()->route('login')->with('message', $message);
        }
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');

    }
    public function register(Request $request)
    {
        // Kiểm tra email đã tồn tại trong cơ sở dữ liệu hay chưa
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            // Email đã tồn tại, thông báo lỗi
            $errorMessage = 'Email đã được sử dụng. Vui lòng sử dụng email khác.';
            return redirect()->route('login')->with('error', $errorMessage);
        }

        // Tạo mới User và lưu thông tin
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        if ($user) {
            return redirect()->route('login')->with('success', 'Đăng kí thành công');
        } else {
            return redirect()->back()->with('error', 'Đăng kí thất bại');
        }
    }


    public function contact()
    {
        return view('home.pages.contact');
    }

    public function account()
    {
        return view('home.pages.account');
    }

    public function product()
    {

        $product = $this->productService->getAll();
        $categorie = $this->categoryService->getAll();
        return view('home.pages.product_single', compact(['product', 'categorie']));
    }

    public function shop_column()
    {
        $products = $this->productService->getAll();
        return view('home.pages.shop_4_column', compact(['products']));
    }

    public function cart()
    {
        return view('home.pages.cart');
    }

    public function wishlist()
    {
        $products = $this->productService->getAll();
        return view('home.pages.wishlist', compact(['products']));
    }

    public function shop_sidebar()
    {
        $tags = $this->categoryService->getAll();
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('home.pages.shop_left_sidebar', compact(['products', 'categories', 'tags']));
    }

    public function compare()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('home.pages.compare', compact(['products', 'categories']));
    }

    public function about()
    {
        return view('home.pages.about');
    }

    public function product_variable()
    {
        $product = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('home.pages.product_variable', compact(['product', 'categories']));
    }

    public function product_slider()
    {
        return view('home.pages.product_slider');
    }

    public function checkout()
    {
        return view('home.pages.checkout');
    }

    public function product_gallery()
    {
        return view('home.pages.product_gallery');
    }


    public function product_detail($slug)
    {
        $categories = $this->categoryService->getAll();
        $product = $this->productService->findBySlug($slug);
        $products = $this->productService->getAll();
        return view('home.pages.product_single', compact(['product', 'categories', 'products']));
    }
    public function error(){
        return view('home.pages.404');
    }



}
