<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'user_id', 'mobile', 'phone', 'image', 'image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
