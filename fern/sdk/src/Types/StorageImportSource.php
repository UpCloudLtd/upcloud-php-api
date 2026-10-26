<?php

namespace Upcloud\Types;

enum StorageImportSource: string
{
    case HttpImport = "http_import";
    case DirectUpload = "direct_upload";
}
