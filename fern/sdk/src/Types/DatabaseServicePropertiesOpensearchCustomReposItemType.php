<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesOpensearchCustomReposItemType: string
{
    case Azure = "azure";
    case Gcs = "gcs";
    case S3 = "s3";
}
