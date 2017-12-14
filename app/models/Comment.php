<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comment';
    protected $guarded = ['id', 'created_at', 'updated_at'];

}