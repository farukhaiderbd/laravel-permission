
@push('css')
<style>


/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
@endpush
<div class="kt-portlet__body  kt-portlet__body--fit">
    <div class="row row-no-padding row-col-separator-lg">
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
                @php
                    $visitor_totall = App\Student::where('status',1)->where('student_status','Guest')->count();
                @endphp
              <h4 class="kt-widget24__title">Total Visitor</h4>
                  <span class="kt-widget24__desc"></span>
            </div>
            <span class="kt-widget24__stats kt-font-brand">{{ $visitor_totall }}</span>
          </div>
            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
                @php
                    $date =(new DateTime("now"))->format('Y-m-d');
                    $today_visit = App\Student::where('status',1)->where('student_status','Guest')->where('guest_date', $date)->count();
                @endphp
              <h4 class="kt-widget24__title">Today Visitor</h4>
                  <span class="kt-widget24__desc"></span>
            </div>
            <span class="kt-widget24__stats kt-font-warning">{{ $today_visit }}</span>
          </div>
            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>


      </div>
    </div>
      {{-- <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">Total Guest</h4>
                  <span class="kt-widget24__desc">Guest Information</span>
            </div>
            <span class="kt-widget24__stats kt-font-danger">100</span>
          </div>
          <div class="progress progress--sm">
            <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

        </div>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-3">
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">Total Student</h4>
                  <span class="kt-widget24__desc"> Student Information</span>
            </div>
            <span class="kt-widget24__stats kt-font-success">75</span>
          </div>


        </div>
      </div> --}}
    </div>
  </div>
<br>
  <div class="kt-portlet__body  kt-portlet__body--fit">
    <div class="row row-no-padding row-col-separator-lg">

      <div class="col-md-6 col-lg-6 col-xl-3">
        <form class="example" action="{{ route('search_guest_student_account') }}" method="POST">
            @csrf
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
          {{-- <a href="{{ route('add_guest_student') }}" class="btn btn-info btn-lg btn-block">Add Visitor</a> --}}
      </div>
    </div>
  </div>
