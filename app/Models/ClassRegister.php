<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Multitenantable;

class ClassRegister extends Model
{
    use Multitenantable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'class_registers';

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
                  'gender',
                  'class',
                  'school_id'
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
    
    /**
     * Get the school for this model.
     *
     * @return App\Models\School
     */
    public function school()
    {
        return $this->belongsTo('App\Models\School','school_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }


}
