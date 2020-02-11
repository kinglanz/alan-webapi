<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 50px;">
                    <div class="card-header">
                        <center>{{judul}}</center>
                    </div>
                        <div v-if="!loading" class="card-body">   

                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                <button class="btn btn-primary" 
                                @click="resetData" 
                                style="margin-top: 1px; margin-bottom: 5px;">
                                Reset Data            
                                </button>        
                                </div>
                                <div class="col-md-3">
                                <input 
                                class="form-control" 
                                v-model="katakunci" 
                                type="search"
                                placeholder="Search..."
                                @change="jalankanPencarian"/>         
                                </div>
                            </div>    
                        </div>                        
                            
                            <hr>
                    <table v-if="!error" class="table table-bordered">
                        <tr style="background-color: pink; text-align: center;" >
                       
                            <td>Nama</td>
                            <td>JK</td>
                            <td>Tanggal dibuat</td>
                       
                        </tr>
                        <tr v-for="item in data.data":key="item.id" style="text-align: center;">
                           
                            <td>{{item.nama}}</td>
                            <td>{{item.jk}}</td>
                            <td>{{item.created_at}}</td>
                       
                        </tr>
                    </table>
                    <pagination :data="data" @pagination-change-page="aksesApi"></pagination>
                    <div v-if="error" class="alert alert-warning"@click="aksesApi">
                    {{error}}
                    </div>
                    </div>
                            <div v-if="loading" class="card-body">
                             <center><h1>Loading. . . .</h1></center>
                         </div>
                </div>
            </div>
        </div>
                    <vue-progress-bar></vue-progress-bar>
                    <notifications group="foo" position="bottom right" />
    </div>
</template>
<script>
    export default {
        data() {
            return {
                judul:'Data Siswa',
                data: {},
                error:null,
                loading:false,
                katakunci:''
            }          
        },
        mounted() {
            this.aksesApi()
        },
        methods: {
            aksesApi(page = 1, katakunci) {
                this.$Progress.start()
                this.loading=true

                const params = {
                    page: page
                }
                if (katakunci) {
                    params.katakunci = katakunci
                }
                axios.get('/testapi',{params})
                .then(response=>{

                    this.data = response.data
                    this.loading=false
                    this.$Progress.finish()
                    this.$notify({
                    type: 'success',
                    group: 'foo',
                    title: 'Notify!',
                    text: 'Data berhasil ditampilkan!'

                    });
                }).catch(error=>{
                    this.error=error
                    this.loading=false
                    this.$Progress.fail()
                    this.$notify({
                    type: 'bg-danger',
                    group: 'foo',
                    title: 'Notify!',
                    text: 'Error!!!'

                        });
                    })
                },
                jalankanPencarian(){
                    this.aksesApi(1,this.katakunci)
                },
                resetData(){
                    this.katakunci=''
                    this.aksesApi()
                }
            }
        } 
</script>

