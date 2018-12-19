<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Date;
use Carbon\Carbon;
use App\User;
use App\Tag;
use Mail;
use App\Mail\ExpiredJobNotification;
class ExpireJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Admin and employer when job post has expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = Date::now(); 
        $currentTime = Carbon::now();
        $currentTime->toDateTimeString();
        $admin_list = User::all();

        $jobs = Tag::whereYear('end_date', '=', date('y'))->whereMonth('end_date', '=', date('m'))->whereDay('end_date', '=', date('d'))->get();
    //dd($jobs);
  // if today is is true for $users
  // get check_ex_expriy_date and add 30 day
 
  // then send email
    try {
        // get the client

  
            foreach($jobs as $job) {
     $tag = Tag::where('id', $job->id)->update(['delete'=> 0, 'status' => 1, 'active' =>2, 'awaiting_aproval' => 0, 'draft' => 0]);
                foreach ($admin_list as $admin) {

                    if ($admin->is_admin()) {

                        
                        $get_client_record = User::findOrfial($job->client);
                        $get_client_record->email;

                       Mail::to($admin)->queue(new ExpiredJobNotification($jobs));
                       Mail::to($get_client_record->email)->queue(new ExpiredJobNotification($jobs));
                    }

                } 
            }

     $this->info('expired job notificaiton sent successfully!'); 
    } catch (\Exception $e) {
        // print_r('Birthday messages not sent');
        $this->info('expired job notificaiton not sent!' . $e->getMessage()); 
    }

  }


}
