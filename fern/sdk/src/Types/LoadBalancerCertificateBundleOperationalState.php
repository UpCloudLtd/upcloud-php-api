<?php

namespace Upcloud\Types;

enum LoadBalancerCertificateBundleOperationalState: string
{
    case Pending = "pending";
    case SetupChallenge = "setup-challenge";
    case CompleteChallenge = "complete-challenge";
    case Idle = "idle";
    case FailedChallenge = "failed-challenge";
}
