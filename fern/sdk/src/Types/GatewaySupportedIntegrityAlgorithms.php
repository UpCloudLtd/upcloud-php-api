<?php

namespace Upcloud\Types;

enum GatewaySupportedIntegrityAlgorithms: string
{
    case Aes128Gmac = "aes128gmac";
    case Aes256Gmac = "aes256gmac";
    case Sha1 = "sha1";
    case Sha256 = "sha256";
    case Sha384 = "sha384";
    case Sha512 = "sha512";
}
