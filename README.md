WebSocket client
================

[![Build Status](https://travis-ci.org/gabrielbull/php-websocket-client.svg)](https://travis-ci.org/gabrielbull/php-websocket-client)

A simple WebSocket WAMP client implemented in PHP.

This is an implementation of WAMP version 1. I have not had the time to implement WAMP 2, but if you do, that would be
awesome.

## Requirements

This library uses PHP 5.3+.

## Install

It is recommended that you install the WebSocket client library [through composer](http://getcomposer.org).

```JSON
{
    "require": {
        "gabrielbull/websocket-client": "dev-master"
    }
}
```

## Usage

Here is an example of a simple WebSocket client:

```php
use WebSocketClient\WebSocketClient;
use WebSocketClient\WebSocketClientInterface;

class Client implements WebSocketClientInterface
{
    private $client;

    public function onWelcome(array $data)
    {
    }

    public function onEvent($topic, $message)
    {
    }

    public function subscribe($topic)
    {
        $this->client->subscribe($topic);
    }

    public function unsubscribe($topic)
    {
        $this->client->unsubscribe($topic);
    }

    public function call($proc, $args, Closure $callback = null)
    {
        $this->client->call($proc, $args, $callback);
    }

    public function publish($topic, $message)
    {
        $this->client->publish($topic, $message);
    }

    public function setClient(WebSocketClient $client)
    {
        $this->client = $client;
    }
}

$loop = React\EventLoop\Factory::create();

$client = new WebSocketClient(new Client, $loop);

$loop->run();
```
