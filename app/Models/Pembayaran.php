<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['booking_id', 'tggl_bayar', 'jumlah_bayar', 'metode_bayar', 'status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
