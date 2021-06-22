@include('admin.includes.header') {{-- @section('admin.content') --}}

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="{{asset('website')}}/imgs/logo.png" alt="branding logo" />
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>مرحبا بعودتك</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    @error('login_error')
                                    <div class="alert alert-danger text-cnter">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <form class="form-horizontal form-simple" action="{{route('login.store')}}" method="POST" novalidate>
                                        @csrf @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="email" name="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" id="user-name" placeholder="بريدك الالكتروني" required />
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                        </fieldset>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" id="user-password" placeholder="كلمة مررورك" required />
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" id="remember-me" name="remember" class="chk-remember" />
                                                    <label for="remember-me"> تذكرني</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> دخول</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@include('admin.includes.footer')
