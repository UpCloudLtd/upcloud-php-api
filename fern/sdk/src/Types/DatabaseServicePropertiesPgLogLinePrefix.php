<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgLogLinePrefix: string
{
    case PidPUserUDbDAppAClientH = "'pid=%p,user=%u,db=%d,app=%a,client=%h '";
    case PidPUserUDbDAppAClientHTxidXQidQ = "'pid=%p,user=%u,db=%d,app=%a,client=%h,txid=%x,qid=%Q '";
    case Tpl1UserUDbDAppAClientH = "'%t [%p]: [%l-1] user=%u,db=%d,app=%a,client=%h '";
    case MpqUserUDbDAppA = "'%m [%p] %q[user=%u,db=%d,app=%a] '";
}
