<template>
    <div class="container mt-5">
    <h1 class="fs-1 mb-4">Create Property</h1>

      <div class="mb-4">
        <div class="card-body">
          <form @submit.prevent="createProperty">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" v-model="newProperty.name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" v-model="newProperty.description" class="form-control" id="description" required>
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" v-model="newProperty.address" class="form-control" id="address" required>
            </div>
            <div class="form-group mb-2">
              <label for="no_of_rooms">No. of Rooms:</label>
              <input type="number" v-model="newProperty.no_of_rooms" class="form-control" id="no_of_rooms" required>
            </div>
            <button type="button" class="btn btn-secondary mr-2" @click="cancel">Cancel</button>
            <button type="submit" class="btn btn-primary">Create Property</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import { Inertia } from '@inertiajs/inertia';

  export default {
    data() {
      return {
        newProperty: {
          name: '',
          description: '',
          address: '',
          no_of_rooms: 1
        }
      };
    },
    methods: {
        createProperty() {
        axios.post('/api/properties', this.newProperty)
            .then(response => {
            if (response.data.success) {
                window.location.href = '/properties';
            } else {
                console.error('Failed to create property');
            }
            })
            .catch(error => {
            console.error('Error creating property:', error);
            });
        },
        cancel() {
            Inertia.visit('/properties');
        }
    }
  };
  </script>