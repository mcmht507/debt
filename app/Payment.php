<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{

    public static $rules = [
        'name'=> 'required|string|max:255',
        'dueday'=> 'required|numeric|between:1,31',
        'debt'=> 'required|numeric',
        'payment'=> 'required|numeric',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'date',
        'debt', 'payment', 'dueday'
    ];

    /**
     * users belongto
     *
     * @return void
     */
    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = $value;
    }

}
