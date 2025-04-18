<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DB;
use File;
use Mail;
use App\Mail\AdminForgetMail;

class LoginController extends Controller
{
    //
    public function show()
	{
    	return view('login');
    }
    public function checklogin(Request $request)
    {
    	$adata=Admin::select('*')->where('unm',$request->unm)->get()->first();

             if(!empty($adata)){


                if(Hash::check($request->pwd,$adata->pwd))
                {
                   
                    Session()->put('data',$request->input());

                    return redirect('/');
                }

                else{

            
                    return redirect('/login')->with('error','Something Went Wrong ');

                }
            }

            else{

            
            return redirect('/login')->with('error','Something Went Wrong ');

            }
    }  


    public function showprofile()
    {

        return view('adminprofileedit')->with('admin',Admin::all());
    }

    public function profileedit(Request $request)
    {
        $request->validate([
            'unm'=>'required',
            'email'=>'required',
          ]);

        $unm = $request->unm;
        $email = $request->email;

        if ($request->file('adminimage') == null) {
            $adminimage = "";
            DB::table('admin')->update([
                'unm' => $unm,
                'email' => $email
            ]);
            }
            else{
            //   File::delete(public_path('storage/'.$admin->image));
            $admindata = DB::table('admin')->get();
            foreach($admindata as $admins){
                File::delete(public_path('storage/'.$admins->image));
            }
              DB::table('admin')->update([
                'unm' => $unm,
                'email' => $email,
                'image' => $request->file('adminimage')->store('adminprofileimages','public')
            ]);

          }

          return redirect('logout')->with('success','Profile Updated !');    
        
    }

    public function adminpwdshow()
    {
        return view('adminchagepwd');
    }

    public function changepwd(Request $request)
    {
        $oldpwd = $request->oldpwd;
        $newpwd = $request->newpwd;
        $cpwd = $request->cpwd;

        $admin = Admin::find(1);

        if (Hash::check($oldpwd,$admin->pwd)) {
            if ($newpwd == $cpwd) {
                $admin->pwd = Hash::make($newpwd);
                $admin->save();
                return redirect('/adminchagepwd')->with('success','Password Changed !');
            }
            else{
                return redirect('/adminchagepwd')->with('error','Password Not Matched !');
            }
        }
        else{
            return redirect('/adminchagepwd')->with('error','Old Password Not Matched !');
        }

    }

    public function passwordrecovershow($token)
    {
        $ad=Admin::select('token')->where('id',1)->first();
        $dbtoken=$ad->token;

        if($dbtoken == $token)
        {
            return view('admin.passwordrecover');        
        }
        else
        {
            echo "Forget Password Link Expired!";
        }
        
    }

    public function passwordrecoverprocess(Request $req)
    {
        $newpwd=$req->newpassword;
        $newcpwd=$req->confirmpassword;
        
        if($newpwd == $newcpwd)
        {
            
            DB::table('admin')->where('id',1)->update(['pwd'=>Hash::make($newpwd)]);  
            $sms_code = random_int(111111,999999);

            DB::table('admin')->where('id',1)->update(array(

            'token'=>$sms_code,

        ));
            return redirect('admin/login')->with('success','Password Recovered. Login With New Password! ');
        }
        else
        {

            return back()->with('eroor','Confirm Password Not Matched ! ');
        }

    }
     
    public function forgetpassword(Request $req)
    {
        $req->validate([
            'email'=>'required',
            ]);
        $email = $req->email;
        
        $admindata = DB::table('admin')->where('email',$email)->get();
        
        if(count($admindata))
        {
                foreach($admindata as $value)
                {
                    $token = $value->token;    
                }
                
                $details = [

                            'admintoken' =>$token,

                            ];

                        Mail::to($email)->send(new AdminForgetMail($details));
                        
            return back()->with('success','Please check your mail inbox!');
            
        }else{
            return back()->with('error','Admin Email Not Found!');
            }
    }


}
