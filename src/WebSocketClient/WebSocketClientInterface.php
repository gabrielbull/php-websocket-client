<?php
namespace WebSocketClient;

interface WebSocketClientInterface
{
    /**
     * @param array $data
     */
    function onWelcome(array $data);

    /**
     * @param string $topic
     * @param string $event
     */
    public function onEvent($topic, $event);

    /**
     * @param WebSocketClient $client
     */
    function setClient(WebSocketClient $client);
}