<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Option extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'key',
        'value',
        'active',
    ];

    /**
     * @return Attribute
     */
    protected function key(): Attribute
    {
        return Attribute::make(
            set: fn($value) => [
                'key' => Str::slug($value)
            ]
        );
    }
}
