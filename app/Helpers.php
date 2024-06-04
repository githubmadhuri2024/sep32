<?php

use App\Models\BvLog;
use App\Models\EmailTemplate;
use App\Models\Extension;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Models\Plan;
use App\Models\SmsTemplate;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Carbon\Carbon;





 function leveltreeusers($id){
    $res = array_fill_keys(array('b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o','p','q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
    'aa', 'ab', 'ac', 'ad','ae', 'af', 'ag', 'ah', 'ai','aj', 'ak', 'al', 'am', 'an','ao', 'ap', 'aq', 'ar', 'as','at','au', 'av', 'aw', 'ax', 'ay','az',
    'ba', 'bb', 'bc', 'bd','be', 'bf', 'bg', 'bh', 'bi','bj', 'bk', 'bl', 'bm', 'bn','bo', 'bp', 'bq', 'br', 'bs','bt','bu', 'bv', 'bw', 'bx', 'by','bz',
 'ca','cb','cc','cd','ce','cf','cg'), null);
    // $res = array_fill_keys(array('b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o','p','q', 'r', 's', 't', 'u', 'v'), null);
     
    $res['a'] = User::find($id);
 
    $res['b'] = $this->getPositionUser($id, 1);
    if ($res['b']) {
        $res['f'] = $this->getPositionUser($res['b']->id, 1);
        $res['g'] = $this->getPositionUser($res['b']->id, 2);
        $res['h'] = $this->getPositionUser($res['b']->id, 3);
        $res['i'] = $this->getPositionUser($res['b']->id, 4);
  
    }
    if ($res['f']) {
        $res['v'] = $this->getPositionUser($res['f']->id, 1);
        $res['w'] = $this->getPositionUser($res['f']->id, 2);
        $res['x'] = $this->getPositionUser($res['f']->id, 3);
        $res['y'] = $this->getPositionUser($res['f']->id, 4);
    }
    if ($res['g']) {
     $res['z'] = $this->getPositionUser($res['g']->id, 1);
     $res['aa'] = $this->getPositionUser($res['g']->id, 2);
     $res['ab'] = $this->getPositionUser($res['g']->id, 3);
     $res['ac'] = $this->getPositionUser($res['g']->id, 4);
     }
     if ($res['h']) {
         $res['ad'] = $this->getPositionUser($res['h']->id, 1);
         $res['ae'] = $this->getPositionUser($res['h']->id, 2);
         $res['af'] = $this->getPositionUser($res['h']->id, 3);
         $res['ag'] = $this->getPositionUser($res['h']->id, 4);
         }
         if ($res['i']) {
             $res['ah'] = $this->getPositionUser($res['i']->id, 1);
             $res['ai'] = $this->getPositionUser($res['i']->id, 2);
             $res['aj'] = $this->getPositionUser($res['i']->id, 3);
             $res['ak'] = $this->getPositionUser($res['i']->id, 4);
             }
               
    $res['c'] = $this->getPositionUser($id, 2);
    if ($res['c']) {
        $res['j'] = $this->getPositionUser($res['c']->id, 1);
        $res['k'] = $this->getPositionUser($res['c']->id, 2);
        $res['l'] = $this->getPositionUser($res['c']->id, 3);
        $res['m'] = $this->getPositionUser($res['c']->id, 4);
    
    }
    if ($res['j']) {
        $res['al'] = $this->getPositionUser($res['j']->id, 1);
        $res['am'] = $this->getPositionUser($res['j']->id, 2);
        $res['an'] = $this->getPositionUser($res['j']->id, 3);
        $res['ao'] = $this->getPositionUser($res['j']->id, 4);
   
    }
    if ($res['k']) {
     $res['ap'] = $this->getPositionUser($res['k']->id, 1);
     $res['aq'] = $this->getPositionUser($res['k']->id, 2);
     $res['ar'] = $this->getPositionUser($res['k']->id, 3);
     $res['as'] = $this->getPositionUser($res['k']->id, 4);
 
     }
     if ($res['l']) {
         $res['at'] = $this->getPositionUser($res['l']->id, 1);
         $res['au'] = $this->getPositionUser($res['l']->id, 2);
         $res['av'] = $this->getPositionUser($res['l']->id, 3);
         $res['aw'] = $this->getPositionUser($res['l']->id, 4);
 
     }
     if ($res['m']) {
         $res['ax'] = $this->getPositionUser($res['m']->id, 1);
         $res['ay'] = $this->getPositionUser($res['m']->id, 2);
         $res['az'] = $this->getPositionUser($res['m']->id, 3);
         $res['ba'] = $this->getPositionUser($res['m']->id, 4);
 
     }
 
     $res['d'] = $this->getPositionUser($id, 3);
    if ($res['d']) {
        $res['n'] = $this->getPositionUser($res['d']->id, 1);
        $res['o'] = $this->getPositionUser($res['d']->id, 2);
        $res['p'] = $this->getPositionUser($res['d']->id, 3);
        $res['q'] = $this->getPositionUser($res['d']->id, 4);
    
    }
    if ($res['n']) {
        $res['bb'] = $this->getPositionUser($res['n']->id, 1);
        $res['bc'] = $this->getPositionUser($res['n']->id, 2);
        $res['bd'] = $this->getPositionUser($res['n']->id, 3);
        $res['be'] = $this->getPositionUser($res['n']->id, 4);
   
    }
    if ($res['o']) {
     $res['bf'] = $this->getPositionUser($res['o']->id, 1);
     $res['bg'] = $this->getPositionUser($res['o']->id, 2);
     $res['bh'] = $this->getPositionUser($res['o']->id, 3);
     $res['bi'] = $this->getPositionUser($res['o']->id, 4);
 
     }
     if ($res['p']) {
         $res['bj'] = $this->getPositionUser($res['p']->id, 1);
         $res['bk'] = $this->getPositionUser($res['p']->id, 2);
         $res['bl'] = $this->getPositionUser($res['p']->id, 3);
         $res['bm'] = $this->getPositionUser($res['p']->id, 4);
    
     }
     if ($res['q']) {
         $res['bn'] = $this->getPositionUser($res['q']->id, 1);
         $res['bo'] = $this->getPositionUser($res['q']->id, 2);
         $res['bp'] = $this->getPositionUser($res['q']->id, 3);
         $res['bq'] = $this->getPositionUser($res['q']->id, 4);
    
     }
     $res['e'] = $this->getPositionUser($id, 3);
     if ($res['e']) {
         $res['r'] = $this->getPositionUser($res['e']->id, 1);
         $res['s'] = $this->getPositionUser($res['e']->id, 2);
         $res['t'] = $this->getPositionUser($res['e']->id, 3);
         $res['u'] = $this->getPositionUser($res['e']->id, 4);
     
     }
     if ($res['r']) {
         $res['br'] = $this->getPositionUser($res['n']->id, 1);
         $res['bs'] = $this->getPositionUser($res['n']->id, 2);
         $res['bt'] = $this->getPositionUser($res['n']->id, 3);
         $res['bu'] = $this->getPositionUser($res['n']->id, 4);
    
     }
     if ($res['s']) {
      $res['bv'] = $this->getPositionUser($res['s']->id, 1);
      $res['bw'] = $this->getPositionUser($res['s']->id, 2);
      $res['bx'] = $this->getPositionUser($res['s']->id, 3);
      $res['by'] = $this->getPositionUser($res['s']->id, 4);
  
      }
      if ($res['t']) {
          $res['bz'] = $this->getPositionUser($res['t']->id, 1);
          $res['ca'] = $this->getPositionUser($res['t']->id, 2);
          $res['cb'] = $this->getPositionUser($res['t']->id, 3);
          $res['cc'] = $this->getPositionUser($res['t']->id, 4);
     
      }
      if ($res['u']) {
          $res['cd'] = $this->getPositionUser($res['u']->id, 1);
          $res['ce'] = $this->getPositionUser($res['u']->id, 2);
          $res['cf'] = $this->getPositionUser($res['u']->id, 3);
          $res['cg'] = $this->getPositionUser($res['u']->id, 4);
     
      }

      return $res;
 
  } 

