<template>
<div  v-if="item">
  
</div>
<div id="myModal1" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div v-if="item" class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title">Забронировать Мойку: {{ item.name }}</h5>
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

            <Datepicker   :enable-time-picker="false"   v-model="date_datepicker" @update:modelValue="handleDate" locale="ru" :min-date="new Date()"   ></Datepicker>
            <!-- {{ item }} -->

            <div v-if="item.hours" id="hours">

              <h4 style="margin-top: 1rem;">Выберите  время</h4>

              
              <select v-model="hour_form" name="hour_main" id="">

                <option :value="item"  v-for="(item, index) in item.hours">

                  {{ item }}:00

                </option>

              </select>

             
            </div>


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
      success: null,
      aviable_hour: null,
      hour_form: null
    }
  },
  updated() {
    this.toggleModal();
    // this.success = null;
  },
  methods: {

    orderItem: function(item){


      item.modelData = this.modelData;
      item.hour_form = this.hour_form;

      console.log(item)

      if(this.date_datepicker){

        // item.start_to_book = this.date_datepicker[0];

        axios.post('http://localhost:8080/books', {

        data: item

        }).then(response => {

        console.log(response);

          this.error = null;

          if(Number.isInteger(response.data.id)){
              this.success = 'Успешно забронировано';

              
              this.item.hours = null;
              // this.item = null;
              this.item.modelData = null;
              this.item.hour_form = null;
              this.hour_form = null;
              this.date_datepicker = null;


          }else{
              this.success = null
              this.error = response.data
          }

        }).catch(error => {

          this.error = 'Выберите время';

        });

        // this.error = null;

      }

      
    },

    // IT FOR CATALOG INDEX COMPONENT
    showModal: function(item){
      this.item = item;
      this.getModal().show()
      this.success = null;
    },
    handleDate:  function(modelData) {


      this.error = null;

      // Получаем доступное время на текущию дату
      // нужна функция AJax которая запрости на эту дату возможность записи свободные ячейки 
      const day = modelData.getDate();
      const month = modelData.getMonth() + 1;
      const year = modelData.getFullYear();


      this.modelData = {
          day: day,
          month: month,
          year:year
      };

      // console.log(day);


      axios.get('http://localhost:8080/test', {
        params: {
          day: day,
          month: month,
          year:year
        }
      }).then(response => {

        // пихаем в элемент часы

          this.item.hours = response.data;

      }).catch(error => {

      });

      


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


