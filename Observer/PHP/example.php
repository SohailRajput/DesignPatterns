<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include 'Observer.php';

/**
 * Miltery Control Center
 * Signal Corp.
 */
class ControlCenter extends Observable
{
    const TRAINING = 0;
    const ATTACK = 1;
    const COVER = 2;
    const DEFEND = 3;

    public function command()
    {
        $this->state = rand(1,2);
        $this->notify();
    }
}


/**
 * Alpha; Artillery Unit
 */
class Alpha extends Observer
{
    public function update(SplSubject $control)
    {
        if($control->state === ControlCenter::ATTACK)
        {
            echo 'Alpha, Move to the position & Attack!!!<br/>';
        }
    }
}

/**
 * Bravo; Artillery Unit
 */
class Bravo extends Observer
{

    public function update(SplSubject $control)
    {
        if($control->state === ControlCenter::COVER)
        {
            echo 'Bravo Team, Cover Alpha!!!<br/>';
        }
    }
}

/**
 * Charlie; Artillery Unit
 */
class Charlie extends Observer
{
    public function update(SplSubject $control)
    {
        if($control->state === ControlCenter::DEFEND)
        {
            echo 'Charlie Team, Defend the position!!!<br/>';
        }
    }
}

$cc = new ControlCenter();

$a = new Alpha();
$b = new Bravo();
$c = new Charlie();

$cc->attach($a);
$cc->attach($b);
$cc->attach($c);

$cc->command();
$cc->command();
$cc->command();