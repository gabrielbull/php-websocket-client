<?php

namespace WebSocketClient;

use WebSocketClient;

interface WebSocketClientInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    function onWelcome(array $data);

    /**
     * @param string $topic
     * @param string $event
     * @return mixed
     */
    public function onEvent($topic, $event);

    /**
     * @param WebSocketClient $client
     * @return mixed
     */
    function setClient(WebSocketClient $client);
}