<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{

    use Notifiable;
    protected $table='cart';
    protected $primaryKey='id';

    protected $fillable = [
        'product_id', 'price', 'quantity','price','user_id'
    ];

    public function product()
    {
        return $this->hasMany('App\Product', 'id', 'product_id');

    }

}
