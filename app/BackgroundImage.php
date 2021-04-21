<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class BackgroundImage extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public const STATUS_SELECT = [
        'Publish' => 'Publish',
        'Hidden'  => 'Hidden',
    ];

    public const PAGE_SELECT = [
        'Home'       => 'Home',
        'Directory'  => 'Directory',
        'Media'      => 'Media',
        'Services'   => 'Services',
        'About'      => 'About',
        'Homesecond' => 'Home Second',
        'Footer'     => 'Footer',
    ];

    public $table = 'background_images';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'page',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
