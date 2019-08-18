<section id="results">
  <div class="container">
    <h2 class="text-uppercase text-center">Online Admission Form</h2><br/>
    <div style="width:100%" class="text-center"><button type="button" data-toggle="modal" data-target="#info_admission" class="btn btn-lg btn-info" >Read Instructions</button></div>
    <hr />
    <form class="" action="javascript:void(0)" onsubmit="submitAdmissionForm()">
        <fieldset class="container the-fieldset">
          <legend class="the-legend">Admission Details</legend>
          <div class="row">
            <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-12">
              <label for="instituteDetails">Details of the institution where you want to get admission <big class="text-danger">*</big></label>
              <textarea class="form-control" required name="instituteDetails" placeholder="Name, address and Mobile Number of institution" id="instituteDetails" rows="3"></textarea>
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="selectCourse">Select Course <big class="text-danger">*</big></label>
              <select class="form-control" name="selectCourse" id="selectCourse" required="">
                
              </select>
            </div>
          </div>
        </fieldset>
        <fieldset class="container the-fieldset">
          <legend class="the-legend">Personal Details</legend>
          <div class="row">
            <div class="form-group  col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="gender">Select Gender <big class="text-danger">*</big></label>
              <select class="form-control" name="gender" id="gender" required="">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="form-group col-xl-8 col-lg-8 col-md-8 col-sm-12">
              <label for="fullname">Candidates Name<big class="text-danger">*</big></label>
              <input type="text" maxlength="100"
                class="form-control" name="fullname" id="fullname" placeholder="As Per Your Marksheet" required="">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="DOB">Date Of Birth <big class="text-danger">*</big></label>
              <input type="DATE" min="1950-01-01" max="2019-12-31"
                class="form-control" name="DOB" id="DOB" required="">
            </div>
            
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="fathersname">Father's Name<big class="text-danger">*</big></label>
              <input type="text" maxlength="100"
                class="form-control" name="fathersname" id="fathersname" placeholder="Name Of Your Father" required="">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="fathersoccup">Father's Occupation<big class="text-danger">*</big></label>
              <input type="text" maxlength="100"
                class="form-control" name="fathersoccup" id="fathersoccup" placeholder="Father's Occupation" required="">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="mothersname">Mother's Name<big class="text-danger">*</big></label>
              <input type="text" maxlength="100"
                class="form-control" name="mothersname" id="mothersname" placeholder="Name Of Your Mother" required="">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="mothersoccup">Mother's Occupation<big class="text-danger">*</big></label>
              <input type="text" maxlength="100"
                class="form-control" name="mothersoccup" id="mothersoccup" placeholder="Mother's Occupation" required="">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="photo">Select Photo<big class="text-danger">*</big></label>
              <input type="file" class="form-control-file" accept=".jpg, .jpeg. .png" name="photo" id="photo" required="">
            </div>
          </div>
        </fieldset>
        <fieldset class="container the-fieldset">
          <legend class="the-legend">Communication Details</legend>
          <div class="row">
            
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="mob1">Student's Mobile Number<big class="text-danger">*</big></label>
              <input type="number" min="7000000000" min="9999999999"
                class="form-control" name="mob1" id="mob1" placeholder="Mobile Number" required="">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="mob2">Parent's Mobile <big class="text-danger">*</big></label>
              <input type="number" min="7000000000" min="9999999999"
                class="form-control" name="mob2" id="mob2" placeholder="Mobile Number" required="">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-12">
              <label for="email">Email Address <big class="text-danger">*</big></label>
              <input type="email" required=""
                class="form-control" name="email" id="email" placeholder="username@example.com">
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <label for="localAdd">Local Address <big class="text-danger">*</big></label>
              <textarea required class="form-control" name="localAdd" id="localAdd" rows="3"></textarea>
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <label for="localAdd">Permanent Address (Leave blank if same as local address)</label>
              <textarea class="form-control" name="localAdd" id="localAdd" rows="3"></textarea>
            </div>
          </div>
        </fieldset>
        <fieldset class="container the-fieldset">
            <legend class="the-legend">Educational Qualifications</legend>
            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
              <label for="eduQual">Highest Educational Qualificaion <big class="text-danger">*</big></label>
              <select class="form-control" name="eduQual" id="eduQual" required="">
                <option value="">Select Education</option>
                <option value="7">7 TH</option>
                <option value="SSC FAIL">SSC FAIL</option>
                <option value="SSC PASS">SSC PASS</option>
                <option value="HSC FAIL">HSC FAIL</option>
                <option value="HSC PASS">HSC PASS</option>
                <option value="GRADUATE">GRADUATE</option>
                <option value="POST GRADUATE">POST GRADUATE</option>
                <option value="OTHER">OTHER</option>
              </select>
            </div>
            <div class="container">
              <p class="text-info">Click on this ( <input type="checkbox" disabled> ) Box in front of each details to add them</p>
            </div>
            <fieldset class="container the-fieldset" id="sscDetails">
              <legend class="the-legend">SSC Details &nbsp;&nbsp;<input type="checkbox" id="addSSCCheckBox"></legend> 
              <div class="row" id="sscDetailsForm" style="display:none">
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="isPaased_SSC">Passing Status</label>
                  <select class="form-control" name="isPaased_SSC" id="isPaased_SSC">
                    <option value="">Select</option>
                    <option value="1">Pass</option>
                    <option value="0">Fail</option>
                  </select>
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="passingMonth_SSC">Passing Year</label>
                  <input type="month" class="form-control" name="passingMonth_SSC" id="passingMonth_SSC">
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="passingPer_SSC">Percentage</label>
                  <input type="text" placeholder="Percentage (%)" class="form-control" name="passingPer_SSC" id="passingPer_SSC">
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="div_SSC">Class / Division</label>
                  <input type="text" placeholder="Ex : First Class" class="form-control" name="div_SSC" id="div_SSC">
                </div>
                <div class="form-group col-lg-6 col-md-8 col-sm-12">
                  <label for="col_SSC">School / College Name</label>
                  <input type="text" placeholder="School Name" class="form-control" name="col_SSC" id="col_SSC">
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label for="board_SSC">University / Board Name</label>
                  <input type="text" placeholder="Ex - Maharashtra State Board Of Secondary And Higher Secondary Education" class="form-control" name="board_SSC" id="board_SSC">
                </div>
              </div>
            </fieldset>
            <fieldset class="container the-fieldset" id="hscDetails"> 
              <legend class="the-legend">HSC Details &nbsp;&nbsp;<input type="checkbox" id="addHSCCheckBox"></legend> 
              <div class="row" id="hscDetailsForm" style="display:none">
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="isPaased_HSC">Passing Status</label>
                  <select class="form-control" name="isPaased_HSC" id="isPaased_HSC">
                    <option value="">Select</option>
                    <option value="1">Pass</option>
                    <option value="0">Fail</option>
                  </select>
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="passingMonth_HSC">Passing Year</label>
                  <input type="month" class="form-control" name="passingMonth_HSC" id="passingMonth_HSC">
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="passingPer_HSC">Percentage</label>
                  <input type="text" placeholder="Percentage (%)" class="form-control" name="passingPer_HSC" id="passingPer_HSC">
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="div_HSC">Class / Division</label>
                  <input type="text" placeholder="Ex : First Class" class="form-control" name="div_HSC" id="div_HSC">
                </div>
                <div class="form-group col-lg-6 col-md-8 col-sm-12">
                  <label for="col_HSC">School / College Name</label>
                  <input type="text" placeholder="School Name" class="form-control" name="col_HSC" id="col_HSC">
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label for="board_HSC">University / Board Name</label>
                  <input type="text" placeholder="Ex - Maharashtra State Board Of Secondary And Higher Secondary Education" class="form-control" name="board_HSC" id="board_HSC">
                </div>
              </div>
            </fieldset>
            <fieldset class="container the-fieldset" id="graduateDetails" > 
              <legend class="the-legend" >Graduation Details &nbsp;&nbsp;<input type="checkbox" id="addGraduationCheckBox"></legend>
              <div class="row" id="graduateDetailsForm" style="display:none">
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="isPaased_GRADUATE">Passing Status</label>
                  <select class="form-control" name="isPaased_GRADUATE" id="isPaased_GRADUATE">
                    <option value="">Select</option>
                    <option value="1">Pass</option>
                    <option value="0">Fail</option>
                  </select>
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="passingMonth_GRADUATE">Passing Year</label>
                  <input type="month" class="form-control" name="passingMonth_GRADUATE" id="passingMonth_GRADUATE">
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="passingPer_GRADUATE">Percentage</label>
                  <input type="text" placeholder="Percentage (%)" class="form-control" name="passingPer_GRADUATE" id="passingPer_GRADUATE">
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="div_GRADUATE">Class / Division</label>
                  <input type="text" placeholder="Ex : First Class" class="form-control" name="div_GRADUATE" id="div_GRADUATE">
                </div>
                <div class="form-group col-lg-6 col-md-8 col-sm-12">
                  <label for="col_GRADUATE">School / College Name</label>
                  <input type="text" placeholder="School Name" class="form-control" name="col_GRADUATE" id="col_GRADUATE">
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label for="board_GRADUATE">University / Board Name</label>
                  <input type="text" placeholder="Ex - Pune University" class="form-control" name="board_GRADUATE" id="board_GRADUATE">
                </div>
              </div>
            </fieldset>
            <fieldset class="container the-fieldset" id="otherDetails">
              <legend class="the-legend">Other Course Details &nbsp;&nbsp;<input type="checkbox" id="addOtherCourseCheckBox"></legend>
              <div id="otherDetailsForm" style="display:none">
                <div class="form-group">
                  <label for="otherCourseName">Course Name</label>
                  <input type="text" class="form-control" name="otherCourseName" id="otherCourseName" placeholder="Enter Course Name">
                </div>
                <div class="row">
                  <div class="form-group col-lg-3 col-md-4 col-sm-12">
                    <label for="isPaased_OTHER">Passing Status</label>
                    <select class="form-control" name="isPaased_OTHER" id="isPaased_OTHER">
                      <option value="">Select</option>
                      <option value="1">Pass</option>
                      <option value="0">Fail</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-3 col-md-4 col-sm-12">
                    <label for="passingMonth_OTHER">Passing Year</label>
                    <input type="month" class="form-control" name="passingMonth_OTHER" id="passingMonth_OTHER">
                  </div>
                  <div class="form-group col-lg-3 col-md-4 col-sm-12">
                    <label for="passingPer_OTHER">Percentage</label>
                    <input type="text" placeholder="Percentage (%)" class="form-control" name="passingPer_OTHER" id="passingPer_OTHER">
                  </div>
                  <div class="form-group col-lg-3 col-md-4 col-sm-12">
                    <label for="div_OTHER">Class / Division</label>
                    <input type="text" placeholder="Ex : First Class" class="form-control" name="div_OTHER" id="div_OTHER">
                  </div>
                  <div class="form-group col-lg-6 col-md-8 col-sm-12">
                    <label for="col_OTHER">School / College Name</label>
                    <input type="text" placeholder="School Name" class="form-control" name="col_OTHER" id="col_OTHER">
                  </div>
                  <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="board_OTHER">University / Board Name</label>
                    <input type="text" placeholder="Ex - Maharashtra State Board Of Secondary And Higher Secondary Education" class="form-control" name="board_OTHER" id="board_OTHER">
                  </div>
                </div>
              </div>
            </fieldset>   
        </fieldset>
        <fieldset class="container the-fieldset">
            <legend class="the-legend">Declaration</legend>

            <p class="text-bold"><input type="checkbox" id="iAgree"> Before clicking submit button I agree that I have read all the instructions and provided the true and correct information as per my knowledge, I am aware that providing the incorrect information will be responsible for cancellation of my admission.</p>
        </fieldset>
        <fieldset class="container text-right mt-3" >
            <button type="reset" class="btn btn-danger" id="reset_btn">Reset Form</button> &nbsp; &nbsp;
            <button type="submit" class="btn btn-primary" id="admission_sub_btn">Submit</button>
        </fieldset>
        
    </form> 
    
  </div>
</section>
<style>
  .the-fieldset {
    border: 1px solid #e0e0e0;
    padding: 10px;
    margin-bottom: 5px;
  }
  .the-legend {    
    border-style: none;
    border-width: 0;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
    width: auto;
    padding: 0 10px;
    border: 1px solid #e0e0e0;
    font-weight: bolder;
}
</style>
<!-- Modal -->
<div class="modal fade" id="info_admission" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Please Read Instructions Carefully Before Filling Admission Form.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <ol class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Fileds Marked with <big class="text-danger">* </big> Are Required.    
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Please fill the form correctly, and check each field before hitting submit button, once you submit the form you can't edit it.
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Please check the minimum quallification required course before taking admission to course on courses page.
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            This is just an admission request form, filling up this form does not guarantee the admission, admissions will be confirmed by admission authority of <?= appName ?>.  
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Providing wrong information will cancel your admission.
          </li>
          
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Upload the photograph in jpg, jpeg or png format only with maximum size of 1.5 MB.
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            We track IP of your computer for security purposes.
          </li>

        </ol>
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div-->
    </div>
  </div>
</div>
<script src="<?=webCdn ?>/js/admissions.min.js"></script>
<script src="<?=webCdn ?>/js/xhr.min.js"></script>
<script src="<?=webCdn ?>/js/results.min.js"></script>
<script>
   res.getCourses(res.getCoursesInSelect,['selectCourse','selectCourse']);
</script>
