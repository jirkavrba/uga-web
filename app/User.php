<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        "name",
        "email",
        "password",
        "university_id"
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];

    /**
     * @return BelongsTo
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function gravatar(int $size = 100): string
    {
        return "https://s.gravatar.com/avatar/" . md5($this->email) . "?s=" . $size;
    }
}
