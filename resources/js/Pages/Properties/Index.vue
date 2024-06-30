<template>
  <div class="container mt-5">
    <h1 class="fs-1 mb-4">Properties</h1>

    <div class="mb-4">
      <a href="/properties/create" class="btn btn-primary">Create New Property</a>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Address</th>
          <th>No. of Rooms</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="property in properties" :key="property.id">
          <td>{{ property.name }}</td>
          <td>{{ property.description }}</td>
          <td>{{ property.address }}</td>
          <td>{{ property.no_of_rooms }}</td>
          <td>
            <button class="btn btn-primary btn-sm" @click="viewProperty(property)">View</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';
import { Inertia } from '@inertiajs/inertia';

export default {
  data() {
    return {
      properties: []
    };
  },
  created() {
    this.fetchProperties();
  },
  methods: {
    fetchProperties() {
      axios.get('/api/properties')
        .then(response => {
          if (response.data.success) {
            this.properties = response.data.data;
          } else {
            console.error('Failed to fetch properties');
          }
        })
        .catch(error => {
          console.error('Error fetching properties:', error);
        });
    },
    viewProperty(property) {
      Inertia.visit(`/properties/${property.id}`);
    },
  }
};
</script>
