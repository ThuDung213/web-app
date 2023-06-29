<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Task Form -->
                <form id="formAddTask" method="POST" action="{{ route('admin.task.store', ['project' => $project-> id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="task_name">Task Name</label>
                        <input type="text" class="form-control" id="task_name" placeholder="Enter task name" name="task_name"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Creators</label>
                        <div class="select2-purple">
                            <select id="task_creators" name="task_creators[]" class="select2" multiple="multiple" data-placeholder="Select creators"
                                data-dropdown-css-class="select2-purple" style="width: 100%;" required
                                name="creator_id">
                                @foreach ($project->creators as $creator)
                                    <option value="{{ $creator->id }}">
                                        {{ $creator->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter task description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="submitBtn" type="submit" class="btn btn-info">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
