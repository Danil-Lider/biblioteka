<template>


<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div v-if="data" class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title">{{ data.name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> {{ data.response.statusText }} : {{ data.message }}</p>
      </div>
      <div class="modal-footer">
        <button  v-on:click="toggleModal(true)" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


   
</template>


<script>

import * as bootstrap from 'bootstrap'

export default {

  props: ['data'],
  data(){
    return {
      modal: null,
    }
  },
  updated() {

    // console.log(this.data)

    this.toggleModal();
  },
  methods: {
    getModal: function(){
        if (!this.modal) {
            this.modal = new bootstrap.Modal('#myModal');   
        }
        return this.modal
    },
    toggleModal: function(close=false){

        if(close){
            this.getModal().hide()
        }else {
            this.getModal().show()
        }

    },
  }
}

</script>


