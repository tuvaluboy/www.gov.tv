<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectorySubCategory extends Model
{
    use SoftDeletes;

    public const STATUS_SELECT = [
        'Publish' => 'Publish',
        'Hidden'  => 'Hidden',
    ];

    public $table = 'directory_sub_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'status',
        'directorycategory_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subCategoriesMinistryContents()
    {
        return $this->belongsToMany(MinistryContent::class);
    }

    public function subcategoryDirectoryContents()
    {
        return $this->belongsToMany(DirectoryContent::class);
    }

    public function directorycategory()
    {
        return $this->belongsTo(DirectoryCategory::class, 'directorycategory_id');
    }

    public function contents()
    {
        return $this->belongsToMany(MinistryContent::class);
    }

    public function contentdepartments()
    {
        return $this->belongsToMany(DirectoryContent::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
