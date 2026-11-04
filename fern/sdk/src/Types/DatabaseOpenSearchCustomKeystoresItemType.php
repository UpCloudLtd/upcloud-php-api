<?php

namespace Upcloud\Types;

enum DatabaseOpenSearchCustomKeystoresItemType: string
{
    case Azure = "azure";
    case Gcs = "gcs";
    case S3 = "s3";
}
