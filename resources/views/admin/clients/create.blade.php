@extends('../layout/' . $layout)

@section('subhead')
    <title>Sections</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create New Client</h2>
    </div>
    <form action="{{ route('Clients.store') }}" method="post">
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                               <div class="input-form mt-3 @error('client_number') has-error @enderror">
                                    <label for="client_number" class="form-label">Client Serial</label>
                                    <input  type="text" id="client_number" name="client_number" class="form-control w-full" placeholder="Serial Number">
                                    @error('client_number')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('client_name') has-error @enderror">
                                    <label for="client_name" class="form-label">Client Name</label>
                                    <input  type="text" id="client_name" name="client_name" class="form-control w-full" placeholder="CIB | Commercial International Bank Egypt">
                                    @error('client_name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label for="crud-form-2" class="form-label">Client Category</label>
                                    <select data-placeholder="Select Client Category" class="tom-select w-full"  name="categories_id" id="categories_id" required>
                                        @foreach($categories as $id => $entry)
                                        <option value="{{ $id }}" {{ old('categories_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="crud-form-2" class="form-label">Client Country</label>
                                    <select data-placeholder="Select Client Country" class="tom-select w-full"  name="country_id" id="country_id" required>
                                        @foreach($countries as $id => $entry)
                                        <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="mt-3">
                                    <label for="notes" class="form-label">Description</label>
                                    <input  type="text" id="notes" name="notes" class="form-control w-full" placeholder="Optional">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Clients">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Create</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection


