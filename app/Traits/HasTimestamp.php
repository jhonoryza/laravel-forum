<?php

namespace App\Traits;

trait HasTimestamp
{
	public function createdAt(): string
	{
		return $this->created_at->format('Y-m-d H:i');
	}

	public function createdAtForHuman(): string
	{
		return $this->created_at->diffForHumans();
	}	
}
