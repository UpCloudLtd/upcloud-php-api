<?php

namespace Upcloud\Types;

enum ContainerRegistryPeeringStatus: string
{
    case Pending = "pending";
    case Provisioning = "provisioning";
    case Active = "active";
    case Failed = "failed";
    case Disabled = "disabled";
}
