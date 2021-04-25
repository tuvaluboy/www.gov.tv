<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class DirectoryContent extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public const STATUS_SELECT = [
        'Publish' => 'Publish',
        'Hidden'  => 'Hidden',
    ];

    public $table = 'directory_contents';

    protected $appends = [
        'files',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ministry_id',
        'title',
        'description',
        'status',
        'detailinformation',
        'contact_information',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function contactServices()
    {
        return $this->belongsToMany(Service::class);
    }

    public function contentdepartmentDirectorySubCategories()
    {
        return $this->belongsToMany(DirectorySubCategory::class);
    }

    public function ministry()
    {
        return $this->belongsTo(MinistryContent::class, 'ministry_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('files');
    }

    public function subcategories()
    {
        return $this->belongsToMany(DirectorySubCategory::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
