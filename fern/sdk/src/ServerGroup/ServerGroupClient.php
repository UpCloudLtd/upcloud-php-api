<?php

namespace Upcloud\ServerGroup;

use GuzzleHttp\ClientInterface;
use Upcloud\Core\Client\RawClient;
use Upcloud\ServerGroup\Requests\ListServerGroupsRequest;
use Upcloud\Types\ServerGroups;
use Upcloud\Exceptions\UpcloudException;
use Upcloud\Exceptions\UpcloudApiException;
use Upcloud\Core\Json\JsonApiRequest;
use Upcloud\Environments;
use Upcloud\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Upcloud\Types\ServerGroupModify;
use Upcloud\Types\ServerGroup;
use Upcloud\ServerGroup\Requests\ModifyServerGroupRequest;
use Upcloud\Types\ServerGroupServers;
use Upcloud\ServerGroup\Requests\ServerGroupServerAdd;

class ServerGroupClient
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
     * Retrieves a list of server groups.
     *
     * @param ListServerGroupsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerGroups
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listServerGroups(ListServerGroupsRequest $request = new ListServerGroupsRequest(), ?array $options = null): ServerGroups
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->label !== null) {
            $query['label'] = $request->label;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerGroups::fromJson($json);
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
     * Creates a new server group.
     *
     * @param ServerGroupModify $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerGroup
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createServerGroup(ServerGroupModify $request, ?array $options = null): ServerGroup
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerGroup::fromJson($json);
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
     * Retrieves details of a specific server group.
     *
     * @param string $uuid The UUID of the server group to retrieve.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerGroup
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getServerGroup(string $uuid, ?array $options = null): ServerGroup
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group/{$uuid}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerGroup::fromJson($json);
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
     * Deletes a specific server group.
     *
     * @param string $uuid The UUID of the server group to delete.
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
    public function deleteServerGroup(string $uuid, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group/{$uuid}",
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
     * Modifies an existing server group.
     *
     * @param string $uuid The UUID of the server group to modify.
     * @param ModifyServerGroupRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerGroup
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function modifyServerGroup(string $uuid, ModifyServerGroupRequest $request, ?array $options = null): ServerGroup
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group/{$uuid}",
                    method: HttpMethod::PATCH,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerGroup::fromJson($json);
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
     * Retrieves a list of servers that are members of a specific server group.
     *
     * @param string $uuid The UUID of the server group whose members are to be listed.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ServerGroupServers
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listServerGroupMembers(string $uuid, ?array $options = null): ServerGroupServers
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group/{$uuid}/servers",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ServerGroupServers::fromJson($json);
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
     * Adds a server to a specific server group.
     *
     * @param string $uuid The UUID of the server group to which the server will be added.
     * @param ServerGroupServerAdd $request
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
    public function addServerToGroup(string $uuid, ServerGroupServerAdd $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group/{$uuid}/servers",
                    method: HttpMethod::POST,
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
     * Removes a server from a specific server group.
     *
     * @param string $uuid The UUID of the server group from which the server will be removed.
     * @param string $serverUuid The UUID of the server to remove from the group.
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
    public function removeServerFromGroup(string $uuid, string $serverUuid, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/server-group/{$uuid}/servers/{$serverUuid}",
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
}
