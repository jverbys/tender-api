<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = ['title', 'description'];

    public function path()
    {
        return '/tenders/' . $this->id;
    }
}
