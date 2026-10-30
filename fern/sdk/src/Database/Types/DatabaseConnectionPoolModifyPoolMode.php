<?php

namespace Upcloud\Database\Types;

enum DatabaseConnectionPoolModifyPoolMode: string
{
    case Session = "session";
    case Transaction = "transaction";
    case Statement = "statement";
}
