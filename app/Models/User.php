<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
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
        'password' => 'hashed',
    ];
    public function basic_info(): HasOne
    {
        return $this->hasOne(basic_info::class);
    }
    public function contact_details(): HasOne
    {
        return $this->hasOne(contact_details::class);
    }
    public function residency_details(): HasMany
    {
        return $this->hasMany(residency_details::class);
    }
    public function bank_details(): HasOne
    {
        return $this->hasOne(bank_details::class);
    }
    public function income_doc(): HasOne
    {
        return $this->hasOne(income_details::class);
    }
    public function spouse_doc(): HasOne
    {
        return $this->hasOne(spouse_details::class);
    }
    public function referrals(): HasMany
    {
        return $this->hasMany(Referral::class);
    }
    public function messages(): HasMany
    {
        return $this->hasMany(message::class);
    }
}
