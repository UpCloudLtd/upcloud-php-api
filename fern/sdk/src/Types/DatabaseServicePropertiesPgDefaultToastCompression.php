<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgDefaultToastCompression: string
{
    case Lz4 = "lz4";
    case Pglz = "pglz";
}
