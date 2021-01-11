@extends('admin.app') @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المعاهد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Recent Transactions -->
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">المعاهد (15)</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="/sat/institutes/create.php"> <i class="ft-plus ft-md"></i> اضافة معهد جديد</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">اسم المعهد</th>
                                            <th class="border-top-0">الدولة</th>
                                            <th class="border-top-0">المدينة</th>
                                            <th class="border-top-0">عدد الكورسات</th>
                                            <th class="border-top-0">التقييم</th>
                                            <th class="border-top-0">التقييم بواسطة</th>
                                            <th class="border-top-0">التعليقات</th>
                                            <th class="border-top-0">اكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-truncate">كابلان</td>
                                            <td class="text-truncate">المنيا</td>
                                            <td class="text-truncate">مانشيستر</td>
                                            <td class="text-truncate">5 كورسات</td>
                                            <td class="text-truncate">
                                                <div id="read-only-stars" data-score="1"></div>
                                            </td>
                                            <td class="text-truncate">
                                                سات
                                            </td>
                                            <td class="text-truncate">
                                                <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-success round">حالي (15)</button></a>
                                                <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-info round">جديد (10)</button></a>
                                            </td>
                                            <td class="text-truncate">
                                                <div data-toolbar="transport-options-o" class="btn-toolbar btn-toolbar-primary m-0" data-toolbar-style="primary-o"><i class="ft-settings"></i></div>
                                                <div id="transport-options-o" class="toolbar-icons hidden">
                                                    <a href="#"><i class="la la-eye"></i></a>
                                                    <a href="#"><i class="la la-pencil"></i></a>
                                                    <a href="#"><i class="la la-plus"></i></a>
                                                    <a href="#"><i class="la la-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection
