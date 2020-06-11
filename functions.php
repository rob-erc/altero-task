<?php

//used to return view files from controller methods and pass data to those files
function view(string $path, array $vars = [])
{
    extract($vars);

    include(__DIR__ . '/app/Views/' . $path . '.php');
}

//redirects to a route
function redirect(string $location)
{
    header('Location: ' . $location);
    exit;
}

function config(string $key, string $defaultValue = '')
{
    $defaultValue = !empty($defaultValue) ? $defaultValue : $key;
    [$fileName, $configKey] = explode('.', $key, 2);
    $config = include __DIR__ . '/config/'.$fileName.'.php';

    return $config[$configKey] ?? $defaultValue;
}
