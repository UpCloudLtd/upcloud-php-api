# Reference
## account
<details><summary><code>$client-&gt;account-&gt;details() -> Account</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns account details for the authenticated user
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->details();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getMonthlyDetailedBillingSummary($year, $month, $request) -> AccountBillingSummary</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a billing summary grouped by resource, including billing detail changes during the specified month. The API user must have permission to read billing details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getMonthlyDetailedBillingSummary(
    'year',
    'month',
    new GetMonthlyDetailedBillingSummaryRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$year:** `string` — Billing year.

</dd>
</dl>

<dl>
<dd>

**$month:** `string` — Billing month.

</dd>
</dl>

<dl>
<dd>

**$username:** `?string` — Return the billing summary for this account instead of the calling account. Requires Partner API access and an existing association with the account.

</dd>
</dl>

<dl>
<dd>

**$resourceId:** `?string` — Return details only for this resource UUID or IP address.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getMonthlyBillingSummary($year, $month) -> AccountBillingSummaryResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a billing summary for the specified month. The API user must have permission to read billing details. This endpoint is deprecated; use the monthly billing summary with resource details instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getMonthlyBillingSummary(
    'year',
    'month',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$year:** `string` — Billing year.

</dd>
</dl>

<dl>
<dd>

**$month:** `string` — Billing month.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getCurrentNetworkUsage() -> AccountCurrentNetworkUsage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the latest Network Transfer Pool usage report for the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getCurrentNetworkUsage();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;listAccounts($request) -> Accounts</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the main account and its subaccounts. Account listing is available only to the main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->listAccounts(
    new ListAccountsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require all labels. Label keys are matched case-insensitively.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;createMslmaSigningLink() -> AccountCreateMsLmaSigningLinkResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new Microsoft LMA signing link
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->createMslmaSigningLink();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getAccountNetworkTopUsage($request) -> AccountResourceNetworkUsage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the resources with the highest network usage.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getAccountNetworkTopUsage(
    new GetAccountNetworkTopUsageRequest([
        'from' => new DateTime('2026-07-01T00:00:00Z'),
        'to' => new DateTime('2026-07-01T00:00:00Z'),
        'zone' => 'fi-hel1',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `DateTime` — Start of the usage period.

</dd>
</dl>

<dl>
<dd>

**$to:** `DateTime` — End of the usage period.

</dd>
</dl>

<dl>
<dd>

**$service:** `?string` — Filter by service type. Repeat the parameter to include multiple service types.

</dd>
</dl>

<dl>
<dd>

**$zone:** `?string` — Filter by zone. Repeat the parameter to include multiple zones.

</dd>
</dl>

<dl>
<dd>

**$accumulate:** `?string` — Accumulation period for the usage statistics.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getAccountNetworkUsage($request) -> AccountNetworkUsage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns network transfer statistics. JSON responses support a maximum time window of 31 days; CSV responses have no time-window limit. Select the output format with the Accept header using application/json or text/csv.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getAccountNetworkUsage(
    new GetAccountNetworkUsageRequest([
        'from' => new DateTime('2026-07-01T00:00:00Z'),
        'to' => new DateTime('2026-07-01T00:00:00Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `DateTime` — First measurement timestamp in RFC 3339 format.

</dd>
</dl>

<dl>
<dd>

**$to:** `DateTime` — Last measurement timestamp in RFC 3339 format.

</dd>
</dl>

<dl>
<dd>

**$accumulate:** `?string` — Accumulate the transfer statistics by hour or day.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getAccountResourceUsage() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns current resource usage counts for the account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getAccountResourceUsage();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getMonthlyResourceBillingSummary($resourceId, $year, $month) -> AccountResourceBillingSummaryResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a billing summary for one resource during the specified month. The API user must have permission to read billing details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getMonthlyResourceBillingSummary(
    'resource_id',
    'year',
    'month',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$resourceId:** `string` — Server UUID, storage UUID, or IP address.

</dd>
</dl>

<dl>
<dd>

**$year:** `string` — Billing year.

</dd>
</dl>

<dl>
<dd>

**$month:** `string` — Billing month.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;getAccountResourceNetworkUsage($request) -> AccountResourceNetworkUsage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns network transfer statistics grouped by resource, service, and zone. JSON responses support a maximum time window of 31 days; CSV responses have no time-window limit. Select the output format with the Accept header using application/json or text/csv.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->getAccountResourceNetworkUsage(
    new GetAccountResourceNetworkUsageRequest([
        'from' => new DateTime('2026-07-01T00:00:00Z'),
        'to' => new DateTime('2026-07-01T00:00:00Z'),
        'resourceId' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
        'zone' => 'fi-hel1',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `DateTime` — Data start timestamp in RFC 3339 format.

</dd>
</dl>

<dl>
<dd>

**$to:** `DateTime` — Data end timestamp in RFC 3339 format.

</dd>
</dl>

<dl>
<dd>

**$service:** `?string` — Limit results to a service type. Repeat the parameter to include multiple service types.

</dd>
</dl>

<dl>
<dd>

**$resourceId:** `?string` — Limit results to this resource UUID.

</dd>
</dl>

<dl>
<dd>

**$zone:** `?string` — Limit results to a zone. Repeat the parameter to include multiple zones.

</dd>
</dl>

<dl>
<dd>

**$accumulate:** `?string` — Accumulate the transfer statistics by hour or day.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;createSubaccount($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a subaccount for the authenticated main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->createSubaccount(
    new CreateSubaccountRequest([
        'subAccount' => new CreateSubaccountRequestSubAccount([
            'username' => 'myusername',
            'password' => 'mysecr3tPassword',
            'firstName' => 'first',
            'lastName' => 'last',
            'company' => 'my company name',
            'vatNumber' => 'my vat number',
            'address' => 'my address',
            'postalCode' => '00130',
            'city' => 'Helsinki',
            'state' => '',
            'country' => 'FIN',
            'email' => 'user@example.com',
            'phone' => '+358.31245434',
            'language' => 'en',
            'currency' => 'EUR',
            'timezone' => 'Europe/Helsinki',
            'allowApi' => AccountBooleanYesno::Yes->value,
            'allowGui' => AccountBooleanYesno::No->value,
            'roles' => new CreateSubaccountRequestSubAccountRoles([
                'role' => [
                    'technical',
                    'billing',
                    'aux_billing',
                ],
            ]),
            'labels' => [
                new AccountLabel([
                    'key' => 'department',
                    'value' => 'it',
                ]),
            ],
            'ipFilters' => new CreateSubaccountRequestSubAccountIpFilters([
                'ipFilter' => [
                    'ip_filter',
                ],
            ]),
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$subAccount:** `CreateSubaccountRequestSubAccount`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;account-&gt;deleteSubaccount($username)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a subaccount from the authenticated main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->account->deleteSubaccount(
    'username',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$username:** `string` — Subaccount username.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## kubernetes
<details><summary><code>$client-&gt;kubernetes-&gt;listKubernetesClusters() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of Kubernetes clusters.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->listKubernetesClusters();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;createKubernetesCluster($request) -> KubernetesCluster</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new Kubernetes cluster.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `KubernetesCluster`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;getKubernetesCluster($uuid) -> KubernetesCluster</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns Kubernetes cluster details by given `uuid`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->getKubernetesCluster(
    'uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;deleteKubernetesCluster($uuid) -> KubernetesAccepted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes an existing Kubernetes cluster by given `uuid`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->deleteKubernetesCluster(
    'uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;modifyKubernetesCluster($uuid, $request) -> KubernetesCluster</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies an existing Kubernetes cluster by given `{uuid}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$controlPlaneIpFilter:** `?array`

</dd>
</dl>

<dl>
<dd>

**$labels:** `mixed`

</dd>
</dl>

<dl>
<dd>

**$plan:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;getKubernetesClusterKubeconfig($uuid) -> KubernetesClusterKubeconfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns kubeconfig for Kubernetes cluster by given `{uuid}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->getKubernetesClusterKubeconfig(
    'uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;getKubernetesClusterAvailableUpgrades($uuid) -> KubernetesClusterAvailableUpgrades</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available versions that can be used to upgrade the cluster.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->getKubernetesClusterAvailableUpgrades(
    'uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;upgradeKubernetesCluster($uuid, $request) -> KubernetesClusterAvailableUpgradesPost</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Upgrades an existing Kubernetes cluster to specific version.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `KubernetesClusterAvailableUpgradesPost`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;listKubernetesClusterNodeGroups($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available node groups of an existing Kubernetes cluster. Cluster is identified by given `{uuid}`.

A node group is a uniform set of worker nodes attached to a cluster.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->listKubernetesClusterNodeGroups(
    'uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;createKubernetesClusterNodeGroup($uuid, $request) -> KubernetesNodeGroup</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new node group to an existing Kubernetes cluster. Cluster is identified by given `{uuid}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `KubernetesNodeGroup`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;getKubernetesClusterNodeGroup($uuid, $name) -> KubernetesNodeGroupDetails</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns node group details by given `{node_group_name}`. Cluster is identified by given `{uuid}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->getKubernetesClusterNodeGroup(
    'uuid',
    'name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;deleteKubernetesClusterNodeGroup($uuid, $name) -> KubernetesAccepted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes an existing node group by given Kubernetes cluster `{uuid}` and `{node_group_name}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->deleteKubernetesClusterNodeGroup(
    'uuid',
    'name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;modifyKubernetesClusterNodeGroup($uuid, $name, $request) -> KubernetesNodeGroup</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies an existing node group of a cluster. Cluster is identified by given `{uuid}` and node group by `{node_group_name}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->modifyKubernetesClusterNodeGroup(
    'uuid',
    'name',
    new KubernetesNodeGroupPatch([
        'count' => 16,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>

<dl>
<dd>

**$count:** `int`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;deleteKubernetesClusterNodeGroupNode($uuid, $name, $nodeName) -> KubernetesAccepted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a node group node from a cluster (experimental). Cluster is identified by given `{uuid}`, node group by `{name}`, and node by `{node-name}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->deleteKubernetesClusterNodeGroupNode(
    'uuid',
    'name',
    'node-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>

<dl>
<dd>

**$nodeName:** `string` — Node name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;listKubernetesPlans() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available Kubernetes cluster plans.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->listKubernetesPlans();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;listKubernetesVersions() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available Kubernetes cluster versions.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->listKubernetesVersions();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;listClusterAuthentication($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all OIDC authentication issuer configurations for a cluster.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->listClusterAuthentication(
    'uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;createClusterAuthentication($uuid, $request) -> KubernetesAuthenticationIssuerConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new OIDC authentication issuer configuration. The new entry is validated together with the cluster's existing entries before being applied. Fails if an entry with the same name already exists.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->createClusterAuthentication(
    'uuid',
    new CreateClusterAuthenticationRequest([
        'body' => new KubernetesAuthenticationIssuerConfig([
            'name' => 'name',
            'issuerUrl' => 'https://accounts.myoidcprovider.com',
            'audiences' => [
                'client-id-123',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `KubernetesAuthenticationIssuerConfig`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;setClusterAuthentication($uuid, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the entire set of OIDC authentication issuer configurations for a cluster with the supplied JSON list of issuers. The full set is validated before being applied. An empty list clears all issuers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->setClusterAuthentication(
    'uuid',
    new SetClusterAuthenticationRequest([
        'body' => [
            new KubernetesAuthenticationIssuerConfig([
                'name' => 'name',
                'issuerUrl' => 'https://accounts.myoidcprovider.com',
                'audiences' => [
                    'client-id-123',
                ],
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;importClusterAuthentication($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the entire set of OIDC authentication issuer configurations for a cluster with the supplied native kube-apiserver v1 AuthenticationConfiguration YAML document. Issuers are named deterministically from their issuer URL host. The top-level `anonymous` field is not supported and any configuration that would drop data is rejected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->importClusterAuthentication(
    'uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;getClusterAuthentication($uuid, $name) -> KubernetesAuthenticationIssuerConfig</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->getClusterAuthentication(
    'uuid',
    'name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;updateClusterAuthentication($uuid, $name, $request) -> KubernetesAuthenticationIssuerConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates an existing OIDC authentication issuer configuration. The name in the path is authoritative. The updated entry is validated together with the cluster's other entries before being applied.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->updateClusterAuthentication(
    'uuid',
    'name',
    new UpdateClusterAuthenticationRequest([
        'body' => new KubernetesAuthenticationIssuerConfig([
            'name' => 'name',
            'issuerUrl' => 'https://accounts.myoidcprovider.com',
            'audiences' => [
                'client-id-123',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>

<dl>
<dd>

**$request:** `KubernetesAuthenticationIssuerConfig`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;deleteClusterAuthentication($uuid, $name)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes an OIDC authentication issuer configuration by name.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->deleteClusterAuthentication(
    'uuid',
    'name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;kubernetes-&gt;getKubernetesClusterOidcKubeconfig($uuid, $name, $request) -> KubernetesClusterKubeconfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a kubeconfig for the cluster whose user authenticates via the kubelogin (`kubectl oidc-login`) exec credential plugin, using the cluster's configured OIDC issuer identified by the `name` path parameter. The plugin (kubelogin) must be installed on the client. No long-lived credential is embedded. The OIDC client secret and any provider-specific kubelogin flags are not injected by the server; the returned kubeconfig includes comments describing how to add them.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->kubernetes->getKubernetesClusterOidcKubeconfig(
    'uuid',
    'name',
    new GetKubernetesClusterOidcKubeconfigRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name

</dd>
</dl>

<dl>
<dd>

**$audience:** `?string` — Which of the issuer's configured audiences to use as the OIDC client id in the generated kubeconfig. When omitted, the issuer's first audience is used. Must match one of the issuer's audiences.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## currency
<details><summary><code>$client-&gt;currency-&gt;listCurrencies() -> CurrencyCurrencies</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of supported currencies and their exchange rates relative to the account credit currency.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->currency->listCurrencies();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## device
<details><summary><code>$client-&gt;device-&gt;getAvailablePassthroughDevices($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available passthrough devices.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->device->getAvailablePassthroughDevices(
    new GetAvailablePassthroughDevicesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$zone:** `?string` — Filter results to a specific zone.

</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Filter results to a specific device type. The only valid type is "gpu" for now.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## events
<details><summary><code>$client-&gt;events-&gt;listEvents($serverUuid, $offset, $count) -> Events</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of events.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->listEvents(
    'server_uuid',
    1,
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serverUuid:** `string` — Filter results to a specific server.

</dd>
</dl>

<dl>
<dd>

**$offset:** `int` — The number of items to skip before starting to collect the result set. Default is 0.

</dd>
</dl>

<dl>
<dd>

**$count:** `int` — The numbers of items to return.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ip_address
<details><summary><code>$client-&gt;ipAddress-&gt;listIpAddresses() -> IpAddressesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of IP addresses.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAddress->listIpAddresses();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAddress-&gt;addIpAddress($request) -> IpAddressRequest</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds a new IP address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAddress->addIpAddress(
    new AddIpAddressRequest([
        'ipAddress' => new AddIpAddressRequestIpAddress([
            'access' => 'access',
            'family' => IpAddressIpFamily::IPv4->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ipAddress:** `AddIpAddressRequestIpAddress`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAddress-&gt;bulkModifyIpAddresses($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies attributes of multiple IP addresses in a single request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAddress->bulkModifyIpAddresses(
    new BulkPatchIpAddressesRequestV13([
        'ipAddresses' => [
            new BulkPatchIpAddressesRequestV13IpAddressesItem([
                'address' => 'address',
                'mainAccountId' => 1000000,
                'delegatedToAccountId' => 1000000,
                'releasePolicy' => IpAddressIpReleasePolicy::Release->value,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ipAddresses:** `array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAddress-&gt;getIpAddressDetails($address) -> IpAddressResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves details of a specific IP address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAddress->getIpAddressDetails(
    'address',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$address:** `string` — The IP address to retrieve details for.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAddress-&gt;modifyIpAddress($address, $request) -> IpAddressRequest</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies attributes of a specific IP address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAddress->modifyIpAddress(
    'address',
    new ModifyIpAddressRequestV10([
        'ipAddress' => new ModifyIpAddressRequestV10IpAddress([
            'ptrRecord' => 'host.example.com',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$address:** `string` — The IP address to modify.

</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `ModifyIpAddressRequestV10IpAddress`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAddress-&gt;deleteIpAddress($address)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a specific IP address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAddress->deleteIpAddress(
    'address',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$address:** `string` — The IP address to delete.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ipAddress-&gt;patchModifyIpAddress($address, $request) -> IpAddressRequest</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies attributes of a specific IP address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ipAddress->patchModifyIpAddress(
    'address',
    new PatchIpAddressRequestV13([
        'ipAddress' => new PatchIpAddressRequestV13IpAddress([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$address:** `string` — The IP address to modify.

</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `PatchIpAddressRequestV13IpAddress`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## network-peering
<details><summary><code>$client-&gt;networkPeering-&gt;listNetworkPeerings($request) -> NetworkPeerings</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of all peerings within the current account. Only peerings that refer to a network that the current
account has access are returned.

It is also possible to filter network peering with label URL parameters, e.g.
`?label=env` or `?label=env%3Dprod`. The URL parameter can be given multiple
times to add more filters (e.g. `?label=env%3Dprod&label=v2`), where
only network peering that match all labels are returned.
Label keys are matched case insensitively.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->networkPeering->listNetworkPeerings(
    new ListNetworkPeeringsRequest([
        'uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
        'networkUuidLocal' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
        'networkUuidPeer' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `?string` — Filter by network peering UUID.

</dd>
</dl>

<dl>
<dd>

**$networkUuidLocal:** `?string` — Filter by local network uuid.

</dd>
</dl>

<dl>
<dd>

**$networkUuidPeer:** `?string` — Filter by peer network uuid.

</dd>
</dl>

<dl>
<dd>

**$label:** `?string` — Label filter in the form key=value. Can be specified multiple times to filter by multiple labels.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;networkPeering-&gt;createNetworkPeering($request) -> NetworkPeering</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Network peerings are used to enable traffic between two networks that can be on different main accounts.
The peering must be established both ways before it's considered as active. Peering is only supported between networks
of type `private`.

**Note**: you should only create peering between accounts and networks you trust. There is no limits on what traffic
can flow. The server firewall **has no effect** for `private` type networks.

It is required that both networks have a *Router* attached to the network.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$configuredStatus:** `?string`

</dd>
</dl>

<dl>
<dd>

**$name:** `string`

</dd>
</dl>

<dl>
<dd>

**$network:** `NetworkPeeringCreateNetwork` — Describes the local side of the peering

</dd>
</dl>

<dl>
<dd>

**$peerNetwork:** `NetworkPeeringCreatePeerNetwork` — Describes the peer side of the peering

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;networkPeering-&gt;getNetworkPeering($peeringUuid) -> NetworkPeering</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the state of an existing network peering.

Note that the `peer_network` field only contains the network details if the peering has been defined by both accounts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->networkPeering->getNetworkPeering(
    'peering_uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$peeringUuid:** `string` — The network peering identifier.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;networkPeering-&gt;deleteNetworkPeering($peeringUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a network peering. It is required that the peering is in `disabled` state before delete is possible.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->networkPeering->deleteNetworkPeering(
    'peering_uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$peeringUuid:** `string` — The network peering identifier.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;networkPeering-&gt;modifyNetworkPeering($peeringUuid, $request) -> NetworkPeering</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies attributes of an existing network peering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->networkPeering->modifyNetworkPeering(
    'peering_uuid',
    new NetworkPeeringModify([
        'configuredStatus' => NetworkPeeringModifyConfiguredStatus::Disabled->value,
        'name' => 'Peering A->B modified',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$peeringUuid:** `string` — The network peering identifier.

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `?string`

</dd>
</dl>

<dl>
<dd>

**$name:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## network
<details><summary><code>$client-&gt;network-&gt;listNetworks($request) -> Networks</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a list of all networks.

It is also possible to filter networks with label URL parameters, e.g.
`?label=env` or `?label=env%3Dprod`. URL parameter can be given multiple
times to add more filters (e.g. `?label=env%3Dprod&label=v2`), where
only networks that match all labels are returned.
Label keys are matched case insensitively.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->listNetworks(
    new ListNetworksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?NetworkLabel` — Filter networks by labels.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;createNetwork($request) -> Network</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new SDN private network that cloud servers from the same zone can be attached to.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->createNetwork(
    new CreateNetworkRequest([
        'network' => new CreateNetworkRequestNetwork([
            'type' => NetworkType::Private_->value,
            'name' => 'backend-net',
            'zone' => 'fi-hel2',
            'ipNetworks' => new CreateNetworkRequestNetworkIpNetworks([
                'ipNetwork' => [
                    new CreateNetworkRequestNetworkIpNetworksIpNetworkItem([
                        'family' => NetworkIpFamily::IPv4->value,
                        'address' => '10.0.0.0/24',
                        'dhcp' => NetworkBooleanYesno::Yes->value,
                    ]),
                ],
            ]),
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$network:** `CreateNetworkRequestNetwork`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;listNetworkInterfaces() -> NetworkInterfaces</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of network interfaces.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->listNetworkInterfaces();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;createNetworkInterface($request) -> NetworkInterface</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new network interface.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->createNetworkInterface(
    new NetworkCreateInterfaceRequest([
        'mainAccountId' => 123456,
        'interface' => new NetworkCreateInterfaceRequestInterface([
            'bootable' => NetworkBooleanYesno::No->value,
            'network' => '8f6d1ec2-8f5e-4b67-8fcb-6fa9c1a8a001',
            'sourceIpFiltering' => NetworkBooleanYesno::Yes->value,
            'type' => NetworkType::Private_->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$mainAccountId:** `?int`

</dd>
</dl>

<dl>
<dd>

**$interface_:** `?NetworkCreateInterfaceRequestInterface`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;getNetworkInterfaceDetails($uuid) -> Network</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves details of a specific network interface.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->getNetworkInterfaceDetails(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID of the network interface.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;deleteNetworkInterface($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a specific network interface.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->deleteNetworkInterface(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID of the network.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;getNetworkDetails($uuid) -> Network</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves details of a specific network.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->getNetworkDetails(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID of the network.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;modifyNetwork($uuid, $request) -> Network</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies the details of a specific SDN private network. The Utility and public networks cannot be modified.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->modifyNetwork(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ModifyNetworkRequest([
        'network' => new ModifyNetworkRequestNetwork([
            'type' => NetworkType::Public_->value,
            'name' => 'name',
            'zone' => 'fi-hel1',
            'tags' => new NetworkTags([
                'tags' => new NetworkTagsTags([
                    'tag' => [
                        new NetworkTagsTagsTagItem([
                            'description' => 'Production servers',
                            'name' => 'PROD',
                            'servers' => new NetworkServers([
                                'server' => [
                                    '0077fa3d-32db-4b09-9f5f-30d9e9afb565',
                                ],
                            ]),
                        ]),
                    ],
                ]),
            ]),
            'labels' => new NetworkLabels([
                'label' => [
                    new NetworkLabel([
                        'key' => 'env',
                        'value' => 'prod',
                    ]),
                    new NetworkLabel([
                        'key' => 'team',
                        'value' => 'network',
                    ]),
                ],
            ]),
            'router' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            'grtExport' => 1000000,
            'parentNetwork' => 'parent_network',
            'ipNetworks' => new ModifyNetworkRequestNetworkIpNetworks([
                'ipNetwork' => [
                    new ModifyNetworkRequestNetworkIpNetworksIpNetworkItem([
                        'family' => NetworkIpFamily::IPv4->value,
                        'address' => 'address',
                    ]),
                ],
            ]),
            'networkFeatures' => NetworkFeatures::AllowLinklocalAddress->value,
            'mainAccountId' => 1000000,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID of the network.

</dd>
</dl>

<dl>
<dd>

**$network:** `ModifyNetworkRequestNetwork`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;network-&gt;deleteNetwork($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes an SDN private network. All attached cloud servers must first be detached before SDN private networks can be deleted. Utility and public networks can only be detached from servers by [Releasing the corresponding IP addresses](https://upcloudltd.github.io/upcloud-openapi-spec/api/ip-address#delete-ip-address).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->network->deleteNetwork(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — UUID of the network.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## audit-logs
<details><summary><code>$client-&gt;auditLogs-&gt;listAuditLogs($request) -> AuditLogsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of audit log rows according to the query parameters. Note that this endpoint is paginated by default and the list is limited in results.

Pagination
Upcloud-Total-Count header is included in the response to indicate the total number of audit logs available with the current query parameters (excluding limit and offset). The total count can be used for a number of pagination strategies. limit and offset query parameters can be used to finally paginate the results.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->auditLogs->listAuditLogs(
    new ListAuditLogsRequest([
        'q' => 'my_account',
        'limit' => 50,
        'offset' => 0,
        'createdAfter' => new DateTime('2024-01-01T00:00:00Z'),
        'createdBefore' => new DateTime('2024-12-31T23:59:59Z'),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$q:** `?string` — Filter audit logs using a keyword such as account username, resource ID or IP address.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of results to return (max 100, default 50)

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results. (default 0)

</dd>
</dl>

<dl>
<dd>

**$actions:** `?string` — List of actions to filter by

</dd>
</dl>

<dl>
<dd>

**$origins:** `?string` — List of origins to filter by

</dd>
</dl>

<dl>
<dd>

**$resourceTypes:** `?string` — List of resource types to filter by

</dd>
</dl>

<dl>
<dd>

**$createdAfter:** `?DateTime` — List audit logs created after the given timestamp (including the time of timestamp). Format: ISO timestamp eg. 2024-01-01T23:45:56Z

</dd>
</dl>

<dl>
<dd>

**$createdBefore:** `?DateTime` — List audit logs created before the given timestamp (including the time of timestamp). Format: ISO timestamp eg. 2024-01-01T23:45:56Z

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;auditLogs-&gt;exportAuditLogs($request) -> AuditLogsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Export all audit logs for the authenticated account as CSV or JSON (up to 180 day limit). Note: Use the format parameter to specify output format; only JSON schema is documented here.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->auditLogs->exportAuditLogs(
    new ExportAuditLogsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$format:** `?string` — Export format: 'csv' or 'json' (default: csv)

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;auditLogs-&gt;getAuditLog($cloudEventId) -> AuditLogsAuditLog</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns details of a single audit log event by its cloud event ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->auditLogs->getAuditLog(
    '01HQXYZ123456789ABCDEFGHJK',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$cloudEventId:** `string` — Cloud event ID (ULID format)

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;auditLogs-&gt;getFilterOptions() -> AuditLogsFilterOptionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns lists of available resource types, actions, and origins for filtering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->auditLogs->getFilterOptions();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## partner
<details><summary><code>$client-&gt;partner-&gt;listPartnerAccounts() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns list of accounts associated with the partner.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partner->listPartnerAccounts();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;partner-&gt;createPartnerAccount($request) -> PartnerAccount</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates new UpCloud account that will be linked to partner's existing invoicing.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->partner->createPartnerAccount(
    new PartnerCreateAccount([
        'username' => 'newuser',
        'password' => 'superSecret123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$username:** `string`

</dd>
</dl>

<dl>
<dd>

**$password:** `string`

</dd>
</dl>

<dl>
<dd>

**$contactDetails:** `?PartnerCreateAccountContactDetails`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## permission
<details><summary><code>$client-&gt;permission-&gt;listPermissions() -> Permissions</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of permissions for sub-accounts to access resources owned by the main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->permission->listPermissions();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;permission-&gt;replacePermissions($request) -> Permissions</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces the entire set of permissions for sub-accounts to access resources owned by the main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->permission->replacePermissions(
    new Permission([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `Permission`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;permission-&gt;grantPermission($request) -> Permission</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Grants a permission for a sub-account to access a resource owned by the main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->permission->grantPermission(
    new GrantPermissionRequest([
        'body' => new Permission([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$skipTargetCheck:** `?bool` — If true, skips the check whether the target resource exists. Default is false.

</dd>
</dl>

<dl>
<dd>

**$request:** `Permission`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;permission-&gt;revokePermission($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revokes a permission for a sub-account to access a resource owned by the main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->permission->revokePermission(
    new Permission([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `Permission`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;permission-&gt;revokeAllPermissionsByTarget($targetType, $targetIdentifier, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revokes all permissions for sub-accounts to access a specific resource owned by the main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->permission->revokeAllPermissionsByTarget(
    'target_type',
    'target_identifier',
    new RevokeAllPermissionsByTargetRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$targetType:** `string` — The type of the target resource (e.g., "server", "storage").

</dd>
</dl>

<dl>
<dd>

**$targetIdentifier:** `string` — The identifier of the target resource.

</dd>
</dl>

<dl>
<dd>

**$mainAccountId:** `?int` — If specified, revokes permissions for resources owned by the specified main account ID. Default is the current main account.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;permission-&gt;revokeAllPermissionsByUser($user)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revokes all permissions for a specific sub-account to access any resources owned by the main account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->permission->revokeAllPermissionsByUser(
    'user',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$user:** `string` — The username of the sub-account.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## plan
<details><summary><code>$client-&gt;plan-&gt;listPlans() -> Plan</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available plans. All plans are available in all zones but pricing may differ. See _List prices_ for how to obtain current price list.

In addition to listed plans, server can be freely configured with "custom" plan which allows freely scalable CPU cores, memory amount and storage resources. __Note!__ Custom plans are available for new customers through contact with sales.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->plan->listPlans();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## price
<details><summary><code>$client-&gt;price-&gt;getPrice($request) -> Prices</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a price list.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->price->getPrice(
    new GetPriceRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$zone:** `?string` — Filter results to a specific zone. Can be specified multiple times.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## router
<details><summary><code>$client-&gt;router-&gt;listRouters($request) -> Routers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of all available routers associated with the current account.

It is also possible to filter routers with label URL parameters, e.g.
`?label=env` or `?label=env%3Dprod`. URL parameter can be given multiple
times to add more filters (e.g. `?label=env%3Dprod&label=v2`), where
only routers that match all labels are returned.
Label keys are matched case insensitively.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->router->listRouters(
    new ListRoutersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?RouterLabel` — A label filter. Can be specified multiple times to create an AND condition. Format: label=key:value

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;router-&gt;createRouter($request) -> Router</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new router.
Routers can be used to connect multiple Private Networks. Cloud Servers on any attached network can communicate
directly with each other.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->router->createRouter(
    new RouterCreate([
        'router' => new RouterCreateRouter([
            'name' => 'Example router',
            'staticRoutes' => [
                new RouterCreateRouterStaticRoutesItem([
                    'name' => 'static-route-0',
                    'nexthop' => '192.168.1.1',
                    'route' => '0.0.0.0/0',
                ]),
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$router:** `RouterCreateRouter`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;router-&gt;getRouter($router) -> Router</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves details of a specific router.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->router->getRouter(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$router:** `string` — The router identifier.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;router-&gt;deleteRouter($router)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a specific router.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->router->deleteRouter(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$router:** `string` — The router identifier.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;router-&gt;modifyRouter($router, $request) -> Router</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies attributes of a specific router.
Modifications to static routes of type `service` will be ignored.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->router->modifyRouter(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new RouterModify([
        'routerModifyRouter' => new RouterModifyRouter([
            'name' => 'Example router',
            'staticRoutes' => [
                new RouterModifyRouterStaticRoutesItem([
                    'name' => 'static-route-0',
                    'nexthop' => '192.168.1.1',
                    'route' => '0.0.0.0/0',
                ]),
            ],
            'labels' => [
                new RouterLabel([
                    'key' => 'service',
                    'value' => 'postgres cluster connectivity',
                ]),
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$router:** `string` — The router identifier.

</dd>
</dl>

<dl>
<dd>

**$routerModifyRouter:** `RouterModifyRouter`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## server-group
<details><summary><code>$client-&gt;serverGroup-&gt;listServerGroups($request) -> ServerGroups</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of server groups.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverGroup->listServerGroups(
    new ListServerGroupsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?ServerGroupLabel` — A label filter to apply. Format: key:value. Multiple labels can be specified by repeating the parameter.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverGroup-&gt;createServerGroup($request) -> ServerGroup</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new server group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverGroup->createServerGroup(
    new ServerGroupModify([
        'serverGroup' => new ServerGroupModifyServerGroup([
            'title' => 'edge-cluster-a',
            'servers' => new ServerGroupServers([
                'servers' => [
                    '00fce2f9-f9f4-46ff-86af-9e60f131f5cb',
                ],
            ]),
            'labels' => new ServerGroupModifyServerGroupLabels([
                'label' => [
                    new ServerGroupLabel([
                        'key' => 'env',
                        'value' => 'prod',
                    ]),
                ],
            ]),
            'antiAffinity' => ServerGroupAntiAffinity::Yes->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `ServerGroupModify`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverGroup-&gt;getServerGroup($uuid) -> ServerGroup</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves details of a specific server group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverGroup->getServerGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — The UUID of the server group to retrieve.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverGroup-&gt;deleteServerGroup($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a specific server group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverGroup->deleteServerGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — The UUID of the server group to delete.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverGroup-&gt;modifyServerGroup($uuid, $request) -> ServerGroup</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies an existing server group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverGroup->modifyServerGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ModifyServerGroupRequest([
        'body' => new ServerGroupModify([
            'serverGroup' => new ServerGroupModifyServerGroup([
                'title' => 'edge-cluster-a',
                'servers' => new ServerGroupServers([
                    'servers' => [
                        '00fce2f9-f9f4-46ff-86af-9e60f131f5cb',
                    ],
                ]),
                'labels' => new ServerGroupModifyServerGroupLabels([
                    'label' => [
                        new ServerGroupLabel([
                            'key' => 'env',
                            'value' => 'prod',
                        ]),
                    ],
                ]),
                'antiAffinity' => ServerGroupAntiAffinity::Yes->value,
            ]),
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — The UUID of the server group to modify.

</dd>
</dl>

<dl>
<dd>

**$request:** `ServerGroupModify`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverGroup-&gt;listServerGroupMembers($uuid) -> ServerGroupServers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of servers that are members of a specific server group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverGroup->listServerGroupMembers(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — The UUID of the server group whose members are to be listed.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverGroup-&gt;addServerToGroup($uuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds a server to a specific server group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — The UUID of the server group to which the server will be added.

</dd>
</dl>

<dl>
<dd>

**$server:** `ServerGroupServerAddServer`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverGroup-&gt;removeServerFromGroup($uuid, $serverUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes a server from a specific server group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverGroup->removeServerFromGroup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — The UUID of the server group from which the server will be removed.

</dd>
</dl>

<dl>
<dd>

**$serverUuid:** `string` — The UUID of the server to remove from the group.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## server
<details><summary><code>$client-&gt;server-&gt;listServers($request) -> GetServerList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the most relevant information for Cloud Servers associated with the current account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->listServers(
    new ListServersRequest([
        'uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
        'host' => 7653311107,
        'tag' => 'prod,web',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair using "key" or "key=value". Repeat the parameter to require all labels.

</dd>
</dl>

<dl>
<dd>

**$uuid:** `?string` — Filter by Cloud Server UUID. Repeat the parameter to match any of up to five UUIDs.

</dd>
</dl>

<dl>
<dd>

**$host:** `?int` — Filter by Private Cloud host ID. Repeat the parameter to match any of up to five hosts.

</dd>
</dl>

<dl>
<dd>

**$device:** `?string` — Filter by attached device using "type=gpu" or "type!=gpu". Repeat the parameter for up to five filters.

</dd>
</dl>

<dl>
<dd>

**$state:** `?string` — Filter by the current Cloud Server state.

</dd>
</dl>

<dl>
<dd>

**$tag:** `?string` — Filter by tag name. Separate names with commas to match any tag or colons to require all tags.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search UUIDs, titles, hostnames, zones, zone descriptions, IP addresses, tags, and template names.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field to sort by.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Only applied when sort_by is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of Cloud Servers to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of Cloud Servers to skip.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;createServer($request) -> CreateServerResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new Cloud Server
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->createServer(
    new CreateServer([
        'server' => new CreateServerServer([
            'hostname' => 'my-server.example.com',
            'loginUser' => new ServerLoginUser([
                'sshKeys' => new ServerLoginUserSshKeys([
                    'sshKey' => [
                        'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIO3t5AQcuv4+KxJ5rC75N8bW/e7eOq0k5Y2L7V1oH3Z5 user@example.com',
                    ],
                ]),
                'username' => 'upclouduser',
            ]),
            'networking' => new ServerCreateNetworking([
                'interfaces' => new ServerCreateNetworkingInterfaces([
                    'interface' => [
                        new ServerCreateNetworkingInterfacesInterfaceItem([
                            'ipAddresses' => new ServerCreateNetworkingInterfacesInterfaceItemIpAddresses([
                                'ipAddress' => [
                                    new ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem([
                                        'family' => ServerIpFamily::IPv4->value,
                                    ]),
                                ],
                            ]),
                            'type' => ServerNetworkType::Public_->value,
                        ]),
                        new ServerCreateNetworkingInterfacesInterfaceItem([
                            'ipAddresses' => new ServerCreateNetworkingInterfacesInterfaceItemIpAddresses([
                                'ipAddress' => [
                                    new ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem([
                                        'family' => ServerIpFamily::IPv4->value,
                                    ]),
                                ],
                            ]),
                            'type' => ServerNetworkType::Utility->value,
                        ]),
                        new ServerCreateNetworkingInterfacesInterfaceItem([
                            'ipAddresses' => new ServerCreateNetworkingInterfacesInterfaceItemIpAddresses([
                                'ipAddress' => [
                                    new ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem([
                                        'family' => ServerIpFamily::IPv4->value,
                                    ]),
                                ],
                            ]),
                            'network' => '03000000-0000-4000-8000-000000000000',
                            'type' => ServerNetworkType::Private_->value,
                        ]),
                    ],
                ]),
            ]),
            'plan' => '1xCPU-1GB',
            'metadata' => ServerBooleanYesno::Yes->value,
            'storageDevices' => new ServerStorageDevices([
                'storageDevice' => [
                    new ServerStorageDevicesStorageDeviceItem([
                        'action' => ServerStorageDevicesStorageDeviceItemAction::Clone_->value,
                        'size' => 30,
                        'storage' => '01000000-0000-4000-8000-000020080100',
                        'tier' => 'maxiops',
                        'title' => 'Debian Trixie',
                    ]),
                ],
            ]),
            'title' => 'My Server',
            'zone' => 'fi-hel1',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$server:** `CreateServerServer`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;listFirewallRulesetRelationships($rulesetUuid) -> FirewallRulesetRelatedServers</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return Cloud Servers visible to the authenticated account that are related to a private firewall ruleset, including each Cloud Server's private ruleset relationships.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->listFirewallRulesetRelationships(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getLabels() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the unique label key-value pairs used by Cloud Servers accessible to the current account.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getLabels();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getServer($uuid) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns detailed information about a Cloud Server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;modifyServer($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies an existing Cloud Server configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->modifyServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ModifyServer([
        'server' => new ModifyServerServer([
            'coreNumber' => 8,
            'memoryAmount' => 16384,
            'plan' => 'custom',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$server:** `ModifyServerServer`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;deleteServer($uuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a stopped Cloud Server and releases its IP addresses. Deleting backups requires deleting the associated storage devices.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->deleteServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new DeleteServerRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$storages:** `?string` — Whether to delete attached storage devices.

</dd>
</dl>

<dl>
<dd>

**$backups:** `?string` — How to handle backups when deleting storage devices. The delete value is valid only when storages is set to a truthy value.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;attachPrivateFirewallRuleset($uuid, $request) -> ServerFirewallRulesetRelationship</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attach a private, stateful firewall ruleset to a Cloud Server. The latest ruleset version is selected and applied to private network interfaces.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->attachPrivateFirewallRuleset(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerAttachPrivateFirewallRuleset([
        'firewallRuleset' => new ServerAttachPrivateFirewallRulesetFirewallRuleset([
            'firewallRulesetUuid' => '190f56d8-4b3f-4a89-9e5f-320fbc3d17c8',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$firewallRuleset:** `ServerAttachPrivateFirewallRulesetFirewallRuleset` — Private firewall ruleset to attach.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;cancelServerOperation($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels an operation while the Cloud Server is in maintenance state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->cancelServerOperation(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;ejectCdrom($uuid) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Eject the storage from the Cloud Server's attached CD-ROM device.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->ejectCdrom(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;loadCdrom($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Load a storage of type normal or cdrom into the Cloud Server's attached CD-ROM device. If media is already loaded, it is ejected first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->loadCdrom(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerLoadCdrom([
        'storageDevice' => new ServerLoadCdromStorageDevice([
            'storage' => '01000000-0000-4000-8000-000060010101',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$storageDevice:** `ServerLoadCdromStorageDevice` — Storage to load into the attached CD-ROM device.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;detachPrivateFirewallRuleset($uuid, $request) -> ServerFirewallRulesetRelationship</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detach a private firewall ruleset from a Cloud Server and reapply private-interface firewall rules.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->detachPrivateFirewallRuleset(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerDetachPrivateFirewallRuleset([
        'firewallRuleset' => new ServerDetachPrivateFirewallRulesetFirewallRuleset([
            'firewallRulesetUuid' => '190f56d8-4b3f-4a89-9e5f-320fbc3d17c8',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$firewallRuleset:** `ServerDetachPrivateFirewallRulesetFirewallRuleset` — Private firewall ruleset to detach.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;listFirewallRules($uuid) -> ServerFirewallRules</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return the Cloud Server firewall rules in evaluation order. Changes to firewall rules can take 1-2 minutes to take effect.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->listFirewallRules(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;createFirewallRule($uuid, $request) -> ServerFirewallRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a firewall rule. Rules are evaluated in position order; if position is omitted, the rule is appended. Changes can take 1-2 minutes to take effect.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->createFirewallRule(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerCreateFirewallRule([
        'firewallRule' => new ServerCreateFirewallRuleFirewallRule([
            'action' => ServerCreateFirewallRuleFirewallRuleAction::Accept->value,
            'comment' => 'Allow SSH from the office network',
            'destinationPortEnd' => '22',
            'destinationPortStart' => '22',
            'direction' => ServerCreateFirewallRuleFirewallRuleDirection::In->value,
            'family' => ServerCreateFirewallRuleFirewallRuleFamily::IPv4->value,
            'position' => '1',
            'protocol' => ServerCreateFirewallRuleFirewallRuleProtocol::Tcp->value,
            'sourceAddressEnd' => '192.0.2.255',
            'sourceAddressStart' => '192.0.2.1',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$firewallRule:** `ServerCreateFirewallRuleFirewallRule`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;updateFirewallRules($uuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replace the Cloud Server's complete firewall rule chain. Array order determines rule positions. Changes can take 1-2 minutes to take effect.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->updateFirewallRules(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerUpdateFirewallRules([
        'firewallRules' => new ServerUpdateFirewallRulesFirewallRules([
            'firewallRule' => [
                new ServerFirewallRuleItem([
                    'action' => ServerFirewallRuleItemAction::Accept->value,
                    'comment' => 'Allow SSH',
                    'destinationPortEnd' => '22',
                    'destinationPortStart' => '22',
                    'direction' => ServerFirewallRuleItemDirection::In->value,
                    'family' => ServerFirewallRuleItemFamily::IPv4->value,
                    'protocol' => ServerFirewallRuleItemProtocol::Tcp->value,
                ]),
                new ServerFirewallRuleItem([
                    'action' => ServerFirewallRuleItemAction::Drop->value,
                    'direction' => ServerFirewallRuleItemDirection::In->value,
                ]),
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$firewallRules:** `ServerUpdateFirewallRulesFirewallRules`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getFirewallRule($uuid, $position) -> ServerFirewallRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return the firewall rule at the specified one-based position in the Cloud Server rule chain.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getFirewallRule(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$position:** `int` — Firewall rule position

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;deleteFirewallRule($uuid, $position)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete the firewall rule at the specified one-based position. Remaining rules are renumbered. Changes can take 1-2 minutes to take effect.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->deleteFirewallRule(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$position:** `int` — Firewall rule position

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;listPrivateFirewallRulesetRelationships($uuid) -> ServerFirewallRulesetRelationships</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return all private firewall ruleset relationships configured for a Cloud Server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->listPrivateFirewallRulesetRelationships(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;listServerGpUs($uuid) -> ServerGpus</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns GPUs attached to a Cloud Server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->listServerGpUs(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getServerNetworking($uuid) -> ServerNetworkingResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return all network interfaces and IP addresses configured for a Cloud Server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getServerNetworking(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;addServerInterface($uuid, $request) -> ServerInterfaceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add a network interface to a stopped Cloud Server. A private interface must identify the SDN network to attach. The combined limit of network interfaces and storage devices is 24.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->addServerInterface(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerAddInterface([
        'interface' => new ServerAddInterfaceInterface([
            'ipAddresses' => new ServerAddInterfaceInterfaceIpAddresses([
                'ipAddress' => [
                    new ServerAddInterfaceInterfaceIpAddressesIpAddressItem([
                        'address' => '10.0.0.20',
                        'dhcpProvided' => ServerBooleanYesno::Yes->value,
                        'family' => ServerIpFamily::IPv4->value,
                    ]),
                ],
            ]),
            'network' => '0374ce47-4303-4490-987d-32dc96cfd79b',
            'sourceIpFiltering' => ServerBooleanYesno::Yes->value,
            'type' => ServerNetworkType::Private_->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$interface_:** `ServerAddInterfaceInterface`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;modifyServerInterface($uuid, $index, $request) -> ServerInterfaceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modify the IP addresses, source IP filtering, boot setting, or index of a network interface on a stopped Cloud Server. Changing the interface network or type is not supported.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->modifyServerInterface(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    1,
    new ServerModifyInterface([
        'interface' => new ServerModifyInterfaceInterface([
            'bootable' => ServerBooleanYesno::Yes->value,
            'index' => 5,
            'sourceIpFiltering' => ServerBooleanYesno::No->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$index:** `int` — Network interface index

</dd>
</dl>

<dl>
<dd>

**$interface_:** `ServerModifyInterfaceInterface`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;deleteServerInterface($uuid, $index)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a network interface from a stopped Cloud Server. IP addresses attached to the interface are released according to their release policies.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->deleteServerInterface(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$index:** `int` — Network interface index

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;addServerInterfaceIpAddress($uuid, $index, $request) -> ServerIpAddressInterfaceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add an IPv4 or IPv6 address to a private network interface. The interface cannot contain addresses from both families and can have at most five addresses.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->addServerInterfaceIpAddress(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    1,
    new ServerAddIpAddress([
        'ipAddress' => new ServerAddIpAddressIpAddress([
            'address' => '10.0.0.30',
            'family' => ServerIpFamily::IPv4->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$index:** `int` — Network interface index

</dd>
</dl>

<dl>
<dd>

**$force:** `?string` — Move the address from another interface when that interface can retain its required minimum number of addresses

</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `ServerAddIpAddressIpAddress`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;deleteServerInterfaceIpAddress($uuid, $index, $ip)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete an IP address from a private network interface. At least one IP address must remain attached to the interface.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->deleteServerInterfaceIpAddress(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    1,
    'ip',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$index:** `int` — Network interface index

</dd>
</dl>

<dl>
<dd>

**$ip:** `string` — IP address to delete

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;rebuildServer($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Reinstalls a stopped Cloud Server from a public template.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->rebuildServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerRebuild([
        'serverRebuild' => new ServerRebuildServerRebuild([
            'cloneSource' => '01000000-0000-4000-8000-000020050100',
            'deleteDetachedDisk' => ServerLegacyBoolean::Yes->value,
            'detachDisk' => '0169b4f8-051c-4a86-9484-f5b798249949',
            'encrypted' => ServerLegacyBoolean::Yes->value,
            'loginUser' => new ServerRebuildServerRebuildLoginUser([
                'createPassword' => ServerLegacyBoolean::No->value,
                'sshKeys' => new ServerRebuildServerRebuildLoginUserSshKeys([
                    'sshKey' => [
                        'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIEexamplekey user@example',
                    ],
                ]),
                'username' => 'debian',
            ]),
            'passwordDelivery' => ServerRebuildServerRebuildPasswordDelivery::None->value,
            'storageTitle' => 'Rebuilt system disk',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$serverRebuild:** `ServerRebuildServerRebuild`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;relocateServer($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Relocates a stopped Cloud Server to another zone in the same physical location (datacenter).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->relocateServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new RelocateServer([
        'zone' => 'fi-hel2',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$zone:** `string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getRemoteAccessDetails($uuid) -> ServerRemoteAccessDetails</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns remote access settings and VNC connection details for a Cloud Server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getRemoteAccessDetails(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;restartServer($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stops and starts a Cloud Server in started state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->restartServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new RestartServer([
        'restartServer' => new RestartServerRestartServerStopType([
            'stopType' => RestartServerRestartServerStopTypeStopType::Hard->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$restartServer:** `mixed`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;startServer($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Starts a Cloud Server in stopped state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->startServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new StartServer([
        'server' => new StartServerServer([
            'host' => 8055964291,
            'startType' => StartServerServerStartType::Sync->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$server:** `StartServerServer`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getCpuStats($uuid) -> ServerCpuStats</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns CPU usage statistics for all supported periods.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getCpuStats(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getCpuStatsByPeriod($uuid, $period) -> ServerCpuStats</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns CPU usage statistics for the selected period.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getCpuStatsByPeriod(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    ServerStatsPeriod::Daily->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$period:** `string` — Statistics period.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getDiskStats($uuid, $type) -> ServerDiskStats</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregate disk read and write statistics for all supported periods.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getDiskStats(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    GetDiskStatsRequestType::Bytes->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Measure disk activity as transferred bytes or I/O requests.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getDiskStatsByPeriod($uuid, $type, $period) -> ServerDiskStats</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregate disk read and write statistics for the selected period.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getDiskStatsByPeriod(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    GetDiskStatsByPeriodRequestType::Bytes->value,
    ServerStatsPeriod::Daily->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Measure disk activity as transferred bytes or I/O requests.

</dd>
</dl>

<dl>
<dd>

**$period:** `string` — Statistics period.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getNetworkStats($uuid, $type) -> ServerNetworkStats</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns aggregate inbound and outbound network statistics for all interfaces and periods.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getNetworkStats(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    ServerStatsNetworkType::Bytes->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Measure network activity as transferred bytes or packets.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getNetworkStatsByNetwork($uuid, $type, $network) -> ServerNetworkStats</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns inbound and outbound network statistics for the selected network type and all periods.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getNetworkStatsByNetwork(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    ServerStatsNetworkType::Bytes->value,
    ServerNetworkType::Public_->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Measure network activity as transferred bytes or packets.

</dd>
</dl>

<dl>
<dd>

**$network:** `string` — Network access type to aggregate.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getNetworkStatsByNetworkAndPeriod($uuid, $type, $network, $period) -> ServerNetworkStats</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns inbound and outbound network statistics for the selected network type and period.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getNetworkStatsByNetworkAndPeriod(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    ServerStatsNetworkType::Bytes->value,
    ServerNetworkType::Public_->value,
    ServerStatsPeriod::Daily->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$type:** `string` — Measure network activity as transferred bytes or packets.

</dd>
</dl>

<dl>
<dd>

**$network:** `string` — Network access type to aggregate.

</dd>
</dl>

<dl>
<dd>

**$period:** `string` — Statistics period.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;stopServer($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Stops a Cloud Server in started state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->stopServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new StopServer([
        'stopServer' => new StopServerStopServer([
            'stopType' => StopServerStopServerStopType::Soft->value,
            'timeout' => '60',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$stopServer:** `StopServerStopServer`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;attachStorageDevice($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attach a storage resource as a disk or CD-ROM device to a Cloud Server. SCSI and virtio disks can be attached while the Cloud Server is started; IDE and CD-ROM devices require a stopped Cloud Server. An empty CD-ROM device can be attached without specifying a storage resource.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->attachStorageDevice(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerAttachStorage([
        'storageDevice' => new ServerAttachStorageStorageDevice([
            'address' => 'virtio:0',
            'bootDisk' => 1,
            'storage' => '012580a1-32a1-466e-a323-689ca16f2d43',
            'type' => ServerAttachStorageStorageDeviceType::Disk->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$storageDevice:** `ServerAttachStorageStorageDevice` — Storage device to attach.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;detachStorageDevice($uuid, $request) -> Server</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detach a storage device identified by its device address or storage resource UUID. IDE and CD-ROM devices cannot be detached while the Cloud Server is started.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->detachStorageDevice(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ServerDetachStorage([
        'storageDevice' => [
            'address' => "virtio:0",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>

<dl>
<dd>

**$storageDevice:** `mixed`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;server-&gt;getVncDetails($uuid) -> ServerRemoteAccessDetails</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns VNC connection details and remote access settings for a Cloud Server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->server->getVncDetails(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Cloud Server UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## server_size
<details><summary><code>$client-&gt;serverSize-&gt;listServerSizes() -> ServerSizes</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of available server sizes (combinations of memory and CPU cores).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverSize->listServerSizes();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;serverSize-&gt;getServerSizeLimits() -> ServerSizeLimits</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves the minimum and maximum limits for server sizes, including any zone-specific limits for private zones.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->serverSize->getServerSizeLimits();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## storage
<details><summary><code>$client-&gt;storage-&gt;getStorageList($request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all storage resources accessible to the account. The results can be filtered by labels or a title and UUID search, sorted, and paginated.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageList(
    new GetStorageListRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;createStorage($request) -> CreateStorageResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a block storage resource in a specific zone. The new block storage is not attached to a Cloud Server.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->createStorage(
    new CreateStorageRequest([
        'storage' => new CreateStorageRequestStorage([
            'backupRule' => new StorageBackupRule([
                'interval' => StorageBackupRuleInterval::Daily->value,
                'time' => '0400',
                'retention' => '7',
            ]),
            'encrypted' => StorageEncrypted::Yes->value,
            'labels' => [
                new StorageLabel([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ],
            'size' => 50,
            'tier' => StorageTier::Maxiops->value,
            'title' => 'Block Storage 1',
            'zone' => 'fi-hel1',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$storage:** `CreateStorageRequestStorage` — Block storage creation parameters.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageListByBackup($request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns accessible storage resources whose type is `backup`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageListByBackup(
    new GetStorageListByBackupRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageListByCdrom($request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns accessible storage resources whose type is `cdrom`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageListByCdrom(
    new GetStorageListByCdromRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getFavoriteStorageList() -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the public templates and CD-ROM images that the account has marked as favorites.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getFavoriteStorageList();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageListByNormal($request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns accessible Block Storage resources whose type is `normal`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageListByNormal(
    new GetStorageListByNormalRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageListByPrivateAccess($request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns accessible storage resources whose access type is `private`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageListByPrivateAccess(
    new GetStorageListByPrivateAccessRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageListByPublicAccess($request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns accessible storage resources whose access type is `public`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageListByPublicAccess(
    new GetStorageListByPublicAccessRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageListByTemplate($request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns accessible storage resources whose type is `template`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageListByTemplate(
    new GetStorageListByTemplateRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageListByTypeAndAccess($type, $access, $request) -> Storages</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns accessible storage resources matching both the requested storage type and access type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageListByTypeAndAccess(
    StorageType::Normal->value,
    StorageAccessFilter::Public_->value,
    new GetStorageListByTypeAndAccessRequest([
        'label' => 'environment',
        'search' => 'database',
        'limit' => 25,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `string` — Storage resource type to return.

</dd>
</dl>

<dl>
<dd>

**$access:** `string` — Storage resource access type to return.

</dd>
</dl>

<dl>
<dd>

**$label:** `?string` — Filter by label key or key-value pair. Repeat the parameter to require multiple labels; label keys are matched case-insensitively.

</dd>
</dl>

<dl>
<dd>

**$search:** `?string` — Search storage resource titles and UUIDs by partial match.

</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — Field by which to sort the results.

</dd>
</dl>

<dl>
<dd>

**$orderBy:** `?string` — Sort direction. Used only when `sort_by` is specified.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Maximum number of storage resources to return.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Number of storage resources to skip before returning results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageInfo($uuid) -> Storage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns detailed information about a storage resource, including its current state, attachments, labels, and backup configuration when applicable.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageInfo(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;modifyStorage($uuid, $request) -> ModifyStorageResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies a block storage title, labels, automatic backup rule, or size. A new size must be greater than the current size. Set `filesystem_resize` to `yes` to also resize the last partition and its supported filesystem after increasing the block storage size.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->modifyStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new ModifyStorageBody([
        'storage' => new ModifyStorageBodyStorage([
            'size' => 100,
            'title' => 'Production data expanded',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Block storage UUID

</dd>
</dl>

<dl>
<dd>

**$storage:** `ModifyStorageBodyStorage` — Block storage properties to modify.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;deleteStorage($uuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Schedules an unattached private storage resource for deletion. Associated backups are kept by default unless another backup policy is selected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->deleteStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new DeleteStorageRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>

<dl>
<dd>

**$backups:** `?string` — Policy for handling backups when deleting a storage resource. Defaults to `keep`. Allowed values: keep, delete, keep_latest

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;attachStorageToServer($uuid, $request) -> AttachStorageResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches the storage resource to a Cloud Server in the same zone. The device defaults to a disk at the next available address. IDE and CD-ROM devices can be attached only while the Cloud Server is stopped; SCSI and VirtIO disks can also be attached while it is running.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->attachStorageToServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new AttachStorageRequest([
        'storageDevice' => new AttachStorageRequestStorageDevice([
            'server' => '00798b85-efdc-41ca-8021-f6ef457b8531',
            'type' => AttachStorageRequestStorageDeviceType::Disk->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>

<dl>
<dd>

**$storageDevice:** `AttachStorageRequestStorageDevice` — Parameters for attaching this storage resource to a Cloud Server in the same zone.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;createOnDemandBackup($uuid, $request) -> CreateStorageBackupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a point-in-time backup of private normal block storage. The operation is asynchronous: the source block storage is `backuping` while the backup is created, and the returned backup remains in `maintenance` until it is ready.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->createOnDemandBackup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new CreateStorageBackupRequest([
        'storage' => new CreateStorageBackupRequestStorage([
            'title' => 'Manually created backup',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Block storage UUID

</dd>
</dl>

<dl>
<dd>

**$storage:** `CreateStorageBackupRequestStorage` — Parameters for the point-in-time backup.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;cancelStorageOperation($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Requests cancellation of an interruptible operation on block storage in the `maintenance` state. For a running clone, cancellation removes the incomplete copy and returns the source block storage to the `online` state.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->cancelStorageOperation(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Block storage UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;cloneStorage($uuid, $request) -> CreateStorageResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a Block Storage copy of a storage resource. Cloning is asynchronous: the returned block storage remains in the `maintenance` state until the operation completes and can be monitored with the storage resource details endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->cloneStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new CloneStorageRequest([
        'storage' => new CloneStorageRequestStorage([
            'encrypted' => StorageEncrypted::Yes->value,
            'tier' => StorageTier::Maxiops->value,
            'title' => 'Cloned Block Storage',
            'zone' => 'fi-hel1',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>

<dl>
<dd>

**$storage:** `CloneStorageRequestStorage` — Parameters for the cloned block storage.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;detachStorageFromServer($uuid) -> DetachStorageResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detaches the storage resource from its attached Cloud Server. IDE and CD-ROM devices can be detached only while the Cloud Server is stopped; SCSI and VirtIO disks can also be detached while it is running. If the storage resource is already detached, it is returned unchanged.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->detachStorageFromServer(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;addStorageToFavorites($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds an accessible storage resource to the account's favorites. The operation succeeds if the storage resource is already a favorite.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->addStorageToFavorites(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;removeStorageFromFavorites($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes an accessible storage resource from the account's favorites. The operation succeeds if the storage resource is not a favorite.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->removeStorageFromFavorites(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;getStorageImportDetails($uuid) -> StorageImportResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns details of the latest import task for a storage resource, including its state, transferred byte counts, checksums, and any error information.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->getStorageImportDetails(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;createStorageImport($uuid, $request) -> StorageImportResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an asynchronous task that imports a raw disk image into existing Block Storage from an HTTP URL or a temporary direct-upload URL. Attached Cloud Servers must be stopped.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->createStorageImport(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new CreateStorageImportRequest([
        'storageImport' => new CreateStorageImportRequestStorageImport([
            'source' => CreateStorageImportRequestStorageImportSource::HttpImport->value,
            'sourceLocation' => 'https://example.com/disk.raw',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>

<dl>
<dd>

**$storageImport:** `CreateStorageImportRequestStorageImport` — Storage import parameters.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;cancelStorageImport($uuid) -> StorageImportResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Requests cancellation of an ongoing storage import. The task enters the `cancelling` state while imported data is rolled back when necessary.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->cancelStorageImport(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Storage resource UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;resizeStorage($uuid) -> ResizeStorageResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Resizes the last partition and its supported filesystem to use the block storage capacity already available. A backup is created before the operation and returned on success. Increase the block storage capacity first with the modify block storage endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->resizeStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Block storage UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;restoreStorageFromBackup($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Starts restoring the backup identified by `uuid` to its origin block storage. If the origin block storage is attached to a Cloud Server, the Cloud Server must be stopped.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->restoreStorageFromBackup(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Backup UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;storage-&gt;createTemplateFromStorage($uuid, $request) -> CreateStorageTemplateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a private template from private normal block storage. The operation is asynchronous: the returned template remains in `maintenance` until it is ready. Deployments from the template use the source block storage tier.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->storage->createTemplateFromStorage(
    '0414e0d7-4436-4037-9dd8-6eaf47dce599',
    new CreateStorageTemplateRequest([
        'storage' => new CreateStorageTemplateRequestStorage([
            'title' => 'My server template',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Block storage UUID

</dd>
</dl>

<dl>
<dd>

**$storage:** `CreateStorageTemplateRequestStorage` — Parameters for creating a template from the block storage.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## tag
<details><summary><code>$client-&gt;tag-&gt;listTags() -> Tags</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all existing tags with their properties and servers tagged.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tag->listTags();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tag-&gt;createTag($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new tag. Existing servers can be tagged in same request.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tag->createTag(
    new Tag([
        'tag' => new TagTag([
            'description' => 'Production servers',
            'name' => 'PROD',
            'servers' => new TagServers([
                'server' => [
                    '0077fa3d-32db-4b09-9f5f-30d9e9afb565',
                ],
            ]),
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `Tag`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tag-&gt;getTag($name) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns details for a specific tag.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tag->getTag(
    'DEV',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Tag name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tag-&gt;modifyTag($name, $request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Changes attributes of an existing tag
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tag->modifyTag(
    'DEV',
    new ModifyTagRequest([
        'body' => new Tag([
            'tag' => new TagTag([
                'description' => 'Production servers',
                'name' => 'PROD',
                'servers' => new TagServers([
                    'server' => [
                        '0077fa3d-32db-4b09-9f5f-30d9e9afb565',
                    ],
                ]),
            ]),
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Tag name

</dd>
</dl>

<dl>
<dd>

**$request:** `Tag`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tag-&gt;deleteTag($name)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a specific tag.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tag->deleteTag(
    'DEV',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Tag name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## timezone
<details><summary><code>$client-&gt;timezone-&gt;listTimezones() -> Timezones</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of supported timezones.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->timezone->listTimezones();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## account-tokens
<details><summary><code>$client-&gt;accountTokens-&gt;listTokens($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List all tokens for the currently authorized account.
The tokens are returned in a paged format, with the default page size being 20.
The maximum page size is 100.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accountTokens->listTokens(
    new ListTokensRequest([
        'gui' => true,
        'sort' => '+name,-created_at',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — How many tokens to return at per page

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset to start listing the tokens from

</dd>
</dl>

<dl>
<dd>

**$gui:** `?bool` — Filter tokens based on GUI flag (true or false). Default is no value, i.e. no filtering and all tokens are returned.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Comma-separated list of fields to sort by. Prefix with '+' for ascending or '-' for descending order. Supported fields: created_at, expires_at, last_used_at, name. Example: sort=+name,-created_at. If no prefix is given, descending is assumed. Follows OpenAPI collectionFormat 'csv'.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accountTokens-&gt;createToken($request) -> AccountTokensToken</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new API token. Maximum token validity is 24*365h=8760h (~1 year).
Attribute allowed_ip_prefixes allows defining a list of CIDR/IP addresses from where the token is accepted.
Empty list denies access from everywhere. If unset, the default list will be the IP filters of the account. If no IP filters are defined for the account either, the default will be ["0.0.0.0/0", "::0/0"], i.e. allow from any address.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accountTokens->createToken(
    new AccountTokensCreateTokenRequestExpiresIn([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `AccountTokensCreateTokenRequestExpiresIn|AccountTokensCreateTokenRequestExpiresAt`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accountTokens-&gt;getToken($tokenUuid) -> AccountTokensGetTokenResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the details of a specific API token.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accountTokens->getToken(
    'token-uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$tokenUuid:** `string` — The uuid of the token to get

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;accountTokens-&gt;revokeToken($tokenUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Revoke a specific API token.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->accountTokens->revokeToken(
    'token-uuid',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$tokenUuid:** `string` — The uuid of the token to delete

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## object-storage-2
<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorages($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of object storage services.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorages(
    new ListObjectStoragesRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Order of returned results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorage($request) -> ObjectStorage2ServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new object storage service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string`

</dd>
</dl>

<dl>
<dd>

**$region:** `string`

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array` — Networks to attach to the service. Private networks must reside in the same region as the object storage.

</dd>
</dl>

<dl>
<dd>

**$customDomains:** `?array` — Custom domains to attach to the service.

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels for classifying the service.

</dd>
</dl>

<dl>
<dd>

**$properties:** `?ObjectStorage2PropertiesCreate`

</dd>
</dl>

<dl>
<dd>

**$terminationProtection:** `?bool` — Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorage($serviceUuid) -> ObjectStorage2ServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns object storage service details by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorage(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;replaceObjectStorage($serviceUuid, $request) -> ObjectStorage2ServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces existing object storage service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the service.

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$terminationProtection:** `?bool` — Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array`

</dd>
</dl>

<dl>
<dd>

**$customDomains:** `?array`

</dd>
</dl>

<dl>
<dd>

**$staticWebsites:** `?array` — Static website configurations for this service. Array replaces all existing configurations.

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array`

</dd>
</dl>

<dl>
<dd>

**$properties:** `?ObjectStorage2PropertiesCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorage($serviceUuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing object storage service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorage(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DeleteObjectStorageRequest([
        'force' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$force:** `?bool` — If the parameter is provided, the deletion process starts even if the service is not empty.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;modifyObjectStorage($serviceUuid, $request) -> ObjectStorage2ServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing object storage service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `?string`

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `?string`

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array`

</dd>
</dl>

<dl>
<dd>

**$customDomains:** `?array`

</dd>
</dl>

<dl>
<dd>

**$staticWebsites:** `?array` — Static website configurations for this service. Array replaces all existing configurations.

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array`

</dd>
</dl>

<dl>
<dd>

**$properties:** `?ObjectStorage2PropertiesCreate`

</dd>
</dl>

<dl>
<dd>

**$terminationProtection:** `?bool` — Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageNetworks($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service networks by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageNetworks(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageNetwork($serviceUuid, $request) -> ObjectStorage2NetworkDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new service network by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2NetworkCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageNetwork($serviceUuid, $networkName) -> ObjectStorage2NetworkDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service network details by given {service_uuid} and {network_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — The name of the network.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageNetwork($serviceUuid, $networkName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing network by given {service_uuid} and {network_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — The name of the network.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageCustomDomains($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of custom domains attached to a service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageCustomDomains(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;attachObjectStorageCustomDomain($serviceUuid, $request) -> ObjectStorage2CustomDomainDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches a new custom domain to the service identified by {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2CustomDomainCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageCustomDomain($serviceUuid, $customDomainName) -> ObjectStorage2CustomDomainDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns custom domain details by given {service_uuid} and {domain_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$customDomainName:** `string` — The domain name.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageCustomDomain($serviceUuid, $customDomainName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing custom domain by given {service_uuid} and {domain_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageCustomDomain(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$customDomainName:** `string` — The domain name.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageCustomDomain($serviceUuid, $customDomainName, $request) -> ObjectStorage2CustomDomainDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing custom domain by given {service_uuid} and {domain_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$customDomainName:** `string` — The domain name.

</dd>
</dl>

<dl>
<dd>

**$type:** `?string` — Type of the custom domain.

</dd>
</dl>

<dl>
<dd>

**$domainName:** `?string` — New modified custom domain. Supports both apex domains (example.com) and subdomains (objects.example.com).

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageRegions() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available managed object storage regions.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageRegions();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageRegion($regionName) -> ObjectStorage2RegionDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns object storage region details by given {name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageRegion(
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$regionName:** `string` — The name of the region.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageMetrics($serviceUuid) -> ObjectStorage2MetricsUsageResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns object storage metrics by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageBucketMetrics($serviceUuid, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns metrics for buckets within a service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageBucketMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListObjectStorageBucketMetricsRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageBucket($serviceUuid, $request) -> ObjectStorage2BucketDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new service bucket by the given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->createObjectStorageBucket(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2BucketCreate([
        'name' => 'my-bucket-1',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Must be unique within the service, and should contain only alphanumeric, .,- and _.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageBucket($serviceUuid, $bucketName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes an existing bucket by given {service_uuid} and {bucket_name}. This API call will remove all objects from the bucket permanently and cannot be reversed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageBucket(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$bucketName:** `string` — The name of the bucket.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageMetricsSeries($serviceUuid, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns Object Storage instance metrics series by a given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$from:** `?DateTime` — Beginning of the time range for which to return metrics.

</dd>
</dl>

<dl>
<dd>

**$to:** `?DateTime` — End of the time range for which to return metrics.

</dd>
</dl>

<dl>
<dd>

**$interval:** `?string` — Metrics aggregation interval.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Order of returned results.

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageLabels($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service labels by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageLabel($serviceUuid, $request) -> ObjectStorage2LabelDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new label by given {service_uuid}. Labels are used for service filtering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2LabelCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageLabel($serviceUuid, $labelKey) -> ObjectStorage2LabelDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns label details by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageLabel($serviceUuid, $labelKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing label by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageLabel($serviceUuid, $labelKey, $request) -> ObjectStorage2LabelDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing label by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>

<dl>
<dd>

**$key:** `?string`

</dd>
</dl>

<dl>
<dd>

**$value:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageStaticWebsites($serviceUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all static website configurations for a service along with available domains.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageStaticWebsites(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageStaticWebsite($serviceUuid, $request) -> ObjectStorage2StaticWebsiteConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new static website hosting configuration for a domain.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2StaticWebsiteConfigCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageStaticWebsite($serviceUuid, $customDomainName) -> ObjectStorage2StaticWebsiteConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a static website configuration for a specific domain.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageStaticWebsite(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$customDomainName:** `string` — The domain name.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageStaticWebsite($serviceUuid, $customDomainName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a static website configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageStaticWebsite(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$customDomainName:** `string` — The domain name.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageStaticWebsite($serviceUuid, $customDomainName, $request) -> ObjectStorage2StaticWebsiteConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates an existing static website configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->modifyObjectStorageStaticWebsite(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example.com',
    new ObjectStorage2StaticWebsiteConfigModify([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$customDomainName:** `string` — The domain name.

</dd>
</dl>

<dl>
<dd>

**$bucketName:** `?string` — Name of the S3/ECS bucket containing the website content. Only alphanumerics, dots, hyphens, and underscores are allowed.

</dd>
</dl>

<dl>
<dd>

**$bucketPrefix:** `?string` — Optional prefix/subfolder within the bucket. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.

</dd>
</dl>

<dl>
<dd>

**$indexDocument:** `?string` — Default document for directories. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.

</dd>
</dl>

<dl>
<dd>

**$spaMode:** `?bool` — Enable Single Page Application (SPA) mode. When enabled, all non-file routes serve the index document, allowing client-side routing to handle the URL. Essential for React, Vue, Next.js, and similar frameworks.

</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Whether the static website configuration should be active

</dd>
</dl>

<dl>
<dd>

**$errorPages:** `?array` — Custom error page configurations for specific HTTP status codes or ranges. Replaces the entire set when provided.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageDomains($serviceUuid) -> ObjectStorage2ServiceDomains</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all domains associated with this service (public endpoint, private endpoint, custom domains) along with their static website hosting status.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageDomains(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageUsers($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service users by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageUsers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageUser($serviceUuid, $request) -> ObjectStorage2UserDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new service user by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->createObjectStorageUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2UserCreate([
        'username' => 'example_user',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user to create.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageUser($serviceUuid, $username) -> ObjectStorage2UserDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service user details by given {service_uuid} and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUser($serviceUuid, $username)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing user by given {service_uuid} and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageAccessKeys($serviceUuid, $username) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available access keys for a user.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageAccessKeys(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageAccessKey($serviceUuid, $username) -> ObjectStorage2CreateAccessKeyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new access key by given {service_uuid} and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->createObjectStorageAccessKey(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageAccessKeyDetails($serviceUuid, $username, $accessKeyId) -> ObjectStorage2AccessKeyDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns access key details by given {service_uuid}, {username}, and {access-key-id}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageAccessKeyDetails(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'UCK1234567890ABCDEF',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$accessKeyId:** `string` — The ID of the access key.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageAccessKey($serviceUuid, $username, $accessKeyId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing access key by given {service_uuid}, {username}, and {access-key-id}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageAccessKey(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'UCK1234567890ABCDEF',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$accessKeyId:** `string` — The ID of the access key.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;modifyObjectStorageAccessKeyDetails($serviceUuid, $username, $accessKeyId, $request) -> ObjectStorage2AccessKeyDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies access key details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$accessKeyId:** `string` — The ID of the access key.

</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Indicates if the key is active or inactive.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageAttachedUserPolicies($serviceUuid, $username) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of attached user policies for a user.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageAttachedUserPolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;attachObjectStorageUserPolicy($serviceUuid, $username, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attach a policy to a user.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2PolicyAttachmentCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;detachObjectStorageUserPolicy($serviceUuid, $username, $nestedName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detach a policy from a user.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->detachObjectStorageUserPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$nestedName:** `string` — The name of the policy to detach.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageUserInlinePolicy($serviceUuid, $username, $userPolicyName) -> ObjectStorage2InlinePolicyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the user inline policy by the given {service_uuid}, {username} and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageUserInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$userPolicyName:** `string` — The name of the inline policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUserInlinePolicy($serviceUuid, $username, $userPolicyName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the user inline policy by the given {service_uuid}, {username}, and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageUserInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$userPolicyName:** `string` — The name of the inline policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageUserInlinePolicies($serviceUuid, $username) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the user inline policies by the given {service_uuid}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageUserInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageUserInlinePolicy($serviceUuid, $username, $request) -> ObjectStorage2InlinePolicyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a user inline policy by the given {service_uuid}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2InlinePolicyCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageUserTags($serviceUuid, $username) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a user's tags by the given {service_uuid}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageUserTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;replaceObjectStorageUserTags($serviceUuid, $username, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces a user's tags by the given {service_uuid}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$request:** `array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUserTag($serviceUuid, $username, $userTagKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a user's tag by the given {service_uuid}, {username}, and {tag_key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageUserTag(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$userTagKey:** `string` — The key of the user tag.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageUserPermissionsBoundary($serviceUuid, $username, $request) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a user's permissions boundary by the given {service_uuid}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2PermissionsBoundaryCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageUserPermissionsBoundary($serviceUuid, $username)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a user's permissions boundary by the given {service_uuid}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageUserPermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStoragePolicyVersions($serviceUuid, $policyName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists policy versions given by {service_uuid}, and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStoragePolicyVersions(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStoragePolicyVersion($serviceUuid, $policyName, $request) -> ObjectStorage2PolicyVersionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a policy version by the given {service_uuid}, and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>

<dl>
<dd>

**$document:** `string` — A valid, URL-encoded policy document.

</dd>
</dl>

<dl>
<dd>

**$isDefault:** `bool` — Set this version as the default.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStoragePolicyVersion($serviceUuid, $policyName, $policyVersion) -> ObjectStorage2PolicyVersionResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a single policy version by the given {service_uuid}, {policy_name}, and {policy_version}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStoragePolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'v1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>

<dl>
<dd>

**$policyVersion:** `string` — The version identifier of the policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStoragePolicyVersion($serviceUuid, $policyName, $policyVersion)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a policy version by the given {service_uuid}, {policy_name}, and {policy_version}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStoragePolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'v1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>

<dl>
<dd>

**$policyVersion:** `string` — The version identifier of the policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStoragePolicy($serviceUuid, $policyName) -> ObjectStorage2PolicyDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service policy details by given {service_uuid} and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStoragePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStoragePolicy($serviceUuid, $policyName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing policy by given {service_uuid} and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStoragePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;setObjectStorageDefaultPolicyVersion($serviceUuid, $policyName, $request) -> ObjectStorage2PolicyDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sets the default version for a policy. Note: This is mapped from ModifyPolicyVersion handler.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->setObjectStorageDefaultPolicyVersion(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2PolicySetDefaultVersion([
        'versionId' => 'v2',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>

<dl>
<dd>

**$versionId:** `string` — The policy version ID to set as default.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStoragePolicies($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service policies by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStoragePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStoragePolicy($serviceUuid, $request) -> ObjectStorage2PolicyDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new service policy by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Unique name of the policy.

</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The policy description.

</dd>
</dl>

<dl>
<dd>

**$document:** `string` — A valid, URL-encoded policy document.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageIamGroupPolicies($serviceUuid, $groupName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists IAM policies attached to a group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageIamGroupPolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;attachObjectStorageIamGroupPolicy($serviceUuid, $groupName, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches a policy to a group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2PolicyAttachmentCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;detachObjectStorageIamGroupPolicy($serviceUuid, $groupName, $policyName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detaches a policy from a group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->detachObjectStorageIamGroupPolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>

<dl>
<dd>

**$policyName:** `string` — The name of the policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageGroups($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service groups by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageGroups(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageGroup($serviceUuid, $request) -> ObjectStorage2GroupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an iam group.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->createObjectStorageGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ObjectStorage2GroupCreate([
        'name' => 'new-group',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — A valid string to represent the name of the IAM group.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageGroup($serviceUuid, $groupName) -> ObjectStorage2GroupResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a single group identified by {service_uuid}, and {group_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageGroup($serviceUuid, $groupName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a group identified by {group_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;attachObjectStorageUserToGroup($serviceUuid, $groupName, $username)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches an iam user to a group identified by {group_name}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->attachObjectStorageUserToGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;removeObjectStorageUserFromGroup($serviceUuid, $groupName, $username)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Removes an iam user from the group identified by {group_name}, and {username}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->removeObjectStorageUserFromGroup(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The name of the user.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageGroupInlinePolicies($serviceUuid, $groupName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the group inline policies by the given {service_uuid}, and {group_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageGroupInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageGroupInlinePolicy($serviceUuid, $groupName, $request) -> ObjectStorage2InlinePolicyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a group inline policy by the given {service_uuid}, and {group_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2InlinePolicyCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageGroupInlinePolicy($serviceUuid, $groupName, $groupPolicyName) -> ObjectStorage2InlinePolicyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the group inline policy by the given {service_uuid}, {group_name} and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageGroupInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>

<dl>
<dd>

**$groupPolicyName:** `string` — The name of the inline policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageGroupInlinePolicy($serviceUuid, $groupName, $groupPolicyName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the group inline policy by the given {service_uuid}, {group_name}, and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageGroupInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$groupName:** `string` — The name of the group.

</dd>
</dl>

<dl>
<dd>

**$groupPolicyName:** `string` — The name of the inline policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageRoles($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists the roles.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageRoles(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageRole($serviceUuid, $request) -> ObjectStorage2RoleResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a service IAM role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string`

</dd>
</dl>

<dl>
<dd>

**$assumeRolePolicyDocument:** `string` — The policy document that grants an entity permission to assume the role.

</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description of the role.

</dd>
</dl>

<dl>
<dd>

**$maxSessionDuration:** `?int` — Maximum session duration in seconds.

</dd>
</dl>

<dl>
<dd>

**$permissionsBoundary:** `?string` — Policy name to set as the permissions boundary.

</dd>
</dl>

<dl>
<dd>

**$tags:** `?array` — Tags to attach to the role (max 50).

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageRole($serviceUuid, $roleName) -> ObjectStorage2RoleResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a single role identified by {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRole($serviceUuid, $roleName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a service's IAM role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;updateObjectStorageRole($serviceUuid, $roleName, $request) -> ObjectStorage2RoleResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates a service's IAM role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — New description for the role.

</dd>
</dl>

<dl>
<dd>

**$maxSessionDuration:** `?int` — New maximum session duration in seconds.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageRoleInlinePolicies($serviceUuid, $roleName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of role inline policies by the given {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageRoleInlinePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageRoleInlinePolicy($serviceUuid, $roleName, $request) -> ObjectStorage2InlinePolicyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a role inline policy by the given {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2InlinePolicyCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageRoleInlinePolicy($serviceUuid, $roleName, $rolePolicyName) -> ObjectStorage2InlinePolicyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a role's inline policy by the given {service_uuid}, {role_name}, and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageRoleInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$rolePolicyName:** `string` — The name of the inline policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRoleInlinePolicy($serviceUuid, $roleName, $rolePolicyName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a role inline policy by the given {service_uuid}, {role_name} and {policy_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageRoleInlinePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$rolePolicyName:** `string` — The name of the inline policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;createObjectStorageRolePermissionsBoundary($serviceUuid, $roleName, $request) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a role policy's permissions boundary by the given {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2PermissionsBoundaryCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRolePermissionsBoundary($serviceUuid, $roleName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a role permissions boundary by the given {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageRolePermissionsBoundary(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;assumeObjectStorageRolePolicy($serviceUuid, $roleName, $request) -> ObjectStorage2AssumeRolePolicyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Assume a role policy by the given {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->assumeObjectStorageRolePolicy(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    new ObjectStorage2AssumeRolePolicyRequest([
        'document' => '{"Version":"2012-10-17","Statement":[{"Effect":"Allow","Principal":{"Service":"backup.upcloud.com"},"Action":"sts:AssumeRole"}]}',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$document:** `string` — The assume role policy document that grants an entity permission to assume the role.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;listObjectStorageAttachedRolePolicies($serviceUuid, $roleName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists all policies attached to a service's IAM role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->listObjectStorageAttachedRolePolicies(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;attachObjectStoragePolicyToRole($serviceUuid, $roleName, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches a policy to a service's IAM role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$request:** `ObjectStorage2PolicyAttachmentCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;detachObjectStoragePolicyFromRole($serviceUuid, $roleName, $rolePolicyName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detaches a policy from a service's IAM role.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->detachObjectStoragePolicyFromRole(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$rolePolicyName:** `string` — The name of the inline policy.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;getObjectStorageRoleTags($serviceUuid, $roleName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a role's tags by the given {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->getObjectStorageRoleTags(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;replaceObjectStorageRoleTags($serviceUuid, $roleName, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces a role's tags by the given {service_uuid}, and {role_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$request:** `array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;objectStorage2-&gt;deleteObjectStorageRoleTag($serviceUuid, $roleName, $roleTagKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a role's tag by the given {service_uuid}, {role_name}, and {tag_key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->objectStorage2->deleteObjectStorageRoleTag(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-object-storage',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$roleName:** `string` — The name of the role.

</dd>
</dl>

<dl>
<dd>

**$roleTagKey:** `string` — The key of the role tag.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## file-storage
<details><summary><code>$client-&gt;fileStorage-&gt;listFileStorages($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of File Storage services.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->listFileStorages(
    new ListFileStoragesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Order of returned results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;createFileStorage($request) -> FileStorageServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new File Storage service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string`

</dd>
</dl>

<dl>
<dd>

**$zone:** `string` — Indicates the zone where the service will be created.

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$sizeGib:** `int`

</dd>
</dl>

<dl>
<dd>

**$encrypted:** `?bool` — Indicates whether encryption at rest is enabled for the service.

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array`

</dd>
</dl>

<dl>
<dd>

**$shares:** `?array`

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;getFileStorage($serviceUuid) -> FileStorageServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns managed File Storage details by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->getFileStorage(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;replaceFileStorage($serviceUuid, $request) -> FileStorageServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces existing File Storage service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string`

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$sizeGib:** `int`

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array`

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;deleteFileStorage($serviceUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing File Storage service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->deleteFileStorage(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;modifyFileStorage($serviceUuid, $request) -> FileStorageServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing File Storage service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `?string`

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `?string`

</dd>
</dl>

<dl>
<dd>

**$sizeGib:** `?int`

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array`

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;listFileStorageNetworks($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service networks by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->listFileStorageNetworks(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;createFileStorageNetwork($serviceUuid, $request) -> FileStorageNetworkDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new service network by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `FileStorageNetworkCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;getFileStorageNetwork($serviceUuid, $networkName) -> FileStorageNetworkDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service network details by given {service_uuid} and {network_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->getFileStorageNetwork(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — The name of the network.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;deleteFileStorageNetwork($serviceUuid, $networkName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing network by given {service_uuid} and {network_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->deleteFileStorageNetwork(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — The name of the network.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;modifyFileStorageNetwork($serviceUuid, $networkName, $request) -> FileStorageNetworkDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing service network by given {service_uuid} and {network_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — The name of the network.

</dd>
</dl>

<dl>
<dd>

**$uuid:** `?string`

</dd>
</dl>

<dl>
<dd>

**$name:** `?string`

</dd>
</dl>

<dl>
<dd>

**$family:** `?string`

</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;listFileStorageShares($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service shares by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->listFileStorageShares(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;createFileStorageShare($serviceUuid, $request) -> FileStorageShareDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new service share by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `FileStorageShareCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;getFileStorageShare($serviceUuid, $shareName) -> FileStorageShareDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service share details by given {service_uuid} and {share_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->getFileStorageShare(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;deleteFileStorageShare($serviceUuid, $shareName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing share by given {service_uuid} and {share_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->deleteFileStorageShare(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;modifyFileStorageShare($serviceUuid, $shareName, $request) -> FileStorageShareDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing service share by given {service_uuid} and {share_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — A resource name.

</dd>
</dl>

<dl>
<dd>

**$acl:** `?array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;listFileStorageAcls($serviceUuid, $shareName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available ACLs by given {service_uuid} and {share_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->listFileStorageAcls(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;createFileStorageAcl($serviceUuid, $shareName, $request) -> FileStorageAclDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new share ACL by given {service_uuid} and {share_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>

<dl>
<dd>

**$request:** `FileStorageAclCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;getFileStorageAcl($serviceUuid, $shareName, $aclName) -> FileStorageAclDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns ACL details by given {service_uuid}, {share_name} and {acl_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->getFileStorageAcl(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    'test-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>

<dl>
<dd>

**$aclName:** `string` — The name of the ACL.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;deleteFileStorageAcl($serviceUuid, $shareName, $aclName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing ACL by given {service_uuid}, {share_name} and {acl_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->deleteFileStorageAcl(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'test-name',
    'test-name',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>

<dl>
<dd>

**$aclName:** `string` — The name of the ACL.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;modifyFileStorageAcl($serviceUuid, $shareName, $aclName, $request) -> FileStorageAclDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing ACL by given {service_uuid}, {share_name} and {acl_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$shareName:** `string` — The name of the share.

</dd>
</dl>

<dl>
<dd>

**$aclName:** `string` — The name of the ACL.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string`

</dd>
</dl>

<dl>
<dd>

**$target:** `?string` — The target of the ACL entry. It can be an IP Address, Network Prefix or a wildcard.

</dd>
</dl>

<dl>
<dd>

**$permission:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;listFileStorageLabels($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service labels by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->listFileStorageLabels(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;createFileStorageLabel($serviceUuid, $request) -> FileStorageLabelDetails</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new label by given {service_uuid}. Labels are used for service filtering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `FileStorageLabelCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;getFileStorageLabel($serviceUuid, $labelKey) -> FileStorageLabelDetails</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns label details by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->getFileStorageLabel(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;deleteFileStorageLabel($serviceUuid, $labelKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing label by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->deleteFileStorageLabel(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;modifyFileStorageLabel($serviceUuid, $labelKey, $request) -> FileStorageLabelDetails</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing label by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>

<dl>
<dd>

**$key:** `?string`

</dd>
</dl>

<dl>
<dd>

**$value:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;fileStorage-&gt;getFileStorageCurrentState($serviceUuid) -> FileStorageServiceDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the current state of the File Storage service by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->fileStorage->getFileStorageCurrentState(
    '17fd43a5-a97e-44f7-98a8-0a787da67069',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## database
<details><summary><code>$client-&gt;database-&gt;listDatabaseTypes() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available database types. Contains available legacy plans, zones, database versions supported and the configuration properties for each database. PostgreSQL and MySQL componentised (rdb.*) plans are selected with the plan_* request fields instead of a listed plan name.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseTypes();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabasePlans() -> DatabasePlansResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists available componentised database plans
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabasePlans();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseType($serviceTypeName) -> DatabaseServiceTypeResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns database type details by given {database_type}. Contains available legacy plans, zones, database versions supported and configuration properties. PostgreSQL and MySQL componentised (rdb.*) plans are selected with the plan_* request fields instead of a listed plan name.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseType(
    DatabaseServiceType::Mysql->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceTypeName:** `string` — Service type parameter

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabases($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of all available Managed Database services. Depending on their database type, Managed Databases services will have different details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabases(
    new ListDatabasesRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort results by the specified field. Prefix with '-' for descending order. Supported fields: `created_at`, `name` (service hostname), `operational_state` (service status), `zone` (location).

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabase($request) -> DatabaseServiceInformationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new Managed Database instance. New databases are started by default. An initial backup is created automatically on startup and the API will be fully functional only after this backup has been created. The creation might take a while. Note that different databases have different properties that can be passed on creation. For PostgreSQL and MySQL, select the plan with the plan_compute, plan_node_count, plan_storage_gib and plan_backups fields; the plan name field is deprecated for these engines.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->createDatabase(
    new DatabaseServiceCreateOpenApi([
        'hostnamePrefix' => 'doc-api-unique-prefix',
        'title' => 'my-managed-database',
        'type' => DatabaseServiceType::Mysql->value,
        'zone' => 'de-fra1',
        'terminationProtection' => false,
        'maintenance' => new DatabaseServiceCreateOpenApiMaintenance([
            'dow' => DatabaseMaintenanceDow::Sunday->value,
            'time' => '05:00:00',
        ]),
        'networks' => [
            new DatabaseNetworkCreate([
                'uuid' => '03631160-d57a-4926-ad48-a2f828229dcb',
                'name' => 'example-network-1',
                'type' => DatabaseNetworkType::Private_->value,
                'family' => DatabaseNetworkFamily::IPv4->value,
            ]),
            new DatabaseNetworkCreate([
                'uuid' => '03631160-d57a-4926-ad48-a2f828229dcb',
                'name' => 'example-network-2',
                'type' => DatabaseNetworkType::Private_->value,
                'family' => DatabaseNetworkFamily::IPv4->value,
            ]),
        ],
        'labels' => [
            new DatabaseLabelCreate([
                'key' => 'env',
                'value' => 'staging',
            ]),
            new DatabaseLabelCreate([
                'key' => 'foo',
                'value' => 'bar',
            ]),
        ],
        'properties' => new DatabaseServicePropertiesMysql([
            'automaticUtilityNetworkIpFilter' => true,
            'ipFilter' => [
                'ip_filter',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$hostnamePrefix:** `string` — Hostname prefix for the service nodes.

</dd>
</dl>

<dl>
<dd>

**$title:** `string` — Human-readable title for the service.

</dd>
</dl>

<dl>
<dd>

**$type:** `string`

</dd>
</dl>

<dl>
<dd>

**$zone:** `string` — Zone where the service is created.

</dd>
</dl>

<dl>
<dd>

**$setServiceUuid:** `?string` — Optional UUID to assign to the created service.

</dd>
</dl>

<dl>
<dd>

**$plan:** `?string` — Deprecated: prefer the plan_* selection fields (plan_compute, plan_node_count, plan_storage_gib, plan_backups) for PostgreSQL and MySQL. The plan name remains supported, and required for engines without componentised plans. For componentised (rdb.*) plans the storage segment is the desired TOTAL storage per node: any total reachable from a catalog plan's included storage in the plan's storage steps (within its cap) is a valid plan name, e.g. rdb.standard.2x-2CPU-8GB-120GB-regular selects the 80GB catalog plan with a 40GB dynamic top-up.

</dd>
</dl>

<dl>
<dd>

**$planCompute:** `?string` — Plan selection: compute shape combining family, CPU and memory as one token, as listed in the plan catalog components. PostgreSQL and MySQL only.

</dd>
</dl>

<dl>
<dd>

**$planNodeCount:** `?int` — Plan selection: number of nodes.

</dd>
</dl>

<dl>
<dd>

**$planStorageGib:** `?int` — Plan selection: desired TOTAL storage per node in GiB. Resolution picks the plan whose included storage matches, or tops the closest plan up with dynamic additional storage within the allowed limits. Mutually exclusive with additional_disk_space_gib.

</dd>
</dl>

<dl>
<dd>

**$planBackups:** `?string` — Plan selection: backup tier. PostgreSQL and MySQL tiered plans only.

</dd>
</dl>

<dl>
<dd>

**$additionalDiskSpaceGib:** `?int` — Additional disk space in GiB. Legacy plans only: componentised (rdb.*) plans set storage as a total via plan_storage_gib or the plan name.

</dd>
</dl>

<dl>
<dd>

**$terminationProtection:** `?bool` — When enabled, the service cannot be deleted until termination protection is disabled.

</dd>
</dl>

<dl>
<dd>

**$maintenance:** `?DatabaseServiceCreateOpenApiMaintenance` — Weekly maintenance window.

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array` — SDN networks to attach to the service.

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels used for service filtering.

</dd>
</dl>

<dl>
<dd>

**$serviceIntegrations:** `?array` — Service integrations to configure on creation.

</dd>
</dl>

<dl>
<dd>

**$properties:** `DatabaseServicePropertiesMysql|DatabaseServicePropertiesPg|DatabaseServicePropertiesRedis|DatabaseServicePropertiesOpensearch|DatabaseServicePropertiesValkey|null` — Engine-specific configuration properties. The allowed keys depend on the selected service type; provide the property set matching the chosen type.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabase($uuid) -> DatabaseServiceInformationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns details of a Managed Database service by its {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabase($uuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes a specified Managed Database. All data will be erased and lost, including backups. If the service is not powered off, it will be powered off before deletion. The state of the service can be anything.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabase($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies Managed Database service details by its {uuid} including upgrading plans, migration to other zones and database type-specific configurations. For PostgreSQL and MySQL, change the plan with the plan_compute, plan_node_count, plan_storage_gib and plan_backups fields; the plan name field is deprecated for these engines.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->modifyDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceModifyOpenApi([
        'title' => 'my-managed-database',
        'powered' => true,
        'zone' => 'de-fra1',
        'terminationProtection' => false,
        'maintenance' => new DatabaseServiceModifyOpenApiMaintenance([
            'dow' => DatabaseMaintenanceDow::Sunday->value,
            'time' => '12:00:00',
        ]),
        'networks' => [
            new DatabaseNetworkCreate([
                'uuid' => '03631160-d57a-4926-ad48-a2f828229dcb',
                'name' => 'example-network-1',
                'type' => DatabaseNetworkType::Private_->value,
                'family' => DatabaseNetworkFamily::IPv4->value,
            ]),
        ],
        'properties' => new DatabaseServicePropertiesMysql([
            'automaticUtilityNetworkIpFilter' => true,
            'ipFilter' => [
                'ip_filter',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — Human-readable title for the service.

</dd>
</dl>

<dl>
<dd>

**$type:** `?string`

</dd>
</dl>

<dl>
<dd>

**$powered:** `?bool` — Desired power state of the service.

</dd>
</dl>

<dl>
<dd>

**$zone:** `?string` — Zone to migrate the service to.

</dd>
</dl>

<dl>
<dd>

**$plan:** `?string` — Deprecated: prefer the plan_* selection fields (plan_compute, plan_node_count, plan_storage_gib, plan_backups) for PostgreSQL and MySQL. The plan name remains supported, and required for engines without componentised plans. For componentised (rdb.*) plans the storage segment is the desired TOTAL storage per node: any total reachable from a catalog plan's included storage in the plan's storage steps (within its cap) is a valid plan name, e.g. rdb.standard.2x-2CPU-8GB-120GB-regular selects the 80GB catalog plan with a 40GB dynamic top-up.

</dd>
</dl>

<dl>
<dd>

**$planCompute:** `?string` — Plan selection: compute shape combining family, CPU and memory as one token, as listed in the plan catalog components. PostgreSQL and MySQL only.

</dd>
</dl>

<dl>
<dd>

**$planNodeCount:** `?int` — Plan selection: number of nodes.

</dd>
</dl>

<dl>
<dd>

**$planStorageGib:** `?int` — Plan selection: desired TOTAL storage per node in GiB. Resolution picks the plan whose included storage matches, or tops the closest plan up with dynamic additional storage within the allowed limits. Mutually exclusive with additional_disk_space_gib.

</dd>
</dl>

<dl>
<dd>

**$planBackups:** `?string` — Plan selection: backup tier. PostgreSQL and MySQL tiered plans only.

</dd>
</dl>

<dl>
<dd>

**$additionalDiskSpaceGib:** `?int` — Additional disk space in GiB. Legacy plans only: componentised (rdb.*) plans set storage as a total via plan_storage_gib or the plan name.

</dd>
</dl>

<dl>
<dd>

**$terminationProtection:** `?bool` — When enabled, the service cannot be deleted until termination protection is disabled.

</dd>
</dl>

<dl>
<dd>

**$maintenance:** `?DatabaseServiceModifyOpenApiMaintenance` — Weekly maintenance window.

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array` — SDN networks attached to the service.

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels used for service filtering.

</dd>
</dl>

<dl>
<dd>

**$properties:** `DatabaseServicePropertiesMysql|DatabaseServicePropertiesPg|DatabaseServicePropertiesRedis|DatabaseServicePropertiesOpensearch|DatabaseServicePropertiesValkey|null` — Engine-specific configuration properties. The allowed keys depend on the service type; provide the property set matching the service's type.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseType($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update a service's type by the given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->modifyDatabaseType(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceTypeModify([
        'targetType' => 'primary',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$targetType:** `string` — Service type

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;cloneDatabase($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a clone of a Managed Database service based on its {uuid}. It is possible to change location, plans and use the point in time feature to clone your service at a specific time using your backups. For PostgreSQL and MySQL, select the clone's plan with the plan_compute, plan_node_count, plan_storage_gib and plan_backups fields; the plan name field is deprecated for these engines.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->cloneDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CloneDatabaseRequest([
        'body' => new DatabaseServiceCloneMysql([
            'hostnamePrefix' => 'dev',
            'cloneTime' => new DateTime('2024-01-30T15:04:05Z'),
            'backupName' => 'daily-backup-2024-01-30',
            'zone' => 'fi-hel1',
            'terminationProtection' => false,
            'maintenance' => new DatabaseServiceCloneMysqlMaintenance([
                'dow' => DatabaseMaintenanceDow::Monday->value,
                'time' => '03:00:00',
            ]),
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `DatabaseServiceCloneMysql|DatabaseServiceClonePg|DatabaseServiceCloneRedis|DatabaseServiceCloneOpensearch|DatabaseServiceCloneValkey`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseNetworks($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of attached SDN networks to a Managed Database service by its {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseNetworks(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseNetwork($uuid, $request) -> DatabaseNetworkInformationDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attaches an SDN network to a Managed Database service by its {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `DatabaseNetworkCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseNetwork($uuid, $networkName) -> DatabaseNetworkInformationDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the attached SDN network details to service by its {uuid} and {network_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — Network UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseNetwork($uuid, $networkName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detaches an existing SDN network from a Managed Database service by its {uuid} and {network_name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — Network UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;upgradeDatabase($uuid, $request) -> DatabaseServiceInformationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Upgrades your PostgreSQL Managed Database service database to a newer major version. Downgrades are not permitted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->upgradeDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceUpgrade([
        'targetVersion' => '12',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$targetVersion:** `string` — Version to upgrade the service

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseLabels($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service labels by given {service_uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseLabel($uuid, $request) -> DatabaseLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new label by given {service_uuid}. Labels used for service filtering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `DatabaseLabelCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseLabel($uuid, $labelKey) -> DatabaseLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns label details by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'foo',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — Label ID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseLabel($uuid, $labelKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing label by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'foo',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — Label ID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseLabel($uuid, $labelKey, $request) -> DatabaseLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing label by given {service_uuid} and {key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — Label ID

</dd>
</dl>

<dl>
<dd>

**$key:** `?string`

</dd>
</dl>

<dl>
<dd>

**$value:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseAvailableExtensions($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available PostgreSQL extensions for the Managed Database service by its {service-uuid}. Only supported for PostgreSQL services.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseAvailableExtensions(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getPgAvailableExtensions() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available PostgreSQL extensions grouped by PostgreSQL version.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getPgAvailableExtensions();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseTypeVersions() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of supported Managed Database service versions.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseTypeVersions();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseAccessControl($uuid) -> DatabaseAccessControlSettingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return access controls settings for the OpenSearch Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseAccessControl(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseAccessControl($uuid, $request) -> DatabaseAccessControlSettingsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies the user {username} access control for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->modifyDatabaseAccessControl(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceAclModify([
        'accessControl' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$accessControl:** `?bool` — Enables OpenSearch access control

</dd>
</dl>

<dl>
<dd>

**$extendedAccessControl:** `?bool` — Enables OpenSearch extended access control

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseSecurity($uuid) -> DatabaseOpenSearchSecurityPluginStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns Security management status for the OpenSearch Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseSecurity(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;enableDatabaseSecurityAdmin($uuid, $request) -> DatabaseOpenSearchSecurityPluginStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Enables Security management admin for the OpenSearch Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->enableDatabaseSecurityAdmin(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceSecurityEnable([
        'adminPassword' => 'Str0ngP@ssw0rd!',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$adminPassword:** `string` — Security admin password

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseSecurityAdmin($uuid, $request) -> DatabaseOpenSearchSecurityPluginStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies Security management admin password for the OpenSearch Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->modifyDatabaseSecurityAdmin(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseServiceSecurityModify([
        'adminPassword' => 'Curr3nt@Passw0rd!',
        'newPassword' => 'N3w@Str0ngPassw0rd!',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$adminPassword:** `string` — Current admin password

</dd>
</dl>

<dl>
<dd>

**$newPassword:** `string` — New admin password

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseIntegrationEndpoints() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available integration endpoints.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseIntegrationEndpoints();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseIntegrationEndpoint($request) -> DatabaseIntegrationEndpointResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new integration endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->createDatabaseIntegrationEndpoint(
    new DatabaseIntegrationEndpointCreate([
        'type' => DatabaseIntegrationEndpoint::Logs->value,
        'name' => 'webhook-endpoint',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `string`

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the integration endpoint.

</dd>
</dl>

<dl>
<dd>

**$properties:** `?array` — A key-value map of properties specific to the integration endpoint type.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseIntegrationEndpoint($integrationUuid) -> DatabaseIntegrationEndpointResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns integration endpoint details by given {integration-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseIntegrationEndpoint(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$integrationUuid:** `string` — Integration UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseIntegrationEndpoint($integrationUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing integration endpoint by given {integration-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseIntegrationEndpoint(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$integrationUuid:** `string` — Integration UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseIntegrationEndpoint($integrationUuid, $request) -> DatabaseIntegrationEndpointResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing integration endpoint by given {integration-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->modifyDatabaseIntegrationEndpoint(
    '01234567-89ab-cdef-0123-456789abcdef',
    new DatabaseIntegrationEndpointModify([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$integrationUuid:** `string` — Integration UUID

</dd>
</dl>

<dl>
<dd>

**$properties:** `?array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseAccountCa() -> DatabaseAccountCaResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the CA certificate. Every customer main account has a private Certificate Authority (CA) that signs certificates for internal use. Managed Database service types, such as PostgreSQL, use it for external connections. To access these services, you must download and configure the certificate on your browser or client.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseAccountCa();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseAlerts() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns all the alerts associated with your Managed Database services.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseAlerts();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseStatus($uuid) -> DatabaseServiceStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a service's status by the given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseStatus(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseVersions($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns available versions of the Managed Database service by its {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseVersions(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;startDatabaseManualMaintenance($uuid) -> DatabaseUpCloudApiResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Start maintenance updates for your Managed Database service if any updates are pending.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->startDatabaseManualMaintenance(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;enableDatabaseTemporaryWrites($uuid) -> DatabaseUpCloudApiResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Enable temporary writes by the given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->enableDatabaseTemporaryWrites(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseMigrationStatus($uuid) -> DatabaseServiceMigrationStatusResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns details about the migration progress over time of a Managed database service by its {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseMigrationStatus(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseAlerts($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns alerts for Managed Database service identified by `{uuid}`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseAlerts(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseMetrics($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns metrics related to a Managed Database service by its {uuid} and query parameter {period}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseQueryStatistics($uuid, $request) -> DatabaseQueryStatisticsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of query statistics for the Managed Database service by its {uuid} and optional query parameters {limit}, {offset} and {order}. Query statistics will differ depending on the database type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — Sort order

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseLogs($uuid, $request) -> DatabaseLogListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns Managed Database service system-level logs by its {uuid} and optional query parameters {limit}, {offset} and {order}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — Sort order

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseConnectionPools($uuid, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available connection pools for a Managed Database service. Connection pools are available only for PostgreSQL database services.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseConnectionPools(
    '01234567-89ab-cdef-0123-456789abcdef',
    new ListDatabaseConnectionPoolsRequest([
        'sort' => 'asc',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Order of returned results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseConnectionPool($uuid, $request) -> DatabaseConnectionPoolResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a connection pool for the Managed Database service {uuid}. Connection pool endpoints are for PostgreSQL Managed Databases only.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$database:** `string` — Database

</dd>
</dl>

<dl>
<dd>

**$poolMode:** `string` — Connection Pool mode

</dd>
</dl>

<dl>
<dd>

**$poolName:** `string` — Connection Pool name

</dd>
</dl>

<dl>
<dd>

**$poolSize:** `int` — Connection Pool size

</dd>
</dl>

<dl>
<dd>

**$username:** `?string` — Connection Pool username

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseConnectionPool($uuid, $poolName) -> DatabaseConnectionPoolResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the connection pool {pool-name} details for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseConnectionPool(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$poolName:** `string` — Connection Pool Name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseConnectionPool($uuid, $poolName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the connection pool {pool-name} for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseConnectionPool(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$poolName:** `string` — Connection Pool Name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseConnectionPool($uuid, $poolName, $request) -> DatabaseConnectionPoolResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies the connection pool {pool-name} for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$poolName:** `string` — Connection Pool Name

</dd>
</dl>

<dl>
<dd>

**$database:** `?string` — Database

</dd>
</dl>

<dl>
<dd>

**$poolMode:** `?string` — Connection Pool mode

</dd>
</dl>

<dl>
<dd>

**$poolSize:** `?int` — Connection Pool size

</dd>
</dl>

<dl>
<dd>

**$username:** `?string` — Connection Pool username

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseIndices($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available indices for a Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseIndices(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseIndex($uuid, $indexName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the index {index_name} for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseIndex(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$indexName:** `string` — OpenSearch Index Name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseIntegrations($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service integrations by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseIntegrations(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseIntegration($uuid, $request) -> DatabaseServiceIntegrationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new integration by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->createDatabaseIntegration(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateDatabaseIntegrationRequest([
        'body' => new DatabaseServiceIntegrationCreate([
            'type' => DatabaseServiceIntegration::Logs->value,
            'destinationUuid' => '09e86f48-2dcd-4a43-843d-3532ab112c1d',
            'properties' => [
                'opensearch_index_days_max' => 30,
                'opensearch_index_prefix' => "mysql_logs",
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `DatabaseServiceIntegrationCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseIntegration($uuid, $integrationUuid) -> DatabaseServiceIntegrationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns integration details by given {service-uuid} and {integration-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseIntegration(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$integrationUuid:** `string` — Integration UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseIntegration($uuid, $integrationUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing integration by given {service-uuid} and {integration-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseIntegration(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$integrationUuid:** `string` — Integration UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseIntegration($uuid, $integrationUuid, $request) -> DatabaseServiceIntegrationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing integration by given {service-uuid} and {integration-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$integrationUuid:** `string` — Integration UUID

</dd>
</dl>

<dl>
<dd>

**$properties:** `?array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseLogicalDatabases($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of logical databases for a Managed Database service identified by {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseLogicalDatabases(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseLogicalDatabase($uuid, $request) -> LogicalDatabaseResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new logical database for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — logical database name

</dd>
</dl>

<dl>
<dd>

**$lcCollate:** `?string` — Collation order

</dd>
</dl>

<dl>
<dd>

**$lcCtype:** `?string` — Category of a locale definition source file

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseLogicalDatabase($uuid, $databaseName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the logical database {database_name} from the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseLogicalDatabase(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$databaseName:** `string` — Database name

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabasePeeringsStatus($uuid) -> DatabaseServiceNetworkDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns networks peering status for a service by its {uuid}. Only available for services using SDN private networks.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabasePeeringsStatus(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseSessions($uuid, $request) -> DatabaseCurrentSessionsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of current sessions details for your Managed Database service by its {uuid} and optional query parameters {limit}, {offset} and {order}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — Sort order

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;terminateDatabaseSession($uuid, $pid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Terminates a sessions or kills a running query for a Managed Database service by its {uuid}, session {pid} and optional query parameter {terminate}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->terminateDatabaseSession(
    '01234567-89ab-cdef-0123-456789abcdef',
    1001,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$pid:** `int` — Session PID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseTask($uuid, $request) -> DatabaseServiceTaskResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a task that checks for potential errors before starting a migration or upgrade for a Managed Database service by its {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$datasetImport:** `?DatabaseServiceTaskCreateDatasetImport`

</dd>
</dl>

<dl>
<dd>

**$migrationCheck:** `?DatabaseServiceTaskCreateMigrationCheck`

</dd>
</dl>

<dl>
<dd>

**$upgradeCheck:** `?DatabaseServiceTaskCreateUpgradeCheck`

</dd>
</dl>

<dl>
<dd>

**$targetVersion:** `?string` — The target version for upgrade operations.

</dd>
</dl>

<dl>
<dd>

**$operation:** `string` — The operation to be performed.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseTask($uuid, $taskId) -> DatabaseServiceTaskDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns task details of a Managed Database service by its {uuid} and the task {id} obtained from Create Managed Database task.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseTask(
    '01234567-89ab-cdef-0123-456789abcdef',
    1001,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$taskId:** `int` — Task ID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;listDatabaseUsers($uuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of database users associated with the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->listDatabaseUsers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;createDatabaseUser($uuid, $request) -> DatabaseUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new user for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — The username of the service user

</dd>
</dl>

<dl>
<dd>

**$password:** `?string` — The password of the service user

</dd>
</dl>

<dl>
<dd>

**$authentication:** `?string` — The authentication method for the service user

</dd>
</dl>

<dl>
<dd>

**$redisAccessControl:** `?DatabaseServiceUserCreateRedisAccessControl` — Redis access control settings

</dd>
</dl>

<dl>
<dd>

**$pgAccessControl:** `?DatabaseServiceUserCreatePgAccessControl` — PostgreSQL access control settings

</dd>
</dl>

<dl>
<dd>

**$opensearchAccessControl:** `?DatabaseServiceUserCreateOpensearchAccessControl` — OpenSearch access control settings

</dd>
</dl>

<dl>
<dd>

**$valkeyAccessControl:** `?DatabaseServiceUserCreateValkeyAccessControl` — Valkey access control settings

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;getDatabaseUser($uuid, $username) -> DatabaseUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the user {username} details for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->getDatabaseUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — Username identifier

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;deleteDatabaseUser($uuid, $username)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the user {username} from the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->database->deleteDatabaseUser(
    '01234567-89ab-cdef-0123-456789abcdef',
    'my-service',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — Username identifier

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseUser($uuid, $username, $request) -> DatabaseUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies the user {username} details for the Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — Username identifier

</dd>
</dl>

<dl>
<dd>

**$password:** `?string` — New password for the service user

</dd>
</dl>

<dl>
<dd>

**$authentication:** `?string` — Authentication method for the service user

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;database-&gt;modifyDatabaseUserAccessControl($uuid, $username, $request) -> DatabaseUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return access controls settings for the OpenSearch Managed Database service {uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$uuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$username:** `string` — Username identifier

</dd>
</dl>

<dl>
<dd>

**$redisAccessControl:** `?DatabaseServiceUserAclModifyRedisAccessControl` — Redis ACL modification schema

</dd>
</dl>

<dl>
<dd>

**$pgAccessControl:** `?DatabaseServiceUserAclModifyPgAccessControl` — PostgreSQL replication permission modification schema

</dd>
</dl>

<dl>
<dd>

**$opensearchAccessControl:** `?DatabaseServiceUserAclModifyOpensearchAccessControl` — OpenSearch index permission modification schema

</dd>
</dl>

<dl>
<dd>

**$valkeyAccessControl:** `?DatabaseServiceUserAclModifyValkeyAccessControl` — Valkey ACL modification schema

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## gateway
<details><summary><code>$client-&gt;gateway-&gt;listGatewayPlans($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List available plans.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->listGatewayPlans(
    new ListGatewayPlansRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;getGatewayPlan($planName) -> GatewayPlanDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get plan details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->getGatewayPlan(
    'advanced',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$planName:** `string` — Plan identifier

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;listGatewayServices($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List available services.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->listGatewayServices(
    new ListGatewayServicesRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort resources by field. Prefix with '-' for descending order.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;createGatewayService($request) -> GatewayServiceDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->createGatewayService(
    new GatewayServiceCreateRequest([
        'name' => 'gateway-service',
        'plan' => 'development-gwaas-1c2g',
        'zone' => 'fi-hel1',
        'features' => [
            GatewayServiceFeatures::Nat->value,
        ],
        'routers' => [
            new GatewayRouterCreateRequest([
                'uuid' => 'fedcba98-7654-3210-fedc-ba9876543210',
            ]),
        ],
        'addresses' => [
            new GatewayAddressCreateRequest([
                'name' => 'gateway-service',
            ]),
        ],
        'connections' => [
            new GatewayConnectionCreateRequest([
                'name' => 'gateway-service',
                'type' => GatewayConnectionType::Ipsec->value,
                'localRoutes' => [
                    new GatewayConnectionRouteRequest([
                        'name' => 'upcloud-example-route',
                        'type' => GatewayConnectionRouteType::Static_->value,
                        'staticNetwork' => '10.0.0.0/24',
                    ]),
                ],
                'remoteRoutes' => [
                    new GatewayConnectionRouteRequest([
                        'name' => 'remote-example-route',
                        'type' => GatewayConnectionRouteType::Static_->value,
                        'staticNetwork' => '10.0.1.0/24',
                    ]),
                ],
                'tunnels' => [
                    new GatewayTunnelCreateRequest([
                        'name' => 'example-tunnel-1',
                        'localAddress' => new GatewayTunnelCreateRequestLocalAddress([
                            'name' => 'public-ip-1',
                        ]),
                        'remoteAddress' => new GatewayTunnelCreateRequestRemoteAddress([
                            'address' => '100.10.0.111',
                        ]),
                        'ipsec' => new GatewayTunnelCreateRequestIpsec([
                            'authentication' => new GatewayTunnelCreateRequestIpsecAuthentication([
                                'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                                'psk' => '{your PSK}',
                            ]),
                        ]),
                        'tunnelInternalIp' => '169.254.17.1',
                        'internalPeerPingInterval' => 0,
                    ]),
                ],
            ]),
        ],
        'labels' => [
            new GatewayLabelCreateRequest([
                'key' => 'environment',
                'value' => 'production',
            ]),
        ],
        'configuredStatus' => GatewayServiceConfiguredStatus::Started->value,
        'automaticTunnelInternalIpAllocation' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Name of the service

</dd>
</dl>

<dl>
<dd>

**$plan:** `string` — Plan

</dd>
</dl>

<dl>
<dd>

**$zone:** `string` — Zone

</dd>
</dl>

<dl>
<dd>

**$features:** `array` — Active features

</dd>
</dl>

<dl>
<dd>

**$routers:** `array` — Service routers

</dd>
</dl>

<dl>
<dd>

**$addresses:** `?array` — Service addresses

</dd>
</dl>

<dl>
<dd>

**$connections:** `?array` — Service connections

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$automaticTunnelInternalIpAllocation:** `?bool` — Allocate and use tunnel internal IPs automatically

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;getGatewayService($serviceUuid) -> GatewayServiceDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get service details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->getGatewayService(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;replaceGatewayService($serviceUuid, $request) -> GatewayServiceDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replace service configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->replaceGatewayService(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GatewayServiceReplaceRequest([
        'name' => 'gateway-service',
        'plan' => 'development-gwaas-1c2g',
        'configuredStatus' => GatewayServiceConfiguredStatus::Started->value,
        'labels' => [
            new GatewayLabelCreateRequest([
                'key' => 'environment',
                'value' => 'production',
            ]),
        ],
        'automaticTunnelInternalIpAllocation' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name of the service

</dd>
</dl>

<dl>
<dd>

**$plan:** `?string` — Plan

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$connections:** `mixed` — Service connections

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>

<dl>
<dd>

**$automaticTunnelInternalIpAllocation:** `?bool` — Allocate and use tunnel internal IPs automatically

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;deleteGatewayService($serviceUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing service by given {service-identifier}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->deleteGatewayService(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;modifyGatewayService($serviceUuid, $request) -> GatewayServiceDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modify service configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->modifyGatewayService(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GatewayServiceModifyRequest([
        'name' => 'gateway-service',
        'features' => [
            GatewayServiceFeatures::Nat->value,
        ],
        'plan' => 'development-gwaas-1c2g',
        'configuredStatus' => GatewayServiceConfiguredStatus::Started->value,
        'connections' => [
            new GatewayConnectionModifyRequest([
                'uuid' => '01234567-89ab-cdef-0123-456789abcdef',
                'name' => 'gateway-service',
                'type' => GatewayConnectionType::Ipsec->value,
                'localRoutes' => [
                    new GatewayConnectionRouteRequest([
                        'name' => 'modified-routes',
                        'type' => GatewayConnectionRouteType::Static_->value,
                        'staticNetwork' => '10.0.22.0/24',
                    ]),
                ],
            ]),
        ],
        'labels' => [
            new GatewayLabelCreateRequest([
                'key' => 'environment',
                'value' => 'production',
            ]),
        ],
        'automaticTunnelInternalIpAllocation' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the service

</dd>
</dl>

<dl>
<dd>

**$features:** `?array` — Active features

</dd>
</dl>

<dl>
<dd>

**$plan:** `?string` — Plan

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `?string`

</dd>
</dl>

<dl>
<dd>

**$connections:** `?array` — Service connections

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>

<dl>
<dd>

**$automaticTunnelInternalIpAllocation:** `?bool` — Allocate and use tunnel internal IPs automatically

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;flushGatewayNat($serviceUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Flush NAT rules.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->flushGatewayNat(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;listGatewayConnections($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List available connections for service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->listGatewayConnections(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;createGatewayConnection($serviceUuid, $request) -> GatewayConnectionDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new connection.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->createGatewayConnection(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateGatewayConnectionRequest([
        'body' => new GatewayConnectionCreateRequest([
            'name' => 'gateway-service',
            'type' => GatewayConnectionType::Ipsec->value,
            'localRoutes' => [
                new GatewayConnectionRouteRequest([
                    'name' => 'upcloud-example-route',
                    'type' => GatewayConnectionRouteType::Static_->value,
                    'staticNetwork' => '10.0.0.0/24',
                ]),
            ],
            'remoteRoutes' => [
                new GatewayConnectionRouteRequest([
                    'name' => 'remote-example-route',
                    'type' => GatewayConnectionRouteType::Static_->value,
                    'staticNetwork' => '10.0.1.0/24',
                ]),
            ],
            'tunnels' => [
                new GatewayTunnelCreateRequest([
                    'name' => 'example-tunnel-1',
                    'localAddress' => new GatewayTunnelCreateRequestLocalAddress([
                        'name' => 'public-ip-1',
                    ]),
                    'remoteAddress' => new GatewayTunnelCreateRequestRemoteAddress([
                        'address' => '100.10.0.111',
                    ]),
                    'ipsec' => new GatewayTunnelCreateRequestIpsec([
                        'authentication' => new GatewayTunnelCreateRequestIpsecAuthentication([
                            'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                            'psk' => '{your PSK}',
                        ]),
                    ]),
                    'tunnelInternalIp' => '169.254.17.1',
                    'internalPeerPingInterval' => 0,
                ]),
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `GatewayConnectionCreateRequest`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;getGatewayConnection($serviceUuid, $connectionUuid) -> GatewayConnectionDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get connection details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->getGatewayConnection(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;deleteGatewayConnection($serviceUuid, $connectionUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing connection by given {connection-identifier}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->deleteGatewayConnection(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;modifyGatewayConnection($serviceUuid, $connectionUuid, $request) -> GatewayConnectionDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modify connection configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->modifyGatewayConnection(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    new ModifyGatewayConnectionRequest([
        'body' => new GatewayConnectionModifyRequest([
            'uuid' => '01234567-89ab-cdef-0123-456789abcdef',
            'name' => 'gateway-service',
            'type' => GatewayConnectionType::Ipsec->value,
            'localRoutes' => [
                new GatewayConnectionRouteRequest([
                    'name' => 'modified-routes',
                    'type' => GatewayConnectionRouteType::Static_->value,
                    'staticNetwork' => '10.0.22.0/24',
                ]),
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `GatewayConnectionModifyRequest`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;listGatewayTunnels($serviceUuid, $connectionUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List available tunnels for service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->listGatewayTunnels(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;createGatewayTunnel($serviceUuid, $connectionUuid, $request) -> GatewayTunnelDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new tunnel.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->createGatewayTunnel(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateGatewayTunnelRequest([
        'body' => new GatewayTunnelCreateRequest([
            'name' => 'gateway-service',
            'localAddress' => new GatewayTunnelCreateRequestLocalAddress([
                'name' => 'gateway-service',
            ]),
            'remoteAddress' => new GatewayTunnelCreateRequestRemoteAddress([
                'address' => '203.0.113.10',
            ]),
            'ipsec' => new GatewayTunnelCreateRequestIpsec([
                'authentication' => new GatewayTunnelCreateRequestIpsecAuthentication([
                    'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                    'psk' => 'MySecretPsk123',
                ]),
                'phase1Algorithms' => [
                    GatewaySupportedProposalAlgorithms::Aes128->value,
                    GatewaySupportedProposalAlgorithms::Aes256->value,
                    GatewaySupportedProposalAlgorithms::Aes128Gcm128->value,
                    GatewaySupportedProposalAlgorithms::Aes256Gcm128->value,
                ],
                'phase2Algorithms' => [
                    GatewaySupportedProposalAlgorithms::Aes128->value,
                    GatewaySupportedProposalAlgorithms::Aes256->value,
                    GatewaySupportedProposalAlgorithms::Aes128Gcm128->value,
                    GatewaySupportedProposalAlgorithms::Aes256Gcm128->value,
                ],
                'phase1IntegrityAlgorithms' => [
                    GatewaySupportedIntegrityAlgorithms::Sha256->value,
                    GatewaySupportedIntegrityAlgorithms::Sha384->value,
                    GatewaySupportedIntegrityAlgorithms::Sha512->value,
                ],
                'phase2IntegrityAlgorithms' => [
                    GatewaySupportedIntegrityAlgorithms::Sha256->value,
                    GatewaySupportedIntegrityAlgorithms::Sha384->value,
                    GatewaySupportedIntegrityAlgorithms::Sha512->value,
                ],
                'phase1DhGroupNumbers' => [
                    16,
                    18,
                    19,
                ],
                'phase2DhGroupNumbers' => [
                    14,
                    16,
                    18,
                    19,
                ],
            ]),
            'tunnelInternalIp' => '10.0.0.1',
            'internalPeerPingInterval' => 0,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `GatewayTunnelCreateRequest`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;getGatewayTunnel($serviceUuid, $connectionUuid, $tunnelUuid) -> GatewayTunnelDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get tunnel details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->getGatewayTunnel(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>

<dl>
<dd>

**$tunnelUuid:** `string` — Tunnel UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;deleteGatewayTunnel($serviceUuid, $connectionUuid, $tunnelUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing tunnel by given {tunnel-identifier}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->deleteGatewayTunnel(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>

<dl>
<dd>

**$tunnelUuid:** `string` — Tunnel UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;modifyGatewayTunnel($serviceUuid, $connectionUuid, $tunnelUuid, $request) -> GatewayTunnelDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modify tunnel configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->modifyGatewayTunnel(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    new ModifyGatewayTunnelRequest([
        'body' => new GatewayTunnelModifyRequest([
            'uuid' => '01234567-89ab-cdef-0123-456789abcdef',
            'name' => 'gateway-service',
            'localAddress' => new GatewayTunnelModifyRequestLocalAddress([
                'name' => 'gateway-service',
            ]),
            'remoteAddress' => new GatewayTunnelModifyRequestRemoteAddress([
                'address' => '203.0.113.10',
            ]),
            'ipsec' => new GatewayTunnelModifyRequestIpsec([
                'authentication' => new GatewayTunnelModifyRequestIpsecAuthentication([
                    'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                    'psk' => 'MySecretPsk123',
                ]),
                'phase1Algorithms' => [
                    GatewaySupportedProposalAlgorithms::Aes128Gcm16->value,
                ],
                'phase2Algorithms' => [
                    GatewaySupportedProposalAlgorithms::Aes128Gcm16->value,
                ],
                'phase1IntegrityAlgorithms' => [
                    GatewaySupportedIntegrityAlgorithms::Sha256->value,
                    GatewaySupportedIntegrityAlgorithms::Sha384->value,
                    GatewaySupportedIntegrityAlgorithms::Sha512->value,
                ],
                'phase2IntegrityAlgorithms' => [
                    GatewaySupportedIntegrityAlgorithms::Sha256->value,
                    GatewaySupportedIntegrityAlgorithms::Sha384->value,
                    GatewaySupportedIntegrityAlgorithms::Sha512->value,
                ],
                'phase1DhGroupNumbers' => [
                    16,
                    18,
                    19,
                ],
                'phase2DhGroupNumbers' => [
                    14,
                    16,
                    18,
                    19,
                ],
            ]),
            'tunnelInternalIp' => '10.0.0.1',
            'internalPeerPingInterval' => 0,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$connectionUuid:** `string` — Connection UUID

</dd>
</dl>

<dl>
<dd>

**$tunnelUuid:** `string` — Tunnel UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `GatewayTunnelModifyRequest`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;listGatewayServiceLabels($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List available service labels for service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->listGatewayServiceLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;createGatewayServiceLabel($serviceUuid, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new service label.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->createGatewayServiceLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateGatewayServiceLabelRequest([
        'body' => new GatewayLabelCreateRequest([
            'key' => 'environment',
            'value' => 'production',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `GatewayLabelCreateRequest`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;getGatewayServiceLabel($serviceUuid, $labelKey) -> GatewayLabelDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get service label details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->getGatewayServiceLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — Label identifier

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;deleteGatewayServiceLabel($serviceUuid, $labelKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing service label by given {service-label-identifier}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->deleteGatewayServiceLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — Label identifier

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;modifyGatewayServiceLabel($serviceUuid, $labelKey, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modify service label configuration.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->modifyGatewayServiceLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
    new GatewayLabelModifyRequest([
        'key' => 'environment',
        'value' => 'production',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — Label identifier

</dd>
</dl>

<dl>
<dd>

**$key:** `?string`

</dd>
</dl>

<dl>
<dd>

**$value:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;listGatewayAddresses($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List available service addresses for service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->listGatewayAddresses(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;getGatewayAddress($serviceUuid, $addressName) -> GatewayAddressDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get service address details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->getGatewayAddress(
    '01234567-89ab-cdef-0123-456789abcdef',
    'advanced',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$addressName:** `string` — Address identifier

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;modifyGatewayAddress($serviceUuid, $addressName, $request) -> GatewayAddressDetailsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modify existing service address by given {service-address-identifier}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->modifyGatewayAddress(
    '01234567-89ab-cdef-0123-456789abcdef',
    'advanced',
    new GatewayAddressModifyRequest([
        'address' => '203.0.113.10',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$addressName:** `string` — Address identifier

</dd>
</dl>

<dl>
<dd>

**$address:** `string` — Floating IP address to assign to the service address.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;releaseGatewayFloatingIp($serviceUuid, $addressName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Release the user-provisioned Floating IP of an existing service address by given {service-address-identifier}, reverting it to a service-provisioned address while keeping the same name.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->releaseGatewayFloatingIp(
    '01234567-89ab-cdef-0123-456789abcdef',
    'advanced',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$addressName:** `string` — Address identifier

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;getGatewayMetrics($serviceUuid) -> GatewayServiceMetricsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List available service metrics for service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->getGatewayMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;gateway-&gt;createGatewayServiceLogSession($serviceUuid, $request) -> GatewayServiceLogSessionCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new service log session.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->gateway->createGatewayServiceLogSession(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GatewayServiceLogSessionCreateRequest([
        'sessionType' => GatewayServiceLogSessionTypes::Vpn->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — Service UUID

</dd>
</dl>

<dl>
<dd>

**$sessionType:** `string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## load-balancer
<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancers($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available load balancer services.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancers(
    new ListLoadBalancersRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort resources by field. Prefix with '-' for descending order.

</dd>
</dl>

<dl>
<dd>

**$label:** `?string` — Filter resources by label. Can be provided multiple times for multiple labels. Format: 'key=value' for exact match or 'key' for existence check.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancer($request) -> LoadBalancerService</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new load balancer service.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Name of the service

</dd>
</dl>

<dl>
<dd>

**$zone:** `string` — Zone

</dd>
</dl>

<dl>
<dd>

**$plan:** `string` — Plan

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$frontends:** `array` — Service frontends

</dd>
</dl>

<dl>
<dd>

**$backends:** `?array` — Service backends

</dd>
</dl>

<dl>
<dd>

**$resolvers:** `?array` — Service resolvers

</dd>
</dl>

<dl>
<dd>

**$networkUuid:** `?string` — Private Network UUID

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array` — Service networks

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>

<dl>
<dd>

**$maintenanceDow:** `?string`

</dd>
</dl>

<dl>
<dd>

**$maintenanceTime:** `?string`

</dd>
</dl>

<dl>
<dd>

**$ipAddresses:** `?array` — List of IP addresses for the network

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancer($serviceUuid) -> LoadBalancerService</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns load balancer service details by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancer(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;replaceLoadBalancer($serviceUuid, $request) -> LoadBalancerService</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces existing load balancer service by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$name:** `string` — Name of the service

</dd>
</dl>

<dl>
<dd>

**$plan:** `string` — Plan

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `string`

</dd>
</dl>

<dl>
<dd>

**$frontends:** `?array` — Service frontends

</dd>
</dl>

<dl>
<dd>

**$backends:** `?array` — Service backends

</dd>
</dl>

<dl>
<dd>

**$resolvers:** `?array` — Service resolvers

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>

<dl>
<dd>

**$maintenanceDow:** `?string`

</dd>
</dl>

<dl>
<dd>

**$maintenanceTime:** `?string`

</dd>
</dl>

<dl>
<dd>

**$ipAddresses:** `?array` — List of IP addresses for the network

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancer($serviceUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing load balancer service by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancer(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancer($serviceUuid, $request) -> LoadBalancerService</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing load balancer service by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->modifyLoadBalancer(
    '01234567-89ab-cdef-0123-456789abcdef',
    new LoadBalancerServiceModify([
        'name' => 'updated-loadbalancer',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the service

</dd>
</dl>

<dl>
<dd>

**$plan:** `?string` — Plan

</dd>
</dl>

<dl>
<dd>

**$configuredStatus:** `?string`

</dd>
</dl>

<dl>
<dd>

**$frontends:** `?array` — Service frontends

</dd>
</dl>

<dl>
<dd>

**$backends:** `?array` — Service backends

</dd>
</dl>

<dl>
<dd>

**$resolvers:** `?array` — Service resolvers

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>

<dl>
<dd>

**$maintenanceDow:** `?string`

</dd>
</dl>

<dl>
<dd>

**$maintenanceTime:** `?string`

</dd>
</dl>

<dl>
<dd>

**$ipAddresses:** `?array` — List of IP addresses for the network

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerFrontends($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service frontends by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerFrontends(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerFrontend($serviceUuid, $request) -> LoadBalancerFrontend</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new service frontend by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerFrontendCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontend($serviceUuid, $frontendName) -> LoadBalancerFrontend</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service frontend details by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerFrontend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerFrontend($serviceUuid, $frontendName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing frontend by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerFrontend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerFrontend($serviceUuid, $frontendName, $request) -> LoadBalancerFrontend</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing service frontend by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the frontend

</dd>
</dl>

<dl>
<dd>

**$port:** `?int` — Port to listen

</dd>
</dl>

<dl>
<dd>

**$mode:** `?string`

</dd>
</dl>

<dl>
<dd>

**$defaultBackend:** `?string` — Default backend

</dd>
</dl>

<dl>
<dd>

**$properties:** `?LoadBalancerFrontendPropertiesCreate`

</dd>
</dl>

<dl>
<dd>

**$networks:** `?array` — Network names

</dd>
</dl>

<dl>
<dd>

**$tlsConfigs:** `?array` — TLS Configs

</dd>
</dl>

<dl>
<dd>

**$rules:** `?array` — Rules

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerFrontendTlsConfigs($serviceUuid, $frontendName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available frontend TLS configs by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerFrontendTlsConfigs(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $request) -> LoadBalancerTlsConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new TLS config by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerTlsConfigCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $tlsConfigName) -> LoadBalancerTlsConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns frontend TLS config details by given {service-uuid}, {frontend-name}, and {tls-config-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerFrontendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-tls-config-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $tlsConfigName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing TLS config by given {service-uuid}, {frontend-name}, and {tls-config-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerFrontendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-tls-config-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerFrontendTlsConfig($serviceUuid, $frontendName, $tlsConfigName, $request) -> LoadBalancerTlsConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing TLS config by given {service-uuid}, {frontend-name}, and {tls-config-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerTlsConfigModify`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerRules($serviceUuid, $frontendName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available frontend rules by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerRules(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerRule($serviceUuid, $frontendName, $request) -> LoadBalancerRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new rule by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerRuleCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerRule($serviceUuid, $frontendName, $ruleName) -> LoadBalancerRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns frontend rule details by given {service-uuid}, {frontend-name}, and {rule-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-rule-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$ruleName:** `string` — The unique identifier for the rule.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;replaceLoadBalancerRule($serviceUuid, $frontendName, $ruleName, $request) -> LoadBalancerRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replaces existing rule by given {service-uuid}, {frontend-name}, and {rule-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$ruleName:** `string` — The unique identifier for the rule.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerRuleCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerRule($serviceUuid, $frontendName, $ruleName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing rule by given {service-uuid}, {frontend-name}, and {rule-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    'example-rule-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$ruleName:** `string` — The unique identifier for the rule.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerRule($serviceUuid, $frontendName, $ruleName, $request) -> LoadBalancerRule</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing rule by given {service-uuid}, {frontend-name}, and {rule-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$ruleName:** `string` — The unique identifier for the rule.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the rule

</dd>
</dl>

<dl>
<dd>

**$priority:** `?int` — Priority

</dd>
</dl>

<dl>
<dd>

**$matchingCondition:** `?string`

</dd>
</dl>

<dl>
<dd>

**$matchers:** `?array` — Rule matchers

</dd>
</dl>

<dl>
<dd>

**$actions:** `?array` — Rule actions

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerBackends($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service backends by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerBackends(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerBackend($serviceUuid, $request) -> LoadBalancerBackend</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new backend by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerBackendCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackend($serviceUuid, $backendName) -> LoadBalancerBackend</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service backend details by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerBackend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerBackend($serviceUuid, $backendName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing backend by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerBackend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerBackend($serviceUuid, $backendName, $request) -> LoadBalancerBackend</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing backend by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->modifyLoadBalancerBackend(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new LoadBalancerBackendModify([
        'name' => 'updated-backend',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the backend

</dd>
</dl>

<dl>
<dd>

**$members:** `?array` — Backend members

</dd>
</dl>

<dl>
<dd>

**$tlsConfigs:** `?array` — TLS Configs

</dd>
</dl>

<dl>
<dd>

**$resolver:** `?string` — Resolver reference

</dd>
</dl>

<dl>
<dd>

**$properties:** `?LoadBalancerBackendPropertiesCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerMembers($serviceUuid, $backendName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available backend members by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerMembers(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerMember($serviceUuid, $backendName, $request) -> LoadBalancerMember</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new member by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerMemberCreateZero|LoadBalancerMemberCreateOne`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMember($serviceUuid, $backendName, $memberName) -> LoadBalancerMember</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns backend member details by given {service-uuid}, {backend-name} and {member-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerMember(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'dev-member',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$memberName:** `string` — The unique identifier for the member.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerMember($serviceUuid, $backendName, $memberName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing member by given {service-uuid}, {backend-name} and {member-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerMember(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'dev-member',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$memberName:** `string` — The unique identifier for the member.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerMember($serviceUuid, $backendName, $memberName, $request) -> LoadBalancerMember</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing member by given {service-uuid}, {backend-name} and {member-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$memberName:** `string` — The unique identifier for the member.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerMemberModifyZero|LoadBalancerMemberModifyOne`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerBackendTlsConfigs($serviceUuid, $backendName) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available backend TLS configs by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerBackendTlsConfigs(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $request) -> LoadBalancerTlsConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new TLS config by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerTlsConfigCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $tlsConfigName) -> LoadBalancerTlsConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns backend TLS config details by given {service-uuid}, {backend-name}, and {tls-config-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerBackendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'example-tls-config-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $tlsConfigName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing TLS config by given {service-uuid}, {backend-name}, and {tls-config-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerBackendTlsConfig(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'example-tls-config-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerBackendTlsConfig($serviceUuid, $backendName, $tlsConfigName, $request) -> LoadBalancerTlsConfig</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing TLS config by given {service-uuid}, {backend-name}, and {tls-config-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$tlsConfigName:** `string` — The unique identifier for the TLS configuration.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerTlsConfigModify`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerNetwork($serviceUuid, $networkName, $request) -> LoadBalancerNetwork</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing service network by given {service-uuid} and {network-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->modifyLoadBalancerNetwork(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-network-1',
    new LoadBalancerNetworkModify([
        'name' => 'updated-network',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$networkName:** `string` — The unique identifier for the network.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the network

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerIpAddresses($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available IP addresses by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerIpAddresses(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerIpAddress($serviceUuid, $request) -> LoadBalancerIpAddress</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Attach a floating public IPv4 address to the service using the specified {service-uuid}. The number of attachable floating IPv4 addresses is limited to the number of nodes in the plan, and all addresses must be in the same zone as the service and detached.

Note: Floating public IPv4 addresses have configurable release policies. When the service is deleted or an IP address is detached, addresses with the keep policy will be converted to detached floating IPs that remain available in your account. Addresses with the release policy will be automatically deleted. For more details, see IP Addresses.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerIpAddressCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerIpAddress($serviceUuid, $ipAddress) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns IP address details by given {service-uuid} and {ip-address}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerIpAddress(
    '01234567-89ab-cdef-0123-456789abcdef',
    '192.168.1.1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `string` — The unique identifier for the IP address.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerIpAddress($serviceUuid, $ipAddress)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Detach a floating public IPv4 address from the service by given {service-uuid} and {address}.
				Depending on the release policy, the customer retains the floating IP if the policy is set to keep.
				If the policy is set to release, the floating IP will be deleted.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerIpAddress(
    '01234567-89ab-cdef-0123-456789abcdef',
    '192.168.1.1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$ipAddress:** `string` — The unique identifier for the IP address.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerResolvers($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service domain name resolvers by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerResolvers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerResolver($serviceUuid, $request) -> LoadBalancerResolver</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new resolver by given {service-uuid}.

Resolver is a DNS server usually residing in a user's private network. It's used to resolve IPs for backend members of type dynamic.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerResolverCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerResolver($serviceUuid, $resolverName) -> LoadBalancerResolver</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns backend resolver details by given {service-uuid} and {resolver-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerResolver(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-resolver-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$resolverName:** `string` — The unique identifier for the resolver.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerResolver($serviceUuid, $resolverName)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing resolver by given {service-uuid} and {resolver-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerResolver(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-resolver-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$resolverName:** `string` — The unique identifier for the resolver.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerResolver($serviceUuid, $resolverName, $request) -> LoadBalancerResolver</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing resolver by given {service-uuid} and {resolver-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$resolverName:** `string` — The unique identifier for the resolver.

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the resolver

</dd>
</dl>

<dl>
<dd>

**$nameservers:** `?array` — Nameservers

</dd>
</dl>

<dl>
<dd>

**$retries:** `?int` — Number of retries on failure

</dd>
</dl>

<dl>
<dd>

**$timeout:** `?int` — Timeout for the query in seconds

</dd>
</dl>

<dl>
<dd>

**$timeoutRetry:** `?int` — Timeout for the query retries in seconds

</dd>
</dl>

<dl>
<dd>

**$cacheValid:** `?int` — Time in seconds to cache valid results

</dd>
</dl>

<dl>
<dd>

**$cacheInvalid:** `?int` — Time in seconds to cache invalid results

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerLabels($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available service labels by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerLabel($serviceUuid, $request) -> LoadBalancerLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new label by given {service-uuid}.

Labels used for service filtering.

Service labels usage examples
Below are some examples of what certain GET requests might look like.

exact match: GET /1.3/load-balancer?label=env%3Dstaging
existence: GET /1.3/load-balancer?label=env
multiple: GET /1.3/load-balancer?label=env&label=foo%3Dbar
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerLabelCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerLabel($serviceUuid, $labelKey) -> LoadBalancerLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns label details by given {service-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The unique identifier for the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerLabel($serviceUuid, $labelKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing label by given {service-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The unique identifier for the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerLabel($serviceUuid, $labelKey, $request) -> LoadBalancerLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing label by given {service-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The unique identifier for the label.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerLabelModify`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMetrics($serviceUuid) -> LoadBalancerMetrics</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service metrics by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerMetrics(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMetricsSeries($serviceUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns service metric series by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontendCombinedMetricsSeries($serviceUuid, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns combined frontend metric series by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerFrontendCombinedMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GetLoadBalancerFrontendCombinedMetricsSeriesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerFrontendMetricsSeries($serviceUuid, $frontendName, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns frontend metric series by given {service-uuid} and {frontend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerFrontendMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-frontend-1',
    new GetLoadBalancerFrontendMetricsSeriesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$frontendName:** `string` — The unique identifier for the frontend.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackendCombinedMetricsSeries($serviceUuid, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns combined backend metric series by given {service-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerBackendCombinedMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    new GetLoadBalancerBackendCombinedMetricsSeriesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerBackendMetricsSeries($serviceUuid, $backendName, $request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns backend metric series by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerBackendMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new GetLoadBalancerBackendMetricsSeriesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMemberCombinedMetricsSeries($serviceUuid, $backendName, $request) -> LoadBalancerMemberMetricsSeriesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns combined backend members metric series by given {service-uuid} and {backend-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerMemberCombinedMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    new GetLoadBalancerMemberCombinedMetricsSeriesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerMemberMetricsSeries($serviceUuid, $backendName, $memberName, $request) -> LoadBalancerMemberMetricsSeriesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns backend member metric series by given {service-uuid}, {backend-name}, and {member-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerMemberMetricsSeries(
    '01234567-89ab-cdef-0123-456789abcdef',
    'backend-infra',
    'dev-member',
    new GetLoadBalancerMemberMetricsSeriesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serviceUuid:** `string` — The unique identifier for the service.

</dd>
</dl>

<dl>
<dd>

**$backendName:** `string` — The unique identifier for the backend.

</dd>
</dl>

<dl>
<dd>

**$memberName:** `string` — The unique identifier for the member.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Sort metrics by field. Prefix with '-' for descending order.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerCertificateBundles($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available certificate bundles.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerCertificateBundles(
    new ListLoadBalancerCertificateBundlesRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$label:** `?string` — Filter resources by label. Can be provided multiple times for multiple labels. Format: 'key=value' for exact match or 'key' for existence check.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerCertificateBundle($request) -> LoadBalancerCertificateBundle</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new certificate bundle.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->createLoadBalancerCertificateBundle(
    new LoadBalancerCertificateBundleCreateZero([
        'type' => LoadBalancerCertificateBundleCreateZeroType::Manual->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `LoadBalancerCertificateBundleCreateZero|LoadBalancerCertificateBundleCreateCertificate|LoadBalancerCertificateBundleCreateType`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerCertificateBundle($bundleUuid) -> LoadBalancerCertificateBundle</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns certificate bundle details by given {bundle-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerCertificateBundle(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerCertificateBundle($bundleUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing certificate bundle by given {bundle-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerCertificateBundle(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerCertificateBundle($bundleUuid, $request) -> LoadBalancerCertificateBundle</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing a manual, dynamic or authority certificate bundle by given {bundle-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerCertificateBundleManualModify|LoadBalancerCertificateBundleDynamicModify|LoadBalancerCertificateBundleAuthorityModify`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerCertificateBundleLabels($bundleUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available certificate bundle labels by given {bundle-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerCertificateBundleLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;createLoadBalancerCertificateBundleLabel($bundleUuid, $request) -> LoadBalancerLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new label by given {bundle-uuid}.

Labels used for certificate bundles filtering.

Certificate bundle labels usage examples
Below are some examples of what certain GET requests might look like.

exact match: GET /1.3/load-balancer/certificate-bundles?label=env%3Dstaging
existence: GET /1.3/load-balancer/certificate-bundles?label=env
multiple: GET /1.3/load-balancer/certificate-bundles?label=env&label=foo%3Dbar
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerLabelCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerCertificateBundleLabel($bundleUuid, $labelKey) -> LoadBalancerLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns label details by given {bundle-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerCertificateBundleLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The unique identifier for the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;deleteLoadBalancerCertificateBundleLabel($bundleUuid, $labelKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing label by given {bundle-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->deleteLoadBalancerCertificateBundleLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'example-key-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The unique identifier for the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;modifyLoadBalancerCertificateBundleLabel($bundleUuid, $labelKey, $request) -> LoadBalancerLabelResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing label by given {bundle-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$bundleUuid:** `string` — The unique identifier for the certificate bundle.

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The unique identifier for the label.

</dd>
</dl>

<dl>
<dd>

**$request:** `LoadBalancerLabelModify`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerDnsChallengeDomain() -> LoadBalancerDnsChallengeDomainResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns DNS challenge domain.

This can be used to validate domain ownership using the ACME challenge method. To validate your domain, you need to add CNAME record to the domain provided by this API to your DNS settings. The name/host of the CNAME record should be _acme-challenge or _acme-challenge.mysubdomain if you are setting up a subdomain called mysubdomain. The target/points to of the record needs to be set to the value returned by this API.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerDnsChallengeDomain();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;listLoadBalancerPlans($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available load balancer plans.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->listLoadBalancerPlans(
    new ListLoadBalancerPlansRequest([
        'limit' => 10,
        'offset' => 0,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;loadBalancer-&gt;getLoadBalancerPlan($planName) -> LoadBalancerPlan</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns load balancer plan details by given {plan-name}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->loadBalancer->getLoadBalancerPlan(
    'example-plan-1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$planName:** `string` — The unique identifier for the plan.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## firewall-ruleset
<details><summary><code>$client-&gt;firewallRuleset-&gt;listFirewallRulesets($request) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of firewall rulesets.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->listFirewallRulesets(
    new ListFirewallRulesetsRequest([
        'limit' => 10,
        'offset' => 0,
        'sort' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Order of returned results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;createFirewallRuleset($request) -> FirewallRulesetDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new firewall ruleset.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — Name of the firewall ruleset

</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description of the firewall ruleset

</dd>
</dl>

<dl>
<dd>

**$stateful:** `?bool`

</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool`

</dd>
</dl>

<dl>
<dd>

**$defaultDnsRulesEnabled:** `?bool`

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;getFirewallRuleset($rulesetUuid) -> FirewallRulesetDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns firewall ruleset details by given {ruleset-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->getFirewallRuleset(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;deleteFirewallRuleset($rulesetUuid)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing firewall ruleset by given {ruleset-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->deleteFirewallRuleset(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;modifyFirewallRuleset($rulesetUuid, $request) -> FirewallRulesetDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing firewall ruleset by given {ruleset-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Name of the ruleset

</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — Description of the firewall ruleset

</dd>
</dl>

<dl>
<dd>

**$labels:** `?array` — Labels

</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Enabled

</dd>
</dl>

<dl>
<dd>

**$defaultDnsRulesEnabled:** `?bool`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;restoreFirewallRuleset($rulesetUuid, $rulesetVersion) -> FirewallRulesetDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Restores existing firewall ruleset by given {ruleset-uuid} and {ruleset-version}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->restoreFirewallRuleset(
    '01234567-89ab-cdef-0123-456789abcdef',
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$rulesetVersion:** `int` — Firewall ruleset version

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;listFirewallRulesetRules($rulesetUuid, $request) -> FirewallRulesetFirewallRuleListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns firewall ruleset rules.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Order of returned results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;createFirewallRulesetRule($rulesetUuid, $request) -> FirewallRulesetRuleDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new firewall ruleset rule by the given {ruleset-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->createFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    new CreateFirewallRulesetRuleRequest([
        'body' => new FirewallRulesetFirewallRuleCreate([
            'enabled' => false,
            'action' => FirewallRulesetRuleAction::Accept->value,
            'direction' => FirewallRulesetRuleDirection::In->value,
            'family' => FirewallRulesetRuleFamily::IPv4->value,
            'protocol' => FirewallRulesetRuleProtocol::Tcp->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `FirewallRulesetFirewallRuleCreate`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;createMultipleFirewallRulesetRule($rulesetUuid, $request) -> FirewallRulesetFirewallRuleListResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates multiple firewall ruleset rules by the given {ruleset-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->createMultipleFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    new FirewallRulesetFirewallMultipleRuleCreate([
        'rules' => [
            new FirewallRulesetFirewallRuleCreate([
                'enabled' => false,
                'action' => FirewallRulesetRuleAction::Accept->value,
                'direction' => FirewallRulesetRuleDirection::In->value,
                'family' => FirewallRulesetRuleFamily::IPv4->value,
                'protocol' => FirewallRulesetRuleProtocol::Tcp->value,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$rules:** `array`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;getFirewallRulesetRule($rulesetUuid, $ruleId) -> FirewallRulesetRuleDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns firewall ruleset rule details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->getFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$ruleId:** `string` — Firewall ruleset rule UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;deleteFirewallRulesetRule($rulesetUuid, $ruleId)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes an existing rule by given {ruleset-uuid} and {rule-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->deleteFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$ruleId:** `string` — Firewall ruleset rule UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;modifyFirewallRulesetRule($rulesetUuid, $ruleId, $request) -> FirewallRulesetRuleDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing firewall ruleset rule by given {ruleset_uuid} and {rule-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->modifyFirewallRulesetRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    '01234567-89ab-cdef-0123-456789abcdef',
    new FirewallRulesetFirewallRuleModify([
        'enabled' => false,
        'action' => FirewallRulesetRuleAction::Accept->value,
        'direction' => FirewallRulesetRuleDirection::In->value,
        'family' => FirewallRulesetRuleFamily::IPv4->value,
        'protocol' => FirewallRulesetRuleProtocol::Tcp->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$ruleId:** `string` — Firewall ruleset rule UUID

</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` — Enabled

</dd>
</dl>

<dl>
<dd>

**$action:** `?string`

</dd>
</dl>

<dl>
<dd>

**$comment:** `?string` — Comments

</dd>
</dl>

<dl>
<dd>

**$destinationAddressStart:** `?string`

</dd>
</dl>

<dl>
<dd>

**$destinationAddressEnd:** `?string`

</dd>
</dl>

<dl>
<dd>

**$destinationPortStart:** `?int`

</dd>
</dl>

<dl>
<dd>

**$destinationPortEnd:** `?int`

</dd>
</dl>

<dl>
<dd>

**$destinationAddressCidr:** `?string`

</dd>
</dl>

<dl>
<dd>

**$direction:** `?string`

</dd>
</dl>

<dl>
<dd>

**$family:** `?string`

</dd>
</dl>

<dl>
<dd>

**$icmpType:** `?int`

</dd>
</dl>

<dl>
<dd>

**$position:** `?int`

</dd>
</dl>

<dl>
<dd>

**$protocol:** `?string`

</dd>
</dl>

<dl>
<dd>

**$sourceAddressStart:** `?string`

</dd>
</dl>

<dl>
<dd>

**$sourceAddressEnd:** `?string`

</dd>
</dl>

<dl>
<dd>

**$sourcePortStart:** `?int`

</dd>
</dl>

<dl>
<dd>

**$sourcePortEnd:** `?int`

</dd>
</dl>

<dl>
<dd>

**$sourceAddressCidr:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;listFirewallRulesetLabels($rulesetUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of available firewall ruleset labels by given {ruleset-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->listFirewallRulesetLabels(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;createFirewallRulesetLabel($rulesetUuid, $request) -> FirewallRulesetLabelDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new label by given {ruleset-uuid}. Labels are used for group filtering.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$request:** `FirewallRulesetCreateLabel`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;listFirewallRulesetAttachedServers($rulesetUuid) -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of servers that are attached to the firewall ruleset by given {ruleset-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->listFirewallRulesetAttachedServers(
    '01234567-89ab-cdef-0123-456789abcdef',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;getFirewallRulesetLabel($rulesetUuid, $labelKey) -> FirewallRulesetLabelDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns label details by given {ruleset-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->getFirewallRulesetLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;deleteFirewallRulesetLabel($rulesetUuid, $labelKey)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing label by given {ruleset-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->deleteFirewallRulesetLabel(
    '01234567-89ab-cdef-0123-456789abcdef',
    'environment',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;modifyFirewallRulesetLabel($rulesetUuid, $labelKey, $request) -> FirewallRulesetLabelDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Modifies existing label by given {ruleset-uuid} and {label-key}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetUuid:** `string` — Firewall ruleset UUID

</dd>
</dl>

<dl>
<dd>

**$labelKey:** `string` — The key of the label.

</dd>
</dl>

<dl>
<dd>

**$key:** `?string`

</dd>
</dl>

<dl>
<dd>

**$value:** `?string`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;listServerFirewallRule($serverUuid, $request) -> FirewallRulesetServerFirewallDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of server firewall rules.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serverUuid:** `string` — Server UUID

</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` — Number of entries to receive at most.

</dd>
</dl>

<dl>
<dd>

**$offset:** `?int` — Offset for retrieved results.

</dd>
</dl>

<dl>
<dd>

**$sort:** `?string` — Order of returned results.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;createServerFirewallRule($serverUuid, $request) -> FirewallRulesetServerFirewallRuleDetail</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new server firewall rule.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serverUuid:** `string` — Server UUID

</dd>
</dl>

<dl>
<dd>

**$firewallRule:** `FirewallRulesetServerFirewallRule`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;createMultipleServerFirewallRules($serverUuid, $request) -> FirewallRulesetServerFirewallDetailResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates multiple server firewall rules by given {server-uuid}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

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
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serverUuid:** `string` — Server UUID

</dd>
</dl>

<dl>
<dd>

**$firewallRules:** `?FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules`

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;getServerFirewallRule($serverUuid, $position) -> FirewallRulesetServerFirewallRuleDetail</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns server firewall rule details by given {server-uuid} and {position}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->getServerFirewallRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serverUuid:** `string` — Server UUID

</dd>
</dl>

<dl>
<dd>

**$position:** `int|string` — Server firewall rule position

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;firewallRuleset-&gt;deleteServerFirewallRule($serverUuid, $position)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes existing server firewall rule by given {server-uuid} and {position}.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->firewallRuleset->deleteServerFirewallRule(
    '01234567-89ab-cdef-0123-456789abcdef',
    1,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$serverUuid:** `string` — Server UUID

</dd>
</dl>

<dl>
<dd>

**$position:** `int|string` — Server firewall rule position

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## vnc_keymap
<details><summary><code>$client-&gt;vncKeymap-&gt;listVncKeymaps() -> VncKeymapKeymaps</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of supported VNC keymaps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->vncKeymap->listVncKeymaps();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## zone
<details><summary><code>$client-&gt;zone-&gt;listZones() -> Zones</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of zones.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->zone->listZones();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;zone-&gt;listZoneVlaNs($zone) -> ZoneVlans</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves a list of VLANs in a specific zone.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->zone->listZoneVlaNs(
    'fi-hel1',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$zone:** `string` — The zone identifier.

</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>
