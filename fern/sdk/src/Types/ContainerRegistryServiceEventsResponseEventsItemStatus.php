<?php

namespace Upcloud\Types;

enum ContainerRegistryServiceEventsResponseEventsItemStatus: string
{
    case Success = "success";
    case Failure = "failure";
    case Denied = "denied";
}
