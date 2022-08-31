<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table  = "pedidos";

    protected $primaryKey = "id_pedido";


    protected $fillable = ['user_id','articulo_id','direccion_envio','fecha_pedido'];

    protected $hidden = ['id_articulo'];
}
