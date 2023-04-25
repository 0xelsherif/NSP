@extends('../layout/' . $layout)
@section('title', 'Leads')
@section('subcontent')

<h2 class="intro-y text-lg font-medium mt-10">leads</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">
                <a href="{{ route('admin.leads.create') }}">Create New Lead</a>
            </button>
            <div class="dropdown">
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
            </div>
            
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
          <table id="myTable" >
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">NAME</th>
                    <th class="whitespace-nowrap">CONTACT</th>
                    <th class="text-center whitespace-nowrap">SERIAL</th>
                    <th class="text-center whitespace-nowrap">CLIENT</th>
                    <th class="text-center whitespace-nowrap">JOINING DATE</th>
                    <th class="text-center whitespace-nowrap">CREATED BY</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                   
                </tr>
            </thead>
            
            <tbody>
                <?php $i = 0; ?>
                @foreach ($lead as $l)
                <tr>
                    <?php $i++; ?>
                    <td class="text-center">{{ $i }}</td>
                    <td> 
                        <a href="" class="font-medium whitespace-nowrap">{{ $l->lead_name }}</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $l->lead_job }}</div>
                    </td>
                    <td> 
                        <a href="mailto: {{ $l->lead_email }}" class="font-medium whitespace-nowrap">{{ $l->lead_email }}</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><a href="tel:{{ $l->lead_phone }}">{{ $l->lead_phone }}</a></div>
                    </td>
                    <td class="text-center">{{ $l->lead_number }}</td>
                    <td class="text-center">{{ $l->client->client_name }}</td>
                    <td class="text-center">{{ $l->created_at->format("d/m/Y h:i A") }}</td>
                    <td class="text-center">{{ $l->user->name }}</td>
                    
                    <td class="w-40">
                        <div class="flex items-center justify-center {{ $l->status ? 'text-success' : 'text-danger' }}">
                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $l->status ? 'Active' : 'Inactive' }}
                        </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="{{ route('admin.leads.edit', $l->id) }}">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal_{{$l->id}}">
                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                            
                        </div>
                    </td>
                </tr>  
                 <!-- BEGIN: Delete Confirmation Modal -->
                 <div id="delete-confirmation-modal_{{$l->id}}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <form action="{{ route('admin.leads.destroy', $l->id) }}" method="POST" id="deleteFormlead">
                                    
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="p-5 text-center">
                                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                    <input type=hidden id="id" name=id>
                                    <div class="text-3xl mt-5">Are you sure?</div>
                                    <div class="text-slate-500 mt-2">Do you really want to delete <b>{{ $l->lead_name }}</b> from leads list? <br></div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    
                                
                                        <input type="hidden" name="leads_id" id="leads_id" value="">
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