<template>
  <div class="container mt-5">
    <h1 class="fs-1">Property Details</h1>

    <form @submit.prevent="updateProperty" class="mt-4">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" v-model="form.name" class="form-control" id="name" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" v-model="form.description" class="form-control" id="description" required>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" v-model="form.address" class="form-control" id="address" required>
      </div>
      <div class="form-group mb-2">
        <label for="no_of_rooms">No. of Rooms:</label>
        <input type="number" v-model="form.no_of_rooms" class="form-control" id="no_of_rooms" required>
      </div>
      <button type="button" class="btn btn-secondary mr-2" @click="cancel">Cancel</button>
      <button type="submit" class="btn btn-primary mr-2">Update Property</button>
      <button type="button" class="btn btn-danger" @click="deleteProperty">Delete Property</button>
    </form>

    <Rooms :rooms="property.rooms" />

  </div>
</template>

<script>
import Rooms from './Rooms.vue';
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    property: Object
  },
  data() {
    return {
      form: {
        name: this.property.name,
        description: this.property.description,
        address: this.property.address,
        no_of_rooms: this.property.no_of_rooms
      }
    };
  },
  components: {
    Rooms
  },
  methods: {
    updateProperty() {
      const formData = {
        name: this.form.name,
        description: this.form.description,
        address: this.form.address,
        no_of_rooms: this.form.no_of_rooms
      };

      axios.put(`/api/properties/${this.property.id}`, formData)
        .then(response => {
          Inertia.visit('/properties');
        })
        .catch(error => {
          console.error('Error updating property:', error);
        });
    },
    deleteProperty() {
      if (confirm('Are you sure you want to delete this property?')) {
        axios.delete(`/api/properties/${this.property.id}`)
          .then(response => {
            Inertia.visit('/properties');
          })
          .catch(error => {
            console.error('Error deleting property:', error);
          });
      }
    },
    cancel() {
        Inertia.visit('/properties');
    }
  }
};
</script>


