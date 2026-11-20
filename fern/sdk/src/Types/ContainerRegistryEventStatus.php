<?php

namespace Upcloud\Types;

enum ContainerRegistryEventStatus: string
{
    case Success = "success";
    case Failure = "failure";
    case Denied = "denied";
}
