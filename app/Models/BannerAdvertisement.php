<?php
//BannerAdvertisement.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BannerAdvertisement extends Model
{
    protected $fillable = [
        'link',
        'is_active',
        'type',
        'thumbnail',
    ];
}
