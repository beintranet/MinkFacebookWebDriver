<?php

namespace SilverStripe\MinkSelenium3Driver\Tests\Custom;

use Behat\Mink\Tests\Driver\TestCase;

class WindowNameTest extends TestCase
{
    const WINDOW_NAME_REGEXP = '/(?:[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}|^\d++$)/i';

    public function testPatternGetWindowNames()
    {
        $session = $this->getSession();

        $windowNames = $session->getWindowNames();
        $this->assertArrayHasKey(0, $windowNames);

        foreach ($windowNames as $name) {
            $this->assertRegExp(self::WINDOW_NAME_REGEXP, $name);
        }
    }

    public function testGetWindowName()
    {
        $session = $this->getSession();

        $this->assertRegExp(self::WINDOW_NAME_REGEXP, $session->getWindowName());
    }
}
