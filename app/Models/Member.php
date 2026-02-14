<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{

    use Notifiable;
    protected $fillable = [

        // 'updated_at',
        'phone_number',
        'name',
        'is_a_scrutineer_candidate',
        'is_a_candidate',
        'paid_membership',
        'membership_renewed_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'membership_renewed_at'];
    protected $casts = [
        'membership_renewed_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
        // public $timestamps = false;

    // Nullable handling is native in Laravel; keep fields nullable via migrations.

    // public function getPhoneNumberAttribute($value)
    // {
    //     if ($value) {
    //         return '+30' . ($value);
    //     }
    // }


    use HasFactory;


}
