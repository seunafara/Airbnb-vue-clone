<template>
    <div class="container">

        <div class="container-fluid">
            <div class="row my-3 mx-sm-3 my-sm-4">
                <!-- Blog Area-->
                <div class="col-md-8 p-3">
                    <div class="blog-box bg-white" style="box-shadow: 0 3px 4px rgba(0, 0, 0, 0.12), 0 1px 5px rgba(0, 0, 0, 0.2);">
                        <div class="blog-header" style="position: relative">
                            <img :src="'/img/property/' + property.photo" class="w-100 rounded-top" alt="">
                            <div style="position:absolute;width:120px;background-color:#ea4335;color:white;top:0;right:0;padding-left:7px;padding-top:7px;padding-bottom:2px;font-size:14px;z-index:5;"><p style="font-size: 15px">Price: <b>${{property.price}}</b><span style="font-size: 10px">/night</span></p></div>
                        </div>

                        <div class="blog-content rounded-bottom p-3 pt-sm-4 px-sm-5">

                            <div style="overflow: hidden;">

                                <p style="font-size: 15px;  text-align: center; display: inline-block;  vertical-align: middle; float: left !important; padding-top: 10px;"><strong>{{property.name}}</strong></p>
                                <a :href = "'mailto:' + property.email" class="btn btn-primary" style="float:right !important">Book Now</a>

                            </div>
                            <hr style="width: 65px !important">

<!--                            <div class="row date-social">-->
<!--                                <div class="col-sm-7 text-sm-left text-center ">-->
<!--                                    <h4 class="h4-responsive">-->
<!--                                        <i class="fa fa-facebook-square indigo-text" aria-hidden="true"></i>-->
<!--                                        <i class="fa fa-twitter-square blue-text" aria-hidden="true"></i>-->
<!--                                        <i class="fa fa-google-plus-square red-text" aria-hidden="true"></i>-->
<!--                                        <i class="fa fa-pinterest-square red-text" aria-hidden="true"></i>-->
<!--                                        <i class="fa fa-plus-square deep-orange-text" aria-hidden="true"></i>-->
<!--                                    </h4>-->
<!--                                </div>-->
<!--                                <div class="col-sm-5 text-sm-right text-center ">-->
<!--                                    <small class="">-->
<!--                                        <i class="fa fa-calendar" aria-hidden="true"></i> Dec 2, 2017-->
<!--                                    </small>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <hr>-->

                            <div class="article">
                                <p style="font-size:17px;">About this place</p>
                                <hr style="width: 15px !important">

                                <p style="font-size:15px;">{{property.description}}</p>




                            </div>

                            <div class="blog-footer p-3 text-right bg-white">

                                <h1 class="">
                                    <i class="fa fa-facebook-square indigo-text" aria-hidden="true"></i>
                                    <i class="fa fa-twitter-square blue-text" aria-hidden="true"></i>
                                    <i class="fa fa-google-plus-square red-text" aria-hidden="true"></i>
                                    <i class="fa fa-pinterest-square red-text" aria-hidden="true"></i>
                                    <i class="fa fa-plus-square deep-orange-text" aria-hidden="true"></i>
                                </h1>

                            </div>

                        </div>


                    </div>
                </div>

                <!-- Sidebar Area-->
                <div class="col-md-4 p-3 bg-white" style="margin-top: 15px !important;box-shadow: 0 3px 4px rgba(0, 0, 0, 0.12), 0 1px 5px rgba(0, 0, 0, 0.2); height: 100%;">


                    <div class="side-box rounded mb-3">
                        <h6 class="side-title m-0 py-3 text-left grey lighten-4 rounded"><strong>Recommended Places</strong></h6>

                        <hr class="m-0">
                        <div class="side-content">
                            <div class="list-group">

                                <div  class="border border-top-0 border-right-0 border-left-0" v-for="rand in sidebarProperties">

                                    <router-link :to="'/property/' + rand.id ">
                                        <a :href="'/property/' + rand.id"  @click="getNewProperty" >
                                    <div class="row p-2 p-lg-3">
                                        <div class="col-4">
                                            <img :src="'/img/property/' + rand.photo" class="w-100" alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6 class="h6-responsive mb-0"><strong>{{rand.name}}</strong></h6>
                                            <small class="text-muted">{{rand.created_at | myDate}}</small>

                                        </div>
                                    </div>
                                        </a>
                                    </router-link>
                                </div>






                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>



    </div>
</template>

<script>
    export default {
        data(){
          return {
              property: {},
              sidebarProperties: {}

          }
        },
        methods: {
            getNewProperty(){
                Fire.$emit('loadnew');

            },
            getPropertyById(){
                axios.get('../api/showproperty/'+this.$route.params.id).then(({data}) => {(this.property = data);});
            },
            loadRecommended(){
                let limit = 3;
                axios
                    .get(`../api/loadrandom/${limit}`)
                    .then(({ data }) => {
                        this.sidebarProperties = data.data;
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }

        },
        created(){
            // this.id=this.$route.params.id;
            this.getPropertyById();
            this.loadRecommended();

            Fire.$on('loadnew', () => {

                setTimeout(()=>{
                        this.$Progress.start();
                        this.getPropertyById();
                        this.loadRecommended();
                        this.$Progress.finish();
                    }

                    , 500);

            })
        },
        mounted() {
            this.getPropertyById();
            this.loadRecommended();


        }
    }
</script>
