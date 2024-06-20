<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company',
        'contact_number', 
        'address', 
        'city', 
        'country',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    

}
