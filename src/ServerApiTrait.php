<?php

namespace UpCloud;

trait ServerApiTrait
{
    /**
     * The HTTP client for making the requests
     * @var \UpCloud\HttpClient
     */
    protected $httpClient;

    public function getServers()
    {
        $response = $this->httpClient->get('server');
        return $response->servers->server;
    }

    public function getServer(string $uuid)
    {
        $response = $this->httpClient->get("server/$uuid");
        return $response->server;
    }

    public function createServer($server)
    {
        $response = $this->httpClient->post("server", ['server' => $server]);
        return $response->server;
    }

    public function modifyServer(string $uuid)
    {
        /** TODO: this */
    }

    public function deleteServer(string $uuid)
    {
        /** TODO: this */
    }

    /** TODO: add rest of server operations here */
}
