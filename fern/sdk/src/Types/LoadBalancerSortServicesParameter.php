<?php

namespace Upcloud\Types;

enum LoadBalancerSortServicesParameter: string
{
    case CreatedAt = "created_at";
    case Name = "name";
    case Uuid = "uuid";
}
