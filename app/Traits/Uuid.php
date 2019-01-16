<?php

namespace App\Traits;

trait Uuids
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->uuid()} = (string) Str::orderedUuid();
        });
    }
}
