<?php

namespace Upcloud\Types;

enum KubernetesClusterPlan: string
{
    case Development = "development";
    case ProductionSmall = "production-small";
    case DevMd = "dev-md";
    case ProdMd = "prod-md";
    case ProdMdHa = "prod-md-ha";
}
