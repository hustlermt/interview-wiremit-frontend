<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'email',
        'password',
        'role',

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
        'email_verified_at' => 'datetime', // Optional if using email verification
    ];

    /**
     * Automatically hash the password when saving it to the database.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->user_type === 'admin';
    }

    /**
     * Generate a reset password token and save it to the database.
     *
     * @return string
     */
    public function generateResetPasswordToken()
    {
        $token = bin2hex(random_bytes(36)); // Generate a secure token
        $this->reset_password_token = $token;
        $this->save();

        return $token;
    }

    /**
     * Clear the reset password token after it is used.
     */
    public function clearResetPasswordToken()
    {
        $this->reset_password_token = null;
        $this->save();
    }
    
    public function validateResetPasswordToken($token)
{
    if ($this->reset_password_token !== $token) {
        return false;
    }

    // Check if the token is not older than 60 minutes
    return now()->diffInMinutes($this->reset_password_token_created_at) <= 60;
}


    /**
     * Define the relationship between users and bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


    /**
     * Define the relationship between users and payments (if payments can be made directly by users).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

}
