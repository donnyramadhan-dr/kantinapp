<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
   protected $fillable = ['nama_menu', 'harga', 'stock', 'desciption','status_makanan']; 
}
