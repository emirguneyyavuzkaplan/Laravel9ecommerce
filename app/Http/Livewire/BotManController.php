<?php

namespace App\Http\Livewire;

use Livewire\Component;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotManController extends Component
{
    public function handle()
    {
        $botman=app('botman');
        $botman->hears('{message}',function ($botman,$message){
            if ($message=='hi'){
                $this->askName($botman);
            } else {
                $botman->reply("write 'hi' for testing...");
            }
        });
        $botman->listen();
    }


    public function askName($botman)
    {
        $botman->ask("Hello! What is Your Name", function (Answer $answer){
            $name =$answer->getText();
            $this->say('Nice to meet You'.$name);
        });
    }


    public function render()
    {

        return view('livewire.bot-man-controller');
    }


}
