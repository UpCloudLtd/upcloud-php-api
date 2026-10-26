<?php

namespace Upcloud\Types;

enum ObjectStorage2AccessKeyDetailResponseStatus: string
{
    case Active = "Active";
    case Inactive = "Inactive";
}
