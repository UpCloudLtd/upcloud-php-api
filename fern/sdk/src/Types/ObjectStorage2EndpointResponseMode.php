<?php

namespace Upcloud\Types;

enum ObjectStorage2EndpointResponseMode: string
{
    case Api = "api";
    case StaticWebsite = "static-website";
}
