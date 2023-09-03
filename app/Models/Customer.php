<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function scopeCustomerSearch($query, $search = null)
    {
        if (!empty($search)) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('kana', 'like', "%$search%");
        } else {
            return $query;
        }
    }

    public function purchases()
    {
        return $this->hasMany(purchase::class);
    }
}
