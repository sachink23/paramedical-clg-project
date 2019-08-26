<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<section id="study-center-section">
    <div class="container">
        <h2 class="text-uppercase text-center">नवीन स्टडी सेंटर करिता संलग्नता फॉर्म</h2><br/>
        <div style="width:100%" class="text-center"><button data-backdrop="static" data-keyboard="false"  type="button" data-toggle="modal" data-target="#info_affiliation" class="btn btn-lg btn-info" >सूचना / नियम / अटी वाचा  </button></div>
        <hr/>
        <form id="affiliation_form_id" class="" action="javascript:void(0)" onsubmit="submitAffiliationForm()" enctype="multipart/form-data">
            <div id="" class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                  <label for="nameOfIns">संस्थेचे नाव</label>
                  <input type="text" placeholder="संस्थेचे नाव" class="form-control" name="nameOfIns" id="nameOfIns" required="">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                  <label for="nameOfPres">संस्थेचे अध्यक्ष</label>
                  <input type="text" placeholder="संस्थेचे अध्यक्ष" class="form-control" name="nameOfPres" id="nameOfPres" required="">
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                  <label for="regNo">संस्था नोंदणी क्रमांक</label>
                  <input type="text" placeholder="संस्था नोंदणी क्रमांक" class="form-control" name="regNo" id="regNo" required="">
                </div>
                
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                  <label for="regDate">नोंदणीची तारीख</label>
                  <input type="date" placeholder="नोंदणीची तारीख" class="form-control" name="regDate" id="regDate" required="">
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                  <label for="mob1">दूरध्वनी क्रमांक 1</label>
                  <input type="number" placeholder="दूरध्वनी क्रमांक 1" class="form-control" name="mob1" id="mob1" required="">
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                  <label for="mob2">दूरध्वनी क्रमांक 2</label>
                  <input type="number" placeholder="दूरध्वनी क्रमांक 2" class="form-control" name="mob2" id="mob2" required="">
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                  <label for="email">ईमेल आयडी</label>
                  <input type="email" placeholder="ईमेल आयडी" class="form-control" name="email" id="email" required="">
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                  <label for="website">वेबसाईट पत्ता(असल्यास)</label>
                  <input type="email" placeholder="वेबसाईट पत्ता(असल्यास)" class="form-control" name="website" id="website">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                  <label for="address">संस्थेचा पूर्ण पत्ता</label>
                  <textarea placeholder="संस्थेचा पूर्ण पत्ता" class="form-control" name="address" id="address" required=""></textarea>
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="">संस्थेकडील इमारत</label>
                  <div class="form-check">
                    <label class="">
                      <input type="radio" name="locationInfo" id="locationInfo">&nbsp;संस्थेच्या मालकीची 
                     </label>
                    <label class="">
                      <input type="radio" name="locationInfo" id="locationInfo1" required>&nbsp;किरायाने घेतलेली
                    </label>
                  </div>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-12">
                  <label for="">संस्थेकडील कर्मचारी</label>
                  <div class="form-check">
                    <label class="">
                      <input type="radio" name="employeeType" id="employeeType">&nbsp;नियमित आहेत
                     </label>
                    <label class="">
                      <input type="radio" name="employeeType" id="employeeType1" required>&nbsp;कंत्राटी आहेत
                    </label>
                  </div>
                </div>
                <div class="form-group col-lg-3 col-md-5 col-sm-12">
                  <label for="nosOfEmployees">संस्थेकडे उपलब्ध कर्मचारी संख्या</label>
                  <input type="number" placeholder="उपलब्ध कर्मचारी संख्या" class="form-control" required="" name="nosOfEmployees" id="nosOfEmployees">
                </div>
                <div class="form-group col-lg-3 col-md-4 col-sm-12">
                  <label for="">संस्थेकडे संगणक आणि इंटरनेट सुविधा</label>
                  <div class="form-check">
                    <label class="">
                      <input type="radio" name="areCompsAvlbl" id="areCompsAvlbl">&nbsp; आहे
                     </label>
                    <label class="">
                      <input type="radio" name="areCompsAvlbl" id="areCompsAvlbl1" required>&nbsp;नाही
                    </label>
                  </div>
                </div>
                <div class="form-group col-lg-2 col-md-3 col-sm-12">
                  <label for="">संस्थेकडे वाचनालय सुविधा </label>
                  <div class="form-check">
                    <label class="">
                      <input type="radio" name="isLibraryAvlbl" id="isLibraryAvlbl">&nbsp; आहे
                     </label>
                    <label class="">
                      <input type="radio" name="isLibraryAvlbl" id="isLibraryAvlbl1" required>&nbsp;नाही
                    </label>
                  </div>
                </div>
                <div class="form-group col-lg-3 col-md-5 col-sm-12">
                  <label for="nosOfBooks">असल्यास एकूण किती पुस्तके उपलब्ध आहेत</label>
                  <input type="number" placeholder="उपलब्ध पुस्तकांची संख्या" class="form-control" name="nosOfBooks" id="nosOfBooks">
                </div>
                <div class="form-group col-lg-7 col-md-12 col-sm-12">
                      <label for="otherActivities">संस्थचे इतर शैक्षणिक उपक्रम चालू आहते काय ?</label>
                      <textarea class="form-control" name="otherActivities" maxlength="200" placeholder="उपक्रम चालू असल्यास त्याबद्दल लिहावे किंवा नसल्यास रिकामे सोडा" id="otherActivities" rows="2"></textarea>
                </div>
                <div class="form-group col-12">
                  <label>संस्थेच्या दोन पदाधिकाऱ्यांची माहिती</label>
                </div>
                <div class="form-group col-4 col-xl-2 col-md-2 col-lg-2">
                  <label for="salutation1">1)</label>
                  <select required class="form-control" name="salutation1" id="salutation1">
                    <option value="">निवडा</option>
                    <option value="1">श्री</option>
                    <option value="2">श्रीमती</option>
                  </select>
                </div> 
                <div class="form-group col-8 col-xl-10 col-md-10 col-lg-10">
                    <label for="name1">नाव</label>
                    <input type="text"
                      class="form-control" name="name1" id="name1" placeholder="नाव" required="">
                </div>
                <div class="form-group col-4 col-xl-2 col-md-2 col-lg-2">
                  <label for="salutation2">2)</label>
                  <select required class="form-control" name="salutation2" id="salutation2">
                    <option value="">निवडा</option>
                    <option value="1">श्री</option>
                    <option value="2">श्रीमती</option>
                  </select>
                </div> 
                <div class="form-group col-8 col-xl-10 col-md-10 col-lg-10">
                    <label for="name2">नाव</label>
                    <input type="text"
                      class="form-control" name="name2" id="name2" placeholder="नाव" required="">
                </div>
                <div class="form-group col-12">
                  <label>संस्थेने सलंग्नता अर्ज सादर करताना खालील कागदपत्रांच्या छायांकित प्रती जोडणे आवश्यक आहे. जी कागदपत्रे जोडली आहेत त्यासमोरील आहे / नाही वर क्लीक / टच करा. </label>
                  <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                      1) संस्थेचे नोंदणी प्रमाणपत्र
                      <span class="ml-3">
                        <input type="radio" name="regedCert" id="regedCertY">&nbsp;आहे &nbsp;&nbsp;  
                        <input type="radio" name="regedCert" id="regedCertN" required="">&nbsp;नाही  &nbsp;&nbsp;
                      </span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      2) संस्थचे पॅन कार्ड / टॅन कार्ड
                      <span class="ml-3">
                        <input type="radio" name="pan" id="panY">&nbsp;आहे &nbsp;&nbsp;  
                        <input type="radio" name="pan" id="panN" required="">&nbsp;नाही  &nbsp;&nbsp;
                      </span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      3) अध्यक्ष / सचिव यांची ओळखपत्रे आधार कार्ड / पॅन कार्ड  
                      <span class="ml-3">
                        <input type="radio" name="Opan" id="OpanY">&nbsp;आहे &nbsp;&nbsp;  
                        <input type="radio" name="Opan" id="OpanN" required="">&nbsp;नाही  &nbsp;&nbsp;
                      </span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      4) इमारत असल्याबाबत चे प्रमाणपत्र ८ अ / घरपट्टी पावती 
                      <span class="ml-3">
                        <input type="radio" name="buildingProof" id="buildingProofY">&nbsp;आहे &nbsp;&nbsp;  
                        <input type="radio" name="buildingProof" id="buildingProofN" required="">&nbsp;नाही  &nbsp;&nbsp;
                      </span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      5) 24 तास वीजपुरवठा आहे काय ? वीजबिल प्रत ?
                      <span class="ml-3">
                        <input type="radio" name="elect" id="electY">&nbsp;आहे &nbsp;&nbsp;  
                        <input type="radio" name="elect" id="electN" required="">&nbsp;नाही  &nbsp;&nbsp;
                      </span>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      6) संस्थेचे नियमित लेखापरीक्षण रिपोर्ट ? 
                      <span class="ml-3">
                        <input type="radio" name="report" id="reportY">&nbsp;आहे &nbsp;&nbsp;  
                        <input type="radio" name="report" id="reportN" required="">&nbsp;नाही  &nbsp;&nbsp;
                      </span>
                    </li>
                  </ul>
                </div>
                <div class="form-group col-12">
                  <label>
                  1) अर्जामधील माहिती पूर्णपणे सत्य भरणे आवश्यक आहे, यामध्ये काही असत्य आढळून आल्यास स्टडी सेंटर ची मान्यता कोणत्याही पूर्वसूचनेशिवाय रद्द करण्याचे सर्व अधिकार आर्यवर्त पॅरामेडिकल, व्यावसायिक, स्वयंरोजगार शिक्षण मंडळ यांच्याकडे राखीव आहेत. 
                  <br /><br/>
                  2) तसेच कोणत्याही कारणाशिवाय स्टडी सेंटर नाकारण्याचे अथवा नामंजूर करण्याचे सर्व अधिकार आर्यवर्त पॅरामेडिकल, व्यावसायिक, स्वयंरोजगार शिक्षण मंडळ यांच्याकडे राखीव आहेत.
                  </label>
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="" id="tosCheck" required=""> मला वरील अटी मान्य आहेत
                    </label>
                  </div>
                </div>
                <div class="col-12 text-right">
                  <button type="reset" class="btn btn-danger">Reset</button>&nbsp;
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>                

            </div>
            
        </form>
    </div>

</section>
<div class="modal fade" id="info_affiliation" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> अर्ज भरण्याआधी खालील सूचना / नियम / अटी काळजीपूर्वक वाचा</h5>
       
      </div>
      <div class="modal-body">
        <ol class="list-group">
          <li class="list-group-item d-flex align-items-center">                 
          अर्जामधील सर्व माहिती भरणे आवश्यक आहे
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
          अर्जामधील माहिती पूर्णपणे सत्य भरणे आवश्यक आहे, यामध्ये काही असत्य आढळून आल्यास स्टडी सेंटर ची मान्यता कोणत्याही पूर्वसूचनेशिवाय रद्द करण्याचे सर्व अधिकार आर्यवर्त पॅरामेडिकल, व्यावसायिक, स्वयंरोजगार शिक्षण मंडळ यांच्याकडे राखीव आहेत. 
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
          तसेच कोणत्याही कारणाशिवाय स्टडी सेंटर नाकारण्याचे अथवा नामंजूर करण्याचे सर्व अधिकार आर्यवर्त पॅरामेडिकल, व्यावसायिक, स्वयंरोजगार शिक्षण मंडळ यांच्याकडे राखीव आहेत. 
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
          आम्ही वेबसाईटच्या सुरक्षेकरीता तुमच्या IP address ची नोंद ठेवतो.   
          </li>
        </ol>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">मला सर्व अटी मान्य आहेत</button>
      </div>
    </div>
  </div>
</div>
<script src="<?=webCdn ?>/js/xhr.min.js"></script>
<script src="<?=webCdn ?>/js/affiliation.min.js"></script>
