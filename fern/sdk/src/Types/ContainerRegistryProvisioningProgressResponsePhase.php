<?php

namespace Upcloud\Types;

enum ContainerRegistryProvisioningProgressResponsePhase: string
{
    case Pending = "pending";
    case ClusterSelection = "cluster_selection";
    case StorageSetup = "storage_setup";
    case KubernetesSetup = "kubernetes_setup";
    case ResourceCreation = "resource_creation";
    case Networking = "networking";
    case PrivateAccess = "private_access";
    case Finalizing = "finalizing";
    case Active = "active";
    case Updating = "updating";
    case RollingBack = "rolling_back";
    case Deleting = "deleting";
    case Deleted = "deleted";
    case Failed = "failed";
}
