<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nome'])]
class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';

    public function tarefas(): HasMany
    {
        return $this->hasMany(Tarefa::class, 'id_status');
    }
}
