<?php

namespace Upcloud\Types;

enum KubernetesEffect: string
{
    case NoExecute = "NoExecute";
    case NoSchedule = "NoSchedule";
    case PreferNoSchedule = "PreferNoSchedule";
}
