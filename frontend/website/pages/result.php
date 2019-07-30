<section id="results">
  <div class="container">
    <h2 class="text-uppercase text-center">Results</h2>
    <hr />
    <form class="row" action="">
      <div class="col-lg-4 col-md-4 col-sm-3 form-group">
        <label for="">Select Examination</label>
        <select class="form-control" name="selectExam" id="selectExam" aria-describedby="selectExamHelp">
          <option value="" selected>Select Exam</option>
          <option>2018 Summer</option>
          <option>2018 Winter</option>
          <option>2019 Summer</option>
        </select>
        <small id="selectExamHelp" class="text-muted"></small>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-3 form-group">
        <label for="">Select Class</label>
        <select class="form-control" name="selectClass" id="selectClass" aria-describedby="selectClassHelp">
          <option value="" selected>Select Class</option>
          <option>Class 1</option>
          <option>Class 2</option>
          <option>Class 3</option>
        </select>
        <small id="selectClassHelp" class="text-muted"></small>
      </div>
      <div class="form-group col-lg-4 col-md-4 col-sm-3 ">
        <label for="rollNo">Roll Number</label>
        <input type="text" name="rollNo" id="rollNo" class="form-control" placeholder="Enter Roll No" aria-describedby="rollNoHelp">
        <small id="rollNoHelp" class="text-muted"></small>
      </div>
      <div class="form-group col-12">
        <button type="submit" class="btn btn-primary" style="float: right">View Result</button>
      </div>
    </form>
  </div>
</section>
