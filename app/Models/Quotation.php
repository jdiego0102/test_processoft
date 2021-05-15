<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory;

    protected $table = 'quotation';

    protected $primaryKey = 'quotation_id';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'name',
        'email',
        'cellphone_number',
        'car_model',
        'date',
        'created_by',
        'updated_by',
        'deleted_by',
        'active',
        'data_policy'
    ];

    protected $guarded = [];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
