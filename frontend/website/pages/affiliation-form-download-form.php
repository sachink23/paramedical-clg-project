<section id="affiliation-form-download-form">
    <div class="container">
        <form class="row" method="get" action="/online-affiliation/download/">
            <div class="col-sm-12 col-md-4 form-group">
              <label for="id">Affiliation Request Id</label>
              <input type="number" required=""
                class="form-control" name="id" id="id" aria-describedby="idHelp" placeholder="Enter your Affiliation Request Id">
              <small id="idHelp" class="form-text text-muted">Affiliation Request Id is generated when you submit the form</small>
            </div>
            <div class="col-sm-12 col-md-4 form-group">
              <label for="mob">Mobile Number</label>
              <input type="number" placeholder="Enter Mobile Number" required=""
                class="form-control" name="mob" id="mob" aria-describedby="mobHelp">
              <small id="mobHelp" class="form-text text-muted">Enter mobile number filled in application form</small>
            </div>
            <div class="form-group col-sm-12 col-md-4"> <br/>
                <button type="submit" class="btn btn-primary">Download Form</button>
            </div>
        </form>
    </div>
</section>