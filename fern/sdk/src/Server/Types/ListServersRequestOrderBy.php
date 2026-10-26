<?php

namespace Upcloud\Server\Types;

enum ListServersRequestOrderBy: string
{
    case Asc = "asc";
    case Desc = "desc";
}
