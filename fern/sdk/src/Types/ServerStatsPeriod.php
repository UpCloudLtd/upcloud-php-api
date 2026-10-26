<?php

namespace Upcloud\Types;

enum ServerStatsPeriod: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
    case Yearly = "yearly";
}
