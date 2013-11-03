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
     * @param WebSocketClient $client
     * @return mixed
     */
    function setClient(WebSocketClient $client);

    /**
     * @return WebSocketClient
     */
    function getClient();
}