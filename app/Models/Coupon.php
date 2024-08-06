<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasAdvancedFilter, HasFactory;

    public $table = 'coupons';

    protected $dates = [
        'started_at',
        'expire_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'coupon',
        'total_views_limit',
        'daily_views_limit',
        'started_at',
        'expire_at',
        'course_id',
        'used',
        'expired',
        'user_id'
    ];

    public $orderable = [
        'id',
        'coupon',
        'total_views_limit',
        'daily_views_limit',
        'started_at',
        'expire_at',
    ];

    public $filterable = [
        'id',
        'coupon',
        'total_views_limit',
        'daily_views_limit',
        'started_at',
        'expire_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStartedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }


    public function getExpireAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }


    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function total_counter()
    {
        return $this->hasMany(CouponCounter::class);
    }
    public function daily_counter()
    {
        return $this->hasMany(CouponCounter::class)->whereDate('created_at', Carbon::today());
    }




    
}
