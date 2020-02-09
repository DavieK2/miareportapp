<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Multitenantable;

class School extends Model
{
    use Multitenantable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'school_id',
                  'location',
                  'phone_no'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    

    public function class_registers() {
        return $this->belongsTo(ClassRegister::class, 'school_id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }


}
