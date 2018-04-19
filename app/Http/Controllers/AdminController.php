<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Product;
use App\Models\Table;
use App\Repo\Repository\MainRepository;
use App\Models\User;

class AdminController extends Controller
{
    private $mainRepository;

//    public function __construct(MainRepository $mainRepository)
//    {
//        $this->middleware('auth');
//        $this->mainRepository = $mainRepository;
//    }

//    public function get_index()
//    {
//        $products = $this->mainRepository->getProductWithImage();
//        $sells = $this->mainRepository->getTopSells();
//
//        return view('admin.home')
//            ->with(compact('products', 'sells'));
//    }

    public function get_home()
    {
        $products = Product::count();
        $brands = Brand::count();
        $categories = Category::count();
        $customers = Customer::count();
        $users = User::count();
        return view('admin.dashboard')->with([
            'products'   => $products,
            'brands'     => $brands,
            'users'      => $users,
            'categories' => $categories,
            'customers'  => $customers,
            'tables'=>Table::count(),
            'foods'=>Food::count()
        ]);
    }
}
