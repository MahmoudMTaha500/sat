 <?php $__env->startSection('website.content'); ?>
<!-- Intro  -->
<section class="intro">
    <div class="container-fluid">
        <div class="row px-xl-5 align-items-end pt-md-5">
            <div class="col-lg-6 align-self-center">
                <!-- Section Heading -->
                <h1 class="text-white font-weight-bold mb-4 intro-title">ابدأ رحلتك الآن، وتعلم اللغة في أكبر المعاهد الدولية</h1>
                <p class="lead text-white mb-4 intro-desc">نوفر لك أفضل الجامعات والمعاهد للدراسة في الخارج, قم بتسجيل حسابك وأحصل على خصم 5% على الرسوم الدراسة</p>
                
                <!-- ./Section Heading -->

                <!-- Search Form -->
                <form class="my-4 row" method="GET" action="<?php echo e(route('website.institutes')); ?>">
                    <div class="col-lg-6">
                        <!-- Country Field -->
                        <div class="form-group">
                            <country-component ref="countries_component_ref" get_countries_url="<?php echo e(route('vue.get.countries')); ?>" ele_class="<?php echo e('form-control rounded-10'); ?>"> </country-component>
                        </div>
                        <!-- ./Country Field -->
                    </div>
                    <div class="col-lg-6">
                        <!-- City Field -->
                        <div class="form-group">
                            <city-component ref="cities_component_ref" get_cities_url="<?php echo e(route('vue.get.cities')); ?>" ele_class="<?php echo e('form-control rounded-10 searchable-select'); ?>"> </city-component>
                        </div>
                        <!-- ./City Field -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Weeks Count Field -->
                        <div class="form-group">
                            <select name="weeks" class="form-control rounded-10" data-live-search="true">
                                <option value="" disabled selected>عدد الأسابيع</option>
                                <?php for($i = 0; $i <= 45; $i++): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>                                
                            </select>
                        </div>
                        <!-- ./Weeks Count Field -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Confirm Btn  -->
                        <button type="submit" class="btn rounded-10 bg-secondary-color w-100 text-center text-white">ابحث عن معهد</button>
                        <!-- ./Confirm Btn  -->
                    </div>
                </form>
                <!-- ./Search Form -->
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <img class="w-100 mt-5 mt-md-2" src="<?php echo e(asset('storage/banners/intro-home.png')); ?>" alt="Home Intro Image" srcset="">
            </div>
        </div>
    </div>
</section>
<!-- ./Intro -->


<?php if(isset($best_offers[0])): ?>
<!-- Best Offers -->
<section class="best-offers py-5">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-5">
            <div class="col-12">
                <div class="heading-best-offers text-center">
                    <h3 class="text-main-color font-weight-bold">أفضل العروض</h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-4">
            <div class="col-12 px-0">
                <!-- Offers -->
                <div class="offers owl-carousel position-relative" id="offers-list">
                    <?php $__currentLoopData = $best_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <!-- Institute -->
                    <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                        <!-- Offer Icon -->
                        <div class="offer-icon position-absolute bg-secondary-color text-white">
                            - <?php echo e($offer->discount*100); ?> %
                        </div>
                        <!-- Offer Icon -->
                        <!-- Add To Favourite Btn -->
                        <div class="add-favourite position-absolute" course-id="<?php echo e($offer->id); ?>">
                            <i <?php if(!auth()->guard('student')->check()): ?> onclick="alert('يجب عليك تسجيل الدخول اولا')" <?php endif; ?> class="<?php if(auth()->guard('student')->check()): ?> <?php echo e(heart_type($offer)); ?> <?php else: ?> far <?php endif; ?>    fa-heart favourite-icon"></i>
                        </div>
                        
                            
                        
                        <!-- ./Add To Favourite Btn -->
                        <!-- Institute Img -->
                        <a target="_blank" href="<?php echo e(route('website.institute' , [$offer->institute->id, $offer->institute->slug , $offer->slug])); ?>">
                            <div class="institute-img d-inline-block position-relative">
                                <picture>
                                    <source srcset="<?php echo e(empty($offer->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $offer->institute->getFirstMedia('institute_banner')->getUrl('thumb_md')); ?>" media="(min-width:700px)">
                                    <source srcset="<?php echo e(empty($offer->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $offer->institute->getFirstMedia('institute_banner')->getUrl('thumb')); ?>" media="(min-width:400px)">
                                    <img loading="lazy" width="100" src="<?php echo e(empty($offer->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $offer->institute->getFirstMedia('institute_banner')->getUrl('thumb_md')); ?>" alt="<?php echo e($offer->institute->name_ar); ?>" class="card-img-top"/>
                                </picture>
                            </div>
                        </a>
                        <!-- ./Institute Img -->
                        <div class="card-body rounded-10 bg-white">
                            <!-- Institute Title -->
                            <p class="card-title"><a target="_blank" class="h5" href="<?php echo e(route('website.institute' , [$offer->institute->id, $offer->institute->slug ])); ?>" class="text-dark"> معهد <?php echo e($offer->institute->name_ar); ?> </a></p>
                            <p class="card-title"><a target="_blank" class="h6" href="<?php echo e(route('website.institute' , [$offer->institute->id, $offer->institute->slug , $offer->slug])); ?>" class="text-main-color"><?php echo e($offer->name_ar); ?> </a></p>
                            <!-- ./Institute Title -->
                            <!-- Institute Rate -->
                            <p class="mb-0"><span class="starrr" ratio="<?php echo e(institute_rate($offer->institute)); ?>"></span> <?php echo e(institute_rate($offer->institute)); ?></p>
                            <!-- ./Institute Rate -->
                            <!-- Institute Location -->
                            <p class="mb-0"><i class="fas fa-map-marker-alt text-main-color"></i> <?php echo e($offer->institute->country->name_ar); ?> , <?php echo e($offer->institute->city->name_ar); ?></p>
                            <!-- ./Institute Location -->
                            <!-- Course Name -->
                            <!-- ./Course Name -->
                            <!-- Course Time And Level -->
                            <p class="mb-0 overflow-hidden">
                                <span class="float-right"><i class="fas fa-sun text-main-color"></i> <?php echo e($offer->study_period=='morning' ? 'صباحي' : 'مسائي'); ?></span>
                                <span class="float-left"> <i class="fas fa-signal text-main-color"></i> <?php echo e($offer->required_level); ?></span>
                            </p>
                            <!-- ./Course Time And Level -->
                        </div>
                        <!-- Course Price -->
                        <div class="card-footer bg-white overflow-hidden">
                            <del class="text-muted del"><?php echo e($offer->coursesPricePerWeek->price); ?> ر.س / أسبوع </del> <span class="float-left text-main-color"><?php echo e($offer->coursesPricePerWeek->price*(1-$offer->discount)); ?> ر.س / أسبوع </span>
                        </div>
                        <!-- ./Course Price -->
                    </div>
                    <!-- ./Institute -->

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- ./Offers -->
            </div>
        </div>
    </div>
</section>
<!-- ./Best Offers -->
<?php endif; ?> 
<!-- Studies -->
<div class="studies py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <?php if(isset($two_blogs[0])): ?>
        <div class="row">
            <!-- Background Img -->
            <div class="col-md-6 bg-study-1 p-0 align-self-end"> 
            <picture>
                <source srcset="<?php echo e(empty($two_blogs[0]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[0]->getFirstMediaUrl('blog_featured_image')); ?>" media="(min-width:700px)">
                <source srcset="<?php echo e(empty($two_blogs[0]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[0]->getFirstMedia('blog_featured_image')->getUrl('thumb')); ?>" media="(min-width:500px)">
                <img loading="lazy" src="<?php echo e(empty($two_blogs[0]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[0]->getFirstMedia('blog_featured_image')->getUrl('thumb')); ?>" alt="<?php echo e($two_blogs[0]->img_alt); ?>" width="100%">
            </picture>

                            
            </div>
            <!-- ./Background Img -->
            <div class="col-md-6 p-md-5 p-3">
                <h3 class="text-main-color mt-xl-5"><?php echo e($two_blogs[0]->title_ar); ?></h3>
                <p><?php echo mb_substr(strip_tags($two_blogs[0]->content_ar) ,0 , 300 , 'utf-8'); ?> ....</p>
                <?php if(!empty($two_blogs[0]->country)): ?>
                    <a href="#" onclick="this.href = '<?php echo e(route('website.institutes' , ['country' => $two_blogs[0]->country->id])); ?>' "><button class="btn rounded-10 bg-secondary-color text-white mb-4 ml-3">عرض معاهد <?php echo e($two_blogs[0]->country->name_ar); ?></button></a>
                <?php endif; ?>
                
                <a href="<?php echo e(route('website.article',$two_blogs[0]->id)); ?>"><button class="btn rounded-10 border-secondary-color text-secondary-color mb-4">اقرأ المزيد</button></a>
                <div class="overflow-hidden">
                    
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(isset($two_blogs[1])): ?>

        <div class="row">
            <div class="col-md-6 p-md-5 p-3 order-md-1 order-2">
                <h3 class="text-main-color mt-xl-5"><?php echo e($two_blogs[1]->title_ar); ?></h3>
                <p><?php echo mb_substr(strip_tags($two_blogs[1]->content_ar) ,0 , 300 , 'utf-8'); ?> ....</p>
                <?php if(!empty($two_blogs[1]->country)): ?>
                    <a href="#" onclick="this.href = '<?php echo e(route('website.institutes' , ['country' => $two_blogs[1]->country->id])); ?>' "><button class="btn rounded-10 bg-secondary-color text-white mb-4 ml-3">عرض معاهد <?php echo e($two_blogs[1]->country->name_ar); ?></button></a>
                <?php endif; ?>
                <a href="<?php echo e(route('website.article',$two_blogs[1]->id)); ?>"><button class="btn rounded-10 border-secondary-color text-secondary-color mb-4">اقرأ المزيد</button></a>
                <div class="overflow-hidden">
                    
                </div>
            </div>
            <!-- Background Img -->
            <div class="col-md-6 bg-study-2 order-md-2 order-1 p-0">
                <picture>
                    <source srcset="<?php echo e(empty($two_blogs[1]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[1]->getFirstMediaUrl('blog_featured_image')); ?>" media="(min-width:700px)">
                    <source srcset="<?php echo e(empty($two_blogs[1]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[1]->getFirstMedia('blog_featured_image')->getUrl('thumb')); ?>" media="(min-width:500px)">
                    <img loading="lazy" src="<?php echo e(empty($two_blogs[1]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[1]->getFirstMedia('blog_featured_image')->getUrl('thumb')); ?>" alt="<?php echo e($two_blogs[1]->img_alt); ?>" width="100%">
                </picture>
            </div>
            <!-- ./Background Img -->
        </div>
        <?php endif; ?>

    </div>
</div>
<!-- ./Studies -->


<!-- Trusted Us -->

<!-- ./Trusted Us -->

<?php if(isset($blogs[0])): ?>
<!-- News -->
<section class="news py-5">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-best-offers text-center">
                    <h3 class="text-main-color font-weight-bold">آخر الأخبار والموضوعات المهمة</h3>
                    <p>اعرف آخر الأخبار والموضوعات الجديدة التي تخص حياة الطلبة السعوديين بالخارج والدراسة بشكل عام</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <!-- News List -->
                <div class="news-list owl-carousel position-relative px-xl-5" id="news-list">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 rounded-10">
                        <a href="<?php echo e(route('website.article',$blog->id)); ?>">
                            <img loading="lazy" src="<?php echo e(empty($blog->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $blog->getFirstMedia('blog_featured_image')->getUrl('thumb')); ?>" alt="<?php echo e($blog->img_alt); ?>" class="card-img-top" />
                        </a>
                        
                        <div class="card-body rounded-10 bg-white">
                            <a href="<?php echo e(route('website.article',$blog->id)); ?>"><p class="card-title text-main-color h5"><?php echo e($blog->title_ar); ?></p></a>
                            <p class="mb-0">
                                <span><?php echo mb_substr(strip_tags($blog->content_ar) ,0 , 150 , 'utf-8'); ?> ... <br> <a href="<?php echo e(route('website.article',$blog->id)); ?>">اقرأ المزيد</a></span>
                            </p>
                            <p class="mb-0"><span class="text-muted"><?php echo e(ArabicDate($blog->created_at)); ?></span></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- ./News List -->
            </div>
        </div>
    </div>
</section>
<!-- ./News -->
<?php endif; ?> <?php if(isset($success_stories[0])): ?>
<!-- Success Stories -->
<section class="success-stories pt-5 pb-0">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-5">
            <div class="col-12">
                <div class="heading-success-stories text-center">
                    <h3 class="text-main-color font-weight-bold">آراء العملاء</h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد، والجامعات، والمؤسسات الأكاديمية - إلى رفع مستوى التعاون، وخلق بيئة تنافسية</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <!-- Stories -->
                <div class="stories-list owl-carousel custome_slide position-relative px-xl-5" id="slide-testimonal">
                    <?php $__currentLoopData = $success_stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <!-- Quote -->
                    <div class="quote text-center">
                        <!-- Quote Text -->
                        <div class="user-quote pt-4 pb-5 px-4 rounded-10">
                            <i class="fas fa-quote-right"></i>
                            <p><?php echo e($story->story); ?></p>
                        </div>
                        <!-- ./Quote Text -->
                        <div class="user-info">
                            <!-- User Img -->
                            <div class="user-info__img">
                                <img loading="lazy" src="<?php echo e($story->student->profile_image == null ? asset('storage/default_images.png') : $story->student->profile_image); ?>" alt="student-image" class="img-fluid rounded-pill mx-auto" />
                            </div>
                            <!-- ./User Img -->
                            <!-- User Name -->
                            <div class="user-info__name">
                                <span><?php echo e($story->student->name); ?></span>
                            </div>
                            <!-- ./User Name -->
                            <!-- University Name -->
                            
                            <!-- ./University Name -->
                        </div>
                    </div>
                    <!-- ./Quote -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- ./Stories -->
            </div>
        </div>
    </div>
</section>
<!-- ./Success Stories -->
<?php endif; ?> <?php if(isset($blogs[0])): ?>
<!-- Browse our institutes -->
<section class="browse-our-institutes py-5">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12 text-center">
                <h3 class="text-main-color font-weight-bold">تصفح معاهدنا</h3>
                <p>تصفح لائحة أفضل معاهد اللغات المعتمدة، أعددناها من أجل تطوير مهاراتك اللغوية</p>
                <a href="<?php echo e(route('website.institutes')); ?>"><button class="btn rounded-10 bg-secondary-color text-white px-4">ابدأ الآن</button></a>
            </div>
        </div>
        <!-- ./Section Heading -->
    </div>
</section>
<!-- ./Browse our institutes -->
<?php endif; ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('website.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/website/home.blade.php ENDPATH**/ ?>