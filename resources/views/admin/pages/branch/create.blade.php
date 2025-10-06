@extends('admin.master.main')

@section('content')

<div class="row">
    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h3>Add Expense</h3>
                </div>
            </div>

            <form action="{{ route('branch.store') }}" method="POST" id="branchForm" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <!-- Branch Name -->
                    <div class="col-md-6">
                        <label for="branchName">Branch Name</label>
                        <input type="text" class="form-control" id="branchName" name="name"
                            value="{{ old('name') }}" required>
                    </div>

                    <!-- Manager Name -->
                    <div class="col-md-6">
                        <label for="managerName">Manager Name</label>
                        <input type="text" class="form-control" id="managerName" name="manager_name"
                            value="{{ old('manager_name') }}" required>
                    </div>
                </div>




                <!-- Branch Number -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="branchNumber">Number</label>
                        <input type="text" class="form-control" id="branchNumber" name="number"
                            value="{{ old('number') }}" required>
                    </div>
                </div>

                <!-- Address -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="branchAddress">Address</label>
                        <textarea class="form-control" id="branchAddress" name="address" rows="3" required>{{ old('address') }}</textarea>
                    </div>
                </div>

                <!-- Submit & Back -->
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>


<script>
    document.getElementById('inputImage').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = ''; // Clear any existing preview

        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '10%'; // Ensure the image fits within the container
                img.style.height = 'auto'; // Maintain aspect ratio
                img.alt = 'Preview';
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection