 <?php $__env->startSection('website.content'); ?>
<!-- Institute Info -->
<section class="institute-info py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-institutes">
                    <h1 class="text-main-color font-weight-bold institute-page-title"><?php echo e($institute->name_ar); ?></h1>
                    <p class="mb-1">
                        <i class="fas fa-map-marker-alt text-main-color"></i>
                        <?php echo e($institute->country->name_ar); ?> - <?php echo e($institute->city->name_ar); ?>

                    </p>
                    <!-- Institute Rate -->
                    <p class="mb-0"><span class="starrr" ratio="<?php echo e(institute_rate($institute)); ?>"></span> <?php echo e(institute_rate($institute)); ?></p>
                    <!-- ./Institute Rate -->
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        
        <div class="row px-xl-5 mt-5">
            
            
            <div class="col-md-8 order-md-1 order-2">
                <div class=" mb-5 pb-3">
                    <div class="col-12 px-0 position-relative">
                        <!-- Institute Imgs -->
                        <div class="institute-imgs owl-carousel" id="institute-imgs">
                            <picture>
                                <source srcset="<?php echo e(empty($institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $institute->getFirstMediaUrl('institute_banner')); ?>" media="(min-width:700px)">
                                <source srcset="<?php echo e(empty($institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $institute->getFirstMedia('institute_banner')->getUrl('thumb')); ?>" media="(min-width:500px)">
                                <img src="<?php echo e(empty($institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $institute->getFirstMedia('institute_banner')->getUrl('thumb')); ?>" alt="<?php echo e($institute->img_alt); ?>" width="100%">
                            </picture>
                            
                        </div>
                        <img class="institute-logo" src="<?php echo e($institute->logo == 'null' ? asset('storage/default_images.png') : asset($institute->logo)); ?>" alt="<?php echo e(asset($institute->logo_alt)); ?>" />
                        <!-- ./Institute Imgs -->
                    </div>
                </div>
                <!-- Tabs -->
                <ul class="nav nav-tabs bg-white border-0 rounded-10 nav-justified p-0 mb-3" id="myTab" role="tablist">
                    <?php if(isset($course)): ?>
                        <li class="nav-item mb-0">
                            <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5 active" id="about-course-tab" data-toggle="tab" href="#about-course" role="tab" aria-controls="about-course" aria-selected="true">
                                تفاصيل الكورس
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item mb-0">
                        <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5 <?php if(!isset($course)): ?> active <?php endif; ?>" id="brief-institute-tab" data-toggle="tab" href="#brief-institute" role="tab" aria-controls="brief-institute" aria-selected="false">
                            نبذه عن المعهد
                        </a>
                    </li>

                    <?php if(isset($course)): ?>
                        <?php if(!empty($course->blogs[0])): ?>
                            <li class="nav-item mb-0">
                                <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5" data-toggle="tab" href="#course_blogs" role="tab" aria-controls="living" aria-selected="false">مقالات عن الدورة</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(!empty($institute->blogs[0])): ?>
                    
                        <li class="nav-item mb-0">
                            <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5" data-toggle="tab" href="#institute_blogs" role="tab" aria-controls="living" aria-selected="false">مقالات مرتبطة بالمعهد </a>
                        </li>
                    <?php endif; ?>


                   
                 
                    
                </ul>

                <?php $__errorArgs = ['login_error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger text-center">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 

                

                <div class="tab-content" id="myTabContent">
                    <?php if(isset($course)): ?>
                        <div class="tab-pane fade show active" id="about-course" role="tabpanel" aria-labelledby="about-course-tab">
                            <!-- About Course Tab -->
                            <div class="bg-white rounded-10 p-4">
                                <div class="course-info" style="height: 150px; overflow:hidden">
                                    <h5 class="text-main-color font-weight-bold mb-3 course-title"><?php echo e($course->name_ar); ?></h5>
                                    <p class="mb-3"><?php echo $course->about_ar; ?></p>
                                    <div class="row mt-5" >
                                        <?php if($course->min_age !=null): ?>
                                            <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                                <div class="include-img d-inline-block">
                                                    <i class="fas fa-user text-main-color fa-lg position-relative"></i>
                                                </div>
                                                <div class="include-info d-inline-block pr-3">
                                                    <p class="mb-2">الحد الأدنى للعمر</p>
                                                    <p class="text-main-color font-weight-bold"><?php echo e($course->min_age); ?></p>
                                                </div>
                                            </div>
                                            <?php endif; ?> <?php if($course->hours_per_week !=null): ?>
                                            <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                                <div class="include-img d-inline-block">
                                                    <i class="fas fa-clock text-main-color fa-lg position-relative"></i>
                                                </div>
                                                <div class="include-info d-inline-block pr-3">
                                                    <p class="mb-2">ساعات/أسبوع</p>
                                                    <p class="text-main-color font-weight-bold"><?php echo e($course->hours_per_week); ?></p>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                                <div class="include-img d-inline-block">
                                                    <i class="fas fa-calendar-plus text-main-color fa-lg position-relative"></i>
                                                </div>
                                                <div class="include-info d-inline-block pr-3">
                                                    <p class="mb-2">يبدأ الكورس كل</p>
                                                    <p class="text-main-color font-weight-bold">الاثنين</p>
                                                </div>
                                            </div>
                                            <?php if($course->required_level !=null): ?>
                                                <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                                    <div class="include-img d-inline-block">
                                                        <i class="fas fa-signal text-main-color fa-lg position-relative"></i>
                                                    </div>
                                                    <div class="include-info d-inline-block pr-3">
                                                        <p class="mb-2">المستوى المطلوب</p>
                                                        <p class="text-main-color font-weight-bold"><?php echo e($course->required_level); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($course->study_period !=null): ?>
                                        
                                                <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                                    <div class="include-img d-inline-block">
                                                        <i class="fas fa-sun text-main-color fa-lg position-relative"></i>
                                                    </div>
                                                    <div class="include-info d-inline-block pr-3">
                                                        <p class="mb-2">وقت الدراسة</p>
                                                        <p class="text-main-color font-weight-bold"><?php echo e($course->study_period == 'morning' ? 'صباحي' : 'مسائي'); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($course->lessons_per_week !=null): ?>
                                        
                                                <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                                    <div class="include-img d-inline-block">
                                                        <i class="fas fa-book-open text-main-color fa-lg position-relative"></i>
                                                    </div>
                                                    <div class="include-info d-inline-block pr-3">
                                                        <p class="mb-2">درس/الأسبوع</p>
                                                        <p class="text-main-color font-weight-bold"><?php echo e($course->lessons_per_week); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                    <button class="btn btn-primary course-info-read-more" type="button">أقراء المزيد</button>
                                </div>
                                
                            </div>

                            <div id="related-courses" class="row mt-5">
                                <div class="col-12 mb-3">
                                    <h2 class="text-main-color">الدورات التدريبية</h2>
                                </div>
                                <?php $__currentLoopData = $institute->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php if(isset($course)): ?>
                                        <?php if($institute_course->id != $course->id): ?>
                                            <div class="col-lg-6 px-0 related-courses">
                                                <!-- Course -->
                                                <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                                    <!-- Institute Img -->
                                                    <!-- ./Institute Img -->
                                                    <div class="card-body rounded-10 bg-white px-4 mx-2">
                                                        <!-- Course Title -->
                                                        <h5 class="card-title related-course-title"><a href="<?php echo e(route('website.institute' , [$institute->id, $institute->slug , $institute_course->slug])); ?>" class="text-main-color"> <?php echo e($institute_course->name_ar); ?></a></h5>
                                                        <!-- ./Course Title -->
    
                                                        <!-- Course Time And Level -->
                                                        <p class="mb-0 overflow-hidden">
                                                            <?php if($institute_course->study_period != null): ?>
                                                                <span class="float-right"><i class="fas fa-sun text-main-color"></i> <?php echo e($institute_course->study_period); ?></span>
                                                            <?php endif; ?>
                                                            <?php if($institute_course->required_level != null): ?>
                                                                <span class="float-left"> <i class="fas fa-signal text-main-color"></i> <?php echo e($institute_course->required_level); ?></span>
                                                            <?php endif; ?>
                                                        </p>
                                                        <!-- ./Course Time And Level -->
                                                    </div>
                                                    <!-- Course Price -->
                                                    <div class="card-footer bg-white overflow-hidden">
                                                        <span class="float-left text-main-color"><?php echo e(empty($institute_course->coursesPricePerWeek) ? '' : $institute_course->coursesPricePerWeek->price); ?> ر.س / أسبوع </span>
                                                    </div>
                                                    <!-- ./Course Price -->
                                                </div>
                                                <!-- ./Course -->
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="col-lg-4 px-0">
                                            <!-- Course -->
                                            <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                                <!-- Institute Img -->
                                                <!-- ./Institute Img -->
                                                <div class="card-body rounded-10 bg-white">
                                                    <!-- Course Title -->
                                                    <h5 class="card-title"><a href="<?php echo e(route('website.institute' , [$institute->id, $institute->slug , $institute_course->slug])); ?>" class="text-main-color"> <?php echo e($institute_course->name_ar); ?></a></h5>
                                                    <!-- ./Course Title -->
    
                                                    <!-- Course Time And Level -->
                                                    <p class="mb-0 overflow-hidden">
                                                        <?php if($institute_course->study_period != null): ?>
                                                            <span class="float-right"><i class="fas fa-sun text-main-color"></i> <?php echo e($institute_course->study_period); ?></span>
                                                        <?php endif; ?>
                                                        <?php if($institute_course->required_level != null): ?>
                                                            <span class="float-left"> <i class="fas fa-signal text-main-color"></i> <?php echo e($institute_course->required_level); ?></span>
                                                        <?php endif; ?>
                                                    </p>
                                                    <!-- ./Course Time And Level -->
                                                </div>
                                                <!-- Course Price -->
                                                <div class="card-footer bg-white overflow-hidden">
                                                    <span class="float-left text-main-color"><?php echo e(empty($institute_course->coursesPricePerWeek) ? '' : $institute_course->coursesPricePerWeek->price); ?> ر.س / أسبوع </span>
                                                </div>
                                                <!-- ./Course Price -->
                                            </div>
                                            <!-- ./Course -->
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <!-- ./About Course Tab -->
                        </div>
                    <?php endif; ?>
                    <div class="tab-pane fade <?php if(!isset($course)): ?> show active <?php endif; ?>" id="brief-institute" role="tabpanel" aria-labelledby="brief-institute-tab">
                        <!-- Brief Institute Tab -->
                        <div class="bg-white rounded-10 p-4 mb-4">
                            <h5 class="text-main-color font-weight-bold mb-3"><?php echo e($institute->name_ar); ?></h5>
                            <p class="mb-3"><?php echo $institute->about_ar; ?></p>
                        </div>
                        <!-- Map -->
                        <div class="bg-white rounded-10 p-4 mb-4">
                            <h5 class="text-main-color font-weight-bold mb-3">موقع المعهد</h5>
                            <p class="mb-3"><i class="fas fa-map-marker-alt text-main-color ml-3"></i> <?php echo e($institute->country->name_ar); ?> - <?php echo e($institute->city->name_ar); ?></p>
                            <?php echo $institute->map; ?>

                        </div>
                        <!-- ./Brief Institute Tab -->
                        
                    </div>
                    

                    <?php if(isset($course)): ?>
                        <?php if(!empty($course->blogs[0])): ?>
                            <div class="tab-pane fade" id="course_blogs" role="tabpanel" aria-labelledby="living-tab">

                                <div class="row">
                                    <?php $__currentLoopData = $course->blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <!-- Living Tab -->
                                            <div class="bg-white rounded-10 p-4 mb-4">
                                                <img src="<?php echo e($blog->banner == 'null' ? asset('storage/default_images.png')  : asset($blog->banner)); ?>" alt="<?php echo e($blog->img_alt); ?>" class="w-100 rounded-10" />
                                                <h5 class="text-main-color font-weight-bold my-3"><?php echo e($blog->title_ar); ?></h5>
                                                <p class="mb-3">
                                                    <?php echo substr(strip_tags($blog->content_ar) , 0 , 500); ?>

                                                    <a href="<?php echo e(route('website.article',$blog->id)); ?>" class="text-secondary-color">.. قراءة المزيد</a>
                                                </p>

                                                
                                                
                                            </div>
                                            <!-- ./Living Tab -->
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                


                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(!empty($institute_blogs)): ?>
                        <div class="tab-pane fade" id="institute_blogs" role="tabpanel" aria-labelledby="living-tab">
                            <div class="row">
                                <?php $__currentLoopData = $institute_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6">
                                        <!-- Living Tab -->
                                        <div class="bg-white rounded-10 p-4 mb-4">
                                            <img src="<?php echo e($blog->banner == 'null' ? asset('storage/default_images.png')  : asset($blog->banner)); ?>" alt="<?php echo e($blog->img_alt); ?>" class="w-100 rounded-10" />
                                            <h5 class="text-main-color font-weight-bold my-3"><?php echo e($blog->title_ar); ?></h5>
                                            <p class="mb-3">
                                                <?php echo substr(strip_tags($blog->content_ar) , 0 , 500); ?>

                                                <a href="<?php echo e(route('website.article',$blog->id)); ?>" class="text-secondary-color">.. قراءة المزيد</a>
                                            </p>

                                            
                                            
                                        </div>
                                        <!-- ./Living Tab -->
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                   
                    
                    
                    <div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training-tab">
                        <!-- Other Courses -->
                        <div class="row">
                            <?php $__currentLoopData = $institute->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php if(isset($course)): ?>
                                    <?php if($institute_course->id != $course->id): ?>
                                        <div class="col-lg-4 px-0">
                                            <!-- Course -->
                                            <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                                <!-- Institute Img -->
                                                <img src="<?php echo e(empty($institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $institute->getFirstMedia('institute_banner')->getUrl('thumb')); ?>" class="card-img-top" alt="..." />
                                                <!-- ./Institute Img -->
                                                <div class="card-body rounded-10 bg-white">
                                                    <!-- Course Title -->
                                                    <h5 class="card-title"><a href="<?php echo e(route('website.institute' , [$institute->id, $institute->slug , $institute_course->slug])); ?>" class="text-main-color"> <?php echo e($institute_course->name_ar); ?></a></h5>
                                                    <!-- ./Course Title -->

                                                    <!-- Course Time And Level -->
                                                    <p class="mb-0 overflow-hidden">
                                                        <?php if($institute_course->study_period != null): ?>
                                                            <span class="float-right"><i class="fas fa-sun text-main-color"></i> <?php echo e($institute_course->study_period); ?></span>
                                                        <?php endif; ?>
                                                        <?php if($institute_course->required_level != null): ?>
                                                            <span class="float-left"> <i class="fas fa-signal text-main-color"></i> <?php echo e($institute_course->required_level); ?></span>
                                                        <?php endif; ?>
                                                    </p>
                                                    <!-- ./Course Time And Level -->
                                                </div>
                                                <!-- Course Price -->
                                                <div class="card-footer bg-white overflow-hidden">
                                                    <span class="float-left text-main-color"><?php echo e(empty($institute_course->coursesPricePerWeek) ? '' : $institute_course->coursesPricePerWeek->price); ?> ر.س / أسبوع </span>
                                                </div>
                                                <!-- ./Course Price -->
                                            </div>
                                            <!-- ./Course -->
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="col-lg-4 px-0">
                                        <!-- Course -->
                                        <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                            <!-- Institute Img -->
                                            <img src="<?php echo e(empty($institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $institute->getFirstMedia('institute_banner')->getUrl('thumb')); ?>" class="card-img-top" alt="..." />
                                            <!-- ./Institute Img -->
                                            <div class="card-body rounded-10 bg-white">
                                                <!-- Course Title -->
                                                <h5 class="card-title"><a href="<?php echo e(route('website.institute' , [$institute->id, $institute->slug , $institute_course->slug])); ?>" class="text-main-color"> <?php echo e($institute_course->name_ar); ?></a></h5>
                                                <!-- ./Course Title -->

                                                <!-- Course Time And Level -->
                                                <p class="mb-0 overflow-hidden">
                                                    <?php if($institute_course->study_period != null): ?>
                                                        <span class="float-right"><i class="fas fa-sun text-main-color"></i> <?php echo e($institute_course->study_period); ?></span>
                                                    <?php endif; ?>
                                                    <?php if($institute_course->required_level != null): ?>
                                                        <span class="float-left"> <i class="fas fa-signal text-main-color"></i> <?php echo e($institute_course->required_level); ?></span>
                                                    <?php endif; ?>
                                                </p>
                                                <!-- ./Course Time And Level -->
                                            </div>
                                            <!-- Course Price -->
                                            <div class="card-footer bg-white overflow-hidden">
                                                <span class="float-left text-main-color"><?php echo e(empty($institute_course->coursesPricePerWeek) ? '' : $institute_course->coursesPricePerWeek->price); ?> ر.س / أسبوع </span>
                                            </div>
                                            <!-- ./Course Price -->
                                        </div>
                                        <!-- ./Course -->
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- ./Other Courses -->
                    </div>
                    <div class="tab-pane fade" id="rate" role="tabpanel" aria-labelledby="rate-tab">
                        <!-- Course Rate Tab -->

                        <div class="bg-white rounded-10 mb-4">
                            <?php $__currentLoopData = $institute->approved_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border-bottom mt-3  py-4">
                                <div class="row px-4">
                                    <div class="col-lg-2 col-4">
                                        <img src="<?php echo e($rate->student->profile_image == null ? asset('storage/default_images.png') : $rate->student->profile_image); ?>" alt="<?php echo e($rate->student->name); ?>" class="img-fluid rounded-pill img-user" />
                                    </div>
                                    <div class="col-lg-10 col-8">
                                        <h5 class="text-main-color"><?php echo e($rate->student->name); ?></h5>
                                        <p>
                                            <span class="starrr" ratio="<?php echo e($rate->rate); ?>"></span> <small class="text-muted pr-3"><?php echo e(ArabicDate($rate->created_at)); ?></small>
                                            <small class="text-muted pr-3"><?php echo e($rate->student->single_course_request->course->name_ar); ?> - <?php echo e($rate->student->single_course_request->course->institute->name_ar); ?></small>
                                        </p>
                                        <p>
                                            <?php echo e($rate->review); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </div>
                        
                        <!-- ./Course Rate Tab -->
                    </div>
                </div>
                <!-- ./Tabs -->
            </div>
            <div class="col-md-4 order-md-2 order-1 mb-5">
                
                <?php if(isset($course)): ?>
                    <course-price-info-component
                        course_obj = '<?php echo e($course); ?>'
                        from_date_error = '<?php $__errorArgs = ['from_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>'
                        residence_obj = '<?php echo e($course->institute->residence); ?>'
                        :insurance = '<?php echo e(empty($course->institute->insurance) ? 0 : $course->institute->insurance); ?>'
                        airport_obj = '<?php echo e($course->institute->airport); ?>'
                        course_id = '<?php echo e($course->id); ?>'
                        course_for_institute_page_url = <?php echo e(route('vue.get.course.for.institute.page')); ?>

                        get_course_price_url = <?php echo e(route('vue.get.course.price.per.week')); ?>

                        save_request_url = <?php echo e(route('student_requests.confirm_reservation')); ?>

                        csrf_token =  "<?php echo e(csrf_token()); ?>"
                        :old="<?php echo e(json_encode(Session::getOldInput())); ?>"
                    >
                    </course-price-info-component>
                <?php else: ?>
                <div style="height: 700px; overflow-y:scroll">
                    <h3 class="text-main-color mb-3">الدورات التدريبية</h3>

                    <?php $__currentLoopData = $institute->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($course)): ?>
                            <?php if($institute_course->id != $course->id): ?>
                                <div class="col-lg-12 px-0 related-courses">
                                    <!-- Course -->
                                    <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                        <!-- Institute Img -->
                                        <!-- ./Institute Img -->
                                        <div class="card-body rounded-10 bg-white">
                                            <!-- Course Title -->
                                            <h5 class="card-title related-course-title"><a href="<?php echo e(route('website.institute' , [$institute->id, $institute->slug , $institute_course->slug])); ?>" class="text-main-color"> <?php echo e($institute_course->name_ar); ?></a></h5>
                                            <!-- ./Course Title -->

                                            <!-- Course Time And Level -->
                                            <p class="mb-0 overflow-hidden">
                                                <?php if($institute_course->study_period != null): ?>
                                                    <span class="float-right"><i class="fas fa-sun text-main-color"></i> <?php echo e($institute_course->study_period); ?></span>
                                                <?php endif; ?>
                                                <?php if($institute_course->required_level != null): ?>
                                                    <span class="float-left"> <i class="fas fa-signal text-main-color"></i> <?php echo e($institute_course->required_level); ?></span>
                                                <?php endif; ?>
                                            </p>
                                            <!-- ./Course Time And Level -->
                                        </div>
                                        <!-- Course Price -->
                                        <div class="card-footer bg-white overflow-hidden">
                                            <span class="float-left text-main-color"><?php echo e(empty($institute_course->coursesPricePerWeek) ? '' : $institute_course->coursesPricePerWeek->price); ?> ر.س / أسبوع </span>
                                        </div>
                                        <!-- ./Course Price -->
                                    </div>
                                    <!-- ./Course -->
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="col-lg-12 px-0">
                                <!-- Course -->
                                <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                    <!-- Institute Img -->
                                    <!-- ./Institute Img -->
                                    <div class="card-body rounded-10 bg-white">
                                        <!-- Course Title -->
                                        <h5 class="card-title"><a href="<?php echo e(route('website.institute' , [$institute->id, $institute->slug , $institute_course->slug])); ?>" class="text-main-color"> <?php echo e($institute_course->name_ar); ?></a></h5>
                                        <!-- ./Course Title -->

                                        <!-- Course Time And Level -->
                                        <p class="mb-0 overflow-hidden">
                                            <?php if($institute_course->study_period != null): ?>
                                                <span class="float-right"><i class="fas fa-sun text-main-color"></i> <?php echo e($institute_course->study_period); ?></span>
                                            <?php endif; ?>
                                            <?php if($institute_course->required_level != null): ?>
                                                <span class="float-left"> <i class="fas fa-signal text-main-color"></i> <?php echo e($institute_course->required_level); ?></span>
                                            <?php endif; ?>
                                        </p>
                                        <!-- ./Course Time And Level -->
                                    </div>
                                    <!-- Course Price -->
                                    <div class="card-footer bg-white overflow-hidden">
                                        <span class="float-left text-main-color"><?php echo e(empty($institute_course->coursesPricePerWeek) ? '' : $institute_course->coursesPricePerWeek->price); ?> ر.س / أسبوع </span>
                                    </div>
                                    <!-- ./Course Price -->
                                </div>
                                <!-- ./Course -->
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Institute Info -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('website.includes.page_scripts'); ?>
<script>
    $('.course-info-read-more').click(function(){
        $('.course-info').css('height' , 'auto')
        $(this).hide()
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/website/institute/institute-profile.blade.php ENDPATH**/ ?>