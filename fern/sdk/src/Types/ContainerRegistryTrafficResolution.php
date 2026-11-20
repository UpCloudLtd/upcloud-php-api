<?php

namespace Upcloud\Types;

enum ContainerRegistryTrafficResolution: string
{
    case OneH = "1h";
    case OneD = "1d";
    case Auto = "auto";
}
