<?php

function dd(...$args): void
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    echo '</pre>';
    die();
}