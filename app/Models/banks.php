<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'account_no',
        'project_id',
        'type',
    ];
}
