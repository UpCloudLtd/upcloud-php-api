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
     *
     * @return array<object> Servers in an array
     */
    public function getServers()
    {
        $response = $this->httpClient->get('server');
        return $response->servers->server;
    }

    /**
     * Get server details.
     *
     * @param string $uuid UUID of the server
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
     * Server options:
     *
     * - cpu_count: (string) Number of cores for the server
     * - title: (string) Title of the server
     *
     * @param array $server Arguments for the server creation
     * @return object Details of the created server
     */
    public function createServer(array $server)
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
    public function modifyServer(string $uuid, array $data)
    {
        $response = $this->httpClient->put("server/$uuid", ['server' => $data]);
        return $response->server;
    }

    /**
     * Delete a server and optionally also its storages and/or backups.
     *
     * Options:
     *
     * - backups: ('keep'|'keep_latest'|'delete') Optionally delete the server's
     *   backups along with the server.
     * - storages: (boolean|0|1) Optinally delete the server's storages along
     *   with the server.
     *
     * @param string $uuid UUID of the server to delete
     * @param array{backups?: 'keep'|'keep_latest'|'delete', storages?: 0|1} $opts Options
     * @return mixed HTTP response object status 204 with no content
     */
    public function deleteServer(string $uuid, array $opts = null)
    {
        if (is_bool($opts['storages'])) {
            $opts['storages'] = $opts['storages'] ? 1 : 0;
        }

        $path = "server/$uuid" . (empty($opts) ? '' : '?' . http_build_query($opts));

        $response = $this->httpClient->delete($path);
        return $response;
    }

    /**
     * Start a stopped server.
     *
     * Options:
     *
     * - avoid_host: (string) Avoid starting on the given host ID.
     * - start_type: ('async'|'sync') Make the start operation asynchronous or
     *   synchronous (default: 'sync').
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
     * Stop a started server.
     *
     * Options:
     *
     * - stop_type: ('soft'|'hard') Stop type, 'hard' is the equivalent to
     *   pulling the power plug.
     * - timeout: (number) Timeout how long to try to stop the server.
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
     * Restart a started server.
     *
     * Options:
     *
     * - stop_type: ('soft'|'hard') Stop type, 'hard' is the equivalent to
     *   pulling the power plug.
     * - timeout: (number) Timeout how long to try to stop the server.
     * - timeout_action: ('destroy'|'ignore') Abort the restart, or ignore the
     *   timeout.
     * - host: (number) ID of the host to restart on.
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
     * Cancel a running server operation, for example cloning.
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
