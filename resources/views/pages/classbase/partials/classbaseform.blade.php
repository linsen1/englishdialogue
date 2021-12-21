
<div class="mb-3">
                            <label for="exampleInputText1" class="form-label">分类名称</label>
                            <input type="text" class="form-control" id="exampleInputText1" value="{{old('class_name',optional($classBase??null)->class_name)}}" placeholder="请输入分类名称" name="class_name">
@error('class_name')
<br/>
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror
</div>
<div class="mb-3">

    <label class="form-label" for="formFile">专题图片</label>
    @if (optional($classBase??null)->class_pic)
        <div class="card">
            <a href="{{env('tencent_url_default').optional($classBase??null)->class_pic}}" target="_blank"> <img src="{{env('tencent_url_default').optional($classBase??null)->class_pic}}" width="200px" alt="..."></a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="class_pic" >

    @error('class_pic')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label  class="form-label">权重（排序，越大越靠前）</label>
    <input type="number" class="form-control" id="exampleInputNumber1" value="{{old('class_order',optional($classBase??null)->class_order)??1}}" name="class_order">
    @error('class_order')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="radioInline" class="form-label">类型</label>
    <div class="mb-3">
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="class_type" id="radioInline" value="0" {{old('class_type',optional($classBase??null)->class_type)===0?'checked':''}}>
            <label class="form-check-label" for="radioInline" >
                口语对话
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="class_type" id="radioInline1" value="1" {{old('class_type',optional($classBase??null)->class_type)===1?'checked':''}}>
            <label class="form-check-label" for="radioInline1">
                美文
            </label>
        </div>
    </div>
    @error('class_type')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>