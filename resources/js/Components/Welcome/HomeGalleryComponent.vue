<template>
  <section class="about-us-section" style="padding-top: 0px">
    <div class="section-title text-center">
      <h2>Gallery</h2>

      <div class="abt-img" style="padding-top: 20px">
        <ul class="masonary">
          <!-- <li class="width1 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${$asset_url}/gallery1.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${$asset_url}/gallery1.jpg`" alt=""
            /></a>
          </li> -->

          <li
            class="width1 wow zoomIn"
            data-wow-duration="1000ms"
            v-for="(img, index) in images"
            :key="index"
          >
            <a :href="img.src" data-group="set1" title="" class="html5lightbox"
              ><img :src="img.src" alt=""
            /></a>
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      images: [
        {
          src: this.$asset_url + "/gallery1.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery7.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery4.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery3.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery9.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery2.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery6.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery8.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery5.jpg",
          name: "Gallery 1",
        },
        {
          src: this.$asset_url + "/gallery10.jpg",
          name: "Gallery 10",
        },
      ],
    };
  },
};
</script>
