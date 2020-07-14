<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    // ham xuat danh sach danh muc
    public function all_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();
         $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
         return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
        // return view('admin.all_category_product')->with('all_category_product',$all_category_product);
    }


    // ham them du lieu danh muc
    public function save_category_product(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','addProductCategory hasbeen successfull');
        return Redirect::to('/add-category-product');

    }

    public function unactive_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','UNACTIVE success');
        return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','ACTIVE success');
        return Redirect::to('all-category-product');
    }
        //   sua category
    public function edit_category_product($category_product_id)
    {
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);

        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
       
    }
    public function update_category_product(Request $request , $category_product_id)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Edit category has  been successfull');
        return Redirect::to('all-category-product');
    }
    //   end sua category

    public function delete_category_product($category_product_id)
    {
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
            Session::put('message','Delete has been successfully');
            return Redirect::to('all-category-product');
    }

}
