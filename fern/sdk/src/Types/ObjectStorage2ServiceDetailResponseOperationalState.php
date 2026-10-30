<?php

namespace Upcloud\Types;

enum ObjectStorage2ServiceDetailResponseOperationalState: string
{
    case Pending = "pending";
    case SetupService = "setup-service";
    case SetupNetwork = "setup-network";
    case SetupTls = "setup-tls";
    case SetupPublicEndpoint = "setup-public-endpoint";
    case SetupPrivateEndpoint = "setup-private-endpoint";
    case SetupDns = "setup-dns";
    case CleanupDeletedBuckets = "cleanup-deleted-buckets";
    case SetupIam = "setup-iam";
    case SetupCheckup = "setup-checkup";
    case Running = "running";
    case Stopped = "stopped";
    case DeletePrivateEndpoint = "delete-private-endpoint";
    case DeletePublicEndpoint = "delete-public-endpoint";
    case DeleteBuckets = "delete-buckets";
    case DeleteIam = "delete-iam";
    case DeleteNamespace = "delete-namespace";
    case DeleteDns = "delete-dns";
    case DeleteTls = "delete-tls";
    case DeleteNetwork = "delete-network";
    case DeleteService = "delete-service";
}
