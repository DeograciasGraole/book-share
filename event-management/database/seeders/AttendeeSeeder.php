<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Event;
use \App\Models\Attendee;
class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $users=User::All();
         $events=Event::all();
         foreach($users as $user){
            $eventsToAttend=$events->random(rand(1,3));
            foreach($eventsToAttend as $event){
                Attendee::create([
                    'user_id'=>$user->id,
                    'event_id'=>$event->id
                ]);
               }
         }
    }
}
