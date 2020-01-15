<template>
  <div class="container">
    <!-- <not-found></not-found> -->
    <h1
      style="margin-top:40px !important; font-size:1.55rem !important; margin-left: 0px !important; font-weight: bolder;"
    >Explore Great Places</h1>

    <form class="form-inline my-2 my-lg-0">
      <input
        class="form-control mr-sm-2"
        type="search"
        placeholder="Search"
        v-model="search"
        @keyup.prevent="searchProperties()"
        aria-label="Search"
      />
<!--      <button class="btn btn-outline-success my-2 my-sm-0" @click.prevent="searchProperties">Search</button>-->
    </form>

    <div v-for="randompropertieslist in groupedProperties" class="row">
      <div
        class="col-md-4"
        v-for="randomproperty in randompropertieslist"
        :key="randompropertieslist.id"
      >
        <div class="card mt-3" style="margin-left: 5px; margin-right: 5px;">
          <img
            :src="'/img/property/' + randomproperty.photo"
            class="card-img-top lazyload img-responsive"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title">{{randomproperty.name}}</h5>
            <p
              class="card-text"
              style="margin-bottom: 0.2rem; !important;"
            >${{randomproperty.price}}/night</p>
            <div style="overflow: hidden;">
              <a href="#" class="card-text" style="float: left !important;">
                <small class="text-muted">Click to see more..</small>
              </a>
              <img
                height="25"
                width="25"
                :src="'/img/profile/' + randomproperty.user.photo"
                style="float: right;border: 1px solid white;border-radius:50%"
                alt
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {debounce} from "lodash";

export default {
  data() {
    return {
      search: "",
      randompropertieslist: {}
    };
  },
  methods: {
    randomProperties() {
      let limit = 9;
      axios
        .get(`api/loadrandom/${limit}`)
        .then(({ data }) => {
          this.randompropertieslist = data.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    searchProperties:
          debounce(() => {
            Fire.$emit("searching");
            console.log("searching..");
      }, 2000)

      // Fire.$emit("searching");

  },
  mounted() {},
  created() {
    Fire.$on("searching", () => {
      // send http request to server
      let query = this.search;
      axios
        .get("api/findproperty?q=" + query).then(({ data }) => {
                this.randompropertieslist = data.data;
              })
        .catch(() => {});
    });
    this.$Progress.start();
    this.randomProperties();
    this.$Progress.finish();
  },
  computed: {
    groupedProperties() {
      return _.chunk(this.randompropertieslist, 3);
      // returns a nested array:
      // [[article, article, article], [article, article, article], ...]
    }
  }
};
</script>