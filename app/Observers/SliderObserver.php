<?php

namespace App\Observers;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderObserver
{
	// Deleting slide image if slide is being deleted
	public function deleting(Slider $slider)
	{
		Storage::delete('public/img/slider/'.$slider->image);
	}
}