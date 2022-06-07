<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'gender',
        'stock',
        'user_id',
        'main_image',
        'other_images',
        'shirt_sleeve',
        'chest',
        'thigh',
        'waist',
        'trouser_length'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * Get user that uploaded the product
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
