<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgPgbouncerAutodbPoolMode: string
{
    case Transaction = "transaction";
    case Session = "session";
    case Statement = "statement";
}
