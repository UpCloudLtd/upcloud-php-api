<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlDefaultToastCompression: string
{
    case Lz4 = "lz4";
    case Pglz = "pglz";
}
