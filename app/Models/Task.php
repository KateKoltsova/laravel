<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
