 <!-- Position toasts -->
 @if(count($errors) > 0)
            
 @foreach ($errors as $error)
     <div style="position: fixed; top: 10%; right: 5%; z-index : 10000">
         <div class="toast fade show">
             <div class="toast-header">
                 <strong class="mr-auto"><i class="fa fa-globe"></i> ERROR </strong>
                 <small class="text-muted">just now</small>
                 <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
             </div>
             <div class="toast-body">
                     {{$error}}
             </div>
         </div>
     </div>    
 @endforeach
@endif
@if(session('message'))
 <div style="position: fixed; top: 10%; right: 5%; z-index: 20000">
         <div class="toast fade show" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000">
             <div class="toast-header">
                 <strong class="mr-auto"><i class="fa fa-globe"></i>Message</strong>
                 <small class="text-muted">just now</small>
                 <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
             </div>
             <div class="toast-body">
                     {{session('message')}}
             </div>
         </div>
     </div>    
@endif
 
