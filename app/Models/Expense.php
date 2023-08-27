<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Expense
 *
 * @property $id
 * @property $expense_types_id
 * @property $amount
 * @property $date
 * @property $remarks
 * @property $created_at
 * @property $updated_at
 *
 * @property ChargesType $chargesType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expense extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'expense_type_id' => 'required',
		'amount' => 'required',
		'date' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['expense_type_id','amount','date','remarks'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function expenseType()
    {
        return $this->hasOne('App\Models\ExpenseType', 'id', 'expense_type_id');
    }
    
}
