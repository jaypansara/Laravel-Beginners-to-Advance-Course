<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use App\Models\Image;
// use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = ['title','description','is_publish','is_active'];


    protected $guarded = [];

    /**
     * Summary of user
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
