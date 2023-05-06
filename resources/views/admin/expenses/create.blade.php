@extends('../layout/' . $layout)

@section('title', 'Expenses')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create New Expense</h2>
    </div>
    <form action="{{ route('Expenses.store') }}" method="post">
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                               <div class="input-form mt-3 @error('amount') has-error @enderror">
                                    <label for="amount" class="form-label">Expense Amount</label>
                                    <input  type="number" id="amount" name="amount" class="form-control w-full" placeholder="100.00">
                                    @error('amount')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('description') has-error @enderror">
                                    <label for="description" class="form-label">Expense Description</label>
                                    <input  type="text" id="description" name="description" class="form-control w-full" placeholder="Description">
                                    @error('description')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="exCategory" class="form-label">Expense Category</label>
                                    <select class="form-select @error('exCategory') border-danger @enderror" name="exCategory" id="exCategory">
                                    <option hidden>Choose Expense Category</option>
                                    @foreach ($exCategory as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('exCategory')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="exType" class="form-label">Expense Type</label>
                                    <select class="form-select @error('exType') border-danger @enderror" name="exType" id="exType"></select>
                                    @error('exType')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('entry_date') has-error @enderror">
                                    <label for="entry_date" class="form-label">Expense Date</label>
                                    <!-- <input  type="text" id="entry_date" name="entry_date" class="form-control w-full" placeholder="entry_date"> -->
                                    <input type="text" class="datepicker form-control w-full" id="entry_date" name="entry_date" data-single-mode="true">

                                    @error('entry_date')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                               
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Expenses">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Create</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection
@section('script')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous" type="text/javascript"></script>    -->

<script type="text/javascript">
            $(document).ready(function() {
                $('#exCategory').on('change', function() {
                    console.log("start");
                var exCategoryID = $(this).val();
                console.log(exCategoryID);
                if(exCategoryID) {
                    $10.ajax({
                        url: "/getexType/" + exCategoryID,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data)
                        {
                            console.log('success');
                            console.log(data);
                            if(data){
                                $10('#exType').empty();
                                $10('#exType').append('<option hidden>Choose Expense Type</option>'); 
                                $10.each(data, function(key, exType){
                                    $('select[name="exType"]').append('<option value="'+ key +'">' + exType.name+ '</option>');
                                });
                            }else{
                                $10('#exType').empty();
                            }
                        }
                    });
                }else{
                    $10('#exType').empty();
                }
                });
            });
        </script>
@endsection
