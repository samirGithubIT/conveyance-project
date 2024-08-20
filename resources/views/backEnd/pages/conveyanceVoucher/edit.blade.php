@extends('backEnd.layouts.masters')
@section('page-title', 'Edit Voucher')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card shadow-lg">
                    <div class="card-header d-flex justify-content-between bg-light-subtle">
                      
                            <h3> Update Voucher</h3>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.conveyance-voucher.update', $conveyance_voucher->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
    
                            <div class="mb-3">
                                <label for="" class="form-label">Select Employee</label>
                                <select name="employee_id" id="#" class="form-select">
                                    <option value="">-- SELECT --</option>
    
                                    @foreach ( $employee_list as $employee)
                                    <option value="{{ $employee->id }}" 
    
                                            @if ($conveyance_voucher->employee_id == $employee->id)
                                                selected
                                            @endif>{{ $employee->name }} - ({{ $employee->designation->name ?? 'none' }})</option>
                                    @endforeach
    
                                </select>
            
                                @error('employee_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                           <div class="row">
                            <div class="mb-3 col-6">
                                <label for="" class="form-label"> From -</label>
                                <input type="text" name="from_location" id="" class="form-control" value="{{ $conveyance_voucher->from_location }}">
            
                                @error('from_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div class="mb-3 col-6">
                                <label for="" class="form-label"> - To </label>
                                <input type="text" name="to_location" id="" class="form-control" value="{{ $conveyance_voucher->to_location }}">
            
                                @error('to_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           </div>
    
                           <div class="row">
                            <div class="mb-3 col-6">
                                <label for="" class="form-label">Select Mode of Conveyance</label>
                                <select name="conveyance_id" id="#" class="form-select">
                                    <option value="">-- SELECT --</option>
                                    @foreach ( $conveyance_list as $modeOfConvience_id => $name)
            
                                    <option value="{{ $modeOfConvience_id }}"
                                    
                                        @if ($conveyance_voucher->conveyance_id == $modeOfConvience_id)
                                            selected
                                        @endif
    
                                    >{{ $name }}</option>
                                        
                                    @endforeach
                                </select>
            
                                @error('conveyance_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            <div class="mb-3 col-6">
                                <label for="" class="form-label"> Amount tk. </label>
                                <input type="text" name="amount" id="" class="form-control" value="{{ $conveyance_voucher->amount }}">
            
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                           </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label"> Remarks (optional) </label>
            
                                <textarea name="remarks" id="" cols="30" class="form-control"  value="{{ old('remarks') }}"></textarea>
                            </div>
    
                            <button type="submit" class="btn btn-primary py-2">Add</button>
            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


