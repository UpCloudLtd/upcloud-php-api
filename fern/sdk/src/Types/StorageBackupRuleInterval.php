<?php

namespace Upcloud\Types;

enum StorageBackupRuleInterval: string
{
    case Daily = "daily";
    case Mon = "mon";
    case Tue = "tue";
    case Wed = "wed";
    case Thu = "thu";
    case Fri = "fri";
    case Sat = "sat";
    case Sun = "sun";
}
