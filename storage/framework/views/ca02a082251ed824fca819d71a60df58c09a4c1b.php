 <?php $__env->startSection('website.content'); ?>
<!-- Confirm Reservation -->
<section class="confirm-reservation py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
    
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-institutes">
                    <h3 class="text-main-color font-weight-bold">تأكيد الحجز</h3>
                    <p class="mb-1">برجاء ادخل جميع البيانات لتأكيد حجزك وسيقوم فريق الموقع بالتواصل معك لتأكيد جميع التفاصيل لذا تأكد من صحة الجوال والبريد الإلكتروني</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <!-- Confirm Reservation Form -->
                <div class="bg-white p-xl-5 p-3 rounded-10 mb-4">
                    <?php if($errors->has('not_robot_error')): ?>
                        <div class="alert alert-danger text-center">
                            <?php echo e($errors->first('not_robot_error')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(auth()->guard('student')->check()): ?>
                        <form action="<?php echo e(route('create_student_request')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="course_details" value="<?php echo e(json_encode($course_details)); ?>" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>الاسم </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input readonly value="<?php echo e(auth()->guard('student')->user()->name); ?>" type="text" name="name" class="form-control border-0 bg-transparent <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="الاسم كاملا *" />
                                    </div>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-lg-6">
                                    <label>البريد الإلكتروني </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input
                                            readonly
                                            value="<?php echo e(auth()->guard('student')->user()->email); ?>"
                                            type="email"
                                            name="email"
                                            class="form-control border-0 bg-transparent <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="البريد الإلكتروني *"
                                        />
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-6">
                                    <label>رقم الجوال </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input readonly value="<?php echo e(auth()->guard('student')->user()->phone); ?>" type="text" name="phone" class="form-control border-0 bg-transparent <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="رقم الجوال *" />
                                    </div>
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-lg-6">
                                    <label>الجنسية </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input
                                            readonly
                                            value="<?php echo e(auth()->guard('student')->user()->nationality); ?>"
                                            type="text"
                                            name="nationality"
                                            class="form-control border-0 bg-transparent <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="الجنسية *"
                                        />
                                    </div>
                                    <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-12">
                                    <label>العنوان </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input
                                            readonly
                                            value="<?php echo e(auth()->guard('student')->user()->address); ?>"
                                            type="text"
                                            name="address"
                                            class="form-control border-0 bg-transparent <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="العنوان *"
                                        />
                                    </div>
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-12">
                                    <label>ملاحظاتك </label>
                                    <div class="form-group btn-light rounded-10">
                                        <textarea name="note" class="form-control rounded-10" placeholder="أضف ملاحظاتك" rows="5"><?php echo e(old('note')); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <script src='https://www.google.com/recaptcha/api.js'></script>
                                    <div class="g-recaptcha w-100" data-sitekey="<?php echo e(env('RECAPTCHA_SITE_KEY')); ?>"></div>
                                </div>
                                <div class="col-12">
                                    <button class="btn bg-secondary-color text-white w-100 rounded-10" type="submit">
                                        تأكيد الحجز
                                    </button>
                                </div>
                                
                            </div>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('create_student_request')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="course_details" value="<?php echo e(json_encode($course_details)); ?>" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>الاسم </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input value="<?php echo e(old('name')); ?>" type="text" name="name" class="form-control border-0 bg-transparent <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="الاسم كاملا *" />
                                    </div>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-lg-6">
                                    <label>البريد الإلكتروني </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input
                                            value="<?php echo e(old('email')); ?>"
                                            type="email"
                                            name="email"
                                            class="form-control border-0 bg-transparent <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['login_error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="البريد الإلكتروني *"
                                        />
                                    </div>
                                    <?php $__errorArgs = ['login_error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback d-block mb-3" role="alert">
                                        <strong>هذا البريد الإلكتروني موجود بالفعل <a data-toggle="modal" data-target="#student_login" href="">قم بتسجيل الدخول لاكمال الطلب</a> او قم بادخال بريد إلكتروني جديد </strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo $message; ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-6">
                                    <label>رقم الجوال </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input value="<?php echo e(old('phone')); ?>" type="text" name="phone" class="form-control border-0 bg-transparent <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="رقم الجوال *" />
                                    </div>
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-lg-6">
                                    <label>الجنسية </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input value="<?php echo e(old('nationality')); ?>" type="text" name="nationality" class="form-control border-0 bg-transparent <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="الجنسية *" />
                                    </div>
                                    <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-12">
                                    <label>العنوان </label>
                                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                        <input value="<?php echo e(old('address')); ?>" type="text" name="address" class="form-control border-0 bg-transparent <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="العنوان *" />
                                    </div>
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback d-block mb-3" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-12">
                                    <label>ملاحظاتك </label>
                                    <div class="form-group btn-light rounded-10">
                                        <textarea name="note" class="form-control rounded-10" placeholder="أضف ملاحظاتك" rows="5"><?php echo e(old('note')); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <script src='https://www.google.com/recaptcha/api.js'></script>
                                    <div class="g-recaptcha w-100" data-sitekey="<?php echo e(env('RECAPTCHA_SITE_KEY')); ?>"></div>
                                </div>
                                <div class="col-12">
                                    <button class="btn bg-secondary-color text-white w-100 rounded-10" type="submit">
                                        تأكيد الحجز
                                    </button>
                                </div>
                                <div class="col-12 mt-4 text-left">
                                    <a href="
                                            <?php echo e(route('website.institute' , 
                                            [$course_details['course_obj']->institute->id, 
                                            $course_details['course_obj']->institute->slug , 
                                            $course_details['course_obj']->slug, 
                                            "weeks" => $course_details['weeks'], 
                                            "from_date" => $course_details['from_date'], 
                                            "insurance" => $course_details['insurance'] , 
                                            "airport" => json_encode($course_details['airport']) , 
                                            "residence" => json_encode($course_details['residence']) , 
                                            "residence_weeks" => $course_details['residence_weeks']  ])); ?>" class="btn bg-dark text-white rounded-10" type="submit">
                                        رجوع <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="modal fade" id="student_login" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body py-5 px-4 text-center">
                                        <div class="cheched-heading">
                                            <h3 class="text-main-color font-weight-bold">تسجيل الدخول</h3>
                                        </div>
                                        <!-- Sign In Form -->
                                        <div class="sign-in-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">
                                            <?php $__errorArgs = ['login_error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger text-cnter">
                                                <?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            <form class="my-4" method="POST" action="<?php echo e(route('student.login')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <!-- Email Input -->
                                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                                    <input name="email" type="email" class="form-control border-0 bg-transparent" placeholder="البريد الألكتروني" />
                                                </div>

                                                <!-- ./Email Input -->
                                                <!-- password Input -->
                                                <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <input type="password" name="password" class="form-control border-0 bg-transparent" placeholder="كلمة المرور" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text border-0 bg-white p-0 bg-transparent" id="basic-addon2"><i class="far fa-eye"></i></span>
                                                    </div>
                                                </div>

                                                <!-- ./password Input -->
                                                <!-- Forget Password Link -->
                                                <div class="overflow-hidden mb-3">
                                                    <a href="<?php echo e(route('student.reset_password')); ?>" class="text-secondary-color float-left <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">نسيت كلمة المرور؟</a>
                                                </div>
                                                <!-- ./Forget Password Link -->
                                                <!-- Submit Btn -->
                                                <button type="submit" class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">تسجيل الدخول</button>
                                                <!-- ./Submit Btn -->
                                                <!-- Register Link -->
                                                <p class="text-center">ليس لديك حساب؟ <a href="<?php echo e(route('student.register')); ?>" class="text-secondary-color">انشاء حساب جديد</a></p>
                                                <!-- Register Link -->
                                            </form>
                                        </div>
                                        <!-- ./Sign In Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?> 
                </div>
                <!-- ./Confirm Reservation Form -->
            </div>
            <div class="col-lg-4">
                <!-- Course Details -->
                <div class="bg-white py-4 rounded-10 mb-4">
                    <div class="cost-heading border-bottom pb-2 px-3">
                        <h5 class="font-weight-bold text-main-color">تفاصيل الكورس والحجز</h5>
                    </div>
                    <div class="cost-body px-3 pt-3">
                        <p class="text-dark"><span class="font-weight-bold text-main-color">أسم المعهد : </span> <?php echo e($course_details['institute_name']); ?></p>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">اسم الكورس : </span> <?php echo e($course_details['course_name']); ?> <span class="text-success font-weight-bold"><?php echo e(round($course_details['course_price']*$course_details['weeks'])); ?> ر.س (<?php echo e($course_details['weeks'] == '1' ? $course_details['weeks'] . ' أسبوع ' :  $course_details['weeks'] .' أسابيع '); ?>)</span></p>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">الموقع : </span> <?php echo e($course_details['country']); ?> - <?php echo e($course_details['city']); ?></p>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">تاريخ بداية الكورس : </span> <?php echo e(ArabicDate($course_details['from_date'])); ?></p>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">تاريخ نهاية الكورس : </span> <?php echo e(ArabicDate($course_details['to_date'])); ?></p>
                        <?php if($course_details['airport'] != 0): ?>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">الاستقبال : </span> <?php echo e($course_details['airport']['name_ar']); ?> <span class="text-success font-weight-bold ">( <?php echo e(round($course_details['airport']['price'])); ?> ر.س )</span> </p>
                        <?php endif; ?> 
                        <?php if($course_details['residence'] != 0): ?>
                            <p class="text-dark"><span class="font-weight-bold text-main-color">تفاصيل السكن : </span> <?php echo e($course_details['residence']['name_ar']); ?> <span class="text-success font-weight-bold"><?php echo e(round($course_details['residence']['price']*$course_details['residence_weeks'])); ?> ر.س (<?php echo e($course_details['residence_weeks'] == '1' ? $course_details['residence_weeks'] . ' أسبوع ' :  $course_details['residence_weeks'] .' أسابيع '); ?>)</span></p>
                        <?php endif; ?> 
                        <?php if($course_details['insurance_price'] != 0): ?>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">التامين : </span> <span class="text-success font-weight-bold"><?php echo e(round($course_details['insurance_price']*$course_details['weeks'])); ?> ر.س</span> </p>
                        <?php endif; ?>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">عدد الدروس : </span> <?php echo e($course_details['lessons_per_week']); ?> درس / أسبوع</p>
                        <p class="text-dark"><span class="font-weight-bold text-main-color">عدد الساعات : </span> <?php echo e($course_details['hours_per_week']); ?> ساعة / الأسبوع</p>
                        <hr>
                        <p class="text-dark h4"><span class="font-weight-bold text-main-color">التكليفة الاجمالية : </span> <span class="text-success font-weight-bold"><?php echo e(round($course_details['total_price'])); ?></span> <span class="h6">ر.س</span></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ./Confirm Reservation -->
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('website.includes.page_scripts'); ?> 
    <?php $__errorArgs = ['login_error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <button class="student_login_btn d-none" data-toggle="modal" data-target="#student_login">click</button>
        <script>
            $(".student_login_btn").trigger("click");
        </script>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
    <script>
        $('.refund-policy').change(function(){
            if($(this).prop('checked') == true){
                $('.pay-now-btn').prop('disabled', false)
            }else{
                $('.pay-now-btn').prop('disabled', true)
            }
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/website/institute/confirm-reservation.blade.php ENDPATH**/ ?>