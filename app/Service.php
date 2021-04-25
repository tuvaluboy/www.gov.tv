<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Service extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public const STATUS_SELECT = [
        'Hidden'  => 'Hidden',
        'Publish' => 'Publish',
    ];

    public $table = 'services';

    protected $appends = [
        'files',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'servicessubcategory_id',
        'detailinformation',
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

    public function servicessubcategory()
    {
        return $this->belongsTo(ServicesSubCategory::class, 'servicessubcategory_id');
    }

    public function contacts()
    {
        return $this->belongsToMany(DirectoryContent::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('files');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
