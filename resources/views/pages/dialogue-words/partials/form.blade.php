
<div class="mb-3">
                            <label for="exampleInputText1" class="form-label">句子内容</label>
                            <input type="text" class="form-control" id="exampleInputText1" value="{{old('words_text',optional($words??null)->words_text)}}" placeholder="请输句子内容" name="words_text">
@error('words_text')
<br/>
<div class="alert alert-danger" role="alert">
    {{$message}}
</div>
@enderror
</div>

<div class="mb-3">
    <label for="exampleFormControlSelect1" class="form-label">所属目录</label>
    <select class="form-select" id="exampleFormControlSelect1" name="dialogue_base_id">
        <option selected disabled>选择目录</option>
        @foreach($dialoguebases as $class)
        <option value={{$class->id}}
        @if(optional($words??null)->dialogue_base_id ===$class->id)
                selected
                @endif
        >{{$class->dialogue_title}}</option>
        @endforeach
    </select>
    @error('dialogue_base_id')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>

<div class="mb-3">

    <label class="form-label" for="formFile">句子配图</label>
    @if (optional($words??null)->words_pic)
        <div class="card">
        <a href="{{env('tencent_url_default').optional($words??null)->words_pic}}" target="_blank"> <img src="{{env('tencent_url_default').optional($words??null)->words_pic}}" width="200px" alt="..."></a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="words_pic" >

    @error('words_pic')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">

    <label class="form-label" for="formFile">句子配音</label>
    @if (optional($words??null)->words_audio)
        <div class="card">
        <a href="{{env('tencent_url_default').optional($words??null)->words_audio}}" target="_blank"> {{env('tencent_url_default').optional($words??null)->words_audio}}</a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="words_audio" >

    @error('words_audio')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label  class="form-label">权重（排序，越大越靠前）</label>
    <input type="number" class="form-control" id="exampleInputNumber1" value="{{old('words_order',optional($words??null)->words_order)}}" name="words_order">
    @error('words_order')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="radioInline" class="form-label">是否翻译</label>
    <div class="mb-3">
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="words_is_translate" id="radioInline" value="0" {{old('words_is_translate',optional($words??null)->words_is_translate)===0?'checked':''}}>
            <label class="form-check-label" for="radioInline" >
                否
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="words_is_translate" id="radioInline1" value="1" {{old('words_is_translate',optional($words??null)->words_is_translate)===1?'checked':''}}>
            <label class="form-check-label" for="radioInline1">
                是
            </label>
        </div>
    </div>
    @error('words_is_translate')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label  class="form-label">句子翻译</label>
    <input type="text" class="form-control" id="exampleInputNumber1" value="{{old('words_subtitle',optional($words??null)->words_subtitle)}}" name="words_subtitle">
    @error('words_subtitle')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
