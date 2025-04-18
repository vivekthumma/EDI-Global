<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use DB;
use File;

class NotificationController extends Controller
{
    //
    public function show()
	{
        
    	return view('notificationshow');
    }

    public function sendnotification(Request $req)
    {
        $req->validate([
            'message' => 'required',
        ]);

      $formdata = $req->all();

       $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
       
            
         $SERVER_API_KEY = 'xxxx-xxx-xxx';
    
          
      if ($req->file('notificationimage') == null) {
        $file = "";
        DB::table('notifications')->insert(['image'=>'' ,'message' => $formdata['message']]);
        
          $data = [
             "registration_ids" => $firebaseToken,
             "notification" => [
                 "title" => 'Test',
                 "body" => $req->message,  
             ],
         ];
         $dataString = json_encode($data);
      }
        else{
            
                  $imagedata = DB::table('notifications')->insertGetId(['image'=>$req->file('notificationimage')->store('notification','public') ,'message' => $formdata['message']]);
                    
                    $img = DB::table('notifications')->where('id',$imagedata)->get();
                    
                    foreach($img as $value)
                    {
                        $image = $value->image;
                    }
            
                $data = [
                     "registration_ids" => $firebaseToken,
                     "notification" => [
                         "title" => 'Test',
                         "body" => $req->message,  
                         "image" => url('/')."/storage/".$image,
                     ]
                 ];    
                 $dataString = json_encode($data);
                //  print_r($data);
                //  die();
        }

         
         
      
         $headers = [
             'Authorization: key=' . $SERVER_API_KEY,
             'Content-Type: application/json',
         ];
      
         $ch = curl_init();
        
         curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
         curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                 
         $response = curl_exec($ch);
        
        
            // echo json_encode($fields);
           $response = curl_exec($ch);
           //print_r($result);die;    
           echo curl_error($ch);
           if ($response === FALSE) {
               die('Curl failed: ' . curl_error($ch));
           }
           curl_close($ch);
        //   return $response;
        
        return back()->with('status', 'Notification send successfully.');

    }


    
}
