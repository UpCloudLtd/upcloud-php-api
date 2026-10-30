<?php

namespace Upcloud\Types;

enum LoadBalancerMatcherResponseType: string
{
    case SrcIp = "src_ip";
    case SrcPort = "src_port";
    case BodySize = "body_size";
    case Cookie = "cookie";
    case Header = "header";
    case UrlParam = "url_param";
    case RequestHeader = "request_header";
    case ResponseHeader = "response_header";
    case HttpStatus = "http_status";
    case HttpMethod = "http_method";
    case Path = "path";
    case Url = "url";
    case Host = "host";
    case UrlQuery = "url_query";
    case NumMembersUp = "num_members_up";
}
