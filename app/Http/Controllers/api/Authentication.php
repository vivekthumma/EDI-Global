<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use Mail;
use App\Mail\ContactMail;
use App\Mail\UserForgetMail;
use App\Models\User;
use DB;
use Carbon\Carbon;


class Authentication extends Controller
{

            public function userregi(Request $request)
            {
                    $name =  $request->name;
                    $mobileno = $request->mobileno;
                    $email = $request->email;
                    $password = $request->password;
                    $token = $request->devicetoken;
                    $date = Carbon::now()->format('d-m-Y');

                    $mno = DB::table('users')->where('mno',$mobileno)->get();
                    if(count($mno))
                    {
                              return response()->json([
                              'status' => false,
                              'message' => 'Mobileno Already Used'
                              ]);
                    }
                    else{

                        $udata= DB::table('users')->insert(['name'=>$name,'mno'=>$mobileno,'email'=>$email,'password'=>Hash::make($password), 'date'=>$date,'device_token' => $token]);


                        if(!empty($udata))
                        {

                            return response()->json([
                                'status' => true,
                                'message' => 'Register Successfully',
                                
                            ]);
                        }
                        else
                        {
                            return response()->json([
                                'status' => false,
                                'message' => 'something wrong'
                    
                            ]);
                        }
                    }
                  
            }


            function userlog(Request $request)
            {

                $mno = $request->mobileno;
                $pwd = $request->password;
                
                $ldata = DB::table('users')->where('mno',$mno)->get();
                
                if(count($ldata))
                {
                    //echo "Mobile number found";
                      foreach($ldata as $value)
                    {
                        $password = $value->password;
                        $userstatus =$value->status;
                    }
                    
                    
                     if(Hash::check($pwd,$password))
                    {
                         if($userstatus == 1)
                         {
                               
                               $sdata = array();
        
                            foreach($ldata as $key => $value)
                            {
                                $sldata['id'] = $value->id;
                                $sldata['name'] = $value->name;
                                $sldata['mobileno'] = $value->mno;
                                $sldata['email'] = $value->email; 
                    
                                array_push($sdata,$sldata);
                            }
                        
                                return response()->json([
                                'status' => true,
                                'message' => 'Otp sended',
                                'user_status'=>$userstatus,
                                'data'=>$sdata
                                ]);     
                         }
                         else{
                                 return response()->json([
                                'status' => true,
                                'message' => 'You Are Blocked By Admin. Please Contact To Admin',
                                'user_status'=>$userstatus
                                ]);                             
                         }
                        
                    }
                    else
                    {
                        return response()->json([
                            'status' => false,
                            'message' => 'Password Not Match'
                        ]);
                    }
            
                    
                }
                else
                {
                        return response()->json([
                            'status' => false,
                            'message' => 'Mobile Number Not Found'
                        ]);                    
                }
             
            }

            // function checkotp(Request $request)
            // {
            //     $mno = $request->mobileno;
            //     $devicetoken = $request->devicetoken;

            //     $data = DB::table('users')->where('mobileno',$mno)->get();

            //     if(count($data))
            //     {
            //         $sms_code = random_int(111111,999999);

            //             DB::table('users')->where('mobileno',$mno)->update(array(

            //                                 'otp'=>$sms_code,

            //                             ));

                        

            //             $otp = DB::table('users')->where('mobileno',$mno)->get();

            //              $sdata = array();
        
            //                 foreach($otp as $key => $value)
            //                 {
            //                     $sldata['id'] = $value->id;
            //                     $sldata['name'] = $value->name;
            //                     $sldata['email'] = $value->email;
            //                     $sldata['mobileno'] = $value->mobileno; 
            //                     $sldata['otp'] = $value->otp;
                    
            //                     array_push($sdata,$sldata);
            //                 }
                        

            //             foreach($otp as $value)

            //             {

            //             $sms = $value->otp;

            //             $emails = $value->email;

            //             }
                        
            //             $details = [

            //                 'otp' =>$sms,

            //                 ];

            //             Mail::to($emails)->send(new ContactMail($details));

            //             DB::table('users')->where('mobileno',$mno)->update(array(

            //                                 'device_token'=>$devicetoken,

            //                             ));
                                        
            //            // return response()->json(['data'=>$sms,'status'=>true,'message'=>'mail send']);
            //            return response()->json(['data'=>$sdata,'status'=>true,'message'=>'OTP sent on your mail']);

            //     }else{
                        
            //             return response()->json(['status'=>false,'message'=>'Mobile Number Not Found']);
    
            //     }
               
            // }
            
            
            // public function changepassword(Request $req)
            // {
                
            //     $uid = $req->uid;
            //     $oldpwd = $req->oldpassword;
            //     $newpwd = $req->newpassword;
                
            //     $userpwddata = DB::table('users')->where('id',$uid)->get();
                
            //     if(count($userpwddata))
            //     {   
            //          foreach($userpwddata as $value)
            //         {
            //             $password = $value->password;
            //         }
                    
            //         if(Hash::check($oldpwd,$password))
            //         {
            //             DB::table('users')->where('id',$uid)->update(array(

            //                                 'password'=>Hash::make($newpwd),

            //                             ));
                                        
            //             return response()->json(['status'=>true,'message'=>'Password Change Successfully!!']);                
            //         }else{
                        
            //             return response()->json(['status'=>false,'message'=>'Old password Not Match']);
            //         }
                    
            //     }else{
                
            //         return response()->json(['status'=>false,'message'=>'Use Not Found']);

            //     }
            // }
            
            // public function userforgetpassword(Request $req)
            //  {
            //     $mno = $req->mobilenumber;
                
            //     $userdata = DB::table('users')->where('mobileno',$mno)->get();
                
            //     if(count($userdata))
            //     {
            //             foreach($userdata as $value)
            //             {
            //                 $id = $value->id;
            //                 $email = $value->email;
            //                 $token = $value->forgetpasstoken;    
            //             }
                        
            //             $details = [
            
            //                         'usertoken' =>$token,
            //                         'id' => $id,
        
            //                         ];
        
            //                     Mail::to($email)->send(new UserForgetMail($details));
                       
            //        return response()->json(['status'=>true,'message'=>'Please check your mail inbox!']);                
         
                    
            //     }else{
            //         return response()->json(['status'=>false,'message'=>'User Mobile Not Found!']);                

            //      }
            //  }

            public function userstatuscheck(Request $request)
            {
                $uid = $request->uid;
                // $status = $request->status;
            
                $statusdata = DB::table('users')->where('id',$uid)->get();
                
                foreach($statusdata as $value)
                {
                    $sdata = $value->status;
                }
                
                return response()->json(['data'=>$sdata, 'message'=>'User Status']); 
            }

            public function updateprofile(Request $request)
            {
                $uid = $request->uid;
                $name = $request->name;
                $mobileno = $request->mobileno;
                $email = $request->email;
                $password = $request->password;
                $newpassword = $request->newpassword;

                
                // $status = $request->status;
            
                $userdata = DB::table('users')->where('id',$uid)->get();
                
                
                
                if(count($userdata))
                {
                    
                    foreach($userdata as $value)
                    {
                        $pwd = $value->password;
                    }

                    if(Hash::check($password,$pwd))
                    {
                        if(!empty($newpassword))
                        {
                            DB::table('users')->where('id',$uid)->update(array(
                            'password' => Hash::make($newpassword)
                            ));
                        
                            return response()->json(['status'=>true,'message'=>'Password Change Successfully!']);
                        }
                        else
                        {
                            
                            DB::table('users')->where('id',$uid)->update(array(
                                'name'=>$name,
                                'mno'=>$mobileno,
                                'email'=>$email
                            ));
                        
                        return response()->json(['status'=>true,'message'=>'Profile Updated Successfully!']);
                        }
                        
                         
                    }
                    else{
                        return response()->json(['status'=>false,'message'=>'Password Not Match!']);
                    }
                }
                else{
                    return response()->json(['status'=>false,'message'=>'User Not Found!']);
                }    
            }
            
            
            
        


}