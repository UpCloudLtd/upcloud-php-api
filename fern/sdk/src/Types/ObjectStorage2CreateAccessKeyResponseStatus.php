<?php

namespace Upcloud\Types;

enum ObjectStorage2CreateAccessKeyResponseStatus: string
{
    case Active = "Active";
    case Inactive = "Inactive";
}
