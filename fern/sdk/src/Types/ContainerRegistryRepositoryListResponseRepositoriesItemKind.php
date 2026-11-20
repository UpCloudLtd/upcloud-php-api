<?php

namespace Upcloud\Types;

enum ContainerRegistryRepositoryListResponseRepositoriesItemKind: string
{
    case MultiArch = "multi-arch";
    case Image = "image";
    case Chart = "chart";
    case Artifact = "artifact";
}
