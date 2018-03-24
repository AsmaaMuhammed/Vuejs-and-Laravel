<template>
<div>
    <div class="form-group">
       <router-link :to="{name:'companiesCreate'}" class='btn btn-success'>Create Company</router-link>
    </div>
    <div class="panel panel-default">
         <div class="panel-heading"> Companies List</div>
         <div class="panel-body">
             <table class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Website</th>
                         <th>Address</th>
                         <th>Email</th>
                         <th>Edit/Delete</th>
                     </tr>
                 </thead>
                 <tbody>
                      <tr v-for="company, index in companies">
                         <td>{{company.name}}</td>
                         <td>{{company.website}}</td>
                         <td>{{company.address}}</td>
                         <td>{{company.email}}</td>
                         <td>
                             <router-link :to="{name:'companiesEdit', params: {id:company.id}}" class="btn btn-xs btn-default">Edit</router-link>
                             &nbsp;&nbsp;
                             <a v-on:click="deleteCompany(company.id, index)" class="btn btn-xs btn-danger">Delete</a>
                         </td>
                      </tr>
                 </tbody>

             </table>
         </div>
    </div>
</div>
</template>

<script>
    export default {
        data:function(){
            return {companies:[]};
        },
        mounted(){
             var app = this;
             axios.get('companies')
             .then(function(resp){app.companies=resp.data;})
             .catch(function(resp){alert('there is problem when loading data')});
        },
        methods:{
            deleteCompany:function(id, index)
            {
                 var app = this;
                 if(confirm('Are You Sure to delete this record?')){
                     axios.delete('companies/'+id)
                     .then(function(resp){app.companies.splice(index,1);})
                     .catch(function(resp){alert('there is problem when loading data')});
                 }
            }
        }
    }
</script>
