<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Peminjaman extends Model
{
    use HasFactory, Uuids, LogsActivity;

    protected static $logUnguarded = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        $name = $this->name ?? 'System';
        $authUser = Auth::user()->name ?? 'System';
        return $name . " {$eventName} Oleh: " . $authUser;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_pinjam' => 'datetime:Y-m-d H:i:s',
        'tanggal_kembali' => 'datetime:Y-m-d H:i:s',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'id');
    }

    public function ruangan() {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }

    public function kalender() {
        return $this->hasMany(Kalender::class, 'peminjaman_id', 'id');
    }
}
