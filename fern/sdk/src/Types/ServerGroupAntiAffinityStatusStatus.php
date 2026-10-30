<?php

namespace Upcloud\Types;

enum ServerGroupAntiAffinityStatusStatus: string
{
    case Met = "met";
    case Unmet = "unmet";
}
