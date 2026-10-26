<?php

namespace Upcloud\Types;

enum ObjectStorage2QueryParamSort: string
{
    case CreatedAt = "created_at";
    case ServiceName = "service_name";
    case OperationalState = "operational_state";
    case RegionName = "region_name";
}
