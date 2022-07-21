<?php

namespace Shieldforce\Frontend\CssRender;

class Ghost
{
    public static function head(array $links = [])
    {
        return implode("\n", $links);
    }
}