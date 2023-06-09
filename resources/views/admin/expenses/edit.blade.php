@extends('../layout/' . $layout)

@section('title', 'Expenses')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Expense</h2>
    </div>
    <form method="POST" action="{{ route("admin.expenses.update", [$expense->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field() }}
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                        <div class="intro-y box p-5">
                               <div class="input-form mt-3 @error('amount') has-error @enderror">
                                    <label for="amount" class="form-label">Expense Amount</label>
                                    <input  type="number" id="amount" name="amount" class="form-control w-full" value="{{ old('amount', $expense->amount) }}">
                                    @error('amount')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('description') has-error @enderror">
                                    <label for="description" class="form-label">Expense Description</label>
                                    <input  type="text" id="description" name="description" class="form-control w-full" value="{{ old('description', $expense->description) }}">
                                    @error('description')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="expense_categories_id" class="form-label">Expense Category</label>
                                    <select class="form-select @error('exCategory') border-danger @enderror"  name="expense_categories_id" id="exCategory" required>
                                        <option selected disabled>Please select Expense Category</option>  
                                        @foreach($categories as $id => $entry)
                                        <!-- <option value="{{ $id }}" {{ (old('categories_id') ? old('categories_id') : $expense->categories->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option> -->
                                        <option value="{{ $id }}" {{ (old('expense_categories_id') ? old('expense_categories_id') : $expense->expense_categories_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @error('expense_categories_id')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="expense_types_id" class="form-label">Expense Type</label>
                                    <select class="form-select @error('exType') border-danger @enderror"  name="expense_types_id" id="exType" required>
                                        
                                        
                                    </select>
                                    @error('expense_types_id')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3 @error('entry_date') has-error @enderror">
                                    <label for="entry_date" class="form-label">Expense Date: {{ old('entry_date', $expense->entry_date) }}</label>
                                    <!-- <input  type="text" id="entry_date" name="entry_date" class="form-control w-full" placeholder="entry_date"> -->
                                    <input type="text" class="datepicker form-control w-full" id="entry_date" name="entry_date" data-single-mode="true">

                                    @error('entry_date')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label>Status</label>
                                    <div class="form-switch mt-2">

                                    <input class="form-check-input" type="checkbox" name="status" id="status" value="{{$expense->status}}" {{$expense->status || old('status',0) === 1 ?'checked' : ''}}>
                                    </div>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary w-24 mr-1"><a href="/Expenses">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary w-24">Update</button>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
   </form>
@endsection
@section('script')
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
                                    $('select[name="expense_types_id"]').append('<option value="'+ key +'">' + exType.name+ '</option>');
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


