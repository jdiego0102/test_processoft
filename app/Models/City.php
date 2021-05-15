<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';

    protected $primaryKey = 'city_id';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id',
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
        'active',
    ];

    protected $guarded = [];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
