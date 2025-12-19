<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ResepDetail extends Model
{
    use HasUuids;

    protected $table = "resep_detail";

    protected $guarded = [''];

    protected $keyType = "string";

    public $primaryKey = "id";

    public $timestamps = false;

    public function resep()
    {
        return $this->belongsTo(Resep::class, "resep_id");
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, "bahan_id");
    }
}
