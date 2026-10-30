<?php

namespace Upcloud\Types;

enum StorageImportErrorCode: string
{
    case Empty = "";
    case ClientFailure = "CLIENT_FAILURE";
    case ImportFailure = "IMPORT_FAILURE";
    case InternalFailure = "INTERNAL_FAILURE";
}
