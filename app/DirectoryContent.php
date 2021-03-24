<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class DirectoryContent extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'directory_contents';

    const TYPE_SELECT = [
        'Head' => 'Head',
        'Body' => 'Body',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Publish' => 'Publish',
        'Hidden'  => 'Hidden',
    ];

    protected $fillable = [
        'type',
        'title',
        'description',
        'status',
        'detailinformation',
        'contact_information',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function contactServices()
    {
        return $this->belongsToMany(Service::class);
    }

    public function contentDirectorySubCategories()
    {
        return $this->belongsToMany(DirectorySubCategory::class);
    }
}
