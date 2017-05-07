<?php

namespace QuasaR\Cookie;

class CookieTest extends \PHPUnit_Framework_TestCase
{
    public function testCookie()
    {
        $cookie = new Cookie();
        $this->assertTrue(isset($_COOKIE));
        $this->assertTrue(isset($cookie));
    }

    public function testKey()
    {
        $cookie = new Cookie();
        $cookie->set("Rocket", "League");
        $this->assertTrue($cookie->has("Rocket"));
        $this->assertEquals("League", $cookie->get("Rocket"));
        $cookie->delete("Rocket");
        $this->assertFalse($cookie->has("Rocket"));
    }

    public function testDump()
    {
        $cookie = new Cookie();
        $cookie->set("Rocket", "League");
        $ret = $cookie->dump();
        $this->assertTrue(isset($ret));
    }
}
