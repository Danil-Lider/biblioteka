<template>
<div  v-if="item">
{{ item.name }}
</div>
<div id="myModal1" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div v-if="item" class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title">Забронировать книгу: {{ item.name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <div v-if="success">
        <div class="p-3  bg-success text-white">
            {{ success  }}
        </div>
    </div>
    <div v-else>
        <div class="modal-body">

            <div>Выберите дату </div>   

            <Datepicker  v-model="date_datepicker" @update:modelValue="handleDate" locale="ru" :min-date="new Date()" range  ></Datepicker>

            <!-- {{ item }} -->

            <label>
                Автор книги:   {{ item.author }}
            </label>


            <div  class="p-3 mb-2 bg-danger text-white" v-if="error">
            {{ error }}
            </div>  

        </div>
        <div class="modal-footer">

            <button  v-on:click="orderItem(item)" type="button" class="btn btn-secondary" data-dismiss="modal">Забронировать</button>

            <button  v-on:click="toggleModal(true)" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>


    </div>
  </div>
</div>


   
</template>


<script>

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import * as bootstrap from 'bootstrap'

export default {
  components: { Datepicker },
  // props: ['item'],
  data(){
    return {
      date_datepicker: null,
      modal: null,
      modelData: null,
      item: null,
      error: null,
      success: null
    }
  },
  updated() {
    this.toggleModal();
    // this.success = null;
  },
  methods: {

    orderItem: function(item){

      if(this.date_datepicker){

        item.start_to_book = this.date_datepicker[0];
        item.end_to_book = this.date_datepicker[1];

      }

      if(item.end_to_book){

        axios.post('http://localhost:8080/books', {

          data: item

        }).then(response => {

          console.log(response);

            // console.log()

            this.error = null;

            if(Number.isInteger(response.data.id)){
                this.success = 'Успешно забронировано';
            }else{
                this.success = null
                this.error = response.data
            }

        }).catch(error => {

          this.error = error;

        });

        this.error = null;

      }else{

        this.error = 'Нужно выбрать 2 даты !';

      }
    },

    // IT FOR CATALOG INDEX COMPONENT
    showModal: function(item){
      this.item = item;
      this.getModal().show()
      this.success = null;
    },
    handleDate:  (modelData) => {

    },
    getModal: function(){
        if (!this.modal) {
            this.modal = new bootstrap.Modal('#myModal1');   
        }
        return this.modal
    },
    toggleModal: function(close=false){

        if(close){

            this.modal.hide();
           
        }else {

            this.getModal().show()

        }

    },
  }
}

</script>


