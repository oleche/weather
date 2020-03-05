<template>
    <div class="col-md-4">
      <div class="form-group">
        <autocomplete
          source="/cities/find/"
          results-property="data"
          placeholder="Search a city"
          :results-display="formattedDisplay"
          @selected="fetchWeather">
        </autocomplete>
      </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      postAverage: '',
      postData: {}
    }
  },
  methods: {
    formattedDisplay (result) {
      return result.city + ' <strong>' + result.country + '</strong>'
    },
    fetchWeather(city){
      axios.post('/weather/fetch', {city: city.selectedObject.city+","+city.selectedObject.country_code}).then(res => {
        console.log(res);
        this.postData = res.data.data;
        this.postAverage = res.data.average;
        Event.$emit('found_country', this.postData, this.postAverage, city.selectedObject);
      }).catch(e => {
        console.log(e);
      });
      this.code = '';
    }
  }
}
</script>
