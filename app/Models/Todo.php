<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    // 1. Дозволяємо Laravel зберігати ці поля напряму (захист від вразливостей)
    protected $fillable = [
        'title',
        'description',
        'done',
        'user_id',
    ];

    // 2. Вказуємо тип колонки 'done', щоб Laravel автоматично перетворював її на true/false
    protected $casts = [
        'done' => 'boolean',
    ];

    // 3. Зв'язок: Одне завдання належить одному користувачу
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}