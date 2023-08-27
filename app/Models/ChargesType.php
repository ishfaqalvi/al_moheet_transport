<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class ChargesType
 *
 * @property $id
 * @property $title
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ChargesType extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = ['title' => 'required'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','status'];


}
