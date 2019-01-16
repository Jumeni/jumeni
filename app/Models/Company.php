<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;


class Company extends Model
{
    use Uuid, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded  = [];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'location' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner(int $user_id)
    {
        return $this->user()->where('id',$user_id)->count() == 1;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


}
