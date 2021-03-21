<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ServicesSubCategory extends Model
{
    use SoftDeletes;

    public $table = 'services_sub_categories';

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
        'servicescategory_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function servicescategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'servicescategory_id');
    }

    public function services(){
        return $this->hasMany('App\Service','servicessubcategory_id','id');
    }
}
