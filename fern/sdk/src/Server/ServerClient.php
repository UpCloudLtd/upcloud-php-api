<?php

namespace Upcloud\Server;

use GuzzleHttp\ClientInterface;
use Upcloud\Core\Client\RawClient;
use Upcloud\Server\Requests\ListServersRequest;
use Upcloud\Types\GetServerList;
use Upcloud\Exceptions\UpcloudException;
use Upcloud\Exceptions\UpcloudApiException;
use Upcloud\Core\Json\JsonApiRequest;
use Upcloud\Environments;
use Upcloud\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Upcloud\Server\Requests\CreateServer;
use Upcloud\Types\CreateServerResponse;
use Upcloud\Types\FirewallRulesetRelatedServers;
use Upcloud\Types\ServerLabel;
use Upcloud\Core\Json\JsonDecoder;
use Upcloud\Types\Server;
use Upcloud\Server\Requests\ModifyServer;
use Upcloud\Server\Requests\DeleteServerRequest;
use Upcloud\Server\Requests\ServerAttachPrivateFirewallRuleset;
use Upcloud\Types\ServerFirewallRulesetRelationship;
use Upcloud\Server\Requests\ServerLoadCdrom;
use Upcloud\Server\Requests\ServerDetachPrivateFirewallRuleset;
use Upcloud\Types\ServerFirewallRules;
use Upcloud\Server\Requests\ServerCreateFirewallRule;
use Upcloud\Types\ServerFirewallRule;
use Upcloud\Server\Requests\ServerUpdateFirewallRules;
use Upcloud\Types\ServerFirewallRulesetRelationships;
use Upcloud\Types\ServerGpus;
use Upcloud\Types\ServerNetworkingResponse;
use Upcloud\Server\Requests\ServerAddInterface;
use Upcloud\Types\ServerInterfaceResponse;
use Upcloud\Server\Requests\ServerModifyInterface;
use Upcloud\Server\Requests\ServerAddIpAddress;
use Upcloud\Types\ServerIpAddressInterfaceResponse;
use Upcloud\Server\Requests\ServerRebuild;
use Upcloud\Server\Requests\RelocateServer;
use Upcloud\Types\ServerRemoteAccessDetails;
use Upcloud\Server\Requests\RestartServer;
use Upcloud\Server\Requests\StartServer;
use Upcloud\Types\ServerCpuStats;
use Upcloud\Types\ServerStatsPeriod;
use Upcloud\Server\Types\GetDiskStatsRequestType;
use Upcloud\Types\ServerDiskStats;
use Upcloud\Server\Types\GetDiskStatsByPeriodRequestType;
use Upcloud\Types\ServerStatsNetworkType;
use Upcloud\Types\ServerNetworkStats;
use Upcloud\Types\ServerNetworkType;
use Upcloud\Server\Requests\StopServer;
use Upcloud\Server\Requests\ServerAttachStorage;
use Upcloud\Server\Requests\ServerDetachStorage;

class ServerClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Returns the most relevant information for Cloud Servers associated with the current account.
     *
     * @param ListServersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetServerList
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listServers(ListServersRequest $request = new ListServersRequest(), ?array $options = null): GetServerList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->label !== null) {
            $query['label'] = $request->label;
        }
        if ($request->uuid !== null) {
            $query['uuid'] = $request->uuid;
        }
        if ($request->host !== null) {
            $query['host'] = $request->host;
        }
        if ($request->device !== null) {
            $query['device'] = $request->device;
        }
        if ($request->state !== null) {
            $query['state'] = $request->state;
        }
        if ($request->tag !== null) {
            $query['tag'] = $request->tag;
        }
        if ($request->search !== null) {
            $query['search'] = $request->search;
        }
        if ($request->sortBy !== null) {
            $query['sort_by'] = $request->sortBy;
        }
        if ($request->orderBy !== null) {
            $query['order_by'] = $request->orderBy;
        }
        if ($request->limit !== null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset !== null) {
            $query['offset'] = $request->offset;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetServerList::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Creates a new Cloud Server
     *
     * @param CreateServer $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CreateServerResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createServer(CreateServer $request, ?array $options = null): CreateServerResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateServerResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Return Cloud Servers visible to the authenticated account that are related to a private firewall ruleset, including each Cloud Server's private ruleset relationships.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetRelatedServers
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listFirewallRulesetRelationships(string $rulesetUuid, ?array $options = null): FirewallRulesetRelatedServers
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/firewall_ruleset_relationships/private/{$rulesetUuid}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetRelatedServers::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns the unique label key-value pairs used by Cloud Servers accessible to the current account.
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return array<ServerLabel>
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getLabels(?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/labels",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [ServerLabel::class]); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns detailed information about a Cloud Server.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getServer(string $uuid, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Modifies an existing Cloud Server configuration.
     *
     * @param string $uuid Cloud Server UUID
     * @param ModifyServer $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function modifyServer(string $uuid, ModifyServer $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Deletes a stopped Cloud Server and releases its IP addresses. Deleting backups requires deleting the associated storage devices.
     *
     * @param string $uuid Cloud Server UUID
     * @param DeleteServerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function deleteServer(string $uuid, DeleteServerRequest $request = new DeleteServerRequest(), ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->storages !== null) {
            $query['storages'] = $request->storages;
        }
        if ($request->backups !== null) {
            $query['backups'] = $request->backups;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}",
                    method: HttpMethod::DELETE,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Attach a private, stateful firewall ruleset to a Cloud Server. The latest ruleset version is selected and applied to private network interfaces.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerAttachPrivateFirewallRuleset $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerFirewallRulesetRelationship
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function attachPrivateFirewallRuleset(string $uuid, ServerAttachPrivateFirewallRuleset $request, ?array $options = null): ServerFirewallRulesetRelationship
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/attach_firewall_ruleset/private",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerFirewallRulesetRelationship::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Cancels an operation while the Cloud Server is in maintenance state.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function cancelServerOperation(string $uuid, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/cancel",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Eject the storage from the Cloud Server's attached CD-ROM device.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function ejectCdrom(string $uuid, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/cdrom/eject",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Load a storage of type normal or cdrom into the Cloud Server's attached CD-ROM device. If media is already loaded, it is ejected first.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerLoadCdrom $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function loadCdrom(string $uuid, ServerLoadCdrom $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/cdrom/load",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Detach a private firewall ruleset from a Cloud Server and reapply private-interface firewall rules.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerDetachPrivateFirewallRuleset $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerFirewallRulesetRelationship
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function detachPrivateFirewallRuleset(string $uuid, ServerDetachPrivateFirewallRuleset $request, ?array $options = null): ServerFirewallRulesetRelationship
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/detach_firewall_ruleset/private",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerFirewallRulesetRelationship::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Return the Cloud Server firewall rules in evaluation order. Changes to firewall rules can take 1-2 minutes to take effect.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerFirewallRules
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listFirewallRules(string $uuid, ?array $options = null): ServerFirewallRules
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/firewall_rule",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerFirewallRules::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Create a firewall rule. Rules are evaluated in position order; if position is omitted, the rule is appended. Changes can take 1-2 minutes to take effect.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerCreateFirewallRule $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerFirewallRule
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createFirewallRule(string $uuid, ServerCreateFirewallRule $request, ?array $options = null): ServerFirewallRule
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/firewall_rule",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerFirewallRule::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Replace the Cloud Server's complete firewall rule chain. Array order determines rule positions. Changes can take 1-2 minutes to take effect.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerUpdateFirewallRules $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function updateFirewallRules(string $uuid, ServerUpdateFirewallRules $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/firewall_rule",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Return the firewall rule at the specified one-based position in the Cloud Server rule chain.
     *
     * @param string $uuid Cloud Server UUID
     * @param int $position Firewall rule position
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerFirewallRule
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getFirewallRule(string $uuid, int $position, ?array $options = null): ServerFirewallRule
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/firewall_rule/{$position}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerFirewallRule::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Delete the firewall rule at the specified one-based position. Remaining rules are renumbered. Changes can take 1-2 minutes to take effect.
     *
     * @param string $uuid Cloud Server UUID
     * @param int $position Firewall rule position
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function deleteFirewallRule(string $uuid, int $position, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/firewall_rule/{$position}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Return all private firewall ruleset relationships configured for a Cloud Server.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerFirewallRulesetRelationships
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listPrivateFirewallRulesetRelationships(string $uuid, ?array $options = null): ServerFirewallRulesetRelationships
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/firewall_ruleset_relationships/private",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerFirewallRulesetRelationships::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns GPUs attached to a Cloud Server.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerGpus
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listServerGpUs(string $uuid, ?array $options = null): ServerGpus
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/gpus",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerGpus::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Return all network interfaces and IP addresses configured for a Cloud Server.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerNetworkingResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getServerNetworking(string $uuid, ?array $options = null): ServerNetworkingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/networking",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerNetworkingResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Add a network interface to a stopped Cloud Server. A private interface must identify the SDN network to attach. The combined limit of network interfaces and storage devices is 24.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerAddInterface $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerInterfaceResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function addServerInterface(string $uuid, ServerAddInterface $request, ?array $options = null): ServerInterfaceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/networking/interface",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerInterfaceResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Modify the IP addresses, source IP filtering, boot setting, or index of a network interface on a stopped Cloud Server. Changing the interface network or type is not supported.
     *
     * @param string $uuid Cloud Server UUID
     * @param int $index Network interface index
     * @param ServerModifyInterface $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerInterfaceResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function modifyServerInterface(string $uuid, int $index, ServerModifyInterface $request, ?array $options = null): ServerInterfaceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/networking/interface/{$index}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerInterfaceResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Delete a network interface from a stopped Cloud Server. IP addresses attached to the interface are released according to their release policies.
     *
     * @param string $uuid Cloud Server UUID
     * @param int $index Network interface index
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function deleteServerInterface(string $uuid, int $index, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/networking/interface/{$index}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Add an IPv4 or IPv6 address to a private network interface. The interface cannot contain addresses from both families and can have at most five addresses.
     *
     * @param string $uuid Cloud Server UUID
     * @param int $index Network interface index
     * @param ServerAddIpAddress $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerIpAddressInterfaceResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function addServerInterfaceIpAddress(string $uuid, int $index, ServerAddIpAddress $request, ?array $options = null): ServerIpAddressInterfaceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->force !== null) {
            $query['force'] = $request->force;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/networking/interface/{$index}/ip_address",
                    method: HttpMethod::POST,
                    query: $query,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerIpAddressInterfaceResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Delete an IP address from a private network interface. At least one IP address must remain attached to the interface.
     *
     * @param string $uuid Cloud Server UUID
     * @param int $index Network interface index
     * @param string $ip IP address to delete
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function deleteServerInterfaceIpAddress(string $uuid, int $index, string $ip, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/networking/interface/{$index}/ip_address/{$ip}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Reinstalls a stopped Cloud Server from a public template.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerRebuild $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function rebuildServer(string $uuid, ServerRebuild $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/rebuild",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Relocates a stopped Cloud Server to another zone in the same physical location (datacenter).
     *
     * @param string $uuid Cloud Server UUID
     * @param RelocateServer $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function relocateServer(string $uuid, RelocateServer $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/relocate",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns remote access settings and VNC connection details for a Cloud Server.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerRemoteAccessDetails
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getRemoteAccessDetails(string $uuid, ?array $options = null): ServerRemoteAccessDetails
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/remote_access_details",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerRemoteAccessDetails::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Stops and starts a Cloud Server in started state.
     *
     * @param string $uuid Cloud Server UUID
     * @param RestartServer $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function restartServer(string $uuid, RestartServer $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/restart",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Starts a Cloud Server in stopped state.
     *
     * @param string $uuid Cloud Server UUID
     * @param StartServer $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function startServer(string $uuid, StartServer $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/start",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns CPU usage statistics for all supported periods.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerCpuStats
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getCpuStats(string $uuid, ?array $options = null): ServerCpuStats
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stats/cpu",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerCpuStats::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns CPU usage statistics for the selected period.
     *
     * @param string $uuid Cloud Server UUID
     * @param value-of<ServerStatsPeriod> $period Statistics period.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerCpuStats
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getCpuStatsByPeriod(string $uuid, string $period, ?array $options = null): ServerCpuStats
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stats/cpu/{$period}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerCpuStats::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns aggregate disk read and write statistics for all supported periods.
     *
     * @param string $uuid Cloud Server UUID
     * @param value-of<GetDiskStatsRequestType> $type Measure disk activity as transferred bytes or I/O requests.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerDiskStats
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getDiskStats(string $uuid, string $type, ?array $options = null): ServerDiskStats
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stats/disk/{$type}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerDiskStats::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns aggregate disk read and write statistics for the selected period.
     *
     * @param string $uuid Cloud Server UUID
     * @param value-of<GetDiskStatsByPeriodRequestType> $type Measure disk activity as transferred bytes or I/O requests.
     * @param value-of<ServerStatsPeriod> $period Statistics period.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerDiskStats
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getDiskStatsByPeriod(string $uuid, string $type, string $period, ?array $options = null): ServerDiskStats
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stats/disk/{$type}/{$period}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerDiskStats::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns aggregate inbound and outbound network statistics for all interfaces and periods.
     *
     * @param string $uuid Cloud Server UUID
     * @param value-of<ServerStatsNetworkType> $type Measure network activity as transferred bytes or packets.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerNetworkStats
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getNetworkStats(string $uuid, string $type, ?array $options = null): ServerNetworkStats
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stats/network/{$type}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerNetworkStats::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns inbound and outbound network statistics for the selected network type and all periods.
     *
     * @param string $uuid Cloud Server UUID
     * @param value-of<ServerStatsNetworkType> $type Measure network activity as transferred bytes or packets.
     * @param value-of<ServerNetworkType> $network Network access type to aggregate.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerNetworkStats
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getNetworkStatsByNetwork(string $uuid, string $type, string $network, ?array $options = null): ServerNetworkStats
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stats/network/{$type}/{$network}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerNetworkStats::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns inbound and outbound network statistics for the selected network type and period.
     *
     * @param string $uuid Cloud Server UUID
     * @param value-of<ServerStatsNetworkType> $type Measure network activity as transferred bytes or packets.
     * @param value-of<ServerNetworkType> $network Network access type to aggregate.
     * @param value-of<ServerStatsPeriod> $period Statistics period.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerNetworkStats
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getNetworkStatsByNetworkAndPeriod(string $uuid, string $type, string $network, string $period, ?array $options = null): ServerNetworkStats
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stats/network/{$type}/{$network}/{$period}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerNetworkStats::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Stops a Cloud Server in started state.
     *
     * @param string $uuid Cloud Server UUID
     * @param StopServer $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function stopServer(string $uuid, StopServer $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/stop",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Attach a storage resource as a disk or CD-ROM device to a Cloud Server. SCSI and virtio disks can be attached while the Cloud Server is started; IDE and CD-ROM devices require a stopped Cloud Server. An empty CD-ROM device can be attached without specifying a storage resource.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerAttachStorage $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function attachStorageDevice(string $uuid, ServerAttachStorage $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/storage/attach",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Detach a storage device identified by its device address or storage resource UUID. IDE and CD-ROM devices cannot be detached while the Cloud Server is started.
     *
     * @param string $uuid Cloud Server UUID
     * @param ServerDetachStorage $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Server
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function detachStorageDevice(string $uuid, ServerDetachStorage $request, ?array $options = null): Server
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/storage/detach",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Server::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns VNC connection details and remote access settings for a Cloud Server.
     *
     * @param string $uuid Cloud Server UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerRemoteAccessDetails
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getVncDetails(string $uuid, ?array $options = null): ServerRemoteAccessDetails
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server/{$uuid}/vnc_details",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerRemoteAccessDetails::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new UpcloudException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new UpcloudException(message: $e->getMessage(), previous: $e);
            }
            throw new UpcloudApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new UpcloudException(message: $e->getMessage(), previous: $e);
        }
        throw new UpcloudApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
