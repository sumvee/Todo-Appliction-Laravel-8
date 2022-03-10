<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <!-- Bootstrap Boilerplate... -->

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @if (count($errors) > 0)
                    <!-- Form Error List -->
                        <div class="alert alert-danger">
                            <strong>Whoops! Something went wrong!</strong>

                            <br><br>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif

                <!-- New Task Form -->
                    <form action="/task" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Current Tasks -->
                    @if (count($tasks) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Current Tasks
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped task-table">

                                    <!-- Table Headings -->
                                    <thead>
                                    <th>Task</th>
                                    <th>&nbsp;</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <!-- Task Name -->
                                            <td class="table-text">
                                                <div>{{ $task->name }}</div>
                                            </td>
                                            <!-- Delete Button -->
                                            <td>
                                                <form action="/task/{{ $task->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button>Delete Task</button>
                                                </form>
                                            </td>
                                            <!-- Delete Button -->
                                            <td>
                                                <form action="/task/{{ $task->id }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" value="{{$task->is_done ? 0:1}}" name="is_done">
                                                    <button>{{$task->is_done ? 'Mark not done':'Mark done'}}</button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
