<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgSynchronousReplication: string
{
    case Quorum = "quorum";
    case Off = "off";
}
