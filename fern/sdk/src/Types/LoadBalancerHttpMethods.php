<?php

namespace Upcloud\Types;

enum LoadBalancerHttpMethods: string
{
    case Get = "GET";
    case Head = "HEAD";
    case Post = "POST";
    case Put = "PUT";
    case Patch = "PATCH";
    case Delete = "DELETE";
    case Connect = "CONNECT";
    case Options = "OPTIONS";
    case Trace = "TRACE";
}
