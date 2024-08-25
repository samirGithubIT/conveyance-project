


{{-- Add Conveyance --}}

<div class="modal fade" id="addConveyanceModal" tabindex="-1" aria-labelledby="addConveyanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.conveyance.store') }}" method="post">
            @csrf
       
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="addConveyanceModalLabel">Add a new Transport</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control">

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Add </button>
        </div>
    </form>
      </div>
    </div>
  </div>