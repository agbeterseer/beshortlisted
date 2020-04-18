<?php

namespace App\Utility;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class DateUtil
{
	public $returnCurrentTime;

		public function __construct()
	{
		$returnCurrentTime = $this->returnCurrentTime();
	}
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function returnCurrentTime()
    {
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        return $currentTime;
    }



}