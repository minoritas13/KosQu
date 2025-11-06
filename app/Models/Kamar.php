<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['admin_id', 'nomor_kamar', 'tipe_kamar', 'harga', 'status', 'deskripsi'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'kamar_id');
    }
}
