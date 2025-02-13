<?php

namespace App\Helpers;

function cleanKeyWord($filter)
{
    return isset($filter) ? '%' . trim($filter) . '%' : null;
}
