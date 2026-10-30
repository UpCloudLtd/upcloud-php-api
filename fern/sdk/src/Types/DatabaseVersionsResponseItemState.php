<?php

namespace Upcloud\Types;

enum DatabaseVersionsResponseItemState: string
{
    case Available = "available";
    case Preview = "preview";
}
