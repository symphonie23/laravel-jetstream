<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at', 'deleted_by'];

    use SoftDeletes;

    protected $fillable = [
                    'name', 
                    'desc',
                    'task_list_id',
                    'finished_at',
                    'deadline_at',
                    'created_by',
                    'deleted_by'
                ];
    protected $casts = [
        'deadline_at' => 'datetime',
    ];
                
                
    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }
   
}