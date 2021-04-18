<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'visible_password',
        'occupation',
        'address',
        'phone',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $limit=10;

    public function storeUser($data)
    {
        $data['visible_password']=$data['password'];
        $data['password']=bcrypt($data['password']);
        
        return User::create($data);
    }

    public function getAllUser()
    {
        return User::latest()->paginate($this->limit);
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function updateUserById($data,$id)
    {
        $user=User::find($id);
        if($data['password']){
        $user->visible_password=$data['password'];
        $user->password=bcrypt($data['password']);
        }
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->occupation=$data['occupation'];
        $user->address=$data['address'];
        $user->phone=$data['phone'];
        return $user->update();


    }
    public function deleteUserById($id)
    {
        return User::find($id)->delete();
    }
}
