<?php

namespace Upcloud\Types;

enum KubernetesNodeUpdatesScheduleDow: string
{
    case Monday = "Monday";
    case Tuesday = "Tuesday";
    case Wednesday = "Wednesday";
    case Thursday = "Thursday";
    case Friday = "Friday";
    case Saturday = "Saturday";
    case Sunday = "Sunday";
    case Daily = "daily";
}
