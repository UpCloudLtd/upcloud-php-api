<?php

namespace Upcloud\Types;

enum ServerGroupAntiAffinity: string
{
    case Strict = "strict";
    case Yes = "yes";
    case No = "no";
}
