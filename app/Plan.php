<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
   // protected $guarded = []; or you can use
	
	protected $fillable = [
     'p_name',
     'p_price',
     'bussiness_volume',
     'referral_commission',
     'total_commission',
     'status',
	];

	public function getRouteKeyName()
	{
		return 'id';
	}
}