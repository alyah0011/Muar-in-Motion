<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $primaryKey = 'tdl_id'; // Add this line

    protected $fillable = ['tdl_title', 'tdl_date'];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'tdl_id', 'tdl_id');
    }
}
