@extends('../layout/' . $layout)

@section('title', 'Invoices')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Invoices</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">
                <a href="{{ route('admin.invoices.create') }}">Create New Invoice</a>
            </button>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2" id="myTable">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">
                            #
                        </th>
                        <th class="whitespace-nowrap">INVOICE #</th>
                        <th class="whitespace-nowrap">CLIENT</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">AMOUNT</th>
                        <th class="text-center whitespace-nowrap">VAT</th>
                        <th class="text-center whitespace-nowrap">TOTAL</th>
                        <th class="text-center whitespace-nowrap">ISSUE DATE</th>
                        <th class="text-center whitespace-nowrap">COLLECT DATE</th>
                        <th class="text-center whitespace-nowrap">AGEING</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (array_slice($fakers, 0, 9) as $faker)
                        <tr class="intro-x">
                            <td class="w-10">
                                <input class="form-check-input" type="checkbox">
                            </td>
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">{{ '#INV-' . $faker['totals'][0] . '807556' }}</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">{{ $faker['users'][0]['name'] }}</a>
                                @if ($faker['true_false'][0])
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                @else
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">California, LA</div>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap {{ $faker['true_false'][0] ? 'text-success' : 'text-pending' }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $faker['true_false'][0] ? 'Completed' : 'Pending Payment' }}
                                </div>
                            </td>
                            <td class="text-center">
                               ${{ $faker['totals'][0] . ',000,00' }}
                            </td>
                            <td class="text-center">
                                ${{ $faker['totals'][0] . ',000,00' }}
                            </td>
                            <td class="text-center">
                              ${{ $faker['totals'][0] . ',000,00' }}
                            </td>
                            <td class="text-center">
                                25/04/2023
                            </td>
                            <td class="text-center">
                                25/04/2023
                            </td>
                            <td class="text-center">
                                30
                            </td>
                            <td class="table-report__action">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-primary whitespace-nowrap mr-2" href="javascript:;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap mr-2" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="arrow-left-right" class="w-4 h-4 mr-1"></i> Change Status
                                    </a>
                                    <a class="flex items-center text-danger whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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