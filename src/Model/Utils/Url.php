<?php

namespace Model\Utils;

final class Url
{
    public static function getUri($uri = ''): string
    {
        $parts = explode('/', BASE_URI);
        $parts = array_merge($parts, explode('/', $uri));
        $parts = array_filter($parts, function ($value) {
            return '' !== $value && '/' !== $value;
        });

        return '/' . implode('/', $parts);
    }
}