<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Products &nbsp; 

                        <select id = "select_category" class = "form-control"
                         @change="sortByCategory">
                            <option selected disabled>Select category</option>
                            <option v-for="c in products" :value ="c.category" :key ="c.id">{{ c.category}}</option>
                        </select>
                    </div>

                    <div class="card-body">
                      <table class = "table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr v-for="product in products" :key = "product.id">
                      <td>{{ product.name}}</td>
                      <td>{{ product.category}}</td>
                      <td>{{ product.description}}</td>
                      <td>
                        <button class = "btn btn-warning"
                        onclick = "console.log('');">
                         Edit
                        </button>
                        <button class = "btn btn-danger"
                        @click="deleteProduct(product.id)">
                         Delete
                        </button>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "jquery/dist/jquery.min.js";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
import Swal from "sweetalert2";

    export default {
        name: 'ProductList',

        data(){
            return{
                products: [],
          
            }
        },
        mounted() {
            console.log('Component mounted.');



        },
        created(){
         this.axios
            .get("http://localhost:8000/api/products")
            .then((res)=>{
             
                this.products = res.data.data;

               this.$nextTick(() => {
                    $("table").DataTable({});
                });
            });

        },
        methods: {
            deleteProduct(id){
                Swal.fire({
                title: 'Do you want to delete this product?',

                showCancelButton: true,
                confirmButtonText: 'Delete',

                }).then((result) => {

                if (result.isConfirmed) {
                    this.axios
                    .delete("http://localhost:8000/api/products/" + id)
                    .then((res)=>{
                            Swal.fire('Deleted!', '', 'success');
                            window.location.reload();
                    })

                }
                })

            },
            sortByCategory(){
                this.$nextTick(() => {
                    $("table").DataTable().search( $('#select_category').val()).draw();
            });
            }
        }
    }
</script>
