<?php

namespace Upcloud\Types;

enum ObjectStorage2ServiceDetailResponseStateMessagesItemCode: string
{
    case WaitingCertificateIssuing = "waiting_certificate_issuing";
    case FailedDomainVerification = "failed_domain_verification";
    case FailedCustomDomainVerification = "failed_custom_domain_verification";
    case BucketsStuckInDeletion = "buckets_stuck_in_deletion";
    case NamespaceStuckInDeletion = "namespace_stuck_in_deletion";
}
