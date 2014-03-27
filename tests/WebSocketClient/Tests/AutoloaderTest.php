<?php
namespace WebSocketClient\Tests;

use PHPUnit_Framework_TestCase;
use WebSocketClient\Autoloader;

class AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        Autoloader::register();
        $this->assertContains(array('WebSocketClient\\Autoloader', 'autoload'), spl_autoload_functions());
    }

    public function testAutoload()
    {
        $declared = get_declared_classes();
        $declaredCount = count($declared);
        Autoloader::autoload('Foo');
        $this->assertEquals(
            $declaredCount,
            count(get_declared_classes()),
            'WebSocketClient\\Autoloader::autoload() is trying to load classes outside of the WebSocketClient namespace'
        );
        Autoloader::autoload('WebSocketClient\\WebSocketClient');
        $this->assertTrue(
            in_array('WebSocketClient\\WebSocketClient', get_declared_classes()),
            'WebSocketClient\\Autoloader::autoload() failed to autoload the WebSocketClient\\WebSocketClient class'
        );
    }
}