@extends('../layout/' . $layout)
@section('title', 'Services')
@section('subcontent')

<h2 class="intro-y text-lg font-medium mt-10">Services</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">
                <a href="{{ route('admin.services.create') }}">Create New Service</a>
            </button>
            {{-- <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
            
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
          <table id="myTable" >
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="text-center whitespace-nowrap">SERVICE</th>
                    <th class="text-center whitespace-nowrap">CREATED BY</th>
                    <th class="text-center whitespace-nowrap">CREATED IN</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                   
                </tr>
            </thead>
            
            <tbody>
                <?php $i = 0; ?>
                @foreach ($service as $s)
                <tr>
                    <?php $i++; ?>
                    <td class="text-center">{{ $i }}</td>
                    <td class="text-center">{{ $s->service_name }}</td>
                    <td class="text-center">{{ $s->user->name }}</td>
                    <td class="text-center">{{ $s->created_at->format("d/m/Y h:i A") }}</td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="{{ route('admin.services.edit', $s->id) }}">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal_{{$s->id}}">
                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                            
                        </div>
                    </td>
                </tr>  
                 <!-- BEGIN: Delete Confirmation Modal -->
                 <div id="delete-confirmation-modal_{{$s->id}}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <form action="{{ route('admin.services.destroy', $s->id) }}" method="POST" id="deleteFormClient">
                                    
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="p-5 text-center">
                                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                    <input type=hidden id="id" name=id>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-slate-500 mt-2">Do you really want to delete <b>{{ $s->service_name }}</b> from services list? <br></div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    
                                
                                        <input type="hidden" name="services_id" id="services_id" value="">
                                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach
            </tbody>
                   
           
            
          </table>
        </div>
        <!-- END: Data List -->
      
    </div>

    
    
    
@endsection
@section('script')
{{-- search --}}
<script>
  let table = new DataTable('#myTable', {
    pagingType: 'full_numbers',
    pageLength: 10,
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>
@endsection