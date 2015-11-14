#!/usr/bin/env php
<?php
    //app/console or bin/console
    require __DIR__ . '/../vendor/autoload.php';

    use Symfony\Component\Console\Application;

    $application = new Application();
    $application->add(new DeleteGalleryCommand());
    $application->run();
