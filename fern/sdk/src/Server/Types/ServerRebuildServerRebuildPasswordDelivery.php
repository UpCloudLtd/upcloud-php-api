<?php

namespace Upcloud\Server\Types;

enum ServerRebuildServerRebuildPasswordDelivery: string
{
    case Email = "email";
    case Sms = "sms";
    case None = "none";
}
