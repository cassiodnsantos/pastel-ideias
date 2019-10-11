<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pastry extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name','price','photo'];


    public function orders()
    {
        return $this->belongsToMany('App\Models\Order','orders_itens');
    }
}
