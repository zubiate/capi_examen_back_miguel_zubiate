<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDomicilio extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = "user_domicilio";

    /**
     * @var string
     */

    protected $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
