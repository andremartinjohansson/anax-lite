<?php

namespace QuasaR\Cookie;

class Cookie
{

    private $expire;

    public function __construct($time = 86400*30)
    {
        $this->expire = time() + $time;
    }

    public function has($key)
    {
        return array_key_exists($key, $_COOKIE);
    }

    public function set($name, $val)
    {
        $_COOKIE[$name] = $val;
    }

    public function get($key, $default = false)
    {
        return (self::has($key)) ? $_COOKIE[$key] : $default;
    }

    public function delete($key)
    {
        if (self::has($key)) {
            unset($_COOKIE[$key]);
        }
    }

    public function dump()
    {
        return $_COOKIE;
    }
}
