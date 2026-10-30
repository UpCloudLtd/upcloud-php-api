<?php

namespace Upcloud\NetworkPeering\Types;

enum NetworkPeeringCreateConfiguredStatus: string
{
    case Active = "active";
    case Disabled = "disabled";
}
