
<div class="mb-3">
                            <label for="exampleInputText1" class="form-label">目录名称</label>
                            <input type="text" class="form-control" id="exampleInputText1" value="{{old('dialogue_title',optional($dialogues??null)->dialogue_title)}}" placeholder="请输目录名称" name="dialogue_title">
@error('dialogue_title')
<br/>
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror
</div>

<div class="mb-3">
    <label for="exampleFormControlSelect1" class="form-label">所属分类</label>
    <select class="form-select" id="exampleFormControlSelect1" name="class_base_id">
        <option selected disabled>选择分类</option>
        @foreach($classBase as $class)
        <option value={{$class->id}}
        @if(optional($dialogues??null)->class_base_id AND optional($dialogues??null)->class_base_id ===$class->id)
                selected
                @endif
        >{{$class->class_name}}</option>
        @endforeach
    </select>
    @error('class_base_id')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>

<div class="mb-3">

    <label class="form-label" for="formFile">目录图片</label>
    @if (optional($dialogues??null)->dialogue_pic)
        <div class="card">
            <a href="{{env('tencent_url_default').optional($dialogues??null)->dialogue_pic}}" target="_blank"> <img src="{{env('tencent_url_default').optional($dialogues??null)->dialogue_pic}}" width="200px" alt="..."></a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="dialogue_pic" >

    @error('dialogue_pic')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

</div>

<div class="mb-3">

    <label class="form-label" for="formFile">推荐位图片</label>
    @if (optional($dialogues??null)->dialogue_home_pic)
        <div class="card">
            <a href="{{env('tencent_url_default').optional($dialogues??null)->dialogue_home_pic}}" target="_blank"> <img src="{{env('tencent_url_default').optional($dialogues??null)->dialogue_home_pic}}" width="200px" alt="..."></a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="dialogue_home_pic" >

    @error('dialogue_home_pic')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

</div>

<div class="mb-3">
    <label  class="form-label">权重（排序，越大越靠前）</label>
    <input type="number" class="form-control" id="exampleInputNumber1" value="{{old('dialogue_order',optional($dialogues??null)->dialogue_order)}}" name="dialogue_order">
    @error('dialogue_order')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label  class="form-label">句子数量</label>
    <input type="number" class="form-control" id="exampleInputNumber1" value="{{old('dialogue_sentence_count',optional($dialogues??null)->dialogue_sentence_count)}}" name="dialogue_sentence_count">
    @error('dialogue_sentence_count')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
