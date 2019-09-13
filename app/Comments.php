<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'discussion_id', 
        'message', 
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function discussion(){
        return $this->belongsTo('App\Discussion');
    }

    public function getCommentTimeAttribute(){
        return Carbon::parse($this->attributes['updated_at'])->format('g:i A');
    }
}
