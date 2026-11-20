<?php

namespace Upcloud\Types;

enum ContainerRegistryMetricsResolution: string
{
    case FiveM = "5m";
    case OneH = "1h";
    case OneD = "1d";
    case Auto = "auto";
}
