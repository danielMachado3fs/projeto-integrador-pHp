<?php

namespace App\Views\login;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Login implements SplSubject
{

    public $userid;
    public $email;

    protected $observerStorage;


    public function __construct()
    {
        $this->observerStorage = new SplObjectStorage();
    }


    public function attach(SplObserver $observer)
    {
        $this->observerStorage->attach($observer);
    }


    public function detach(SplObserver $observer)
    {
        $this->observerStorage->detach($observer);
    }


    public function notify()
    {
        foreach ($this->observerStorage as $value) {
            $value->update($this);
        }
    }


    public function handle()
    {
        $this->notify();
    }
}