<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasUuids;

    protected $table = "resep";

    protected $guarded = [''];

    protected $keyType = "string";

    public $primaryKey = "id";

    public function detail_resep()
    {
        return $this->hasMany(ResepDetail::class, "resep_id", "id");
    }
}
