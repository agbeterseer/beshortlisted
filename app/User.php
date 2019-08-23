<?php

namespace App;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 
     
    public function is_admin()
    {
        if($this->admin) 
        {
            return true;
        }
        return false;
    }


    public function is_candidate()
    {
            if($this->candidate) 
        {
            return true;
        }
        return false;
    }
       public function is_confirmed()
    {
        if($this->confirmed) 
        {
            return true;
        }
        return false;
    }

     /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new ResetPasswordNotification($token));
    // }
         public function socialProfile()
    {
        return $this->hasOne(SocialLoginProfile::class);
    }

        public function jobapplicaitons()
    {
        return $this->hasMany('App\Application');
    }
          public function applications()
    {
        return $this->hasMany('App\Application');
    }

    public function industries()
    {
        return $this->hasMany('App\Industry');
    }

        /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query){
        
        return $query->where('active', 1);
    }//$users = App\User::popular()->active()->orderBy('created_at')->get();



    public function scopeOfType($query, $type){

        return $query->where('account_type', $type);
    }//$users = App\User::ofType('admin')->get();

   //     public function professionindustries()
   // {
   //  return $this->belongsToMany('App\IndustryProfession','user_profession', 'user_id', 'industry_profession_id');
   // }
          public function workexperience()
    {
        return $this->belongsTo('App\workexperience');
    }
}
