@extends('layouts.app')

@section('content')
<section class="py-lg-16 py-8">
    <!-- container -->
   <div class="container">
      <!-- row -->
     <div class="row align-items-center">
        <!-- col -->
       <div class="col-lg-6 mb-6 mb-lg-0">
         <div class="">
            <!-- heading -->
           <h5 class="text-dark mb-4"><i class="fe fe-check icon-xxs icon-shape bg-light-success text-success rounded-circle me-2"></i>Zemilan Keripik Baso Goreng</h5>
              <!-- heading -->
           <h1 class="display-3 fw-bold mb-3">Zemilan Keripik Baso Goreng</h1>
            <!-- para -->
           <p class="pe-lg-10 mb-5">Start, switch, or advance your career with more than 5,000 courses, Professional
             Certificates, and degrees from world-class universities and companies.</p>
              <!-- btn -->
            <a href="{{route('catalog')}}" class="btn btn-primary">See Product</a>

         </div>
       </div>
        <!-- col -->
       <div class="col-lg-6 d-flex justify-content-center">
          <!-- images -->
        <div class="position-relative text-center">
         <img src="{{asset('assets/images/background/coba1.JPG')}}" alt="" class="rounded-circle" style="max-width: 450px; height: auto; margin-top: 35px;">
        </div>
       </div>
     </div>
   </div>
 </section>
@endsection
