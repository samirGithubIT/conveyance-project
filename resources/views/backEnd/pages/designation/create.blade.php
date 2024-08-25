


    {{-- add designtion --}}

    <div class="modal fade" id="addDesignationModal" tabindex="-1" aria-labelledby="addDesignationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('admin.designation.store') }}" method="post">
                @csrf
            <div class="modal-header">
              <h5 class="modal-title fs-5" id="addDesignationModalLabel">Add Designation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <div class="mb-3">
                    <label for="" class="form-label">Select Department</label>
                    <select name="department_id" id="" class="form-select">
                        <option value="">-- SELECT --</option>
                        @foreach ( $department_list as $department_id => $name)

                        <option value="{{ $department_id }}">{{ $name }}</option>
                            
                        @endforeach
                    </select>

                    @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label"> Enter Designation Name</label>
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
      