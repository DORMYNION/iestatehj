<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';

    const STATE_SELECT = [
        '' => 'Abia',
    ];

    const IS_BANK_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    const IS_DORMANT_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'dormant_date',
    ];

    const IS_NEW_SELECT = [
        'New Property' => 'New Property',
        'Pre-Occupied' => 'Pre-Occupied',
    ];

    protected $fillable = [
        'name',
        'state',
        'is_new',
        'is_bank',
        'bank_name',
        'is_dormant',
        'officer_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'landlord_id',
        'dormant_date',
        'created_by_id',
        'updated_by_id',
    ];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class, 'landlord_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function getDormantDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDormantDateAttribute($value)
    {
        $this->attributes['dormant_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function officer()
    {
        return $this->belongsTo(User::class, 'officer_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
}