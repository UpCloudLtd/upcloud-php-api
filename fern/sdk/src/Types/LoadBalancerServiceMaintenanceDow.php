<?php

namespace Upcloud\Types;

enum LoadBalancerServiceMaintenanceDow: string
{
    case Monday = "monday";
    case Tuesday = "tuesday";
    case Wednesday = "wednesday";
    case Thursday = "thursday";
    case Friday = "friday";
    case Saturday = "saturday";
    case Sunday = "sunday";
}
