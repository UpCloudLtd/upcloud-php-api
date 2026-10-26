<?php

namespace Upcloud\Types;

enum LoadBalancerContentTypes: string
{
    case TextPlain = "text/plain";
    case TextHtml = "text/html";
    case ApplicationJavascript = "application/javascript";
    case ApplicationJson = "application/json";
}
