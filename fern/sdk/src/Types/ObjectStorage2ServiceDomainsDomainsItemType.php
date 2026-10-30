<?php

namespace Upcloud\Types;

enum ObjectStorage2ServiceDomainsDomainsItemType: string
{
    case Public_ = "public";
    case Private_ = "private";
    case Custom = "custom";
}
