<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $fillable = ['tdl_id', 'task_name', 'completed'];

    public function todoList()
    {
        return $this->belongsTo(TodoList::class, 'tdl_id', 'tdl_id');
    }
}
