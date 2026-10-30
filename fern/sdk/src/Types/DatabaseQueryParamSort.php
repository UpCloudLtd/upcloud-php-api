<?php

namespace Upcloud\Types;

enum DatabaseQueryParamSort: string
{
    case CreatedAt = "created_at";
    case Name = "name";
    case OperationalState = "operational_state";
    case Zone = "zone";
}
