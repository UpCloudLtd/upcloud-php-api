<?php

namespace Upcloud\Storage\Types;

enum CreateStorageImportRequestStorageImportSource: string
{
    case HttpImport = "http_import";
    case DirectUpload = "direct_upload";
}
