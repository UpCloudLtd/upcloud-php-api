<?php

namespace Upcloud\Types;

enum ServerNetworkType: string
{
    case Public_ = "public";
    case Utility = "utility";
    case Private_ = "private";
}
