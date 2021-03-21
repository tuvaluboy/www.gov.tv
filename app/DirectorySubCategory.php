<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class DirectorySubCategory extends Model
{
    use SoftDeletes;

    public $table = 'directory_sub_categories';

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
        'title',
        'status',
        'directorycategory_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function directorysubcategoryDirectoryContents()
    {
        return $this->hasMany(DirectoryContent::class, 'directorysubcategory_id', 'id');
    }

    public function directorycategory()
    {
        return $this->belongsTo(DirectoryCategory::class, 'directorycategory_id');
    }
    public function directorycontent(){
        return $this->hasMany('App\DirectoryContent', 'directorysubcategory_id','id');
    }
}
