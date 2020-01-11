<template>
  <div class="container">

    <content-loader v-if="!myData"
                    :height="370"
                    :width="450"
                    :speed="2"
                    id="loader-pc"
                    primaryColor="#695f45"
                    secondaryColor="#ecebeb"
    >
      <rect x="10" y="11.54" rx="0" ry="0" width="0" height="0" />
      <rect x="3.14" y="10.67" rx="0" ry="0" width="180.27" height="14.2" />
      <rect x="2.74" y="40.67" rx="0" ry="0" width="111.84" height="15.2" />
      <rect x="3.56" y="97.67" rx="0" ry="0" width="439.86" height="18.56" />
      <rect x="2.6" y="129.67" rx="0" ry="0" width="439.86" height="19.52" />
      <rect x="2.6" y="158.67" rx="0" ry="0" width="439.86" height="20.48" />
      <rect x="2.6" y="189.67" rx="0" ry="0" width="439.86" height="17.6" />
    </content-loader>



    <content-loader
            v-if="!myData"
            :height="530"
            :width="430"
            :speed="2"
            id="loader-mobile"
            primaryColor="#695f45"
            secondaryColor="#ecebeb"
    >
      <rect x="10" y="11.54" rx="0" ry="0" width="0" height="0" />
      <rect x="31.83" y="38.67" rx="0" ry="0" width="211.95" height="33" />
      <rect x="32.83" y="81.67" rx="0" ry="0" width="139.89" height="24.42" />
      <rect x="31.83" y="138.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="31.83" y="179.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="31.83" y="220.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="31.83" y="259.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="31.83" y="298.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="31.83" y="339.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="30.83" y="379.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="30.83" y="419.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="30.83" y="459.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="30.83" y="498.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="30.83" y="539.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="30.83" y="579.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="29.83" y="620.67" rx="0" ry="0" width="375.15" height="32.01" />
      <rect x="29.83" y="660.67" rx="0" ry="0" width="375.15" height="32.01" />
    </content-loader>





    <div v-else class="my-real-content">
    <h1 style="margin-top:40px !important; font-size:1.45rem !important; margin-left: 0px !important;">Add a New Place</h1>

      <form @submit.prevent="createProperty()" >
        <div class="card" style="padding: 20px 15px 5px 15px;">
        <div class="form-group">
          <label for="name">Property Name</label>
            <input v-model="form.name" type="text" class="form-control"
                   :class="{ 'is-invalid': form.errors.has('name') }"
                   name="name" id="name" placeholder="Ex. 4-Bedroom luxury house in a secured neighborhood.." autocomplete="off">
          <has-error :form="form" field="name"></has-error>
        </div>

        <div class="form-group">
          <label for="price">Price (per night)</label>
          <div class="input-group">

            <div class="input-group-prepend">
              <div class="input-group-text">$</div>
            </div>
            <input v-model="form.price" autocomplete="off" type="number" name="price" class="form-control" :class="{ 'is-invalid': form.errors.has('price') }" id="price" placeholder="50">
            <has-error :form="form" field="price"></has-error>
          </div>
        </div>


        <div class="form-group">
          <label for="rooms">How many rooms?</label>
          <select v-model="form.rooms" name="rooms" class="form-control" :class="{ 'is-invalid': form.errors.has('rooms') }" id="rooms">
            <option value="">Select An Option</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5+</option>
          </select>
          <has-error :form="form" field="rooms"></has-error>
        </div>

        <div class="form-group">
          <label for="location">Where's your place?</label>
          <select v-model="form.location" name="location" class="form-control" :class="{ 'is-invalid': form.errors.has('location') }" id="location">
            <option value="">Select An Option</option>
            <option value="lagos">Lagos</option>
            <option value="ibadan">Ibadan</option>
            <option value="abuja">Abuja</option>
          </select>
          <has-error :form="form" field="location"></has-error>
        </div>

        <div class="form-group">
          <label for="description">Say more about the place...</label>
          <textarea v-model="form.description" name="description" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" id="description" rows="3"></textarea>
          <has-error :form="form" field="description"></has-error>
        </div>

        <div class="form-group">
          <label for="email">Contact Email</label>
          <input v-model="form.email" autocomplete="off" name="email" type="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="email" placeholder="work@domain.com">
          <has-error :form="form" field="email"></has-error>
        </div>

        <div class="form-group">
          <label for="photo">Add a Photo</label>
          <div class="col-sm-12">
            <input name="photo" type="file" id="photo" class="form-input">
          </div>
        </div>




        </div>
        <!-- to align button to middle, put in between this div below -->
        <div class="col text-center">
        </div>
        <!-- end button align -->
        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit Now</button>
      </form>

      </div>
  </div>

</template>

<script>
import { ContentLoader } from 'vue-content-loader';

export default {
  components: {
    ContentLoader
  },
  data(){
    return {
      myData: null,
      form: new Form({
        id: '',
        name: '',
        price: '',
        rooms: '',
        location: '',
        description: '',

        email: '',
        photo: ''
      })
    }
  },
  methods: {
    createProperty(){
      this.$Progress.start();
      this.form.post('api/property').then(() => {
        this.form.reset();
        console.log('created');
        // show sweet alert notification
        toast.fire({
          icon: 'success',
          title: 'Property added successfully'
        })
        this.$Progress.finish();
        // this.$router.push('home');
      }).catch(() => {
        this.$Progress.fail();
      });
    }
  },
  mounted() {
    setTimeout(() => {
      this.myData = 'Example Data';
    }, 5000);
  }
};
</script>