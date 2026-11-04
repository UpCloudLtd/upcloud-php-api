<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlPgbouncerAutodbPoolMode: string
{
    case Transaction = "transaction";
    case Session = "session";
    case Statement = "statement";
}
