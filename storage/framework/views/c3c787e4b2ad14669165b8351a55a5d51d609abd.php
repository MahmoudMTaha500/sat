 <?php $__env->startSection('admin.content'); ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم صرف العملات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">صرف العملات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <div class="row">
                <div id="recent-transactions" class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"> العملات (<?php echo e($exchange_rates->count()); ?>)</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right"
                            href="<?php echo e(route('website_settings.update_all_prices' , ['dashboard_update' => true] )); ?>" > <i class="ft-plus ft-md"></i> تحديث كل العملات</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                          <thead>
                            <tr>
                              <th class="border-top-0">العمل</th>
                              <th class="border-top-0">العملة المحولة  </th>
                              <th class="border-top-0">سعر الصرف</th>
                              <th class="border-top-0">اكشن</th>
                            </tr>
                          </thead>
                          <tbody>
                            <style>
                             
      
                            </style>
                            <?php $__currentLoopData = $exchange_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exchange_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td class="text-truncate">  <?php echo app('translator')->get('website_lang.'.$exchange_rate->base_currency_code); ?></td>
                              <td class="text-truncate"><?php echo app('translator')->get('website_lang.'.$exchange_rate->currency_code); ?></td>
                              <td class="text-truncate"><?php echo e($exchange_rate->exchange_rates); ?> هلله </td>
                              <td class="text-truncate">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="<?php echo e(route('exchange-rate.edit', $exchange_rate->id)); ?>" class="btn btn-info btn-sm round"> تعديل</a>
                                    
                                </div>
                            </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/admin/exchange_rates/index.blade.php ENDPATH**/ ?>