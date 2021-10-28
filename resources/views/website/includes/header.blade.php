<head>
    <!-- Required meta tags -->
    <meta name="google-site-verification" content="2699bdHRn0qQjyfFnlmwUwIeuCGdCQypKlKmMpkwVjU"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="{{(isset($page_identity) ? ($page_identity['meta_description'] == '' ? 'كلاسات'  : $page_identity['meta_description'] ) : 'كلاسات')}}" />
    <meta name="keywords" content="{{(isset($page_identity) ? ($page_identity['meta_keywords'] == '' ? 'كلاسات'  : $page_identity['meta_keywords'] ) : 'كلاسات')}}" />
    <!-- Cairo Font  -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="{{asset('website')}}/css/fontawesome/all.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('website')}}/css/bootstrap.min.css"/>
    <!-- Owl Carousel -->
    @if ($page_identity['page_name'] == 'institute-profile' || $page_identity['page_name'] == 'home' )
        <link rel="stylesheet" href="{{asset('website')}}/css/owl.carousel.min.css" />
    @endif
    <!-- Select Search -->
    @if ($page_identity['page_name'] == 'institute-profile' || $page_identity['page_name'] == 'institutes' )
        <link rel="stylesheet" href="{{asset('website')}}/css/bootstrap-select.min.css" />
    @endif
    <!-- Starrr -->
    @if ($page_identity['page_name'] == 'institute-profile' || $page_identity['page_name'] == 'institutes' || $page_identity['page_name'] == 'home' || $page_identity['page_name'] == 'offers')
        <link rel="stylesheet" href="{{asset('website')}}/css/starrr.css" />
    @endif
    
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('website')}}/css/theme.css" />
    @if ($page_identity['page_name'] == 'institute-profile')
        <link rel="stylesheet" href="{{asset('website')}}/css/pages/institute.css">
        <link rel="stylesheet" href="{{asset('website')}}/css/jquery-ui.css">
    @endif
    @if ($page_identity['page_name'] == 'about-us' || $page_identity['page_name'] == 'refund_policy' || $page_identity['page_name'] == 'home' || $page_identity['page_name'] == 'terms-conditions')
        <link rel="stylesheet" href="{{asset('website')}}/css/pages/index.css" />
    @endif
    <link rel="icon" href="{{asset('website/imgs/logo-icon.png')}}">
    <title>{{(isset($page_identity) ? ($page_identity['title_tag'] == '' ? 'كلاسات'  : $page_identity['title_tag'] ) : 'كلاسات')}}</title>
</head> 