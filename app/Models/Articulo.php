<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table  = "articulos";

    protected $primaryKey = "id_articulo";


    protected $fillable = ['user_id','existencias','precio','descripcion'];

    protected $hidden = ['id_articulo'];
}
