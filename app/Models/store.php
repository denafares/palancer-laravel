<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $connection='mysql';
    protected $table='stores';
    protected $primarykey='id';
    protected $keytype='int';
    public $incrementing=true;
    public $timestamps=true;
    const CREATED_AT='created_at';
    const UPDATED_AT='updated_at';
}
