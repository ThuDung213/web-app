<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addMemberForm" method="POST"
                action="{{ route('admin.project.addMember', ['id' => $project->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Creators</label>
                        <div class="select2-lightblue">
                            <select id="creators" name="creators[]" class="select2" multiple="multiple"
                                data-placeholder="Select creators" data-dropdown-css-class="select2-lightblue"
                                style="width: 100%;" required name="creator_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="addMemberBtn" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
