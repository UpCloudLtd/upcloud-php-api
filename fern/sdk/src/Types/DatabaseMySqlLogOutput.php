<?php

namespace Upcloud\Types;

enum DatabaseMySqlLogOutput: string
{
    case Insights = "INSIGHTS";
    case Table = "TABLE";
    case InsightsTable = "INSIGHTS,TABLE";
    case None = "NONE";
}
