<form id="addProductForm" action="{{ route('insert_product') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Form fields -->
    <div class="modal-body">
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
        </div>
        <div class="form-group">
            <label for="SKU">SKU:</label>
            <input type="text" class="form-control" id="SKU" name="SKU" value="{{ old('SKU') }}" required>
        </div>
        <div class="form-group">
            <label for="product_desc">Product Description:</label>
            <textarea class="form-control" id="product_desc" name="product_desc">{{ old('product_desc') }}</textarea>
        </div>
        <div class="form-group">
            <label for="expired_date">Expired Date:</label>
            <input type="date" class="form-control" id="expired_date" name="expired_date" value="{{ old('expired_date') }}">
        </div>
        <div class="form-group">
            <label for="UOM">UOM:</label>
            <input type="text" class="form-control" id="UOM" name="UOM" value="{{ old('UOM') }}" required>
        </div>
        <div class="form-group">
            <label for="weight_per_unit">Weight per Unit:</label>
            <input type="number" class="form-control" id="weight_per_unit" name="weight_per_unit" value="{{ old('weight_per_unit') }}">
        </div>
        <div class="form-group">
            <label for="partner_id">Partner:</label>
            <select class="form-control" id="partner_id" name="partner_id" required>
                @foreach($partners as $partner)
                    <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Img">Image:</label>
            <input type="file" class="form-control-file" id="Img" name="Img">
        </div>
        </div>
