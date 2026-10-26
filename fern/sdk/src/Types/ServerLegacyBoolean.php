<?php

namespace Upcloud\Types;

enum ServerLegacyBoolean: string
{
    case Zero = "0";
    case One = "1";
    case False = "false";
    case True = "true";
    case No = "no";
    case Yes = "yes";
    case N = "n";
    case Y = "y";
    case Off = "off";
    case On = "on";
}
