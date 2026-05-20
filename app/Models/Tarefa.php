<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['titulo', 'descricao', 'data_limite', 'id_categoria', 'id_prioridade', 'id_status', 'user_id'])]
class Tarefa extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'data_limite' => 'date',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function prioridade(): BelongsTo
    {
        return $this->belongsTo(Prioridade::class, 'id_prioridade');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
