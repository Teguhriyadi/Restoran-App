<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasUuids;

    protected $table = "bahan";

    protected $guarded = [''];

    protected $keyType = "string";

    public $primaryKey = "id";

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
