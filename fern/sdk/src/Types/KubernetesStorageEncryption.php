<?php

namespace Upcloud\Types;

enum KubernetesStorageEncryption: string
{
    case DataAtRest = "data-at-rest";
    case None = "none";
}
