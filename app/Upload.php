<?php

namespace App;

use App\Models\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use Multitenantable;

    protected $fillable = ['uuid', 'title', 'file'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
