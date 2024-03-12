import { createStore } from 'vuex';

const store = createStore({
  state: {
    feedbacks: [],
    errors: {}
  },
  mutations: {
    setFeedbacks(state, feedbacks) {
      state.feedbacks = feedbacks;
    },
    setErrors(state, errors) {
      state.errors = errors;
    },
    clearErrors(state) {
      state.errors = {};
    }
  },
  actions: {
    async fetchFeedbacks({ commit }) {
      try {
        const response = await fetch('http://localhost/api/feedback');
        const data = await response.json();
        commit('setFeedbacks', data);
      } catch (error) {
        console.error('Error fetching feedbacks:', error);
      }
    },
    async submitFeedback({ commit }, feedback) {
      try {
        const response = await fetch('http://localhost/api/feedback', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(feedback)
        });
        const data = await response.json();
        // Assuming the API response contains a success message
        console.log('Feedback submitted successfully:', data.message);
        return data; // Return data in case you need it
      } catch (error) {
        console.error('Error submitting feedback:', error);
        throw error;
      }
    }
  },
  getters: {
    getErrors(state) {
      return state.errors;
    }
  }
});

export default store;
