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
     * @return array<object> Servers in an array
     */
    public function getServers()
    {
        $response = $this->httpClient->get('server');
        return $response->servers->server;
    }

    /**
     * Get server details.
     * @param $uuid UUID of the server
     * @return object Server details in an array
     */
    public function getServer(string $uuid)
    {
        $response = $this->httpClient->get("server/$uuid");
        return $response->server;
    }

    /**
     * Get the available server CPU and memory configurations (sizes).
     *
     * @return array Available server sizes/configurations/plans
     */
    public function getServerSizes()
    {
        $response = $this->httpClient->get("server_size");
        return $response->server_sizes->server_size;
    }

    /**
     * Create a new server
     *
     * @param array $server Arguments for the server creation
     * @return object Details of the created server
     */
    public function createServer($server)
    {
        $response = $this->httpClient->post("server", ['server' => $server]);
        return $response->server;
    }

    /**
     * Modify the details of a server.
     *
     * @param string $uuid UUID of the server to modify
     * @param array $data Server details to change, can be just one field or the whole server object
     * @return object Updated server details
     */
    public function modifyServer(string $uuid, $data)
    {
        $response = $this->httpClient->put("server/$uuid", ['server' => $data]);
        return $response->server;
    }

    /**
     * Delete a server and optionally also its storages and/or backups.
     *
     * @param string $uuid UUID of the server to delete
     * @param array{backups?: 'keep'|'keep_latest'|'delete', storages?: 0|1} $opts Optional settings to delete storages & backups along with the server
     * @return mixed HTTP response object status 204 with no content
     */
    public function deleteServer(string $uuid, array $opts = null)
    {
        $path = "server/$uuid" . (empty($opts) ? '' : '?' . http_build_query($opts));

        $response = $this->httpClient->delete($path);
        return $response;
    }

    /**
     * Start a stopped server.
     *
     * @param string $uuid UUID of the server
     * @param array{avoid_host: string, host: string, start_type: 'async'|'sync'} $opts Options for starting the server
     * @return object Array containing the details of the server
     */
    public function startServer(string $uuid, array $opts = null)
    {
        $response = $this->httpClient->post(
            "server/$uuid/start",
            (empty($opts) ? null : ['server' => $opts])
        );
        return $response->server;
    }

    /**
     * Stops a started server. Can be a hard or a soft stop. Hard stop is the equivalent of pulling the plug on the server
     *
     * @param string $uuid UUID of the server
     * @param array $opts Options for stopping the server
     * @return object Array containing the details of the server
     */
    public function stopServer(string $uuid, array $opts = null)
    {
        $response = $this->httpClient->post(
            "server/$uuid/stop",
            (empty($opts) ? null : ['stop_server' => $opts])
        );
        return $response->server;
    }

    /**
     * Restarts a started server.
     *
     * @param string $uuid UUID of the server
     * @param array{stop_type: 'soft'|'hard', timeout: number, timeout_action: 'destroy'|'ignore', host: number} $opts Options for the restart operation
     * @return object Array containing the details of the server
     */
    public function restartServer(string $uuid, array $opts = null)
    {
        $response = $this->httpClient->post(
            "server/$uuid/restart",
            (empty($opts) ? null : ['restart_server' => $opts])
        );
        return $response->server;
    }

    /**
     * Cancels a running server operation, for example cloning.
     *
     * @param string $uuid UUID of the server
     * @return array Response containing status 204 and no content if the cancel succeeded
     */
    public function cancelServerOperation(string $uuid)
    {
        $response = $this->httpClient->post("server/$uuid/cancel", null);
        return $response;
    }
}
