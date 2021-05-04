<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Review extends Model
{
    protected $fillable = [
        'session',
        'scope',
        'stars',
        'text',
        'name',
        'validated',
    ];

    use HasFactory;

    const SCOPE_SITE = 1;

    #ToDo: integrate with skin tool
    const SCOPE_SKIN = 2;

    public function getValidatedAttribute(){
        if($this->attributes['validated'] == false && $this->attributes['stars'] > 3 || (!Str::of($this->attributes['text'])->isEmpty() && !Str::of($this->attributes['name'])->isEmpty())){
            $this->update(['validated' => true]);
            $this->attributes['validated'] = true;
        }

        return $this->attributes['validated'];
    }

    public function getNameAttribute(){
        $name = $this->attributes['name'];
        if(Str::of($name)->isEmpty()){
            $name = 'Anonymous reviewer';
        }
        return $name;
    }

    public function scopeValidated($query){
        return $query->where('validated', true);
    }
}
