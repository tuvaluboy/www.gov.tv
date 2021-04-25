<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Item extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public const STATUS_SELECT = [
        'Publish' => 'Publish',
        'Hidden'  => 'Hidden',
    ];

    public $table = 'items';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'categories_id',
        'status',
        'summary',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
