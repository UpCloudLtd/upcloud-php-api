<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlPgbouncerIgnoreStartupParametersItem: string
{
    case ExtraFloatDigits = "extra_float_digits";
    case SearchPath = "search_path";
}
