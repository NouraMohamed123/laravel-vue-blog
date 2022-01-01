<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Count(){
        return $this->count();
    }
}
