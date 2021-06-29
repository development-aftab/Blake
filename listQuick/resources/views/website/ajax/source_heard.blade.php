      <div class="container">
        <!-- PAGE-7-START -->
        <div class="row pt-5 center-7">
          <div class="col-lg-6 col-md-8 col-sm-10 mx-auto text-center">
            <h3 class="h3-heading heading-size-h3">How did you hear about us?</h3>
              @forelse($heardSources as $heardSource)
                <div class="radio-toolbar">
                  <input type="radio" id="radio-1" name="heard_source_id" value="{{$heardSource->id}}"  />
                  <label for="radio-1" class="btn ds-block sourceheard" data-sourceheard='{{$heardSource->id}}'> {{$heardSource->name}} </label>
                </div>
              @empty
                <h3>No Data Available</h3>
              @endforelse
          </div>
        </div>
        <!-- PAGE-7-END -->
      </div>
      @push('js')
        <script>
          onStepChanged: function (event, currentIndex, priorIndex){
            // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3){
              $(this).steps("previous");
              return;
            }//end if.
            // Suppress (skip) "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age").val()) >= 18){
              $(this).steps("next");
            }//end if.
          }
        </script>  
      @endpush