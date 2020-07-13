<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $guarded = [];
    
    public function reminderImage()
    {
        $imagePath = ($this->image) ? $this->image : 'uploads/aPsGaSG7jkSLGwesfmbMAFg2Z4iMJfhLmQgRvJB3.png';
        return  '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
