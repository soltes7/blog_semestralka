<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'url',
        'times',
        'changedate',
        'authorid',
    ];

    public function incrementTimes()
    {
        Article::where('id', $this->id)->update(['times' => ($this->times + 1)]);
    }

    public function setChangedate()
    {
        Article::where('id', $this->id)->update(['changedate' => date("Y-m-d H:i:s")]);
    }

    public function setAuthor()
    {
        Article::where('id', $this->id)->update(['authorid' => Auth::user()->id]);
    }
}
