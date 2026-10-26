<?php

namespace Upcloud\Types;

enum KubernetesAuthenticationIssuerConfigAudienceMatchPolicy: string
{
    case MatchAny = "MatchAny";
    case Empty = "";
}
