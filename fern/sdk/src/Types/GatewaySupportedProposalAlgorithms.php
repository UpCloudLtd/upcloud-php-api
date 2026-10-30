<?php

namespace Upcloud\Types;

enum GatewaySupportedProposalAlgorithms: string
{
    case Aes128Gcm16 = "aes128gcm16";
    case Aes128Gcm128 = "aes128gcm128";
    case Aes192Gcm16 = "aes192gcm16";
    case Aes192Gcm128 = "aes192gcm128";
    case Aes256Gcm16 = "aes256gcm16";
    case Aes256Gcm128 = "aes256gcm128";
    case Aes128 = "aes128";
    case Aes192 = "aes192";
    case Aes256 = "aes256";
}
