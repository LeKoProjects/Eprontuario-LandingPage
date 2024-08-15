<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artigos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'artigos';
    protected $fillable = ['titulo', 'descricao', 'imagem', 'user_id'];
    protected $dates=['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
