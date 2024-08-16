<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lives extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lives';
    protected $fillable = ['titulo', 'link', 'imagem', 'user_id'];
    protected $dates=['deleted_at'];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
