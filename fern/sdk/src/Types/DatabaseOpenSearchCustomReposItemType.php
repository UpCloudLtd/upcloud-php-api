<?php

namespace Upcloud\Types;

enum DatabaseOpenSearchCustomReposItemType: string
{
    case Azure = "azure";
    case Gcs = "gcs";
    case S3 = "s3";
}
