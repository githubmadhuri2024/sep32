<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Session;
use App\Models\Transactions;
use App\Models\Deposits;
use App\Models\Withdrawals;
use App\Models\Dps;
use App\Models\FundTransfer;

use App\Models\UserExtra;
use Helpers;
use Carbon\Carbon;

class UserController extends Controller
{

public function login(){
 return view('login');   
}



public function loginpost(Request $request){
  //  echo "loginpost";
  $test=Validator::make($request->all(),[
    'email'=>'required|string',
    'password'=>'required|string'
     ]);
     if($test->fails()){
   
      return redirect('login')
      ->withInput()
      ->withErrors($test);
  

     }
     else{
      

    $email= $request->input('email');
    $password= $request->input('password');
  // echo "SELECT * FROM `users` WHERE `login_id`='$email' or `username`='$email'";
//    exit;

       $selectquery=DB::select("SELECT * FROM `users` WHERE `login_id`='$email' or `username`='$email'");

       $Count = count($selectquery);


            if($Count=='1'){
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
            $txn_pin=$value->txn_pin;
$level=$value->level;

            
            
            }
if($password==$rowpass){
    Session::put('variableName', $value);
$request->session()->put('email',$rowemail); 
$request->session()->put('uid',$uid); 

$request->session()->put('firstname',$firstname); 
$request->session()->put('lastname',$lastname); 
$request->session()->put('username',$username); 
$request->session()->put('balance',$balance); 
$request->session()->put('userid',$userid); 
$request->session()->put('plan_id',$plan_id); 
$request->session()->put('activeplan',plannamebyid($activeplan)); 
$request->session()->put('activeplanid',$activeplan); 

$request->session()->put('login_id',$login_id); 
$request->session()->put('dps',$dps); 

$request->session()->put('txn_pin',$txn_pin); 
$request->session()->put('level',$level); 


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

   return redirect()->intended('userdashboard');   

}
else{
    $request->session()->flash('error','please enter login details');
    return redirect('login');
}

}
else{
    $request->session()->flash('error','please enter login details');
    return redirect('login');
}
     }
}

public function usernamecheck(Request $request){
    $getusername=$request->get('username');

    $usernamelist=User::where('username','like','%'.$getusername.'%')->get();
    $count=count($usernamelist);
    if($count>0){
        $resp='1';
    }
    else{
        $resp='0';
    }
    return $resp;
    

}

public function referaldetails(Request $request){
                                
    $username=$request->get('referal');
  //echo $username;
   $posts=User::where('login_id', '=',$username)->get();
  // echo $posts['0']['login_id'];
   $count=count($posts);
 //echo $count;
   if($count>0){
   $resp=$posts['0']['username'];
   }else{
   $resp='no';
   
   }
   return $resp;   
   }



  
   public function productone(){
    $product_one=DB::select("SELECT * FROM `plans`  where type_id='1'");
    return view('user.product1',['productone'=>$product_one]);
    }

    public function producttwo(){
      return view('user.product2');
    }

    public function productthree(){
      return view('user.product3');
    }


    public function subscribeplan(){
      $userid=Session::get('userid');
      $userdata = User::where('id', $userid)->first();
      $plan=$userdata->activeplan;
      $level_data=json_decode($userdata->plan_id,true);
      $plans=DB::select("SELECT  id,name  FROM `plans_new` where status='1'");
      $plansdata=array();
      
      foreach($plans as $plan){
          $pid= $plan->id;
          $plansdataarray=array();
          $plansdataarray['planid']=$pid;
          $plansdataarray['name']=$plan->name;
          if($pid=='1'){

              $plansdataarray['status']=$userdata->p1;
           
          }else if($pid=='2'){
              $plansdataarray['status']=$userdata->p2;
         
          }else if($pid=='3'){
              $plansdataarray['status']=$userdata->p3;
         
          }
          $plansdata[]=$plansdataarray;
    
  
      }  
      $rep=array();
      $rep['plandatadetails']=$plansdata;
          $rep['planids']=$level_data;
   
      
      return view('user/subcribeplan',['usersubcribeplan'=>$rep['plandatadetails']]);
  }




  
  public function subscribe(Request $request, $plan_id){
    $userid=Session::get('userid');
    $userdata = User::where('id', $userid)->first();
    $balance=$userdata['balance'];
   // echo  $plan_id;
    if($plan_id=='1'){
        $planamount='23';
        $pland='sep-23';
    }
    if($plan_id=='2'){
        $planamount='100';
        $pland='sep-23';
    
    }
    if($plan_id=='3'){
        $planamount='500';
        $pland='sep-23';
    
    }
     if($balance> $planamount){
    $uplans=usertotalplan($userid);

    $ulevels=usertotallevels($userid);
    if(!empty($ulevels)){
    if(array_key_exists($plan_id,$ulevels)){
    }
    else{
        $ulevels[$plan_id]='1';
    }
}else{
    $ulevels[$plan_id]='1';

}
    $level_data=json_encode($ulevels,true);


    if(!in_array($plan_id,$uplans['planids'])){
        $uplans['planids'][]=$plan_id;
    }
    $plans=json_encode($uplans['planids'],true);

 $updateplan=DB::update("UPDATE `users` SET `plan_id`='$plans',`level_data`='$level_data' where id='$userid'");
 $level_db_count=   DB::table('level_1s')
->where('user_id', $userid)->get();
if($plan_id=='1'){
$updateplan=DB::update("UPDATE `level_1s` SET `plan_id`='$plans'  where user_id='$userid' and plan_id='1'");
 
}else{
$ref_id= $userdata['ref_id'];
if($ref_id=='0' or $ref_id ==null){
    $data=array('user_id'=>$userid,'ref_id'=>$userdata['ref_id'],"pos_id"=>'0',"position"=>'0',"plan_id"=>$plan_id,"level"=>'1');
    DB::table('level_1s')->insert($data);

    $commsiion=find_upline_users($userid,'1',$plan_id);

   // exit;


/*   $userreferalldetails = User::where('id', $userid)->Where('plan_id', 'like', '%' . $plan_id . '%')->get();
echo count( $userreferalldetails);*/

}else{
    $ref_id= $userdata['ref_id'];
    \DB::enableQueryLog(); 
    $refdetails = User::where('id', $ref_id)->where('plan_id', 'like', '%' . $plan_id . '%')->get();
    if(count($refdetails)=='0'){
        $data=array('user_id'=>$userid,'ref_id'=>$userdata['ref_id'],"pos_id"=>'0',"position"=>'0',"plan_id"=>$plan_id,"level"=>'1');
        DB::table('level_1s')->insert($data);

        $commsiion=find_upline_users($userid,'1',$plan_id);

    }else{
echo 'check';
    
    }
  //  dd(\DB::getQueryLog());
  //  echo $refdetails['plan_id'];
   // echo count($refdetails);
  
exit;
}

exit;
   

}
//->update(['plan_id' => $plan_id,'activeplan'=>$plan_id]);

  
    $request->session()->flash('success','please enter login details');
    return redirect('subscribeplan');
}else{
    return redirect('makepayment')->with('message','To Activate Plan Please Deposit Money');;

}




        }


        public function makepayment(){
          return view('user.makepayment');
      }


      public function depositmoney(Request $request){
        $test= Validator::make($request->all(),[
            'amount'=>'required|string',
            'utrno'=>'required|string'
            ]);
            if( $test->fails()){
                return redirect('makepayment')
                ->withInput()
                ->withErrors($test);
            }
          //elseif($request->file('uploadfile')) {
            else{
                $data = $request->input();
                try{
               
    $location = 'uploads';
   
    Session::flash('message','Upload Successfully.');
    Session::flash('alert-class', 'alert-success');
               $filename='';    
                    
                $id=Session::get('userid');
                $student = new Transactions;
                    $student->user_id = $id;
                    $student->amount = $data['amount'];
                    $student->trx = 'deposit amount';
                   
                    $student->type ='deposit';
                    
                    $student->save();
                    $deposit = new Deposits;
                    $deposit->user_id = $id;
                    $deposit->trx_id = $student->id;
                    $deposit->amount =$data['amount'];
                    $deposit->utrno =$data['utrno'];
                    $deposit->detail =$filename;
                    $deposit->status ='2';
                    
                    $deposit->save();
               
                 
                 return redirect('passbook')->with('message',"Deposited successfully.please wait for some time to add money to your wallet");
                }
                catch(Exception $e){
                    return redirect('makepayment')->with('message',"Deposit Failed ");
                }
    
            }
    }


    public function passbook(){
      $start_date=date("Y-m-d");
      $end_date=date("Y-m-d");
      $start = Carbon::parse($start_date);
      $end = Carbon::parse($end_date);
      $id=Session::get('userid');

     
    
        $getdata = Transactions::where('user_id',$id)->get();
       // dd(\DB::getQueryLog());
        $rep=array();
        foreach($getdata as $data){
            $resdata=array();
            $resdata['id']=$data['id'];
           // echo $resdata['id'];
            $resdata['user_id']=$data['user_id'];
            $resdata['type']=$data['type'];
            $resdata['created']=$data['created_at'];
            $resdata['msg']=$data['trx'];
         
            if($data['type']=='deposit'){
                $depsoitdata = Deposits::where('trx_id', '=', $data['id'])->get();
                
                $resdata['details']=$depsoitdata['0']['detail'];
                $resdata['status']=$depsoitdata['0']['status'];
                
                $resdata['creditamount']=$data['amount'];
                $resdata['debitamount']='0';
           
            }

        
            else if($data['type']=='withdrawl'){
                $depsoitdata = Withdrawals::where('trx_id', '=', $data['id'])->get();
                $resdata['details']=$depsoitdata['0']['withdrawinformation'];
                $resdata['status']=$depsoitdata['0']['status'];
                
                $resdata['creditamount']='0';
                $resdata['debitamount']=$data['amount'];
           
              
            }
            else if($data['type']=='planbuy'){
            
                $resdata['details']='Plan Buy';
                $resdata['status']='0';
                 if($data['trx']){
                $resdata['msg']=$data['trx'];
                }else{
                  $resdata['msg']='PLAN BUY';
                  
                }
         
                $resdata['creditamount']='0';
                $resdata['debitamount']=$data['amount'];
             
            }
          else if($data['type']=='funtransfer'){
                $resdata['details']='Fund Trasfer';
                $resdata['status']='0';
                $resdata['msg']=$data['trx'];
         
                $resdata['creditamount']='0';
                $resdata['debitamount']=$data['amount'];
             
            }
            else if($data['type']=='Upgradedtolevel'){
                $resdata['details']='Upgraded to';
                $resdata['status']='0';
                $resdata['msg']=$data['trx'];
         
                $resdata['creditamount']='0';
                $resdata['debitamount']=$data['amount'];
             
           
            }
          

            $rep[]=$resdata;
           

         }     
        // echo count($rep);
         //print_r($rep);
         //exit;
return view('user.passbook',['transactiondata'=>$rep]);

}



public function adduser(){
  $id=Session::get('login_id');
  //echo $id;
        
  $data=array();
  $data['left1']= url('/').'/registerby/'.$id.'/A';
  $data['right1']= url('/').'/registerby/'.$id.'/C';
  $data['left2']= url('/').'/registerby/'.$id.'/B';
  $data['right2']= url('/').'/registerby/'.$id.'/D';
  return view('user.adduser')->with($data);;
  
}





public function adduserpost(Request $request){


  $data=$request->input();
  $userid=Session::get('userid');

  $userdetails=userdetails($userid);
  $activeplanid=$userdetails->activeplan;
  $level='1';
  $activelevel=activelevel($userid);
  $txnpin = mt_rand(1111,9999);
 $user = new User();
 $user->ref_id       = $userid;
 $user->pos_id       = '0';
 $user->position     = '0';
 $user->firstname    = isset($data['fname']) ? $data['fname'] : null;
 $user->lastname     = isset($data['lastname']) ? $data['lastname'] : null;
 $user->email        = strtolower(trim($data['mail']));
 $user->password     = $data['password'];
 $user->conform_password     = $data['password'];
 $user->new_password     = $data['password'];
 $user->activeplan     = '';
 $user->txn_pin     = $txnpin;
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

  
 $user->username     = trim($data['fname']);
 $user->mobile       =  isset($data['mobile_number']) ? $data['mobile_number'] : null;

$user->save();
$useridd =$user->id;
$six_digit_random_number = random_int(100000, 999999);
$login_id=str_pad($useridd, 8, '0', STR_PAD_LEFT);
$login_id='SEP'.$login_id;

DB::table('users')
->where('id', $useridd)
->update(['login_id' => $login_id]);
return redirect()->intended('downlineusers')->with('success', 'User registartion is Successfull!');;   

}

public function activedownlineusers(){

  $userid=Session::get('userid');
  $children_array=array();
  $status='1';
  $currentlevel=activelevel($userid);
  //$currentlevel=userlevelcheck($userid,$level,);
  $plan=activeplan($userid);
  if($plan){
 // $lpandt=userlevelplan($userid,$plan);
  if(!empty($currentlevel)){
  $dbname=levelbydbname($currentlevel);
  $userdata = User::where('id', $userid)->first();
  $plan=$userdata->activeplan;
 
  $downline=getLevelUsers($userid,$currentlevel,$status,$dbname,$plan);
  $data=array();
   foreach($downline as $downline){
      $userid=$downline['user_id'];
      $userdata= json_decode(json_encode((DB::select('SELECT * FROM users WHERE id="'.$userid.'" and status="1"')),true),true);
      if(count($userdata)!='0'){
       $data[]=$userdata;
      }
 
  }
 
  return view('user/activedownlineusers',['downline'=>$data,'currentlevel'=>$currentlevel]);
}else{
  return view('user/activedownlineusers',['downline'=>array(),'currentlevel'=>array()]);
 
}
  }else{
      return view('user/activedownlineusers',['downline'=>array(),'currentlevel'=>array()]);

  }
  }

  public function getLevelUsers($userId, $level=1,$status) {
    
  
    $users = array();
    $downline=json_decode(json_encode((DB::select('SELECT id FROM users WHERE ref_id="'.$userId.'"')),true),true);
    
    foreach ($downline as $row)
    {
      $row['level'] = $level;
        $users[] = $row;
        $users = array_merge($users, $this->getLevelUsers($row['id'], $level + 1,$status));
    }
    return $users;
    }



    public function getuserdetails(Request $request){
      //echo "hiii";
      $id=Session::get('userid'); 
     // echo $id;
      $userdetails=userdetails($id);
      $balance= $userdetails['balance'];
      $ref_id=$userdetails['ref_id'];
      $plan_id=$userdetails['activeplan'];
      $level=$userdetails['level'];
      $refereedname= $userdetails['username'].'('.$userdetails['login_id'].')';
    /* echo 'SELECT * FROM user_extras WHERE user_id="'.$request->get('serachphone').'" and 
     plan="'.$plan_id.'" and level="'.$level.'"';*/
    // exit;
      $downline=json_decode(json_encode((DB::select('SELECT * FROM user_extras WHERE user_id="'.$request->get('serachphone').'" and 
      plan="'.$plan_id.'" and level="'.$level.'"')),true),true);
      $cuserdetails=userdetails($request->get('serachphone'));
     $cusername=$cuserdetails['username'].'('.$cuserdetails['login_id'].')';
$xdata='<div class="modal-content">
<div class="modal-header">
<div class="thumb" style="width:80px;height:80px;overflow:hidden;border-radius:50%">
<img class="w-h-100-p tree_image" style="max-width:100%;vertical-align:middle;height:auto" 
src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*">


</div>
<h5 class="modal-title" id="exampleModalCenterTitle">User Details : '.$cusername.'</h5> 

<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<i class="las la-times"></i>
</button>
</div><style>
.user-details-header .content .user-name {
display: block;
font-size: 22px;
font-weight: 500;
text-transform: capitalize;
}
</style>
<div class="modal-body">
<div class="user-details-modal">
<div class="user-details-header Free">
<div class="content" style="width:calc(100% - 80px);padding-left:30px">
</div>
</div>
<div class="user-details-body text-center">
<h6 class="my-3">Referred By: '.$refereedname.'<span class="tree_ref"></span></h6>

';                             
$xdata.='         <table class="table table-bordered">
<tbody><tr>
<th>Position</th>
<th>A</th>
<th>B</th>
<th>C</th>
<th>D</th>

</tr>';
$xmmdata='
<tr>
<td>Current DP</td>
<td><span class="lbv">'.$downline['0']['free_left1'].'</span></td>
<td><span class="rbv">'.$downline['0']['free_left2'].'</span></td>
<td><span class="lbv">'.$downline['0']['free_right1'].'</span></td>
<td><span class="rbv">'.$downline['0']['free_right2'].'</span></td>

</tr>';
$xdata.='
<tr>
<td>Members</td>
<td><span class="lfree">'.count(json_decode($downline['0']['free_left1_data'],true)).'</span></td>
<td><span class="rfree">'.count(json_decode($downline['0']['free_left2_data'])).'</span></td>
<td><span class="lbv">'.count(json_decode($downline['0']['free_right1_data'])).'</span></td>
<td><span class="rbv">'.count(json_decode($downline['0']['free_right2_data'])).'</span></td>

</tr>
</tbody></table>
</div>
</div>
</div>
</div>
';
return $xdata;
      
      }


public function downlineusers(){

        return view('user/downlineusers');
    }



    public function inactivedownlineusers(){
      $userid=Session::get('userid');
      $status='1';

      $downline=$this->getLevelUsers($userid,1,$status);
      $data=array();
      foreach($downline as $downline){
          $userid=$downline['id'];
         $userdata= json_decode(json_encode((DB::select('SELECT * FROM users WHERE id="'.$userid.'" and status="0" order by id ASC')),true),true);
         if(count($userdata)!='0'){
          $data[]=$userdata;
         }
        
        
      }
          
    
    return view('user.inactivedownlineusers',['downline'=>$data]);

  }


  public function levelusers(){
    $id=Session::get('userid');
    $XM= isUserExists($id);
    $userdata = User::where('id', $id)->first();
    $respdata=leveltreeusers($id,$userdata->activeplan,$userdata->level);
    $res = array_fill_keys(array('b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o','p','q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
    'aa', 'ab', 'ac', 'ad','ae', 'af', 'ag', 'ah', 'ai','aj', 'ak', 'al', 'am', 'an','ao', 'ap', 'aq', 'ar', 'as','at','au', 'av', 'aw', 'ax', 'ay','az',
    'ba', 'bb', 'bc', 'bd','be', 'bf', 'bg', 'bh', 'bi','bj', 'bk', 'bl', 'bm', 'bn','bo', 'bp', 'bq', 'br', 'bs','bt','bu', 'bv', 'bw', 'bx', 'by','bz',
 'ca','cb','cc','cd','ce','cf','cg'), null);
 $leveluserdata=array();
 foreach ($res as $key => $value){
    if($respdata[$key]){
        $leveluserdata[]=$respdata[$key];
    }
 }

    return view('user/levelusers',['data'=>json_decode( json_encode($leveluserdata), true)]); 
}


public function referallusers(){

  $userid=Session::get('userid');
  $children_array=array();
  $status='1';
  $data=User::where('ref_id', $userid)->orderBy('id', 'DESC')->get();
  return view('user/referal_users',['downline'=>$data]);



  }


            
  public function fundtransftertoother(){
    //echo "fundtransfertoother";
      $sessionuserid=Session::get('userid');
   $userdata = User::where('id', $sessionuserid)->first();
    return view('user.fundtransftertoother',['data'=>$userdata]);
}


public function serachphonenumber(Request $request){
                                
  $userid=$request->get('serachphone');
  $posts=User::where('login_id', '=',$userid)->get();
  $count=count($posts);
        
  if($count>0){
      $resp=$posts['0']['username'].'-'.$posts['0']['login_id'];
      }else{
      $resp='no';
      
      }
      return $resp;   
      }


      public function withdraw(){
        $sessionuserid=Session::get('userid');
         $userdata = User::where('id', $sessionuserid)->first();
        
       //  $totalwithdraw=Withdrawals::where('user_id', $sessionuserid)->first()->count();
         $totalwithdraw='100';
        
         $withdtrawdetails=DB::select("select * from withdrawals as w  join users as u on w.user_id=u.id");
        
        //echo  COUNT($totalwithdraw);
        
        return view('user.withdrawl',['data'=>$userdata],compact('totalwithdraw'),[]);
        }


        public function withdrawmoney(Request $request){
          $id=Session::get('userid');
          $test=validator::make($request->all(),[
          
          'accnumber'=>'required|string',
          
          'amount'=>'required|string',
          'txnpin'=>'required|string',
         
          
          ]);
          if($test->fails()){
          return redirect('withdraw')
          ->with('error','Withdrawl Failed');
          
         
          }
          else{
              $data=$request->input();
         
          $binf=array();
          $binf['accname']=isset($data['accname']) ? $data['accname'] : null;
          $binf['accnumber']=isset($data['accnumber']) ? $data['accnumber'] : null;
          
          $binf['bankname']=isset($data['bankname']) ? $data['bankname'] : null;
          $binf['ifsccode']=isset($data['ifsccode']) ? $data['ifsccode'] : null;
          $userdata = User::where('id', $id)->first();
          $bal=$userdata['balance'];
          $charges=$data['amount']*20/100;
          if($bal>300 && ($data['amount']+$charges)<$bal && $data['txnpin']==$userdata['txn_pin']){
              try{
                    $updbal=$userdata['balance']-$data['amount'];

                     $updatetransactionpin=DB::update("UPDATE `users` SET `balance`=$updbal  where id=$id");

                  $student = new Transactions;
                  $student->user_id = $id;
                  $student->amount = $data['amount']+$charges;
                  $student->type ='withdrawl';
                  $student->trx ='withdrawl Amount';
                  $student->save();
             $type=new Withdrawals;
             $type->trx_id=$student->id;
              $type->user_id=$id;
             $type->amount=$data['amount']+$charges;
             $type->currency='rupee';
             $type->rate=0;
             $type->charge=$charges;
             $type->trx=1;
             $type->final_amount=0;
             $type->after_charge=0;
             $type->withdraw_information=json_encode($binf,true);
             $type->status=2;
             $type->save();
             return redirect('passbook')->with('message','Your Withdrawl is Successfully');
          
          
          }
          catch(Exception $e){
              return redirect('withdraw')->with('error','Withdrawl Failed');
          
          }
      }else{
          return redirect('withdraw')->with('error','Please check Amount or Txn pin');
      
      }
          }
          }




public function legality(){
 return view('user/legality');
}



public function kycupdate(Request $request){
  //$email=Session::get('email');
  //$login_id=Session::get('login_id');
  $sessionuserid=Session::get('userid');
  $userdata = User::where('id', $sessionuserid)->first();

if($userdata->kyc==0){
        
      $kycupate=DB::select("SELECT * FROM `users` WHERE `id`=$sessionuserid");
      return view('user/kycupdate',['kycupate'=>$kycupate]);
  
  
     }
  
     else if($userdata->kyc==1){
       
     return redirect('successfulkyc');
  
     }
    

  }


  public function updatekyc(Request $request){
    $test= validator::make($request->all(),
[
  'pannumber'=>'required|mimes:png,jpg,jpeg,csv,txt,pdf',
  'adahrno'=>'required|mimes:png,jpg,jpeg,csv,txt,pdf',

]);


if($request->file('pannumber')){
  echo "pannumbere";
$pannumberfile=time().'.'.$request->file('pannumber')->getClientOriginalExtension();
echo $pannumberfile;

$location='uploads';
$panuploadfiles=$request->file('pannumber')->move($location,$pannumberfile);
}                     

if($request->file('adahrno')){
  $location='uploads';
$adahrno=time().'.'.$request->file('adahrno')->getClientOriginalExtension();	   
$adharuploadfiles=$request->file('adahrno')->move($location,$adahrno);

}                    
$sessionuserid=Session::get('userid');
echo "UPDATE `users` SET `adharno`='$adahrno',`panno` ='$pannumberfile', `kyc`='1'   WHERE `id`=$sessionuserid";
exit;


$updatekyc=DB::update("UPDATE `users` SET `adharno`='$adahrno',`panno` ='$pannumberfile', `kyc`='1'   WHERE `id`=$sessionuserid");
return redirect('successfulkyc')->with('success','Successfully Update');

 

}

public function successfulkyc(){
  //echo "successfulkyc";
$sessionuserid=Session::get('userid');
$successfulkyc=DB::select("SELECT * FROM `users` where id='$sessionuserid'");
//print_r($successfulkyc);
//exit;
return view('user/successfulkyc',compact('successfulkyc'));

}

public function usertree(Request $request){

  $id = $request->route('id'); 
  $x=clubcheckupdatedp($id);
 // exit;
   $userdata = User::where('id', $id)->first();
  $plan=$userdata->activeplan;
  if($plan=='1'){
      $level=$userdata->l1;  

  }elseif($plan=='2'){
      $level=$userdata->l2;  

  }elseif($plan=='3'){
      $level=$userdata->l3;  

  }else{
    $level='1';  
  }
 
if($plan){
  $uid=Session::get('userid');
  $club1='0';

  if($id!=$uid){
      $club1='0';
  }else{

      $resp=clubbyusers($id,'2',$level,$plan);
      if($resp){
   
          if(count($resp)=='4'){
              $club1='1';
          }

      
  }
    
  }
  $res=json_decode(json_encode(leveltreeusers($id,$plan)), true);
  //exit;
     return view('user/usertreed',['data'=>$res,'club1'=>$club1,'plan'=>$plan]); 
}else{
  $res = array_fill_keys(array('a','b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o','p','q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
  'aa', 'ab', 'ac', 'ad','ae', 'af', 'ag', 'ah', 'ai','aj', 'ak', 'al', 'am', 'an','ao', 'ap', 'aq', 'ar', 'as','at','au', 'av', 'aw', 'ax', 'ay','az',
  'ba', 'bb', 'bc', 'bd','be', 'bf', 'bg', 'bh', 'bi','bj', 'bk', 'bl', 'bm', 'bn','bo', 'bp', 'bq', 'br', 'bs','bt','bu', 'bv', 'bw', 'bx', 'by','bz',
'ca','cb','cc','cd','ce','cf','cg'), null);
  return view('user/usertreed',['data'=>$res,'club1'=>array(),'plan'=>array()]); 
}
}


public function logout(Request $request){
  $request->session()->put('login_id','SEP00000035');
$request->session()->forget('login_id');   
session()->flash('error','logout successfuuly');
return redirect('login'); 
}

public function userprofile(){
  $email=Session::get('email');
  if(empty($email)){
  return redirect('login');
  }
  $id=Session::get('userid');
  $user = User::where('id', $id)->first();

  return view('user.userprofile',['data'=>$user]);
}


public function submitprofilesetting(Request $request){
  echo "submitusrer";
  
  $test= Validator::make($request->all(),[
      'fstname'=>'required|string',
      'lastname'=>'required|string',
      'email'=>'required|string',
      'mobile'=>'required',  
      'uploadfile'=>'required|mimes:png,jpg,jpeg,csv,txt,pdf',
      'psssword'=>'required',
      'cpsssword'=>'required',
      'address'=>'required|string',
      'state'=>'required|string',
      'city'=>'required|string',
      'pincode'=>'required'

      ]);
   if($request->file('uploadfile')) {
    //  echo "success";
     // exit;
          $data = $request->input();
          try{
$filename=time()."_".$request->file('uploadfile')->getclientOriginalExtension();
$location = 'uploads';

$uploadfile=$request->file('uploadfile')->move($location ,$filename);
//exit;
             $student = new User;
              $firstname = $data['fstname'];
              $lastname = $data['lastname'];
              $email = $data['email'];
              $mobile = $data['mobile'];
              $image = $filename;
              $password = $data['password'];
              $cpassword = $data['cpassword'];
              $address = $data['address'];
              $state = $data['state'];
              $city = $data['city'];
              $pincode = $data['pincode'];
              $sessionuserid=Session::get('userid');
              $request->session()->put('profileimage',$image); 
             
              $updatetransactionpin=DB::update("UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',
              `mobile`='$mobile',`image`='$image',`password`='$password',`conform_password`='$cpassword', `address`='$address', `state`='$state',`city`='$city',`pincode` ='$pincode' where id=$sessionuserid");


           return redirect('userprofile')->with('message',"Updated successfully");
          }
          catch(Exception $e){

              print_r($e);
              exit;
              return redirect('userprofile')->with('message',"Updation failed");
          }

      }
}


public function changepassword(){
  return view('user.changepassword');
}


public function submitchangepassword(Request $request){
  $sessionuserid=Session::get('userid');
                                
  $test=Validator::make($request->all(),
  [
      'password'=>'required|string',
      'newpassword'=>'required|string',
      'conformpassword'=>'required|string',

  ]);

  $oldpassword=$request->input('password');
  $newpassword=$request->input('newpassword');
  $conformpassword=$request->input('conformpassword');


  if( $test->fails()){
      return redirect('submitchangepassword')
      ->withInput()
      ->withErrors($test);
  }
  else{
      $selectuser=DB::select("SELECT * FROM `users` WHERE `id`='$sessionuserid' and `password`='$oldpassword'");

     foreach($selectuser as $se){
          $password=$se->password;
        echo $password;
     }



      if(!$selectuser ){

          return redirect('changepassword')->with('failed','Old Password is Wrong');
  
         }
       
   
     
     elseif($newpassword !=$conformpassword){

      return redirect('changepassword')->with('failed','Password does not Match');
  }
     elseif($newpassword=$conformpassword){
   // echo  "UPDATE `users` SET `transcation_pin`='$newtransactionpin'  where id=$sessionuserid";
    //exit;
$updatetransactionpin=DB::update("UPDATE `users` SET `password`='$newpassword'  where id=$sessionuserid");
return redirect('changepassword')->with('success','Password change successfully');
     }

   
  }
}


public function userdashboard(){
  $email=Session::get('email');
  if(empty($email)){
  return redirect('login');
  }
  $id=Session::get('userid');
 clubcheckupdatedp($id);
// exit;   
$startdate=date('Y-m-d',strtotime("-3 day")).' 00:00:00';
$enddate=date('Y-m-d').' 23:59:59';


$user = User::where('id', $id)->first();
// echo "SELECT `level`,`plan` FROM subscribers where created_at >= '$startdate' and created_at <= '$enddate' order by id DESC LIMIT 1";
//exit;
$posdatacount=json_decode(json_encode((DB::select("SELECT `level`,`plan` FROM subscribers where created_at >= '$startdate' and created_at <= '$enddate' and user_id='$id' order by id DESC LIMIT 1")),true),true);
 $notification=array();
if(count($posdatacount)>0){
  $notifcation['status']='1';
  $notifcation['plan']=$posdatacount['0']['plan'];
  $notifcation['level']=$posdatacount['0']['level'];

 }else{
  $notifcation['status']='0';

 }
  return view('user.userdashboard',['data'=>$user,'notifcation'=>$notifcation]);
}


public function transactionpin(){
 
  return view('user.transactionpin');

}


public function submittransactionpin(Request $request){
                                    
  $sessionuserid=$request->session()->get('uid');
    $test=Validator::make($request->all(),
    [
        'newtransactionpin'=>'required|string',
        'conformtransactionpin'=>'required|string',

    ]);
    if( $test->fails()){
        return redirect('submittransactionpin')
        ->withInput()
        ->withErrors($test);
    }
    else{

   
       $selectuser=DB::select("SELECT * FROM `users` WHERE `id`='$sessionuserid'");
       foreach($selectuser as $se){
            $transcation_pin=$se->txn_pin;
       }
      $newtransactionpin=$request->input('newtransactionpin'); 
      $conformtransactionpin=$request->input('conformtransactionpin');

       if(!$selectuser or $newtransactionpin !=  $conformtransactionpin){
        return redirect('changetransactionpin')->with('failed','Invalid Details');


       }
        else{
  $updatetransactionpin=DB::update("UPDATE `users` SET `txn_pin`='$newtransactionpin'  where id=$sessionuserid");
  $request->session()->put('txn_pin',$newtransactionpin); 

  return redirect('userdashboard')->with('success','Transaction Pin change successfully');
       }

    }
}


public function changetransactionpin(){
 
  return view('user.changetransactionpin');
                                

}

public function submitchnagetransactionpin(Request $request){
                                    
  $sessionuserid=$request->session()->get('uid');
 // echo $sessionuserid;
  //exit;

  //  echo "transactionpin";
    $test=Validator::make($request->all(),
    [
        'newtransactionpin'=>'required|string',
        'conformtransactionpin'=>'required|string',

    ]);
    if( $test->fails()){
        return redirect('submittransactionpin')
        ->withInput()
        ->withErrors($test);
    }
    else{

      $oldtransactionpin=$request->input('oldtransactionpin');
    
       $selectuser=DB::select("SELECT * FROM `users` WHERE `id`='$sessionuserid' and txn_pin='$oldtransactionpin'");
       foreach($selectuser as $se){
            $transcation_pin=$se->txn_pin;
          //  echo $transcation_pin;
       }
      $newtransactionpin=$request->input('newtransactionpin');

      $conformtransactionpin=$request->input('conformtransactionpin');

      if(!$selectuser or $newtransactionpin !=  $conformtransactionpin){
          return redirect('changetransactionpin')->with('failed','Invalid Details');
  
       }
        else{
  $updatetransactionpin=DB::update("UPDATE `users` SET `txn_pin`='$newtransactionpin'  where id=$sessionuserid");
  return redirect('changetransactionpin')->with('success','Transaction Pin changed successfully');
       }

    }
}

public function supportticket(){
  return view('supportticket');
}


                                                                 
public function userplanbal(Request $request){
        
  $id=Session::get('userid');
 
  $userdetails=userdetails($id);
  $balance= $userdetails['balance'];
  $ref_id=$userdetails['ref_id'];
  $plan_id=$request->get('plainid');

  $level=$userdetails['level'];
  if($plan_id=='1'){
      $planamount='23';
      $pland='sep-23';
  }
  if($plan_id=='2'){
      $planamount='100';
      $pland='sep-23';
  
  }
  if($plan_id=='3'){
      $planamount='500';
      $pland='sep-23';
  
  }
  if($balance>=$planamount){
      $uplans=usertotalplan($id);

    
      $ulevels=usertotallevels($id,$plan_id);
      if(!empty($ulevels)){
      if(array_key_exists($plan_id,$ulevels)){
      }
      else{
          $ulevels[$plan_id]='1';
      }
      }else{
          $ulevels[$plan_id]='1';   
      }

      $level_data=json_encode($ulevels,true);


      if(!in_array($plan_id,$uplans['planids'])){
          $uplans['planids'][]=$plan_id;
      }
      $plans=json_encode($uplans['planids'],true);
      $updbal=$balance-$planamount;
      $userdetails=userdetails($id);
      $uplans=usertotalplan($id);

      $y='100';
   if($y=='100'){
      $updateplan=DB::update("UPDATE `users` SET `plan_id`='$plans',`level_data`='$level_data',`balance`='$updbal',`activeplan`='$plan_id' where id='$id'");
  
      $student = new Transactions;
      $student->user_id = $id;
      $student->amount = $planamount;
      $student->type ='planbuy';
      $student->details =$pland;
      $student->save();
      $request->session()->put('activeplan',plannamebyid($plan_id)); 
      $request->session()->put('balance',$updbal); 
      if($plan_id=='1'){

      DB::table('level_1s')
      ->where('user_id', $id)
      ->update(['plan_id' => $plan_id,'activeplan'=>$plan_id]);
      $commsiion=find_upline_users($id,'1',$plan_id);
    
      }else{

      $refdetails = User::where('id', $ref_id)->where('plan_id', 'like', '%' . $plan_id . '%')->get();
      if(count($refdetails)=='0'){
  
          $data=array('user_id'=>$id,'ref_id'=>$ref_id,"pos_id"=>'0',"position"=>'0',"plan_id"=>$plan_id,"level"=>'1');
          DB::table('level_1s')->insert($data);
          $user_extras = new UserExtra();
          $user_extras->user_id = $id;
          $user_extras->plan = $plan_id;
          $user_extras->level = '1';
                $user_extras->free_left1_data = '[]';
    $user_extras->free_left2_data ='[]';
    $user_extras->free_right1_data = '[]';
    $user_extras->free_right2_data = '[]';

          $user_extras->save();
         
          $commsiion=find_upline_users($id,'1',$plan_id);


      }
      else{
       
               
          $userdetails = User::where('id', $ref_id)
          ->first();
          if($userdetails){
           $userid=$userdetails->id;
           $pos_id=$userid;
           $activelevel=activelevel($userid);
           $psotionsfilled=clubbyoneusers($userid,'1','1',$plan_id);

           if(count( $psotionsfilled)!='4'){
         
           $totalpostions=array('1','2','3','4');
           $freepositions1 = array_diff($totalpostions, $psotionsfilled);
           $freepositions2 = array_diff($psotionsfilled, $totalpostions);
       
           $freepositions = array_merge($freepositions1, $freepositions2);
           }
           else{
          
             $users=getLevelUsersBytop($userid,'1','1','level_1s',$plan_id);
             foreach($users as $cusers){
              
               $cuserdetails=userdetails($cusers['user_id']);
               $clubcheck=$cuserdetails->clubcheck;
               
                   $psotionsfilled=clubbyoneusers($cusers['user_id'],'1','1','1');
                     if(count($psotionsfilled)=='4'){
                       DB::table('users')
                       ->where('id', $userid)
                       ->update(['clubcheck' =>'1']);
                     
                     }
                     else{
                       $pos_id=$cusers['user_id'];
                       break;
                     }
                    
               
              
               
             }
             $psotionsfilled=clubbyoneusers($pos_id,'1','1','1');
             if(count( $psotionsfilled)!='4'){
           
             $totalpostions=array('1','2','3','4');
             $freepositions1 = array_diff($totalpostions, $psotionsfilled);
             $freepositions2 = array_diff($psotionsfilled, $totalpostions);
         
        
 $freepositions = array_merge($freepositions1, $freepositions2);
            }
           }
      
     $ldata=array('user_id'=>$id,'ref_id'=>$ref_id,"pos_id"=>$pos_id,"position"=>$freepositions['0'],"plan_id"=>$plan_id,"level"=>'1');
     DB::table('level_1s')->insert($ldata);
     $level='1';
     $user_extras = new UserExtra();
     $user_extras->user_id = $id;
     $user_extras->plan = $plan_id;
     $user_extras->level = $level;
           $user_extras->free_left1_data = '[]';
    $user_extras->free_left2_data ='[]';
    $user_extras->free_right1_data = '[]';
    $user_extras->free_right2_data = '[]';

     $commsiion=find_upline_users($id,$level,$plan_id);
     $user_extras->save();
         updateFreeCount($id,$level,$plan_id);

      
      }

  }
}  
      return 'activated';
   }
   
  }else{
    
      return 'nobal'; 
 
  }
  }


  public function orders(){
    $username=session()->get('username');
    $orderlist=DB::select("SELECT * FROM `orders` WHERE `username`='$username'");
    return view('user.orders',['orderlist'=>$orderlist]);
  }

  public function returnorder(){
   echo "returnorder";
  }

  public function needhelp(){
    echo "needhelp";
   }


   public function cancelorder(Request $request,$oid){

    $test=Validator::make($request->all(),
    [
        'reason'=>'required|string',
        'comment'=>'required|string',
        'status'=>'required',

    ]);
    if( $test->fails()){
        return redirect('submittransactionpin')
        ->withInput()
        ->withErrors($test);
    }
    else{
      $data=$request->input('');
      $reason=$data['reason'];
      $comment=$data['comment'];
      $status=$data['status'];
      $insertcancelreason=DB::insert("INSERT INTO `cancelorder`( `oid`, `cancel_region`, `status`) VALUES ('$oid','$reason','$status')");
      $updatecabDB=DB::update("UPDATE `orders` SET `status`='7'  where id='$oid'");

      return redirect('orders')->with('success','successfully cancel Your order');

    }
   return view('user.cancelorder');
   }

     
   public function postsendmoney(Request $request){
         
    $id=Session::get('userid');
    $test=Validator::make($request->all(),
    [
        'accname'=>'required|string',
        'amount'=>'required|string',
    //    'tpin'=>'required|string',
       

    ]);
   $money= $request->input('amount');
   if($test->fails()){
        return redirect('fundtransfertoother')
        ->withInput()
        ->withErrors($test);
    }
    else
    {
     

        $data=$request->input();
   
        $binf=array();
        $accname=$data['accname'];
        $binf['accnumber']=$data['accnumber'];
        
        $amount=$data['amount'];
        $binf['tpin']=$data['tpin'];
        $userdata = User::where('id', $id)->first();
        $bal=$userdata['plan1']+$userdata['plan2']+$userdata['plan3'];
        $perc=$amount*4/100;
        $perc='0';
        //echo $bal;
       // exit;
         $totalamount=$amount+$perc;
        if( $totalamount<=$bal && $data['tpin']==$userdata['txn_pin']){
            try{
                if($totalamount<=$userdata['plan1']){
                  $upd=$userdata['plan1']-$totalamount;
                  $columnname='plan1';
       // break;
                }else if($totalamount<=$userdata['plan2']){
                     $upd=$userdata['plan2']-$totalamount;
               $columnname='plan2';
               //   break;
                }else if($totalamount<=$userdata['plan3']){
                     $upd=$userdata['plan3']-$totalamount;
               $columnname='plan3';
               //   break;
                }
              //exit;
                  $tuserdata = User::where('login_id', $accname)->first();
       
                $student = new Transactions;
                $student->user_id = $id;
                $student->amount = $totalamount;
                $student->type ='funtransfer';
                $student->trx ='Fund Transfer To '.$tuserdata['login_id'];
                $student->save();
           $type=new FundTransfer;
           $type->trx_id=$student->id;
            $type->user_id=$id;
           $type->amount=$totalamount;
           $type->perc=$perc;
          
           $type->t_user_id=$data['accname'];
           $type->remarks=isset($data['accnumber']) ? $data['accnumber'] : null;;
          
           $type->status=1;
           $type->save();
           
           echo "UPDATE `users` SET $columnname='$upd' where id='$id'";
           $updateplan=DB::update("UPDATE `users` SET $columnname='$upd' where id='$id'");
        //   exit;
        $tbal=$tuserdata['balance'];
        $updbal=$tbal+$amount;
        $updateplan=DB::update("UPDATE `users` SET `balance`='$updbal' where login_id='$accname'");
      
        

           return redirect('passbook')->with('message','Fund Transfer Is success');
     
  
    
        }
        catch(Exception $e){
            return redirect('fundtransftertoother')->with('status','Please Provide Correct Details');


        }
    }
    else{
        return redirect('fundtransftertoother')->with('status','Please Provide Correct Details');
 
    }

    

}
    
   

}





}
