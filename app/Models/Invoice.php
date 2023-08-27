<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Invoice
 *
 * @property $id
 * @property $client_id
 * @property $amount_in_dirham
 * @property $amount_in_rs
 * @property $rate
 * @property $amount
 * @property $date
 * @property $remarks
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Invoice extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'amount_in_dirham' => 'required',
		'amount_in_rs'     => 'required',
		'rate'             => 'required',
		'date'             => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'statment_id',
        'amount_in_dirham',
        'amount_in_rs',
        'rate',
        'amount',
        'date',
        'remarks'
    ];

    /**
     * Set the attribute.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setAmountInDirhamAttribute($value)
    {
        $this->attributes['amount_in_dirham'] = intval($value);
    }

    /**
     * Set the attribute.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setAmountInRsAttribute($value)
    {
        $this->attributes['amount_in_rs'] = intval($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
}
