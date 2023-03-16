@extends('superadmin.master')

@section('page_title')
Add Subscription
@endsection
	<!-- aiz core css -->

	<link rel="stylesheet" href="https://d2t5292uahafuy.cloudfront.net/public/assets/css/vendors.css">

    
	<link rel="stylesheet" href="https://d2t5292uahafuy.cloudfront.net/public/assets/css/aiz-core.css">

	<script>

    	var AIZ = AIZ || {};

        AIZ.local = {

            nothing_selected: 'Nothing selected',

            nothing_found: 'Nothing found',

            choose_file: 'Choose file',

            file_selected: 'File selected',

            files_selected: 'Files selected',

            add_more_files: 'Add more files',

            adding_more_files: 'Adding more files',

            drop_files_here_paste_or: 'Drop files here, paste or',

            browse: 'Browse',

            upload_complete: 'Upload complete',

            upload_paused: 'Upload paused',

            resume_upload: 'Resume upload',

            pause_upload: 'Pause upload',

            retry_upload: 'Retry upload',

            cancel_upload: 'Cancel upload',

            uploading: 'Uploading',

            processing: 'Processing',

            complete: 'Complete',

            file: 'File',

            files: 'Files',

        }

	</script>
@section('css_js_up')

<style>
 .btn{
  font-size: 13px;
  padding: 9px 24px;
}
.btn.btn-primary {
    color: #fff;
    background-color: #061880 !important;
    border-color: #061880 !important;
    box-shadow: 0 2px 2px 0 rgb(0 188 212 / 14%), 0 3px 1px -2px rgb(0 188 212 / 20%), 0 1px 5px 0 rgb(0 188 212 / 12%);
}
</style>
@endsection

@section('main_content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Subscription Option</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('option.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title <span class="text-danger">*</span></label>
                          <input type="text" name="title" id="title" class="form-control" onkeyup="setSlug($(this).val())">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('title') }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group ">
                          <label class="bmd-label-floating">Status <span class="text-danger">*</span></label>
                          <select class="form-control" name="status" id="status">
                              <option value="">Select Status</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('status') }}</span>
                          </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('css_js_down')

@if(Session::get('error_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('error_message')}}");
</script>
<script src="https://d2t5292uahafuy.cloudfront.net/public/assets/js/vendors.js" ></script>

	<script src="https://d2t5292uahafuy.cloudfront.net/public/assets/js/aiz-core.js" ></script>
@endif

<script>
    function setSlug(slug)
    {
      slug = slug.replaceAll(' ', '-');
      $("#slug").val(slug);
    }
</script>
@endsection



