<?php

namespace Upcloud\Types;

enum AuditLogsOriginsParameterItem: string
{
    case Api = "api";
    case Gui = "gui";
    case UpcloudInternal = "upcloud_internal";
}
