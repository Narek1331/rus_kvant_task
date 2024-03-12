<template>
    <div>
      <h1>Create Feedback</h1>
      <router-link to="/" class="btn btn-primary mb-3">Home Page</router-link>

      <form @submit.prevent="submitFeedback">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" v-model="form.name">
          <span class="text-danger">{{ errors.name ? errors.name[0] : '' }}</span>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" id="phone" v-model="form.phone">
          <span class="text-danger">{{ errors.phone ? errors.phone[0] : '' }}</span>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" v-model="form.message"></textarea>
          <span class="text-danger">{{ errors.message ? errors.message[0] : '' }}</span>
        </div>
        <span class="text-danger">{{ errors.general ? errors.general[0] : '' }}</span>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        form: {
          name: '',
          phone: '+7',
          message: ''
        },
        errors: {}
      };
    },
    methods: {
      submitFeedback() {
        // Dispatch an action to submit feedback to Vuex store
        this.$store.dispatch('submitFeedback', this.form)
          .then(() => {
            // Reset form after successful submission
            this.form = {
              name: '',
              phone: '',
              message: ''
            };
            // Clear any previous errors
            this.errors = {};
            // Redirect to home page after successful submission
            this.$router.push('/');
          })
          .catch(error => {
            // Handle error, show error message or log it
            console.error('Error submitting feedback:', error);
            // Check if the error contains validation errors
            if (error.response && error.response.data && error.response.data.errors) {
              // Set validation errors
              this.errors = error.response.data.errors;
            } else {
              // Handle other types of errors
              // For example, show a generic error message
              this.errors = {
                general: ['An unexpected error occurred. Please try again later.']
              };
            }
          });
      }
    }
  };
  </script>
