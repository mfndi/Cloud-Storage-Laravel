<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramFile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        $query->where('file_name', 'like', '%'.request('search').'%')
              ->orWhere('caption', 'like', '%'.request('search').'%');
    }

    public function getRouteKeyName()
    {
        return 'file_unique_id';
    }
}
