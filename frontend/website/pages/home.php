<style>
.btn {
    white-space:normal !important;
    word-wrap: break-word; 
}
</style>
<section id="about" class="bg-primary text-white mb-0">
  <div class="container">
    <h2 class="text-uppercase text-center text-white">About</h2>
    <hr class="star-light mb-5" />
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <p class="lead">        
              
            <?= substr($bs['about_para_1'], 0, 438); ?>.... <a style='color:white; font-weight:bolder; text-decoration: underline' href='/about/'>Read More</a><br />
            <!--<?= $bs['about_para_2']; ?>-->        
        </p>
      </div>
    </div>
    <div class="text-center mt-4">
      <a class="btn btn-outline-light btn-xl" role="button" href="/about/"
        >Know More&nbsp;<span></span><i class="fa fa-chevron-right mr-2"></i
      ></a>
    </div>
  </div>
</section>
<div id="home" style="background: lightgray">
  <div class="container" style="padding-top:20px; padding-bottom: 20px;">
    <div class="card-group row">
      <div class="col-lg-6 col-md-12 col-sm-12" onclick="window.open('<?=webCdn ?>/img/about-us-img.jpg', '_blank');">
        <div class="card ml-1 mr-1 mb-4">
          <div class="card-body img-div">
            <img src="<?=webCdn ?>/img/about-us-img.jpg">
          </div>
        </div>
      </div>
    
      <div class="col-lg-6 col-md-12 col-sm-12" onclick="window.open('<?=webCdn ?>/img/banner.jpg', '_blank');">
        <div class="card ml-1 mr-1 mb-4">
          <div class="card-body img-div">
            <img src="<?=webCdn ?>/img/banner.jpg">
          </div>
        </div>
      </div>
    </div>
    <div class="card-group row">
      <div class="col-lg-8 col-md-12 col-sm-12" onclick="window.open('<?=webCdn ?>/img/news-img.jpg', '_blank');">
        <div class="card ml-1 mr-1 mb-4">
          <div class="card-body img-div">
            <h4 class="card-title text-center">News</h4>
            <hr />
            <img src="<?=webCdn ?>/img/news-img.jpg">
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card ml-1 mr-1 mb-4">
          <div class="card-body">
            <h4 class="card-title text-center">Useful Links</h4>
            <hr />
            <div class="row">
              <div class="col-6">
                <a class="button-a-links" href="/results/"
                  ><button
                    type="button"
                    class="btn btn-lg btn-block btn-custom-css"
                  >
                    Results
                  </button></a
                >
              </div>
              <div class="col-6">
                <a class="button-a-links" href="/downloads/"
                  ><button
                    type="button"
                    class="btn btn-lg btn-block btn-custom-css"
                  >
                    Downloads
                  </button></a
                >
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-6">
                <a class="button-a-links" href="/courses/"
                  ><button
                    type="button"
                    class="btn btn-lg btn-block btn-custom-css"
                  >
                    Courses
                  </button></a
                >
              </div>
              <div class="col-6">
                <a class="button-a-links" href="/circulars/"
                  ><button
                    type="button"
                    class="btn btn-lg btn-block btn-custom-css"
                  >
                    Circulars
                  </button></a
                >
              </div>
            </div>
            <br />
            <div class="row">
              <a class="button-a-links" href="/online-admissions/" style="width:100%"
                ><button
                  type="button"
                  class="btn btn-lg btn-block btn-custom-css-lg"
                >
                  Online Admission
                </button></a
              >
            </div>
            <div class="row mt-3">
              <a class="button-a-links" href="/study-center-form/" style="width:100%"
                ><button
                  type="button"
                  class="btn btn-lg btn-block btn-custom-css-lg"
                >
                  Online Affiliation For Study Center
                </button></a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
