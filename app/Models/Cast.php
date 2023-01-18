<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;
    protected $table='casts';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = true;

    public function role() {
        return $this->hasMany(Role::class, 'cast_id');
    }
}
