

<div class="mb-3">
    <label for="exampleFormControlSelect1" class="form-label">所属目录</label>
    <select class="form-select" id="exampleFormControlSelect1" name="dialogue_base_id">
        <option selected disabled>选择目录</option>
        @foreach($dialoguebases as $class)
        <option value={{$class->id}}
        @if(optional($video??null)->dialogue_base_id ===$class->id)
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

    <label class="form-label" for="formFile">影视文件</label>
    @if (optional($video??null)->video_url)
        <div class="card">
            <a href="{{env('tencent_url_default').optional($video??null)->video_url}}" target="_blank"> <img src="{{env('tencent_url_default').optional($video??null)->video_url}}" width="200px" alt="..."></a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="video_url" >

    @error('video_url')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>




<div class="mb-3">

    <label class="form-label" for="formFile">影视封面</label>
    @if (optional($video??null)->video_image)
        <div class="card">
        <a href="{{env('tencent_url_default').optional($video??null)->video_image}}" target="_blank"> <img src="{{env('tencent_url_default').optional($video??null)->video_image}}" width="200px" alt="..."></a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="video_image" >

    @error('video_image')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>

<div class="mb-3">

    <label class="form-label" for="formFile">中文字幕</label>
    @if (optional($video??null)->chinese_subtitle)
        <div class="card">
        <a href="{{env('tencent_url_default').optional($video??null)->chinese_subtitle}}" target="_blank"> {{env('tencent_url_default').optional($video??null)->chinese_subtitle}}</a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="chinese_subtitle" >

</div>

<div class="mb-3">

    <label class="form-label" for="formFile">英文字幕</label>
    @if (optional($video??null)->english_subtitle)
        <div class="card">
            <a href="{{env('tencent_url_default').optional($video??null)->english_subtitle}}" target="_blank"> {{env('tencent_url_default').optional($video??null)->english_subtitle}}</a>
        </div>
    @endif
    <input class="form-control" type="file" id="formFile" name="english_subtitle" >

</div>



<div class="mb-3">
    <label  class="form-label">影视时间</label>
    <input type="number" class="form-control" id="exampleInputNumber1" value="{{old('video_time',optional($video??null)->video_time)}}" name="video_time">
    @error('video_time')
    <br/>
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
</div>

