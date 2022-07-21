<?php

namespace Shieldforce\Frontend\JsRender;

class Ghost
{
    public static function js(array $links = [])
    {
        return implode("\n", $links);
    }
}