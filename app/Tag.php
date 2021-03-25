<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Tag extends Model
{
    use SoftDeletes;

    public $table = 'tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tagsDirectoryContents()
    {
        return $this->belongsToMany(DirectoryContent::class);
    }

    public function tagsItems()
    {
        return $this->belongsToMany(Item::class);
    }

    public function tagsServices()
    {
        return $this->belongsToMany(Service::class);
    }
}
