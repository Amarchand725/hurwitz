<div class="row" id="remove-parent">
    <div class="row mb-6">
        <label id="insert-url" class="col-lg-2 col-form-label fw-bold fs-6"></label>

        <div class="col-lg-4">
            <select name="statuses[0]" id="statuses" class="form-control order_type_ids order_type_option" value="{{ old('statuses') }}" data-count="0">
                <option value="" selected>PLEASE SELECT</option>
                @forelse ($order_types as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                @empty
                    <option> Type Not Found </option>
                @endforelse
            </select>
            <div class="d-md-none mb-2"></div>
        </div>

        <div class="col-lg-3">
            <div class="col-lg-12 fv-row">
                <input type="url" class="form-control order_type_url" id="url" name="urls[0]" placeholder="Enter URL" data-count="0">
                <span style="color: red">{{ $errors->first('urls') }}</span>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="col-lg-12 fv-row">
                <button type="button" class="btn btn-danger btn-sm remove-more-book-url-btn"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>
