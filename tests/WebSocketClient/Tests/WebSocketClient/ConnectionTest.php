<?php
namespace WebSocketClient\Tests\WebSocketClient;

use PHPUnit_Framework_TestCase;
use React\EventLoop\Factory;
use React\EventLoop\StreamSelectLoop;
use WebSocketClient\Tests\Client;
use WebSocketClient\Tests\Server;

class ConnectionTest extends PHPUnit_Framework_TestCase
{
    private $host = '127.0.0.1';
    private $port;
    private $path = '/mytest';

    /**
     * @var StreamSelectLoop
     */
    private $loop;

    /**
     * @var Server
     */
    private $server;

    public function setUp()
    {
        $this->port = !empty($GLOBALS['port']) ? (int)$GLOBALS['port'] : 8080;
        $this->loop = Factory::create();
        $this->server = new Server($this->loop, $this->port, $this->path);

        $loop = $this->loop;
        $this->loop->addPeriodicTimer(10, function () use ($loop) {
            $loop->stop();
        });
    }

    public function tearDown()
    {
        $this->server->close();
    }

    public function testConnection()
    {
        $loop = $this->loop;

        $client = new Client($loop, $this->host, $this->port, $this->path);

        $response = null;
        $client->setOnWelcomeCallback(function (Client $conn, array $data) use (&$response, $loop) {
            $response = $data;
            $loop->stop();
        });

        $loop->run();

        $this->assertNotNull($response);
    }

    /**
     * @expectedException \WebSocketClient\Exception\ConnectionException
     */
    public function testConnectionFail()
    {
        $loop = $this->loop;
        $client = new Client($loop, $this->host, 0, $this->path);
        $loop->run();
    }
}
