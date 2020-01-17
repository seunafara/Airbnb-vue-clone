<template>
  <div class="container">
    <!-- <not-found></not-found> -->
    <h1
      style="margin-top:40px !important; font-size:1.55rem !important; margin-left: 0px !important; font-weight: bolder;"
    >Lagos Places</h1>

    <form class="form-inline my-2 my-lg-0" @submit.prevent="">
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

    <div v-for="lagosproperties in groupedProperties" class="row">
      <div
        class="col-md-4"
        v-for="lagos in lagosproperties"
        :key="lagosproperties.id"
      >
        <div class="card mt-3" style="margin-left: 5px; margin-right: 5px;">
          <img
            :src="'/img/property/' + lagos.photo"
            class="card-img-top lazyload img-responsive"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title">{{lagos.name}}</h5>
            <p
              class="card-text"
              style="margin-bottom: 0.2rem; !important;"
            >${{lagos.price}}/night</p>
            <div style="overflow: hidden;">
              <router-link :to="'/property/' + lagos.id " style="float: left !important;">
                <small style="color: blue;">Click to see more..</small>
              </router-link>
              <img
                height="25"
                width="25"
                :src="'/img/profile/' + lagos.user.photo"
                style="float: right;border: 1px solid white;border-radius:50%"
                alt
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav aria-label="Page navigation example" class="mt-5">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="randomProperties(pagination.prev_page_url)">Previous</a></li>
        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{pagination.from}} of {{pagination.last}}</a></li>
        <li class="page-item"><a class="page-link" href="#" @click="randomProperties(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>
  </div>
</template>

<script>
import {debounce} from "lodash";

export default {
  data() {
    return {
      search: "",
      lagosproperties: {},
      pagination: {}
    };
  },
  methods: {
    randomProperties(page_url) {
      let location = 'lagos';
      let paginate = 3;

      let vm = this;

      page_url = page_url || `../api/loadall/${location}/${paginate}`;

      axios.get(page_url).then(({data}) => {
        this.lagosproperties = data.data;
        console.log(data.first_page_url);
        vm.makePagination(data);

      }).catch(err => {
        console.log(err);
      })
    },
    makePagination(data){
      let pagination = {
        current_page: data.first_page_url,
        last_page: data.last_page_url,
        next_page_url: data.next_page_url,
        prev_page_url: data.prev_page_url,
        from: data.current_page,
        last: data.last_page
      }
      this.pagination = pagination;
    },
    searchProperties:
          debounce(() => {
            Fire.$emit("searching");
            console.log("searching..");
      }, 2000)



  },
  mounted() {},
  created() {
    Fire.$on("searching", () => {
      // send http request to server
      let query = this.search;
      let location = 'lagos';
      axios
        .get(`../api/findspecificproperty/${location}?q=` + query).then(({ data }) => {
                this.lagosproperties = data.data;
              })
        .catch(() => {});
    });
    this.$Progress.start();
    this.randomProperties();
    this.$Progress.finish();
  },
  computed: {
    groupedProperties() {
      return _.chunk(this.lagosproperties, 3);
      // returns a nested array:
      // [[article, article, article], [article, article, article], ...]
    }
  }
};
</script>