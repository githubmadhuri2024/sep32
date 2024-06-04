<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Models\Type;
use App\Models\Plan;
use App\Models\level_2;

class AdminController extends Controller
{


    public function adminlogin(){
        return view('admin.login');
    }

    public function adminloginpost(Request $request){
       // echo "adminlogin";
        $test= validator::make($request->all(),
        [
             'email'=>'required|string',
             'password'=>'required|string'
     
         ]);
        $email=$request->input('email');
        $password=$request->input('password');
         if($test->fails()){
             return redirect('adminlogin')
             ->withInput()
             ->withErrors($test);
     
         }
         else{
        //  echo "SELECT * FROM `admins` WHERE `email`='$email'  and   `password`='$password'";
         /// exit;
     $selectadmin=DB::select("SELECT * FROM `admins` WHERE `email`='$email'  and   `password`='$password'");
     $count=count($selectadmin);
 
     if($count=='1'){
         foreach($selectadmin as $value){
          $adminid=$adminid=$value->id;
           $adminname=$value->name;
     
           $adminemail=$value->email;
           $adminusername=$value->username;
           $adminpassword=$value->password;
           $adminimage=$value->image;
     
           //echo $adminid;
         }
     
     if($adminemail==$email && $adminpassword==$password){
     Session::put('variableName',$value);
     $request->session()->put('adminid',$adminid);
     $request->session()->put('adminname',$adminname);
     $request->session()->put('adminemail',$adminemail);
     
     $request->session()->put('adminusername',$adminusername);
     
     $request->session()->put('adminpassword',$adminpassword);
     $request->session()->put('adminimage',$adminimage);
     
     
     $adminemail=session()->get('adminemail');
     $adminusername=session()->get('adminusername');
     
     return redirect()->intended('admindashboard');
     //echo $adminemail;
     
     
     
     }
    
     
     
     }
     else{
        $request->session()->flash('error','please enter login details');
        return redirect('adminlogin');
    }
     
         }
     
     }



public function admindashboard(){
    return view('admin.admindashboard');
}

public function  types(){

    $types=DB::select("select * from types");

  return view('admin/type',['types'=>$types]); 


}

public function addtype(){
    return view('admin/addtype'); 
 }

 
 public function submittype(Request $request){
   $test=Validator::make($request->all(),[
    'uname'=>'required|string',
    'status'=>'required|string',
   
    ]);
  
    if($test->fails()){
      return redirect('addtype')
      ->withInput()
      ->withErrors($test);
    }
   else{
      //  echo  "success";
    $data=$request->input();
      
      $type=new Type;
      $type->name=$data['uname'];
      $type->status=$data['status'];
      $type->save();
  

      return redirect('types')->with('message',"plan Added Successfully");


     
  
   }
   }

   public function edittype(Type $type_id){
    //echo $type_id->type_id;
   $selecttype=Type::where('type_id','=',$type_id->type_id)->get();
  
    return view('admin/edittype',['selecttype'=>$selecttype]);
     
    }

   

    public function updatetype(Request $request, Type $type_id){
        $test=Validator::make($request->all(),[
            'uname'=>'required|string',
            'status'=>'required|string',
           
            ]);
          
            if($test->fails()){
              return redirect('types')
              ->withInput()
              ->withErrors($test);
            }
           else{
               echo  "success";
               $data=$request->input();
               try{
           //  echo  "UPDATE `types` SET `name`='".$data['uname']."',`status`='".$data['status']."'  WHERE `type_id`=$type_id->type_id";
             // exit;
            $query=DB::update("UPDATE `types` SET `name`='".$data['uname']."',`status`='".$data['status']."'  WHERE `type_id`=$type_id->type_id");
          return redirect()->route('types')->with('success','Type update successfully');
               }
          
               catch(Exception $e){
                   return view('admin/edittype')->with('success','update  Failed');
               }
           }
        }


public function deletetype(Request $request,Type $type_id){
   // echo $type_id->type_id;
   $deletetype=DB::delete("DELETE FROM `types` WHERE `type_id`='$type_id->type_id'");
   return redirect('types')->with('message','Type delete successfully');


}


public function adminproduct(){

    $sqlproduct=DB::select("SELECT p.`id`,p.`name` as productname,p.`price`,p.`image`,p.`status`,t.name as typename FROM `plans`as p inner join 
    `types` as t on p.`type_id`=t.type_id");
 
  return view('admin/adminproduct',compact('sqlproduct'));
 
}

public function addadminproduct(){
 
    $selectcategory = DB::select('select * from types');  
    
   
    return view('admin/addadminproduct',['selectcategory'=>$selectcategory]);
    
    }



    public function submitproduct(Request $request){
        //echo "submitproduct";
        $test=Validator::make($request->all(),[
          'category'=>'required|string',
          'subCategory'=>'required|string', 
          'productcost'=>'required',
          'productimage'=>'required|mimes:png,jpg,jpeg,csv,txt,pdf',
          'status'=>'required'
        ]);
        if($test->fails()){
          return redirect('adminproduct')
        ->withInput()
          ->withErrors($test);
         
        }
        else{
        
        
            if($request->file('productimage')){
            $filename= time().'.'.$request->file('productimage')->extension();
            //echo $filename;
            $location='public/uploads';
            $uploadfile=$request->file('productimage')->move($location, $filename);
            //3echo   $uploadfile;
            //exit;
            $testplan=new Plan;
            $data=$request->input();
            $testplan['type_id']=$data['category'];
            $testplan['name']=$data['subCategory'];
            $testplan['price']=$data['productcost'];
            $testplan['image']= $filename;
            $testplan['status']= $data['status'];
            $testplan->save();
            return redirect('adminproduct')->with('message','Product added Successfully');
            }
        
            else{
                Session::flash('message','file not Uploaded');
                Session::flash('alert-class', 'alert-danger');
            }
        
        }
        
         }




        public function updateproduct(Request $request,Plan $id){
         
      //  echo $id->id;
           // exit;
              $updateproduct=DB::select("SELECT p.`id`,p.`name` as productname,p.`price`,p.`image`,p.`status`,p.`type_id`,t.name as typename FROM `plans`as p inner join 
               `types` as t on p.`type_id`=t.type_id where p.id='$id->id'");
            //   print_r($updateproduct);
              // exit;
              
                 $selectcategory = DB::select('select * from types');  
            
         
            return view('admin/updateproduct',['updateproduct'=>$updateproduct],['selectcategory'=>$selectcategory]);
              }



              public function submitupdateproduct(Request $request,Plan $id){
          
                 $test=Validator::make($request->all(),[
                   'category'=>'required|string',
                   'subCategory'=>'required|string',
                   'productcost'=>'required|int',
                   'productimage'=>'required|mimes:png,jpg,jpeg,csv,txt,pdf',
                   'status'=>'required|string'
                 ]);

             
                    $filename= time().'.'.$request->file('productimage')->extension();
                     
                     $location='public/uploads';
                     $uploadfile=$request->file('productimage')->move($location, $filename);
                  
                    $data=$request->input();
      
                   $query=DB::update("UPDATE `plans` SET `type_id`='".$data['category']."',
                   `name`='".$data['subCategory']."',
                   `price`='".$data['category']."',
                   `image`= '$filename',
                   `status`='".$data['status']."'
                   where `id`='$id->id'");
                      return redirect('adminproduct')->with('success','product update successfully');

                
               
               }

public function deleteproduct(Request $request, Plan $id){
$deleterecord=DB::delete("delete from plans where id='$id->id'");
return redirect('adminproduct')->with('success','product Delete Successfuuly');;

}




//addtolevel

public function addtolevel(){
    return view('admin/addtolevel'); 
 }


 public function submitaddtolevel(Request $request ){
    $test=Validator::make($request->all(),[
        'subCategory'=>'required|string',
        'status'=>'required|int'

    ]);
    if($test->fails()){
        return redirect('addtolevel')
        ->withInput()
        ->withErrors($test);
    }

    else{
       $userid= $request->session()->get('adminid');
       $data=$request->input();
       $plan=$data['status'];
       $loginid=$data['subCategory'];
       $userdetails= json_decode(json_encode((DB::select("SELECT * FROM `users` WHERE `login_id`='$loginid'")),true),true);
      $id=$userdetails['0']['id'];
      $posdata=json_decode(json_encode((DB::select('SELECT id,uid,position FROM matrix_pos where `plan`="'.$plan.'" order by id ASC limit 1')),true),true); 
      $pos_id=$posdata['0']['uid'];
      $position=$posdata['0']['position'];
      $removeid=$posdata['0']['id'];
      $check= json_decode(json_encode((DB::select("SELECT * FROM `level_2s` WHERE user_id ='$id' and `pos_id`='$pos_id' and `plan_id`='$plan'")),true),true);
      if(count($check)=='0'){
        $user = new level_2();

        $user->pos_id       = $pos_id;
        $user->position     = $position;
        $user->user_id    = $id; 
        $user->plan_id    = $plan; 
        $user->level    = '2'; 
        
        $user->save();
        $useridd =$user->id;
        $posdata=json_decode(json_encode((DB::select("INSERT INTO `admin_add`(`uid`, `plan`) VALUES ('$id','$plan')")),true),true);
     
        $posdata=json_decode(json_encode((DB::select("DELETE FROM `matrix_pos` WHERE id='$removeid'")),true),true);
        $data=array('1','2','3','4');
        foreach($data as $dt){
            $posdatacount=json_decode(json_encode((DB::select("SELECT id,uid,position FROM matrix_pos where id='$id' and position='$dt' and plan='$plan'")),true),true);
           if( count($posdatacount)=='0'){
            $posdata=json_decode(json_encode((DB::select("INSERT INTO `matrix_pos`(`uid`, `position`,`plan`) VALUES ('$id','$dt','$plan')")),true),true);
     
           }
       
        }

    }

    return view('admin/addtolevel')->with('status','Successfully added');


 }

               
}

public function activeusers(Request $request){
  $username= $request->input('uname');
  $startdate=$request->input('startdate');
   $enddate=$request->input('enddate');
   $planid=$request->input('plan_id');
   
//echo $startdate;
//exit;
$condition='';       
if($request->has('startdate') and $request->has('enddate')){

$condition= "where  `status`='1'  and     created_at >= '$startdate' and created_at <= '$enddate'";  
}

else{
$condition= "where  `status`='1' and created_at >='". date('Y-m-d',strtotime("-10 day")) ."' and created_at <= '".date('Y-m-d')."'";   

}
//echo 
if(($request->input('uname'))){
//  echo "uername";
$condition .=" OR   `username` LIKE '%$username%' OR
   `email` LIKE '%$username%'  OR `login_id` LIKE '%$username%'";        
      
  }
  
if($request->input('plan_id')){
$condition .=" OR   `Plan_id` LIKE '%$planid%'";  

}

      
   $activeusers=DB::select("SELECT `id`, `txn_pin`, `login_id`, `password`, `username`, `email`, `remarks`, `mobile`, `balance`, `total_ref_com`,
`created_at`, `updated_at`, `mv`, `kyc`,`adharno`, `panno`, `state`, `country`, `city`, `pincode`, `zipcode`  FROM `users`
 where  `status`='1'  and     created_at >= '$startdate' and created_at <= '$enddate' order by id ASC");


return view('admin/activeusers',['activeusers'=>$activeusers],compact('startdate','enddate'));




 
   
}



public function banneduser(Request $request){

  $username= $request->input('uname');

 $startdate=$request->input('startdate');


  $enddate=$request->input('enddate');

$planid=$request->input('plan_id');
$condition='';

if($request->has('startdate')  and $request->has('enddate')){
  $condition="where status='1' and `created_at` >= '$startdate' and `created_at`<='$enddate'";

}
else{
  $sdate=date('y-m-d', strtotime("-10 day"));
  $edate=date('y-m-d');
  $condition="where status='1' and `created_at` >= '$sdate' and `created_at`<='$edate'";

}

$activeusers=DB::select("SELECT `id`, `txn_pin`, `login_id`, `password`, `username`, `email`, `remarks`, `mobile`, `balance`, `total_ref_com`,
`created_at`, `updated_at`, `mv`, `kyc`,`adharno`, `panno`, `state`, `country`, `city`, `pincode`, `zipcode`  FROM `users`  $condition order by id ASC");



return view('admin/bannedusers',['activeusers'=>$activeusers]);

}


public function pendingdeposit(Request $request){
  $username= $request->input('uname');

  $startdate=$request->input('startdate');
 
 
   $enddate=$request->input('enddate');
 
 $planid=$request->input('plan_id');
 $condition='';
 
 if($request->has('startdate')  and $request->has('enddate')){
   $condition ="where  d.`status`='2'  and     d.created_at >= '$startdate' and d.created_at <= '$enddate'";
 
 }
 else{
  $sdate=date('Y-m-d', strtotime("-10 days"));
  $edate=date('Y-m-d');
  $condition ="where  d.`status`='2' and d.created_at >= '$sdate' and d.created_at <= '$edate'";
 }
echo "SELECT t.id as id,u.username as name,d.detail as details,d.created_at,d.status,t.amount as amount,d.utrno as utrno 
FROM `transactions` as 
t INNER JOIN deposits as d on d.trx_id=t.id Inner join  `users` as u on t.user_id=u.id    $condition   order by t.id";

 $pendingdeposit=DB::select("SELECT t.id as id,u.username as name,d.detail as details,d.created_at,d.status,t.amount as amount,d.utrno as utrno 
            FROM `transactions` as 
            t INNER JOIN deposits as d on d.trx_id=t.id Inner join  `users` as u on t.user_id=u.id    $condition   order by t.id");
                     $data=json_decode(json_encode($pendingdeposit,true),true);

           print_r($data);
  return view('admin/pendingdeposit');
   
}


}
