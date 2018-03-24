<template>
<div>
    <div class="form-group">
        <router-link :to="{name:'companiesIndex'}" class='fas fa-arrow-left'>Back</router-link>
    </div>

   <div class="panel panel-default">
            <div class="panel-heading"> Company Data</div>
            <div class="panel-body">
                 <form v-on:submit="save()">
                     <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company Name</label>
                            <input class="form-control"  type="text" v-model="company.name"/>
                        </div>
                     </div>
                     <div class="row">
                             <div class="col-xs-12 form-group">
                                 <label class="control-label">Company Website</label>
                                 <input class="form-control"  type="text" v-model="company.website"/>
                             </div>
                     </div>
                     <div class="row">
                             <div class="col-xs-12 form-group">
                                 <label class="control-label">Company Address</label>
                                 <input class="form-control"  type="text" v-model="company.address"/>
                             </div>
                     </div>
                     <div class="row">
                             <div class="col-xs-12 form-group">
                                 <label class="control-label">Company Email</label>
                                 <input class="form-control"  type="text" v-model="company.email"/>
                             </div>
                     </div>
                     <div class="row">
                             <div class="col-xs-12 form-group">
                                 <button class="btn btn-success">Edit</button>
                             </div>
                     </div>
                 </form>
           </div>
   </div>
</div>
</template>

<script>
    export default {
        data:function(){
           return {
                         companyId:'',
                         company:{name:'',
                           address:'',
                           website:'',
                           email:''
                          }
                  }
        },
        mounted(){

            var app = this;
            let id = app.$route.params.id;
            app.companyId = id;
            axios.get('companies/'+id)
            .then(function(resp){app.company = resp.data;})
            .catch(function(){ alart('there is a problem when loading the data.')});

        },
        methods: {
            save:function(){
                event.preventDefault();
                var app = this;
                var newCompany = app.company;
                axios.patch('companies/'+app.companyId,newCompany)
                .then(function(resp){app.$router.replace('/');})
                .catch(error => {
                        error => error.response.data.status;
                        alert(error.response.data.message);
                        console.log(error.response.status);

                  });


            }
        }
    }
</script>
