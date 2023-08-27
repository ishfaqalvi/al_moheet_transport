<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Client
 *
 * @property $id
 * @property $name
 * @property $mobile
 * @property $whatsapp
 * @property $dp
 * @property $cnic
 * @property $cnic_expiry
 * @property $cnic_front
 * @property $cnic_back
 * @property $passport
 * @property $passport_expiry
 * @property $passport_photo
 * @property $license_no
 * @property $license_expiry
 * @property $license_photo
 * @property $agreement_type
 * @property $agreement_from
 * @property $agreement_to
 * @property $passport_hand
 * @property $address
 * @property $start_date
 * @property $ending_date
 * @property $branch_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Branch $branch
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'mobile',
    	'whatsapp',
    	'dp',
    	'cnic',
    	'cnic_expiry',
    	'cnic_front',
    	'cnic_back',
    	'passport',
    	'passport_expiry',
    	'passport_photo',
    	'license_no',
    	'license_expiry',
    	'license_photo',
        'vehicle_number',
        'vehicle_letter',
    	'agreement_type',
    	'agreement_from',
    	'agreement_to',
    	'passport_hand',
    	'address',
    	'start_date',
    	'ending_date',
    	'branch_id',
    	'status'
    ];

    /**
     * Set the attachment's.
     * @param  string  $value
     */
    public function setDpAttribute($dp){
        if ($dp) {
            $extension = $dp->getClientOriginalExtension();
            $name = uniqid().".".$extension;
            $path = 'upload/images/clients/dp/';
            $dp->move($path, $name);
            $this->attributes['dp'] = $path.$name;
        }else{
            unset($this->attributes['dp']);
        }
    }

    /**
     * Set the attachment's.
     * @param  string  $value
     */
    public function setCnicFrontAttribute($image){
        if ($image) {
            $extension = $image->getClientOriginalExtension();
            $name = uniqid().".".$extension;
            $path = 'upload/images/clients/cnic/front/';
            $image->move($path, $name);
            $this->attributes['cnic_front'] = $path.$name;
        }else{
            unset($this->attributes['cnic_front']);
        }
    }

    /**
     * Set the attachment's.
     * @param  string  $value
     */
    public function setCnicBackAttribute($image){
        if ($image) {
            $extension = $image->getClientOriginalExtension();
            $name = uniqid().".".$extension;
            $path = 'upload/images/clients/cnic/back/';
            $image->move($path, $name);
            $this->attributes['cnic_back'] = $path.$name;
        }else{
            unset($this->attributes['cnic_back']);
        }
    }

    /**
     * Set the attachment's.
     * @param  string  $value
     */
    public function setPassportPhotoAttribute($image){
        if ($image) {
            $extension = $image->getClientOriginalExtension();
            $name = uniqid().".".$extension;
            $path = 'upload/images/clients/passport/';
            $image->move($path, $name);
            $this->attributes['passport_photo'] = $path.$name;
        }else{
            unset($this->attributes['passport_photo']);
        }
    }

    /**
     * Set the attachment's.
     * @param  string  $value
     */
    public function setLicensePhotoAttribute($photo){
        if ($photo) {
            $extension = $photo->getClientOriginalExtension();
            $name = uniqid().".".$extension;
            $path = 'upload/images/clients/license/';
            $photo->move($path, $name);
            $this->attributes['license_photo'] = $path.$name;
        }else{
            unset($this->attributes['license_photo']);
        }
    }

    /**
     * Set the attachment's.
     * @param  string  $value
     */
    public function setVehicleLetterAttribute($photo){
        if ($photo) {
            $extension = $photo->getClientOriginalExtension();
            $name = uniqid().".".$extension;
            $path = 'upload/images/clients/vehicle/';
            $photo->move($path, $name);
            $this->attributes['vehicle_letter'] = $path.$name;
        }else{
            unset($this->attributes['vehicle_letter']);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'client_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statments()
    {
        return $this->hasMany('App\Models\Statment', 'client_id', 'id');
    }
}
