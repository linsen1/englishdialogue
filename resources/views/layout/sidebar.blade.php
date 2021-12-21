<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      每天<span>读些英文</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">配置管理</li>
      <li class="nav-item {{ active_class(['classBases/*'])}}">
        <a class="nav-link" data-bs-toggle="collapse" href="#classbase" role="button" aria-expanded="{{ is_active_route(['classBases/*']) }}" aria-controls="classbase">
          <i class="link-icon" data-feather="pie-chart"></i>
          <span class="link-title">专题管理</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['classBases/*']) }}" id="classbase">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('classBases/list') }}" class="nav-link {{ active_class(['classBases/list']) }}">专题列表</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('classBases/create') }}" class="nav-link {{ active_class(['classBases/create']) }}">添加专题</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">口语对话</li>

      <li class="nav-item {{ active_class(['dialogue/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#dialogues" role="button" aria-expanded="{{ is_active_route(['dialogue/*']) }}" aria-controls="dialogues">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">对话目录</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['dialogue/*']) }}" id="dialogues">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('dialogue/dialogues') }}" class="nav-link {{ active_class(['dialogue/dialogues']) }}">目录列表</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('dialogue/create') }}" class="nav-link {{ active_class(['dialogue/create']) }}">添加目录</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ active_class(['dialogueWords/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#dialogueWords" role="button" aria-expanded="{{ is_active_route(['dialogueWords/*']) }}" aria-controls="dialogueWords">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">图文内容</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['dialogueWords/*']) }}" id="dialogueWords">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('dialogueWords.list') }}" class="nav-link {{ active_class(['dialogueWords/list']) }}">图文列表</a>
            </li>
            <li class="nav-item">
              <a href="{{route('dialogueWords.create') }}" class="nav-link {{ active_class(['dialogueWords/create']) }}">添加图文</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ active_class(['dialogueVideos/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#dialogueVideos" role="button" aria-expanded="{{ is_active_route(['dialogueVideos/*']) }}" aria-controls="dialogueVideos">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">影视内容</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['dialogueVideos/*']) }}" id="dialogueVideos">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('dialogueVideos.list') }}" class="nav-link {{ active_class(['dialogueVideos/list']) }}">影视列表</a>
            </li>
            <li class="nav-item">
              <a href="{{route('dialogueVideos.create') }}" class="nav-link {{ active_class(['dialogueVideos/create']) }}">添加影视</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>


<!--
<nav class="settings-sidebar">
  <div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
      <i data-feather="settings"></i>
    </a>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Version:</h6>
      <a class="theme-item" href="https://www.nobleui.com/laravel/template/demo1/">
        <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">
      </a>
      <h6 class="text-muted mb-2">Dark Version:</h6>
      <a class="theme-item active" href="https://www.nobleui.com/laravel/template/demo2/">
        <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">
      </a>
    </div>
  </div>
</nav>
-->
