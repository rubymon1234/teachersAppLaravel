<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewersDetail extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\Models\User','viewed_by');
    }
}
