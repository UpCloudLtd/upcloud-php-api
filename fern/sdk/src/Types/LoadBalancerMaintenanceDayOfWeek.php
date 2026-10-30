<?php

namespace Upcloud\Types;

enum LoadBalancerMaintenanceDayOfWeek: string
{
    case Sunday = "sunday";
    case Monday = "monday";
    case Tuesday = "tuesday";
    case Wednesday = "wednesday";
    case Thursday = "thursday";
    case Friday = "friday";
    case Saturday = "saturday";
}
