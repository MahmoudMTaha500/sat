@extends('admin.app')
 @section('admin.content')
 

 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المعاهد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
          
          
          
            <succes-story-component
            :url_story="{{ json_encode(url('/dashboard/success-story')) }}"  
            :aprove_route="{{json_encode(url('/dashboard/comment/updateAprovement'))}}"
            
            > 
        </succes-story-component>
        
               
                
              </div>

    </div>
</div>





@endsection
