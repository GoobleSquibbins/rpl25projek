<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case InProgress = 'in_process';
    case Done = 'done';
    case PickedUp = 'picked_up';
}
