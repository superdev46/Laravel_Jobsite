<?php

namespace App;

use DB;
use App;
use Illuminate\Database\Eloquent\Model;

class CampaignApply extends Model
{
    protected $table = 'campaign_apply';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];

	public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getUser($field = '')
    {
        if(null !== $user = $this->user()->first()){
			if (!empty($field)) {
				return $user->$field;
			} else {
				return $user;
			}
		}
    }
	
	public function campaign()
    {
        return $this->belongsTo('App\Campaign', 'campaign_id', 'id');
    }

    public function getCampaign($field = '')
    {
        if(null !== $campaign = $this->campaign()->first()){
			if (!empty($field)) {
				return $campaign->$field;
			} else {
				return $campaign;
			}
		}
    }
	
}