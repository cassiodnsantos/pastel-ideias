<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['client_id'];

    public function itens()
    {
        return $this->belongsToMany('App\Models\Pastry','orders_itens');
    }

    public function client()
    {   
        return $this->belongsTo('App\Models\Client');
    }
}
