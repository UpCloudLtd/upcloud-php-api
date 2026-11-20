<?php

namespace Upcloud\Types;

enum ContainerRegistryAccessMode: string
{
    case Public_ = "public";
    case Private_ = "private";
    case Dual = "dual";
}
