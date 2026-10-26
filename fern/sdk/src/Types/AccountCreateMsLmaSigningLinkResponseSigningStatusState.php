<?php

namespace Upcloud\Types;

enum AccountCreateMsLmaSigningLinkResponseSigningStatusState: string
{
    case Initiated = "initiated";
    case Waiting = "waiting";
    case Completed = "completed";
    case Canceled = "canceled";
}
