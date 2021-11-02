<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employed extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = "employedID";

    protected $fillable = ['employedID', 'department','lastName', 'middleName', 'firstName','access'];

    public function records()
    {
        return $this->hasMany(Record::class,'employedID');
    }
}
