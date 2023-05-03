<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\TaskList
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int $task_count
 * @property-read int $tasks_completed
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList newQuery()
 * @method static \Illuminate\Database\Query\Builder|TaskList onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TaskList withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaskList withoutTrashed()
 * @mixin \Eloquent
 */

class TaskList extends Model
{
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */
    protected $dates = ['deleted_at', 'deleted_by'];    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name',
        'created_by',
        'deleted_at',
        'deleted_by',
        'deadline_at'
    ];
    protected $casts = [
        'deadline_at' => 'datetime',
    ];

    /**
     * Get the tasks for the task list.
    */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the user that owns the task list.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the number of tasks in the task list that are not deleted.
    */
    public function taskCount() {
        return $this->tasks()->where('deleted_by', NULL)->count();
    }

    /**
     * Get the number of completed tasks in the task list that are not deleted.
    */
    public function tasksCompleted() {
        return $this->tasks()->where('deleted_by', NULL)->whereNotNull('finished_at')->count();
    }
    
    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'task_lists';
}