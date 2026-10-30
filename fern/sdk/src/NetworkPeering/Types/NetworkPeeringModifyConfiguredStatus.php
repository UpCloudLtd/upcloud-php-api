<?php

namespace Upcloud\NetworkPeering\Types;

enum NetworkPeeringModifyConfiguredStatus: string
{
    case Active = "active";
    case Disabled = "disabled";
}
