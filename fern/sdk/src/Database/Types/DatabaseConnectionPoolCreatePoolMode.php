<?php

namespace Upcloud\Database\Types;

enum DatabaseConnectionPoolCreatePoolMode: string
{
    case Session = "session";
    case Transaction = "transaction";
    case Statement = "statement";
}
