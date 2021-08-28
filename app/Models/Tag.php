<?php

namespace App\Models;

use App\Traits\HasTimestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;
    use HasTimestamp;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function threads(): MorphToMany
    {
        return $this->morphedByMany(Thread::class, 'taggable');
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return $this->slug;
    }
}
