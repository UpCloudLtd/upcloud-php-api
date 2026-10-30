<?php

namespace Upcloud;

use Upcloud\Account\AccountClient;
use Upcloud\Kubernetes\KubernetesClient;
use Upcloud\Currency\CurrencyClient;
use Upcloud\Device\DeviceClient;
use Upcloud\Events\EventsClient;
use Upcloud\IpAddress\IpAddressClient;
use Upcloud\NetworkPeering\NetworkPeeringClient;
use Upcloud\Network\NetworkClient;
use Upcloud\AuditLogs\AuditLogsClient;
use Upcloud\Partner\PartnerClient;
use Upcloud\Permission\PermissionClient;
use Upcloud\Plan\PlanClient;
use Upcloud\Price\PriceClient;
use Upcloud\Router\RouterClient;
use Upcloud\ServerGroup\ServerGroupClient;
use Upcloud\Server\ServerClient;
use Upcloud\ServerSize\ServerSizeClient;
use Upcloud\Storage\StorageClient;
use Upcloud\Tag\TagClient;
use Upcloud\Timezone\TimezoneClient;
use Upcloud\AccountTokens\AccountTokensClient;
use Upcloud\ObjectStorage2\ObjectStorage2Client;
use Upcloud\FileStorage\FileStorageClient;
use Upcloud\Database\DatabaseClient;
use Upcloud\Gateway\GatewayClient;
use Upcloud\LoadBalancer\LoadBalancerClient;
use Upcloud\FirewallRuleset\FirewallRulesetClient;
use Upcloud\VncKeymap\VncKeymapClient;
use Upcloud\Zone\ZoneClient;
use GuzzleHttp\ClientInterface;
use Upcloud\Core\Client\RawClient;

class UpcloudClient
{
    /**
     * @var AccountClient $account
     */
    public AccountClient $account;

    /**
     * @var KubernetesClient $kubernetes
     */
    public KubernetesClient $kubernetes;

    /**
     * @var CurrencyClient $currency
     */
    public CurrencyClient $currency;

    /**
     * @var DeviceClient $device
     */
    public DeviceClient $device;

    /**
     * @var EventsClient $events
     */
    public EventsClient $events;

    /**
     * @var IpAddressClient $ipAddress
     */
    public IpAddressClient $ipAddress;

    /**
     * @var NetworkPeeringClient $networkPeering
     */
    public NetworkPeeringClient $networkPeering;

    /**
     * @var NetworkClient $network
     */
    public NetworkClient $network;

    /**
     * @var AuditLogsClient $auditLogs
     */
    public AuditLogsClient $auditLogs;

    /**
     * @var PartnerClient $partner
     */
    public PartnerClient $partner;

    /**
     * @var PermissionClient $permission
     */
    public PermissionClient $permission;

    /**
     * @var PlanClient $plan
     */
    public PlanClient $plan;

    /**
     * @var PriceClient $price
     */
    public PriceClient $price;

    /**
     * @var RouterClient $router
     */
    public RouterClient $router;

    /**
     * @var ServerGroupClient $serverGroup
     */
    public ServerGroupClient $serverGroup;

    /**
     * @var ServerClient $server
     */
    public ServerClient $server;

    /**
     * @var ServerSizeClient $serverSize
     */
    public ServerSizeClient $serverSize;

    /**
     * @var StorageClient $storage
     */
    public StorageClient $storage;

    /**
     * @var TagClient $tag
     */
    public TagClient $tag;

    /**
     * @var TimezoneClient $timezone
     */
    public TimezoneClient $timezone;

    /**
     * @var AccountTokensClient $accountTokens
     */
    public AccountTokensClient $accountTokens;

    /**
     * @var ObjectStorage2Client $objectStorage2
     */
    public ObjectStorage2Client $objectStorage2;

    /**
     * @var FileStorageClient $fileStorage
     */
    public FileStorageClient $fileStorage;

    /**
     * @var DatabaseClient $database
     */
    public DatabaseClient $database;

    /**
     * @var GatewayClient $gateway
     */
    public GatewayClient $gateway;

    /**
     * @var LoadBalancerClient $loadBalancer
     */
    public LoadBalancerClient $loadBalancer;

    /**
     * @var FirewallRulesetClient $firewallRuleset
     */
    public FirewallRulesetClient $firewallRuleset;

    /**
     * @var VncKeymapClient $vncKeymap
     */
    public VncKeymapClient $vncKeymap;

    /**
     * @var ZoneClient $zone
     */
    public ZoneClient $zone;

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
     * @param string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $token,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Upcloud',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->account = new AccountClient($this->client, $this->options);
        $this->kubernetes = new KubernetesClient($this->client, $this->options);
        $this->currency = new CurrencyClient($this->client, $this->options);
        $this->device = new DeviceClient($this->client, $this->options);
        $this->events = new EventsClient($this->client, $this->options);
        $this->ipAddress = new IpAddressClient($this->client, $this->options);
        $this->networkPeering = new NetworkPeeringClient($this->client, $this->options);
        $this->network = new NetworkClient($this->client, $this->options);
        $this->auditLogs = new AuditLogsClient($this->client, $this->options);
        $this->partner = new PartnerClient($this->client, $this->options);
        $this->permission = new PermissionClient($this->client, $this->options);
        $this->plan = new PlanClient($this->client, $this->options);
        $this->price = new PriceClient($this->client, $this->options);
        $this->router = new RouterClient($this->client, $this->options);
        $this->serverGroup = new ServerGroupClient($this->client, $this->options);
        $this->server = new ServerClient($this->client, $this->options);
        $this->serverSize = new ServerSizeClient($this->client, $this->options);
        $this->storage = new StorageClient($this->client, $this->options);
        $this->tag = new TagClient($this->client, $this->options);
        $this->timezone = new TimezoneClient($this->client, $this->options);
        $this->accountTokens = new AccountTokensClient($this->client, $this->options);
        $this->objectStorage2 = new ObjectStorage2Client($this->client, $this->options);
        $this->fileStorage = new FileStorageClient($this->client, $this->options);
        $this->database = new DatabaseClient($this->client, $this->options);
        $this->gateway = new GatewayClient($this->client, $this->options);
        $this->loadBalancer = new LoadBalancerClient($this->client, $this->options);
        $this->firewallRuleset = new FirewallRulesetClient($this->client, $this->options);
        $this->vncKeymap = new VncKeymapClient($this->client, $this->options);
        $this->zone = new ZoneClient($this->client, $this->options);
    }
}
