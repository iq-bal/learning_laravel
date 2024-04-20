<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];
    // made changes in the appservice provider, in the boot function, made model unguarded, so i no longer need the fillable
    public function scopeFilter($query, array $filters){
        // dd($filters['tag']); 
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag'). '%');
        }
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search'). '%')
            ->orWhere('description', 'like', '%' . request('search'). '%')
            ->orWhere('tags', 'like', '%' . request('search'). '%');
        }
    }
}
