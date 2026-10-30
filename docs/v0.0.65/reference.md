---
layout: sdk
title: "API reference · v0.0.65"
version: "v0.0.65"
services:
  - account
  - kubernetes
  - currency
  - device
  - events
  - ip_address
  - network-peering
  - network
  - partner
  - permission
  - plan
  - price
  - server-group
  - server
  - server_size
  - storage
  - tag
  - timezone
  - account-tokens
  - object-storage-2
  - file-storage
  - database
  - load-balancer
  - firewall-ruleset
  - vnc_keymap
  - zone
---
# API reference
## account
{:#accountAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;account-&gt;details() -> Account</code></summary>

#### Description

Returns account details for the authenticated user

#### Usage

```php
$client->account->details();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;account-&gt;createMslmaSigningLink() -> AccountCreateMsLmaSigningLinkResponse</code></summary>

#### Description

Create a new Microsoft LMA signing link

#### Usage

```php
$client->account->createMslmaSigningLink();
```

</details>

## kubernetes
{:#kubernetesAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;listKubernetesClusters() -> array</code></summary>

#### Description

Returns a list of Kubernetes clusters.

#### Usage

```php
$client->kubernetes->listKubernetesClusters();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;createKubernetesCluster($request) -> KubernetesCluster</code></summary>

#### Description

Creates a new Kubernetes cluster.

#### Usage

```php
$client->kubernetes->createKubernetesCluster(
    new KubernetesCluster([
        'controlPlaneIpFilter' => [
            '1.2.3.0/24',
            '1.1.1.1',
        ],
        'name' => 'example-cluster',
        'network' => '33333333-3333-3333-333333333333',
        'networkCidr' => '172.16.0.0/24',
        'nodeGroups' => [
            new KubernetesNodeGroup([
                'count' => 4,
                'kubeletArgs' => [
                    new KubernetesKubeletArg([
                        'key' => 'log-flush-frequency',
                        'value' => '5s',
                    ]),
                ],
                'labels' => [
                    new KubernetesLabel([
                        'key' => 'managedBy',
                        'value' => 'exampleDevelopmentTeam',
                    ]),
                    new KubernetesLabel([
                        'key' => 'environment',
                        'value' => 'development',
                    ]),
                ],
                'name' => 'small',
                'plan' => 'K8S-2xCPU-4GB',
                'sshKeys' => [
                    'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCDxPPyWRTVHYOOaCE/gqDzcdJFZdo1mD8k+BBvZ4an/khT+rzJGT/K1kvxs1vS1AMzaVbuWH1bLVk8XVDVJ3J7Rf76E50O1mj3+SWW81bjneVlAxw7DRoxZInFio7TMFTt6eSRkOGQ2GVpvkePgunVZsk+XE13fSnthqS1TiiivnmaNXsaVIOSZICzTWVKqRz1XVR4fdyKJxEpFhHCIu0ui9SeB887IdcS3KshvNqJo3Jm0LmBLL1vzcbucc7T02wiqvdDSPO7TO8Wlc7sJXwmMImEDBkPYQTHmeOqsKbW0OiGuJniwg93pBt0BqNhn3gxtYLrmjha+PqO9gVR6XkV',
                ],
                'storage' => '01000000-0000-4000-8000-000160010100',
                'taints' => [
                    new KubernetesTaint([
                        'effect' => KubernetesEffect::NoSchedule->value,
                        'key' => 'environment',
                        'value' => 'development',
                    ]),
                ],
            ]),
            new KubernetesNodeGroup([
                'count' => 8,
                'kubeletArgs' => [
                    new KubernetesKubeletArg([
                        'key' => 'log-flush-frequency',
                        'value' => '15s',
                    ]),
                ],
                'labels' => [
                    new KubernetesLabel([
                        'key' => 'managedBy',
                        'value' => 'exampleStagingTeam',
                    ]),
                    new KubernetesLabel([
                        'key' => 'environment',
                        'value' => 'staging',
                    ]),
                ],
                'name' => 'medium',
                'plan' => 'K8S-4xCPU-8GB',
                'sshKeys' => [
                    'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCDxPPyWRTVHYOOaCE/gqDzcdJFZdo1mD8k+BBvZ4an/khT+rzJGT/K1kvxs1vS1AMzaVbuWH1bLVk8XVDVJ3J7Rf76E50O1mj3+SWW81bjneVlAxw7DRoxZInFio7TMFTt6eSRkOGQ2GVpvkePgunVZsk+XE13fSnthqS1TiiivnmaNXsaVIOSZICzTWVKqRz1XVR4fdyKJxEpFhHCIu0ui9SeB887IdcS3KshvNqJo3Jm0LmBLL1vzcbucc7T02wiqvdDSPO7TO8Wlc7sJXwmMImEDBkPYQTHmeOqsKbW0OiGuJniwg93pBt0BqNhn3gxtYLrmjha+PqO9gVR6XkV',
                ],
                'storage' => '01000000-0000-4000-8000-000160010100',
                'taints' => [
                    new KubernetesTaint([
                        'effect' => KubernetesEffect::NoSchedule->value,
                        'key' => 'environment',
                        'value' => 'staging',
                    ]),
                ],
            ]),
        ],
        'zone' => 'de-fra1',
        'version' => 'version',
        'labels' => [
            [
                'key' => "env",
                'value' => "prod",
            ],
            [
                'key' => "app",
                'value' => "cats-dating-app",
            ],
        ],
    ]),
);
```

#### Parameters

**$request:** `KubernetesCluster`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;getKubernetesCluster($uuid) -> KubernetesCluster</code></summary>

#### Description

Returns Kubernetes cluster details by given `uuid`.

#### Usage

```php
$client->kubernetes->getKubernetesCluster(
    'uuid',
);
```

#### Parameters

**$uuid:** `string` — UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;deleteKubernetesCluster($uuid) -> KubernetesAccepted</code></summary>

#### Description

Deletes an existing Kubernetes cluster by given `uuid`.

#### Usage

```php
$client->kubernetes->deleteKubernetesCluster(
    'uuid',
);
```

#### Parameters

**$uuid:** `string` — UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;modifyKubernetesCluster($uuid, $request) -> KubernetesCluster</code></summary>

#### Description

Modifies an existing Kubernetes cluster by given `{uuid}`.

#### Usage

```php
$client->kubernetes->modifyKubernetesCluster(
    'uuid',
    new KubernetesClusterPatch([
        'controlPlaneIpFilter' => [
            '1.2.3.0/24',
            '1.1.1.1',
        ],
        'labels' => [
            [
                'key' => "env",
                'value' => "prod",
            ],
            [
                'key' => "app",
                'value' => "cats-dating-app",
            ],
        ],
    ]),
);
```

#### Parameters

**$uuid:** `string` — UUID

**$controlPlaneIpFilter:** `?array`

**$labels:** `mixed`

**$plan:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;getKubernetesClusterKubeconfig($uuid) -> KubernetesClusterKubeconfig</code></summary>

#### Description

Returns kubeconfig for Kubernetes cluster by given `{uuid}`.

#### Usage

```php
$client->kubernetes->getKubernetesClusterKubeconfig(
    'uuid',
);
```

#### Parameters

**$uuid:** `string` — UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;getKubernetesClusterAvailableUpgrades($uuid) -> KubernetesClusterAvailableUpgrades</code></summary>

#### Description

Returns a list of available versions that can be used to upgrade the cluster.

#### Usage

```php
$client->kubernetes->getKubernetesClusterAvailableUpgrades(
    'uuid',
);
```

#### Parameters

**$uuid:** `string` — UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;upgradeKubernetesCluster($uuid, $request) -> KubernetesClusterAvailableUpgradesPost</code></summary>

#### Description

Upgrades an existing Kubernetes cluster to specific version.

#### Usage

```php
$client->kubernetes->upgradeKubernetesCluster(
    'uuid',
    new UpgradeKubernetesClusterRequest([
        'body' => new KubernetesClusterAvailableUpgradesPost([
            'version' => '1.31',
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — UUID

**$request:** `KubernetesClusterAvailableUpgradesPost`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;listKubernetesClusterNodeGroups($uuid) -> array</code></summary>

#### Description

Returns a list of available node groups of an existing Kubernetes cluster. Cluster is identified by given `{uuid}`.

A node group is a uniform set of worker nodes attached to a cluster.

#### Usage

```php
$client->kubernetes->listKubernetesClusterNodeGroups(
    'uuid',
);
```

#### Parameters

**$uuid:** `string` — UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;createKubernetesClusterNodeGroup($uuid, $request) -> KubernetesNodeGroup</code></summary>

#### Description

Creates a new node group to an existing Kubernetes cluster. Cluster is identified by given `{uuid}`.

#### Usage

```php
$client->kubernetes->createKubernetesClusterNodeGroup(
    'uuid',
    new CreateKubernetesClusterNodeGroupRequest([
        'body' => new KubernetesNodeGroup([
            'count' => 4,
            'kubeletArgs' => [
                new KubernetesKubeletArg([
                    'key' => 'log-flush-frequency',
                    'value' => '5s',
                ]),
            ],
            'labels' => [
                new KubernetesLabel([
                    'key' => 'managedBy',
                    'value' => 'exampleDevelopmentTeam',
                ]),
                new KubernetesLabel([
                    'key' => 'environment',
                    'value' => 'development',
                ]),
            ],
            'name' => 'small',
            'plan' => 'K8S-2xCPU-4GB',
            'sshKeys' => [
                'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCDxPPyWRTVHYOOaCE/gqDzcdJFZdo1mD8k+BBvZ4an/khT+rzJGT/K1kvxs1vS1AMzaVbuWH1bLVk8XVDVJ3J7Rf76E50O1mj3+SWW81bjneVlAxw7DRoxZInFio7TMFTt6eSRkOGQ2GVpvkePgunVZsk+XE13fSnthqS1TiiivnmaNXsaVIOSZICzTWVKqRz1XVR4fdyKJxEpFhHCIu0ui9SeB887IdcS3KshvNqJo3Jm0LmBLL1vzcbucc7T02wiqvdDSPO7TO8Wlc7sJXwmMImEDBkPYQTHmeOqsKbW0OiGuJniwg93pBt0BqNhn3gxtYLrmjha+PqO9gVR6XkV',
            ],
            'storage' => '01000000-0000-4000-8000-000160010100',
            'taints' => [
                new KubernetesTaint([
                    'effect' => KubernetesEffect::NoSchedule->value,
                    'key' => 'environment',
                    'value' => 'development',
                ]),
            ],
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — UUID

**$request:** `KubernetesNodeGroup`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;getKubernetesClusterNodeGroup($uuid, $name) -> KubernetesNodeGroupDetails</code></summary>

#### Description

Returns node group details by given `{node_group_name}`. Cluster is identified by given `{uuid}`.

#### Usage

```php
$client->kubernetes->getKubernetesClusterNodeGroup(
    'uuid',
    'name',
);
```

#### Parameters

**$uuid:** `string` — UUID

**$name:** `string` — Name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;deleteKubernetesClusterNodeGroup($uuid, $name) -> KubernetesAccepted</code></summary>

#### Description

Deletes an existing node group by given Kubernetes cluster `{uuid}` and `{node_group_name}`.

#### Usage

```php
$client->kubernetes->deleteKubernetesClusterNodeGroup(
    'uuid',
    'name',
);
```

#### Parameters

**$uuid:** `string` — UUID

**$name:** `string` — Name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;modifyKubernetesClusterNodeGroup($uuid, $name, $request) -> KubernetesNodeGroup</code></summary>

#### Description

Modifies an existing node group of a cluster. Cluster is identified by given `{uuid}` and node group by `{node_group_name}`.

#### Usage

```php
$client->kubernetes->modifyKubernetesClusterNodeGroup(
    'uuid',
    'name',
    new KubernetesNodeGroupPatch([
        'count' => 16,
    ]),
);
```

#### Parameters

**$uuid:** `string` — UUID

**$name:** `string` — Name

**$count:** `int`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;deleteKubernetesClusterNodeGroupNode($uuid, $name, $nodeName) -> KubernetesAccepted</code></summary>

#### Description

Deletes a node group node from a cluster (experimental). Cluster is identified by given `{uuid}`, node group by `{name}`, and node by `{node-name}`.

#### Usage

```php
$client->kubernetes->deleteKubernetesClusterNodeGroupNode(
    'uuid',
    'name',
    'node-name',
);
```

#### Parameters

**$uuid:** `string` — UUID

**$name:** `string` — Name

**$nodeName:** `string` — Node name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;listKubernetesPlans() -> array</code></summary>

#### Description

Returns a list of available Kubernetes cluster plans.

#### Usage

```php
$client->kubernetes->listKubernetesPlans();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;kubernetes-&gt;listKubernetesVersions() -> array</code></summary>

#### Description

Returns a list of available Kubernetes cluster versions.

#### Usage

```php
$client->kubernetes->listKubernetesVersions();
```

</details>

## currency
{:#currencyAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;currency-&gt;listCurrencies() -> CurrencyCurrencies</code></summary>

#### Description

Retrieves a list of supported currencies and their exchange rates relative to the account credit currency.

#### Usage

```php
$client->currency->listCurrencies();
```

</details>

## device
{:#deviceAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;device-&gt;getAvailablePassthroughDevices($request) -> array</code></summary>

#### Description

Returns a list of available passthrough devices.

#### Usage

```php
$client->device->getAvailablePassthroughDevices(
    new GetAvailablePassthroughDevicesRequest([]),
);
```

#### Parameters

**$zone:** `?string` — Filter results to a specific zone.

**$type:** `?string` — Filter results to a specific device type. The only valid type is "gpu" for now.

</details>

## events
{:#eventsAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;events-&gt;listEvents($serverUuid, $offset, $count) -> Events</code></summary>

#### Description

Retrieves a list of events.

#### Usage

```php
$client->events->listEvents(
    'server_uuid',
    1,
    1,
);
```

#### Parameters

**$serverUuid:** `string` — Filter results to a specific server.

**$offset:** `int` — The number of items to skip before starting to collect the result set. Default is 0.

**$count:** `int` — The numbers of items to return.

</details>

## ip_address
{:#ip_addressAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;ipAddress-&gt;listIpAddresses() -> IpAddressesResponse</code></summary>

#### Description

Retrieves a list of IP addresses.

#### Usage

```php
$client->ipAddress->listIpAddresses();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;ipAddress-&gt;getIpAddressDetails($address) -> IpAddressResponse</code></summary>

#### Description

Retrieves details of a specific IP address.

#### Usage

```php
$client->ipAddress->getIpAddressDetails(
    'address',
);
```

#### Parameters

**$address:** `string` — The IP address to retrieve details for.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;ipAddress-&gt;modifyIpAddress($address, $request) -> IpAddressRequest</code></summary>

#### Description

Modifies attributes of a specific IP address.

#### Usage

```php
$client->ipAddress->modifyIpAddress(
    'address',
    new ModifyIpAddressRequestV10([
        'ipAddress' => new ModifyIpAddressRequestV10IpAddress([
            'ptrRecord' => 'ptr_record',
        ]),
    ]),
);
```

#### Parameters

**$address:** `string`

**$ipAddress:** `ModifyIpAddressRequestV10IpAddress`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;ipAddress-&gt;deleteIpAddress($address)</code></summary>

#### Description

Deletes a specific IP address.

#### Usage

```php
$client->ipAddress->deleteIpAddress(
    'address',
);
```

#### Parameters

**$address:** `string`

</details>

## network-peering
{:#network-peeringAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;networkPeering-&gt;listNetworkPeerings($request) -> NetworkPeerings</code></summary>

#### Description

Retrieves a list of network peerings.

#### Usage

```php
$client->networkPeering->listNetworkPeerings(
    new ListNetworkPeeringsRequest([
        'uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
        'networkUuidLocal' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
        'networkUuidPeer' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    ]),
);
```

#### Parameters

**$uuid:** `?string` — Filter by network peering UUID.

**$networkUuidLocal:** `?string` — Filter by local network uuid.

**$networkUuidPeer:** `?string` — Filter by peer network uuid.

**$label:** `?string` — Label filter in the form key=value. Can be specified multiple times to filter by multiple labels.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;networkPeering-&gt;createNetworkPeering($request) -> NetworkPeering</code></summary>

#### Description

Creates a new network peering between two networks.

#### Usage

```php
$client->networkPeering->createNetworkPeering(
    new NetworkPeeringCreate([
        'configuredStatus' => NetworkPeeringCreateConfiguredStatus::Active->value,
        'name' => 'Peering A->B',
        'network' => new NetworkPeeringCreateNetwork([
            'uuid' => '03126dc1-a69f-4bc2-8b24-e31c22d64712',
        ]),
        'peerNetwork' => new NetworkPeeringCreatePeerNetwork([
            'uuid' => '03585987-bf7d-4544-8e9b-5a1b4d74a333',
        ]),
    ]),
);
```

#### Parameters

**$configuredStatus:** `?string`

**$name:** `string`

**$network:** `NetworkPeeringCreateNetwork` — Describes the local side of the peering

**$peerNetwork:** `NetworkPeeringCreatePeerNetwork` — Describes the peer side of the peering

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;networkPeering-&gt;getNetworkPeering($peeringUuid) -> NetworkPeering</code></summary>

#### Description

Retrieves information about a specific network peering.

#### Usage

```php
$client->networkPeering->getNetworkPeering(
    'peering_uuid',
);
```

#### Parameters

**$peeringUuid:** `string` — The network peering identifier.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;networkPeering-&gt;deleteNetworkPeering($peeringUuid)</code></summary>

#### Description

Deletes a specific network peering.

#### Usage

```php
$client->networkPeering->deleteNetworkPeering(
    'peering_uuid',
);
```

#### Parameters

**$peeringUuid:** `string` — The network peering identifier.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;networkPeering-&gt;modifyNetworkPeering($peeringUuid, $request) -> NetworkPeering</code></summary>

#### Description

Modifies attributes of an existing network peering.

#### Usage

```php
$client->networkPeering->modifyNetworkPeering(
    'peering_uuid',
    new NetworkPeeringModify([
        'configuredStatus' => NetworkPeeringModifyConfiguredStatus::Disabled->value,
        'name' => 'Peering A->B modified',
    ]),
);
```

#### Parameters

**$peeringUuid:** `string` — The network peering identifier.

**$configuredStatus:** `?string`

**$name:** `?string`

</details>

## network
{:#networkAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;network-&gt;listNetworks($request) -> Networks</code></summary>

#### Description

Retrieves a list of networks.

#### Usage

```php
$client->network->listNetworks(
    new ListNetworksRequest([]),
);
```

#### Parameters

**$label:** `?NetworkLabel` — Filter networks by labels.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;network-&gt;listNetworkInterfaces() -> NetworkInterfaces</code></summary>

#### Description

Retrieves a list of network interfaces.

#### Usage

```php
$client->network->listNetworkInterfaces();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;network-&gt;createNetworkInterface($request) -> NetworkInterface</code></summary>

#### Description

Creates a new network interface.

#### Usage

```php
$client->network->createNetworkInterface(
    new NetworkCreateInterfaceRequest([]),
);
```

#### Parameters

**$mainAccountId:** `?int`

**$interface_:** `?NetworkCreateInterfaceRequestInterface`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;network-&gt;getNetworkInterfaceDetails($uuid) -> Network</code></summary>

#### Description

Retrieves details of a specific network interface.

#### Usage

```php
$client->network->getNetworkInterfaceDetails(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;network-&gt;deleteNetworkInterface($uuid)</code></summary>

#### Description

Deletes a specific network interface.

#### Usage

```php
$client->network->deleteNetworkInterface(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string`

</details>

## partner
{:#partnerAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;partner-&gt;listPartnerAccounts() -> array</code></summary>

#### Description

Returns list of accounts associated with the partner.

#### Usage

```php
$client->partner->listPartnerAccounts();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;partner-&gt;createPartnerAccount($request) -> PartnerAccount</code></summary>

#### Description

Creates new UpCloud account that will be linked to partner's existing invoicing.

#### Usage

```php
$client->partner->createPartnerAccount(
    new PartnerCreateAccount([
        'username' => 'newuser',
        'password' => 'superSecret123',
    ]),
);
```

#### Parameters

**$username:** `string`

**$password:** `string`

**$contactDetails:** `?PartnerCreateAccountContactDetails`

</details>

## permission
{:#permissionAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;permission-&gt;listPermissions() -> Permissions</code></summary>

#### Description

Retrieves a list of permissions for sub-accounts to access resources owned by the main account.

#### Usage

```php
$client->permission->listPermissions();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;permission-&gt;replacePermissions($request) -> Permissions</code></summary>

#### Description

Replaces the entire set of permissions for sub-accounts to access resources owned by the main account.

#### Usage

```php
$client->permission->replacePermissions(
    new Permission([]),
);
```

#### Parameters

**$request:** `Permission`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;permission-&gt;grantPermission($request) -> Permission</code></summary>

#### Description

Grants a permission for a sub-account to access a resource owned by the main account.

#### Usage

```php
$client->permission->grantPermission(
    new GrantPermissionRequest([
        'body' => new Permission([]),
    ]),
);
```

#### Parameters

**$skipTargetCheck:** `?bool` — If true, skips the check whether the target resource exists. Default is false.

**$request:** `Permission`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;permission-&gt;revokePermission($request)</code></summary>

#### Description

Revokes a permission for a sub-account to access a resource owned by the main account.

#### Usage

```php
$client->permission->revokePermission(
    new Permission([]),
);
```

#### Parameters

**$request:** `Permission`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;permission-&gt;revokeAllPermissionsByTarget($targetType, $targetIdentifier, $request)</code></summary>

#### Description

Revokes all permissions for sub-accounts to access a specific resource owned by the main account.

#### Usage

```php
$client->permission->revokeAllPermissionsByTarget(
    'target_type',
    'target_identifier',
    new RevokeAllPermissionsByTargetRequest([]),
);
```

#### Parameters

**$targetType:** `string` — The type of the target resource (e.g., "server", "storage").

**$targetIdentifier:** `string` — The identifier of the target resource.

**$mainAccountId:** `?int` — If specified, revokes permissions for resources owned by the specified main account ID. Default is the current main account.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;permission-&gt;revokeAllPermissionsByUser($user)</code></summary>

#### Description

Revokes all permissions for a specific sub-account to access any resources owned by the main account.

#### Usage

```php
$client->permission->revokeAllPermissionsByUser(
    'user',
);
```

#### Parameters

**$user:** `string` — The username of the sub-account.

</details>

## plan
{:#planAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;plan-&gt;listPlans() -> Plan</code></summary>

#### Description

Returns a list of available plans.

#### Usage

```php
$client->plan->listPlans();
```

</details>

## price
{:#priceAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;price-&gt;getPrice() -> Prices</code></summary>

#### Description

Returns a price list.

#### Usage

```php
$client->price->getPrice();
```

</details>

## server-group
{:#server-groupAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;listServerGroups($request) -> ServerGroups</code></summary>

#### Description

Retrieves a list of server groups.

#### Usage

```php
$client->serverGroup->listServerGroups(
    new ListServerGroupsRequest([]),
);
```

#### Parameters

**$label:** `?ServerGroupLabel` — A label filter to apply. Format: key:value. Multiple labels can be specified by repeating the parameter.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;createServerGroup($request) -> ServerGroup</code></summary>

#### Description

Creates a new server group.

#### Usage

```php
$client->serverGroup->createServerGroup(
    new ServerGroupModify([
        'serverGroup' => new ServerGroupModifyServerGroup([]),
    ]),
);
```

#### Parameters

**$request:** `ServerGroupModify`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;getServerGroup($uuid) -> ServerGroup</code></summary>

#### Description

Retrieves details of a specific server group.

#### Usage

```php
$client->serverGroup->getServerGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — The UUID of the server group to retrieve.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;deleteServerGroup($uuid)</code></summary>

#### Description

Deletes a specific server group.

#### Usage

```php
$client->serverGroup->deleteServerGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — The UUID of the server group to delete.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;modifyServerGroup($uuid, $request) -> ServerGroup</code></summary>

#### Description

Modifies an existing server group.

#### Usage

```php
$client->serverGroup->modifyServerGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ModifyServerGroupRequest([
        'body' => new ServerGroupModify([
            'serverGroup' => new ServerGroupModifyServerGroup([]),
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — The UUID of the server group to modify.

**$request:** `ServerGroupModify`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;listServerGroupMembers($uuid) -> ServerGroupServers</code></summary>

#### Description

Retrieves a list of servers that are members of a specific server group.

#### Usage

```php
$client->serverGroup->listServerGroupMembers(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — The UUID of the server group whose members are to be listed.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;addServerToGroup($uuid, $request)</code></summary>

#### Description

Adds a server to a specific server group.

#### Usage

```php
$client->serverGroup->addServerToGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerGroupServerAdd([
        'server' => new ServerGroupServerAddServer([
            'uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — The UUID of the server group to which the server will be added.

**$server:** `ServerGroupServerAddServer`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverGroup-&gt;removeServerFromGroup($uuid, $serverUuid)</code></summary>

#### Description

Removes a server from a specific server group.

#### Usage

```php
$client->serverGroup->removeServerFromGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — The UUID of the server group from which the server will be removed.

**$serverUuid:** `string` — The UUID of the server to remove from the group.

</details>

## server
{:#serverAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;server-&gt;createServer($request) -> CreateServerResponse</code></summary>

#### Description

Creates a new server

#### Usage

```php
$client->server->createServer(
    new CreateServer([
        'server' => new CreateServerServer([
            'hostname' => 'my-server.example.com',
            'storageDevices' => new ServerStorageDevices([
                'storageDevice' => [
                    new ServerStorageDevicesStorageDeviceItem([
                        'action' => 'clone',
                        'storage' => '01234567-89ab-cdef-0123-456789abcdef',
                        'title' => 'Operating System',
                    ]),
                ],
            ]),
            'title' => 'My Server',
            'zone' => 'fi-hel1',
        ]),
    ]),
);
```

#### Parameters

**$server:** `CreateServerServer`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;server-&gt;modifyServer($request) -> Server</code></summary>

#### Description

Modifies an existing server

#### Usage

```php
$client->server->modifyServer(
    new Server([
        'server' => new ServerDetails([
            'created' => 1705320000,
            'bootOrder' => 'cdrom,disk',
            'coreNumber' => 2,
            'hostname' => 'example1',
            'license' => 0,
            'memoryAmount' => 2048,
            'osType' => ServerOsType::Ubuntu->value,
            'plan' => '2xCPU-2GB',
            'planIpv4Bytes' => 0,
            'planIpv6Bytes' => 0,
            'state' => ServerState::Started->value,
            'timezone' => 'UTC',
            'title' => 'First example server',
            'uuid' => '007bf7bd-e3cf-4a10-bf01-4251dc7f3b65',
            'zone' => 'fi-hel1',
        ]),
    ]),
);
```

#### Parameters

**$request:** `Server`

</details>

## server_size
{:#server_sizeAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverSize-&gt;listServerSizes() -> ServerSizes</code></summary>

#### Description

Retrieves a list of available server sizes (combinations of memory and CPU cores).

#### Usage

```php
$client->serverSize->listServerSizes();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;serverSize-&gt;getServerSizeLimits() -> ServerSizeLimits</code></summary>

#### Description

Retrieves the minimum and maximum limits for server sizes, including any zone-specific limits for private zones.

#### Usage

```php
$client->serverSize->getServerSizeLimits();
```

</details>

## storage
{:#storageAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;getStorageList($request) -> Storages</code></summary>

#### Description

Returns a list of storage devices. Supports filtering by type, access level, and labels, as well as sorting and pagination

#### Usage

```php
$client->storage->getStorageList(
    new GetStorageListRequest([
        'label' => 'environment=production',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$type:** `?string` — Filter by storage type

**$access:** `?string` — Filter by access level (public or private)

**$label:** `?string` — Filter by labels. Can be specified multiple times.

**$sortBy:** `?string` — Sort results by the specified field

**$orderBy:** `?string` — Sort order (ascending or descending). Only valid when sort_by is also specified.

**$limit:** `?int` — Maximum number of storages to return per page

**$offset:** `?int` — Number of storages to skip before starting to return results

**$allowHidden:** `?string` — Include hidden storages in the response

**$favorite:** `?string` — Filter storages by favorite status

**$metadata:** `?string` — Whether to include metadata in the response

**$servers:** `?string` — Whether to include server information in the response

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;createStorage($request) -> CreateStorageResponse</code></summary>

#### Description

Create new storage

#### Usage

```php
$client->storage->createStorage(
    new CreateStorageRequest([
        'storage' => new CreateStorageRequestStorage([]),
    ]),
);
```

#### Parameters

**$storage:** `CreateStorageRequestStorage`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;createCdromStorage($request) -> CreateStorageResponse</code></summary>

#### Description

Create new CD-ROM storage

#### Usage

```php
$client->storage->createCdromStorage(
    new StorageCreateCdromRequest([
        'createCdrom' => new StorageCreateCdromRequestCreateCdrom([]),
    ]),
);
```

#### Parameters

**$createCdrom:** `StorageCreateCdromRequestCreateCdrom`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;getFavoriteStorageList() -> Storages</code></summary>

#### Description

List favorite storages

#### Usage

```php
$client->storage->getFavoriteStorageList();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;getStorageInfo($uuid) -> Storage</code></summary>

#### Description

Get storage details

#### Usage

```php
$client->storage->getStorageInfo(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;modifyStorage($uuid, $request) -> mixed</code></summary>

#### Description

Modify storage

#### Usage

```php
$client->storage->modifyStorage(
    'uuid',
    new ModifyStorageRequest([
        'body' => [
            'key' => "value",
        ],
    ]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$request:** `mixed`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;deleteStorage($uuid, $request)</code></summary>

#### Description

Delete storage

#### Usage

```php
$client->storage->deleteStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new DeleteStorageRequest([]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$backups:** `?string` — Policy for handling backups when deleting a storage. Allowed values: keep, delete, keep_latest

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;addStorageComponent($uuid, $request)</code></summary>

#### Description

Add storage component

#### Usage

```php
$client->storage->addStorageComponent(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new AddStorageComponentRequest([
        'storage' => new AddStorageComponentRequestStorage([]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$storage:** `AddStorageComponentRequestStorage`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;attachStorageToServer($uuid, $request)</code></summary>

#### Description

Attach storage to server

#### Usage

```php
$client->storage->attachStorageToServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new AttachStorage([
        'storageDevice' => new AttachStorageStorageDevice([]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$storageDevice:** `AttachStorageStorageDevice`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;createOnDemandBackup($uuid, $request) -> CreateStorageResponse</code></summary>

#### Description

Create on-demand backup

#### Usage

```php
$client->storage->createOnDemandBackup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new CreateStorageBackupRequest([
        'interval' => 'interval',
        'retention' => 'retention',
        'time' => 'time',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$interval:** `string`

**$retention:** `string`

**$time:** `string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;cancelStorageOperation($uuid)</code></summary>

#### Description

Cancel storage operation

#### Usage

```php
$client->storage->cancelStorageOperation(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;cloneStorage($uuid, $request) -> CreateStorageResponse</code></summary>

#### Description

Clone storage

#### Usage

```php
$client->storage->cloneStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new CloneStorageRequest([
        'storage' => new CloneStorageRequestStorage([
            'tier' => 'tier',
            'title' => 'title',
            'zone' => 'fi-hel1',
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$storage:** `CloneStorageRequestStorage`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;detachStorageFromServer($uuid)</code></summary>

#### Description

Detach storage from server

#### Usage

```php
$client->storage->detachStorageFromServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;addStorageToFavorites($uuid)</code></summary>

#### Description

Add storage to favorites

#### Usage

```php
$client->storage->addStorageToFavorites(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;removeStorageFromFavorites($uuid)</code></summary>

#### Description

Remove storage from favorites

#### Usage

```php
$client->storage->removeStorageFromFavorites(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;resizeStorage($uuid) -> mixed</code></summary>

#### Description

Resize storage

#### Usage

```php
$client->storage->resizeStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;restoreStorageFromBackup($uuid)</code></summary>

#### Description

Restore storage from backup

#### Usage

```php
$client->storage->restoreStorageFromBackup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;createTemplateFromStorage($uuid, $request) -> CreateStorageResponse</code></summary>

#### Description

Create template from storage

#### Usage

```php
$client->storage->createTemplateFromStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new CreateStorageTemplateRequest([
        'storage' => new CreateStorageTemplateRequestStorage([
            'title' => 'My Template',
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$storage:** `CreateStorageTemplateRequestStorage`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;storage-&gt;updatePublicTemplateFromSource($uuid, $request)</code></summary>

#### Description

Update public template from source

#### Usage

```php
$client->storage->updatePublicTemplateFromSource(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new StorageUpdateTemplateRequest([
        'updateTemplate' => new StorageUpdateTemplateRequestUpdateTemplate([]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Storage UUID

**$updateTemplate:** `StorageUpdateTemplateRequestUpdateTemplate`

</details>

## tag
{:#tagAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;tag-&gt;listTags() -> Tags</code></summary>

#### Description

Returns all existing tags with their properties and servers tagged.

#### Usage

```php
$client->tag->listTags();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;tag-&gt;createTag($request) -> Tag</code></summary>

#### Description

Creates a new tag. Existing servers can be tagged in same request.

#### Usage

```php
$client->tag->createTag(
    new Tag([
        'tag' => new TagTag([
            'name' => 'DEV',
            'servers' => new TagServers([]),
        ]),
    ]),
);
```

#### Parameters

**$request:** `Tag`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;tag-&gt;getTag($name) -> Tag</code></summary>

#### Description

Returns details for a specific tag.

#### Usage

```php
$client->tag->getTag(
    'DEV',
);
```

#### Parameters

**$name:** `string` — Tag name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;tag-&gt;modifyTag($name, $request) -> Tag</code></summary>

#### Description

Changes attributes of an existing tag

#### Usage

```php
$client->tag->modifyTag(
    'DEV',
    new ModifyTagRequest([
        'body' => new Tag([
            'tag' => new TagTag([
                'name' => 'DEV',
                'servers' => new TagServers([]),
            ]),
        ]),
    ]),
);
```

#### Parameters

**$name:** `string` — Tag name

**$request:** `Tag`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;tag-&gt;deleteTag($name)</code></summary>

#### Description

Deletes a specific tag.

#### Usage

```php
$client->tag->deleteTag(
    'DEV',
);
```

#### Parameters

**$name:** `string` — Tag name

</details>

## timezone
{:#timezoneAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;timezone-&gt;listTimezones() -> Timezones</code></summary>

#### Description

Retrieves a list of supported timezones.

#### Usage

```php
$client->timezone->listTimezones();
```

</details>

## account-tokens
{:#account-tokensAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;accountTokens-&gt;listTokens($request) -> array</code></summary>

#### Description

List all tokens for the currently authorized account.
The tokens are returned in a paged format, with the default page size being 20.
The maximum page size is 100.

#### Usage

```php
$client->accountTokens->listTokens(
    new ListTokensRequest([
        'gui' => true,
        'sort' => '+name,-created_at',
    ]),
);
```

#### Parameters

**$limit:** `?int` — How many tokens to return at per page

**$offset:** `?int` — Offset to start listing the tokens from

**$gui:** `?bool` — Filter tokens based on GUI flag (true or false). Default is no value, i.e. no filtering and all tokens are returned.

**$sort:** `?string` — Comma-separated list of fields to sort by. Prefix with '+' for ascending or '-' for descending order. Supported fields: created_at, expires_at, last_used_at, name. Example: sort=+name,-created_at. If no prefix is given, descending is assumed. Follows OpenAPI collectionFormat 'csv'.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;accountTokens-&gt;createToken($request) -> AccountTokensToken</code></summary>

#### Description

Create a new API token. Maximum token validity is 24*365h=8760h (~1 year).
Attribute allowed_ip_prefixes allows defining a list of CIDR/IP addresses from where the token is accepted.
Empty list denies access from everywhere. If unset, the default list will be the IP filters of the account. If no IP filters are defined for the account either, the default will be ["0.0.0.0/0", "::0/0"], i.e. allow from any address.

#### Usage

```php
$client->accountTokens->createToken(
    new AccountTokensCreateTokenRequestExpiresIn([]),
);
```

#### Parameters

**$request:** `AccountTokensCreateTokenRequestExpiresIn|AccountTokensCreateTokenRequestExpiresAt`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;accountTokens-&gt;getToken($tokenUuid) -> AccountTokensGetTokenResponse</code></summary>

#### Description

Get the details of a specific token.

#### Usage

```php
$client->accountTokens->getToken(
    'token-uuid',
);
```

#### Parameters

**$tokenUuid:** `string` — The uuid of the token to get

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;accountTokens-&gt;revokeToken($tokenUuid)</code></summary>

#### Description

Delete a specific token.

#### Usage

```php
$client->accountTokens->revokeToken(
    'token-uuid',
);
```

#### Parameters

**$tokenUuid:** `string` — The uuid of the token to delete

</details>

## object-storage-2
{:#object-storage-2Anchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorages($request) -> array</code></summary>

#### Description

Returns a list of object storage services.

#### Usage

```php
$client->objectStorage2->listObjectStorages(
    new ListObjectStoragesRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$sort:** `?string` — Order of returned results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorage($request) -> ObjectStorage2ServiceDetailResponse</code></summary>

#### Description

Creates a new object storage service.

#### Usage

```php
$client->objectStorage2->createObjectStorage(
    new ObjectStorage2ServiceCreate([
        'name' => 'example-service',
        'region' => 'example',
        'configuredStatus' => ObjectStorage2PropertyConfiguredStatus::Started->value,
        'networks' => [
            new ObjectStorage2NetworkCreate([
                'name' => 'example-public-network',
                'type' => ObjectStorage2NetworkType::Public_->value,
                'family' => ObjectStorage2NetworkFamily::IPv4->value,
            ]),
            new ObjectStorage2NetworkCreate([
                'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                'name' => 'example-private-network',
                'type' => ObjectStorage2NetworkType::Private_->value,
                'family' => ObjectStorage2NetworkFamily::IPv4->value,
            ]),
        ],
    ]),
);
```

#### Parameters

**$name:** `string`

**$region:** `string`

**$configuredStatus:** `string`

**$networks:** `?array` — Networks to attach to the service. Private networks must reside in the same region as the object storage.

**$customDomains:** `?array` — Custom domains to attach to the service.

**$labels:** `?array` — Labels for classifying the service.

**$properties:** `?ObjectStorage2PropertiesCreate`

**$terminationProtection:** `?bool` — Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorage($serviceUuid) -> ObjectStorage2ServiceDetailResponse</code></summary>

#### Description

Returns object storage service details by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->getObjectStorage(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;replaceObjectStorage($serviceUuid, $request) -> ObjectStorage2ServiceDetailResponse</code></summary>

#### Description

Replaces existing object storage service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->replaceObjectStorage(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2ServiceReplace([
        'name' => 'example-service',
        'configuredStatus' => ObjectStorage2PropertyConfiguredStatus::Started->value,
        'networks' => [
            new ObjectStorage2NetworkCreate([
                'name' => 'example-public-network',
                'type' => ObjectStorage2NetworkType::Public_->value,
                'family' => ObjectStorage2NetworkFamily::IPv4->value,
            ]),
            new ObjectStorage2NetworkCreate([
                'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                'name' => 'example-private-network',
                'type' => ObjectStorage2NetworkType::Private_->value,
                'family' => ObjectStorage2NetworkFamily::IPv4->value,
            ]),
        ],
        'labels' => [
            new ObjectStorage2LabelCreate([
                'key' => 'example-label-key',
                'value' => 'example-label-value',
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string` — The name of the service.

**$configuredStatus:** `string`

**$terminationProtection:** `?bool` — Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.

**$networks:** `?array`

**$customDomains:** `?array`

**$staticWebsites:** `?array` — Static website configurations for this service. Array replaces all existing configurations.

**$labels:** `?array`

**$properties:** `?ObjectStorage2PropertiesCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorage($serviceUuid, $request)</code></summary>

#### Description

Deletes existing object storage service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorage(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DeleteObjectStorageRequest([
        'force' => true,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$force:** `?bool` — If the parameter is provided, the deletion process starts even if the service is not empty.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;modifyObjectStorage($serviceUuid, $request) -> ObjectStorage2ServiceDetailResponse</code></summary>

#### Description

Modifies existing object storage service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->modifyObjectStorage(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2ServiceModify([
        'name' => 'example-service',
        'configuredStatus' => ObjectStorage2PropertyConfiguredStatus::Started->value,
        'networks' => [
            new ObjectStorage2NetworkCreate([
                'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                'name' => 'example-private-network',
                'type' => ObjectStorage2NetworkType::Private_->value,
                'family' => ObjectStorage2NetworkFamily::IPv4->value,
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `?string`

**$configuredStatus:** `?string`

**$networks:** `?array`

**$customDomains:** `?array`

**$staticWebsites:** `?array` — Static website configurations for this service. Array replaces all existing configurations.

**$labels:** `?array`

**$properties:** `?ObjectStorage2PropertiesCreate`

**$terminationProtection:** `?bool` — Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageNetworks($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service networks by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listObjectStorageNetworks(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageNetwork($serviceUuid, $request) -> ObjectStorage2NetworkDetailResponse</code></summary>

#### Description

Creates a new service network by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createObjectStorageNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateObjectStorageNetworkRequest([
        'body' => new ObjectStorage2NetworkCreate([
            'name' => 'example-public-network',
            'type' => ObjectStorage2NetworkType::Public_->value,
            'family' => ObjectStorage2NetworkFamily::IPv4->value,
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `ObjectStorage2NetworkCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageNetwork($serviceUuid, $networkName) -> ObjectStorage2NetworkDetailResponse</code></summary>

#### Description

Returns service network details by given {service_uuid} and {network_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageNetwork($serviceUuid, $networkName)</code></summary>

#### Description

Deletes existing network by given {service_uuid} and {network_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageCustomDomains($serviceUuid) -> array</code></summary>

#### Description

Returns a list of custom domains attached to a service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listObjectStorageCustomDomains(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;attachObjectStorageCustomDomain($serviceUuid, $request) -> ObjectStorage2CustomDomainDetailResponse</code></summary>

#### Description

Attaches a new custom domain to the service identified by {service_uuid}.

#### Usage

```php
$client->objectStorage2->attachObjectStorageCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    new AttachObjectStorageCustomDomainRequest([
        'body' => new ObjectStorage2CustomDomainCreate([
            'type' => ObjectStorage2CustomDomainCreateType::Public_->value,
            'domainName' => 'example.com',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `ObjectStorage2CustomDomainCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageCustomDomain($serviceUuid, $customDomainName) -> ObjectStorage2CustomDomainDetailResponse</code></summary>

#### Description

Returns custom domain details by given {service_uuid} and {domain_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageCustomDomain($serviceUuid, $customDomainName)</code></summary>

#### Description

Deletes existing custom domain by given {service_uuid} and {domain_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageCustomDomain($serviceUuid, $customDomainName, $request) -> ObjectStorage2CustomDomainDetailResponse</code></summary>

#### Description

Modifies existing custom domain by given {service_uuid} and {domain_name}.

#### Usage

```php
$client->objectStorage2->modifyObjectStorageCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
    new ObjectStorage2CustomDomainModify([
        'type' => ObjectStorage2CustomDomainModifyType::Public_->value,
        'domainName' => 'example.com',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

**$type:** `?string` — Type of the custom domain.

**$domainName:** `?string` — New modified custom domain. Supports both apex domains (example.com) and subdomains (objects.example.com).

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageRegions() -> array</code></summary>

#### Description

Returns a list of available managed object storage regions.

#### Usage

```php
$client->objectStorage2->listObjectStorageRegions();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageRegion($regionName) -> ObjectStorage2RegionDetailResponse</code></summary>

#### Description

Returns object storage region details by given {name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageRegion(
    'my-object-storage',
);
```

#### Parameters

**$regionName:** `string` — The name of the region.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageMetrics($serviceUuid) -> ObjectStorage2MetricsUsageResponse</code></summary>

#### Description

Returns object storage metrics by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->getObjectStorageMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageBucketMetrics($serviceUuid, $request) -> array</code></summary>

#### Description

Returns metrics for buckets within a service.

#### Usage

```php
$client->objectStorage2->listObjectStorageBucketMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListObjectStorageBucketMetricsRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageBucket($serviceUuid, $request) -> ObjectStorage2BucketDetailResponse</code></summary>

#### Description

Creates a new service bucket by the given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createObjectStorageBucket(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2BucketCreate([
        'name' => 'my-bucket-1',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string` — Must be unique within the service, and should contain only alphanumeric, .,- and _.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageBucket($serviceUuid, $bucketName)</code></summary>

#### Description

Deletes an existing bucket by given {service_uuid} and {bucket_name}. This API call will remove all objects from the bucket permanently and cannot be reversed.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageBucket(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$bucketName:** `string` — The name of the bucket.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageMetricsSeries($serviceUuid, $request) -> array</code></summary>

#### Description

Returns Object Storage instance metrics series by a given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listObjectStorageMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListObjectStorageMetricsSeriesRequest([
        'from' => new DateTime('2024-01-01T00:00:00Z'),
        'to' => new DateTime('2024-01-01T00:00:00Z'),
        'interval' => '1h',
        'limit' => 10,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$from:** `?DateTime` — Beginning of the time range for which to return metrics.

**$to:** `?DateTime` — End of the time range for which to return metrics.

**$interval:** `?string` — Metrics aggregation interval.

**$sort:** `?string` — Order of returned results.

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageLabels($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service labels by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listObjectStorageLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageLabel($serviceUuid, $request) -> ObjectStorage2LabelDetailResponse</code></summary>

#### Description

Creates a new label by given {service_uuid}. Labels are used for service filtering.

#### Usage

```php
$client->objectStorage2->createObjectStorageLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateObjectStorageLabelRequest([
        'body' => new ObjectStorage2LabelCreate([
            'key' => 'foo',
            'value' => 'bar',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `ObjectStorage2LabelCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageLabel($serviceUuid, $labelKey) -> ObjectStorage2LabelDetailResponse</code></summary>

#### Description

Returns label details by given {service_uuid} and {key}.

#### Usage

```php
$client->objectStorage2->getObjectStorageLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageLabel($serviceUuid, $labelKey)</code></summary>

#### Description

Deletes existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageLabel($serviceUuid, $labelKey, $request) -> ObjectStorage2LabelDetailResponse</code></summary>

#### Description

Modifies existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->objectStorage2->modifyObjectStorageLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
    new ObjectStorage2LabelModify([
        'key' => 'foo',
        'value' => 'bar',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

**$key:** `?string`

**$value:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageStaticWebsites($serviceUuid)</code></summary>

#### Description

Returns all static website configurations for a service along with available domains.

#### Usage

```php
$client->objectStorage2->listObjectStorageStaticWebsites(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageStaticWebsite($serviceUuid, $request) -> ObjectStorage2StaticWebsiteConfig</code></summary>

#### Description

Creates a new static website hosting configuration for a domain.

#### Usage

```php
$client->objectStorage2->createObjectStorageStaticWebsite(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateObjectStorageStaticWebsiteRequest([
        'body' => new ObjectStorage2StaticWebsiteConfigCreate([
            'bucketName' => 'my-website',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `ObjectStorage2StaticWebsiteConfigCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageStaticWebsite($serviceUuid, $customDomainName) -> ObjectStorage2StaticWebsiteConfig</code></summary>

#### Description

Returns a static website configuration for a specific domain.

#### Usage

```php
$client->objectStorage2->getObjectStorageStaticWebsite(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageStaticWebsite($serviceUuid, $customDomainName)</code></summary>

#### Description

Deletes a static website configuration.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageStaticWebsite(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageStaticWebsite($serviceUuid, $customDomainName, $request) -> ObjectStorage2StaticWebsiteConfig</code></summary>

#### Description

Updates an existing static website configuration.

#### Usage

```php
$client->objectStorage2->modifyObjectStorageStaticWebsite(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
    new ObjectStorage2StaticWebsiteConfigModify([]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

**$bucketName:** `?string` — Name of the S3/ECS bucket containing the website content. Only alphanumerics, dots, hyphens, and underscores are allowed.

**$bucketPrefix:** `?string` — Optional prefix/subfolder within the bucket. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.

**$indexDocument:** `?string` — Default document for directories. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.

**$spaMode:** `?bool` — Enable Single Page Application (SPA) mode. When enabled, all non-file routes serve the index document, allowing client-side routing to handle the URL. Essential for React, Vue, Next.js, and similar frameworks.

**$enabled:** `?bool` — Whether the static website configuration should be active

**$errorPages:** `?array` — Custom error page configurations for specific HTTP status codes or ranges. Replaces the entire set when provided.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageDomains($serviceUuid) -> ObjectStorage2ServiceDomains</code></summary>

#### Description

Returns all domains associated with this service (public endpoint, private endpoint, custom domains) along with their static website hosting status.

#### Usage

```php
$client->objectStorage2->listObjectStorageDomains(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageUsers($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service users by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listObjectStorageUsers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageUser($serviceUuid, $request) -> ObjectStorage2UserDetailResponse</code></summary>

#### Description

Creates a new service user by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createObjectStorageUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2UserCreate([
        'username' => 'example_user',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user to create.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageUser($serviceUuid, $username) -> ObjectStorage2UserDetailResponse</code></summary>

#### Description

Returns service user details by given {service_uuid} and {username}.

#### Usage

```php
$client->objectStorage2->getObjectStorageUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUser($serviceUuid, $username)</code></summary>

#### Description

Deletes existing user by given {service_uuid} and {username}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageAccessKeys($serviceUuid, $username) -> array</code></summary>

#### Description

Returns a list of available access keys for a user.

#### Usage

```php
$client->objectStorage2->listObjectStorageAccessKeys(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageAccessKey($serviceUuid, $username) -> ObjectStorage2CreateAccessKeyResponse</code></summary>

#### Description

Creates a new access key by given {service_uuid} and {username}.

#### Usage

```php
$client->objectStorage2->createObjectStorageAccessKey(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageAccessKeyDetails($serviceUuid, $username, $accessKeyId) -> ObjectStorage2AccessKeyDetailResponse</code></summary>

#### Description

Returns access key details by given {service_uuid}, {username}, and {access-key-id}.

#### Usage

```php
$client->objectStorage2->getObjectStorageAccessKeyDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'UCK1234567890ABCDEF',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$accessKeyId:** `string` — The ID of the access key.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageAccessKey($serviceUuid, $username, $accessKeyId)</code></summary>

#### Description

Deletes existing access key by given {service_uuid}, {username}, and {access-key-id}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageAccessKey(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'UCK1234567890ABCDEF',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$accessKeyId:** `string` — The ID of the access key.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageAccessKeyDetails($serviceUuid, $username, $accessKeyId, $request) -> ObjectStorage2AccessKeyDetailResponse</code></summary>

#### Description

Modifies access key details.

#### Usage

```php
$client->objectStorage2->modifyObjectStorageAccessKeyDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'UCK1234567890ABCDEF',
    new ObjectStorage2AccessKeyModify([
        'status' => ObjectStorage2AccessKeyModifyStatus::Inactive->value,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$accessKeyId:** `string` — The ID of the access key.

**$status:** `?string` — Indicates if the key is active or inactive.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageAttachedUserPolicies($serviceUuid, $username) -> array</code></summary>

#### Description

Returns a list of attached user policies for a user.

#### Usage

```php
$client->objectStorage2->listObjectStorageAttachedUserPolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;attachObjectStorageUserPolicy($serviceUuid, $username, $request)</code></summary>

#### Description

Attach a policy to a user.

#### Usage

```php
$client->objectStorage2->attachObjectStorageUserPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new AttachObjectStorageUserPolicyRequest([
        'body' => new ObjectStorage2PolicyAttachmentCreate([
            'name' => 'test-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$request:** `ObjectStorage2PolicyAttachmentCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;detachObjectStorageUserPolicy($serviceUuid, $username, $nestedName)</code></summary>

#### Description

Detach a policy from a user.

#### Usage

```php
$client->objectStorage2->detachObjectStorageUserPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$nestedName:** `string` — The name of the policy to detach.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageUserInlinePolicy($serviceUuid, $username, $userPolicyName) -> ObjectStorage2InlinePolicyResponse</code></summary>

#### Description

Get the user inline policy by the given {service_uuid}, {username} and {policy_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageUserInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$userPolicyName:** `string` — The name of the inline policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUserInlinePolicy($serviceUuid, $username, $userPolicyName)</code></summary>

#### Description

Deletes the user inline policy by the given {service_uuid}, {username}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageUserInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$userPolicyName:** `string` — The name of the inline policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageUserInlinePolicies($serviceUuid, $username) -> array</code></summary>

#### Description

Lists the user inline policies by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->listObjectStorageUserInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageUserInlinePolicy($serviceUuid, $username, $request) -> ObjectStorage2InlinePolicyResponse</code></summary>

#### Description

Creates a user inline policy by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->createObjectStorageUserInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateObjectStorageUserInlinePolicyRequest([
        'body' => new ObjectStorage2InlinePolicyCreate([
            'name' => 'ECSS3FullAccess',
            'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$request:** `ObjectStorage2InlinePolicyCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageUserTags($serviceUuid, $username) -> array</code></summary>

#### Description

Returns a user's tags by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->getObjectStorageUserTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;replaceObjectStorageUserTags($serviceUuid, $username, $request) -> array</code></summary>

#### Description

Replaces a user's tags by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->replaceObjectStorageUserTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ReplaceObjectStorageUserTagsRequest([
        'body' => [
            new ObjectStorage2TagListRequestItem([
                'key' => 'environment',
                'value' => 'production',
            ]),
            new ObjectStorage2TagListRequestItem([
                'key' => 'team',
                'value' => 'backend',
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$request:** `array`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUserTag($serviceUuid, $username, $userTagKey)</code></summary>

#### Description

Deletes a user's tag by the given {service_uuid}, {username}, and {tag_key}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageUserTag(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$userTagKey:** `string` — The key of the user tag.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageUserPermissionsBoundary($serviceUuid, $username, $request) -> ObjectStorage2PermissionsBoundaryResponse</code></summary>

#### Description

Creates a user's permissions boundary by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->createObjectStorageUserPermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateObjectStorageUserPermissionsBoundaryRequest([
        'body' => new ObjectStorage2PermissionsBoundaryCreate([
            'policyName' => 'sample-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$request:** `ObjectStorage2PermissionsBoundaryCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUserPermissionsBoundary($serviceUuid, $username)</code></summary>

#### Description

Deletes a user's permissions boundary by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageUserPermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStoragePolicyVersions($serviceUuid, $policyName) -> array</code></summary>

#### Description

Lists policy versions given by {service_uuid}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->listObjectStoragePolicyVersions(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStoragePolicyVersion($serviceUuid, $policyName, $request) -> ObjectStorage2PolicyVersionResponse</code></summary>

#### Description

Creates a policy version by the given {service_uuid}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->createObjectStoragePolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2PolicyVersionCreate([
        'document' => '{"Version":"2012-10-17","Statement":[{"Action":["*"],"Effect":"Deny","Resource":"*"}]}',
        'isDefault' => true,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

**$document:** `string` — A valid, URL-encoded policy document.

**$isDefault:** `bool` — Set this version as the default.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStoragePolicyVersion($serviceUuid, $policyName, $policyVersion) -> ObjectStorage2PolicyVersionResponse</code></summary>

#### Description

Get a single policy version by the given {service_uuid}, {policy_name}, and {policy_version}.

#### Usage

```php
$client->objectStorage2->getObjectStoragePolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'v1',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

**$policyVersion:** `string` — The version identifier of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStoragePolicyVersion($serviceUuid, $policyName, $policyVersion)</code></summary>

#### Description

Deletes a policy version by the given {service_uuid}, {policy_name}, and {policy_version}.

#### Usage

```php
$client->objectStorage2->deleteObjectStoragePolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'v1',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

**$policyVersion:** `string` — The version identifier of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStoragePolicy($serviceUuid, $policyName) -> ObjectStorage2PolicyDetailResponse</code></summary>

#### Description

Returns service policy details by given {service_uuid} and {policy_name}.

#### Usage

```php
$client->objectStorage2->getObjectStoragePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStoragePolicy($serviceUuid, $policyName)</code></summary>

#### Description

Deletes existing policy by given {service_uuid} and {policy_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStoragePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;setObjectStorageDefaultPolicyVersion($serviceUuid, $policyName, $request) -> ObjectStorage2PolicyDetailResponse</code></summary>

#### Description

Sets the default version for a policy. Note: This is mapped from ModifyPolicyVersion handler.

#### Usage

```php
$client->objectStorage2->setObjectStorageDefaultPolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2PolicySetDefaultVersion([
        'versionId' => 'v2',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

**$versionId:** `string` — The policy version ID to set as default.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStoragePolicies($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service policies by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listObjectStoragePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStoragePolicy($serviceUuid, $request) -> ObjectStorage2PolicyDetailResponse</code></summary>

#### Description

Creates a new service policy by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createObjectStoragePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2PolicyCreate([
        'name' => 'example-policy',
        'description' => 'example-description',
        'document' => '%7B%22Version%22%3A%20%222012-10-17%22%2C%20%20%22Statement%22%3A%20%5B%7B%22Action%22%3A%20%5B%22iam%3AGetUser%22%5D%2C%20%22Resource%22%3A%20%22%2A%22%2C%20%22Effect%22%3A%20%22Allow%22%2C%20%22Sid%22%3A%20%22editor%22%7D%5D%7D',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string` — Unique name of the policy.

**$description:** `?string` — The policy description.

**$document:** `string` — A valid, URL-encoded policy document.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageIamGroupPolicies($serviceUuid, $groupName) -> array</code></summary>

#### Description

Lists IAM policies attached to a group.

#### Usage

```php
$client->objectStorage2->listObjectStorageIamGroupPolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;attachObjectStorageIamGroupPolicy($serviceUuid, $groupName, $request)</code></summary>

#### Description

Attaches a policy to a group.

#### Usage

```php
$client->objectStorage2->attachObjectStorageIamGroupPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new AttachObjectStorageIamGroupPolicyRequest([
        'body' => new ObjectStorage2PolicyAttachmentCreate([
            'name' => 'test-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$request:** `ObjectStorage2PolicyAttachmentCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;detachObjectStorageIamGroupPolicy($serviceUuid, $groupName, $policyName)</code></summary>

#### Description

Detaches a policy from a group.

#### Usage

```php
$client->objectStorage2->detachObjectStorageIamGroupPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$policyName:** `string` — The name of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageGroups($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service groups by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listObjectStorageGroups(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageGroup($serviceUuid, $request) -> ObjectStorage2GroupResponse</code></summary>

#### Description

Creates an iam group.

#### Usage

```php
$client->objectStorage2->createObjectStorageGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2GroupCreate([
        'name' => 'new-group',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string` — A valid string to represent the name of the IAM group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageGroup($serviceUuid, $groupName) -> ObjectStorage2GroupResponse</code></summary>

#### Description

Get a single group identified by {service_uuid}, and {group_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageGroup($serviceUuid, $groupName)</code></summary>

#### Description

Deletes a group identified by {group_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;attachObjectStorageUserToGroup($serviceUuid, $groupName, $username)</code></summary>

#### Description

Attaches an iam user to a group identified by {group_name}, and {username}.

#### Usage

```php
$client->objectStorage2->attachObjectStorageUserToGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;removeObjectStorageUserFromGroup($serviceUuid, $groupName, $username)</code></summary>

#### Description

Removes an iam user from the group identified by {group_name}, and {username}.

#### Usage

```php
$client->objectStorage2->removeObjectStorageUserFromGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageGroupInlinePolicies($serviceUuid, $groupName) -> array</code></summary>

#### Description

Lists the group inline policies by the given {service_uuid}, and {group_name}.

#### Usage

```php
$client->objectStorage2->listObjectStorageGroupInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageGroupInlinePolicy($serviceUuid, $groupName, $request) -> ObjectStorage2InlinePolicyResponse</code></summary>

#### Description

Creates a group inline policy by the given {service_uuid}, and {group_name}.

#### Usage

```php
$client->objectStorage2->createObjectStorageGroupInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateObjectStorageGroupInlinePolicyRequest([
        'body' => new ObjectStorage2InlinePolicyCreate([
            'name' => 'ECSS3FullAccess',
            'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$request:** `ObjectStorage2InlinePolicyCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageGroupInlinePolicy($serviceUuid, $groupName, $groupPolicyName) -> ObjectStorage2InlinePolicyResponse</code></summary>

#### Description

Get the group inline policy by the given {service_uuid}, {group_name} and {policy_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageGroupInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$groupPolicyName:** `string` — The name of the inline policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageGroupInlinePolicy($serviceUuid, $groupName, $groupPolicyName)</code></summary>

#### Description

Deletes the group inline policy by the given {service_uuid}, {group_name}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageGroupInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$groupPolicyName:** `string` — The name of the inline policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageRoles($serviceUuid) -> array</code></summary>

#### Description

Lists the roles.

#### Usage

```php
$client->objectStorage2->listObjectStorageRoles(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageRole($serviceUuid, $request) -> ObjectStorage2RoleResponse</code></summary>

#### Description

Creates a service IAM role.

#### Usage

```php
$client->objectStorage2->createObjectStorageRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2RoleCreate([
        'name' => 'test-role',
        'assumeRolePolicyDocument' => '{"Version": "2012-10-17","Statement": [{"Action": "sts:AssumeRole","Principal": {"AWS": ["urn:ecs:iam::ns1:user/Demby"]},"Effect": "Allow","Resource": "*"}]}',
        'description' => 'A test role.',
        'maxSessionDuration' => 3600,
        'permissionsBoundary' => 'test-policy',
        'tags' => [
            new ObjectStorage2RoleTag([
                'key' => 'department',
                'value' => 'Finance',
            ]),
            new ObjectStorage2RoleTag([
                'key' => 'school',
                'value' => 'University of Helsinki',
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string`

**$assumeRolePolicyDocument:** `string` — The policy document that grants an entity permission to assume the role.

**$description:** `?string` — Description of the role.

**$maxSessionDuration:** `?int` — Maximum session duration in seconds.

**$permissionsBoundary:** `?string` — Policy name to set as the permissions boundary.

**$tags:** `?array` — Tags to attach to the role (max 50).

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageRole($serviceUuid, $roleName) -> ObjectStorage2RoleResponse</code></summary>

#### Description

Get a single role identified by {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRole($serviceUuid, $roleName)</code></summary>

#### Description

Deletes a service's IAM role.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;updateObjectStorageRole($serviceUuid, $roleName, $request) -> ObjectStorage2RoleResponse</code></summary>

#### Description

Updates a service's IAM role.

#### Usage

```php
$client->objectStorage2->updateObjectStorageRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2RoleUpdate([
        'description' => 'New description',
        'maxSessionDuration' => 3900,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$description:** `?string` — New description for the role.

**$maxSessionDuration:** `?int` — New maximum session duration in seconds.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageRoleInlinePolicies($serviceUuid, $roleName) -> array</code></summary>

#### Description

Returns a list of role inline policies by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->listObjectStorageRoleInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageRoleInlinePolicy($serviceUuid, $roleName, $request) -> ObjectStorage2InlinePolicyResponse</code></summary>

#### Description

Creates a role inline policy by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->createObjectStorageRoleInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateObjectStorageRoleInlinePolicyRequest([
        'body' => new ObjectStorage2InlinePolicyCreate([
            'name' => 'ECSS3FullAccess',
            'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$request:** `ObjectStorage2InlinePolicyCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageRoleInlinePolicy($serviceUuid, $roleName, $rolePolicyName) -> ObjectStorage2InlinePolicyResponse</code></summary>

#### Description

Returns a role's inline policy by the given {service_uuid}, {role_name}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageRoleInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$rolePolicyName:** `string` — The name of the inline policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRoleInlinePolicy($serviceUuid, $roleName, $rolePolicyName)</code></summary>

#### Description

Delete a role inline policy by the given {service_uuid}, {role_name} and {policy_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageRoleInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$rolePolicyName:** `string` — The name of the inline policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;createObjectStorageRolePermissionsBoundary($serviceUuid, $roleName, $request) -> ObjectStorage2PermissionsBoundaryResponse</code></summary>

#### Description

Creates a role policy's permissions boundary by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->createObjectStorageRolePermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateObjectStorageRolePermissionsBoundaryRequest([
        'body' => new ObjectStorage2PermissionsBoundaryCreate([
            'policyName' => 'sample-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$request:** `ObjectStorage2PermissionsBoundaryCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRolePermissionsBoundary($serviceUuid, $roleName)</code></summary>

#### Description

Deletes a role permissions boundary by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageRolePermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;assumeObjectStorageRolePolicy($serviceUuid, $roleName, $request) -> ObjectStorage2AssumeRolePolicyResponse</code></summary>

#### Description

Assume a role policy by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->assumeObjectStorageRolePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2AssumeRolePolicyRequest([
        'document' => '{"Version":"2012-10-17","Statement":[{"Effect":"Allow","Principal":{"Service":"backup.upcloud.com"},"Action":"sts:AssumeRole"}]}',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$document:** `string` — The assume role policy document that grants an entity permission to assume the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;listObjectStorageAttachedRolePolicies($serviceUuid, $roleName) -> array</code></summary>

#### Description

Lists all policies attached to a service's IAM role.

#### Usage

```php
$client->objectStorage2->listObjectStorageAttachedRolePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;attachObjectStoragePolicyToRole($serviceUuid, $roleName, $request)</code></summary>

#### Description

Attaches a policy to a service's IAM role.

#### Usage

```php
$client->objectStorage2->attachObjectStoragePolicyToRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new AttachObjectStoragePolicyToRoleRequest([
        'body' => new ObjectStorage2PolicyAttachmentCreate([
            'name' => 'test-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$request:** `ObjectStorage2PolicyAttachmentCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;detachObjectStoragePolicyFromRole($serviceUuid, $roleName, $rolePolicyName)</code></summary>

#### Description

Detaches a policy from a service's IAM role.

#### Usage

```php
$client->objectStorage2->detachObjectStoragePolicyFromRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$rolePolicyName:** `string` — The name of the inline policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;getObjectStorageRoleTags($serviceUuid, $roleName) -> array</code></summary>

#### Description

Returns a role's tags by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->getObjectStorageRoleTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;replaceObjectStorageRoleTags($serviceUuid, $roleName, $request) -> array</code></summary>

#### Description

Replaces a role's tags by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->replaceObjectStorageRoleTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ReplaceObjectStorageRoleTagsRequest([
        'body' => [
            new ObjectStorage2TagListRequestItem([
                'key' => 'environment',
                'value' => 'production',
            ]),
            new ObjectStorage2TagListRequestItem([
                'key' => 'team',
                'value' => 'backend',
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$request:** `array`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRoleTag($serviceUuid, $roleName, $roleTagKey)</code></summary>

#### Description

Deletes a role's tag by the given {service_uuid}, {role_name}, and {tag_key}.

#### Usage

```php
$client->objectStorage2->deleteObjectStorageRoleTag(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$roleTagKey:** `string` — The key of the role tag.

</details>

## file-storage
{:#file-storageAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;listFileStorages($request) -> array</code></summary>

#### Description

Returns a list of File Storage services.

#### Usage

```php
$client->fileStorage->listFileStorages(
    new ListFileStoragesRequest([]),
);
```

#### Parameters

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$sort:** `?string` — Order of returned results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;createFileStorage($request) -> FileStorageServiceDetailResponse</code></summary>

#### Description

Creates a new File Storage service.

#### Usage

```php
$client->fileStorage->createFileStorage(
    new FileStorageServiceCreate([
        'name' => 'test-name',
        'zone' => 'fi-hel2',
        'configuredStatus' => FileStorageConfiguredStatus::Started->value,
        'sizeGib' => 250,
        'encrypted' => false,
        'networks' => [
            new FileStorageNetworkCreate([
                'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                'name' => 'net',
                'family' => FileStorageNetworkFamily::IPv4->value,
                'ipAddress' => '192.168.147.120',
            ]),
        ],
        'shares' => [
            new FileStorageShareCreate([
                'name' => 'read',
                'path' => '/public',
                'acl' => [
                    new FileStorageAclCreate([
                        'name' => 'test-name',
                        'target' => '*',
                        'permission' => FileStoragePermission::Ro->value,
                    ]),
                ],
            ]),
            new FileStorageShareCreate([
                'name' => 'write',
                'path' => '/project/data',
                'acl' => [
                    new FileStorageAclCreate([
                        'name' => 'test-name',
                        'target' => '192.168.147.0/24',
                        'permission' => FileStoragePermission::Rw->value,
                    ]),
                    new FileStorageAclCreate([
                        'name' => 'test-name',
                        'target' => 'local.domain',
                        'permission' => FileStoragePermission::Rw->value,
                    ]),
                ],
            ]),
        ],
        'labels' => [
            new FileStorageLabelCreate([
                'key' => 'environment',
                'value' => 'production',
            ]),
        ],
    ]),
);
```

#### Parameters

**$name:** `string`

**$zone:** `string` — Indicates the zone where the service will be created.

**$configuredStatus:** `string`

**$sizeGib:** `int`

**$encrypted:** `?bool` — Indicates whether encryption at rest is enabled for the service.

**$networks:** `?array`

**$shares:** `?array`

**$labels:** `?array` — Labels

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;getFileStorage($serviceUuid) -> FileStorageServiceDetailResponse</code></summary>

#### Description

Returns managed File Storage details by given {service_uuid}.

#### Usage

```php
$client->fileStorage->getFileStorage(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;replaceFileStorage($serviceUuid, $request) -> FileStorageServiceDetailResponse</code></summary>

#### Description

Replaces existing File Storage service by given {service_uuid}.

#### Usage

```php
$client->fileStorage->replaceFileStorage(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    new FileStorageServiceReplace([
        'name' => 'test-name',
        'configuredStatus' => FileStorageConfiguredStatus::Started->value,
        'sizeGib' => 250,
        'networks' => [
            new FileStorageNetworkCreate([
                'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                'name' => 'net',
                'family' => FileStorageNetworkFamily::IPv4->value,
                'ipAddress' => '192.168.147.120',
            ]),
        ],
        'labels' => [
            new FileStorageLabelCreate([
                'key' => 'environment',
                'value' => 'production',
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string`

**$configuredStatus:** `string`

**$sizeGib:** `int`

**$networks:** `?array`

**$labels:** `?array` — Labels

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;deleteFileStorage($serviceUuid)</code></summary>

#### Description

Deletes existing File Storage service by given {service_uuid}.

#### Usage

```php
$client->fileStorage->deleteFileStorage(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;modifyFileStorage($serviceUuid, $request) -> FileStorageServiceDetailResponse</code></summary>

#### Description

Modifies existing File Storage service by given {service_uuid}.

#### Usage

```php
$client->fileStorage->modifyFileStorage(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    new FileStorageServiceModify([
        'name' => 'test-name',
        'configuredStatus' => FileStorageConfiguredStatus::Started->value,
        'sizeGib' => 250,
        'networks' => [
            new FileStorageNetworkCreate([
                'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                'name' => 'net',
                'family' => FileStorageNetworkFamily::IPv4->value,
                'ipAddress' => '192.168.147.120',
            ]),
        ],
        'labels' => [
            new FileStorageLabelCreate([
                'key' => 'environment',
                'value' => 'production',
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `?string`

**$configuredStatus:** `?string`

**$sizeGib:** `?int`

**$networks:** `?array`

**$labels:** `?array`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;listFileStorageNetworks($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service networks by given {service_uuid}.

#### Usage

```php
$client->fileStorage->listFileStorageNetworks(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;createFileStorageNetwork($serviceUuid, $request) -> FileStorageNetworkDetailResponse</code></summary>

#### Description

Creates a new service network by given {service_uuid}.

#### Usage

```php
$client->fileStorage->createFileStorageNetwork(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    new CreateFileStorageNetworkRequest([
        'body' => new FileStorageNetworkCreate([
            'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
            'name' => 'test-name',
            'family' => FileStorageNetworkFamily::IPv4->value,
            'ipAddress' => '10.20.30.40',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `FileStorageNetworkCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;getFileStorageNetwork($serviceUuid, $networkName) -> FileStorageNetworkDetailResponse</code></summary>

#### Description

Returns service network details by given {service_uuid} and {network_name}.

#### Usage

```php
$client->fileStorage->getFileStorageNetwork(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;deleteFileStorageNetwork($serviceUuid, $networkName)</code></summary>

#### Description

Deletes existing network by given {service_uuid} and {network_name}.

#### Usage

```php
$client->fileStorage->deleteFileStorageNetwork(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;modifyFileStorageNetwork($serviceUuid, $networkName, $request) -> FileStorageNetworkDetailResponse</code></summary>

#### Description

Modifies existing service network by given {service_uuid} and {network_name}.

#### Usage

```php
$client->fileStorage->modifyFileStorageNetwork(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    new FileStorageNetworkModify([
        'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
        'name' => 'test-name',
        'family' => FileStorageNetworkFamily::IPv4->value,
        'ipAddress' => '10.20.30.40',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

**$uuid:** `?string`

**$name:** `?string`

**$family:** `?string`

**$ipAddress:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;listFileStorageShares($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service shares by given {service_uuid}.

#### Usage

```php
$client->fileStorage->listFileStorageShares(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;createFileStorageShare($serviceUuid, $request) -> FileStorageShareDetailResponse</code></summary>

#### Description

Creates a new service share by given {service_uuid}.

#### Usage

```php
$client->fileStorage->createFileStorageShare(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    new CreateFileStorageShareRequest([
        'body' => new FileStorageShareCreate([
            'name' => 'read',
            'path' => '/public',
            'acl' => [
                new FileStorageAclCreate([
                    'name' => 'test-name',
                    'target' => '192.168.147.0/24',
                    'permission' => FileStoragePermission::Ro->value,
                ]),
            ],
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `FileStorageShareCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;getFileStorageShare($serviceUuid, $shareName) -> FileStorageShareDetailResponse</code></summary>

#### Description

Returns service share details by given {service_uuid} and {share_name}.

#### Usage

```php
$client->fileStorage->getFileStorageShare(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;deleteFileStorageShare($serviceUuid, $shareName)</code></summary>

#### Description

Deletes existing share by given {service_uuid} and {share_name}.

#### Usage

```php
$client->fileStorage->deleteFileStorageShare(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;modifyFileStorageShare($serviceUuid, $shareName, $request) -> FileStorageShareDetailResponse</code></summary>

#### Description

Modifies existing service share by given {service_uuid} and {share_name}.

#### Usage

```php
$client->fileStorage->modifyFileStorageShare(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    new FileStorageShareModify([
        'name' => 'test-name',
        'acl' => [
            new FileStorageAclCreate([
                'name' => 'test-name',
                'target' => '192.168.25.0/24',
                'permission' => FileStoragePermission::Ro->value,
            ]),
        ],
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

**$name:** `?string` — A resource name.

**$acl:** `?array`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;listFileStorageAcls($serviceUuid, $shareName) -> array</code></summary>

#### Description

Returns a list of available ACLs by given {service_uuid} and {share_name}.

#### Usage

```php
$client->fileStorage->listFileStorageAcls(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;createFileStorageAcl($serviceUuid, $shareName, $request) -> FileStorageAclDetailResponse</code></summary>

#### Description

Creates a new share ACL by given {service_uuid} and {share_name}.

#### Usage

```php
$client->fileStorage->createFileStorageAcl(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    new CreateFileStorageAclRequest([
        'body' => new FileStorageAclCreate([
            'name' => 'test-name',
            'target' => '192.168.25.147',
            'permission' => FileStoragePermission::Ro->value,
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

**$request:** `FileStorageAclCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;getFileStorageAcl($serviceUuid, $shareName, $aclName) -> FileStorageAclDetailResponse</code></summary>

#### Description

Returns ACL details by given {service_uuid}, {share_name} and {acl_name}.

#### Usage

```php
$client->fileStorage->getFileStorageAcl(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    'test-name',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

**$aclName:** `string` — The name of the ACL.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;deleteFileStorageAcl($serviceUuid, $shareName, $aclName)</code></summary>

#### Description

Deletes existing ACL by given {service_uuid}, {share_name} and {acl_name}.

#### Usage

```php
$client->fileStorage->deleteFileStorageAcl(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    'test-name',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

**$aclName:** `string` — The name of the ACL.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;modifyFileStorageAcl($serviceUuid, $shareName, $aclName, $request) -> FileStorageAclDetailResponse</code></summary>

#### Description

Modifies existing ACL by given {service_uuid}, {share_name} and {acl_name}.

#### Usage

```php
$client->fileStorage->modifyFileStorageAcl(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    'test-name',
    new FileStorageAclModify([
        'name' => 'test-name',
        'target' => '192.168.25.0/24',
        'permission' => FileStoragePermission::Rw->value,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$shareName:** `string` — The name of the share.

**$aclName:** `string` — The name of the ACL.

**$name:** `?string`

**$target:** `?string` — The target of the ACL entry. It can be a IP Address, Network Prefix or a wildcard.

**$permission:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;listFileStorageLabels($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service labels by given {service_uuid}.

#### Usage

```php
$client->fileStorage->listFileStorageLabels(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;createFileStorageLabel($serviceUuid, $request) -> FileStorageLabelDetails</code></summary>

#### Description

Creates a new label by given {service_uuid}. Labels are used for service filtering.

#### Usage

```php
$client->fileStorage->createFileStorageLabel(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    new CreateFileStorageLabelRequest([
        'body' => new FileStorageLabelCreate([
            'key' => 'environment',
            'value' => 'production',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `FileStorageLabelCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;getFileStorageLabel($serviceUuid, $labelKey) -> FileStorageLabelDetails</code></summary>

#### Description

Returns label details by given {service_uuid} and {key}.

#### Usage

```php
$client->fileStorage->getFileStorageLabel(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;deleteFileStorageLabel($serviceUuid, $labelKey)</code></summary>

#### Description

Deletes existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->fileStorage->deleteFileStorageLabel(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;modifyFileStorageLabel($serviceUuid, $labelKey, $request) -> FileStorageLabelDetails</code></summary>

#### Description

Modifies existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->fileStorage->modifyFileStorageLabel(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'environment',
    new FileStorageLabelModify([
        'key' => 'environment',
        'value' => 'production',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

**$key:** `?string`

**$value:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;fileStorage-&gt;getFileStorageCurrentState($serviceUuid) -> FileStorageServiceDetailResponse</code></summary>

#### Description

Returns the current state of the File Storage service by given {service_uuid}.

#### Usage

```php
$client->fileStorage->getFileStorageCurrentState(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

## database
{:#databaseAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseTypes() -> array</code></summary>

#### Description

Returns a list of available database types. Contains available plans, zones, database versions supported and the configuration properties for each database.

#### Usage

```php
$client->database->listDatabaseTypes();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseType($serviceTypeName) -> DatabaseServiceTypeResponse</code></summary>

#### Description

Returns database type details by given {database_type}. Contains available plans, zones, database versions supported and configuration properties.

#### Usage

```php
$client->database->getDatabaseType(
    DatabaseServiceType::Mysql->value,
);
```

#### Parameters

**$serviceTypeName:** `string` — Service type parameter

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabases($request) -> array</code></summary>

#### Description

Returns a list of all available Managed Database services. Depending on their database type, Managed Databases services will have different details.

#### Usage

```php
$client->database->listDatabases(
    new ListDatabasesRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$sort:** `?string` — Sort results by the specified field. Prefix with '-' for descending order. Supported fields: `created_at`, `name` (service hostname), `operational_state` (service status), `zone` (location).

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabase($request) -> DatabaseServiceInformationResponse</code></summary>

#### Description

Creates a new Managed Database instance. New databases are started by default. An initial backup is created automatically on startup and the API will be fully functional only after this backup has been created. The creation might take a while. Note that different databases have different properties that can be passed on creation.

#### Usage

```php
$client->database->createDatabase(
    new DatabaseServicePropertiesMysql([]),
);
```

#### Parameters

**$request:** `DatabaseServicePropertiesMysql|DatabaseServicePropertiesPg|DatabaseServicePropertiesRedis|DatabaseServicePropertiesOpensearch|DatabaseServicePropertiesValkey`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabase($uuid) -> DatabaseServiceInformationResponse</code></summary>

#### Description

Returns details of a Managed Database service by its {uuid}.

#### Usage

```php
$client->database->getDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabase($uuid)</code></summary>

#### Description

Deletes a specified Managed Database. All data will be erased and lost, including backups. If the service is not powered off, it will be powered off before deletion. The state of the service can be anything.

#### Usage

```php
$client->database->deleteDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabase($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>

#### Description

Modifies Managed Database service details by its {uuid} including upgrading plans, migration to other zones and database type-specific configurations.

#### Usage

```php
$client->database->modifyDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ModifyDatabaseRequest([
        'body' => new DatabaseServicePropertiesMysql([]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$request:** `DatabaseServicePropertiesMysql|DatabaseServicePropertiesPg|DatabaseServicePropertiesRedis|DatabaseServicePropertiesOpensearch|DatabaseServicePropertiesValkey`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseType($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>

#### Description

Update a service's type by the given {service-uuid}.

#### Usage

```php
$client->database->modifyDatabaseType(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceTypeModify([
        'targetType' => 'primary',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$targetType:** `string` — Service type

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;cloneDatabase($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>

#### Description

Creates a clone of a Managed Database service based on its {uuid}. It is possible to change location, plans and use the point in time feature to clone your service at a specific time using your backups.

#### Usage

```php
$client->database->cloneDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CloneDatabaseRequest([
        'body' => new DatabaseServiceCloneMysql([
            'hostnamePrefix' => 'dev',
            'plan' => 'starter-kit-plan',
            'cloneTime' => new DateTime('2024-01-30T15:04:05Z'),
            'backupName' => 'daily-backup-2024-01-30',
            'zone' => 'fi-hel1',
            'terminationProtection' => false,
            'maintenance' => new DatabaseServiceCloneMysqlMaintenance([
                'dow' => DatabaseMaintenanceDow::Monday->value,
                'time' => '03:00:00',
            ]),
            'additionalDiskSpaceGib' => 10,
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$request:** `DatabaseServiceCloneMysql|DatabaseServiceClonePg|DatabaseServiceCloneRedis|DatabaseServiceCloneOpensearch|DatabaseServiceCloneValkey`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseNetworks($uuid) -> array</code></summary>

#### Description

Returns a list of attached SDN networks to a Managed Database service by its {uuid}.

#### Usage

```php
$client->database->listDatabaseNetworks(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseNetwork($uuid, $request) -> DatabaseNetworkInformationDetailsResponse</code></summary>

#### Description

Attaches an SDN network to a Managed Database service by its {uuid}.

#### Usage

```php
$client->database->createDatabaseNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateDatabaseNetworkRequest([
        'body' => new DatabaseNetworkCreate([
            'name' => 'my-network',
            'type' => DatabaseNetworkType::Private_->value,
            'family' => DatabaseNetworkFamily::IPv4->value,
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$request:** `DatabaseNetworkCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseNetwork($uuid, $networkName) -> DatabaseNetworkInformationDetailsResponse</code></summary>

#### Description

Returns the attached SDN network details to service by its {uuid} and {network_name}.

#### Usage

```php
$client->database->getDatabaseNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$networkName:** `string` — Network UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseNetwork($uuid, $networkName)</code></summary>

#### Description

Detaches an existing SDN network from a Managed Database service by its {uuid} and {network_name}.

#### Usage

```php
$client->database->deleteDatabaseNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$networkName:** `string` — Network UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;upgradeDatabase($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>

#### Description

Upgrades your PostgreSQL Managed Database service database to a newer major version. Downgrades are not permitted.

#### Usage

```php
$client->database->upgradeDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceUpgrade([
        'targetVersion' => '12',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$targetVersion:** `string` — Version to upgrade the service

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseLabels($uuid) -> array</code></summary>

#### Description

Returns a list of available service labels by given {service_uuid}.

#### Usage

```php
$client->database->listDatabaseLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseLabel($uuid, $request) -> DatabaseLabelResponse</code></summary>

#### Description

Creates a new label by given {service_uuid}. Labels used for service filtering.

#### Usage

```php
$client->database->createDatabaseLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateDatabaseLabelRequest([
        'body' => new DatabaseLabelCreate([
            'key' => 'environment',
            'value' => 'production',
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$request:** `DatabaseLabelCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseLabel($uuid, $labelKey) -> DatabaseLabelResponse</code></summary>

#### Description

Returns label details by given {service_uuid} and {key}.

#### Usage

```php
$client->database->getDatabaseLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'foo',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$labelKey:** `string` — Label ID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseLabel($uuid, $labelKey)</code></summary>

#### Description

Deletes existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->database->deleteDatabaseLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'foo',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$labelKey:** `string` — Label ID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseLabel($uuid, $labelKey, $request) -> DatabaseLabelResponse</code></summary>

#### Description

Modifies existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->database->modifyDatabaseLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'foo',
    new DatabaseLabelModify([
        'key' => 'environment',
        'value' => 'production',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$labelKey:** `string` — Label ID

**$key:** `?string`

**$value:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseAvailableExtensions($uuid) -> array</code></summary>

#### Description

Returns a list of available PostgreSQL extensions for the Managed Database service by its {service-uuid}. Only supported for PostgreSQL services.

#### Usage

```php
$client->database->getDatabaseAvailableExtensions(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getPgAvailableExtensions() -> array</code></summary>

#### Description

Returns a list of available PostgreSQL extensions grouped by PostgreSQL version.

#### Usage

```php
$client->database->getPgAvailableExtensions();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseTypeVersions() -> array</code></summary>

#### Description

Returns a list of supported Managed Database service versions.

#### Usage

```php
$client->database->getDatabaseTypeVersions();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseOpenSearchAclSettings($uuid) -> DatabaseAccessControlSettingsResponse</code></summary>

#### Description

Return access controls settings for the OpenSearch Managed Database service {uuid}.

#### Usage

```php
$client->database->getDatabaseOpenSearchAclSettings(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseOpenSearchAclSettings($uuid, $request) -> DatabaseAccessControlSettingsResponse</code></summary>

#### Description

Modifies the user {username} access control for the Managed Database service {uuid}.

#### Usage

```php
$client->database->modifyDatabaseOpenSearchAclSettings(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceAclModify([
        'accessControl' => true,
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$accessControl:** `?bool` — Enables OpenSearch access control

**$extendedAccessControl:** `?bool` — Enables OpenSearch extended access control

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseOpenSearchSecurityPluginStatus($uuid) -> DatabaseOpenSearchSecurityPluginStatusResponse</code></summary>

#### Description

Returns Security management status for the OpenSearch Managed Database service {uuid}.

#### Usage

```php
$client->database->getDatabaseOpenSearchSecurityPluginStatus(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;enableDatabaseOpenSearchSecurityPlugin($uuid, $request) -> DatabaseOpenSearchSecurityPluginStatusResponse</code></summary>

#### Description

Enables Security management admin for the OpenSearch Managed Database service {uuid}.

#### Usage

```php
$client->database->enableDatabaseOpenSearchSecurityPlugin(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceSecurityEnable([
        'adminPassword' => 'Str0ngP@ssw0rd!',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$adminPassword:** `string` — Security admin password

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseOpenSearchSecurityPluginPassword($uuid, $request) -> DatabaseOpenSearchSecurityPluginStatusResponse</code></summary>

#### Description

Modifies Security management admin password for the OpenSearch Managed Database service {uuid}.

#### Usage

```php
$client->database->modifyDatabaseOpenSearchSecurityPluginPassword(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceSecurityModify([
        'adminPassword' => 'Curr3nt@Passw0rd!',
        'newPassword' => 'N3w@Str0ngPassw0rd!',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$adminPassword:** `string` — Current admin password

**$newPassword:** `string` — New admin password

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseIntegrationEndpoints() -> array</code></summary>

#### Description

Returns a list of available integration endpoints.

#### Usage

```php
$client->database->listDatabaseIntegrationEndpoints();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseIntegrationEndpoint($request) -> DatabaseIntegrationEndpointResponse</code></summary>

#### Description

Creates a new integration endpoint.

#### Usage

```php
$client->database->createDatabaseIntegrationEndpoint(
    new DatabaseIntegrationEndpointCreate([
        'type' => DatabaseIntegrationEndpoint::Logs->value,
        'name' => 'webhook-endpoint',
    ]),
);
```

#### Parameters

**$type:** `string`

**$name:** `string` — The name of the integration endpoint.

**$properties:** `?array` — A key-value map of properties specific to the integration endpoint type.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseIntegrationEndpoint($integrationUuid) -> DatabaseIntegrationEndpointResponse</code></summary>

#### Description

Returns integration endpoint details by given {integration-uuid}.

#### Usage

```php
$client->database->getDatabaseIntegrationEndpoint(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$integrationUuid:** `string` — Integration UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseIntegrationEndpoint($integrationUuid)</code></summary>

#### Description

Deletes existing integration endpoint by given {integration-uuid}.

#### Usage

```php
$client->database->deleteDatabaseIntegrationEndpoint(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$integrationUuid:** `string` — Integration UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseIntegrationEndpoint($integrationUuid, $request) -> DatabaseIntegrationEndpointResponse</code></summary>

#### Description

Modifies existing integration endpoint by given {integration-uuid}.

#### Usage

```php
$client->database->modifyDatabaseIntegrationEndpoint(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseIntegrationEndpointModify([]),
);
```

#### Parameters

**$integrationUuid:** `string` — Integration UUID

**$properties:** `?array`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseAccountCa() -> DatabaseAccountCaResponse</code></summary>

#### Description

Returns the CA certificate. Every customer main account has a private Certificate Authority (CA) that signs certificates for internal use. Managed Database service types, such as PostgreSQL, use it for external connections. To access these services, you must download and configure the certificate on your browser or client.

#### Usage

```php
$client->database->getDatabaseAccountCa();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseProjectAlerts() -> array</code></summary>

#### Description

Returns all the alerts associated with your Managed Database services.

#### Usage

```php
$client->database->getDatabaseProjectAlerts();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseStatus($uuid) -> DatabaseServiceStatusResponse</code></summary>

#### Description

Get a service's status by the given {service-uuid}.

#### Usage

```php
$client->database->getDatabaseStatus(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseVersions($uuid) -> array</code></summary>

#### Description

Returns available versions of the Managed Database service by its {uuid}.

#### Usage

```php
$client->database->getDatabaseVersions(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;startDatabaseManualMaintenanceService($uuid) -> DatabaseUpCloudApiResponse</code></summary>

#### Description

Start maintenance updates for your Managed Database service if any updates are pending.

#### Usage

```php
$client->database->startDatabaseManualMaintenanceService(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;enableDatabaseTemporaryWrites($uuid) -> DatabaseUpCloudApiResponse</code></summary>

#### Description

Enable temporary writes by the given {service-uuid}.

#### Usage

```php
$client->database->enableDatabaseTemporaryWrites(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseMigrationStatus($uuid) -> DatabaseServiceMigrationStatusResponse</code></summary>

#### Description

Returns details about the migration progress over time of a Managed database service by its {uuid}.

#### Usage

```php
$client->database->getDatabaseMigrationStatus(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseAlerts($uuid) -> array</code></summary>

#### Description

Returns all the alerts associated with your Managed Database services.

#### Usage

```php
$client->database->getDatabaseAlerts(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseMetrics($uuid) -> array</code></summary>

#### Description

Returns metrics related to a Managed Database service by its {uuid} and query parameter {period}.

#### Usage

```php
$client->database->getDatabaseMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseQueryStatistics($uuid, $request) -> DatabaseQueryStatisticsResponse</code></summary>

#### Description

Returns a list of query statistics for the Managed Database service by its {uuid} and optional query parameters {limit}, {offset} and {order}. Query statistics will differ depending on the database type.

#### Usage

```php
$client->database->getDatabaseQueryStatistics(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GetDatabaseQueryStatisticsRequest([
        'limit' => 10,
        'offset' => 0,
        'order' => 'asc',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$order:** `?string` — Sort order

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseLogs($uuid, $request) -> DatabaseLogListResponse</code></summary>

#### Description

Returns Managed Database service system-level logs by its {uuid} and optional query parameters {limit}, {offset} and {order}.

#### Usage

```php
$client->database->getDatabaseLogs(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GetDatabaseLogsRequest([
        'limit' => 10,
        'offset' => 0,
        'order' => 'asc',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$order:** `?string` — Sort order

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseConnectionPools($uuid, $request) -> array</code></summary>

#### Description

Returns a list of available connection pools for a Managed Database service. Connection pools are available only for PostgreSQL database services.

#### Usage

```php
$client->database->listDatabaseConnectionPools(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListDatabaseConnectionPoolsRequest([
        'sort' => 'asc',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$sort:** `?string` — Order of returned results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseConnectionPool($uuid, $request) -> DatabaseConnectionPoolResponse</code></summary>

#### Description

Creates a connection pool for the Managed Database service {uuid}. Connection pool endpoints are for PostgreSQL Managed Databases only.

#### Usage

```php
$client->database->createDatabaseConnectionPool(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseConnectionPoolCreate([
        'database' => 'defaultdb',
        'poolMode' => DatabaseConnectionPoolCreatePoolMode::Statement->value,
        'poolName' => 'readonly-pool',
        'poolSize' => 10,
        'username' => 'readonly',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$database:** `string` — Database

**$poolMode:** `string` — Connection Pool mode

**$poolName:** `string` — Connection Pool name

**$poolSize:** `int` — Connection Pool size

**$username:** `?string` — Connection Pool username

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseConnectionPool($uuid, $poolName) -> DatabaseConnectionPoolResponse</code></summary>

#### Description

Returns the connection pool {pool-name} details for the Managed Database service {uuid}.

#### Usage

```php
$client->database->getDatabaseConnectionPool(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$poolName:** `string` — Connection Pool Name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseConnectionPool($uuid, $poolName)</code></summary>

#### Description

Deletes the connection pool {pool-name} for the Managed Database service {uuid}.

#### Usage

```php
$client->database->deleteDatabaseConnectionPool(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$poolName:** `string` — Connection Pool Name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseConnectionPool($uuid, $poolName, $request) -> DatabaseConnectionPoolResponse</code></summary>

#### Description

Modifies the connection pool {pool-name} for the Managed Database service {uuid}.

#### Usage

```php
$client->database->modifyDatabaseConnectionPool(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
    new DatabaseConnectionPoolModify([
        'database' => 'defaultdb',
        'poolMode' => DatabaseConnectionPoolModifyPoolMode::Session->value,
        'poolSize' => 20,
        'username' => 'app-user',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$poolName:** `string` — Connection Pool Name

**$database:** `?string` — Database

**$poolMode:** `?string` — Connection Pool mode

**$poolSize:** `?int` — Connection Pool size

**$username:** `?string` — Connection Pool username

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseOpenSearchIndices($uuid) -> array</code></summary>

#### Description

Returns a list of available indices for a Managed Database service {uuid}.

#### Usage

```php
$client->database->listDatabaseOpenSearchIndices(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseOpenSearchIndex($uuid, $indexName)</code></summary>

#### Description

Deletes the index {index_name} for the Managed Database service {uuid}.

#### Usage

```php
$client->database->deleteDatabaseOpenSearchIndex(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$indexName:** `string` — OpenSearch Index Name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseIntegrations($uuid) -> array</code></summary>

#### Description

Returns a list of available service integrations by given {service-uuid}.

#### Usage

```php
$client->database->listDatabaseIntegrations(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseIntegration($uuid, $request) -> DatabaseServiceIntegrationResponse</code></summary>

#### Description

Creates a new integration by given {service-uuid}.

#### Usage

```php
$client->database->createDatabaseIntegration(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceIntegrationCreate([
        'type' => DatabaseServiceIntegration::Logs->value,
        'destinationUuid' => '09e86f48-2dcd-4a43-843d-3532ab112c1d',
        'properties' => [
            'opensearch_index_days_max' => 30,
            'opensearch_index_prefix' => "mysql_logs",
        ],
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$type:** `string`

**$destinationUuid:** `?string` — The UUID of the destination where the service integration will send data.

**$properties:** `?array`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseIntegration($uuid, $integrationUuid) -> DatabaseServiceIntegrationResponse</code></summary>

#### Description

Returns integration details by given {service-uuid} and {integration-uuid}.

#### Usage

```php
$client->database->getDatabaseIntegration(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$integrationUuid:** `string` — Integration UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseIntegration($uuid, $integrationUuid)</code></summary>

#### Description

Deletes existing integration by given {service-uuid} and {integration-uuid}.

#### Usage

```php
$client->database->deleteDatabaseIntegration(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$integrationUuid:** `string` — Integration UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseIntegration($uuid, $integrationUuid, $request) -> DatabaseServiceIntegrationResponse</code></summary>

#### Description

Modifies existing integration by given {service-uuid} and {integration-uuid}.

#### Usage

```php
$client->database->modifyDatabaseIntegration(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceIntegrationModify([
        'properties' => [
            'key1' => "value1",
        ],
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$integrationUuid:** `string` — Integration UUID

**$properties:** `?array`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseLogicalDatabases($uuid) -> array</code></summary>

#### Description

Returns a list of logical databases for a Managed Database service identified by {uuid}.

#### Usage

```php
$client->database->listDatabaseLogicalDatabases(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseLogicalDatabase($uuid, $request) -> LogicalDatabaseResponse</code></summary>

#### Description

Creates a new logical database for the Managed Database service {uuid}.

#### Usage

```php
$client->database->createDatabaseLogicalDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    new LogicalDatabaseCreate([
        'name' => 'my_database',
        'lcCollate' => 'en_US.UTF-8',
        'lcCtype' => 'en_US.UTF-8',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$name:** `string` — logical database name

**$lcCollate:** `?string` — Collation order

**$lcCtype:** `?string` — Category of a locale definition source file

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseLogicalDatabase($uuid, $databaseName)</code></summary>

#### Description

Deletes the logical database {database_name} from the Managed Database service {uuid}.

#### Usage

```php
$client->database->deleteDatabaseLogicalDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$databaseName:** `string` — Database name

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabasePeeringsStatus($uuid) -> DatabaseServiceNetworkDetailsResponse</code></summary>

#### Description

Returns networks peering status for a service by its {uuid}. Only available for services using SDN private networks.

#### Usage

```php
$client->database->getDatabasePeeringsStatus(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseSessions($uuid, $request) -> DatabaseCurrentSessionsResponse</code></summary>

#### Description

Returns a list of current sessions details for your Managed Database service by its {uuid} and optional query parameters {limit}, {offset} and {order}.

#### Usage

```php
$client->database->getDatabaseSessions(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GetDatabaseSessionsRequest([
        'limit' => 10,
        'offset' => 0,
        'order' => 'asc',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$order:** `?string` — Sort order

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;terminateDatabaseSession($uuid, $pid) -> DatabaseTerminateSessionResponse</code></summary>

#### Description

Terminates a sessions or kills a running query for a Managed Database service by its {uuid}, session {pid} and optional query parameter {terminate}.

#### Usage

```php
$client->database->terminateDatabaseSession(
    '01234567-89ab-cdef-0123-456789abcdef',
    1001,
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$pid:** `int` — Session PID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseTask($uuid, $request) -> DatabaseServiceTaskResponse</code></summary>

#### Description

Creates a task that checks for potential errors before starting a migration or upgrade for a Managed Database service by its {uuid}.

#### Usage

```php
$client->database->createDatabaseTask(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceTaskCreate([
        'datasetImport' => new DatabaseServiceTaskCreateDatasetImport([
            'datasetName' => 'customer-events',
        ]),
        'operation' => 'dataset_import',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$datasetImport:** `?DatabaseServiceTaskCreateDatasetImport`

**$migrationCheck:** `?DatabaseServiceTaskCreateMigrationCheck`

**$upgradeCheck:** `?DatabaseServiceTaskCreateUpgradeCheck`

**$targetVersion:** `?string` — The target version for upgrade operations.

**$operation:** `string` — The operation to be performed.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseTask($uuid, $taskId) -> DatabaseServiceTaskDetailsResponse</code></summary>

#### Description

Returns task details of a Managed Database service by its {uuid} and the task {id} obtained from Create Managed Database task.

#### Usage

```php
$client->database->getDatabaseTask(
    '01234567-89ab-cdef-0123-456789abcdef',
    1001,
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$taskId:** `int` — Task ID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;listDatabaseUsers($uuid) -> array</code></summary>

#### Description

Returns a list of database users associated with the Managed Database service {uuid}.

#### Usage

```php
$client->database->listDatabaseUsers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;createDatabaseUser($uuid, $request) -> DatabaseUserResponse</code></summary>

#### Description

Creates a new user for the Managed Database service {uuid}.

#### Usage

```php
$client->database->createDatabaseUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceUserCreate([
        'username' => 'api-doc-user',
        'password' => 'new-password',
        'authentication' => 'caching_sha2_password',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$username:** `string` — The username of the service user

**$password:** `?string` — The password of the service user

**$authentication:** `?string` — The authentication method for the service user

**$redisAccessControl:** `?DatabaseServiceUserCreateRedisAccessControl` — Redis access control settings

**$pgAccessControl:** `?DatabaseServiceUserCreatePgAccessControl` — PostgreSQL access control settings

**$opensearchAccessControl:** `?DatabaseServiceUserCreateOpensearchAccessControl` — OpenSearch access control settings

**$valkeyAccessControl:** `?DatabaseServiceUserCreateValkeyAccessControl` — Valkey access control settings

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;getDatabaseUser($uuid, $username) -> DatabaseUserResponse</code></summary>

#### Description

Returns the user {username} details for the Managed Database service {uuid}.

#### Usage

```php
$client->database->getDatabaseUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$username:** `string` — Username identifier

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;deleteDatabaseUser($uuid, $username)</code></summary>

#### Description

Deletes the user {username} from the Managed Database service {uuid}.

#### Usage

```php
$client->database->deleteDatabaseUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$username:** `string` — Username identifier

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseUser($uuid, $username, $request) -> DatabaseUserResponse</code></summary>

#### Description

Modifies the user {username} details for the Managed Database service {uuid}.

#### Usage

```php
$client->database->modifyDatabaseUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
    new DatabaseServiceUserModify([
        'password' => 'new_secure_password_123!',
        'authentication' => 'caching_sha2_password',
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$username:** `string` — Username identifier

**$password:** `?string` — New password for the service user

**$authentication:** `?string` — Authentication method for the service user

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;database-&gt;modifyDatabaseUserAccessControl($uuid, $username, $request) -> DatabaseUserResponse</code></summary>

#### Description

Return access controls settings for the OpenSearch Managed Database service {uuid}.

#### Usage

```php
$client->database->modifyDatabaseUserAccessControl(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
    new DatabaseServiceUserAclModify([
        'redisAccessControl' => new DatabaseServiceUserAclModifyRedisAccessControl([
            'categories' => [
                '@admin',
                '@read',
            ],
            'channels' => [
                'news',
                'alerts',
            ],
            'commands' => [
                'GET',
                'SET',
            ],
            'keys' => [
                'user:*',
                'session:*',
            ],
        ]),
        'pgAccessControl' => new DatabaseServiceUserAclModifyPgAccessControl([
            'allowReplication' => true,
        ]),
        'opensearchAccessControl' => new DatabaseServiceUserAclModifyOpensearchAccessControl([
            'rules' => [
                new DatabaseServiceUserAclModifyOpensearchAccessControlRulesItem([
                    'index' => 'logs-*',
                    'permission' => 'read',
                ]),
            ],
        ]),
        'valkeyAccessControl' => new DatabaseServiceUserAclModifyValkeyAccessControl([
            'categories' => [
                '@write',
            ],
            'channels' => [
                'updates',
            ],
            'commands' => [
                'DEL',
            ],
            'keys' => [
                'cache:*',
            ],
        ]),
    ]),
);
```

#### Parameters

**$uuid:** `string` — Service UUID

**$username:** `string` — Username identifier

**$redisAccessControl:** `?DatabaseServiceUserAclModifyRedisAccessControl` — Redis ACL modification schema

**$pgAccessControl:** `?DatabaseServiceUserAclModifyPgAccessControl` — PostgreSQL replication permission modification schema

**$opensearchAccessControl:** `?DatabaseServiceUserAclModifyOpensearchAccessControl` — OpenSearch index permission modification schema

**$valkeyAccessControl:** `?DatabaseServiceUserAclModifyValkeyAccessControl` — Valkey ACL modification schema

</details>

## load-balancer
{:#load-balancerAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancers($request) -> array</code></summary>

#### Description

Returns a list of available load balancer services.

#### Usage

```php
$client->loadBalancer->listLoadBalancers(
    new ListLoadBalancersRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$sort:** `?string` — Sort resources by field. Prefix with '-' for descending order.

**$label:** `?string` — Filter resources by label. Can be provided multiple times for multiple labels. Format: 'key=value' for exact match or 'key' for existence check.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancer($request) -> LoadBalancerService</code></summary>

#### Description

Creates a new load balancer service.

#### Usage

```php
$client->loadBalancer->createLoadBalancer(
    new LoadBalancerServiceCreate([
        'name' => 'my-loadbalancer',
        'zone' => 'fi-hel1',
        'plan' => 'production-small',
        'configuredStatus' => LoadBalancerServiceConfiguredStatus::Started->value,
        'frontends' => [
            new LoadBalancerFrontendCreate([
                'name' => 'my-frontend',
                'port' => 80,
                'mode' => LoadBalancerFrontendMode::Http->value,
                'defaultBackend' => 'my-backend',
            ]),
        ],
    ]),
);
```

#### Parameters

**$name:** `string` — Name of the service

**$zone:** `string` — Zone

**$plan:** `string` — Plan

**$configuredStatus:** `string`

**$frontends:** `array` — Service frontends

**$backends:** `?array` — Service backends

**$resolvers:** `?array` — Service resolvers

**$networkUuid:** `?string` — Private Network UUID

**$networks:** `?array` — Service networks

**$labels:** `?array` — Labels

**$maintenanceDow:** `?string`

**$maintenanceTime:** `?string`

**$ipAddresses:** `?array` — List of IP addresses for the network

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancer($serviceUuid) -> LoadBalancerService</code></summary>

#### Description

Returns load balancer service details by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->getLoadBalancer(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;replaceLoadBalancer($serviceUuid, $request) -> LoadBalancerService</code></summary>

#### Description

Replaces existing load balancer service by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->replaceLoadBalancer(
    '01234567-89ab-cdef-0123-456789abcdef',
    new LoadBalancerServiceReplace([
        'name' => 'my-loadbalancer',
        'plan' => 'production',
        'configuredStatus' => LoadBalancerServiceConfiguredStatus::Started->value,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$name:** `string` — Name of the service

**$plan:** `string` — Plan

**$configuredStatus:** `string`

**$frontends:** `?array` — Service frontends

**$backends:** `?array` — Service backends

**$resolvers:** `?array` — Service resolvers

**$labels:** `?array` — Labels

**$maintenanceDow:** `?string`

**$maintenanceTime:** `?string`

**$ipAddresses:** `?array` — List of IP addresses for the network

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancer($serviceUuid)</code></summary>

#### Description

Deletes existing load balancer service by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancer(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancer($serviceUuid, $request) -> LoadBalancerService</code></summary>

#### Description

Modifies existing load balancer service by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancer(
    '01234567-89ab-cdef-0123-456789abcdef',
    new LoadBalancerServiceModify([
        'name' => 'updated-loadbalancer',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$name:** `?string` — Name of the service

**$plan:** `?string` — Plan

**$configuredStatus:** `?string`

**$frontends:** `?array` — Service frontends

**$backends:** `?array` — Service backends

**$resolvers:** `?array` — Service resolvers

**$labels:** `?array` — Labels

**$maintenanceDow:** `?string`

**$maintenanceTime:** `?string`

**$ipAddresses:** `?array` — List of IP addresses for the network

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerFrontends($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service frontends by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerFrontends(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerFrontend($serviceUuid, $request) -> LoadBalancerFrontend</code></summary>

#### Description

Creates a new service frontend by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->createLoadBalancerFrontend(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateLoadBalancerFrontendRequest([
        'body' => new LoadBalancerFrontendCreate([
            'name' => 'my-frontend',
            'port' => 80,
            'mode' => LoadBalancerFrontendMode::Http->value,
            'defaultBackend' => 'my-backend',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$request:** `LoadBalancerFrontendCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontend($serviceUuid, $frontendName) -> LoadBalancerFrontend</code></summary>

#### Description

Returns service frontend details by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerFrontend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerFrontend($serviceUuid, $frontendName)</code></summary>

#### Description

Deletes existing frontend by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerFrontend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerFrontend($serviceUuid, $frontendName, $request) -> LoadBalancerFrontend</code></summary>

#### Description

Modifies existing service frontend by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerFrontend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    new LoadBalancerFrontendModify([
        'name' => 'updated-frontend',
        'port' => 443,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$name:** `?string` — Name of the frontend

**$port:** `?int` — Port to listen

**$mode:** `?string`

**$defaultBackend:** `?string` — Default backend

**$properties:** `?LoadBalancerFrontendPropertiesCreate`

**$networks:** `?array` — Network names

**$tlsConfigs:** `?array` — TLS Configs

**$rules:** `?array` — Rules

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerFrontendTlsConfigs($serviceUuid, $frontendName) -> array</code></summary>

#### Description

Returns a list of available frontend TLS configs by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerFrontendTlsConfigs(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $request) -> LoadBalancerTlsConfig</code></summary>

#### Description

Creates a new TLS config by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->createLoadBalancerFrontendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    new CreateLoadBalancerFrontendTlsConfigRequest([
        'body' => new LoadBalancerTlsConfigCreate([
            'name' => 'tls-config-1',
            'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$request:** `LoadBalancerTlsConfigCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $tlsConfigName) -> LoadBalancerTlsConfig</code></summary>

#### Description

Returns frontend TLS config details by given {service-uuid}, {frontend-name}, and {tls-config-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerFrontendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-tls-config-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $tlsConfigName)</code></summary>

#### Description

Deletes existing TLS config by given {service-uuid}, {frontend-name}, and {tls-config-name}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerFrontendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-tls-config-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $tlsConfigName, $request) -> LoadBalancerTlsConfig</code></summary>

#### Description

Modifies existing TLS config by given {service-uuid}, {frontend-name}, and {tls-config-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerFrontendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-tls-config-1',
    new ModifyLoadBalancerFrontendTlsConfigRequest([
        'body' => new LoadBalancerTlsConfigModify([
            'name' => 'tls-config-1',
            'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

**$request:** `LoadBalancerTlsConfigModify`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerRules($serviceUuid, $frontendName) -> array</code></summary>

#### Description

Returns a list of available frontend rules by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerRules(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerRule($serviceUuid, $frontendName, $request) -> LoadBalancerRule</code></summary>

#### Description

Creates a new rule by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->createLoadBalancerRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    new CreateLoadBalancerRuleRequest([
        'body' => new LoadBalancerRuleCreate([
            'name' => 'my-rule',
            'priority' => 10,
            'matchingCondition' => LoadBalancerMatchingCondition::And_->value,
            'matchers' => [
                new LoadBalancerMatcherCreateMatchSrcIp([
                    'type' => LoadBalancerMatcherCreateMatchSrcIpType::SrcIp->value,
                    'matchSrcIp' => new LoadBalancerMatcherIpCreate([
                        'value' => '192.168.1.1',
                    ]),
                ]),
            ],
            'actions' => [
                new LoadBalancerActionCreateActionUseBackend([
                    'type' => LoadBalancerActionCreateActionUseBackendType::UseBackend->value,
                    'actionUseBackend' => new LoadBalancerActionUseBackendCreate([
                        'backend' => 'backend-1',
                    ]),
                ]),
            ],
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$request:** `LoadBalancerRuleCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerRule($serviceUuid, $frontendName, $ruleName) -> LoadBalancerRule</code></summary>

#### Description

Returns frontend rule details by given {service-uuid}, {frontend-name}, and {rule-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-rule-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$ruleName:** `string` — The unique identifier for the rule.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;replaceLoadBalancerRule($serviceUuid, $frontendName, $ruleName, $request) -> LoadBalancerRule</code></summary>

#### Description

Replaces existing rule by given {service-uuid}, {frontend-name}, and {rule-name}.

#### Usage

```php
$client->loadBalancer->replaceLoadBalancerRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-rule-1',
    new ReplaceLoadBalancerRuleRequest([
        'body' => new LoadBalancerRuleCreate([
            'name' => 'my-rule',
            'priority' => 10,
            'matchingCondition' => LoadBalancerMatchingCondition::And_->value,
            'matchers' => [
                new LoadBalancerMatcherCreateMatchSrcIp([
                    'type' => LoadBalancerMatcherCreateMatchSrcIpType::SrcIp->value,
                    'matchSrcIp' => new LoadBalancerMatcherIpCreate([
                        'value' => '192.168.1.1',
                    ]),
                ]),
            ],
            'actions' => [
                new LoadBalancerActionCreateActionUseBackend([
                    'type' => LoadBalancerActionCreateActionUseBackendType::UseBackend->value,
                    'actionUseBackend' => new LoadBalancerActionUseBackendCreate([
                        'backend' => 'backend-1',
                    ]),
                ]),
            ],
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$ruleName:** `string` — The unique identifier for the rule.

**$request:** `LoadBalancerRuleCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerRule($serviceUuid, $frontendName, $ruleName)</code></summary>

#### Description

Deletes existing rule by given {service-uuid}, {frontend-name}, and {rule-name}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-rule-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$ruleName:** `string` — The unique identifier for the rule.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerRule($serviceUuid, $frontendName, $ruleName, $request) -> LoadBalancerRule</code></summary>

#### Description

Modifies existing rule by given {service-uuid}, {frontend-name}, and {rule-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-rule-1',
    new LoadBalancerRuleModify([
        'name' => 'updated-rule',
        'priority' => 10,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$ruleName:** `string` — The unique identifier for the rule.

**$name:** `?string` — Name of the rule

**$priority:** `?int` — Priority

**$matchingCondition:** `?string`

**$matchers:** `?array` — Rule matchers

**$actions:** `?array` — Rule actions

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerBackends($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service backends by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerBackends(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerBackend($serviceUuid, $request) -> LoadBalancerBackend</code></summary>

#### Description

Creates a new backend by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->createLoadBalancerBackend(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateLoadBalancerBackendRequest([
        'body' => new LoadBalancerBackendCreate([
            'name' => 'my-backend',
            'members' => [
                new LoadBalancerMemberCreateZero([
                    'type' => LoadBalancerMemberCreateZeroType::Static_->value,
                    'ip' => 'ip',
                    'port' => 1,
                ]),
            ],
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$request:** `LoadBalancerBackendCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackend($serviceUuid, $backendName) -> LoadBalancerBackend</code></summary>

#### Description

Returns service backend details by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerBackend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerBackend($serviceUuid, $backendName)</code></summary>

#### Description

Deletes existing backend by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerBackend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerBackend($serviceUuid, $backendName, $request) -> LoadBalancerBackend</code></summary>

#### Description

Modifies existing backend by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerBackend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new LoadBalancerBackendModify([
        'name' => 'updated-backend',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$name:** `?string` — Name of the backend

**$members:** `?array` — Backend members

**$tlsConfigs:** `?array` — TLS Configs

**$resolver:** `?string` — Resolver reference

**$properties:** `?LoadBalancerBackendPropertiesCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerMembers($serviceUuid, $backendName) -> array</code></summary>

#### Description

Returns a list of available backend members by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerMembers(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerMember($serviceUuid, $backendName, $request) -> LoadBalancerMember</code></summary>

#### Description

Creates a new member by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->createLoadBalancerMember(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new CreateLoadBalancerMemberRequest([
        'body' => new LoadBalancerMemberCreateZero([
            'type' => LoadBalancerMemberCreateZeroType::Static_->value,
            'ip' => 'ip',
            'port' => 1,
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$request:** `LoadBalancerMemberCreateZero|LoadBalancerMemberCreateOne`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMember($serviceUuid, $backendName, $memberName) -> LoadBalancerMember</code></summary>

#### Description

Returns backend member details by given {service-uuid}, {backend-name} and {member-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerMember(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'dev-member',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$memberName:** `string` — The unique identifier for the member.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerMember($serviceUuid, $backendName, $memberName)</code></summary>

#### Description

Deletes existing member by given {service-uuid}, {backend-name} and {member-name}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerMember(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'dev-member',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$memberName:** `string` — The unique identifier for the member.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerMember($serviceUuid, $backendName, $memberName, $request) -> LoadBalancerMember</code></summary>

#### Description

Modifies existing member by given {service-uuid}, {backend-name} and {member-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerMember(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'dev-member',
    new ModifyLoadBalancerMemberRequest([
        'body' => new LoadBalancerMemberModifyZero([]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$memberName:** `string` — The unique identifier for the member.

**$request:** `LoadBalancerMemberModifyZero|LoadBalancerMemberModifyOne`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerBackendTlsConfigs($serviceUuid, $backendName) -> array</code></summary>

#### Description

Returns a list of available backend TLS configs by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerBackendTlsConfigs(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $request) -> LoadBalancerTlsConfig</code></summary>

#### Description

Creates a new TLS config by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->createLoadBalancerBackendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new CreateLoadBalancerBackendTlsConfigRequest([
        'body' => new LoadBalancerTlsConfigCreate([
            'name' => 'tls-config-1',
            'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$request:** `LoadBalancerTlsConfigCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $tlsConfigName) -> LoadBalancerTlsConfig</code></summary>

#### Description

Returns backend TLS config details by given {service-uuid}, {backend-name}, and {tls-config-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerBackendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'example-tls-config-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $tlsConfigName)</code></summary>

#### Description

Deletes existing TLS config by given {service-uuid}, {backend-name}, and {tls-config-name}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerBackendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'example-tls-config-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $tlsConfigName, $request) -> LoadBalancerTlsConfig</code></summary>

#### Description

Modifies existing TLS config by given {service-uuid}, {backend-name}, and {tls-config-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerBackendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'example-tls-config-1',
    new ModifyLoadBalancerBackendTlsConfigRequest([
        'body' => new LoadBalancerTlsConfigModify([
            'name' => 'tls-config-1',
            'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

**$request:** `LoadBalancerTlsConfigModify`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerNetwork($serviceUuid, $networkName, $request) -> LoadBalancerNetwork</code></summary>

#### Description

Modifies existing service network by given {service-uuid} and {network-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-network-1',
    new LoadBalancerNetworkModify([
        'name' => 'updated-network',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$networkName:** `string` — The unique identifier for the network.

**$name:** `?string` — Name of the network

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerIpAddresses($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available IP addresses by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerIpAddresses(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerIpAddress($serviceUuid, $request) -> LoadBalancerIpAddress</code></summary>

#### Description

Attach a floating public IPv4 address to the service using the specified {service-uuid}. The number of attachable floating IPv4 addresses is limited to the number of nodes in the plan, and all addresses must be in the same zone as the service and detached.

Note: Floating public IPv4 addresses have configurable release policies. When the service is deleted or an IP address is detached, addresses with the keep policy will be converted to detached floating IPs that remain available in your account. Addresses with the release policy will be automatically deleted. For more details, see IP Addresses.

#### Usage

```php
$client->loadBalancer->createLoadBalancerIpAddress(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateLoadBalancerIpAddressRequest([
        'body' => new LoadBalancerIpAddressCreate([
            'address' => '192.168.1.10',
            'networkName' => 'private-net-1',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$request:** `LoadBalancerIpAddressCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerIpAddress($serviceUuid, $ipAddress) -> array</code></summary>

#### Description

Returns IP address details by given {service-uuid} and {ip-address}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerIpAddress(
    '01234567-89ab-cdef-0123-456789abcdef',
    '192.168.1.1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$ipAddress:** `string` — The unique identifier for the IP address.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerIpAddress($serviceUuid, $ipAddress)</code></summary>

#### Description

Detach a floating public IPv4 address from the service by given {service-uuid} and {address}.
				Depending on the release policy, the customer retains the floating IP if the policy is set to keep.
				If the policy is set to release, the floating IP will be deleted.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerIpAddress(
    '01234567-89ab-cdef-0123-456789abcdef',
    '192.168.1.1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$ipAddress:** `string` — The unique identifier for the IP address.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerResolvers($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service domain name resolvers by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerResolvers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerResolver($serviceUuid, $request) -> LoadBalancerResolver</code></summary>

#### Description

Creates a new resolver by given {service-uuid}.

Resolver is a DNS server usually residing in a user's private network. It's used to resolve IPs for backend members of type dynamic.

#### Usage

```php
$client->loadBalancer->createLoadBalancerResolver(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateLoadBalancerResolverRequest([
        'body' => new LoadBalancerResolverCreate([
            'name' => 'default-resolver',
            'nameservers' => [
                '1.1.1.1:53',
                '8.8.8.8:53',
            ],
            'retries' => 3,
            'timeout' => 5,
            'timeoutRetry' => 3,
            'cacheValid' => 300,
            'cacheInvalid' => 60,
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$request:** `LoadBalancerResolverCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerResolver($serviceUuid, $resolverName) -> LoadBalancerResolver</code></summary>

#### Description

Returns backend resolver details by given {service-uuid} and {resolver-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerResolver(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-resolver-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$resolverName:** `string` — The unique identifier for the resolver.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerResolver($serviceUuid, $resolverName)</code></summary>

#### Description

Deletes existing resolver by given {service-uuid} and {resolver-name}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerResolver(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-resolver-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$resolverName:** `string` — The unique identifier for the resolver.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerResolver($serviceUuid, $resolverName, $request) -> LoadBalancerResolver</code></summary>

#### Description

Modifies existing resolver by given {service-uuid} and {resolver-name}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerResolver(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-resolver-1',
    new LoadBalancerResolverModify([
        'name' => 'default-resolver',
        'nameservers' => [
            '1.1.1.1:53',
            '8.8.8.8:53',
        ],
        'retries' => 3,
        'timeout' => 5,
        'timeoutRetry' => 3,
        'cacheValid' => 300,
        'cacheInvalid' => 60,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$resolverName:** `string` — The unique identifier for the resolver.

**$name:** `?string` — Name of the resolver

**$nameservers:** `?array` — Nameservers

**$retries:** `?int` — Number of retries on failure

**$timeout:** `?int` — Timeout for the query in seconds

**$timeoutRetry:** `?int` — Timeout for the query retries in seconds

**$cacheValid:** `?int` — Time in seconds to cache valid results

**$cacheInvalid:** `?int` — Time in seconds to cache invalid results

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerLabels($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service labels by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerLabel($serviceUuid, $request) -> LoadBalancerLabelResponse</code></summary>

#### Description

Creates a new label by given {service-uuid}.

Labels used for service filtering.

Service labels usage examples
Below are some examples of what certain GET requests might look like.

exact match: GET /1.3/load-balancer?label=env%3Dstaging
existence: GET /1.3/load-balancer?label=env
multiple: GET /1.3/load-balancer?label=env&label=foo%3Dbar

#### Usage

```php
$client->loadBalancer->createLoadBalancerLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateLoadBalancerLabelRequest([
        'body' => new LoadBalancerLabelCreate([
            'key' => 'environment',
            'value' => 'production',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$request:** `LoadBalancerLabelCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerLabel($serviceUuid, $labelKey) -> LoadBalancerLabelResponse</code></summary>

#### Description

Returns label details by given {service-uuid} and {label-key}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$labelKey:** `string` — The unique identifier for the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerLabel($serviceUuid, $labelKey)</code></summary>

#### Description

Deletes existing label by given {service-uuid} and {label-key}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$labelKey:** `string` — The unique identifier for the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerLabel($serviceUuid, $labelKey, $request) -> LoadBalancerLabelResponse</code></summary>

#### Description

Modifies existing label by given {service-uuid} and {label-key}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
    new ModifyLoadBalancerLabelRequest([
        'body' => new LoadBalancerLabelModify([
            'key' => 'environment',
            'value' => 'production',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$labelKey:** `string` — The unique identifier for the label.

**$request:** `LoadBalancerLabelModify`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMetrics($serviceUuid) -> LoadBalancerMetrics</code></summary>

#### Description

Returns service metrics by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMetricsSeries($serviceUuid) -> array</code></summary>

#### Description

Returns service metric series by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontendCombinedMetricsSeries($serviceUuid, $request) -> array</code></summary>

#### Description

Returns combined frontend metric series by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerFrontendCombinedMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GetLoadBalancerFrontendCombinedMetricsSeriesRequest([]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontendMetricsSeries($serviceUuid, $frontendName, $request) -> array</code></summary>

#### Description

Returns frontend metric series by given {service-uuid} and {frontend-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerFrontendMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    new GetLoadBalancerFrontendMetricsSeriesRequest([]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$frontendName:** `string` — The unique identifier for the frontend.

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackendCombinedMetricsSeries($serviceUuid, $request) -> array</code></summary>

#### Description

Returns combined backend metric series by given {service-uuid}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerBackendCombinedMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GetLoadBalancerBackendCombinedMetricsSeriesRequest([]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackendMetricsSeries($serviceUuid, $backendName, $request) -> array</code></summary>

#### Description

Returns backend metric series by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerBackendMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new GetLoadBalancerBackendMetricsSeriesRequest([]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMemberCombinedMetricsSeries($serviceUuid, $backendName, $request) -> LoadBalancerMemberMetricsSeriesResponse</code></summary>

#### Description

Returns combined backend members metric series by given {service-uuid} and {backend-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerMemberCombinedMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new GetLoadBalancerMemberCombinedMetricsSeriesRequest([]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMemberMetricsSeries($serviceUuid, $backendName, $memberName, $request) -> LoadBalancerMemberMetricsSeriesResponse</code></summary>

#### Description

Returns backend member metric series by given {service-uuid}, {backend-name}, and {member-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerMemberMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'dev-member',
    new GetLoadBalancerMemberMetricsSeriesRequest([]),
);
```

#### Parameters

**$serviceUuid:** `string` — The unique identifier for the service.

**$backendName:** `string` — The unique identifier for the backend.

**$memberName:** `string` — The unique identifier for the member.

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerCertificateBundles($request) -> array</code></summary>

#### Description

Returns a list of available certificate bundles.

#### Usage

```php
$client->loadBalancer->listLoadBalancerCertificateBundles(
    new ListLoadBalancerCertificateBundlesRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$label:** `?string` — Filter resources by label. Can be provided multiple times for multiple labels. Format: 'key=value' for exact match or 'key' for existence check.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerCertificateBundle($request) -> LoadBalancerCertificateBundle</code></summary>

#### Description

Creates a new certificate bundle.

#### Usage

```php
$client->loadBalancer->createLoadBalancerCertificateBundle(
    new LoadBalancerCertificateBundleCreateZero([
        'type' => LoadBalancerCertificateBundleCreateZeroType::Manual->value,
    ]),
);
```

#### Parameters

**$request:** `LoadBalancerCertificateBundleCreateZero|LoadBalancerCertificateBundleCreateCertificate|LoadBalancerCertificateBundleCreateType`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerCertificateBundle($bundleUuid) -> LoadBalancerCertificateBundle</code></summary>

#### Description

Returns certificate bundle details by given {bundle-uuid}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerCertificateBundle(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerCertificateBundle($bundleUuid)</code></summary>

#### Description

Deletes existing certificate bundle by given {bundle-uuid}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerCertificateBundle(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerCertificateBundle($bundleUuid, $request) -> LoadBalancerCertificateBundle</code></summary>

#### Description

Modifies existing a manual, dynamic or authority certificate bundle by given {bundle-uuid}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerCertificateBundle(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ModifyLoadBalancerCertificateBundleRequest([
        'body' => new LoadBalancerCertificateBundleManualModify([
            'name' => 'updated-manual-cert',
        ]),
    ]),
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

**$request:** `LoadBalancerCertificateBundleManualModify|LoadBalancerCertificateBundleDynamicModify|LoadBalancerCertificateBundleAuthorityModify`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerCertificateBundleLabels($bundleUuid) -> array</code></summary>

#### Description

Returns a list of available certificate bundle labels by given {bundle-uuid}.

#### Usage

```php
$client->loadBalancer->listLoadBalancerCertificateBundleLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;createLoadBalancerCertificateBundleLabel($bundleUuid, $request) -> LoadBalancerLabelResponse</code></summary>

#### Description

Creates a new label by given {bundle-uuid}.

Labels used for certificate bundles filtering.

Certificate bundle labels usage examples
Below are some examples of what certain GET requests might look like.

exact match: GET /1.3/load-balancer/certificate-bundles?label=env%3Dstaging
existence: GET /1.3/load-balancer/certificate-bundles?label=env
multiple: GET /1.3/load-balancer/certificate-bundles?label=env&label=foo%3Dbar

#### Usage

```php
$client->loadBalancer->createLoadBalancerCertificateBundleLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateLoadBalancerCertificateBundleLabelRequest([
        'body' => new LoadBalancerLabelCreate([
            'key' => 'environment',
            'value' => 'production',
        ]),
    ]),
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

**$request:** `LoadBalancerLabelCreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerCertificateBundleLabel($bundleUuid, $labelKey) -> LoadBalancerLabelResponse</code></summary>

#### Description

Returns label details by given {bundle-uuid} and {label-key}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerCertificateBundleLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

**$labelKey:** `string` — The unique identifier for the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerCertificateBundleLabel($bundleUuid, $labelKey)</code></summary>

#### Description

Deletes existing label by given {bundle-uuid} and {label-key}.

#### Usage

```php
$client->loadBalancer->deleteLoadBalancerCertificateBundleLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

**$labelKey:** `string` — The unique identifier for the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerCertificateBundleLabel($bundleUuid, $labelKey, $request) -> LoadBalancerLabelResponse</code></summary>

#### Description

Modifies existing label by given {bundle-uuid} and {label-key}.

#### Usage

```php
$client->loadBalancer->modifyLoadBalancerCertificateBundleLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
    new ModifyLoadBalancerCertificateBundleLabelRequest([
        'body' => new LoadBalancerLabelModify([
            'key' => 'environment',
            'value' => 'production',
        ]),
    ]),
);
```

#### Parameters

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

**$labelKey:** `string` — The unique identifier for the label.

**$request:** `LoadBalancerLabelModify`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerDnsChallengeDomain() -> LoadBalancerDnsChallengeDomainResponse</code></summary>

#### Description

Returns DNS challenge domain.

This can be used to validate domain ownership using the ACME challenge method. To validate your domain, you need to add CNAME record to the domain provided by this API to your DNS settings. The name/host of the CNAME record should be _acme-challenge or _acme-challenge.mysubdomain if you are setting up a subdomain called mysubdomain. The target/points to of the record needs to be set to the value returned by this API.

#### Usage

```php
$client->loadBalancer->getLoadBalancerDnsChallengeDomain();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;listLoadBalancerPlans($request) -> array</code></summary>

#### Description

Returns a list of available load balancer plans.

#### Usage

```php
$client->loadBalancer->listLoadBalancerPlans(
    new ListLoadBalancerPlansRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```

#### Parameters

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;loadBalancer-&gt;getLoadBalancerPlan($planName) -> LoadBalancerPlan</code></summary>

#### Description

Returns load balancer plan details by given {plan-name}.

#### Usage

```php
$client->loadBalancer->getLoadBalancerPlan(
    'example-plan-1',
);
```

#### Parameters

**$planName:** `string` — The unique identifier for the plan.

</details>

## firewall-ruleset
{:#firewall-rulesetAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;listFirewallRulesets($request) -> array</code></summary>

#### Description

Returns a list of firewall rulesets.

#### Usage

```php
$client->firewallRuleset->listFirewallRulesets(
    new ListFirewallRulesetsRequest([
        'limit' => 10,
        'offset' => 0,
        'sort' => 'name',
    ]),
);
```

#### Parameters

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$sort:** `?string` — Order of returned results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;createFirewallRuleset($request) -> FirewallRulesetDetailResponse</code></summary>

#### Description

Creates a new firewall rulesets.

#### Usage

```php
$client->firewallRuleset->createFirewallRuleset(
    new CreateFirewallRuleset([
        'name' => 'example_firewall_ruleset',
        'stateful' => true,
        'enabled' => false,
        'defaultDnsRulesEnabled' => false,
    ]),
);
```

#### Parameters

**$uuid:** `?string`

**$name:** `string` — Name of the firewall ruleset

**$description:** `?string` — Description of the firewall ruleset

**$stateful:** `?bool`

**$enabled:** `?bool`

**$defaultDnsRulesEnabled:** `?bool`

**$labels:** `?array` — Labels

**$serverUuid:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;getFirewallRuleset($rulesetUuid) -> FirewallRulesetDetailResponse</code></summary>

#### Description

Returns firewall ruleset details by given {ruleset-uuid}.

#### Usage

```php
$client->firewallRuleset->getFirewallRuleset(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;deleteFirewallRuleset($rulesetUuid)</code></summary>

#### Description

Deletes existing firewall ruleset by given {ruleset-uuid}.

#### Usage

```php
$client->firewallRuleset->deleteFirewallRuleset(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;modifyFirewallRuleset($rulesetUuid, $request) -> FirewallRulesetDetailResponse</code></summary>

#### Description

Modifies existing firewall ruleset by given {ruleset-uuid}.

#### Usage

```php
$client->firewallRuleset->modifyFirewallRuleset(
    '01234567-89ab-cdef-0123-456789abcdef',
    new FirewallRulesetModify([
        'name' => 'modified_example_firewall_ruleset',
        'description' => 'Modified example stateless firewall ruleset',
        'labels' => [
            new FirewallRulesetCreateLabel([
                'key' => 'dev',
                'value' => 'dev-1',
            ]),
        ],
        'enabled' => false,
    ]),
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$name:** `?string` — Name of the ruleset

**$description:** `?string` — Description of the firewall ruleset

**$labels:** `?array` — Labels

**$enabled:** `?bool` — Enabled

**$defaultDnsRulesEnabled:** `?bool`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;restoreFirewallRuleset($rulesetUuid, $rulesetVersion) -> FirewallRulesetDetailResponse</code></summary>

#### Description

Restores existing firewall ruleset by given {ruleset-uuid} and {ruleset-version}.

#### Usage

```php
$client->firewallRuleset->restoreFirewallRuleset(
    '01234567-89ab-cdef-0123-456789abcdef',
    1000000,
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$rulesetVersion:** `int` — Firewall ruleset version

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;listFirewallRulesetRules($rulesetUuid, $request) -> array</code></summary>

#### Description

Returns firewall ruleset rules.

#### Usage

```php
$client->firewallRuleset->listFirewallRulesetRules(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListFirewallRulesetRulesRequest([
        'limit' => 10,
        'offset' => 0,
        'sort' => 'name',
    ]),
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$sort:** `?string` — Order of returned results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;createFirewallRulesetRule($rulesetUuid, $request) -> FirewallRulesetRuleDetailResponse</code></summary>

#### Description

Creates a new firewall ruleset rule by the given {ruleset-uuid}.

#### Usage

```php
$client->firewallRuleset->createFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    new FirewallRulesetFirewallRuleCreate([
        'enabled' => false,
        'action' => "accept",
        'direction' => "in",
        'family' => "IPv4",
        'protocol' => "tcp",
    ]),
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$uuid:** `?string`

**$enabled:** `?bool` — Enabled

**$action:** `mixed`

**$comment:** `?string` — Comments

**$destinationAddressStart:** `?string`

**$destinationAddressEnd:** `?string`

**$destinationPortStart:** `?int`

**$destinationPortEnd:** `?int`

**$destinationAddressCidr:** `?string`

**$direction:** `mixed`

**$family:** `mixed`

**$icmpType:** `?int`

**$position:** `?int`

**$protocol:** `mixed`

**$sourceAddressStart:** `?string`

**$sourceAddressEnd:** `?string`

**$sourcePortStart:** `?int`

**$sourcePortEnd:** `?int`

**$sourceAddressCidr:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;getFirewallRulesetRule($rulesetUuid, $ruleId) -> FirewallRulesetRuleDetailResponse</code></summary>

#### Description

Returns firewall ruleset rule details.

#### Usage

```php
$client->firewallRuleset->getFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$ruleId:** `string` — Firewall ruleset rule UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;deleteFirewallRulesetRule($rulesetUuid, $ruleId)</code></summary>

#### Description

Deletes an existing rule by given {ruleset-uuid} and {rule-uuid}.

#### Usage

```php
$client->firewallRuleset->deleteFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$ruleId:** `string` — Firewall ruleset rule UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;modifyFirewallRulesetRule($rulesetUuid, $ruleId, $request) -> FirewallRulesetRuleDetailResponse</code></summary>

#### Description

Modifies existing firewall ruleset rule by given {ruleset_uuid} and {rule-uuid}.

#### Usage

```php
$client->firewallRuleset->modifyFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    new FirewallRulesetFirewallRuleModify([
        'enabled' => false,
        'action' => "accept",
        'direction' => "in",
        'family' => "IPv4",
        'protocol' => "tcp",
    ]),
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$ruleId:** `string` — Firewall ruleset rule UUID

**$enabled:** `?bool` — Enabled

**$action:** `mixed`

**$comment:** `?string` — Comments

**$destinationAddressStart:** `?string`

**$destinationAddressEnd:** `?string`

**$destinationPortStart:** `?int`

**$destinationPortEnd:** `?int`

**$destinationAddressCidr:** `?string`

**$direction:** `mixed`

**$family:** `mixed`

**$icmpType:** `?int`

**$position:** `?int`

**$protocol:** `mixed`

**$sourceAddressStart:** `?string`

**$sourceAddressEnd:** `?string`

**$sourcePortStart:** `?int`

**$sourcePortEnd:** `?int`

**$sourceAddressCidr:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;listFirewallRulesetLabels($rulesetUuid) -> array</code></summary>

#### Description

Returns a list of available firewall ruleset labels by given {ruleset-uuid}.

#### Usage

```php
$client->firewallRuleset->listFirewallRulesetLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;createFirewallRulesetLabel($rulesetUuid, $request) -> FirewallRulesetLabelDetailResponse</code></summary>

#### Description

Creates a new label by given {ruleset-uuid}. Labels are used for group filtering.

#### Usage

```php
$client->firewallRuleset->createFirewallRulesetLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateFirewallRulesetLabelRequest([
        'body' => new FirewallRulesetCreateLabel([
            'key' => 'dev',
            'value' => 'dev-1',
        ]),
    ]),
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$request:** `FirewallRulesetCreateLabel`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;getFirewallRulesetLabel($rulesetUuid, $labelKey) -> FirewallRulesetLabelDetailResponse</code></summary>

#### Description

Returns label details by given {ruleset-uuid} and {label-key}.

#### Usage

```php
$client->firewallRuleset->getFirewallRulesetLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;deleteFirewallRulesetLabel($rulesetUuid, $labelKey)</code></summary>

#### Description

Deletes existing label by given {ruleset-uuid} and {label-key}.

#### Usage

```php
$client->firewallRuleset->deleteFirewallRulesetLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;modifyFirewallRulesetLabel($rulesetUuid, $labelKey, $request) -> FirewallRulesetLabelDetailResponse</code></summary>

#### Description

Modifies existing label by given {ruleset-uuid} and {label-key}.

#### Usage

```php
$client->firewallRuleset->modifyFirewallRulesetLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
    new FirewallRulesetLabelModify([
        'key' => 'foo',
        'value' => 'bar',
    ]),
);
```

#### Parameters

**$rulesetUuid:** `string` — Firewall ruleset UUID

**$labelKey:** `string` — The key of the label.

**$key:** `?string`

**$value:** `?string`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;listServerFirewallRule($serverUuid, $request) -> FirewallRulesetServerFirewallDetailResponse</code></summary>

#### Description

Returns a list of server firewall rules.

#### Usage

```php
$client->firewallRuleset->listServerFirewallRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListServerFirewallRuleRequest([
        'limit' => 10,
        'offset' => 0,
        'sort' => 'name',
    ]),
);
```

#### Parameters

**$serverUuid:** `string` — Server UUID

**$limit:** `?int` — Number of entries to receive at most.

**$offset:** `?int` — Offset for retrieved results.

**$sort:** `?string` — Order of returned results.

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;createServerFirewallRule($serverUuid, $request) -> FirewallRulesetServerFirewallRuleDetail</code></summary>

#### Description

Creates a new server firewall rule.

#### Usage

```php
$client->firewallRuleset->createServerFirewallRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    new FirewallRulesetServerFirewallRuleCreate([
        'firewallRule' => new FirewallRulesetServerFirewallRule([
            'direction' => FirewallRulesetRuleDirection::In->value,
            'action' => FirewallRulesetRuleAction::Accept->value,
            'family' => 'IPv4',
            'protocol' => 'tcp',
            'destinationAddressStart' => '',
            'destinationAddressEnd' => '',
            'sourceAddressStart' => '192.168.1.1',
            'sourceAddressEnd' => '192.168.1.255',
            'comment' => 'Allow SSH from this network',
        ]),
    ]),
);
```

#### Parameters

**$serverUuid:** `string` — Server UUID

**$firewallRule:** `FirewallRulesetServerFirewallRule`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;createMultipleServerFirewallRules($serverUuid, $request) -> FirewallRulesetServerFirewallDetailResponse</code></summary>

#### Description

Creates multiple server firewall rules by given {server-uuid}.

#### Usage

```php
$client->firewallRuleset->createMultipleServerFirewallRules(
    '01234567-89ab-cdef-0123-456789abcdef',
    new FirewallRulesetServerMultipleFirewallRulesCreate([
        'firewallRules' => new FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules([
            'firewallRule' => [
                new FirewallRulesetServerFirewallRule([
                    'direction' => FirewallRulesetRuleDirection::In->value,
                    'action' => FirewallRulesetRuleAction::Accept->value,
                    'family' => 'IPv4',
                    'protocol' => 'tcp',
                    'sourceAddressStart' => '192.168.1.1',
                    'sourceAddressEnd' => '192.168.1.255',
                    'comment' => 'Allow SSH from this network',
                ]),
                new FirewallRulesetServerFirewallRule([
                    'direction' => FirewallRulesetRuleDirection::In->value,
                    'action' => FirewallRulesetRuleAction::Accept->value,
                    'family' => 'IPv4',
                    'protocol' => 'tcp',
                    'sourceAddressStart' => '1.1.1.1',
                    'sourceAddressEnd' => '1.1.1.1',
                    'comment' => 'Allow DNS from this network',
                ]),
                new FirewallRulesetServerFirewallRule([
                    'direction' => FirewallRulesetRuleDirection::Out->value,
                    'action' => FirewallRulesetRuleAction::Drop->value,
                    'family' => 'IPv4',
                    'protocol' => 'tcp',
                    'destinationAddressStart' => '100.100.128.2',
                    'destinationAddressEnd' => '100.100.128.2',
                    'comment' => 'dfg',
                ]),
                new FirewallRulesetServerFirewallRule([
                    'direction' => FirewallRulesetRuleDirection::Out->value,
                    'action' => FirewallRulesetRuleAction::Accept->value,
                    'family' => 'IPv6',
                    'protocol' => 'icmp',
                    'destinationAddressStart' => '2a04:3540:1001:1000:1411:4dff:fea5:1bab',
                    'destinationAddressEnd' => '2a04:3540:1001:1000:1411:4dff:fea5:1bab',
                    'comment' => "'w???''?p'2'?12??12?3?'231",
                ]),
            ],
        ]),
    ]),
);
```

#### Parameters

**$serverUuid:** `string` — Server UUID

**$firewallRules:** `?FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules`

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;getServerFirewallRule($serverUuid, $position) -> FirewallRulesetServerFirewallRuleDetail</code></summary>

#### Description

Returns server firewall rule details by given {server-uuid} and {position}.

#### Usage

```php
$client->firewallRuleset->getServerFirewallRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    ,
);
```

#### Parameters

**$serverUuid:** `string` — Server UUID

**$position:** `int|string` — Server firewall rule position

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;deleteServerFirewallRule($serverUuid, $position)</code></summary>

#### Description

Deletes existing server firewall rule by given {server-uuid} and {position}.

#### Usage

```php
$client->firewallRuleset->deleteServerFirewallRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    ,
);
```

#### Parameters

**$serverUuid:** `string` — Server UUID

**$position:** `int|string` — Server firewall rule position

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;firewallRuleset-&gt;adminListServerFirewallRules($serverUuid) -> FirewallRulesetServerFirewallDetailResponse</code></summary>

#### Description

Admin List server firewall rules.

#### Usage

```php
$client->firewallRuleset->adminListServerFirewallRules(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serverUuid:** `string` — Server UUID

</details>

## vnc_keymap
{:#vnc_keymapAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;vncKeymap-&gt;listVncKeymaps() -> VncKeymapKeymaps</code></summary>

#### Description

Retrieves a list of supported VNC keymaps.

#### Usage

```php
$client->vncKeymap->listVncKeymaps();
```

</details>

## zone
{:#zoneAnchor}

<details markdown="block">
<summary markdown="0"><code>$client-&gt;zone-&gt;listZones() -> Zones</code></summary>

#### Description

Retrieves a list of zones.

#### Usage

```php
$client->zone->listZones();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client-&gt;zone-&gt;listZoneVlaNs($zone) -> ZoneVlans</code></summary>

#### Description

Retrieves a list of VLANs in a specific zone.

#### Usage

```php
$client->zone->listZoneVlaNs(
    'fi-hel1',
);
```

#### Parameters

**$zone:** `string` — The zone identifier.

</details>
