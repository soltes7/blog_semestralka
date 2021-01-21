<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'createtime',
    ];

    public function incrementTimes()
    {
        Image::where('id', $this->id)->update(['times' => ($this->times + 1)]);
    }
}
