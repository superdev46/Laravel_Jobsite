<?php

namespace App\Traits;

use DB;
use App\Campaign;

trait FunctionalAreaTrait
{
    
	private function getFunctionalAreaIdsAndNumJobs($limit = 16)
    {
        return Campaign::select('functional_area_id', DB::raw('COUNT(campaigns.functional_area_id) AS num_jobs'))
                        ->groupBy('functional_area_id')
						->notExpire()
						->active()
                        ->orderBy('num_jobs', 'DESC')
                        ->limit($limit)
                        ->get();
    }
	
	
}
