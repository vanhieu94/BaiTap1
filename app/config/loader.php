<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir
    )
)->register();


$loader->registerNamespaces(array(
    'Modules\Controllers' => $config->application->controllersDir,
    'Modules\Models' => $config->application->modelsDir
))->register();