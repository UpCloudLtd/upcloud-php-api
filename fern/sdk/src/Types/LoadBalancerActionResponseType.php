<?php

namespace Upcloud\Types;

enum LoadBalancerActionResponseType: string
{
    case UseBackend = "use_backend";
    case HttpReturn = "http_return";
    case HttpRedirect = "http_redirect";
    case TcpReject = "tcp_reject";
    case SetForwardedHeaders = "set_forwarded_headers";
    case SetRequestHeader = "set_request_header";
    case SetResponseHeader = "set_response_header";
    case HttpRewritePath = "http_rewrite_path";
    case HttpRewriteUri = "http_rewrite_uri";
}
