@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-categories.update", [$productCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="category_name">{{ trans('cruds.productCategory.fields.category_name') }}</label>
                <input class="form-control {{ $errors->has('category_name') ? 'is-invalid' : '' }}" type="text" name="category_name" id="category_name" value="{{ old('category_name', $productCategory->category_name) }}">
                @if($errors->has('category_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_name') }}
                    </div>
                @endif
                <div class="btn btn-sm btn-info sub-categoy-button mt-2">Add Sub Category Field</div>
                <span class="help-block">{{ trans('cruds.productCategory.fields.category_name_helper') }}</span>
            </div>

            <div class="sub-category-field">

            </div>

            <input type="hidden" id="ss" value="{{ $productCategory->sub ?? null }}">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@parent

<script>
    var subCategory = JSON.parse($("#ss").val());
    var lastStepDigit = 0;
    $(document).ready(function(){
        subCategory.sort((a, b) => parseFloat(a.sorting) - parseFloat(b.sorting));
        subCategory.forEach(element => {
            $(".sub-category-field").append(
                `<div class="form-group sub-category-div">
                    <label class="step-badge" for="sub_categories">Sub Step ` + (parseInt(element.sorting) + 1) + `</label>
                    <div class="btn btn-sm btn-danger remove-field mb-1" style="float:right;" data-id="sub-item-` + parseInt(parseInt(element.sorting) + 1) + `">X</div>
                    <input class="form-control" type="text" name="sub_categories[]" id="sub-item-` + (parseInt(element.sorting) + 1) + `" value="` + element.category_name + `">
                </div>`
            );
        });

        lastStepDigit = $(".remove-field").last().data("id") ?? null;
        lastStepDigit = lastStepDigit != null ? parseInt(lastStepDigit.slice(-1)) : 1;
    });

    $(document).on("click", ".sub-categoy-button", function(){
        lastStepDigit++;
        $(".sub-category-field").append(
            `<div class="form-group sub-category-div">
                <label class="step-badge" for="sub_categories">Sub Step ` + lastStepDigit + `</label>
                <div class="btn btn-sm btn-danger remove-field mb-1" style="float:right;">X</div>
                <input class="form-control" type="text" name="sub_categories[]" id="sub_categories">
            </div>`
        );
    });

    $(document).on("click", ".remove-field", function(){
        $(this).parent().remove();
        renameBadges();
    });

    function renameBadges() {
        var subCategory = $(".sub-category-div");
        var subCategoryLength = subCategory.length;
        for (let i = 0; i < subCategoryLength; i++) {
            $(`.sub-category-div:eq(` + i + `) .step-badge`).text(`Sub Step ` + (i + 1) + ``);
        }
    }
</script>

@endsection
