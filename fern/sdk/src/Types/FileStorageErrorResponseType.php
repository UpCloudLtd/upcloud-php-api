<?php

namespace Upcloud\Types;

enum FileStorageErrorResponseType: string
{
    case HttpsDevelopersUpcloudCom13ErrorsErrorInvalidRequest = "https://developers.upcloud.com/1.3/errors#ERROR_INVALID_REQUEST";
    case HttpsDevelopersUpcloudCom13ErrorsErrorResourceNotFound = "https://developers.upcloud.com/1.3/errors#ERROR_RESOURCE_NOT_FOUND";
    case HttpsDevelopersUpcloudCom13ErrorsErrorInsufficientCredits = "https://developers.upcloud.com/1.3/errors#ERROR_INSUFFICIENT_CREDITS";
    case HttpsDevelopersUpcloudCom13ErrorsErrorGeneralFailure = "https://developers.upcloud.com/1.3/errors#ERROR_GENERAL_FAILURE";
}
