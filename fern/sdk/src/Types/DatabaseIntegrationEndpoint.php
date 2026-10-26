<?php

namespace Upcloud\Types;

enum DatabaseIntegrationEndpoint: string
{
    case Logs = "logs";
    case Prometheus = "prometheus";
    case Rsyslog = "rsyslog";
}
