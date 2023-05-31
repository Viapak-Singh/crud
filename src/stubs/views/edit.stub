<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ route('record.update', [$record->id]) }}" method="PUT" id="record_edit_form">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="mb-1">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $record->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="mb-1">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $record->email }}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>