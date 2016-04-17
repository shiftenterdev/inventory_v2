<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Product;
use App\Repo\Repository\AjaxRepository;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    private $ajaxRepository;

    public function __construct(AjaxRepository $ajaxRepository)
    {
        $this->middleware('auth');
        $this->ajaxRepository = $ajaxRepository;
    }

    public function get_images()
    {
        $images = Image::all();
        return view('admin.layout.images')
            ->with(compact('images'));
    }

    public function post_upload_image(Request $request)
    {
        if (isset($_FILES['image'])) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $name = time() . '_' . uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['image']['tmp_name'], public_path('uploads/' . $name));
            $img['img_title'] = $name;
            Image::create($img);
            return 1;
        }
    }

    public function get_delete_image($id)
    {
        $this->ajaxRepository->deleteImage($id);
        return 1;
    }

    public function get_image_name($id)
    {
        $image = Image::where('id',$id)->first(['id','img_title']);
        return $image;
    }

    public function get_sub_category($id)
    {
        $categories = Category::where('cat_parent_id',$id)->get(['id','cat_title']);
        return $categories;
    }

    public function get_products($id)
    {
        $products = Product::where('pro_subcat_id',$id)->get(['id','pro_title']);
        return $products;
    }

    /*public function get_product_by_code($id)
    {
        $products = Product::where('pro_code',$id)->first();
        return $products;
    }*/

    public function post_sell_list(Request $request)
    {
        $input = $request->all();
        $this->ajaxRepository->productList($input,'sell_items');
        return 1;
    }

    public function get_sell_pro_update($q,$code)
    {
        $this->ajaxRepository->productUpdate($code,$q,'sell_items');
        return 1;
    }

    public function post_buy_list(Request $request)
    {
        $input = $request->all();
        $this->ajaxRepository->productList($input,'purchase_items');
        return 1;
    }

    public function get_purchase_pro_update($q,$code)
    {
        $this->ajaxRepository->productUpdate($code,$q,'purchase_items');
        return 1;
    }

    public function get_remove_sell_product($id)
    {
        $this->ajaxRepository->removeProduct('sell_items',$id);
        return 1;
    }

    public function get_remove_buy_product($id)
    {
        $this->ajaxRepository->removeProduct('purchase_items',$id);
        return 1;
    }

    public function get_customer_by_phone($phone)
    {
        $customer = Customer::where('customer_phone',$phone)->first();
        return $customer;
    }

    public function post_store_sell_customer(Request $request)
    {
        $input = $request->all();
        $this->ajaxRepository->storeCustomer($input,'sell_customer');
        return 1;
    }

    public function post_store_purchase_customer(Request $request)
    {
        $input = $request->all();
        $this->ajaxRepository->storeCustomer($input,'purchase_customer');
        return 1;
    }

}
