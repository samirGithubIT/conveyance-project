<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Department;
use App\Models\Designation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'designation_id',
        'name',
        'email',
        'identity',
        'number',
        'gender',
        'address',
        'password',
        'image'

    ];

    /**
     * The attributes that should be hidden for serializationp.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // custom Auth
    public function adminSection(){
        return $this->user_type == 'admin' ? true : false ;
    }


    // relations
    public function department(){
        return $this->belongsTo(Department::class);
     }

     public function designation(){
        return $this->belongsTo(Designation::class);
     }

     public static function employeeList(){
        return self::pluck('name', 'id')->toArray();
     }

     public function ConveyanceVoucher(){
        return $this->hasMany(ConveyanceVoucher::class);
       }
}
