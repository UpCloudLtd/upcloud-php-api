<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Types\DatabaseServiceType;
use Upcloud\Database\Requests\ListDatabasesRequest;
use Upcloud\Database\Requests\DatabaseServiceCreateOpenApi;
use Upcloud\Database\Types\DatabaseServiceCreateOpenApiMaintenance;
use Upcloud\Types\DatabaseMaintenanceDow;
use Upcloud\Types\DatabaseNetworkCreate;
use Upcloud\Types\DatabaseNetworkType;
use Upcloud\Types\DatabaseNetworkFamily;
use Upcloud\Types\DatabaseLabelCreate;
use Upcloud\Types\DatabaseServicePropertiesMysql;
use Upcloud\Database\Requests\DatabaseServiceModifyOpenApi;
use Upcloud\Database\Types\DatabaseServiceModifyOpenApiMaintenance;
use Upcloud\Database\Requests\DatabaseServiceTypeModify;
use Upcloud\Database\Requests\CloneDatabaseRequest;
use Upcloud\Types\DatabaseServiceCloneMysql;
use DateTime;
use Upcloud\Types\DatabaseServiceCloneMysqlMaintenance;
use Upcloud\Database\Requests\CreateDatabaseNetworkRequest;
use Upcloud\Database\Requests\DatabaseServiceUpgrade;
use Upcloud\Database\Requests\CreateDatabaseLabelRequest;
use Upcloud\Database\Requests\DatabaseLabelModify;
use Upcloud\Database\Requests\DatabaseServiceAclModify;
use Upcloud\Database\Requests\DatabaseServiceSecurityEnable;
use Upcloud\Database\Requests\DatabaseServiceSecurityModify;
use Upcloud\Database\Requests\DatabaseIntegrationEndpointCreate;
use Upcloud\Types\DatabaseIntegrationEndpoint;
use Upcloud\Database\Requests\DatabaseIntegrationEndpointModify;
use Upcloud\Database\Requests\GetDatabaseQueryStatisticsRequest;
use Upcloud\Database\Requests\GetDatabaseLogsRequest;
use Upcloud\Database\Requests\ListDatabaseConnectionPoolsRequest;
use Upcloud\Database\Requests\DatabaseConnectionPoolCreate;
use Upcloud\Database\Types\DatabaseConnectionPoolCreatePoolMode;
use Upcloud\Database\Requests\DatabaseConnectionPoolModify;
use Upcloud\Database\Types\DatabaseConnectionPoolModifyPoolMode;
use Upcloud\Database\Requests\CreateDatabaseIntegrationRequest;
use Upcloud\Types\DatabaseServiceIntegrationCreate;
use Upcloud\Types\DatabaseServiceIntegration;
use Upcloud\Database\Requests\DatabaseServiceIntegrationModify;
use Upcloud\Database\Requests\LogicalDatabaseCreate;
use Upcloud\Database\Requests\GetDatabaseSessionsRequest;
use Upcloud\Database\Requests\DatabaseServiceTaskCreate;
use Upcloud\Database\Types\DatabaseServiceTaskCreateDatasetImport;
use Upcloud\Database\Requests\DatabaseServiceUserCreate;
use Upcloud\Database\Requests\DatabaseServiceUserModify;
use Upcloud\Database\Requests\DatabaseServiceUserAclModify;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyRedisAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyPgAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyOpensearchAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyOpensearchAccessControlRulesItem;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyValkeyAccessControl;

class DatabaseWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListDatabaseTypes(): void {
        $testId = 'database.list_database_types.0';
        $this->client->database->listDatabaseTypes(
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_types.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/service-types",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabasePlans(): void {
        $testId = 'database.list_database_plans.0';
        $this->client->database->listDatabasePlans(
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_plans.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/plans",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseType(): void {
        $testId = 'database.get_database_type.0';
        $this->client->database->getDatabaseType(
            DatabaseServiceType::Mysql->value,
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_type.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/service-types/mysql",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabases(): void {
        $testId = 'database.list_databases.0';
        $this->client->database->listDatabases(
            new ListDatabasesRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_databases.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateDatabase(): void {
        $testId = 'database.create_database.0';
        $this->client->database->createDatabase(
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
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabase(): void {
        $testId = 'database.get_database.0';
        $this->client->database->getDatabase(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabase(): void {
        $testId = 'database.delete_database.0';
        $this->client->database->deleteDatabase(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabase(): void {
        $testId = 'database.modify_database.0';
        $this->client->database->modifyDatabase(
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
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseType(): void {
        $testId = 'database.modify_database_type.0';
        $this->client->database->modifyDatabaseType(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceTypeModify([
                'targetType' => 'primary',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_type.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/service-type",
            null,
            1
        );
    }

    /**
     */
    public function testCloneDatabase(): void {
        $testId = 'database.clone_database.0';
        $this->client->database->cloneDatabase(
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
            [
                'headers' => [
                    'X-Test-Id' => 'database.clone_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/clone",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseNetworks(): void {
        $testId = 'database.list_database_networks.0';
        $this->client->database->listDatabaseNetworks(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_networks.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/networks",
            null,
            1
        );
    }

    /**
     */
    public function testCreateDatabaseNetwork(): void {
        $testId = 'database.create_database_network.0';
        $this->client->database->createDatabaseNetwork(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateDatabaseNetworkRequest([
                'body' => new DatabaseNetworkCreate([
                    'name' => 'my-network',
                    'type' => DatabaseNetworkType::Private_->value,
                    'family' => DatabaseNetworkFamily::IPv4->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/networks",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseNetwork(): void {
        $testId = 'database.get_database_network.0';
        $this->client->database->getDatabaseNetwork(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/networks/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseNetwork(): void {
        $testId = 'database.delete_database_network.0';
        $this->client->database->deleteDatabaseNetwork(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/networks/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testUpgradeDatabase(): void {
        $testId = 'database.upgrade_database.0';
        $this->client->database->upgradeDatabase(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceUpgrade([
                'targetVersion' => '12',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.upgrade_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/upgrade",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseLabels(): void {
        $testId = 'database.list_database_labels.0';
        $this->client->database->listDatabaseLabels(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateDatabaseLabel(): void {
        $testId = 'database.create_database_label.0';
        $this->client->database->createDatabaseLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateDatabaseLabelRequest([
                'body' => new DatabaseLabelCreate([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseLabel(): void {
        $testId = 'database.get_database_label.0';
        $this->client->database->getDatabaseLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'foo',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/labels/foo",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseLabel(): void {
        $testId = 'database.delete_database_label.0';
        $this->client->database->deleteDatabaseLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'foo',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/labels/foo",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseLabel(): void {
        $testId = 'database.modify_database_label.0';
        $this->client->database->modifyDatabaseLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'foo',
            new DatabaseLabelModify([
                'key' => 'environment',
                'value' => 'production',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/labels/foo",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseAvailableExtensions(): void {
        $testId = 'database.get_database_available_extensions.0';
        $this->client->database->getDatabaseAvailableExtensions(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_available_extensions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/available-extensions",
            null,
            1
        );
    }

    /**
     */
    public function testGetPgAvailableExtensions(): void {
        $testId = 'database.get_pg_available_extensions.0';
        $this->client->database->getPgAvailableExtensions(
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_pg_available_extensions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/pg/available-extensions",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseTypeVersions(): void {
        $testId = 'database.get_database_type_versions.0';
        $this->client->database->getDatabaseTypeVersions(
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_type_versions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/versions",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseAccessControl(): void {
        $testId = 'database.get_database_access_control.0';
        $this->client->database->getDatabaseAccessControl(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_access_control.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/access-control",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseAccessControl(): void {
        $testId = 'database.modify_database_access_control.0';
        $this->client->database->modifyDatabaseAccessControl(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceAclModify([
                'accessControl' => true,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_access_control.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/access-control",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseSecurity(): void {
        $testId = 'database.get_database_security.0';
        $this->client->database->getDatabaseSecurity(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_security.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/security",
            null,
            1
        );
    }

    /**
     */
    public function testEnableDatabaseSecurityAdmin(): void {
        $testId = 'database.enable_database_security_admin.0';
        $this->client->database->enableDatabaseSecurityAdmin(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceSecurityEnable([
                'adminPassword' => 'Str0ngP@ssw0rd!',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.enable_database_security_admin.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/security/admin",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseSecurityAdmin(): void {
        $testId = 'database.modify_database_security_admin.0';
        $this->client->database->modifyDatabaseSecurityAdmin(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceSecurityModify([
                'adminPassword' => 'Curr3nt@Passw0rd!',
                'newPassword' => 'N3w@Str0ngPassw0rd!',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_security_admin.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/security/admin",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseIntegrationEndpoints(): void {
        $testId = 'database.list_database_integration_endpoints.0';
        $this->client->database->listDatabaseIntegrationEndpoints(
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_integration_endpoints.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/integration-endpoints",
            null,
            1
        );
    }

    /**
     */
    public function testCreateDatabaseIntegrationEndpoint(): void {
        $testId = 'database.create_database_integration_endpoint.0';
        $this->client->database->createDatabaseIntegrationEndpoint(
            new DatabaseIntegrationEndpointCreate([
                'type' => DatabaseIntegrationEndpoint::Logs->value,
                'name' => 'webhook-endpoint',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_integration_endpoint.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/integration-endpoints",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseIntegrationEndpoint(): void {
        $testId = 'database.get_database_integration_endpoint.0';
        $this->client->database->getDatabaseIntegrationEndpoint(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_integration_endpoint.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/integration-endpoints/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseIntegrationEndpoint(): void {
        $testId = 'database.delete_database_integration_endpoint.0';
        $this->client->database->deleteDatabaseIntegrationEndpoint(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_integration_endpoint.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/integration-endpoints/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseIntegrationEndpoint(): void {
        $testId = 'database.modify_database_integration_endpoint.0';
        $this->client->database->modifyDatabaseIntegrationEndpoint(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseIntegrationEndpointModify([]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_integration_endpoint.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/integration-endpoints/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseAccountCa(): void {
        $testId = 'database.get_database_account_ca.0';
        $this->client->database->getDatabaseAccountCa(
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_account_ca.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/certificate",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseAlerts(): void {
        $testId = 'database.list_database_alerts.0';
        $this->client->database->listDatabaseAlerts(
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_alerts.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/alerts",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseStatus(): void {
        $testId = 'database.get_database_status.0';
        $this->client->database->getDatabaseStatus(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_status.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/status",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseVersions(): void {
        $testId = 'database.get_database_versions.0';
        $this->client->database->getDatabaseVersions(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_versions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/versions",
            null,
            1
        );
    }

    /**
     */
    public function testStartDatabaseManualMaintenance(): void {
        $testId = 'database.start_database_manual_maintenance.0';
        $this->client->database->startDatabaseManualMaintenance(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.start_database_manual_maintenance.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/start-maintenance",
            null,
            1
        );
    }

    /**
     */
    public function testEnableDatabaseTemporaryWrites(): void {
        $testId = 'database.enable_database_temporary_writes.0';
        $this->client->database->enableDatabaseTemporaryWrites(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.enable_database_temporary_writes.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/enable-writes",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseMigrationStatus(): void {
        $testId = 'database.get_database_migration_status.0';
        $this->client->database->getDatabaseMigrationStatus(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_migration_status.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/migration-status",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseAlerts(): void {
        $testId = 'database.get_database_alerts.0';
        $this->client->database->getDatabaseAlerts(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_alerts.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/alerts",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseMetrics(): void {
        $testId = 'database.get_database_metrics.0';
        $this->client->database->getDatabaseMetrics(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_metrics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/metrics",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseQueryStatistics(): void {
        $testId = 'database.get_database_query_statistics.0';
        $this->client->database->getDatabaseQueryStatistics(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GetDatabaseQueryStatisticsRequest([
                'limit' => 10,
                'offset' => 0,
                'order' => 'asc',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_query_statistics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/query-statistics",
            ['limit' => '10', 'offset' => '0', 'order' => 'asc'],
            1
        );
    }

    /**
     */
    public function testGetDatabaseLogs(): void {
        $testId = 'database.get_database_logs.0';
        $this->client->database->getDatabaseLogs(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GetDatabaseLogsRequest([
                'limit' => 10,
                'offset' => 0,
                'order' => 'asc',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_logs.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/logs",
            ['limit' => '10', 'offset' => '0', 'order' => 'asc'],
            1
        );
    }

    /**
     */
    public function testListDatabaseConnectionPools(): void {
        $testId = 'database.list_database_connection_pools.0';
        $this->client->database->listDatabaseConnectionPools(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ListDatabaseConnectionPoolsRequest([
                'sort' => 'asc',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_connection_pools.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/connection-pools",
            ['sort' => 'asc'],
            1
        );
    }

    /**
     */
    public function testCreateDatabaseConnectionPool(): void {
        $testId = 'database.create_database_connection_pool.0';
        $this->client->database->createDatabaseConnectionPool(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseConnectionPoolCreate([
                'database' => 'defaultdb',
                'poolMode' => DatabaseConnectionPoolCreatePoolMode::Statement->value,
                'poolName' => 'readonly-pool',
                'poolSize' => 10,
                'username' => 'readonly',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_connection_pool.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/connection-pools",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseConnectionPool(): void {
        $testId = 'database.get_database_connection_pool.0';
        $this->client->database->getDatabaseConnectionPool(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_connection_pool.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/connection-pools/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseConnectionPool(): void {
        $testId = 'database.delete_database_connection_pool.0';
        $this->client->database->deleteDatabaseConnectionPool(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_connection_pool.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/connection-pools/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseConnectionPool(): void {
        $testId = 'database.modify_database_connection_pool.0';
        $this->client->database->modifyDatabaseConnectionPool(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            new DatabaseConnectionPoolModify([
                'database' => 'defaultdb',
                'poolMode' => DatabaseConnectionPoolModifyPoolMode::Session->value,
                'poolSize' => 20,
                'username' => 'app-user',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_connection_pool.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/connection-pools/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseIndices(): void {
        $testId = 'database.list_database_indices.0';
        $this->client->database->listDatabaseIndices(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_indices.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/indices",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseIndex(): void {
        $testId = 'database.delete_database_index.0';
        $this->client->database->deleteDatabaseIndex(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_index.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/indices/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseIntegrations(): void {
        $testId = 'database.list_database_integrations.0';
        $this->client->database->listDatabaseIntegrations(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_integrations.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/integrations",
            null,
            1
        );
    }

    /**
     */
    public function testCreateDatabaseIntegration(): void {
        $testId = 'database.create_database_integration.0';
        $this->client->database->createDatabaseIntegration(
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
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_integration.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/integrations",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseIntegration(): void {
        $testId = 'database.get_database_integration.0';
        $this->client->database->getDatabaseIntegration(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_integration.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/integrations/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseIntegration(): void {
        $testId = 'database.delete_database_integration.0';
        $this->client->database->deleteDatabaseIntegration(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_integration.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/integrations/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseIntegration(): void {
        $testId = 'database.modify_database_integration.0';
        $this->client->database->modifyDatabaseIntegration(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceIntegrationModify([
                'properties' => [
                    'key1' => "value1",
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_integration.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/integrations/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseLogicalDatabases(): void {
        $testId = 'database.list_database_logical_databases.0';
        $this->client->database->listDatabaseLogicalDatabases(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_logical_databases.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/databases",
            null,
            1
        );
    }

    /**
     */
    public function testCreateDatabaseLogicalDatabase(): void {
        $testId = 'database.create_database_logical_database.0';
        $this->client->database->createDatabaseLogicalDatabase(
            '01234567-89ab-cdef-0123-456789abcdef',
            new LogicalDatabaseCreate([
                'name' => 'my_database',
                'lcCollate' => 'en_US.UTF-8',
                'lcCtype' => 'en_US.UTF-8',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_logical_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/databases",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseLogicalDatabase(): void {
        $testId = 'database.delete_database_logical_database.0';
        $this->client->database->deleteDatabaseLogicalDatabase(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_logical_database.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/databases/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabasePeeringsStatus(): void {
        $testId = 'database.get_database_peerings_status.0';
        $this->client->database->getDatabasePeeringsStatus(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_peerings_status.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/peering-status",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseSessions(): void {
        $testId = 'database.get_database_sessions.0';
        $this->client->database->getDatabaseSessions(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GetDatabaseSessionsRequest([
                'limit' => 10,
                'offset' => 0,
                'order' => 'asc',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_sessions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/sessions",
            ['limit' => '10', 'offset' => '0', 'order' => 'asc'],
            1
        );
    }

    /**
     */
    public function testTerminateDatabaseSession(): void {
        $testId = 'database.terminate_database_session.0';
        $this->client->database->terminateDatabaseSession(
            '01234567-89ab-cdef-0123-456789abcdef',
            1001,
            [
                'headers' => [
                    'X-Test-Id' => 'database.terminate_database_session.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/sessions/1001",
            null,
            1
        );
    }

    /**
     */
    public function testCreateDatabaseTask(): void {
        $testId = 'database.create_database_task.0';
        $this->client->database->createDatabaseTask(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceTaskCreate([
                'datasetImport' => new DatabaseServiceTaskCreateDatasetImport([
                    'datasetName' => 'customer-events',
                ]),
                'operation' => 'dataset_import',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_task.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/tasks",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseTask(): void {
        $testId = 'database.get_database_task.0';
        $this->client->database->getDatabaseTask(
            '01234567-89ab-cdef-0123-456789abcdef',
            1001,
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_task.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/tasks/1001",
            null,
            1
        );
    }

    /**
     */
    public function testListDatabaseUsers(): void {
        $testId = 'database.list_database_users.0';
        $this->client->database->listDatabaseUsers(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'database.list_database_users.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/users",
            null,
            1
        );
    }

    /**
     */
    public function testCreateDatabaseUser(): void {
        $testId = 'database.create_database_user.0';
        $this->client->database->createDatabaseUser(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DatabaseServiceUserCreate([
                'username' => 'api-doc-user',
                'password' => 'new-password',
                'authentication' => 'caching_sha2_password',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.create_database_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/users",
            null,
            1
        );
    }

    /**
     */
    public function testGetDatabaseUser(): void {
        $testId = 'database.get_database_user.0';
        $this->client->database->getDatabaseUser(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            [
                'headers' => [
                    'X-Test-Id' => 'database.get_database_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/users/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteDatabaseUser(): void {
        $testId = 'database.delete_database_user.0';
        $this->client->database->deleteDatabaseUser(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            [
                'headers' => [
                    'X-Test-Id' => 'database.delete_database_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/users/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseUser(): void {
        $testId = 'database.modify_database_user.0';
        $this->client->database->modifyDatabaseUser(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-service',
            new DatabaseServiceUserModify([
                'password' => 'new_secure_password_123!',
                'authentication' => 'caching_sha2_password',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/users/my-service",
            null,
            1
        );
    }

    /**
     */
    public function testModifyDatabaseUserAccessControl(): void {
        $testId = 'database.modify_database_user_access_control.0';
        $this->client->database->modifyDatabaseUserAccessControl(
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
            [
                'headers' => [
                    'X-Test-Id' => 'database.modify_database_user_access_control.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/database/01234567-89ab-cdef-0123-456789abcdef/users/my-service/access-control",
            null,
            1
        );
    }

    /**
     */
    protected function setUp(): void {
        parent::setUp();
        $this->client = new UpcloudClient(
            token: 'test-token',
        options: [
            'baseUrl' => 'http://localhost:8080',
        ],
        );
    }
}
