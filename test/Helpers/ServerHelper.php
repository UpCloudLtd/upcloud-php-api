<?php
namespace Upcloud\ApiClient\Helpers;

use Upcloud\ApiClient\Upcloud\ServerApi;
use Upcloud\ApiClient\Model\Server;
use \Upcloud\ApiClient\Model\CreateServerRequest;
use \Upcloud\ApiClient\Model\ServerState;
use \Upcloud\ApiClient\Model\StopServer;
use \Upcloud\ApiClient\Model\StopServerRequest;
use \Upcloud\ApiClient\ApiException;

const defaultServer = [
    "zone" => "fi-hel1",
    "title" => "Firewall test server",
    "hostname" => "debian.example.com",
    "plan" => "2xCPU-2GB",
    "storage_devices" => [
        "storage_device" => [
            [
                "action" => "clone",
                "title" => "Debian from a template",
                "size" => 50,
                "storage" => "01000000-0000-4000-8000-000020030100",
                "tier" => "maxiops"
            ]
        ]
    ]
];

class ServerHelper
{
    public static $api;

    public static function init()
    {
        if (self::$api === null) {
            self::$api = new ServerApi;
            // self::$api->getConfig()->setHost("http://localhost:8080/1.2");
            self::$api->getConfig()->setUsername(getenv("UPCLOUD_API_TEST_USER"));
            self::$api->getConfig()->setPassword(getenv("UPCLOUD_API_TEST_PASSWORD"));
        }
    }

    public static function createServer($server = defaultServer)
    {
        return self::$api->createServer(new CreateServerRequest(["server" => $server]));
    }

    public static function createReadyServer($server = defaultServer)
    {
        try {
            if (!isset($server["uuid"])) {
                $createdServer = self::createServer()["server"];
                return self::createReadyServer($createdServer);
            } else {
                $server = self::$api->serverDetails($server["uuid"])["server"];
                if ($server["state"] === ServerState::MAINTENANCE) {
                    echo "Waiting for server..." . "\n";
                    sleep(60);
                    return self::createReadyServer($server);
                } else {
                    return $server;
                }
            }
        } catch (Exception $e) {
            echo "Can't create server: " . $e["message"] . "\n";
        }
    }

    public static function deleteServer($server, $tryings)
    {
        echo "Deleting server: " . $server["uuid"] . "\n";
        echo "Trying to delete server: " . $server["uuid"] . "\n";
        echo "Trying #" . $tryings . "\n";
        if ($server !== null) {
            if ($server["state"] !== ServerState::STOPPED) {
                echo "Stopping server..." . "\n";
                try {
                    self::$api->stopServer($server["uuid"], new StopServer(["stop_server" => [
                        "stop_type" => StopServerRequest::STOP_TYPE_HARD,
                        "timeout" => 60
                    ]]));
                } catch (ApiException $e) {
                    echo "Error stopping: " . $e->getMessage() . "\n";
                    flush();
                }
                sleep(60);
                return self::deleteServer($server, $tryings + 1);
            }
            try {
                self::$api->deleteServer($server["uuid"]);
            } catch (ApiException $e) {
                echo "Error deleting: " . $e->getMessage() . "\n";
                flush();
                echo "Code: ".$e->getCode()."\n";
                if ($e->getCode() != "404") {
                    self::deleteServer($server, $tryings + 1);
                }
            }
            finally {
                echo "Exception\n";
                flush();
            }
        }
    }

    public static function removeAllServers()
    {
        $serverList = self::$api->listServers();
        foreach ($serverList["servers"]["server"] as $key => $server) {
            self::deleteServer($server, 0);
        }
    }

    public static function stopServer($server, $tryings = 0)
    {
        echo "Trying #". $tryings."\n";
        if ($server != null) {
            echo "Server: ".$server["uuid"]."\n";
            if ($server["state"] != ServerState::STOPPED) {
                echo "Stopping server...\n";
                try {
                    $server = self::$api->stopServer($server["uuid"], new StopServer([
                        "stop_server" => [
                            "stop_type" => StopServerRequest::STOP_TYPE_HARD,
                            "timeout" => 60
                        ]
                    ]))["server"];
                    sleep(15);
                    self::stopServer($server, $tryings + 1);
                } catch (ApiException $e) {
                    echo $e->getResponseBody();
                }
            }
        }
    }
}

ServerHelper::init();
