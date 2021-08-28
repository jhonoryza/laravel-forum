<?php 

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor
{
	public function authorRelation(): BelongsTo
	{
		return $this->belongsTo(User::class, 'author_id');
	}

	public function author(): User
	{
		return $this->authorRelation;
	}


	public function isAuthoredBy(User $user): bool
	{
		return $this->author()->matches($user);
	}

	public function authoredBy(User $user)
	{
		return $this->authorRelation()->associate($user);
		$this->unsetRelation;
	}
}