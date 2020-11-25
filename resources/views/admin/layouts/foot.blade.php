<script src="{{asset('public/admin/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('public/admin/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('public/admin/assets/vendor/toastr/toastr.js')}}"></script>
<script src="{{asset('public/admin/assets/bundles/mainscripts.bundle.js')}}"></script>
@yield('scripts')
<script type="text/javascript">
   $(document).ready(function(){
      $(document).on('click', '.get_id',function(){
         var not_id = $(this).find('input[name=not_id]').val();
      	$.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           type:'POST',
           url: "{{route('markAsRead')}}",
           data: 'not_id='+not_id,
           success:function(data){
              console.log(data);
           }
        });
      });
      
   });

</script>