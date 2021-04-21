<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class MinistryContent extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public const STATUS_SELECT = [
        'Publish' => 'Publish',
        'Hidden'  => 'Hidden',
    ];

    public $table = 'ministry_contents';

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
        'detailinformation',
        'contact_information',
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

    public function ministryDirectoryContents()
    {
        return $this->hasMany(DirectoryContent::class, 'ministry_id', 'id');
    }

    public function contentDirectorySubCategories()
    {
        return $this->belongsToMany(DirectorySubCategory::class);
    }

    public function sub_categories()
    {
        return $this->belongsToMany(DirectorySubCategory::class);
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
