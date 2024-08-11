@extends('backEnd.layouts.masters')
@section('page-title', 'Add Voucher')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  
                        <h3>Add a new Voucher</h3>
                    
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.conveyance-voucher.store') }}" method="POST">
                        @csrf
        
                        <div class="mb-3">
                            <label for="" class="form-label"> Select Date </label>
                            <input type="date" name="date" id="" class="form-control">
        
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Select Employee</label>
                            <select name="employee_id" id="#" class="form-select">
                                <option value="">-- SELECT --</option>

                                @foreach ( $employee_list as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }} - ({{ $employee->designation->name }})</option>
                                @endforeach

                            </select>
        
                            @error('employee_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label"> From -</label>
                            <input type="text" name="from_location" id="" class="form-control">
        
                            @error('from_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label"> - To </label>
                            <input type="text" name="to_location" id="" class="form-control">
        
                            @error('to_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                       <div class="mb-3">
                            <label for="" class="form-label">Select Mode of Conveyance</label>
                            <select name="conveyance_id" id="#" class="form-select">
                                <option value="">-- SELECT --</option>
                                @foreach ( $conveyance_list as $modeOfConvience_id => $name)
        
                                <option value="{{ $modeOfConvience_id }}">{{ $name }}</option>
                                    
                                @endforeach
                            </select>
        
                            @error('conveyance_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="mb-3">
                            <label for="" class="form-label"> Amount tk. </label>
                            <input type="text" name="amount" id="" class="form-control">
        
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label"> Remarks (optional) </label>
                            <input type="text" name="remarks" id="" class="form-control">
        
                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary py-2">Add</button>
        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('java')
    <script>
        $(function(){

           var departmentEl = $('#department')
           var designationEl = $('#designation')

           $(departmentEl).change(function(e){
            var dept_id = e.target.value

            $.get('/data/department/'+ dept_id +'/designations', function(data){
                $(designationEl).html(data)
            })
           })

        })
    </script>
@endpush

