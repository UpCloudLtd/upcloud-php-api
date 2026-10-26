---
layout: sdk
title: "API reference · v0.0.11"
version: "v0.0.11"
services:
  - partner
  - tag
  - objectStorage2
---
# API reference
## partner
{:#partnerAnchor}

<details markdown="block">
<summary markdown="0"><code>$client->partner->listPartnerAccounts() -> array</code></summary>

#### Description

Returns list of accounts associated with the partner.

#### Usage

```php
$client->partner->listPartnerAccounts();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client->partner->createPartnerAccount($request) -> PartnerAccount</code></summary>

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

## tag
{:#tagAnchor}

<details markdown="block">
<summary markdown="0"><code>$client->tag->listTags() -> Tags</code></summary>

#### Description

Returns all existing tags with their properties and servers tagged.

#### Usage

```php
$client->tag->listTags();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client->tag->createTag($request) -> Tag</code></summary>

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
<summary markdown="0"><code>$client->tag->getTag($name) -> Tag</code></summary>

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
<summary markdown="0"><code>$client->tag->modifyTag($name, $request) -> Tag</code></summary>

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
<summary markdown="0"><code>$client->tag->deleteTag($name)</code></summary>

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

## objectStorage2
{:#objectStorage2Anchor}

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listServices($request) -> array</code></summary>

#### Description

Returns a list of object storage services.

#### Usage

```php
$client->objectStorage2->listServices(
    new ListServicesRequest([
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
<summary markdown="0"><code>$client->objectStorage2->createService($request) -> ObjectStorage2Servicedetailresponse</code></summary>

#### Description

Creates a new object storage service.

#### Usage

```php
$client->objectStorage2->createService(
    new ObjectStorage2Servicecreate([
        'name' => 'example-service',
        'region' => 'example',
        'configuredStatus' => ObjectStorage2Propertyconfiguredstatus::Started->value,
        'networks' => [
            new ObjectStorage2Networkcreate([
                'name' => 'example-public-network',
                'type' => ObjectStorage2Networktype::Public_->value,
                'family' => ObjectStorage2Networkfamily::IPv4->value,
            ]),
            new ObjectStorage2Networkcreate([
                'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                'name' => 'example-private-network',
                'type' => ObjectStorage2Networktype::Private_->value,
                'family' => ObjectStorage2Networkfamily::IPv4->value,
            ]),
        ],
    ]),
);
```

#### Parameters

**$name:** `string`

**$region:** `string`

**$configuredStatus:** `string`

**$networks:** `?array`

**$customDomains:** `?array`

**$labels:** `?array` — Labels

**$properties:** `?ObjectStorage2Propertiescreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getService($serviceUuid) -> ObjectStorage2Servicedetailresponse</code></summary>

#### Description

Returns object storage service details by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->getService(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->replaceService($serviceUuid, $request) -> ObjectStorage2Servicedetailresponse</code></summary>

#### Description

Replaces existing object storage service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->replaceService(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2Servicereplace([
        'name' => 'example-service',
        'configuredStatus' => ObjectStorage2Propertyconfiguredstatus::Started->value,
        'networks' => [
            new ObjectStorage2Networkcreate([
                'name' => 'example-public-network',
                'type' => ObjectStorage2Networktype::Public_->value,
                'family' => ObjectStorage2Networkfamily::IPv4->value,
            ]),
            new ObjectStorage2Networkcreate([
                'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                'name' => 'example-private-network',
                'type' => ObjectStorage2Networktype::Private_->value,
                'family' => ObjectStorage2Networkfamily::IPv4->value,
            ]),
        ],
        'labels' => [
            new ObjectStorage2Labelcreate([
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

**$networks:** `?array`

**$customDomains:** `?array`

**$labels:** `?array`

**$properties:** `?ObjectStorage2Propertiescreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteService($serviceUuid, $request)</code></summary>

#### Description

Deletes existing object storage service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->deleteService(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DeleteServiceRequest([
        'force' => true,
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$force:** `?bool` — If the parameter is provided, the deletion process starts even if the service is not empty.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->modifyService($serviceUuid, $request) -> ObjectStorage2Servicedetailresponse</code></summary>

#### Description

Modifies existing object storage service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->modifyService(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2Servicemodify([
        'name' => 'example-service',
        'configuredStatus' => ObjectStorage2Propertyconfiguredstatus::Started->value,
        'networks' => [
            new ObjectStorage2Networkcreate([
                'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                'name' => 'example-private-network',
                'type' => ObjectStorage2Networktype::Private_->value,
                'family' => ObjectStorage2Networkfamily::IPv4->value,
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

**$labels:** `?array`

**$properties:** `?ObjectStorage2Propertiescreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listNetworks($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service networks by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listNetworks(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createNetwork($serviceUuid, $request) -> ObjectStorage2Networkdetailresponse</code></summary>

#### Description

Creates a new service network by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateNetworkRequest([
        'body' => new ObjectStorage2Networkcreate([
            'name' => 'example-public-network',
            'type' => ObjectStorage2Networktype::Public_->value,
            'family' => ObjectStorage2Networkfamily::IPv4->value,
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `ObjectStorage2Networkcreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getNetwork($serviceUuid, $networkName) -> ObjectStorage2Networkdetailresponse</code></summary>

#### Description

Returns service network details by given {service_uuid} and {network_name}.

#### Usage

```php
$client->objectStorage2->getNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteNetwork($serviceUuid, $networkName)</code></summary>

#### Description

Deletes existing network by given {service_uuid} and {network_name}.

#### Usage

```php
$client->objectStorage2->deleteNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listCustomDomains($serviceUuid) -> array</code></summary>

#### Description

Returns a list of custom domains attached to a service by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listCustomDomains(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->attachCustomDomain($serviceUuid, $request) -> ObjectStorage2Customdomaindetailresponse</code></summary>

#### Description

Attaches a new custom domain to the service identified by {service_uuid}.

#### Usage

```php
$client->objectStorage2->attachCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    new AttachCustomDomainRequest([
        'body' => new ObjectStorage2Customdomaincreate([
            'type' => ObjectStorage2CustomdomaincreateType::Public_->value,
            'domainName' => 'objects.example.com',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `ObjectStorage2Customdomaincreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getCustomDomainDetails($serviceUuid, $customDomainName) -> ObjectStorage2Customdomaindetailresponse</code></summary>

#### Description

Returns custom domain details by given {service_uuid} and {domain_name}.

#### Usage

```php
$client->objectStorage2->getCustomDomainDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'objects.example.com',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteCustomDomain($serviceUuid, $customDomainName)</code></summary>

#### Description

Deletes existing custom domain by given {service_uuid} and {domain_name}.

#### Usage

```php
$client->objectStorage2->deleteCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    'objects.example.com',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->modifyCustomDomain($serviceUuid, $customDomainName, $request) -> ObjectStorage2Customdomaindetailresponse</code></summary>

#### Description

Modifies existing custom domain by given {service_uuid} and {domain_name}.

#### Usage

```php
$client->objectStorage2->modifyCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    'objects.example.com',
    new ObjectStorage2Customdomainmodify([
        'type' => ObjectStorage2CustomdomainmodifyType::Public_->value,
        'domainName' => 'objects.example.com',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$customDomainName:** `string` — The domain name.

**$type:** `?string` — Type of the custom domain.

**$domainName:** `?string` — New modified custom domain.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listRegions() -> array</code></summary>

#### Description

Returns a list of available managed object storage regions.

#### Usage

```php
$client->objectStorage2->listRegions();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getRegionDetails($regionName) -> ObjectStorage2Regiondetailresponse</code></summary>

#### Description

Returns object storage region details by given {name}.

#### Usage

```php
$client->objectStorage2->getRegionDetails(
    'my-object-storage',
);
```

#### Parameters

**$regionName:** `string` — The name of the region.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getServiceMetrics($serviceUuid) -> ObjectStorage2Metricsusageresponse</code></summary>

#### Description

Returns object storage metrics by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->getServiceMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listBucketMetrics($serviceUuid, $request) -> array</code></summary>

#### Description

Returns metrics for buckets within a service.

#### Usage

```php
$client->objectStorage2->listBucketMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListBucketMetricsRequest([
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
<summary markdown="0"><code>$client->objectStorage2->createBucket($serviceUuid, $request) -> ObjectStorage2Bucketdetailresponse</code></summary>

#### Description

Creates a new service bucket by the given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createBucket(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2Bucketcreate([
        'name' => 'my-bucket-1',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string` — Must be unique within the service, and should contain only alphanumeric, .,- and _.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteBucket($serviceUuid, $bucketName)</code></summary>

#### Description

Deletes an existing bucket by given {service_uuid} and {bucket_name}. This API call will remove all objects from the bucket permanently and cannot be reversed.

#### Usage

```php
$client->objectStorage2->deleteBucket(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$bucketName:** `string` — The name of the bucket.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listServiceMetricsSeries($serviceUuid, $request) -> array</code></summary>

#### Description

Returns Object Storage instance metrics series by a given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listServiceMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListServiceMetricsSeriesRequest([
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
<summary markdown="0"><code>$client->objectStorage2->listLabels($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service labels by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createLabel($serviceUuid, $request) -> ObjectStorage2Labeldetailresponse</code></summary>

#### Description

Creates a new label by given {service_uuid}. Labels are used for service filtering.

#### Usage

```php
$client->objectStorage2->createLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateLabelRequest([
        'body' => new ObjectStorage2Labelcreate([
            'key' => 'foo',
            'value' => 'bar',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$request:** `ObjectStorage2Labelcreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getLabelDetails($serviceUuid, $labelKey) -> ObjectStorage2Labeldetailresponse</code></summary>

#### Description

Returns label details by given {service_uuid} and {key}.

#### Usage

```php
$client->objectStorage2->getLabelDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteLabel($serviceUuid, $labelKey)</code></summary>

#### Description

Deletes existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->objectStorage2->deleteLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$labelKey:** `string` — The key of the label.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->modifyLabel($serviceUuid, $labelKey, $request) -> ObjectStorage2Labeldetailresponse</code></summary>

#### Description

Modifies existing label by given {service_uuid} and {key}.

#### Usage

```php
$client->objectStorage2->modifyLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
    new ObjectStorage2Labelmodify([
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
<summary markdown="0"><code>$client->objectStorage2->listUsers($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service users by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listUsers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createUser($serviceUuid, $request) -> ObjectStorage2Userdetailresponse</code></summary>

#### Description

Creates a new service user by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2Usercreate([
        'username' => 'example_user',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user to create.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getUserDetails($serviceUuid, $username) -> ObjectStorage2Userdetailresponse</code></summary>

#### Description

Returns service user details by given {service_uuid} and {username}.

#### Usage

```php
$client->objectStorage2->getUserDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteUser($serviceUuid, $username)</code></summary>

#### Description

Deletes existing user by given {service_uuid} and {username}.

#### Usage

```php
$client->objectStorage2->deleteUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listAccessKeys($serviceUuid, $username) -> array</code></summary>

#### Description

Returns a list of available access keys for a user.

#### Usage

```php
$client->objectStorage2->listAccessKeys(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createAccessKey($serviceUuid, $username) -> ObjectStorage2Createaccesskeyresponse</code></summary>

#### Description

Creates a new access key by given {service_uuid} and {username}.

#### Usage

```php
$client->objectStorage2->createAccessKey(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getAccessKeyDetails($serviceUuid, $username, $accessKeyId) -> ObjectStorage2Accesskeydetailresponse</code></summary>

#### Description

Returns access key details by given {service_uuid}, {username}, and {access-key-id}.

#### Usage

```php
$client->objectStorage2->getAccessKeyDetails(
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
<summary markdown="0"><code>$client->objectStorage2->deleteAccessKey($serviceUuid, $username, $accessKeyId)</code></summary>

#### Description

Deletes existing access key by given {service_uuid}, {username}, and {access-key-id}.

#### Usage

```php
$client->objectStorage2->deleteAccessKey(
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
<summary markdown="0"><code>$client->objectStorage2->modifyAccessKeyDetails($serviceUuid, $username, $accessKeyId, $request) -> ObjectStorage2Accesskeydetailresponse</code></summary>

#### Description

Modifies access key details.

#### Usage

```php
$client->objectStorage2->modifyAccessKeyDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'UCK1234567890ABCDEF',
    new ObjectStorage2Accesskeymodify([
        'status' => ObjectStorage2AccesskeymodifyStatus::Inactive->value,
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
<summary markdown="0"><code>$client->objectStorage2->listAttachedUserPolicies($serviceUuid, $username) -> array</code></summary>

#### Description

Returns a list of attached user policies for a user.

#### Usage

```php
$client->objectStorage2->listAttachedUserPolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->attachUserPolicy($serviceUuid, $username, $request)</code></summary>

#### Description

Attach a policy to a user.

#### Usage

```php
$client->objectStorage2->attachUserPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new AttachUserPolicyRequest([
        'body' => new ObjectStorage2Policyattachmentcreate([
            'name' => 'test-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$request:** `ObjectStorage2Policyattachmentcreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->detachUserPolicy($serviceUuid, $username, $nestedName)</code></summary>

#### Description

Detach a policy from a user.

#### Usage

```php
$client->objectStorage2->detachUserPolicy(
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
<summary markdown="0"><code>$client->objectStorage2->getUserInlinePolicy($serviceUuid, $username, $userPolicyName) -> ObjectStorage2Inlinepolicyresponse</code></summary>

#### Description

Get the user inline policy by the given {service_uuid}, {username} and {policy_name}.

#### Usage

```php
$client->objectStorage2->getUserInlinePolicy(
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
<summary markdown="0"><code>$client->objectStorage2->deleteUserInlinePolicy($serviceUuid, $username, $userPolicyName)</code></summary>

#### Description

Deletes the user inline policy by the given {service_uuid}, {username}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->deleteUserInlinePolicy(
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
<summary markdown="0"><code>$client->objectStorage2->listUserInlinePolicies($serviceUuid, $username) -> array</code></summary>

#### Description

Lists the user inline policies by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->listUserInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createUserInlinePolicy($serviceUuid, $username, $request) -> ObjectStorage2Inlinepolicyresponse</code></summary>

#### Description

Creates a user inline policy by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->createUserInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateUserInlinePolicyRequest([
        'body' => new ObjectStorage2Inlinepolicycreate([
            'name' => 'ECSS3FullAccess',
            'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$request:** `ObjectStorage2Inlinepolicycreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getUserTags($serviceUuid, $username) -> array</code></summary>

#### Description

Returns a user's tags by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->getUserTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->replaceUserTags($serviceUuid, $username, $request) -> array</code></summary>

#### Description

Replaces a user's tags by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->replaceUserTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ReplaceUserTagsRequest([
        'body' => [
            new ObjectStorage2TaglistrequestItem([
                'key' => 'environment',
                'value' => 'production',
            ]),
            new ObjectStorage2TaglistrequestItem([
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
<summary markdown="0"><code>$client->objectStorage2->deleteUserTag($serviceUuid, $username, $userTagKey)</code></summary>

#### Description

Deletes a user's tag by the given {service_uuid}, {username}, and {tag_key}.

#### Usage

```php
$client->objectStorage2->deleteUserTag(
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
<summary markdown="0"><code>$client->objectStorage2->createUserPermissionsBoundary($serviceUuid, $username, $request) -> ObjectStorage2Permissionsboundaryresponse</code></summary>

#### Description

Creates a user's permissions boundary by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->createUserPermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateUserPermissionsBoundaryRequest([
        'body' => new ObjectStorage2Permissionsboundarycreate([
            'policyName' => 'sample-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

**$request:** `ObjectStorage2Permissionsboundarycreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteUserPermissionsBoundary($serviceUuid, $username)</code></summary>

#### Description

Deletes a user's permissions boundary by the given {service_uuid}, and {username}.

#### Usage

```php
$client->objectStorage2->deleteUserPermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$username:** `string` — The name of the user.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->listPolicyVersions($serviceUuid, $policyName) -> array</code></summary>

#### Description

Lists policy versions given by {service_uuid}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->listPolicyVersions(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createPolicyVersion($serviceUuid, $policyName, $request) -> ObjectStorage2Policyversionresponse</code></summary>

#### Description

Creates a policy version by the given {service_uuid}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->createPolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2Policyversioncreate([
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
<summary markdown="0"><code>$client->objectStorage2->getPolicyVersion($serviceUuid, $policyName, $policyVersion) -> ObjectStorage2Policyversionresponse</code></summary>

#### Description

Get a single policy version by the given {service_uuid}, {policy_name}, and {policy_version}.

#### Usage

```php
$client->objectStorage2->getPolicyVersion(
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
<summary markdown="0"><code>$client->objectStorage2->deletePolicyVersion($serviceUuid, $policyName, $policyVersion)</code></summary>

#### Description

Deletes a policy version by the given {service_uuid}, {policy_name}, and {policy_version}.

#### Usage

```php
$client->objectStorage2->deletePolicyVersion(
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
<summary markdown="0"><code>$client->objectStorage2->getPolicyDetails($serviceUuid, $policyName) -> ObjectStorage2Policydetailresponse</code></summary>

#### Description

Returns service policy details by given {service_uuid} and {policy_name}.

#### Usage

```php
$client->objectStorage2->getPolicyDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deletePolicy($serviceUuid, $policyName)</code></summary>

#### Description

Deletes existing policy by given {service_uuid} and {policy_name}.

#### Usage

```php
$client->objectStorage2->deletePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$policyName:** `string` — The name of the policy.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->setDefaultPolicyVersion($serviceUuid, $policyName, $request) -> ObjectStorage2Policydetailresponse</code></summary>

#### Description

Sets the default version for a policy. Note: This is mapped from ModifyPolicyVersion handler.

#### Usage

```php
$client->objectStorage2->setDefaultPolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2Policysetdefaultversion([
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
<summary markdown="0"><code>$client->objectStorage2->listPolicies($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service policies by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listPolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createPolicy($serviceUuid, $request) -> ObjectStorage2Policydetailresponse</code></summary>

#### Description

Creates a new service policy by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->createPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2Policycreate([
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
<summary markdown="0"><code>$client->objectStorage2->listIamGroupPolicies($serviceUuid, $groupName) -> array</code></summary>

#### Description

Lists IAM policies attached to a group.

#### Usage

```php
$client->objectStorage2->listIamGroupPolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->attachIamGroupPolicy($serviceUuid, $groupName, $request)</code></summary>

#### Description

Attaches a policy to a group.

#### Usage

```php
$client->objectStorage2->attachIamGroupPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new AttachIamGroupPolicyRequest([
        'body' => new ObjectStorage2Policyattachmentcreate([
            'name' => 'test-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$request:** `ObjectStorage2Policyattachmentcreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->detachIamGroupPolicy($serviceUuid, $groupName, $policyName)</code></summary>

#### Description

Detaches a policy from a group.

#### Usage

```php
$client->objectStorage2->detachIamGroupPolicy(
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
<summary markdown="0"><code>$client->objectStorage2->listGroups($serviceUuid) -> array</code></summary>

#### Description

Returns a list of available service groups by given {service_uuid}.

#### Usage

```php
$client->objectStorage2->listGroups(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createGroup($serviceUuid, $request) -> ObjectStorage2Groupresponse</code></summary>

#### Description

Creates an iam group.

#### Usage

```php
$client->objectStorage2->createGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2Groupcreate([
        'name' => 'new-group',
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$name:** `string` — A valid string to represent the name of the IAM group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getGroup($serviceUuid, $groupName) -> ObjectStorage2Groupresponse</code></summary>

#### Description

Get a single group identified by {service_uuid}, and {group_name}.

#### Usage

```php
$client->objectStorage2->getGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteGroup($serviceUuid, $groupName)</code></summary>

#### Description

Deletes a group identified by {group_name}.

#### Usage

```php
$client->objectStorage2->deleteGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->attachUserToGroup($serviceUuid, $groupName, $username)</code></summary>

#### Description

Attaches an iam user to a group identified by {group_name}, and {username}.

#### Usage

```php
$client->objectStorage2->attachUserToGroup(
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
<summary markdown="0"><code>$client->objectStorage2->removeUserFromGroup($serviceUuid, $groupName, $username)</code></summary>

#### Description

Removes an iam user from the group identified by {group_name}, and {username}.

#### Usage

```php
$client->objectStorage2->removeUserFromGroup(
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
<summary markdown="0"><code>$client->objectStorage2->listGroupInlinePolicies($serviceUuid, $groupName) -> array</code></summary>

#### Description

Lists the group inline policies by the given {service_uuid}, and {group_name}.

#### Usage

```php
$client->objectStorage2->listGroupInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createGroupInlinePolicy($serviceUuid, $groupName, $request) -> ObjectStorage2Inlinepolicyresponse</code></summary>

#### Description

Creates a group inline policy by the given {service_uuid}, and {group_name}.

#### Usage

```php
$client->objectStorage2->createGroupInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateGroupInlinePolicyRequest([
        'body' => new ObjectStorage2Inlinepolicycreate([
            'name' => 'ECSS3FullAccess',
            'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$groupName:** `string` — The name of the group.

**$request:** `ObjectStorage2Inlinepolicycreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getGroupInlinePolicy($serviceUuid, $groupName, $groupPolicyName) -> ObjectStorage2Inlinepolicyresponse</code></summary>

#### Description

Get the group inline policy by the given {service_uuid}, {group_name} and {policy_name}.

#### Usage

```php
$client->objectStorage2->getGroupInlinePolicy(
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
<summary markdown="0"><code>$client->objectStorage2->deleteGroupInlinePolicy($serviceUuid, $groupName, $groupPolicyName)</code></summary>

#### Description

Deletes the group inline policy by the given {service_uuid}, {group_name}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->deleteGroupInlinePolicy(
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
<summary markdown="0"><code>$client->objectStorage2->listRoles($serviceUuid) -> array</code></summary>

#### Description

Lists the roles.

#### Usage

```php
$client->objectStorage2->listRoles(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createRole($serviceUuid, $request) -> ObjectStorage2Roleresponse</code></summary>

#### Description

Creates a service IAM role.

#### Usage

```php
$client->objectStorage2->createRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2Rolecreate([
        'name' => 'test-role',
        'assumeRolePolicyDocument' => '{"Version": "2012-10-17","Statement": [{"Action": "sts:AssumeRole","Principal": {"AWS": ["urn:ecs:iam::ns1:user/Demby"]},"Effect": "Allow","Resource": "*"}]}',
        'description' => 'A test role.',
        'maxSessionDuration' => 3600,
        'permissionsBoundary' => 'test-policy',
        'tags' => [
            new ObjectStorage2Roletag([
                'key' => 'department',
                'value' => 'Finance',
            ]),
            new ObjectStorage2Roletag([
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
<summary markdown="0"><code>$client->objectStorage2->getRole($serviceUuid, $roleName) -> ObjectStorage2Roleresponse</code></summary>

#### Description

Get a single role identified by {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->getRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteRole($serviceUuid, $roleName)</code></summary>

#### Description

Deletes a service's IAM role.

#### Usage

```php
$client->objectStorage2->deleteRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->updateRole($serviceUuid, $roleName, $request) -> ObjectStorage2Roleresponse</code></summary>

#### Description

Updates a service's IAM role.

#### Usage

```php
$client->objectStorage2->updateRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2Roleupdate([
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
<summary markdown="0"><code>$client->objectStorage2->listRoleInlinePolicies($serviceUuid, $roleName) -> array</code></summary>

#### Description

Returns a list of role inline policies by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->listRoleInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->createRoleInlinePolicy($serviceUuid, $roleName, $request) -> ObjectStorage2Inlinepolicyresponse</code></summary>

#### Description

Creates a role inline policy by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->createRoleInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateRoleInlinePolicyRequest([
        'body' => new ObjectStorage2Inlinepolicycreate([
            'name' => 'ECSS3FullAccess',
            'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$request:** `ObjectStorage2Inlinepolicycreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->getRoleInlinePolicy($serviceUuid, $roleName, $rolePolicyName) -> ObjectStorage2Inlinepolicyresponse</code></summary>

#### Description

Returns a role's inline policy by the given {service_uuid}, {role_name}, and {policy_name}.

#### Usage

```php
$client->objectStorage2->getRoleInlinePolicy(
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
<summary markdown="0"><code>$client->objectStorage2->deleteRoleInlinePolicy($serviceUuid, $roleName, $rolePolicyName)</code></summary>

#### Description

Delete a role inline policy by the given {service_uuid}, {role_name} and {policy_name}.

#### Usage

```php
$client->objectStorage2->deleteRoleInlinePolicy(
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
<summary markdown="0"><code>$client->objectStorage2->createRolePermissionsBoundary($serviceUuid, $roleName, $request) -> ObjectStorage2Permissionsboundaryresponse</code></summary>

#### Description

Creates a role policy's permissions boundary by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->createRolePermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new CreateRolePermissionsBoundaryRequest([
        'body' => new ObjectStorage2Permissionsboundarycreate([
            'policyName' => 'sample-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$request:** `ObjectStorage2Permissionsboundarycreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->deleteRolePermissionsBoundary($serviceUuid, $roleName)</code></summary>

#### Description

Deletes a role permissions boundary by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->deleteRolePermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->assumeRolePolicy($serviceUuid, $roleName, $request) -> ObjectStorage2Assumerolepolicyresponse</code></summary>

#### Description

Assume a role policy by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->assumeRolePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2Assumerolepolicyrequest([
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
<summary markdown="0"><code>$client->objectStorage2->listAttachedRolePolicies($serviceUuid, $roleName) -> array</code></summary>

#### Description

Lists all policies attached to a service's IAM role.

#### Usage

```php
$client->objectStorage2->listAttachedRolePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->attachPolicyToRole($serviceUuid, $roleName, $request)</code></summary>

#### Description

Attaches a policy to a service's IAM role.

#### Usage

```php
$client->objectStorage2->attachPolicyToRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new AttachPolicyToRoleRequest([
        'body' => new ObjectStorage2Policyattachmentcreate([
            'name' => 'test-policy',
        ]),
    ]),
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

**$request:** `ObjectStorage2Policyattachmentcreate`

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->detachPolicyFromRole($serviceUuid, $roleName, $rolePolicyName)</code></summary>

#### Description

Detaches a policy from a service's IAM role.

#### Usage

```php
$client->objectStorage2->detachPolicyFromRole(
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
<summary markdown="0"><code>$client->objectStorage2->getRoleTags($serviceUuid, $roleName) -> array</code></summary>

#### Description

Returns a role's tags by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->getRoleTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$roleName:** `string` — The name of the role.

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->replaceRoleTags($serviceUuid, $roleName, $request) -> array</code></summary>

#### Description

Replaces a role's tags by the given {service_uuid}, and {role_name}.

#### Usage

```php
$client->objectStorage2->replaceRoleTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ReplaceRoleTagsRequest([
        'body' => [
            new ObjectStorage2TaglistrequestItem([
                'key' => 'environment',
                'value' => 'production',
            ]),
            new ObjectStorage2TaglistrequestItem([
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
<summary markdown="0"><code>$client->objectStorage2->deleteRoleTag($serviceUuid, $roleName, $roleTagKey)</code></summary>

#### Description

Deletes a role's tag by the given {service_uuid}, {role_name}, and {tag_key}.

#### Usage

```php
$client->objectStorage2->deleteRoleTag(
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

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->integrationListServices()</code></summary>

#### Description

INTERNAL: This endpoint lists all services available for integration use-cases.

#### Usage

```php
$client->objectStorage2->integrationListServices();
```

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->integrationGetService($serviceUuid)</code></summary>

#### Description

INTERNAL: This endpoint retrieves details of a specific service for integration use-cases.

#### Usage

```php
$client->objectStorage2->integrationGetService(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->integrationCreateNetwork($serviceUuid)</code></summary>

#### Description

INTERNAL: This endpoint creates a new network for integration use-cases.

#### Usage

```php
$client->objectStorage2->integrationCreateNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

</details>

<details markdown="block">
<summary markdown="0"><code>$client->objectStorage2->integrationDeleteNetwork($serviceUuid, $networkName)</code></summary>

#### Description

This endpoint deletes a network created for integration use-cases.

#### Usage

```php
$client->objectStorage2->integrationDeleteNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```

#### Parameters

**$serviceUuid:** `string` — Service UUID

**$networkName:** `string` — The name of the network.

</details>
