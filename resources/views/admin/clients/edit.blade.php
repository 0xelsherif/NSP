@extends('../layout/' . $layout)

@section('subhead')
    <title>Sections</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Client</h2>
    </div>
    <form method="POST" action="{{ route("admin.sections.update", [$sections->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                                <div>
                                    <label for="section_name" class="form-label">Client Name</label>
                                    <input  type="text" id="section_name" name="section_name" class="form-control w-full" value="{{ old('section_name', $sections->section_name) }}">
                                </div>
                            <br>
                                <div>
                                    <label for="description" class="form-label">Description</label>
                                    <input  type="text" id="description" name="description" class="form-control w-full" value="{{ old('description', $sections->description) }}">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="{{url()->previous()}}">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Update</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
