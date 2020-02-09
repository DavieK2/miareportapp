<?php

namespace App\Models;


use App\Models\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{


 use Multitenantable;

    protected $table = 'reports';

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
                  'date',
                  'mia_centre_name',
                  'attendace',
                  'class_total',
                  'mia_course',
                  'lesson_note',
                  'subject',
                  'report_statement',
                  'challenges',
                  'suggestions',
                  'file',
                  'created_by_user_id'
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
     * Set the date.
     *
     * @param  string  $value
     * @return void
     */

    public function user() {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

}


