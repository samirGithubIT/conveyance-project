@extends('backEnd.layouts.masters')
@section('page-title', 'Add Voucher')

@section('content')

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow-lg">
                    <div class="card-header d-flex justify-content-between bg-success">
                      
                            <h3>Add a new Voucher</h3>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.conveyance-voucher.store') }}" method="POST">
                            @csrf
            
                            <div class="mb-3">
                                <label for="" class="form-label"> Select Date </label>
                                <input type="date" name="created_at" id="" class="form-control">
            
                                @error('created_at')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Select Employee</label>
                                <select name="user_id" id="#" class="form-select">
                                    <option value="">-- SELECT --</option>
    
                                    @foreach ( $employee_list as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name}} - {{ $employee->designation->name ?? 'null' }}({{ $employee->designation->department->name ?? 'null' }})</option>
                                    @endforeach
    
                                </select>
            
                                @error('employee_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="row justify-content-around">
                                <div class="mb-3 col-6">
                                    <label for="" class="form-label"> From -</label>
                                    <input type="text" name="from_location" id="" class="form-control">
                
                                    @error('from_location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="mb-3 col-6">
                                    <label for="" class="form-label"> - To </label>
                                    <input type="text" name="to_location" id="" class="form-control">
                
                                    @error('to_location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-between">

                                <div class="mb-3 col-6">
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

                                <div class="mb-3 col-6">
                                    <label for="" class="form-label"> People with you </label>
                                    <input type="text" name="companions_count" id="" class="form-control">
                
                                    @error('companions_count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
                                <textarea name="remarks" id="" cols="90" class="form-control"></textarea>
                            </div>
    
                            <button type="submit" class="btn btn-primary px-3 ">Add</button>
            
                        </form>
                    </div>
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

