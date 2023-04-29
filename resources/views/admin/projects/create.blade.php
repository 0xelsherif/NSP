@extends('../layout/' . $layout)

@section('title', 'Projects')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create New Project</h2>
    </div>
    <form action="{{ route('Projects.store') }}" method="post">
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                               <div class="input-form mt-3 @error('project_number') has-error @enderror">
                                    <label for="project_number" class="form-label">Project Serial</label>
                                    <input  type="text" id="project_number" name="project_number" class="form-control w-full" placeholder="Project Serial">
                                    @error('project_number')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('project_name') has-error @enderror">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input  type="text" id="project_name" name="project_name" class="form-control w-full" placeholder="Project Name">
                                    @error('project_name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="client_id" class="form-label">Project Client</label>
                                    <select data-placeholder="Select Client Category" class="tom-select w-full @error('client_id') border-danger @enderror"  name="client_id" id="client_id" required>
                                        <option selected disabled>Please select Project Client</option>  
                                        @foreach($clients as $id => $entry)
                                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="project_status" class="form-label">Project Status</label>
                                    <select class="form-select mt-2 sm:mr-2 @error('project_status') border-danger @enderror"  name="project_status" id="project_status" required>
                                        <option selected disabled>Please select Project Status</option>  
                                        <option value="0">Not started</option>
                                        <option value="1">Active</option>
                                        <option value="2">Upcoming</option>
                                        <option value="3">Pending</option>
                                        <option value="4">Overdue</option>
                                        <option value="5">Priority</option>
                                        <option value="6">Canceled</option>
                                    </select>
                                    @error('project_status')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                               <div class="mt-3">
                                    <label for="notes" class="form-label">Description</label>
                                    <input  type="text" id="notes" name="notes" class="form-control w-full" placeholder="Optional">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Projects">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Create</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection


