<?php

namespace Upcloud\Types;

enum AccountResourceNetworkUsageType: string
{
    case LoadBalancerPrivate = "load_balancer_private";
    case LoadBalancerPrivateVlan = "load_balancer_private_vlan";
    case LoadBalancerPublic = "load_balancer_public";
    case NetworkGatewayPrivate = "network_gateway_private";
    case NetworkGatewayPrivateVlan = "network_gateway_private_vlan";
    case NetworkGatewayPublic = "network_gateway_public";
    case ObjectStorageV2Private = "object_storage_v2_private";
    case ObjectStorageV2Public = "object_storage_v2_public";
    case ServerPrivate = "server_private";
    case ServerPrivateVlan = "server_private_vlan";
    case ServerPublic = "server_public";
}
