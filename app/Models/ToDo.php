<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property bool $is_checked
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class ToDo extends Model
{
    use HasFactory;

    protected $table = 'todos';

    protected $fillable = [
        'title',
        'description',
        'is_checked'
    ];

    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'is_checked' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}
