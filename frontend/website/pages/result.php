<section id="results">
  <div class="container">
    <h2 class="text-uppercase text-center">Results</h2>
    <hr />
    <form class="row" action="javascript:void(0)" onsubmit="res.getResult()">
      <div class="col-lg-4 col-md-4 col-sm-12 form-group">
        <label for="selectExam">Select Examination</label>
        <select class="form-control" name="selectExam" id="selectExam" aria-describedby="selectExamHelp" required>
          
        </select>
        <small id="selectExamHelp" class="text-muted"></small>
      </div>
      <div class="form-group col-lg-4 col-md-4 col-sm-12 ">
        <label for="rollNo">Roll Number</label>
        <input pattern="[a-zA-Z0-9]+" type="text" name="rollNo" id="rollNo" class="form-control" placeholder="Enter Roll No" aria-describedby="rollNoHelp" required>
        <small id="rollNoHelp" class="text-muted"></small>
      </div>
      <div class="form-group col-lg-4 col-md-4 col-sm-12 ">
        <label for="date">Roll Number</label>
        <input type="date" name="date" id="date" class="form-control" placeholder="Enter DOB" aria-describedby="dateHelp" required> 
        <small id="dateHelp" class="text-muted"></small>
      </div>
      <div id="displayResultLink" class="form-group col-12">
      
      </div>
      <div class="form-group col-12">
        <button type="submit" id="viewResBtn" class="btn btn-primary" style="float: right">View Result</button>
      </div>
      <div id="displayResult" class="form-group col-12">
          
      </div>
      
    </form>
  </div>
</section>
<script src="<?=webCdn ?>/js/xhr.min.js"></script>
<script src="<?=webCdn ?>/js/results.min.js"></script>
<script>
   res.getExams(res.getExamsInSelect,['selectExam','selectExam']);
</script>