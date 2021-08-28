<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\HasTag;
use App\Traits\HasTimestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    use HasFactory;
    use HasTag;
    use HasTimestamp;
    use HasAuthor;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'category_id',
        'author_id'
    ];

    protected $with = [
        'authorRelation',
        'category',
        'tagsRelation'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function excerpt(int $limit = 250): string
    {
        return \Str::limit(strip_tags($this->body()), $limit);
    }

    public function body(): string
    {
        return $this->body;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function delete()
    {
        $this->removeTags();
        parent::delete();
    }
}
