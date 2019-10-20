<?php

class Observable implements  SplSubject
{
    /**
     * text
     */
    public $state;

    /**
     * text
     */
    private $observers;

    /**
     * text
     */
    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * text
     */
    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /**
     * text
     */
    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * text
     */
    public function notify()
    {
        foreach($this->observers as $observer) {
            $observer->update($this);
        }
    }
}


/**
 * text
 */
class Observer implements SplObserver {

    /**
     * text
     */
    public function update (SplSubject $subject)
    {
        // Abstract Logic goes here...
    }
}