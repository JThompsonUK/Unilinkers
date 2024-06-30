<template>
  <div class="my-5">
    <h2 class="fs-1">Rooms</h2>
    <div v-if="rooms.length === 0">
      <p>No rooms found.</p>
    </div>
    <div v-else>
      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Size</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(room, index) in rooms" :key="room.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ room.name }}</td>
            <td>{{ room.size }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    rooms: Array
  },
};
</script>
