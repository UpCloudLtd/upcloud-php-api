<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgSynchronousCommit: string
{
    case Local = "local";
    case RemoteWrite = "remote_write";
    case RemoteApply = "remote_apply";
    case On = "on";
    case Off = "off";
}
