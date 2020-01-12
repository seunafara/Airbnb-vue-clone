<template>
  <div class="container">


        <!-- <not-found></not-found> -->
      <div>
        <h1 style="margin-top:40px !important; font-size:1.45rem !important; margin-left: 5px !important;">Popular Places in Lagos</h1>

        <content-loader v-if="!myData"
                        :height="130"
                        :width="430"
                        :speed="2"
                        id="loader-pc"
                        primaryColor="#ea4335"
                        secondaryColor="#ecebeb"
        >
          <rect x="10" y="11.54" rx="0" ry="0" width="0" height="0" />
          <rect x="9.59" y="5.67" rx="0" ry="0" width="100.79" height="72" />
          <rect x="119.61" y="5.67" rx="0" ry="0" width="100.79" height="72" />
          <rect x="230.63" y="5.67" rx="0" ry="0" width="100.79" height="72" />
          <rect x="339.65" y="5.67" rx="0" ry="0" width="100.79" height="72" />
          <rect x="9.75" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
          <rect x="119.89" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
          <rect x="230.89" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
          <rect x="339.89" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
        </content-loader>

        <content-loader
                v-if="!myData"
                :height="530"
                :width="430"
                :speed="2"
                id="loader-mobile"
                primaryColor="#ea4335"
                secondaryColor="#ecebeb"
        >
          <rect x="10" y="11.54" rx="0" ry="0" width="0" height="0" />
          <rect x="29.59" y="8.67" rx="0" ry="0" width="361.19" height="109.47" />
          <rect x="29.59" y="125.67" rx="0" ry="0" width="361.19" height="109.47" />
          <rect x="29.59" y="243.67" rx="0" ry="0" width="361.19" height="109.47" />
          <rect x="29.59" y="360.67" rx="0" ry="0" width="361.19" height="109.47" />
        </content-loader>


        <div v-else class="my-real-content card-group">

          <div class="card mt-3" style="margin-left: 5px; margin-right: 5px" v-for="lagosproperty in lagosproperties" :key="lagosproperties.id">
            <img :src="'/img/property/' + lagosproperty.photo" class="card-img-top lazyload img-responsive" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{lagosproperty.name}}</h5>
              <p class="card-text" style="margin-bottom: 0.2rem; !important;">${{lagosproperty.price}}/night</p>
              <div style="overflow: hidden;">
                <a href="#" class="card-text" style="float: left !important;"><small class="text-muted">Click to see more..</small></a>
                <img height="25" width="25" :src="'/img/profile/' + lagosproperty.user.photo" style="float: right;border: 1px solid white;border-radius:50%" alt="">
                <!--              <p style="float: right;">{{ property.user.name}}</p>-->

              </div>


            </div>
          </div>

        </div>


        <button class="btn btn-primary" style="margin-top:15px !important; margin-left:5px !important">See all in Lagos</button>
        </div>



      <!-- Recently Added -->

      <h1 style="margin-top:40px !important; font-size:1.45rem !important; margin-left: 5px !important;">Recently Added Places</h1>

    <content-loader v-if="!myData"
                    :height="130"
                    :width="430"
                    :speed="2"
                    id="loader-pc"
                    primaryColor="#ea4335"
                    secondaryColor="#ecebeb"
    >
      <rect x="10" y="11.54" rx="0" ry="0" width="0" height="0" />
      <rect x="9.59" y="5.67" rx="0" ry="0" width="100.79" height="72" />
      <rect x="119.61" y="5.67" rx="0" ry="0" width="100.79" height="72" />
      <rect x="230.63" y="5.67" rx="0" ry="0" width="100.79" height="72" />
      <rect x="339.65" y="5.67" rx="0" ry="0" width="100.79" height="72" />
      <rect x="9.75" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
      <rect x="119.89" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
      <rect x="230.89" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
      <rect x="339.89" y="79.67" rx="0" ry="0" width="100.79" height="41.76" />
    </content-loader>

    <content-loader
            v-if="!myData"
            :height="530"
            :width="430"
            :speed="2"
            id="loader-mobile"
            primaryColor="#ea4335"
            secondaryColor="#ecebeb"
    >
      <rect x="10" y="11.54" rx="0" ry="0" width="0" height="0" />
      <rect x="29.59" y="8.67" rx="0" ry="0" width="361.19" height="109.47" />
      <rect x="29.59" y="125.67" rx="0" ry="0" width="361.19" height="109.47" />
      <rect x="29.59" y="243.67" rx="0" ry="0" width="361.19" height="109.47" />
      <rect x="29.59" y="360.67" rx="0" ry="0" width="361.19" height="109.47" />
    </content-loader>

      <div v-else class="my-real-content card-group">

        <div class="card mt-3" style="margin-left: 5px; margin-right: 5px" v-for="property in properties" :key="properties.id">

          <img :src="'/img/property/' + property.photo" class="card-img-top lazyload img-responsive" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{property.name}}</h5>
            <p class="card-text" style="margin-bottom: 0.2rem; !important;">${{property.price}}/night</p>


            <div style="overflow: hidden;">
              <a href="#" class="card-text" style="float: left !important;"><small class="text-muted">Click to see more..</small></a>
              <img height="25" width="25" :src="'/img/profile/' + property.user.photo" style="float: right;border: 1px solid white;border-radius:50%" alt="">
<!--              <p style="float: right;">{{ property.user.name}}</p>-->

            </div>

          </div>
        </div>
      </div>

    <button class="btn btn-primary" style="margin-top:15px !important; margin-left:5px !important">See All Places</button>







    </div>




</template>

<script>
  let user       = '{{ $username->name }}';


  import { ContentLoader } from 'vue-content-loader';
export default {
  components: {
    ContentLoader
  },
  data(){

    return {
      myData: null,
      properties: {},
      lagosproperties: {},
      form: new Form({
        id: '',

        photo: '',
      })
    }
  },
  methods: {

    getPropertyProfilePhoto(){
      let photo =  "img/property/" +this.form.photo;
      return photo;
    },
    loadProperties(){
      this.$Progress.start();
      axios.get('api/property')
              .then(({data}) => {(this.properties = data.data); this.$Progress.finish();})
              .catch((err)=>{
        console.log(err)
      });
    },
    loadLagos(){
      axios.get('api/loadlagos').then(({data}) => {
        this.lagosproperties = data.data;
      })
    }

  },
  mounted() {
    setTimeout(() => {
      this.myData = 'Example Data';
    }, 5000);


    // let myDiv = $('.card-title');
    // myDiv.text(myDiv.text().substring(0,40))

  },
  created(){
    this.loadLagos();
    this.loadProperties();


  }

};
</script>