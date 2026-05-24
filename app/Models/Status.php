<?php

namespace App\Models;

enum Status: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Deleted = 'deleted';
}
