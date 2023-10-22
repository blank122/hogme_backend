<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LivestockRecords extends Model
{
    use HasFactory;
    //all the records of the livestocks are stored here
    //this includes the tag of each livestocks and the owner of it


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function livestocktypes():BelongsTo
    {
        return $this->belongsTo(LivestockTypes::class);
    }
}
