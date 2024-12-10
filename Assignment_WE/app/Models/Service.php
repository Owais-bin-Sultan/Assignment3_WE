<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['Name', 'Description', 'TableDescriptionText', 'ScheduleComment', 'Image'];

    public function subServices()
{
    return $this->belongsToMany(SubService::class, 'service_sub_service', 'ServiceID', 'SubServiceID');
}

}

