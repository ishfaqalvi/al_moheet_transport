<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Statment
 *
 * @property $id
 * @property $client_id
 * @property $type
 * @property $charges_type_id
 * @property $amount
 * @property $date
 * @property $remarks
 * @property $created_at
 * @property $updated_at
 *
 * @property ChargesType $chargesType
 * @property Client $client
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Statment extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'client_id' => 'required',
		'type' => 'required',
		'amount' => 'required',
		'date' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id','type','charges_type_id','amount','date','remarks'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function chargesType()
    {
        return $this->hasOne('App\Models\ChargesType', 'id', 'charges_type_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'statment_id', 'id');
    }
}
