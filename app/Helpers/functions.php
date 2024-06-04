<?php 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserExtra;
use App\Models\level_1;
use App\Models\level_2;
use App\Models\level_3;
use App\Models\level_4;
use App\Models\level_5;
use App\Models\level_6;
use App\Models\level_7;

use App\Models\Transactions;


function getPosition($parentid, $position,$level)
{
    $plan=activeplan($parentid);
  
    $childid =getTreeChildId($parentid, $position,$plan);
    if ($childid != "-1") {
        $id = $childid;
    } else {
        $id = $parentid;
    }
    while ($id != "" || $id != "0") {
        if (isUserExists_db($id)) {
            $nextchildid = getTreeChildId($id, $position,$plan);
            if ($nextchildid == "-1") {
                break;
            } else {
                $id = $nextchildid;
            }
        } else break;
    }

    $res['pos_id'] = $id;
    $res['position'] = $position;
    return $res;
}

 function getTreeChildId($parentid, $position,$plan)
{
    $cou = DB::table('level_1s')->where('pos_id', $parentid)->where('position', $position)->where('plan_id', $plan)->count();
    $cid = json_decode(json_encode(DB::table('level_1s')->where('pos_id', $parentid)->where('position', $position)->where('plan_id', $plan)->get(),true),true);
   
    if ($cou == 1) {
        return $cid['0']['user_id'];
    } else {
        return -1;
    }
}

  

function isUserExists_db($id)
{
    $user = DB::table('level_1s')->where('user_id', $id);
    if ($user) {
        return true;
    } else {
        return false;
    }
}
function isUserExists($id)
{
    $user = User::find($id);
    if ($user) {
        return true;
    } else {
        return false;
    }
}

function userdetails($id)
{
    $userdata = User::where('id', $id)->first();
    return $userdata;
    
}
function userlevelplan($id,$plan)
{
        $userdata = User::where('id', $id)->first();
    
    if($plan){
    $level_data=json_decode($userdata->level_data,true);
    if(!empty($level_data)){
    $level=$level_data[$plan];
    $data=array();
    $data['plan']=$plan;
    $data['level']=$level;
    
    return $data;
    }else{
        return false;
    }
    }else{
        return false;
    }
    
}
function usertotalplan($id)
{
    $userdata = User::where('id', $id)->first();
    $plan=$userdata->activeplan;
    $level_data=json_decode($userdata->plan_id,true);
    $plans=DB::select("SELECT  id,name  FROM `plans_new` where status='1'");
    $plansdata=array();
    
    foreach($plans as $plan){
        $pid= $plan->id;
        $plansdataarray=array();
        $plansdataarray['planid']=$pid;
        $plansdataarray['name']=$plan->name;
        if(!in_array($pid,$level_data)){
            $plansdataarray['status']='false';
         
        }else{
            $plansdataarray['status']='true';
       
        }
        $plansdata[]=$plansdataarray;
  

    }  
    $rep=array();
    $rep['plandatadetails']=$plansdata;
        $rep['planids']=$level_data;
    return $rep;
    
}
function usertotallevels($id)
{
    $userdata = User::where('id', $id)->first();
    $level=json_decode($userdata->level_data,true);
    return $level;
    
}


function usernamebyid($id)
{
    $userdata = User::where('id', $id)->first();
    return $userdata;
    
}

function activelevel($id)
{
    if(isUserExists($id)){
    $userdata = User::where('id', $id)->first();
    return $userdata->level;
    }
    
}
function activeplan($id)
{
    if(isUserExists($id)){
    $userdata = User::where('id', $id)->first();
    return $userdata->activeplan;
    }
    
}
function getUsersAtLevel( $id, $level,$leveldb,$plan) {
    $usersAtLevel = [];
    $dbname=levelbydbname($leveldb);

    // Base case: If the desired level is reached, return users at that level
    if ($level == 0) {
        // Query the database to retrieve users at the specified level
$userdata= json_decode(json_encode((DB::select('SELECT user_id, pos_id FROM '.$dbname.' WHERE pos_id = "'.$id.'" and plan_id="'.$plan.'" 
and level="'.$leveldb.'" AND position <= 4 ')),true),true);
   
      if(count($userdata)>0){
        foreach ($userdata as $row)
          {
                    $usersAtLevel[] = $row;
            }
        }
    } elseif ($level > 0) {
        // Recursive case: Get users at the next level
        $userdata= json_decode(json_encode((DB::select('SELECT user_id, pos_id FROM '.$dbname.' WHERE pos_id = "'.$id.'" and plan_id="'.$plan.'" 
and level="'.$leveldb.'"')),true),true);

if(count($userdata)>0){
    foreach ($userdata as $row)
      {
                 //echo 'hiii';
                $nextLevelUsers = getUsersAtLevel($row['user_id'], $level - 1,$leveldb,$plan);
                $usersAtLevel = array_merge($usersAtLevel, $nextLevelUsers);
            }
        }
    }

    return $usersAtLevel;
}

function getlevelusersnew($id,$level,$leveldb,$plan,$currentLevel = 1)
{
    $dbname=levelbydbname($leveldb);

    if ($currentLevel > $level) {
        return [];
    }
    $children = [];
  
    $userdata= json_decode(json_encode((DB::select('SELECT user_id, pos_id FROM '.$dbname.' WHERE pos_id = "'.$id.'" and plan_id="'.$plan.'" and level="'.$leveldb.'"')),true),true);
        if(count($userdata)>0){
       
        foreach ($userdata as $row)
          {
            $children[] = $row['user_id'];
      
            $grandchildren = getlevelusersnew( $row['user_id'], $level,$leveldb,$plan, $currentLevel + 1);
            $children = array_merge($children, $grandchildren);
       
          }
        }
      
    return $children ;
}

function clubcheckupdatedp($id){

    $userdata = User::where('id', $id)->first();
    $plan=$userdata->activeplan;
    $userdetails=userdetails($id);
    $leveldata=array();
    if($userdetails->p1=='1'){
        $leveldata['1']=$userdetails->l1;
    }
    if($userdetails->p2=='1'){
        $leveldata['2']=$userdetails->l2;
    }
    if($userdetails->p3=='1'){
        $leveldata['3']=$userdetails->l3;
    }
   // $leveldata=array();
    if(!empty($leveldata)){ 
    $keys = array_keys($leveldata);
    for($ke=0; $ke < count($keys); ++$ke) {
        $plan=$keys[$ke] ;
       // echo $plan;
        $level=$leveldata[$keys[$ke]];   
        $tclubs=array("2","3","4");
        $club1resp=getUsersAtLevel($id,'0',$level,$plan); 
                    if($plan=='1'){
                       $columnname='plan1';
                       $clubcname='p1c';
                    }else if($plan=='2'){
                        $columnname='plan2';
                        $clubcname='p2c';
                    }else if($plan=='3'){
                        $columnname='plan3';
                        $clubcname='p3c';
                    }
        if($club1resp)
        {
            $dbname=levelbydbname($level);
            if(count($club1resp)=='4'){
                for($j=0;$j<count($club1resp);$j++){
                    $userdatad= json_decode(json_encode((DB::select('SELECT * FROM dps WHERE user_id = "'.$id.'" and child_id="'.$club1resp[$j]['user_id'].'" and plan="'.$plan.'" and level="'.$level.'" and status="0"')),true),true);
                    if(count($userdatad)!='0'){
                    foreach($userdatad as $userdata){
                     $dpid = $userdata['id'];
                    $userdetails=userdetails($id);
                    $balance= $userdetails[$columnname];
                    $updatetransactionpin=DB::update("UPDATE `dps` SET `status`='1'  where id=$dpid");
 
                    $updbal=$balance+$userdata['amount'];
                    $updbal_bal=$userdetails['balance']+$userdata['amount'];
                    
                    $updatetransactionpin=DB::update("UPDATE `users` SET $columnname=$updbal,$clubcname='1',`balance`='$updbal_bal'  where id=$id");
 
                        }
                    }
                    }
                       
                  

                }
              
        }

            $club2resp=getUsersAtLevel($id,'1',$level,$plan); 
            if(count($club2resp)=='16')
            {
                for($k=0;$k<count($club2resp);$k++){
                    $userdatad= json_decode(json_encode((DB::select('SELECT * FROM dps WHERE user_id = "'.$id.'" and child_id="'.$club2resp[$k]['user_id'].'" and 
                    plan="'.$plan.'" and level="'.$level.'" and status="0"')),true),true);
                    if(count($userdatad)!='0'){
                        foreach($userdatad as $userdata){
                   //         echo $userdata['id'];
                     $dpid = $userdata['id'];
                    $userdetails=userdetails($id);
                    $balance= $userdetails[$columnname];
                    $updatetransactionpin=DB::update("UPDATE `dps` SET `status`='1'  where id=$dpid");
 
                    $updbal=$balance+$userdata['amount'];
                    $updbal_bal=$userdetails['balance']+$userdata['amount'];
                    
                    $updatetransactionpin=DB::update("UPDATE `users` SET $columnname=$updbal,$clubcname='1',`balance`='$updbal_bal'  where id=$id");
 
 
                        }
                    }
                }
                
                
                
           }
         $club3resp=getUsersAtLevel($id,'2',$level,$plan);
                 if(count($club3resp)=='64')
                 {
                    
                    for($l=0;$l<count($club3resp);$l++){
                        // foreach ($club3resp as $key => $value) {
        
                            $userdatad= json_decode(json_encode((DB::select('SELECT * FROM dps WHERE user_id = "'.$id.'" and child_id="'.$club3resp[$l]['user_id'].'" and plan="'.$plan.'" and level="'.$level.'" and status="0"')),true),true);
                            if(count($userdatad)!='0'){
                                foreach($userdatad as $userdata){
                        //         echo $userdata['id'];
                            $dpid = $userdata['id'];
                            $userdetails=userdetails($id);
                            $balance= $userdetails[$columnname];
                            $updatetransactionpin=DB::update("UPDATE `dps` SET `status`='1'  where id=$dpid");
        
                            $updbal=$balance+$userdata['amount'];
                            $updbal_bal=$userdetails['balance']+$userdata['amount'];
                            
                            $updatetransactionpin=DB::update("UPDATE `users` SET $columnname=$updbal,`balance`='$updbal_bal'  where id=$id");
                            
                                }
                            }
                     }


                        
                 
            }

        
   
        
            $club3resp=getUsersAtLevel($id,'2',$level,$plan);
           if(count($club3resp)>=64){
            
$ulpl=updatelevelbyplan($id,$level,$plan);
        }
     //   exit;
        
    }
  

 //   exit;
}
    else{
    return false;
} 

         
}
function updatelevelbyplan($id,$level,$plan){
   // $level=$level+1;
    if($level=='8'){

    }else{
        $ulevel=$level+1;
    
    }
  /*  echo 'SELECT * FROM upgrade_level WHERE plan = "'.$plan.'" and level="'.$plan.'"';*/
    
 $dbname=levelbydbname($ulevel);
      
$check= json_decode(json_encode((DB::select("SELECT * FROM `$dbname` WHERE user_id ='$id'  and `plan_id`='$plan' 
   and `level`='$ulevel'")),true),true);
   if(count($check)=='0'){
    $posdata=json_decode(json_encode((DB::select('SELECT id,uid,position,level FROM matrix_pos where `plan`="'.$plan.'" and `level`="'.$ulevel.'" order by id ASC limit 1')),true),true);

$pos_id=$posdata['0']['uid'];
 $position=$posdata['0']['position'];
 $removeid=$posdata['0']['id'];
 $level=$posdata['0']['level'];
 $check_pos= json_decode(json_encode((DB::select("SELECT * FROM `$dbname` WHERE user_id ='$id' and `pos_id`='$pos_id' and `plan_id`='$plan' 
   and `level`='$ulevel'")),true),true);
   if(count($check_pos)=='0'){
    $upgradedata= json_decode(json_encode((DB::select('SELECT * FROM upgrade_level WHERE plan = "'.$plan.'" and level="'.$ulevel.'"')),true),true);
    $amount=$upgradedata['0']['amount'];
    if($plan=='1'){
       $levelcolumnname='l1';
       $clubcname='p1c';
    }else if($plan=='2'){
        $levelcolumnname='l2';
        $clubcname='p2c';
    }else if($plan=='3'){
        $levelcolumnname='l3';
        $clubcname='p3c';
    }

   $userdetails=userdetails($id);
                 
   $updbal_bal=$userdetails['balance']-$amount;
   $updatetransactionpin=DB::update("UPDATE `users` SET `balance`=$updbal_bal,$clubcname='0',$levelcolumnname='$ulevel'  where id=$id");


$student = new Transactions;
$student->user_id = $id;
$student->amount =$amount;
$student->type ="Upgradedtolevel";
$student->trx ='Upgraded to level '.$ulevel;

$student->details ='SEP-'.$plan;
$student->save();

 $dbnames=levelbydbnames($ulevel);
 $leveldata=json_decode(json_encode((DB::select("INSERT INTO $dbname( `pos_id`,`position`,`user_id`,`plan_id`,`level`) VALUES ('$pos_id','$position','$id','$plan','$ulevel')")),true),true);
 $leveldata=json_decode(json_encode((DB::select("INSERT INTO `subscribers`(`user_id`, `plan`, `level`) VALUES ('$id','$plan','$level')")),true),true);

   
   $posdata=json_decode(json_encode((DB::select("DELETE FROM `matrix_pos` WHERE id='$removeid'")),true),true);
   $data=array('1','2','3','4');
   foreach($data as $dt){
       $posdatacount=json_decode(json_encode((DB::select("SELECT id,uid,position FROM matrix_pos where id='$id' and position='$dt' and plan='$plan' and level='$ulevel'")),true),true);
      if( count($posdatacount)=='0'){
       $posdata=json_decode(json_encode((DB::select("INSERT INTO `matrix_pos`(`uid`, `position`,`plan`,`level`) VALUES ('$id','$dt','$plan','$ulevel')")),true),true);

      }
  
   }

   find_upline_users_upgrade( $id,$ulevel,$plan,$amount);
}
   }
//exit;
}
function userlevelcheck($id,$level,$plan)
{
    //echo $id;
    
    $tclubs=array("2","3","4");
    for($i=0;$i<count($tclubs);$i++){
        $clubsno=$tclubs[$i];
        $resp=clubbyusers($id,$clubsno,$level,$plan);
        if($resp){
        if($clubsno=='2'){

            if(count($resp)!='4'){
                return $level;
                break;
            }

        }
        if($clubsno=='3'){

            if(count($resp)!='16'){
                return $level;
                break;
            }

        }
        if($clubsno=='4'){

            if(count($resp)!='64'){
                return $level;
                break;
            }

        }
    }
    else{
        return $level;
    }
        
    }
 
    
}
function userdata($dbname,$level,$planid,$id){
    //echo 'SELECT * FROM '.$dbname.' WHERE user_id = "'.$id.'" and plan_id="'.$planid.'" and level="'.$level.'"';
   return $userdata= json_decode(json_encode((DB::select('SELECT * FROM '.$dbname.' WHERE user_id = "'.$id.'" and plan_id="'.$planid.'" and level="'.$level.'"')),true),true);
          
}
function clubbyusers($id,$clubno,$level,$plan)
{
        $downline_users = array();
        $dbname=levelbydbname($level);
        echo $clubno;
      for ($i = 1; $i < $clubno; $i++) {
        $userdata= json_decode(json_encode((DB::select('SELECT user_id, pos_id FROM '.$dbname.' WHERE pos_id = "'.$id.'" and plan_id="'.$plan.'" and level="'.$level.'"')),true),true);
        if(count($userdata)>0){
       
        foreach ($userdata as $row)
          {
                 $downline_users[] = $row["user_id"];
          }
        }
      
        // If no downline users were found, break the loop
        if (count($downline_users) == 0) {
          break;
        }
      
        // Set the user ID to the first downline user ID
        $id = $downline_users[0];
      }
    return $downline_users ;
}

function clubbyoneusers($id,$clubno,$level,$plan)
{
        $downline_users = array();
        $positions=array();
        $dbname=levelbydbname($level);
      for ($i = 1; $i <= $clubno; $i++) {
        $userdata= json_decode(json_encode((DB::select('SELECT user_id, pos_id,position FROM '.$dbname.' WHERE pos_id = "'.$id.'" and plan_id="'.$plan.'" and level="'.$level.'"')),true),true);
        if(count($userdata)>0){
       
            foreach ($userdata as $row)
            {
                 $downline_users[] = $row["user_id"];
                 $positions[] = $row["position"];
         
          }
        }
      
        // If no downline users were found, break the loop
        if (count($downline_users) == 0) {
          break;
        }
      
        // Set the user ID to the first downline user ID
        $id = $downline_users[0];
      }
    return $positions ;
}


function getLevelUsers($userId, $level,$status,$dbname,$plan) {
    $userId;
    $users = array();
    $downline=json_decode(json_encode((DB::select('SELECT user_id FROM '.$dbname.' WHERE ref_id="'.$userId.'" and plan_id="'.$plan.'" and level="'.$level.'"' )),true),true);
    
    foreach ($downline as $row)
    {
      $row['level'] = $level;
        $users[] = $row;
        $users = array_merge($users,getLevelUsers($row['user_id'], $level,$status,$dbname,$plan));
    }
    $data=array();
    return $users;
   

}

function getLevelUsersBytop($userId, $level,$status,$dbname,$plan) {
    $users = array();
    $downline=json_decode(json_encode((DB::select('SELECT id as user_id FROM users WHERE ref_id="'.$userId.'"  and level="'.$level.'" and clubcheck="0"' )),true),true);
  
    foreach ($downline as $row)
    {
      $row['level'] = $level;
        $users[] = $row;
        $users = array_merge($users,getLevelUsers($row['user_id'], $level + 1,$status,$dbname,$plan));
    }
    return $users;
   // return $data;
  

}



function updateFreeCount($id,$level,$plan)
{
    $newuser=$id;

    while ($id != "" || $id != "0") {
        if (isUserExists($id)) {
            $posid = getPositionId($id,$level,$plan);
            if ($posid == "0") {
                break;
            }
            $position = getPositionLocation($id,$level,$plan);
            $extra = UserExtra::where(['user_id' => $posid,'level' => $level,'plan' => $plan])->first();
         //   print_r($extra);
            if ($position == 1) {
                $extra->free_left1 += 1;
                if($extra->free_left1_data){
                    $usersdata=json_decode($extra->free_left1_data,true);
                    if (!in_array($newuser, $usersdata)) {
                        // if the value is not already in the array, add it
                        $usersdata[] = $newuser;
                    }
                }else{
                    $usersdata=array();
                }

                $extra->free_left1_data = json_encode($usersdata,true);;
           
            } else if ($position == 2){
                $extra->free_left2 += 1;
                if($extra->free_left2_data){
                    $usersdata=json_decode($extra->free_left2_data,true);
                    if (!in_array($newuser, $usersdata)) {
                        // if the value is not already in the array, add it
                        $usersdata[] = $newuser;
                    }
                }else{
                    $usersdata=array();
                }
                $extra->free_left2_data = json_encode($usersdata,true);;
           
            }
            else if ($position == 3){
                $extra->free_right1 += 1;
                if($extra->free_right1_data){
                    $usersdata=json_decode($extra->free_right1_data,true);
                    if (!in_array($newuser, $usersdata)) {
                        // if the value is not already in the array, add it
                        $usersdata[] = $newuser;
                    }
                }else{
                    $usersdata=array();
                }
                $extra->free_right1_data = json_encode($usersdata,true);;
           
            }
            else if ($position == 4){
                $extra->free_right2 += 1;
                if($extra->free_right2_data){
                    $usersdata=json_decode($extra->free_right2_data,true);
                    if (!in_array($newuser, $usersdata)) {
                        // if the value is not already in the array, add it
                        $usersdata[] = $newuser;
                    }
                }else{
                    $usersdata=array();
                }
                $extra->free_right2_data = json_encode($usersdata,true);;
           
            }

            $extra->save();
           

            $id = $posid;

        } else {
            break;
        }
    }

}



function getPositionId($id,$level,$plan)
{
    if($level=='1'){
    }
    $user=level_1::where('user_id',$id)->where('plan_id', $plan)->get();
   
  //  $user=levelbydbnameid($level,$id);
    //echo $user;
    //print_r($user);
    if ($user) {
        return $user['0']['pos_id'];
   
    //    return $user->pos_id;
    } else {
        return 0;
    }
}

function getPositionLocation($id,$dbname,$plan)
{
 //   \DB::enableQueryLog();
    $user = level_1::where('user_id',$id)->where('plan_id', $plan)->get();
   // dd(\DB::getQueryLog());
    //print_r($user);
   // echo $user['0']['position'];
    //exit;
    if ($user) {
        return $user['0']['position'];
   
    //    return $user->position;
    } else {
        return 0;
    }
}

function levelbydbnameid($level,$id){

    $dbname = [
        '1' => level_1::find($id),
        '2' => level_2::find($id),
        '3' => level_3::find($id),
        '4' => level_4::find($id),
        '5' => level_5::find($id),
        '6' => level_6::find($id),
        '7' => level_7::find($id)
    ];
    return $dbname[$level];

    
}


function levelbydbname($level){


    $dbname = [
        '1' => 'level_1s',
        '2' => 'level_2s',
        '3' => 'level_3s',
        '4' => 'level_4s',
        '5' => 'level_5s',
        '6' => 'level_6s',
        '7' => 'level_7s'
    ];
    return $dbname[$level];
}
function levelbydbnames($level){


    $dbname = [
        '1' => 'level_1()',
        '2' => 'level_2()',
        '3' => 'level_3()',
        '4' => 'level_4()',
        '5' => 'level_5()',
        '6' => 'level_6()',
        '7' => 'level_7()'
    ];
    return $dbname[$level];
}

function treeidbytreename($name)
{

    $treeid = [
        'righttree1' => '3',
        'righttree2' => '4',
        'lefttree1' => '1',
        'lefttree2' => '2'
    ];
    return $treeid[$name];

  
}

function treenamebytreeid($id)
{
    $treename = [
        '3' => 'righttree1',
        '4' => 'righttree2',
        '1' => 'lefttree1',
        '2' => 'lefttree2'
    ];
    return $treename[$id];

 }

 function plannamebyid($id)
{
    if($id){
    $treename = [
        '1' => 'Sep-23',
        '2' => 'Sep-100',
        '3' => 'Sep-500',
    ];
    return $treename[$id];
}else{
    return null;
}

 }
 function percentagecal($amount,$per){

    return round(($amount*$per/100),2);

 }
function find_upline_users( $user_id,$levelid,$plan) {
    $upline = [];
    $parent_id = $user_id;
    $dbname=levelbydbname($levelid);
      
    $level = 1;
   // echo 'SELECT pos_id FROM '.$dbname.' WHERE user_id="'.$parent_id.'" and plan_id="'.$plan.'" and level="'.$levelid.'"';
    while ($parent_id >= 1 && $level <= 4) {
      // Get the parent user ID from the database
      $downline=json_decode(json_encode((DB::select('SELECT pos_id FROM '.$dbname.' WHERE user_id="'.$parent_id.'" and plan_id="'.$plan.'" and level="'.$levelid.'"')),true),true);

//print_r($downline);
      if (count($downline) == 1) {
        foreach ($downline as $row)
            {
                $parent_id = $row["pos_id"];
            }
        if ($parent_id !== null) {
          array_unshift($upline, "$parent_id");
        }
      } else {
        // User not found in the database
        break;
      }
      $level++;
    }
    if($plan=='1'){
       $amount='20';
    }else if($plan=='2'){
        $amount='100';
   
    }else if($plan=='3'){
        $amount='500';
   
    }
    $sub_amount='0';
    $calamount='0';
    //print_r($upline);
    if(count($upline)=='0'){
        array_unshift($upline,"0");
        array_unshift($upline,"0");
        array_unshift($upline,"0");
        array_unshift($upline,"0");
   
     
    }
    if(count($upline)=='1'){
        array_unshift($upline,"0");
        array_unshift($upline,"0");
        array_unshift($upline,"0");
   
     
    }else if(count($upline)=='2'){
        array_unshift($upline,"0");
        array_unshift($upline,"0");
   
    }
    else if(count($upline)=='3'){
        array_unshift($upline,"0");
    }
                for ($x = 0; $x <= count($upline); $x++) {
            if($x=='0'){

            }else if($x=='1'){

                if($upline[$x]!='0'){
            
            $per='50';
            $calamount=percentagecal($amount,$per);
            $sub_amount+=$calamount;

            $club='3';
            $data=array('user_id'=>$upline[$x],'child_id'=>$user_id,"club"=>$club,"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $calamount,"status"=>'0');
            DB::table('dps')->insert($data);
            }
            }else if($x=='2'){
                 
                if($upline[$x]!='0'){
            $per='10';
            
            $calamount=percentagecal($amount,$per);
            $sub_amount+=$calamount;
            $club='2';
            $data=array('user_id'=>$upline[$x],'child_id'=>$user_id,"club"=>$club,"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $calamount,"status"=>'0');
            DB::table('dps')->insert($data);
          
            }
            }else if($x=='3'){
                if($upline[$x]!='0'){
            
            $per='25';
            $calamount=percentagecal($amount,$per);


            $sub_amount+=$calamount;
            $club='1';
            $userdata=userdata($dbname,$levelid,$plan,$upline[$x]);
            $data=array('user_id'=>$upline[$x],'child_id'=>$user_id,"club"=>$club,"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $calamount,"status"=>'0');
            DB::table('dps')->insert($data);
            }
            }

        }
        if($plan=='1'){
            $amount=$amount+3;
        }
        $data=array('user_id'=>'1','child_id'=>$user_id,"club"=>'0',"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $amount-$sub_amount,"status"=>'0');
        DB::table('dps')->insert($data);
     
    
return true;
    //return $upline;
  }

 function find_upline_users_upgrade( $user_id,$levelid,$plan,$amount) {
    $upline = [];
    $parent_id = $user_id;
    $dbname=levelbydbname($levelid);
      
    $level = 1;
   // echo 'SELECT pos_id FROM '.$dbname.' WHERE user_id="'.$parent_id.'" and plan_id="'.$plan.'" and level="'.$levelid.'"';
    while ($parent_id >= 1 && $level <= 4) {
      // Get the parent user ID from the database
      $downline=json_decode(json_encode((DB::select('SELECT pos_id FROM '.$dbname.' WHERE user_id="'.$parent_id.'" and plan_id="'.$plan.'" and level="'.$levelid.'"')),true),true);

//print_r($downline);
      if (count($downline) == 1) {
        foreach ($downline as $row)
            {
                $parent_id = $row["pos_id"];
            }
        if ($parent_id !== null) {
          array_unshift($upline, "$parent_id");
        }
      } else {
        // User not found in the database
        break;
      }
      $level++;
    }
    $sub_amount='0';
    $calamount='0';
    //print_r($upline);
    if(count($upline)=='0'){
        array_unshift($upline,"0");
        array_unshift($upline,"0");
        array_unshift($upline,"0");
        array_unshift($upline,"0");
   
     
    }
    if(count($upline)=='1'){
        array_unshift($upline,"0");
        array_unshift($upline,"0");
        array_unshift($upline,"0");
   
     
    }else if(count($upline)=='2'){
        array_unshift($upline,"0");
        array_unshift($upline,"0");
   
    }
    else if(count($upline)=='3'){
        array_unshift($upline,"0");
    }
                for ($x = 0; $x <= count($upline); $x++) {
            if($x=='0'){

            }else if($x=='1'){

                if($upline[$x]!='0'){
            
            $per='50';
            $calamount=percentagecal($amount,$per);
            $sub_amount+=$calamount;

            $club='3';
            $data=array('user_id'=>$upline[$x],'child_id'=>$user_id,"club"=>$club,"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $calamount,"status"=>'0');
            DB::table('dps')->insert($data);
            }
            }else if($x=='2'){
                 
                if($upline[$x]!='0'){
            $per='10';
            
            $calamount=percentagecal($amount,$per);
            $sub_amount+=$calamount;
            $club='2';
            $data=array('user_id'=>$upline[$x],'child_id'=>$user_id,"club"=>$club,"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $calamount,"status"=>'0');
            DB::table('dps')->insert($data);
          
            }
            }else if($x=='3'){
                if($upline[$x]!='0'){
            
            $per='25';
            $calamount=percentagecal($amount,$per);


            $sub_amount+=$calamount;
            $club='1';
            $userdata=userdata($dbname,$levelid,$plan,$upline[$x]);
            $data=array('user_id'=>$upline[$x],'child_id'=>$user_id,"club"=>$club,"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $calamount,"status"=>'0');
            DB::table('dps')->insert($data);
            }
            }

        }
        
        $data=array('user_id'=>'1','child_id'=>$user_id,"club"=>'0',"position"=>'1',"plan"=>$plan,"level"=>$levelid,"amount"=> $amount-$sub_amount,"status"=>'0');
        DB::table('dps')->insert($data);
     
    
return true;
    //return $upline;
  }

 function getPositionUser($id, $position,$plan)
 {
   // $plan=activeplan($id);
   
  /*  \DB::enableQueryLog();
    DB::table('level_1s')->select('users.id','users.username' ,'users.login_id','level_1s.user_id','users.mobile','users.address','users.created_at')
     ->join('users','users.id','=','level_1s.user_id')->where('level_1s.pos_id', $id)->where('level_1s.position', $position)->where('level_1s.plan_id', $plan)->first();
    dd(\DB::getQueryLog());
*/
 $level=activelevel($id);
   
//$dbname=levelbydbname($level);
  // $dbn=$dbname. ' as level_1s';
   
     return DB::table('level_1s')->select('users.id','users.username' ,'users.login_id','level_1s.user_id','users.mobile','users.address','users.created_at')
     ->join('users','users.id','=','level_1s.user_id')->where('level_1s.pos_id', $id)->where('level_1s.position', $position)->where('level_1s.plan_id', $plan)->first();
 }
 
 function leveltreeusers($id,$plan){
  //  echo 'check';
    
    $res = array_fill_keys(array('b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o','p','q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
    'aa', 'ab', 'ac', 'ad','ae', 'af', 'ag', 'ah', 'ai','aj', 'ak', 'al', 'am', 'an','ao', 'ap', 'aq', 'ar', 'as','at','au', 'av', 'aw', 'ax', 'ay','az',
    'ba', 'bb', 'bc', 'bd','be', 'bf', 'bg', 'bh', 'bi','bj', 'bk', 'bl', 'bm', 'bn','bo', 'bp', 'bq', 'br', 'bs','bt','bu', 'bv', 'bw', 'bx', 'by','bz',
 'ca','cb','cc','cd','ce','cf','cg'), null);
    // $res = array_fill_keys(array('b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o','p','q', 'r', 's', 't', 'u', 'v'), null);
    //$plan=activeplan($id);

    //echo $plan;
  //  \DB::enableQueryLog();
  // $dbname=levelbydbname($level);
   //$dbn=$dbname. ' as level_1s';
    $res['a'] = DB::table('level_1s')->select('users.id','users.login_id','users.username' ,'level_1s.user_id','users.mobile','users.address','users.created_at')
    ->join('users','users.id','=','level_1s.user_id')->where('level_1s.user_id', trim($id))->where('level_1s.plan_id', $plan)->first();
    //dd(\DB::getQueryLog());
  
    $res['b'] = getPositionUser($id, 1,$plan);
   //    print_r($res['b']);
 
   // exit;
    if ($res['b']) {
        $res['f'] = getPositionUser($res['b']->id, 1,$plan);
        $res['g'] = getPositionUser($res['b']->id, 2,$plan);
        $res['h'] = getPositionUser($res['b']->id, 3,$plan);
        $res['i'] = getPositionUser($res['b']->id, 4,$plan);
  
    }
    if ($res['f']) {
        $res['v'] = getPositionUser($res['f']->id, 1,$plan);
        $res['w'] = getPositionUser($res['f']->id, 2,$plan);
        $res['x'] = getPositionUser($res['f']->id, 3,$plan);
        $res['y'] = getPositionUser($res['f']->id, 4,$plan);
    }
    if ($res['g']) {
     $res['z'] = getPositionUser($res['g']->id, 1,$plan);
     $res['aa'] = getPositionUser($res['g']->id, 2,$plan);
     $res['ab'] = getPositionUser($res['g']->id, 3,$plan);
     $res['ac'] = getPositionUser($res['g']->id, 4,$plan);
     }
     if ($res['h']) {
         $res['ad'] = getPositionUser($res['h']->id, 1,$plan);
         $res['ae'] = getPositionUser($res['h']->id, 2,$plan);
         $res['af'] = getPositionUser($res['h']->id, 3,$plan);
         $res['ag'] = getPositionUser($res['h']->id, 4,$plan);
         }
         if ($res['i']) {
             $res['ah'] = getPositionUser($res['i']->id, 1,$plan);
             $res['ai'] = getPositionUser($res['i']->id, 2,$plan);
             $res['aj'] = getPositionUser($res['i']->id, 3,$plan);
             $res['ak'] = getPositionUser($res['i']->id, 4,$plan);
             }
               
    $res['c'] = getPositionUser($id, 2,$plan);
    if ($res['c']) {
        $res['j'] = getPositionUser($res['c']->id, 1,$plan);
        $res['k'] = getPositionUser($res['c']->id, 2,$plan);
        $res['l'] = getPositionUser($res['c']->id, 3,$plan);
        $res['m'] = getPositionUser($res['c']->id, 4,$plan);
    
    }
    if ($res['j']) {
        $res['al'] = getPositionUser($res['j']->id, 1,$plan);
        $res['am'] = getPositionUser($res['j']->id, 2,$plan);
        $res['an'] = getPositionUser($res['j']->id, 3,$plan);
        $res['ao'] = getPositionUser($res['j']->id, 4,$plan);
   
    }
    if ($res['k']) {
     $res['ap'] = getPositionUser($res['k']->id, 1,$plan);
     $res['aq'] = getPositionUser($res['k']->id, 2,$plan);
     $res['ar'] = getPositionUser($res['k']->id, 3,$plan);
     $res['as'] = getPositionUser($res['k']->id, 4,$plan);
 
     }
     if ($res['l']) {
         $res['at'] = getPositionUser($res['l']->id, 1,$plan);
         $res['au'] = getPositionUser($res['l']->id, 2,$plan);
         $res['av'] = getPositionUser($res['l']->id, 3,$plan);
         $res['aw'] = getPositionUser($res['l']->id, 4,$plan);
 
     }
     if ($res['m']) {
         $res['ax'] = getPositionUser($res['m']->id, 1,$plan);
         $res['ay'] = getPositionUser($res['m']->id, 2,$plan);
         $res['az'] = getPositionUser($res['m']->id, 3,$plan);
         $res['ba'] = getPositionUser($res['m']->id, 4,$plan);
 
     }
 
     $res['d'] = getPositionUser($id, 3,$plan);
    if ($res['d']) {
        $res['n'] = getPositionUser($res['d']->id, 1,$plan);
        $res['o'] = getPositionUser($res['d']->id, 2,$plan);
        $res['p'] = getPositionUser($res['d']->id, 3,$plan);
        $res['q'] = getPositionUser($res['d']->id, 4,$plan);
    
    }
    if ($res['n']) {
        $res['bb'] = getPositionUser($res['n']->id, 1,$plan);
        $res['bc'] = getPositionUser($res['n']->id, 2,$plan);
        $res['bd'] = getPositionUser($res['n']->id, 3,$plan);
        $res['be'] = getPositionUser($res['n']->id, 4,$plan);
   
    }
    if ($res['o']) {
     $res['bf'] = getPositionUser($res['o']->id, 1,$plan);
     $res['bg'] = getPositionUser($res['o']->id, 2,$plan);
     $res['bh'] = getPositionUser($res['o']->id, 3,$plan);
     $res['bi'] = getPositionUser($res['o']->id, 4,$plan);
 
     }
     if ($res['p']) {
         $res['bj'] = getPositionUser($res['p']->id, 1,$plan);
         $res['bk'] = getPositionUser($res['p']->id, 2,$plan);
         $res['bl'] = getPositionUser($res['p']->id, 3,$plan);
         $res['bm'] = getPositionUser($res['p']->id, 4,$plan);
    
     }
     if ($res['q']) {
         $res['bn'] = getPositionUser($res['q']->id, 1,$plan);
         $res['bo'] = getPositionUser($res['q']->id, 2,$plan);
         $res['bp'] = getPositionUser($res['q']->id, 3,$plan);
         $res['bq'] = getPositionUser($res['q']->id, 4,$plan);
    
     }
     $res['e'] = getPositionUser($id, 4,$plan);
     if ($res['e']) {
         $res['r'] = getPositionUser($res['e']->id, 1,$plan);
         $res['s'] = getPositionUser($res['e']->id, 2,$plan);
         $res['t'] = getPositionUser($res['e']->id, 3,$plan);
         $res['u'] = getPositionUser($res['e']->id, 4,$plan);
     
     }
     if ($res['r']) {
         $res['br'] = getPositionUser($res['r']->id, 1,$plan);
         $res['bs'] = getPositionUser($res['r']->id, 2,$plan);
         $res['bt'] = getPositionUser($res['r']->id, 3,$plan);
         $res['bu'] = getPositionUser($res['r']->id, 4,$plan);
    
     }
     if ($res['s']) {
      $res['bv'] = getPositionUser($res['s']->id, 1,$plan);
      $res['bw'] = getPositionUser($res['s']->id, 2,$plan);
      $res['bx'] = getPositionUser($res['s']->id, 3,$plan);
      $res['by'] = getPositionUser($res['s']->id, 4,$plan);
  
      }
      if ($res['t']) {
          $res['bz'] = getPositionUser($res['t']->id, 1,$plan);
          $res['ca'] = getPositionUser($res['t']->id, 2,$plan);
          $res['cb'] = getPositionUser($res['t']->id, 3,$plan);
          $res['cc'] = getPositionUser($res['t']->id, 4,$plan);
     
      }
      if ($res['u']) {
          $res['cd'] = getPositionUser($res['u']->id, 1,$plan);
          $res['ce'] = getPositionUser($res['u']->id, 2,$plan);
          $res['cf'] = getPositionUser($res['u']->id, 3,$plan);
          $res['cg'] = getPositionUser($res['u']->id, 4,$plan);
     
      }
      return $res;
 
  }





?>