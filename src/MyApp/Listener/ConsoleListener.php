<?php
namespace MyApp\Listener;

use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleExceptionEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;

class ConsoleListener
{
    public function onCommandStart(ConsoleCommandEvent $event)
    {
    }
    public function onCommandTerminate(ConsoleTerminateEvent $event)
    {
    }
    public function onCommandException(ConsoleExceptionEvent $event)
    {
    }

}
