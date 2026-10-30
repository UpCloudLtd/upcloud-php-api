<?php

namespace Upcloud\FirewallRuleset;

use GuzzleHttp\ClientInterface;
use Upcloud\Core\Client\RawClient;
use Upcloud\FirewallRuleset\Requests\ListFirewallRulesetsRequest;
use Upcloud\Types\FirewallRulesetDetailResponse;
use Upcloud\Exceptions\UpcloudException;
use Upcloud\Exceptions\UpcloudApiException;
use Upcloud\Core\Json\JsonApiRequest;
use Upcloud\Environments;
use Upcloud\Core\Client\HttpMethod;
use Upcloud\Core\Json\JsonDecoder;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Upcloud\FirewallRuleset\Requests\CreateFirewallRuleset;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetModify;
use Upcloud\FirewallRuleset\Requests\ListFirewallRulesetRulesRequest;
use Upcloud\Types\FirewallRulesetFirewallRuleListResponse;
use Upcloud\FirewallRuleset\Requests\CreateFirewallRulesetRuleRequest;
use Upcloud\Types\FirewallRulesetRuleDetailResponse;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetFirewallMultipleRuleCreate;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetFirewallRuleModify;
use Upcloud\Types\FirewallRulesetLabelDetailResponse;
use Upcloud\FirewallRuleset\Requests\CreateFirewallRulesetLabelRequest;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetLabelModify;
use Upcloud\FirewallRuleset\Requests\ListServerFirewallRuleRequest;
use Upcloud\Types\FirewallRulesetServerFirewallDetailResponse;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetServerFirewallRuleCreate;
use Upcloud\Types\FirewallRulesetServerFirewallRuleDetail;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetServerMultipleFirewallRulesCreate;

class FirewallRulesetClient
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
     * Returns a list of firewall rulesets.
     *
     * @param ListFirewallRulesetsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return array<FirewallRulesetDetailResponse>
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listFirewallRulesets(ListFirewallRulesetsRequest $request = new ListFirewallRulesetsRequest(), ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit !== null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset !== null) {
            $query['offset'] = $request->offset;
        }
        if ($request->sort !== null) {
            $query['sort'] = $request->sort;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [FirewallRulesetDetailResponse::class]); // @phpstan-ignore-line
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
     * Creates a new firewall ruleset.
     *
     * @param CreateFirewallRuleset $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createFirewallRuleset(CreateFirewallRuleset $request, ?array $options = null): FirewallRulesetDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetDetailResponse::fromJson($json);
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
     * Returns firewall ruleset details by given {ruleset-uuid}.
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
     * @return FirewallRulesetDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getFirewallRuleset(string $rulesetUuid, ?array $options = null): FirewallRulesetDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetDetailResponse::fromJson($json);
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
     * Deletes existing firewall ruleset by given {ruleset-uuid}.
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
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function deleteFirewallRuleset(string $rulesetUuid, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}",
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
     * Modifies existing firewall ruleset by given {ruleset-uuid}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param FirewallRulesetModify $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function modifyFirewallRuleset(string $rulesetUuid, FirewallRulesetModify $request = new FirewallRulesetModify(), ?array $options = null): FirewallRulesetDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetDetailResponse::fromJson($json);
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
     * Restores existing firewall ruleset by given {ruleset-uuid} and {ruleset-version}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param int $rulesetVersion Firewall ruleset version
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function restoreFirewallRuleset(string $rulesetUuid, int $rulesetVersion, ?array $options = null): FirewallRulesetDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/restore/{$rulesetVersion}",
                    method: HttpMethod::PATCH,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetDetailResponse::fromJson($json);
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
     * Returns firewall ruleset rules.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param ListFirewallRulesetRulesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetFirewallRuleListResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listFirewallRulesetRules(string $rulesetUuid, ListFirewallRulesetRulesRequest $request = new ListFirewallRulesetRulesRequest(), ?array $options = null): FirewallRulesetFirewallRuleListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit !== null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset !== null) {
            $query['offset'] = $request->offset;
        }
        if ($request->sort !== null) {
            $query['sort'] = $request->sort;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/rule",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetFirewallRuleListResponse::fromJson($json);
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
     * Creates a new firewall ruleset rule by the given {ruleset-uuid}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param CreateFirewallRulesetRuleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetRuleDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createFirewallRulesetRule(string $rulesetUuid, CreateFirewallRulesetRuleRequest $request, ?array $options = null): FirewallRulesetRuleDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/rule",
                    method: HttpMethod::POST,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetRuleDetailResponse::fromJson($json);
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
     * Creates multiple firewall ruleset rules by the given {ruleset-uuid}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param FirewallRulesetFirewallMultipleRuleCreate $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetFirewallRuleListResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createMultipleFirewallRulesetRule(string $rulesetUuid, FirewallRulesetFirewallMultipleRuleCreate $request, ?array $options = null): FirewallRulesetFirewallRuleListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/rule",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetFirewallRuleListResponse::fromJson($json);
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
     * Returns firewall ruleset rule details.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param string $ruleId Firewall ruleset rule UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetRuleDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getFirewallRulesetRule(string $rulesetUuid, string $ruleId, ?array $options = null): FirewallRulesetRuleDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/rule/{$ruleId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetRuleDetailResponse::fromJson($json);
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
     * Deletes an existing rule by given {ruleset-uuid} and {rule-uuid}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param string $ruleId Firewall ruleset rule UUID
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
    public function deleteFirewallRulesetRule(string $rulesetUuid, string $ruleId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/rule/{$ruleId}",
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
     * Modifies existing firewall ruleset rule by given {ruleset_uuid} and {rule-uuid}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param string $ruleId Firewall ruleset rule UUID
     * @param FirewallRulesetFirewallRuleModify $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetRuleDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function modifyFirewallRulesetRule(string $rulesetUuid, string $ruleId, FirewallRulesetFirewallRuleModify $request = new FirewallRulesetFirewallRuleModify(), ?array $options = null): FirewallRulesetRuleDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/rule/{$ruleId}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetRuleDetailResponse::fromJson($json);
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
     * Returns a list of available firewall ruleset labels by given {ruleset-uuid}.
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
     * @return array<FirewallRulesetLabelDetailResponse>
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listFirewallRulesetLabels(string $rulesetUuid, ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/labels",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [FirewallRulesetLabelDetailResponse::class]); // @phpstan-ignore-line
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
     * Creates a new label by given {ruleset-uuid}. Labels are used for group filtering.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param CreateFirewallRulesetLabelRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetLabelDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createFirewallRulesetLabel(string $rulesetUuid, CreateFirewallRulesetLabelRequest $request, ?array $options = null): FirewallRulesetLabelDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/labels",
                    method: HttpMethod::POST,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetLabelDetailResponse::fromJson($json);
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
     * Returns a list of servers that are attached to the firewall ruleset by given {ruleset-uuid}.
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
     * @return array<FirewallRulesetLabelDetailResponse>
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listFirewallRulesetAttachedServers(string $rulesetUuid, ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/servers",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [FirewallRulesetLabelDetailResponse::class]); // @phpstan-ignore-line
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
     * Returns label details by given {ruleset-uuid} and {label-key}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param string $labelKey The key of the label.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetLabelDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getFirewallRulesetLabel(string $rulesetUuid, string $labelKey, ?array $options = null): FirewallRulesetLabelDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/labels/{$labelKey}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetLabelDetailResponse::fromJson($json);
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
     * Deletes existing label by given {ruleset-uuid} and {label-key}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param string $labelKey The key of the label.
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
    public function deleteFirewallRulesetLabel(string $rulesetUuid, string $labelKey, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/labels/{$labelKey}",
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
     * Modifies existing label by given {ruleset-uuid} and {label-key}.
     *
     * @param string $rulesetUuid Firewall ruleset UUID
     * @param string $labelKey The key of the label.
     * @param FirewallRulesetLabelModify $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetLabelDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function modifyFirewallRulesetLabel(string $rulesetUuid, string $labelKey, FirewallRulesetLabelModify $request = new FirewallRulesetLabelModify(), ?array $options = null): FirewallRulesetLabelDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/{$rulesetUuid}/labels/{$labelKey}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetLabelDetailResponse::fromJson($json);
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
     * Returns a list of server firewall rules.
     *
     * @param string $serverUuid Server UUID
     * @param ListServerFirewallRuleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetServerFirewallDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function listServerFirewallRule(string $serverUuid, ListServerFirewallRuleRequest $request = new ListServerFirewallRuleRequest(), ?array $options = null): FirewallRulesetServerFirewallDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit !== null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset !== null) {
            $query['offset'] = $request->offset;
        }
        if ($request->sort !== null) {
            $query['sort'] = $request->sort;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/server/{$serverUuid}/firewall-rule",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetServerFirewallDetailResponse::fromJson($json);
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
     * Creates a new server firewall rule.
     *
     * @param string $serverUuid Server UUID
     * @param FirewallRulesetServerFirewallRuleCreate $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetServerFirewallRuleDetail
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createServerFirewallRule(string $serverUuid, FirewallRulesetServerFirewallRuleCreate $request, ?array $options = null): FirewallRulesetServerFirewallRuleDetail
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/server/{$serverUuid}/firewall-rule",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetServerFirewallRuleDetail::fromJson($json);
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
     * Creates multiple server firewall rules by given {server-uuid}.
     *
     * @param string $serverUuid Server UUID
     * @param FirewallRulesetServerMultipleFirewallRulesCreate $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetServerFirewallDetailResponse
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function createMultipleServerFirewallRules(string $serverUuid, FirewallRulesetServerMultipleFirewallRulesCreate $request, ?array $options = null): FirewallRulesetServerFirewallDetailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/server/{$serverUuid}/firewall-rule",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetServerFirewallDetailResponse::fromJson($json);
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
     * Returns server firewall rule details by given {server-uuid} and {position}.
     *
     * @param string $serverUuid Server UUID
     * @param (
     *    int
     *   |string
     * ) $position Server firewall rule position
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return FirewallRulesetServerFirewallRuleDetail
     * @throws UpcloudException
     * @throws UpcloudApiException
     */
    public function getServerFirewallRule(string $serverUuid, int|string $position, ?array $options = null): FirewallRulesetServerFirewallRuleDetail
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/server/{$serverUuid}/firewall-rule/{$position}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return FirewallRulesetServerFirewallRuleDetail::fromJson($json);
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
     * Deletes existing server firewall rule by given {server-uuid} and {position}.
     *
     * @param string $serverUuid Server UUID
     * @param (
     *    int
     *   |string
     * ) $position Server firewall rule position
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
    public function deleteServerFirewallRule(string $serverUuid, int|string $position, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "1.3/firewall-ruleset/server/{$serverUuid}/firewall-rule/{$position}",
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
