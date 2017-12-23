<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Liketable;
    protected $guarded = [];
    protected $with = ['likes'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function uri()
    {
        return "/posts/{$this->id}";
    }

    public function path()
    {
        return str_after($this->thumbnail, 'public');
    }

    public function isUpdated()
    {
        if ($this->updated_at != $this->created_at) {
            return true;
        }
        return false;
    }

    public function checkCreator()
    {
        $admin = User::where('name', 'admin')->first();
        if ($admin->id == auth()->id()) {
            return true;
        }
        return false;
    }


}
