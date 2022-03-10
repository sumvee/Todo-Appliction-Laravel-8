<?php


namespace App\Repositories;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->is_admin() ? Task::all() :
            Task::where('user_id', $user->id)
                ->orderBy('created_at', 'asc')
                ->get();
    }

    public function markDone(Task $task, $status)
    {
        return Task::where('id', $task->id)
            ->update(['is_done'=>$status]);
    }
}


namespace App\Repositories;


