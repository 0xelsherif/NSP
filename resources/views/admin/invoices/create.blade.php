@extends('../layout/' . $layout)

@section('title', 'Invoices')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create Invoice</h2>
    </div>
    <form action="{{ route('Invoices.store') }}" method="post">
        {{ csrf_field() }}
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">
       
        <div class="intro-y col-span-11 2xl:col-span-12">
           
            <!-- BEGIN: Product Information -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                        <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Invoice Details
                    </div>
                    <div class="mt-5">
                      
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Invoice Information</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    Automatic calculation of the total amount will be performed. 
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <div class="sm:grid grid-cols-3 gap-2">
                                    <div class="input-group">
                                        <div class="input-group-text">#</div>
                                        <input type="text" class="form-control" placeholder="Invoice Number" name="invoice_number">
                                        
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Invoice Date" readonly>
                                        <input type="text" class="datepicker form-control pl-12" data-single-mode="true" name="invoice_Date">
                                      
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Invoice Due Date" readonly>
                                        <input type="text" class="datepicker form-control pl-12" data-single-mode="true" name="due_date">
                                   
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Invoice Collect Date" readonly>
                                        <input type="text" class="datepicker form-control pl-12" data-single-mode="true" name="collect_date">
                                   
                                    </div>
                                    <div class="input-group">
                                        <div class="z-30 rounded-l w-10 flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400 -mr-1">@</div>
                                            <select class="tom-select w-full @error('client_id') border-danger @enderror"  name="client_id" id="client_id" required>
                                            <option selected disabled>Client</option>  
                                                @foreach($clients as $id => $entry)
                                                <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                @endforeach
                                            </select>
                                                @error('client_id')
                                                <div class="has-error text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="z-30 rounded-l w-10 flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400 -mr-1">@</div>
                                            <select class="tom-select w-full @error('service_id') border-danger @enderror"  name="service_id" id="service_id" required>
                                            <option selected disabled>Service</option>  
                                                @foreach($services as $id => $entry)
                                                <option value="{{ $id }}" {{ old('services_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                @endforeach
                                            </select>
                                                @error('service_id')
                                                    <div class="has-error text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                      
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">EGP</div>
                                        <input type="text" id="price" class="form-control" placeholder="Amount" name="price">
                                   
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-text">%</div>
                                        <input type="text" id="vat" class="form-control" placeholder="Vat" name="vat">
                                        
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">EGP</div>
                                        <input type="text" class="form-control" id="total" placeholder="Total" readonly name="total">
                                      
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Project</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    Select a single project that has the same invoice customer.
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                            
                            <select class="form-select @error('project_id') border-danger @enderror" name="project_id" id="project" required></select>
                                @error('project_id')
                                                    <div class="has-error text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Leads</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Optional</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                    Pick one lead that is associated with the same invoice customer.
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <select id="lead" name="lead_id" class="form-select @error('lead_id') border-danger @enderror">
                                   
                                </select>
                                    @error('lead_id')
                                                    <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Product Information -->
            <!-- BEGIN: Product Detail -->
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                        <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Service Detail
                    </div>
                    <div class="mt-5">
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Service Description</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Optional</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                        <div>Make sure you're describing the services that you provide, including what you do, some basics about how you do it and why people should care about the service.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <div class="editor">
                                    <p>Content of the editor.</p>
                                </div>
                                <div class="form-help text-right">Maximum character 0/2000</div>
                            </div>
                        </div>
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Invoice Attachment</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Optional</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                        <div>Select a file from your device. Accepted file types are PDF, JPG, PNG and JPEG are allowed.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                              
                            <form data-file-types="image/jpeg|image/png|image/jpg|application/pdf" action="/file-upload" class="dropzone">
                                    <div class="fallback">
                                     <input name="file" type="file" multiple />
                                    </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        <div class="text-slate-500">
                                            PDF, JPG, PNG and JPEG only allowed
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Product Detail -->
            <!-- END: Weight & Shipping -->
            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Cancel</button>
                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
            </div>
        </div>
    </form>
    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
    <script type="text/javascript">
            $(document).ready(function() {
    $('#client_id').on('change', function() {
        console.log("start");
        var clientID = $(this).val();
        console.log(clientID);
        if(clientID) {
            $10.ajax({
                url: "/getexProject/" + clientID,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    console.log('success');
                    console.log(data);
                    if(data.length > 0){
                        $10('#project').empty();
                        $10('#project').append('<option hidden>Choose Project</option>'); 
                        $10.each(data, function(key, clp){
                            $('select[name="project_id"]').append('<option value="'+ clp.id +'">' + clp.project_name + '</option>');
                        });
                    }else{
                        $10('#project').empty();
                        $10('#project').append('<option selected disabled>No projects available</option>');
                    }
                }
            });
        }else{
            $10('#project').empty();
        }
    });
});
        </script>
        <script>
            const priceInput = document.getElementById("price");
            const vatInput = document.getElementById("vat");
            const totalInput = document.getElementById("total");

            const calculateTotal = () => {
                const price = parseFloat(priceInput.value);
                const vat = parseFloat(vatInput.value);
                const total = price + (price * vat / 100);
                totalInput.value = total.toFixed(2);
            }

            priceInput.addEventListener("input", calculateTotal);
            vatInput.addEventListener("input", calculateTotal);
        </script>
        <script type="text/javascript">
           $(document).ready(function() {
    $('#client_id').on('change', function() {
        console.log("start");
        var clientID = $(this).val();
        console.log(clientID);
        if(clientID) {
            $10.ajax({
                url: "/getexLead/" + clientID,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data)
                {
                    console.log('success');
                    console.log(data);
                    if(data.length > 0){
                        $10('#lead').empty();
                        $10('#lead').append('<option hidden>Choose Lead</option>'); 
                        $10.each(data, function(key, cll){
                            $('select[name="lead_id"]').append('<option value="'+ cll.id +'">' + cll.lead_name + '</option>');
                        });
                    }else{
                        $10('#lead').empty();
                        $10('#lead').append('<option selected disabled>No leads available</option>');
                    }
                }
            });
        }else{
            $10('#lead').empty();
        }
    });
});
        </script>
@endsection
