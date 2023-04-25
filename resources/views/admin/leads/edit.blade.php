@extends('../layout/' . $layout)

@section('title', 'Leads')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Lead</h2>
    </div>
    <form method="POST" action="{{ route("admin.leads.update", [$leads->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                                <div class="input-form mt-3 @error('lead_number') has-error @enderror">
                                    <label for="lead_number" class="form-label">Lead Serial</label>
                                    <input  type="text" id="lead_number" name="lead_number" class="form-control w-full" value="{{ old('lead_number', $leads->lead_number) }}">
                                    @error('lead_number')
                                    <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                                <div class="input-form mt-3 @error('lead_name') has-error @enderror">
                                    <label for="lead_name" class="form-label">Lead Name</label>
                                    <input  type="text" id="lead_name" name="lead_name" class="form-control w-full" value="{{ old('lead_name', $leads->lead_name) }}">
                                    @error('lead_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('lead_phone') has-error @enderror">
                                    <label for="lead_phone" class="form-label">Lead Phone</label>
                                    <input  type="tel" id="lead_phone" name="lead_phone" class="form-control w-full" value="{{ old('lead_phone', $leads->lead_phone) }}">
                                    @error('lead_phone')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('lead_name') has-error @enderror">
                                    <label for="lead_email" class="form-label">Lead Email</label>
                                    <input  type="email" id="lead_email" name="lead_email" class="form-control w-full" value="{{ old('lead_email', $leads->lead_email) }}">
                                    @error('lead_email')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('lead_job') has-error @enderror">
                                    <label for="lead_job" class="form-label">Lead Job</label>
                                    <input  type="text" id="lead_job" name="lead_job" class="form-control w-full" value="{{ old('lead_job', $leads->lead_job) }}">
                                    @error('lead_job')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="crud-form-2" class="form-label">Lead Client</label>
                                    <select data-placeholder="Select your favorite actors" class="tom-select w-full" id="crud-form-2" name="client_id" id="client_id" required>
                                        @foreach($client as $id => $entry)
                                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $leads->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="input-form mt-3">
                                    <label for="notes" class="form-label">Description</label>
                                    <input  type="text" id="notes" name="notes" class="form-control w-full" value="{{ old('notes', $leads->notes) }}">
                                </div>
                                <div class="input-form mt-3">
                                    <label>Status</label>
                                    <div class="form-switch mt-2">

                                    <input class="form-check-input" type="checkbox" name="status" id="status" value="{{$leads->status}}" {{$leads->status || old('status',0) === 1 ?'checked' : ''}}>
                                    </div>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Leads">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Update</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection


