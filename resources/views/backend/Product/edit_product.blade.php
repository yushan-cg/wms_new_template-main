<!-- Form fields -->
<div class="form-group">
    <label for="product_name{{ $row->id }}">Product Name</label>
    <input type="text" class="form-control" id="product_name{{ $row->id }}" name="product_name" placeholder="Enter product name" value="{{ $row->product_name }}" required>
</div>
<div class="form-group">
    <label for="SKU{{ $row->id }}">SKU</label>
    <input type="text" class="form-control" id="SKU{{ $row->id }}" name="SKU" placeholder="Enter product SKU" value="{{ $row->SKU }}" required>
</div>
<div class="form-group">
    <label for="product_desc{{ $row->id }}">Description</label>
    <textarea class="form-control" id="product_desc{{ $row->id }}" name="product_desc" placeholder="Enter product description (optional)">{{ $row->product_desc }}</textarea>
</div>
<div class="form-group">
    <label for="expired_date{{ $row->id }}">Expired date</label>
    <input type="date" class="form-control" id="expired_date{{ $row->id }}" name="expired_date" placeholder="Select product expired date" value="{{ $row->expired_date }}">
</div>
<div class="form-group">
    <label for="UOM{{ $row->id }}">Unit of Measurement (UOM)</label>
    <input type="text" class="form-control" id="UOM{{ $row->id }}" name="UOM" placeholder="Enter product UOM" value="{{ $row->UOM }}">
</div>
<div class="form-group">
    <label for="weight_per_unit{{ $row->id }}">Weight per unit (kg)</label>
    <input type="number" class="form-control" id="weight_per_unit{{ $row->id }}" name="weight_per_unit" placeholder="Enter product weight per unit in kg" value="{{ $row->weight_per_unit }}">
</div>
<div class="form-group">
    <label for="partner_id{{ $row->id }}">Customer/Company of the product</label>
    <select class="form-control" id="partner_id{{ $row->id }}" name="partner_id" required>
        <option value="">Select Customer/Company</option>
        @foreach($partners as $partner)
            <option value="{{ $partner->id }}" {{ $partner->id == $row->partner_id ? 'selected' : '' }}>{{ $partner->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="product_img{{ $row->id }}">Product Image</label>
    <input type="file" class="form-control-file" id="product_img{{ $row->id }}" name="Img">
</div>
