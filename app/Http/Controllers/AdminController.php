<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repo\Repository\MainRepository;

class AdminController extends Controller
{
    private $mainRepository;

    public function __construct(MainRepository $mainRepository)
    {
        $this->middleware('auth');
        $this->mainRepository = $mainRepository;
    }

    public function get_index()
    {
        $products = $this->mainRepository->getProductWithImage();
        $sells = $this->mainRepository->getTopSells();

        return view('admin.home')
            ->with(compact('products', 'sells'));
    }

    public function get_home()
    {
        return view('admin.dashboard');
    }
}
