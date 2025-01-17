<div class="form-group">
    <label for="status">Ürün Durumu</label>
    <select name="status" id="status" class="form-control">
        <option value="taslak" {{ isset($product) && $product->status == 'taslak' ? 'selected' : '' }}>Taslak</option>
        <option value="yayında" {{ isset($product) && $product->status == 'yayında' ? 'selected' : '' }}>Yayında</option>
    </select>
</div>
