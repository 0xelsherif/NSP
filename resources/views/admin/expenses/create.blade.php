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
                                    <label for="expense_categories_id" class="form-label">Expense Category</label>
                                    <select class="tom-select w-full @error('expense_categories_id') border-danger @enderror" name="expense_categories_id" id="expense_categories_id" required>
                                        <option selected disabled>Please select Expense Category</option>  
                                        @foreach($categories as $id => $entry)
                                        <option value="{{ $id }}" {{ old('expense_categories_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @error('expense_categories_id')
                                        <div class="has-error text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="expense_types_id" class="form-label">Expense Type</label>
                                    <select class="tom-select w-full @error('expense_types_id') border-danger @enderror"  name="expense_types_id" id="expense_types_id" required>
                                        <!-- <option selected disabled>Please select Expense Type</option>   -->
                                        <!-- @foreach($types as $id => $entry)
                                        <option value="{{ $id }}" {{ old('expense_types_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach -->
                                    </select>
                                    @error('expense_types_id')
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

<script>
        $(document).ready(function() {
            $('select[name="expense_categories_id"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('/expense_types/') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="expense_types_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="expense_types_id"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

</script>

@endsection
