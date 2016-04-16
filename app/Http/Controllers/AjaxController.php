<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Image;
use App\Models\Customer;
use App\Models\Product;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        $image = Image::where('id',$id)->pluck('img_title');
        unlink(public_path('uploads/'.$image));
        Image::destroy($id);
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
        $true = false;
        $new = [];
        if(Session::has('sell_items')) {
            $current_list = Session::get('sell_items');

            foreach ($current_list as $cl) {
                if ($cl['pro_code'] == $input['pro_code']) {
                    $true = true;
                    $cl['pro_quantity']++;
                }
                $new[] = $cl;
            }
        }
        if($true == false) {
            $input['pro_title'] = CoreTrait::productTitleByCode($input['pro_code']);
            $input['pro_price'] = CoreTrait::productPriceByCode($input['pro_code']);
            $input['pro_quantity'] = 1;
            unset($input['_token']);
            Session::push('sell_items',$input);
        }else{
            Session::put('sell_items',$new);
        }

        return 1;
    }

    public function get_sell_pro_update($q,$code)
    {
        $new = [];
         if(Session::has('sell_items')) {
            $current_list = Session::get('sell_items');

            foreach ($current_list as $cl) {
                if ($cl['pro_code'] == $code) {
                    $cl['pro_quantity'] = $q;
                }
                $new[] = $cl;
            }
        }
        Session::put('sell_items',$new);
        return 1;
    }

    public function post_buy_list(Request $request)
    {
        $input = $request->all();
        $true = false;
        $new = [];
        if(Session::has('purchase_items')) {
            $current_list = Session::get('purchase_items');

            foreach ($current_list as $cl) {
                if ($cl['pro_code'] == $input['pro_code']) {
                    $true = true;
                    $cl['pro_quantity'] = $input['pro_quantity'];
                }
                $new[] = $cl;
            }
        }
        if($true == false) {
            $input['pro_title'] = CoreTrait::productTitleByCode($input['pro_code']);
            unset($input['_token']);
            Session::push('purchase_items',$input);
        }else{
            Session::put('purchase_items',$new);
        }

        return 1;
    }

    public function get_remove_sell_product($id)
    {
        $session = Session::get('sell_items');
        unset($session[$id]);
        Session::put('sell_items',$session);
        return 1;
    }

    public function get_remove_buy_product($id)
    {
        $session = Session::get('purchase_items');
        unset($session[$id]);
        Session::put('purchase_items',$session);
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
        unset($input['_token']);
        $input['customer_id'] = '';
        $customer = Customer::where('customer_phone',$input['customer_phone'])->first();
        if(!empty($customer)){
            $input['customer_id'] = $customer->customer_id;
        }
        Session::put('sell_customer',$input);
        return 1;
    }

    public function post_store_purchase_customer(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $input['customer_id'] = '';
        $customer = Customer::where('customer_phone',$input['customer_phone'])->first();
        if(!empty($customer)){
            $input['customer_id'] = $customer->customer_id;
        }
        Session::put('purchase_customer',$input);
        return 1;
    }

}
