<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'Project_name',
        'share_amount',
        'share_value',
        'minimum_share',
        'description',
        'share_type',
        'catagory_id',
    ];
}
