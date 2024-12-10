<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $fillable = ['Name', 'Price', 'Details'];

    public function services()
{
    return $this->belongsToMany(Service::class, 'service_sub_service', 'SubServiceID', 'ServiceID');
}

}



