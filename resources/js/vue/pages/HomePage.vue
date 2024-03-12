<template>
    <div>
      <h1>Feedback List</h1>
      <router-link to="/create" class="btn btn-primary mb-3">Create Feedback</router-link>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">message</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="feedback in feedbacks" :key="feedback.id">
            <td>{{ feedback.name }}</td>
            <td>{{ feedback.phone }}</td>
            <td>{{ feedback.message }}</td>

          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  export default {
    name: 'FeedbackList',
    computed: {
      feedbacks() {
        return this.$store.state.feedbacks;
      }
    },
    mounted() {
      // Fetch feedbacks from API or Vuex store
      this.$store.dispatch('fetchFeedbacks');
    }
  }
  </script>

  <style scoped>
  </style>
