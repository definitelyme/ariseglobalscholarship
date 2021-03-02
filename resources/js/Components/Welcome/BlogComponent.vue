<template>
  <section class="blog-section">
    <div class="container">
      <div class="section-title text-center">
        <h2>Recent News</h2>
        <p>
          Nam mattis felis id sodales rutrum. Nulla ornare tristique mauris, a
          laoreet erat ornare sit amet. Nulla sagittis faucibus lacusMorbi lorem
          sem, aliquet
        </p>
      </div>
      <!--section-title end-->
      <div class="blog-posts">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="blog-post">
              <div class="blog-thumbnail">
                <img :src="`${asset_url}/blog1.jpg`" alt="" class="w-100" />
                <span class="category">English</span>
              </div>
              <div class="blog-info">
                <ul class="meta">
                  <li><a href="#" title="">17/09/2020</a></li>
                  <li><a href="#" title="">by Admin</a></li>
                  <li>
                    <img :src="`${asset_url}/icon13.png`" alt="" /><a
                      href="#"
                      title=""
                      >Teachers,</a
                    ><a href="#" title=""> School</a>
                  </li>
                </ul>
                <h3>
                  <a href="post.html" title="">Campus clean workshop</a>
                </h3>
                <p>
                  Nam mattis felis id sodales rutrum. Nulla ornare tristique
                  mauris, a laoreet erat ornare sit amet
                </p>
                <a href="post.html" title="" class="read-more"
                  >Read <i class="fa fa-long-arrow-alt-right"></i
                ></a>
              </div>
            </div>
            <!--blog-post end-->
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="blog-post">
              <div class="blog-thumbnail">
                <img :src="`${asset_url}/blog2.jpg`" alt="" class="w-100" />
                <span class="category">English</span>
              </div>
              <div class="blog-info">
                <ul class="meta">
                  <li><a href="#" title="">17/09/2020</a></li>
                  <li><a href="#" title="">by Admin</a></li>
                  <li>
                    <img :src="`${asset_url}/icon13.png`" alt="" /><a
                      href="#"
                      title=""
                      >Teachers,</a
                    ><a href="#" title=""> School</a>
                  </li>
                </ul>
                <h3>
                  <a href="post.html" title="">Campus clean workshop</a>
                </h3>
                <p>
                  Nam mattis felis id sodales rutrum. Nulla ornare tristique
                  mauris, a laoreet erat ornare sit amet
                </p>
                <a href="post.html" title="" class="read-more"
                  >Read <i class="fa fa-long-arrow-alt-right"></i
                ></a>
              </div>
            </div>
            <!--blog-post end-->
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="blog-post">
              <div class="blog-thumbnail">
                <img :src="`${asset_url}/blog3.jpg`" alt="" class="w-100" />
                <span class="category">English</span>
              </div>
              <div class="blog-info">
                <ul class="meta">
                  <li><a href="#" title="">17/09/2020</a></li>
                  <li><a href="#" title="">by Admin</a></li>
                  <li>
                    <img :src="`${asset_url}/icon13.png`" alt="" /><a
                      href="#"
                      title=""
                      >Teachers,</a
                    ><a href="#" title=""> School</a>
                  </li>
                </ul>
                <h3>
                  <a href="post.html" title="">Campus clean workshop</a>
                </h3>
                <p>
                  Nam mattis felis id sodales rutrum. Nulla ornare tristique
                  mauris, a laoreet erat ornare sit amet
                </p>
                <a href="post.html" title="" class="read-more"
                  >Read <i class="fa fa-long-arrow-alt-right"></i
                ></a>
              </div>
            </div>
            <!--blog-post end-->
          </div>
        </div>
      </div>
      <!--blog-posts end-->
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
