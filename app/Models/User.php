<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 1. Added 'profile_photo_url' to the Fillable attribute
#[Fillable(['username', 'first_name', 'last_name', 'email', 'password', 'profile_photo_url'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the user's profile photo URL or a default placeholder.
     * This is an "Accessor" - it creates a virtual attribute.
     */
    /**
 * Get the user's profile photo URL or a default placeholder.
 */
    protected function profilePhotoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                // Check if the value exists AND is not just an empty string
                if (!empty($this->attributes['profile_photo_url'])) {
                    return $this->attributes['profile_photo_url'];
                }
    
                // If it's null, empty, or missing, return the initials avatar
                return 'https://ui-avatars.com/api/?name=' . urlencode($this->first_name . ' ' . $this->last_name) . '&color=4F46E5&background=E0E7FF';
           },
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}