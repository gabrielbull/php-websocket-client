<?php
namespace WebSocketClient\Tests\Exception;

use PHPUnit_Framework_TestCase;
use WebSocketClient\Exception\ConnectionException;

class ConnectionExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \WebSocketClient\Exception\ConnectionException
     */

    public function testConnectionException()
    {
        throw new ConnectionException;
    }
}