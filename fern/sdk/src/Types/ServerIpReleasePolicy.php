<?php

namespace Upcloud\Types;

enum ServerIpReleasePolicy: string
{
    case Release = "release";
    case Keep = "keep";
}
