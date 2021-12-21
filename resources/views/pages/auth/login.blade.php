@extends('layout.master2')

@section('content')
  <div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mx-0 auth-page">
      <div class="col-md-8 col-xl-6 mx-auto">
        <div class="card">
          <div class="row">
            <div class="col-md-4 pe-md-0">

              <div class="auth-side-wrapper" style="background-image: url({{asset('xd') }})">

              </div>
            </div>
            <div class="col-md-8 ps-md-0">
              <div class="auth-form-wrapper px-4 py-5">
                <a href="#" class="noble-ui-logo d-block mb-2"><span>每天读些英文</span></a>
                <h5 class="text-muted fw-normal mb-4">欢迎回来！</h5>
                <form class="forms-sample">
                  <div class="mb-3">
                    <label for="userEmail" class="form-label">邮箱</label>
                    <input type="email" class="form-control" id="userEmail" placeholder="请输入邮箱">
                  </div>
                  <div class="mb-3">
                    <label for="userPassword" class="form-label">密码</label>
                    <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="请输入密码">
                  </div>
                  <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="authCheck">
                    <label class="form-check-label" for="authCheck">
                      记住我
                    </label>
                  </div>
                  <div>
                    <a href="{{ route('classBases.list')}}" class="btn btn-primary me-2 mb-2 mb-md-0">登录</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
