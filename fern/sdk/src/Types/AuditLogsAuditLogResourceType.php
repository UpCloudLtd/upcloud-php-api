<?php

namespace Upcloud\Types;

enum AuditLogsAuditLogResourceType: string
{
    case Account = "account";
    case Auth = "auth";
    case InitScript = "init-script";
    case ManagedDatabase = "managed-database";
    case ManagedLoadbalancer = "managed-loadbalancer";
    case ManagedLoadbalancerCertificateBundle = "managed-loadbalancer-certificate-bundle";
    case ManagedObjectStorage = "managed-object-storage";
    case NetworkGateway = "network-gateway";
    case Server = "server";
    case Storage = "storage";
    case Uks = "uks";
    case SshKey = "ssh-key";
}
