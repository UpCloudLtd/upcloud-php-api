<?php

namespace Upcloud\Types;

enum StorageImportState: string
{
    case Prepared = "prepared";
    case Pending = "pending";
    case Importing = "importing";
    case Failed = "failed";
    case Cancelling = "cancelling";
    case Cancelled = "cancelled";
    case Completed = "completed";
}
