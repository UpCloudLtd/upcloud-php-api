<?php

namespace Upcloud\Types;

enum AuditLogsActionsParameterItem: string
{
    case Create = "create";
    case Read = "read";
    case Update = "update";
    case Delete = "delete";
    case AccessGranted = "access-granted";
    case AccessGrantedKubeconfig = "access-granted-kubeconfig";
    case AccessModified = "access-modified";
    case AccessUpdate = "access-update";
    case MaintenanceStart = "maintenance-start";
    case WritesEnable = "writes-enable";
    case Attach = "attach";
    case Clone_ = "clone";
    case Detach = "detach";
    case Login = "login";
    case Logout = "logout";
    case Start = "start";
    case Stop = "stop";
    case OwnerChange = "owner-change";
}
