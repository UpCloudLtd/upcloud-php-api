<?php

namespace Upcloud\Types;

enum GatewayQueryParamSortServices: string
{
    case CreatedAt = "created_at";
    case Name = "name";
    case Uuid = "uuid";
}
