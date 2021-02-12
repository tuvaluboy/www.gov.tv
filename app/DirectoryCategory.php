<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class DirectoryCategory extends Model
{
    use SoftDeletes;

    public $table = 'directory_categories';

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
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function directorycategoryDirectorySubCategories()
    {
        return $this->hasMany(DirectorySubCategory::class, 'directorycategory_id', 'id');
    }
}
