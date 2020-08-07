<?php

namespace App\Events;

use App\Campaign;
use App\CampaignApply;
use Illuminate\Queue\SerializesModels;

class CampaignApplied
{
    use SerializesModels;
	
	public $campaign;
	public $campaignApply;
	
	
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign, CampaignApply $campaignApply)
    {
        $this->campaign = $campaign;
		$this->campaignApply = $campaignApply;
    }
    
}
