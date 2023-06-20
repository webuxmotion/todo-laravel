<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'deleted_at',
        'user_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function onlyTrashedTodos() {
        $trashedTodos = self::onlyTrashed()->get()
            ->where('user_id', auth()->user()->id);

        return $trashedTodos;
    }

    public function isDone():bool {
        return isset($this->deleted_at);
    }
}
