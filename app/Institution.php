<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = 'institutions';
    protected $fillable = [
        'name',
        'year_establish',
        'ownership',
        'dean_name',
        'dean_phone',
        'dean_email',
        'po_box',
        'office_telno',
        'fax',
        'office_email',
        'city',
        'sub_city',
        'woreda_zone',
        'urban_rural',
        'website_url',
        'status',
        'region_id',
        'cluster_leader'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id');
    }

    public function c_leader()
    {
        return $this->belongsTo('App\Institution', 'cluster_leader');
    }

}
