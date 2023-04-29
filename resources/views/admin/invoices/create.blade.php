@extends('../layout/' . $layout)

@section('title', 'Invoices')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create Invoice</h2>
    </div>
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
                                        The total amount will be calculated automatically 
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <div class="sm:grid grid-cols-3 gap-2">
                                    <div class="input-group">
                                        <div class="input-group-text">#</div>
                                        <input type="text" class="form-control" placeholder="Invoice Number">
                                        
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Invoice Date" readonly>
                                        <input type="text" class="datepicker form-control pl-12" data-single-mode="true" >
                                      
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Invoice Due Date" readonly>
                                        <input type="text" class="datepicker form-control pl-12" data-single-mode="true" >
                                   
                                    </div>
                                    <div class="input-group">
                                        <div class="z-30 rounded-l w-10 flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400 -mr-1">@</div>
                                            <select class="tom-select w-full">
                                                <option value="0">Client</option>
                                                <option value="2">Johnny Deep</option>
                                                <option value="3">Robert Downey, Jr</option>
                                                <option value="4">Samuel L. Jackson</option>
                                                <option value="5">Morgan Freeman</option>
                                            </select>
                                        
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="z-30 rounded-l w-10 flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400 -mr-1">@</div>
                                            <select class="tom-select w-full">
                                                <option value="0">Service</option>
                                                <option value="2">Johnny Deep</option>
                                                <option value="3">Robert Downey, Jr</option>
                                                <option value="4">Samuel L. Jackson</option>
                                                <option value="5">Morgan Freeman</option>
                                            </select>
                                      
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">$</div>
                                        <input type="text" class="form-control" placeholder="Amount">
                                   
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-text">%</div>
                                        <input type="text" class="form-control" placeholder="Vat">
                                        
                                    </div>
                                    <div class="input-group mt-2 sm:mt-0">
                                        <div class="input-group-text">$</div>
                                        <input type="text" class="form-control" placeholder="Total" readonly>
                                      
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
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <select id="category" class="form-select">
                                    @foreach (array_slice($fakers, 0, 9) as $faker)
                                        <option value="{{ $faker['categories'][0]['name'] }}">{{ $faker['categories'][0]['name'] }}</option>
                                    @endforeach
                                </select>
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
                                        You can choose more than one lead from the existing lead list related to the the invoice customer.
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <select id="subcategory" data-placeholder="Etalase" class="tom-select w-full" multiple>
                                    @foreach (array_slice($fakers, 0, 2) as $faker)
                                        <option selected value="{{ $faker['categories'][0]['name'] }}">{{ $faker['categories'][0]['name'] }}</option>
                                    @endforeach
                                </select>
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
                                        <div class="font-medium">Service Attachment</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Optional</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                        <div>Select a file from your device. Accepted file types are PDF, JPG, PNG and JPEG are allowed.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                                              
                                <form data-single="true" action="/file-upload" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" />
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
                <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Save & Add New Product</button>
                <button type="button" class="btn py-3 btn-primary w-full md:w-52">Save</button>
            </div>
        </div>
     
    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection
