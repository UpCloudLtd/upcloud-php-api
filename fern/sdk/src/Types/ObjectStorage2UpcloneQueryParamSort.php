<?php

namespace Upcloud\Types;

enum ObjectStorage2UpcloneQueryParamSort: string
{
    case CreatedAt = "created_at";
    case CreatedAt = "-created_at";
}
