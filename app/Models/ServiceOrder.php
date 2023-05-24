<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceOrder extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'vehiclePlate',
        'entryDateTime',
        'exitDateTime',
        'priceType',
        'price',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'service_orders';

    protected $casts = [
        'entryDateTime' => 'datetime',
        'exitDateTime' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
