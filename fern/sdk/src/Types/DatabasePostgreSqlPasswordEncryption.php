<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlPasswordEncryption: string
{
    case Md5 = "md5";
    case ScramSha256 = "scram-sha-256";
}
