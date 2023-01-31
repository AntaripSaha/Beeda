<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Ride;
use App\User;
use App\Classes\NotificationClass;
use DateTime;

class ScheduleRide extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    private $notificationClass;
    protected $signature = 'schedule:ride';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(NotificationClass $notificationClass)
    {
        parent::__construct();
        $this->notificationClass = $notificationClass;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Cron is working fine for schedule ride man!");
        date_default_timezone_set('Asia/Dhaka'); 
        $date   = new DateTime(); //this returns the current date time
        $result = $date->format('Y-m-d H:i'); 
        $scheduleRides = Ride::where('ride_type', 1)->where('pickup_datetime', 'like', "%{$result}%")->get();
        
        foreach($scheduleRides as $ride){
            
            $user = User::find($ride->user_id);
            $this->notificationClass->scheduleRideNotification($user, $ride);
            $driver = User::find($ride->driver_id);
            $this->notificationClass->scheduleRideNotification($driver, $ride);
            
        }

        // $ride = Ride::find(1422);
        // $driver = User::find($ride->user_id);
        // $this->notificationClass->scheduleRideNotification($driver, $ride);
    }
}
