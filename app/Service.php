<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Http\Request;
use \DateTimeInterface;

class Service extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'services';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Hidden'  => 'Hidden',
        'Publish' => 'Publish',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function servicessubcategory()
    {
        return $this->belongsTo(ServicesSubCategory::class, 'servicessubcategory_id');
    }
    public function scopeFilterByRequest($query, Request $request){
        $query->where('title',$request->search)->orWhere('title','LIKE',$request->search);
        return $query;
    }
    public function contacts()
    {
        return $this->belongsToMany(DirectoryContent::class);
    }
}
