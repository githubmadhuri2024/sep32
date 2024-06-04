<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Type extends Model{
    protected $fillable = [
        'name',
        
        'status',
       ];
   
       public function getRouteKeyName()
       {
           return 'type_id';
       }
}
?>