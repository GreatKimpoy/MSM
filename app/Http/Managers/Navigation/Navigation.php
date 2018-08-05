<?php

namespace App\Http\Managers\Navigation;

use App\Http\Managers\Navigation\Top;
use App\Http\Managers\Navigation\Left;
use App\Http\Managers\Navigation\Right;
use App\Http\Managers\Navigation\Bottom;

class Navigation
{
    public static function all()
    {
        return array_merge( Left::all(), Right::all(), Top::all(), Bottom::all());
    }
}