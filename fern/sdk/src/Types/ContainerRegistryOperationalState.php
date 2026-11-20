<?php

namespace Upcloud\Types;

enum ContainerRegistryOperationalState: string
{
    case Pending = "pending";
    case SettingUpStorage = "setting-up-storage";
    case SettingUpRegistry = "setting-up-registry";
    case SettingUpPublicAccess = "setting-up-public-access";
    case SettingUpPrivateAccess = "setting-up-private-access";
    case IssuingCertificate = "issuing-certificate";
    case Finalizing = "finalizing";
    case Running = "running";
    case Updating = "updating";
    case RollingBack = "rolling-back";
    case Deleting = "deleting";
    case Deleted = "deleted";
    case Failed = "failed";
    case Unknown = "unknown";
}
