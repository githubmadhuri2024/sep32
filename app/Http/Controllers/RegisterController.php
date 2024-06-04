<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DB;
use App\Type;
use App\Plan;
use Session;
use App\Models\UserExtra;
use Helpers;

class RegisterController extends Controller
{

public function register(){
    return view('register');

}


public function registersubmit(Request $request){
   // echo "hiiiiiiiiiiiiiiiiiii";
    $test=validator::make($request->all(),[
       'username'=>'required|string',
       'email'=>'required|string',
       'mobile'=>'required|int',
       
       'cpassword'=>'required|string',
       'password'=>'required|string',
     
       ]);
    
       if($test->fails()){

       return view('register');
       }
       else{
        echo "hgggggggggggggggggg";
       
      $data=$request->input();
     
      try{
       $referall=$data['rferral'];

    
     if($referall){
      $userdetails = User::where('login_id', $referall)->orWhere('username',  $referall)
      ->first();
      $userid=$userdetails['id'];
     if($userdetails){
     $txnpin = mt_rand(1111,9999);
     $user = new User();
     $user->ref_id       = $userid;
     $user->pos_id       = '0';
     $user->position     = '0';
     $user->firstname    = isset($data['fname']) ? $data['fname'] : null;
     $user->lastname     = isset($data['lastname']) ? $data['lastname'] : null;
     $user->email        = strtolower(trim($data['email']));
     $user->password     = $data['password'];
     $user->conform_password     = $data['password'];
     $user->new_password     = $data['password'];
     $user->activeplan     = '1';
     $user->txn_pin     = '';
     $user->level     = '1';
     $user->level_data='';  
     $user->plan_id='[]';            
     $user->status='0';            
     $user->p1='0';            
     $user->p2='0';            
     $user->p3='0';            
     $user->l1='0';            
     $user->l2='0';            
     $user->l3='0';  
     $user->address= $data['address'];
     $user->state= $data['state'];
     $user->city= $data['city'];
     $user->zipcode= $data['zipcode'];
 
                  
               
     $user->username     = trim($data['username']);
     $user->mobile       =  isset($data['mobile']) ? $data['mobile'] : null;
    
 $user->save();
 $useridd =$user->id;
 $six_digit_random_number = random_int(100000, 999999);
 $login_id=str_pad($useridd, 8, '0', STR_PAD_LEFT);
 
 $login_id='SEP'.$login_id;
 DB::table('users')
 ->where('id', $useridd)
 ->update(['login_id' => $login_id]);
 $level='1';

    $selectquery=DB::select("SELECT * FROM `users` WHERE `login_id`='$login_id'");

    $Count = count($selectquery);


         foreach($selectquery as $value){

         
         $rowemail=$value->email;
         $uid=$value->id;
         
         $rowpass=$value->password;
         $rowpass=$value->password;
         $firstname=$value->firstname;
         $lastname=$value->lastname;
         $username=$value->username;
         $balance=$value->balance;
         $userid=$value->id;
         $plan_id=$value->plan_id;
         $activeplan=$value->activeplan;
         $login_id=$value->login_id;
         $dps=$value->total_binary_com;

         
         
         }
           Session::put('variableName', $value);
       $request->session()->put('email',$rowemail); 
       $request->session()->put('uid',$uid); 
     
       $request->session()->put('firstname',$firstname); 
       $request->session()->put('lastname',$lastname); 
       $request->session()->put('username',$username); 
       $request->session()->put('balance',$balance); 
       $request->session()->put('userid',$userid); 
       $request->session()->put('plan_id',$plan_id); 
       $request->session()->put('activeplan',$activeplan); 
       $request->session()->put('activeplanid',$activeplan); 
       
       $request->session()->put('login_id',$login_id); 
       $request->session()->put('dps',$dps); 
     
       $email=Session::get('email');
       $login_id=Session::get('login_id');
       
       return redirect()->intended('userdashboard')->with('message',"User registered success2fully");   
      }else{
       return redirect('register')->with('status','Please Check Referalid');
   
      }
     
     }
     else{
       $txnpin = mt_rand(1111,9999);
       $leveldata = array();
     //  $leveldatajson=json_encode($leveldata,true);
     
     $user = new User();
     $user->ref_id       = '0';
     $user->pos_id       = '0';
     $user->position     = '0';
     $user->firstname    = isset($data['fname']) ? $data['fname'] : null;
     $user->lastname     = isset($data['lastname']) ? $data['lastname'] : null;
     $user->email        = strtolower(trim($data['email']));
     $user->password     = $data['password'];
     $user->conform_password     = $data['password'];
     $user->new_password     = $data['password'];
     $user->activeplan     = '1';
     $user->txn_pin     = '';
     $user->level     = '1';
     $user->level_data='';    
     $user->plan_id='[]';            
     $user->status='0';  
     
     $user->p1='0';            
     $user->p2='0';            
     $user->p3='0';            
     $user->l1='0';            
     $user->l2='0';            
     $user->l3='0';            
   
            
     $user->username     = trim($data['username']);
     $user->mobile       =  isset($data['mobile']) ? $data['mobile'] : null;
    
 $user->save();
 $useridd =$user->id;
 $six_digit_random_number = random_int(100000, 999999);
 $login_id=str_pad($useridd, 8, '0', STR_PAD_LEFT);
 $login_id='SEP'.$login_id;

 DB::table('users')
 ->where('id', $useridd)
 ->update(['login_id' => $login_id]);
 $level='1';
   $selectquery=DB::select("SELECT * FROM `users` WHERE `login_id`='$login_id'");

   $Count = count($selectquery);


        foreach($selectquery as $value){

        
        $rowemail=$value->email;
        $uid=$value->id;
        
        $rowpass=$value->password;
        $rowpass=$value->password;
        $firstname=$value->firstname;
        $lastname=$value->lastname;
        $username=$value->username;
        $balance=$value->balance;
        $userid=$value->id;
        $plan_id=$value->plan_id;
        $activeplan=$value->activeplan;
        $login_id=$value->login_id;
        $dps=$value->total_binary_com;

        
        
        }
Session::put('variableName', $value);
$request->session()->put('email',$rowemail); 
$request->session()->put('uid',$uid); 

$request->session()->put('firstname',$firstname); 
$request->session()->put('lastname',$lastname); 
$request->session()->put('username',$username); 
$request->session()->put('balance',$balance); 
$request->session()->put('userid',$userid); 
$request->session()->put('plan_id',$plan_id); 
$request->session()->put('activeplan',$activeplan); 
$request->session()->put('activeplanid',$activeplan); 

$request->session()->put('login_id',$login_id); 
$request->session()->put('dps',$dps); 

$email=Session::get('email');
$login_id=Session::get('login_id');

$userdetails=userdetails($uid);

//active plan id
$activeplanid=$userdetails->activeplan;
$clubcheck=$userdetails->clubcheck;


if($clubcheck=='0'){
  $psotionsfilled=clubbyoneusers($userid,'1','1','1');
    if(count($psotionsfilled)=='4'){
      DB::table('users')
      ->where('id', $userid)
      ->update(['clubcheck' =>'1']);
    
    }
   
}
return redirect()->intended('userdashboard')->with('message',"User registered success2fully");   


   }

       
        

           }

           catch(Exception $e){
               return view('register')->with('status','failed');

           }
       }
     

}


}
