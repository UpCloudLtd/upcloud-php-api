<?php

namespace Upcloud\Types;

enum PermissionTargetType: string
{
    case Server = "server";
    case Storage = "storage";
    case Network = "network";
    case Router = "router";
    case ObjectStorage = "object_storage";
    case ManagedDatabase = "managed_database";
    case ManagedObjectStorage = "managed_object_storage";
    case ManagedLoadbalancer = "managed_loadbalancer";
    case ManagedKubernetes = "managed_kubernetes";
    case Interface_ = "interface";
    case NetworkGateway = "network_gateway";
    case TagAccess = "tag_access";
    case ManagedContainerRegistry = "managed_container_registry";
    case FileStorage = "file_storage";
    case SshKey = "ssh_key";
}
