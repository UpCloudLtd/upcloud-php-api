<?php

namespace Upcloud\Types;

enum NetworkType: string
{
    case Public_ = "public";
    case Utility = "utility";
    case Private_ = "private";
}
