<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo\CoreTrait;
use App\Models\Product;
use App\Models\Sell;
use App\Repo\Repository\MainRepository;
use Illuminate\Http\Request;

class AdminController extends Controller {

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
        	->with(compact('products','sells'));
    }

}
