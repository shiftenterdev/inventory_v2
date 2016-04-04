<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

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

}
