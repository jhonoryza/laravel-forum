<?php

namespace App\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasTag
{
	public function tagsRelation(): MorphToMany
	{
		return $this->morpToMany(Tag::class, 'taggables')->withTimestamps();
	}

	public function tags()
	{
		return $this->tagsRelation;
	}

	public function syncTags(array $tags)
	{
		$this->save();
		$this->tagsRelation()->sync($tags);
		$this->unsetRelation('tagsRelation');
	}

	public function removeTags()
	{
		$this->tagsRelation()->detach();
		$this->unsetRelation('tagsRelation');
	}
}