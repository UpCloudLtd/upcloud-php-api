<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesMysqlLogOutput: string
{
    case Insights = "INSIGHTS";
    case Table = "TABLE";
    case InsightsTable = "INSIGHTS,TABLE";
    case None = "NONE";
}
