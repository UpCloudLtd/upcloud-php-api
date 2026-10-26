<?php

namespace Upcloud\ObjectStorage2\Types;

enum ObjectStorage2AccessKeyModifyStatus: string
{
    case Active = "Active";
    case Inactive = "Inactive";
}
