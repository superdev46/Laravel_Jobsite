<?php

namespace App\Events;

use App\Campaign;
use Illuminate\Queue\SerializesModels;

class CampaignPosted
{
    use SerializesModels;

    public $campaign;
	
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }
    
}
