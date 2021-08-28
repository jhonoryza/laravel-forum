<?php

namespace App\Models;

use App\Traits\HasTimestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use HasTimestamp;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    public function name(): string
    {
        return ucwords($this->name);
    }

    public function slug(): string
    {
        return $this->slug;
    }
}
