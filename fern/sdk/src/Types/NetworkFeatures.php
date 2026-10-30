<?php

namespace Upcloud\Types;

enum NetworkFeatures: string
{
    case AllowLinklocalAddress = "allow-linklocal-address";
    case AllowOverlappingIpNetwork = "allow-overlapping-ip-network";
    case ManagedByService = "managed-by-service";
    case AllowCgnatAddress = "allow-cgnat-address";
}
