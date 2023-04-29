@extends('../layout/' . $layout)

@section('title', 'Projects')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Project</h2>
    </div>
    <form method="POST" action="{{ route("admin.projects.update", [$projects->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                                <div class="input-form mt-3 @error('project_number') has-error @enderror">
                                    <label for="project_number" class="form-label">Project Serial</label>
                                    <input  type="text" id="project_number" name="project_number" class="form-control w-full" value="{{ old('project_number', $projects->project_number) }}">
                                    @error('project_number')
                                    <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                                <div class="input-form mt-3 @error('project_name') has-error @enderror">
                                    <label for="project_name" class="form-label">Project Name</label>
                                    <input  type="text" id="project_name" name="project_name" class="form-control w-full" value="{{ old('project_name', $projects->project_name) }}">
                                    @error('project_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="crud-form-2" class="form-label">Project Client</label>
                                    <select data-placeholder="Select your favorite actors" class="tom-select w-full" id="crud-form-2" name="client_id" id="client_id" required>
                                        @foreach($client as $id => $entry)
                                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $projects->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-form mt-3">
                                    <label for="project_status" class="form-label">Project Status</label>
                                    <select class="form-select mt-2 sm:mr-2 " id="project_status" name="project_status" id="project_status" required>
                                        <option value="0" {{$projects->project_status == '0' ? 'selected' : ''}}>Not started</option>
                                        <option value="1" {{$projects->project_status == '1' ? 'selected' : ''}}>Active</option>
                                        <option value="2" {{$projects->project_status == '2' ? 'selected' : ''}}>Upcoming</option>
                                        <option value="3" {{$projects->project_status == '3' ? 'selected' : ''}}>Pending</option>
                                        <option value="4" {{$projects->project_status == '4' ? 'selected' : ''}}>Overdue</option>
                                        <option value="5" {{$projects->project_status == '5' ? 'selected' : ''}}>Priority</option>
                                        <option value="6" {{$projects->project_status == '6' ? 'selected' : ''}}>Canceled</option>
                                    </select>
                                </div>
                               
                                <div class="input-form mt-3">
                                    <label for="notes" class="form-label">Description</label>
                                    <input  type="text" id="notes" name="notes" class="form-control w-full" value="{{ old('notes', $projects->notes) }}">
                                </div>
                                <div class="input-form mt-3">
                                    <label>Status</label>
                                    <div class="form-switch mt-2">

                                    <input class="form-check-input" type="checkbox" name="status" id="status" value="{{$projects->status}}" {{$projects->status || old('status',0) === 1 ?'checked' : ''}}>
                                    </div>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Projects">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Update</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection


