@extends('../layout/' . $layout)
@section('title', 'Services')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Service</h2>
    </div>
    <form method="POST" action="{{ route("admin.services.update", [$service->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                                <div class="mt-3">
                                    <label for="service_name" class="form-label">Client Name</label>
                                    <input  type="text" id="service_name" name="service_name" class="form-control w-full" value="{{ old('service_name ', $service->service_name ) }}">
                                </div>
                                <div class="mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input  type="text" id="description" name="description" class="form-control w-full" value="{{ old('description', $service->description) }}">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Services">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Update</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection


