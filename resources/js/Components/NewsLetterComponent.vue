<template>
  <section class="newsletter-section">
    <div class="container">
      <div class="newsletter-sec">
        <div class="row align-items-center">
          <div class="col-lg-4">
            <div class="newsz-ltr-text">
              <h2>Subscribe to<br />our Newsletter!</h2>
            </div>
          </div>

          <div class="col-lg-8">
            <form class="newsletter-form">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" name="name" placeholder="Name" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <input
                      type="email"
                      name="email"
                      placeholder="Email Address"
                    />
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <textarea name="body" placeholder="Message"></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <a href="#" title="" class="btn-default" style="float: right"
                    >Subscribe <i class="fa fa-long-arrow-alt-right"></i
                  ></a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      //
    };
  },
};
</script>
