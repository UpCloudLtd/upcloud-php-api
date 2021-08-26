<?php

namespace UpCloud;

/**
 * Trait for all Server related API methods.
 */
trait ServerApiTrait
{
    /**
     * The HTTP client for making the requests
     * @var \UpCloud\HttpClient
     */
    protected $httpClient;

    /**
     * Get all the servers on this account.
     * @return array Servers in an array
     */
    public function getServers()
    {
        $response = $this->httpClient->get('server');
        return $response->servers->server;
    }

    /**
     * Get server details.
     * @param $uuid UUID of the server
     * @return array Server details in an array
     */
    public function getServer(string $uuid)
    {
        $response = $this->httpClient->get("server/$uuid");
        return $response->server;
    }

    /**
     * Create a new server
     * @param $server Arguments for the server creation
     * @return array Details of the created server
     */
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
