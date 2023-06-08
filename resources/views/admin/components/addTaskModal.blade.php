<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog"
aria-labelledby="addTaskModalLabel" aria-hidden="true">
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
            <form method="post" action="{{ route('admin.task.index') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="taskName">Task Name</label>
                    <input type="text" class="form-control" id="taskName"
                        placeholder="Enter task name" required>
                </div>

                <div class="form-group">
                    <label>Creators</label>
                    <div class="select2-purple">
                        <select class="select2" multiple="multiple"
                            data-placeholder="Select creators"
                            data-dropdown-css-class="select2-purple" style="width: 100%;" required
                            name="creator_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user-> name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter task description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" required>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
