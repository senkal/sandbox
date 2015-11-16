#!/usr/bin/env php
<?php

    //app/console or bin/console
    require __DIR__ . '/../vendor/autoload.php';

    use Symfony\Component\Console\Application;
    use Symfony\Component\Console\ConsoleEvents;
    use Symfony\Component\EventDispatcher\EventDispatcher;
    use MyApp\Command\DeleteGalleryCommand;

    $consoleListener = new MyApp\Listener\ConsoleListener();

    $dispather = new EventDispatcher();
    $dispather->addListener(ConsoleEvents::COMMAND, [$consoleListener, 'onCommandStart']);
    $dispather->addListener(ConsoleEvents::TERMINATE, [$consoleListener, 'onCommandTerminate']);
    $dispather->addListener(ConsoleEvents::EXCEPTION, [$consoleListener, 'onCommandException']);

    $application = new Application();
    $application->add(new DeleteGalleryCommand());
    $application->run();
