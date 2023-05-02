<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class TaskList extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at', 'deleted_by'];    
    
    protected $fillable = [
        'name',
        'created_by',
        'deleted_at',
        'deleted_by'
    ];
    

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskCount() {
        return $this->tasks()->where('deleted_by', NULL)->count();
    }

    public function tasksCompleted() {
        return $this->tasks()->where('deleted_by', NULL)->whereNotNull('finished_at')->count();
    }
    
    protected $table = 'task_lists';
}