<?php

namespace Upcloud\Types;

enum DatabaseServiceIntegration: string
{
    case Logs = "logs";
    case Prometheus = "prometheus";
    case Rsyslog = "rsyslog";
}
