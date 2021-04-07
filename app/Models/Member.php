<?php

namespace App\Models;

use Dyrynda\Database\Support\NullableFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{

    use Notifiable;
    use NullableFields;
    protected $fillable = [

        'updated_at',
        'phone_number',
        'name',
        'is_a_scrutineer_candidate',
        'is_a_candidate'
    ];

    protected $nullable = [
        'phone_number'

    ];

    public function getPhoneNumberAttribute($value)
    {
        if ($value) {
            return '+30' . ($value);
        }
    }


    use HasFactory;


}
