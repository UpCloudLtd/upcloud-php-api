<?php

namespace UpCloud;

/**
 * Trait for all Server related API methods.
 */
trait ServerApiTrait
{
    /**
     * @var \UpCloud\HttpClient
     */
    protected $httpClient;

    /**
     * Get a list of the servers on this account with only the essentail details.
     *
     * @return array Servers in an array
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
     *
     * @return object The server's details
     *
     * @link https://developers.upcloud.com/1.3/8-servers/#get-server-details
     */
    public function getServerDetails(string $uuid)
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
     * Create a new server.
     *
     * @param array $server Details of the server to create. See
     *                      https://developers.upcloud.com/1.3/8-servers/#create-server
     *                      for the most up-to-date list of accepted fields and values.
     *
     * @return object The created server
     *
     * @link https://developers.upcloud.com/1.3/8-servers/#create-server
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
     * @param array  $data Server details to change, can be just one field or the
     *                     whole server object. See
     *                     https://developers.upcloud.com/1.3/8-servers/#modify-server
     *                     for up-to-date list of accepted fields and values.
     *
     * @return object Updated server details
     *
     * @link https://developers.upcloud.com/1.3/8-servers/#modify-server
     */
    public function modifyServer(string $uuid, array $data)
    {
        $response = $this->httpClient->put("server/$uuid", ['server' => $data]);
        return $response->server;
    }

    /**
     * Delete a server and optionally also its storages and/or backups.
     *
     * Options array accepts the following options:
     *
     * - backups: ('keep'|'keep_latest'|'delete') Optionally delete the server's
     *   backups along with the server.
     * - storages: (boolean|0|1) Optionally delete the server's storages along
     *   with the server.
     *
     * @param string $uuid    UUID of the server to delete.
     * @param array  $options (optional) Options for the delete operation, such as
     *                        backup or storage deletion strategy.
     *
     * @return mixed HTTP response object status 204 with no content.
     */
    public function deleteServer(string $uuid, array $options = null)
    {
        if (is_bool($options['storages'])) {
            $options['storages'] = (int) $options['storages'];
        }

        $path = "server/$uuid" . (empty($options) ? '' : '?' . http_build_query($options));

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
     * @param string $uuid    UUID of the server
     * @param array  $options Options for starting the server
     *
     * @return object Array containing the details of the server
     */
    public function startServer(string $uuid, array $options = null)
    {
        $response = $this->httpClient->post(
            "server/$uuid/start",
            (empty($options) ? null : ['server' => $options])
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
     * @param string $uuid    UUID of the server
     * @param array  $options Options for stopping the server
     *
     * @return object Array containing the details of the server
     */
    public function stopServer(string $uuid, array $options = null)
    {
        $response = $this->httpClient->post(
            "server/$uuid/stop",
            (empty($options) ? null : ['stop_server' => $options])
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
     * @param string $uuid    UUID of the server
     * @param array  $options Options for the restart operation
     *
     * @return object Array containing the details of the server
     */
    public function restartServer(string $uuid, array $options = null)
    {
        $response = $this->httpClient->post(
            "server/$uuid/restart",
            (empty($options) ? null : ['restart_server' => $options])
        );
        return $response->server;
    }

    /**
     * Cancel a running server operation, for example cloning.
     *
     * @param string $uuid UUID of the server
     *
     * @return array Response containing status 204 and no content if the cancel succeeded
     */
    public function cancelServerOperation(string $uuid)
    {
        $response = $this->httpClient->post("server/$uuid/cancel", null);
        return $response;
    }

    /**
     * Attach a storage to the server.
     *
     * Options:
     *
     * - address: ('virtio'|'ide'|'scsi'|'ide[:[01]:[01]]'|'scsi[:0:[0-7]]'|'virtio[:[0-7]]')
     *   The address for the new storage (default: virtio)
     * - storage: (string) Valid UUID of the "disk" storage to attach
     * - type: ('disk'|'cdrom') Attach a disk or an empty CDROM drive to the server
     * - boot_disk: (0|1|true|false) Make this storage the first boot device
     *
     * @param string $serverUuid UUID of the server to attach to.
     * @param array  $options    Configuration options for the attach operation.
     */
    public function attachStorage(string $serverUuid, array $options = [])
    {
        $path = "server/$serverUuid/storage/attach";

        if (isset($options['boot_disk'])) {
            $options['boot_disk'] = (int) $options['boot_disk'];
        }

        // Default to "virtio"; API defaults to "ide" but it's not very relevant nowadays
        if (empty($options['address']) && (empty($options['type']) || $options['type'] === 'disk')) {
            $options['address'] = 'virtio';
        }

        $response = $this->httpClient->post($path, ['storage_device' => $options]);
        return $response->server;
    }

    /**
     * Detaches a storage from the server.
     *
     * @param string $serverUuid           UUID of the server to attach to.
     * @param string $storageUuidOrAddress UUID or address of the storage to detach.
     */
    public function detachStorage(string $serverUuid, string $storageUuidOrAddress)
    {
        foreach (['ide', 'scsi', 'virtio'] as $address) {
            $isAddress = stripos($storageUuidOrAddress, $address) !== false;
            if ($isAddress) {
                break;
            }
        }

        if ($isAddress) {
            $opts = ['address' => $storageUuidOrAddress];
        } else {
            $opts = ['storage' => $storageUuidOrAddress];
        }

        $path = "server/$serverUuid/storage/detach";
        $response = $this->httpClient->post($path, ['storage_device' => $opts]);
        return $response->server;
    }

    /**
     * Load a CDROM image into the CDROM device. The server must have a CDROM device,
     * use attachStorage() to add a CDROM device.
     *
     * @param string $uuid    UUID of the server.
     * @param string $storage UUID of the CDROM storage to load.
     *
     * @return object Server details.
     */
    public function loadCdrom(string $serverUuid, string $storageUuid)
    {
        $response = $this->httpClient->post(
            "server/$serverUuid/cdrom/load",
            ['storage_device' => ['storage' => $storageUuid]]
        );
        return $response->server;
    }

    /**
     * Eject a CDROM image from the CDROM device.
     *
     * @param string $uuid UUID of the server.
     *
     * @return object Server details.
     */
    public function ejectCdrom(string $serverUuid)
    {
        $response = $this->httpClient->post("server/$serverUuid/cdrom/eject", null);
        return $response->server;
    }
}
