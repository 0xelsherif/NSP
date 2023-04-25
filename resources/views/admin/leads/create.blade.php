@extends('../layout/' . $layout)

@section('title', 'Leads')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create New Lead</h2>
    </div>
    <form action="{{ route('Leads.store') }}" method="post">
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                               <div class="input-form mt-3 @error('lead_number') has-error @enderror">
                                    <label for="lead_number" class="form-label">Lead Serial</label>
                                    <input  type="text" id="lead_number" name="lead_number" class="form-control w-full" placeholder="Lead Serial">
                                    @error('lead_number')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('lead_name') has-error @enderror">
                                    <label for="lead_name" class="form-label">Lead Name</label>
                                    <input  type="text" id="lead_name" name="lead_name" class="form-control w-full" placeholder="Full Name">
                                    @error('lead_name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('lead_phone') has-error @enderror">
                                    <label for="lead_phone" class="form-label">Lead Phone</label>
                                    <input  type="tel" id="lead_phone" name="lead_phone" class="form-control w-full" placeholder="+201234567890">
                                    @error('lead_phone')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('lead_name') has-error @enderror">
                                    <label for="lead_email" class="form-label">Lead Email</label>
                                    <input  type="email" id="lead_email" name="lead_email" class="form-control w-full" placeholder="name@mail.com">
                                    @error('lead_email')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('lead_job') has-error @enderror">
                                    <label for="lead_job" class="form-label">Lead Job</label>
                                    <input  type="text" id="lead_job" name="lead_job" class="form-control w-full" placeholder="Job title">
                                    @error('lead_job')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="client_id" class="form-label">Lead Client</label>
                                    <select data-placeholder="Select Client Category" class="tom-select w-full @error('client_id') border-danger @enderror"  name="client_id" id="client_id" required>
                                        <option selected disabled>Please select Lead Client</option>  
                                        @foreach($clients as $id => $entry)
                                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                               <div class="mt-3">
                                    <label for="notes" class="form-label">Description</label>
                                    <input  type="text" id="notes" name="notes" class="form-control w-full" placeholder="Optional">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Leads">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Create</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection


