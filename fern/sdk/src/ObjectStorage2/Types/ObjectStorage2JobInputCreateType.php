<?php

namespace Upcloud\ObjectStorage2\Types;

enum ObjectStorage2JobInputCreateType: string
{
    case Copy = "copy";
    case Sync = "sync";
}
