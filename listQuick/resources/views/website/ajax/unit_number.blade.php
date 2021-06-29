<div class="container">
  <!-- PAGE-3-START -->
  <div class="row center-3">
    <div class="col-lg-7 col-md-10 mx-auto is-this-correct-address-2">
      <h3 class="h3-heading correct-address-haeding-2">
        <strong>Does this address have a unit number?</strong>
      </h3>
      <div class="map-size">
        <iframe src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q={{$location??""}})&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="300" frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14769400.602770027!2d124.22677253246492!3d-25.34413266990207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2s!4v1602835958051!5m2!1sen!2s" width="100%" height="300" frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->              
      </div>
      <div class="div-box">
        <p class="para-color">{{$selected_location??""}}</p>
        <div class="col-md-4 col-sm-5 pl-0 form-size"><input type="number" name="fname" id="unitnumber" placeholder="Enter Unit Number" class="unit-number form-control blake-input input-border" /></div>
        <div class="btn-div">
          <input type="button" name="next" class="blake-btn blake-btn-gray  action-button  map-btn1 btn-size btn-radius unit_number" value="No Unit Number"  style="cursor: pointer;"  />
          <input type="button" name="next" class="blake-btn blake-btn-red  action-button my-next new-next map-btn1 btn-size btn-radius unit_number" value="Submit"  style="cursor: pointer;"  />
        </div>
      </div>
    </div>
  </div>
  <!-- PAGE-3-END -->
</div>