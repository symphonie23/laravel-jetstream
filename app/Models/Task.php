<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $name
 * @property string|null $desc
 * @property int $task_list_id
 * @property \Illuminate\Support\Carbon|null $finished_at
 * @property \Illuminate\Support\Carbon|null $deadline_at
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TaskList $taskList
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Query\Builder|Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDeadlineAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTaskListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Task withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Task withoutTrashed()
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasFactory, SoftDeletes;

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
                    'desc',
                    'task_list_id',
                    'finished_at',
                    'deadline_at',
                    'created_by',
                    'deleted_by'
                ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
    */
    protected $casts = [
        'deadline_at' => 'datetime',
    ];
    
    /**
     * Get the task list that owns the task.
    */
    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }
}