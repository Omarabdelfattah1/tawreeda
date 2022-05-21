<div>
    <div class="form-group clearfix">
        <label for="dept" class="mb-5">القسم <span class="text-danger" style="font-size:20px;">*</span></label>
        <select style="width: 100%" id="dept" name="department_id[]" class="select2 form-control form-control-lg bg-white rounded-lg border" wire:model="departmentsIds" multiple>
            @foreach($departments as $d)
                <option value="{{$d->id}}" {{old('department_id')==$d->id?'selected':''}}>{{$d->name}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group clearfix">
        <label for="category" class="mb-5"> <span class="text-danger" style="font-size:20px;">*</span>الفئة</label>
        <select style="width: 100%" id="category" name="category_id[]" class="select2 form-control form-control-lg bg-white rounded-lg border required" wire:model="categoriesIds" multiple>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group clearfix">
        <label for="tagproduct" class="mb-5">المنتجات</label>
        <select style="width: 100%" id="tagproduct" name="tagproducts[]" class="select2 form-control form-control-lg bg-white rounded-lg border required" wire:model="tagProductIds" multiple>
            @foreach($tagproducts as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            $('#dept').select2();
            $('#dept').on('change', function (e) {
                @this.set('departmentsIds', $(this).select2("val"));
                livewire.emit('getCategories');
            });

            $('#category').select2();
            $('#category').on('change', function (e) {
                @this.set('categoriesIds', $(this).select2("val"));
                livewire.emit('getTagProducts');
            });
            $('#tagproduct').select2();
            $('#tagproduct').on('change', function (e) {
                @this.set('tagProductIds', $(this).select2("val"));
            });

        })
    </script>
@endpush
