<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesOpensearchCustomKeystoresItemType: string
{
    case Azure = "azure";
    case Gcs = "gcs";
    case S3 = "s3";
}
