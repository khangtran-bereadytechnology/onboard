<?php

namespace App\Models;

use App\Observers\TopicObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[ObservedBy([TopicObserver::class])]
class Topic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'content', 'thumbnail', 'is_published'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    // de lay url cua image phan biet giua anh tu tai lên va link anh cua trang khac
    public function getThumbnailUrlAttribute()
    {
        return Str::startsWith($this->thumbnail, ['http://', 'https://'])
            ? $this->thumbnail
            : asset('storage/' . $this->thumbnail);
    }
}
