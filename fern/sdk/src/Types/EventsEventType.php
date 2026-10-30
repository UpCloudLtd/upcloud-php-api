<?php

namespace Upcloud\Types;

enum EventsEventType: string
{
    case ServerCreate = "server_create";
    case ServerError = "server_error";
    case ServerModify = "server_modify";
    case ServerShutdown = "server_shutdown";
    case ServerStart = "server_start";
    case ServerStartInit = "server_start_init";
    case ServerStop = "server_stop";
}
