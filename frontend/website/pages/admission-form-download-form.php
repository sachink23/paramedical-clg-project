<section id="admission-form-download-form">
    <div class="container">
        <form class="row" method="get" action="/online-admissions/download/">
            <div class="col-sm-12 col-md-4 form-group">
              <label for="id">Admission Id</label>
              <input type="number" required=""
                class="form-control" name="id" id="id" aria-describedby="idHelp" placeholder="Enter your Admission Request Id">
              <small id="idHelp" class="form-text text-muted">Admission Request Id is generated when you submit the form</small>
            </div>
            <div class="col-sm-12 col-md-4 form-group">
              <label for="dob">Date of birth</label>
              <input type="date" required=""
                class="form-control" name="dob" id="dob" aria-describedby="dobHelp">
              <small id="dobHelp" class="form-text text-muted">Enter date of birth filled in admission form</small>
            </div>
            <div class="col-sm-12 col-md-4 form-group">
              <label for="mob">Date of birth</label>
              <input type="number" min="7000000000" max="9999999999" placeholder="Enter Mobile Number" required=""
                class="form-control" name="mob" id="mob" aria-describedby="mobHelp">
              <small id="mobHelp" class="form-text text-muted">Enter parent's or students mobile number filled in application form</small>
            </div>
            <div class="form-group col-12 text-right">
                <button type="submit" class="btn btn-primary-outline">Download Form</button>
            </div>
        </form>
    </div>
</section>