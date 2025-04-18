<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Admin;
use App\Models\User;
use App\Models\Slider;
use App\Models\Popup;
use App\Models\Category;
use App\Models\Coupan;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;

class DefaltController extends Controller
{
       

////////////////////////////  Greenland Api ///////////////////////////////

    

    public function getslider()
    {
        $slider = Slider::where('status',1)->get();

        $data = array();
        
        foreach($slider as $key => $value)
        {
            $sliderdata['id'] = $value->id;
            $sliderdata['image'] = url('/')."/storage/".$value->image;
            $sliderdata['link'] = $value->link;
            $sliderdata['status'] = $value->status;

            array_push($data,$sliderdata);
        }
        
        if($data == null || $data == '')
        {
            return response()->json([
                'status' => false,
                'message' => 'No Record Found',
                
             ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'message' => 'Slider List',
                'data' => $data
             ]);
        }
       
    }

    public function getpopup()
    {
        $popup = Popup::where('status',1)->get();

        $data = array();
        
        foreach($popup as $key => $value)
        {
            $popupdata['id'] = $value->id;
            $popupdata['image'] = url('/')."/storage/".$value->image;
            $popupdata['status'] = $value->status;

            array_push($data,$popupdata);
        }
        
        if($data == null || $data == '')
        {
            return response()->json([
                'status' => false,
                'message' => 'No Record Found',
                
             ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'message' => 'Popup List',
                'data' => $data
             ]);
        }
       
    }
    
    public function gethomepage(Request $request)
    {
        
        $uid = $request->uid;
        
        $statusdata = DB::table('users')->where('id',$uid)->get();
                
                foreach($statusdata as $value)
                {
                    $usdata = $value->status;
                }
        
        $popup = Popup::where('status',1)->get();

        $pdata = array();
        
        foreach($popup as $key => $value)
        {
            $popupdata['id'] = $value->id;
            $popupdata['image'] = url('/')."/storage/".$value->image;
            $popupdata['status'] = $value->status;

            array_push($pdata,$popupdata);
        }
        
        
        $sdata = Slider::where('status',1)->get();

        $slider = array();
        
        foreach($sdata as $key => $value)
        {
            $sliderdata['id'] = $value->id;
            $sliderdata['image'] = url('/')."/storage/".$value->image;
            $sliderdata['link'] = $value->link;
            $sliderdata['status'] = $value->status;

            array_push($slider,$sliderdata);
        }
        
        $catdata = Category::all();
        
        $category = array();
        foreach($catdata as $key => $value)
        {
            $categorydata['id'] = $value->id;
            $categorydata['name'] = $value->name;

            array_push($category,$categorydata);
        }
        
        $subcategory = Subcategory::all();
        
        $subcatproductdata = array();
        for($i=0; $i < sizeof($subcategory); $i++)
        {
            $data_subcategory['id'] = strval($subcategory[$i]['id']);
            $data_subcategory['name'] = !empty($subcategory[$i]['name'])?$subcategory[$i]['name']:"";
            
            
           $curfestsubimg =  DB::table('products')->where('subcatid',strval($subcategory[$i]['id']))->where('status',1)->get();
            
            
            $sproductdata = array();
            foreach($curfestsubimg as $key => $value) 
            {
            $l['id']=$value->id;
            $l['name']=$value->name;
            $l['image']=url('/')."/storage/".$value->image;
            $l['price']=$value->price;
            $l['discountprice']=$value->discountprice;  
            $l['description']=$value->description;  
            array_push($sproductdata,$l);
            }
            $data_subcategory['Product']=$sproductdata;
            array_push($subcatproductdata, $data_subcategory);
        }
        
        
        
        if($pdata == null || $pdata == '')
        {
            return response()->json([
                'user_status'=>$usdata,'popup'=>[],'slider' => $slider, 'Category' => $category,'subcategory'=>$subcatdata,'status' => true,'message'=>'home page data']);
        }
        else
        {
           return response()->json(['user_status'=>$usdata,'popup'=>$pdata,'slider' => $slider, 'Category' => $category,'subcategory'=>$subcatproductdata,'status' => true,'message'=>'home page data']);
        
        }
        
    }
    
    
    public function getsubcategory(Request $request)
    {
        $catid = $request->catid;
        
        $subcategory = Subcategory::where('catid',$catid)->get();
        
        $data = array();
        
        foreach($subcategory as $key => $value)
        {
            $subdata['id'] = $value->id;
            $subdata['name'] = $value->name;
            $subdata['image'] = url('/')."/storage/".$value->image;
            

            array_push($data,$subdata);
        }
        
        if($data == null || $data == '')
        {
            return response()->json([
                'status' => false,
                'message' => 'No Record Found',
                
             ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'message' => 'SubCategory List',
                'data' => $data
             ]);
        }
    }

    public function getsubcatproduct(Request $request)
    {
        $subcatid = $request->subcatid;
        
        $subcatproduct = Product::where('subcatid',$subcatid)->where('status',1)->get();
        
        $data = array();
        
        foreach($subcatproduct as $key => $value)
        {
            $subpdata['id'] = $value->id;
            $subpdata['name'] = $value->name;
            $subpdata['image'] = url('/')."/storage/".$value->image;
            $subpdata['price'] = $value->price;
            $subpdata['discountprice'] = $value->discountprice;
            $subpdata['description'] = $value->description;
            

            array_push($data,$subpdata);
        }
        
        if($data == null || $data == '')
        {
            return response()->json([
                'status' => false,
                'message' => 'No Record Found',
                
             ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'message' => 'SubCategory List',
                'data' => $data
             ]);
        }
    }
    
    
    
    public function getcoupan(Request $request)
    {
        $coupan =  $request->coupan;
        $coupandata = Coupan::where('coupanname',$coupan)->where('status',1)->get();

        $data = array();
        
        foreach($coupandata as $key => $value)
        {
            // $cdata['id'] = $value->id;
            // $cdata['coupanname'] = $value->coupanname;
            $cdata['discountprice'] = $value->discountprice;

            array_push($data,$cdata);
        }
        
        if($data == null || $data == '')
        {
            return response()->json([
                'status' => false,
                'message' => 'Coupan Not Valid',
                
             ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'message' => 'Discountprise',
                'data' => $data
             ]);
        }
    }

    
    
    public function getproductimage(Request $request)
    {
        $pid = $request->pid;
        
    //   $productdata = DB::table('products')
    //                     ->join('product_images','product_images.pid','=','products.id')
    //                     ->select('products.image as images','product_images.image')
    //                     ->where('products.id',$pid)
    //                     ->get();
       
       
      $productdata = DB::table('products')->where('id',$pid)->get();
       
       
       $data = array();
       foreach($productdata as $key => $value)
       {
          $p['image'] = url('/')."/storage/".$value->image;
          $pdata = DB:: table('product_images')->where('pid',$value->id)->get();     
          $idata = array();
          foreach($pdata as $key => $value)
          {
              $i['image'] = url('/')."/storage/".$value->image;
              array_push($idata,$i);
          }
          $p['images'] = $idata;
          array_push($data,$p);
       }
       
       if($data == null || $data == '')
        {
            return response()->json([
                'status' => false,
                'message' => 'No Record Found',
                
             ]);
        }
        else
        {
            return response()->json([
                'status' => true,
                'message' => 'Product Image List',
                'data' => $data
             ]);
        }
       
    }
    
    
    
    public function getmainorders(Request $request)
    {
        $uid = $request->uid;
        
        $userdata = DB::table('users')->where('id',$uid)->get();
    
        if(count($userdata))
        {
            
            $orderdata = Order::where('uid',$uid)->groupBy('orderid')->get();
            //echo $orderdata;
            //die();
            $data = array();
            foreach($orderdata as $key => $value)
            {
                $o['id'] = $value->id;
                $o['orderid'] = $value->orderid;
                $o['date'] = $value->date;
                $o['totalorder'] = Order::where('uid',$uid)->groupBy('orderid')->count();
                
                array_push($data,$o);
            }
            
            
            return response()->json([
                'status' => true,
                'message' => 'Order List',
                'data' => $data
             ]);
            
        }
        else
        {
               return response()->json([
                'status' => false,
                'message' => 'User Not Valid',
                
             ]); 
        }
    }
    
    
    public function getorders(Request $request)
    {
        
            $uid = $request->uid;
            $orderid = $request->orderid;
            
            
            
         $orderdata = Order::where('uid',$uid)->where('orderid',$orderid)->get();
            $data = array();
            for($i=0; $i < sizeof($orderdata); $i++)
            {
                // $data_order['id'] = strval($orderdata[$i]['id']);
                
                $product = DB::table('products')->where('id',strval($orderdata[$i]['pid']))->get();
                
                $pdata = array();
            
                foreach($product as $key => $value)
                {
                    $p['id'] = $value->id;
                    $p['name'] = $value->name;
                    $p['price'] = $value->price;
                    $p['image'] = url('/')."/storage/".$value->image;
                    array_push($pdata,$p);
                }
            
                 $data_order['product'] = $pdata;
                array_push($data, $data_order);
            }
            
            
            return response()->json([
                'status' => true,
                'message' => 'Order Product List',
                'data' => $data
             ]);
            
            
    }
    
}
